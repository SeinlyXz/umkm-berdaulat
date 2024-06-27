<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Categories::all();
        return view('product.index', compact([
            'products' => $products, 'categories' => $categories 
        ]));
    }

    public function store(Request $request)
    {
        
        $product = new Product();
        $product->nama = $request->input('nama');
        $product->harga = $request->input('harga');
        $product->rating = 5;
        $product->save();

        return redirect('/product');
    }

    public function create()
    {
        return view('product.create');
    }
}
