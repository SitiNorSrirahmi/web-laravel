<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gudang Sistem Stok</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Fraunces', serif; }
        .font-mono { font-family: 'JetBrains Mono', monospace; }
    </style>
</head>
<body class="bg-[#FBF9F4] dark:bg-[#0a0a0a] text-[#1b1b18] flex flex-col items-center min-h-screen p-6 lg:p-10">

    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-10 not-has-[nav]:hidden">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                    >
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <main class="w-full lg:max-w-4xl max-w-[335px] flex-1 flex flex-col items-center justify-center text-center gap-8">

        <span class="font-mono text-[11px] tracking-widest text-[#2F5D46] uppercase">
            Kartu Stok Digital
        </span>

        <h1 class="font-display text-3xl lg:text-4xl font-medium leading-tight max-w-lg">
            Stok, barang masuk, dan pelunasan <span class="italic text-[#2F5D46]">tercatat rapi.</span>
        </h1>

        <p class="text-[#706f6c] dark:text-[#A1A09A] max-w-md text-sm leading-relaxed">
            Kelola data produk, faktur barang masuk, faktur pembelian, dan pelunasan
            dalam satu aplikasi tanpa catatan kertas yang gampang hilang.
        </p>



        <!-- Signature: kartu stok mini -->
        <div class="w-full max-w-sm border border-[#DAD3C0] dark:border-[#3E3E3A] rounded-sm bg-white/60 dark:bg-white/5 mt-4 text-left">
            <div class="px-4 py-3 border-b border-[#DAD3C0] dark:border-[#3E3E3A] flex justify-between items-baseline">
                <span class="font-display  text-sm">Kartu Stok</span>
                <span class="font-mono text-[10px] text-[#706f6c] dark:text-[#A1A09A]">Live</span>
            </div>
            <div class="divide-y divide-[#DAD3C0] dark:divide-[#3E3E3A]">
                @forelse ($produkTerbaru as $produk)
            <div class="ledger-row px-5 py-3 grid grid-cols-[1fr_auto] gap-3 text-sm items-center">
                <span>{{ $produk->nama }}</span>
                <span class="font-mono text-[var(--ink)]/70">{{ $produk->stok }} pcs</span>
            </div>
                @empty
    <div class="px-5 py-3 text-sm text-[var(--ink)]/50 text-center">
        Belum ada produk.
    </div>
@endforelse
            </div>
        </div>
    </main>

    <footer class="w-full lg:max-w-4xl max-w-[335px] text-center text-xs text-[#706f6c] dark:text-[#A1A09A] mt-10">
        &copy; {{ date('Y') }} Gudang
    </footer>

</body>
</html>