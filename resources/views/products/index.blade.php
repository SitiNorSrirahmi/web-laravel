<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Produk
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                    + Tambah Produk
                </a>

                @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="p-2 border">Gambar</th>
                            <th class="p-2 border">Nama</th>
                            <th class="p-2 border">Harga</th>
                            <th class="p-2 border">Stok</th>
                            <th class="p-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr class="border-b">
                                 <td class="p-2 border">
                                    @if ($product->getFirstMediaUrl('images'))
                                        <img src="{{ $product->getFirstMediaUrl('images') }}" class="w-16 h-16 object-cover rounded">
                                    @else
                                        <span class="text-gray-400 text-xs">Tidak ada gambar</span>
                                    @endif
                            </td>
                                <td class="p-2 border">{{ $product->nama }}</td>
                                <td class="p-2 border">Rp{{ number_format($product->harga) }}</td>
                                <td class="p-2 border">{{ $product->stok }}</td>
                                <td class="p-2 border space-x-2">
                                    <a href="{{ route('products.show', $product->id) }}" class="text-blue-600">Lihat</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="text-yellow-600">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-2 text-center">Belum ada data produk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>