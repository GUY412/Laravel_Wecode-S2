<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Faker\Guesser\Name;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $product =new Product();
        $product->name ="Ordinateut portable";
        $product->category = "Informatique";
        $product->slug ="ordinateur-portable";
        $product->description = "description moi";
        $product->price =  250000;
        $product->quantity = 10;
        $product->save();

        return $product;
    }
}
