<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Produk
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('products.update', $product->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama', $product->nama) }}" class="border-gray-300 rounded-md w-full">
                        @error('nama') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" class="border-gray-300 rounded-md w-full">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                        @error('deskripsi') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Harga</label>
                        <input type="number" name="harga" value="{{ old('harga', $product->harga) }}" class="border-gray-300 rounded-md w-full">
                        @error('harga') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Stok</label>
                        <input type="number" name="stok" value="{{ old('stok', $product->stok) }}" class="border-gray-300 rounded-md w-full">
                        @error('stok') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
                        <a href="{{ route('products.index') }}" class="text-gray-600 hover:underline">Kembali</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>