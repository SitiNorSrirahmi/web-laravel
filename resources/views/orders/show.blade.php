<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Order
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <span class="font-bold text-gray-700">Pembeli:</span>
                        <p>{{ $order->nama_pembeli }}</p>
                    </div>
                    <div>
                        <span class="font-bold text-gray-700">Tanggal:</span>
                        <p>{{ \Carbon\Carbon::parse($order->tanggal)->format('d M Y') }}</p>
                    </div>
                    <div>
                        <span class="font-bold text-gray-700">Status:</span>
                        <p class="capitalize">{{ $order->status }}</p>
                    </div>
                </div>

                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="p-2 border">Produk</th>
                            <th class="p-2 border">Qty</th>
                            <th class="p-2 border">Harga Satuan</th>
                            <th class="p-2 border">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr class="border-b">
                                <td class="p-2 border">{{ $item->product->nama }}</td>
                                <td class="p-2 border">{{ $item->qty }}</td>
                                <td class="p-2 border">Rp{{ number_format($item->harga_satuan) }}</td>
                                <td class="p-2 border">Rp{{ number_format($item->qty * $item->harga_satuan) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="font-bold bg-gray-50">
                            <td colspan="3" class="p-2 border text-right">Total</td>
                            <td class="p-2 border">
                                Rp{{ number_format($order->items->sum(fn($item) => $item->qty * $item->harga_satuan)) }}
                            </td>
                        </tr>
                    </tfoot>
                </table>

                <a href="{{ route('orders.index') }}" class="inline-block mt-6 text-blue-600">Kembali</a>

            </div>
        </div>
    </div>
</x-app-layout>