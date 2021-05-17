<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(){

    }

    public function index(){

        $product = [
            ['name' => 'Iphone 12'],
            ['name' => 'Iphone 11'],
            ['name' => 'Iphone XS'],
            ['name' => 'Iphone X'],
        ];

        return view('backend.product.index', [
            'product' => $product
        ]);
    }

    public function create(){
        return view('backend.product.create');
    }

    public function edit(){
        return view('backend.product.edit');
    }
}
