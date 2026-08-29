<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Produk
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" class="border-gray-300 rounded-md w-full">
                        @error('nama') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" class="border-gray-300 rounded-md w-full">{{ old('deskripsi') }}</textarea>
                        @error('deskrisi') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Harga</label>
                        <input type="number" name="harga" value="{{ old('harga') }}" class="border-gray-300 rounded-md w-full">
                        @error('harga') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Stok</label>
                        <input type="number" name="stok" value="{{ old('stok') }}" class="border-gray-300 rounded-md w-full">
                        @error('stok') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>