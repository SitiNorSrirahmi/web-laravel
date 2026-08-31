<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Order
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <a href="{{ route('orders.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                    + Buat Order
                </a>

                @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="p-2 border">Pembeli</th>
                            <th class="p-2 border">Tanggal</th>
                            <th class="p-2 border">Jumlah Item</th>
                            <th class="p-2 border">Status</th>
                            <th class="p-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr class="border-b">
                                <td class="p-2 border">{{ $order->nama_pembeli }}</td>
                                <td class="p-2 border">{{ \Carbon\Carbon::parse($order->tanggal)->format('d M Y') }}</td>
                                <td class="p-2 border">{{ $order->items->count() }} produk</td>
                                <td class="p-2 border capitalize">{{ $order->status }}</td>
                                <td class="p-2 border">
                                    <a href="{{ route('orders.show', $order->id) }}" class="text-blue-600">Lihat</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-2 text-center">Belum ada order.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>