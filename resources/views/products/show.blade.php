<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Produk
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if ($product->getFirstMediaUrl('images'))
                    <img src="{{ $product->getFirstMediaUrl('images') }}" class="w-48 h-48 object-cover rounded mb-6">
                @endif

                <div class="grid grid-cols-2 gap-x-6 gap-y-4">
                    <div>
                        <span class="font-bold text-black-700">Nama</span>
                        <p>{{ $product->nama }}</p>
                    </div>

                    <div>
                        <span class="font-bold text-black-700">Deskripsi</span>
                        <p>{{ $product->deskripsi }}</p>
                    </div>

                    <div>
                        <span class="font-bold text-black-700">Harga</span>
                        <p>Rp{{ number_format($product->harga) }}</p>
                    </div>

                    <div>
                        <span class="font-bold text-black-700">Stok</span>
                        <p>{{ $product->stok }}</p>
                    </div>
                </div>

                <a href="{{ route('products.index') }}" class="inline-block mt-6 text-blue-600">Kembali</a>

            </div>
        </div>
    </div>
</x-app-layout>