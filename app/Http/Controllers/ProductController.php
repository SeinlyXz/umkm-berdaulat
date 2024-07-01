<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::with('categories')->get();
        // dd($products->toArray());
        $categories = Categories::all();
        return view('product.index', [
            'products' => $products, 'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        
        $product = new Product();
        $product->nama = $request->input('nama');
        $product->harga = $request->input('harga');
        $product->rating = 5;
        $product->categories_id = $request->input('categories_id');
        $product->save();

        return redirect('/product');
    }

    public function create()
    {
        $categories = Categories::all();
        return view('product.create', compact('categories'));
    }
}
