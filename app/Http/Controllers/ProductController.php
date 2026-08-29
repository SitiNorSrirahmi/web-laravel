<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    $products = Product::all();
    return view('products.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|integer|min:0',
            'stok' =>'required|integer|min:0',
        ]);

        DB::beginTransaction();

        try {
            Product::create($validated);
            DB::commit();

            return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Gagal menyimpan produk: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
         return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|integer|min:0',
            'stok' =>'required|integer|min:0',
        ]);

        DB::beginTransaction();
        try {
            $product->update($validated);
            DB::commit();

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui');
        
        } catch (\Exception $e) {
            DB::rollBack();

        return redirect()->back()->with('error', 'Gagal Update produk: ' . $e->getMessage());        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        DB::beginTransaction();
        try {
            $product->delete();

        DB::commit();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');

        } catch (\Exception $e) {
        DB::rollBack();

        return redirect()->back()->with('error', 'Gagal menghapus produk: ' . $e->getMessage());
        }
    }
}
