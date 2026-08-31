<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items.product')->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pembeli' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'product_id' => 'required|array|min:1',
            'product_id.*' => 'required|exists:products,id',
            'qty' => 'required|array',
            'qty.*' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            $order = Order::create([
                'nama_pembeli' => $validated['nama_pembeli'],
                'tanggal' => $validated['tanggal'],
                'status' => 'pending',
            ]);

            foreach ($validated['product_id'] as $index => $productId) {
                $product = Product::findOrFail($productId);

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'qty' => $validated['qty'][$index],
                    'harga_satuan' => $product->harga,
                ]);
            }

            DB::commit();

            return redirect()->route('orders.index')->with('success', 'Order berhasil dibuat');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Gagal membuat order: ' . $e->getMessage());
        }
    }

    public function show(Order $order)
    {
        $order->load('items.product');
        return view('orders.show', compact('order'));
    }

}

