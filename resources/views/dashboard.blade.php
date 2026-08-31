<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Header Greeting Card --}}
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl shadow-lg p-8 text-white"
                 x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 -translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0">
                <p class="text-sm text-blue-100">{{ now()->translatedFormat('l, d F Y') }}</p>
                <h3 class="text-2xl font-bold mt-2">
                    @php
                        $hour = now()->hour;
                        $greeting = $hour < 11 ? 'Selamat pagi' : ($hour < 15 ? 'Selamat siang' : ($hour < 19 ? 'Selamat sore' : 'Selamat malam'));
                    @endphp
                    {{ $greeting }}, {{ auth()->user()->name }} 👋
                </h3>
                <p class="text-blue-100 mt-1 text-sm">Berikut ringkasan aktivitas terbaru Anda.</p>

                <a href="{{ route('products.index') }}"
                   class="inline-flex items-center gap-2 mt-5 bg-white text-blue-700 font-medium text-sm px-4 py-2 rounded-lg shadow hover:bg-blue-50 transition">
                    Kelola Produk
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>

            {{-- Statistik Cards --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
                <x-stat-card title="Total Produk" :value="$totalProduk" color="blue" />
                <x-stat-card title="Total Order" :value="$totalOrder" color="blue" />
                <x-stat-card title="Stok Menipis" :value="$stokMenipis" color="red" />
                <x-stat-card title="Total Pendapatan" value="Rp{{ number_format($totalPendapatan) }}" color="green" />
                <x-stat-card title="Order Pending" :value="$orderPending" color="yellow" />
            </div>

        </div>
    </div>
</x-app-layout>