<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Keranjang, Product};
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $keranjang = Keranjang::where('user_id', $user_id)->with('product')->get();
        return view('keranjang.index', compact('keranjang'));
    }

    public function checkout(Request $request)
    {
        return response()->json([
            'datas' => $request->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
        ]);

        $qty = 1;
        $tipe = "reguler";
        $current_user = auth()->user();
        $product = Product::find($request->product_id);

        // Check if the product is already in the user's cart
        $cartItem = DB::table('keranjangs')->where('user_id', $current_user->id)->where('product_id', $product->id)->first();

        if ($cartItem) {
            DB::table('keranjangs')->where('id', $cartItem->id)->update([
                'qty' => $cartItem->qty + $qty
            ]);
            return Redirect::back()->with('success', 'Berhasil menambahkan produk ke keranjang Anda');
        }

        Keranjang::create([
            'qty' => $qty,
            'tipe' => $tipe,
            'product_id' => $product->id,
            'user_id' => $current_user->id
        ]);

        return Redirect::back()->with('success', 'Keranjang berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
