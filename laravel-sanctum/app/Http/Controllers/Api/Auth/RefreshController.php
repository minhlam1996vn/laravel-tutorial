<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class RefreshController extends Controller
{
    public function __invoke(Request $request)
    {
        $hashToken = trim($request->token);
        $token = PersonalAccessToken::findToken($hashToken);

        if (!$token) {
            throw new AuthenticationException('Unauthorized.');
        }

        $userId = $token->tokenable_id;
        $user = User::find($userId);
        $user->tokens()->where('id', $token->id)->delete();
        $newToken = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $newToken,
            'token_type' => 'Bearer'
        ]);
    }
}
