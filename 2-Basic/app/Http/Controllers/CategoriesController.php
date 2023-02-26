<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('clients.products');
    }

    public function getCategory()
    {
        dd('getCategory');
    }

    public function updateCategory()
    {
        dd('updateCategory');
    }

    public function addCategory()
    {
        dd('addCategory');
    }

    public function handleAddCategory()
    {
        dd('handleAddCategory');
    }

    public function deleteCategory()
    {
        dd('deleteCategory');
    }
}
