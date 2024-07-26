<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, DB, Storage};
use App\Models\{User, Toko, Categories, Product};

class ProductController extends Controller
{
    public function index()
    {
        /*
            SELECT * FROM products JOIN tokos ON products.toko_id = tokos.id
        */
        $products = DB::table('products')->join('tokos', 'tokos.id', '=', 'products.toko_id')->select('products.*', 'tokos.name as toko')->get();
        $categories = Categories::all();
        return view('product.index', [
            'products' => $products, 
            'categories' => $categories 
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => "required|string|min:5|max:32",
            'harga' => "required",
            'foto1' => "required",
            'category_id' => "required",
            'qty' => "required|numeric|min:1"
        ]);
        // dd($request->file('foto1')->getClientOriginalName());
        $toko_id = User::find(Auth::user()->id)->toko()->first()->id;

        $gambar = $request->file('foto1');
        $gambarName = $gambar->hashName();
        $category_id = Category::find($request->input('category_id'));
        DB::beginTransaction();

        try {
            // Create product
            $product = Product::create([
                "nama" => $request->input('nama'),
                "harga" => $request->input('harga'),
                "gambar" => $gambarName,
                "toko_id" => $toko_id,
                "rating" => 0,
                "category_id" => $category_id->id,
                "qty" => $request->input('qty'),
            ]);

            // Store images
            $gambar->storeAs('public/product_images', $gambarName);

            DB::commit();

            return redirect()->route('toko.index')->with('success', 'Berhasil menambahkan product baru!');
        } catch (\Exception $e) {
            DB::rollBack();

            // Delete uploaded files if they exist
            if (Storage::disk('public')->exists('product_images/' . $gambarName)) {
                Storage::disk('public')->delete('product_images/' . $gambarName);
            }

            \Log::error('Failed to create toko: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Gagal menambahkan product. Silakan coba lagi.']);
        }
    }

    public function create()
    {
        $categories = Categories::all();
        return view('product.create', compact('categories'));
    }

    public function show($id){
        $product = Product::with('toko')->findOrFail($id);
        return view("product.show", [
            "product" => $product
        ]);
    }

    public function edit($id){
        $product = Product::with('toko')->findOrFail($id);
        $categories = Categories::all();
        return view("product.edit", [
            "product" => $product,
            "categories" => $categories
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => "required|string|min:5|max:32",
            'harga' => "required",
        ]);
        $product = Product::findOrFail($id);
        $current_user = Auth::user();
        if($current_user->toko_id != $product->toko_id){
            return redirect()->route('product.index');
        }
        $product->update([
            "nama" => $request->input('nama'),
            "harga" => $request->input('harga'),
            "category_id" => $request->input('category_id'),
            "qty" => $request->input('qty'),
        ]);

        return redirect()->route('product.index')->with('success', 'Berhasil mengupdate produk');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $current_user = Auth::user();
        if($current_user->toko_id != $product->toko_id){
            return redirect()->route('product.index');
        }
        DB::beginTransaction();
        try {
            // Delete images
            if (Storage::disk('public')->exists('product_images/' . $product->gambar)) {
                Storage::disk('public')->delete('product_images/' . $product->gambar);
            }
            // Delete product
            $product->delete();
            DB::commit();
            return redirect()->route('toko.index')->with('success', 'Berhasil menghapus produk');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Failed to delete product: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Gagal menghapus produk. Silakan coba lagi.']);
        }
    }
}
