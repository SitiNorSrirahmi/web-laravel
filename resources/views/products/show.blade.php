<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Produk
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-3">

                <div>
                    <span class="font-medium text-gray-700">Nama:</span>
                    <p>{{ $product->nama }}</p>
                </div>

                <div>
                    <span class="font-medium text-gray-700">Deskripsi:</span>
                    <p>{{ $product->deskripsi }}</p>
                </div>

                <div>
                    <span class="font-medium text-gray-700">Harga:</span>
                    <p>Rp{{ number_format($product->harga) }}</p>
                </div>

                <div>
                    <span class="font-medium text-gray-700">Stok:</span>
                    <p>{{ $product->stok }}</p>
                </div>

                <a href="{{ route('products.index') }}" class="inline-block mt-4 text-blue-600">Kembali</a>

            </div>
        </div>
    </div>
</x-app-layout>