<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request){
        $products = DB::table('products')->join('tokos', 'tokos.id', '=', 'products.toko_id')->select('products.*', 'tokos.name as toko')->get();
        if(isset($request->search)){
            $products = DB::table('products')
                ->join('tokos', 'tokos.id', '=', 'products.toko_id')->select('products.*', 'tokos.name as toko')
                ->where('nama', 'like', '%' . $request->search . '%')
                ->get();
        }
        return view("home", [
            "products" => $products
        ]);
    }
}
