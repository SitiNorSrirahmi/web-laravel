<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Buat Order Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('orders.store') }}" method="POST" class="space-y-4" x-data="{ rows: [0] }">
                    @csrf

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Nama Pembeli</label>
                        <input type="text" name="nama_pembeli" value="{{ old('nama_pembeli') }}" class="border-gray-300 rounded-md w-full">
                        @error('nama_pembeli') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Tanggal</label>
                        <input type="date" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" class="border-gray-300 rounded-md w-full">
                        @error('tanggal') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700 mb-2">Produk</label>

                        <template x-for="(row, index) in rows" :key="row">
                            <div class="flex gap-2 mb-2">
                                <select name="product_id[]" class="border-gray-300 rounded-md flex-1">
                                    <option value="">-- Pilih Produk --</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->nama }} (Rp{{ number_format($product->harga) }})</option>
                                    @endforeach
                                </select>

                                <input type="number" name="qty[]" min="1" value="1" placeholder="Qty" class="border-gray-300 rounded-md w-24">

                                <button type="button" @click="rows.splice(index, 1)" class="text-red-500 px-2" x-show="rows.length > 1">✕</button>
                            </div>
                        </template>

                        <button type="button" @click="rows.push(Date.now())" class="text-sm text-blue-600 hover:underline mt-1">
                            + Tambah Produk
                        </button>

                        @error('product_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                        @error('qty') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center gap-4 pt-2">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Order</button>
                        <a href="{{ route('orders.index') }}" class="text-gray-600 hover:underline">Kembali</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>