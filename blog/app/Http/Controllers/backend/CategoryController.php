<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $category = [
            ['name' => 'Laptop'],
            ['name' => 'Desktop'],
            ['name' => 'Mobile'],
            ['name' => 'Tablet'],
        ];

        return view('backend.Category.index', [
            'category'=> $category
        ]);
    }
}
