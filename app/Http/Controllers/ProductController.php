<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->nama = $request->nama;
        $product->harga = $request->harga;
        $product->save();

        return redirect()->route('product.index');
    }
}
