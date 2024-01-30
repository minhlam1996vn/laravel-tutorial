<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Laravel\Passport\Client;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $checkLogin = Auth::attempt(['email' => $email, 'password' => $password]);

        if ($checkLogin) {
            // $user = Auth::user();
            // $tokenResult = $user->createToken('auth_api');
            // $token = $tokenResult->token;
            // $token->expires_at = Carbon::now()->addMinutes(60);
            // $accesToken = $tokenResult->accessToken;
            // $expires = Carbon::parse($token->expires_at)->toDateTimeString();

            $client = Client::where('password_client', 1)->first();

            if ($client) {
                $clientSecret = $client->secret;
                $clientId = $client->id;

                $response = Http::asForm()->post('http://127.0.0.1:8001/oauth/token', [
                    'grant_type' => 'password',
                    'client_id' => $clientId,
                    'client_secret' => $clientSecret,
                    'username' => $email,
                    'password' => $password,
                    'scope' => '',
                ]);

                return $response;
            }

            // $response = [
            //     'status' => 200,
            //     'token' => $accesToken,
            //     'expires' => $expires,
            // ];
        } else {
            $response = [
                'status' => 401,
                'title' => 'Unauthorized',
            ];
        }

        return $response;
    }

    public function logout()
    {
        $user = Auth::user();

        $status = $user->token()->revoke();

        $response = [
            'status' => 200,
            'title' => 'logout'
        ];

        return $response;
    }

    public function refreshToken(Request $request)
    {
        $client = Client::where('password_client', 1)->first();

        if ($client) {
            $clientSecret = $client->secret;
            $clientId = $client->id;
            $refreshToken = $request->refresh;

            $response = Http::asForm()->post('http://127.0.0.1:8001/oauth/token', [
                'grant_type' => 'refresh_token',
                'refresh_token' => $refreshToken,
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'scope' => '',
            ]);

            return $response;
        }
    }
}
