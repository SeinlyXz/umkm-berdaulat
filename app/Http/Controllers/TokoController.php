<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\{User, Tokos};

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $toko = Auth::user()->where('id', Auth::user()->id)->first()->toko()->get();
        if($toko->count() == 0){
            return redirect()->route('toko.create');
        }
        $products = DB::table('products')->join('tokos', 'tokos.id', '=', 'products.toko_id')->select('products.id', 'products.nama', 'products.harga', 'products.gambar', 'tokos.name as toko', 'products.rating')->where('tokos.id', $toko[0]->id)->get();
        // dd($products);
        return view('toko.index', [
            'toko' => $toko[0],
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {  
        $toko = Auth::user()->where('id', Auth::user()->id)->first()->toko()->get();
        if($toko->count() > 0){
            return redirect()->route('toko.index');
        }
        return view('toko.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'alamat' => 'required|string',
            'no_telp' => 'required|string',
            'banner_image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'cover_image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $bannerImage = $request->file('banner_image');
        $coverImage = $request->file('cover_image');
        $bannerImageName = $bannerImage->hashName();
        $coverImageName = $coverImage->hashName();

        DB::beginTransaction();

        try {
            // Create toko
            $toko = Tokos::create([
                'name' => $request->name,
                'description' => $request->description,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'banner_image' => $bannerImageName,
                'cover_image' => $coverImageName,
            ]);

            // Update user with toko_id
            $user = Auth::user();
            $user->update(['toko_id' => $toko->id]);

            // Store images
            $bannerImage->storeAs('public/toko_assets', $bannerImageName);
            $coverImage->storeAs('public/toko_assets', $coverImageName);

            DB::commit();

            return redirect()->route('toko.index')->with('success', 'Berhasil menambahkan toko baru');
        } catch (\Exception $e) {
            DB::rollBack();

            // Delete uploaded files if they exist
            if (Storage::disk('public')->exists('toko_assets/' . $bannerImageName)) {
                Storage::disk('public')->delete('toko_assets/' . $bannerImageName);
            }
            if (Storage::disk('public')->exists('toko_assets/' . $coverImageName)) {
                Storage::disk('public')->delete('toko_assets/' . $coverImageName);
            }

            \Log::error('Failed to create toko: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Gagal menambahkan toko. Silakan coba lagi.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $toko = Tokos::find($id);
        $products = DB::table('products')->join('tokos', 'tokos.id', '=', 'products.toko_id')->select('products.id', 'products.nama', 'products.harga', 'products.gambar', 'tokos.name as toko', 'products.rating')->where('tokos.id', $toko->id)->get();
        return view('toko.show', [
            'toko' => $toko,
            'products' => $products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $toko = Tokos::findOrFail($id);
        $current_user = Auth::user();
        if($current_user->toko_id != $toko->id){
            return redirect()->route('toko.index');
        }
        return view('toko.edit', compact('toko'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $toko = Tokos::findOrFail($id);
        $current_user = Auth::user();
        if($current_user->toko_id != $toko->id){
            return redirect()->route('toko.index');
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'alamat' => 'required|string',
            'no_telp' => 'required|string',
        ]);
        // $bannerImage = $request->file('banner_image');
        // $coverImage = $request->file('cover_image');
        // $bannerImageName = $bannerImage->hashName();
        // $coverImageName = $coverImage->hashName();

        DB::beginTransaction();

        try {
            // Create toko
            $toko = Tokos::findOrFail($id);
            $toko->update([
                'name' => $request->name,
                'description' => $request->description,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
            ]);

            // Update user with toko_id
            $current_user->update(['toko_id' => $toko->id]);

            // Store images
            // $bannerImage->storeAs('public/toko_assets', $bannerImageName);
            // $coverImage->storeAs('public/toko_assets', $coverImageName);

            DB::commit();

            return redirect()->route('toko.index')->with('success', 'Berhasil mengupdate toko');
        } catch (\Exception $e) {
            DB::rollBack();

            // // Delete uploaded files if they exist
            // if (Storage::disk('public')->exists('toko_assets/' . $bannerImageName)) {
            //     Storage::disk('public')->delete('toko_assets/' . $bannerImageName);
            // }
            // if (Storage::disk('public')->exists('toko_assets/' . $coverImageName)) {
            //     Storage::disk('public')->delete('toko_assets/' . $coverImageName);
            // }

            \Log::error('Failed to update toko: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Gagal mengupdate toko. Silakan coba lagi.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
