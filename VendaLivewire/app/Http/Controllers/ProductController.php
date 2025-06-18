<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index(){

    //     $product = Http::get('https://fakestoreapi.com/products');

    //  $products = $product->json();


     return view('welcome');


    }
}
