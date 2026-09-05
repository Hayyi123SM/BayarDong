<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <title>{{ $pageTitle ?? 'Portal Pembayaran' }} — BayarKilat</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen flex flex-col justify-between antialiased selection:bg-blue-100">

{{-- Mobile Container Wrapper --}}
<div class="w-full max-w-md mx-auto min-h-screen flex flex-col bg-slate-50/50 shadow-xl relative pb-32">

    {{-- Top Sticky Header --}}
    <header class="sticky top-0 z-40 bg-white/90 backdrop-blur-md border-b border-slate-100 px-4 py-3.5 transition-all">
        <div class="flex items-center justify-between gap-3">
            <div class="flex items-center gap-2.5">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 160 40" fill="none" class="h-9 w-auto object-contain shrink-0">
                    <rect width="40" height="40" rx="10" fill="#2563EB"/>
                    <path d="M12 20L18 26L28 14" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M20 10C24 10 27 12 28 15" stroke="white" stroke-width="2" stroke-linecap="round" opacity="0.6"/>
                    <text x="48" y="26" font-family="Plus Jakarta Sans, sans-serif" font-weight="700" font-size="18" fill="#0F172A">Bayar<tspan fill="#2563EB">Kilat</tspan></text>
                </svg>
                <div class="flex flex-col">
                    <div class="flex items-center gap-1.5">
                        <span class="font-bold text-slate-900 text-sm tracking-tight leading-none">BayarKilat</span>
                        <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">Resmi</span>
                    </div>
                    <span class="text-[11px] text-slate-500 font-mono mt-0.5">{{ $invoiceNumber ?? 'INV/2026/09/0001' }}</span>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <div class="h-8 w-8 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center border border-slate-200">
                    <span class="material-symbols-outlined text-[18px]">verified_user</span>
                </div>
            </div>
        </div>
    </header>

    {{-- Main Content --}}
    <main class="flex-1 px-4 pt-4 space-y-4">
        @yield('content')
    </main>

    {{-- Fixed Bottom Action Bar --}}
    @hasSection('bottom-bar')
        <div class="fixed bottom-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-lg border-t border-slate-200/80 shadow-[0_-8px_25px_rgba(0,0,0,0.06)]">
            <div class="max-w-md mx-auto px-4 py-3 space-y-2">
                @yield('bottom-bar')
            </div>
        </div>
    @endif

</div>

{{-- Toast global untuk komponen Alpine (portal) --}}
<div x-data="toast()"
     x-show="visible"
     x-transition.opacity.duration.300ms
     class="fixed top-5 left-1/2 -translate-x-1/2 z-[99] bg-slate-900 text-white px-4 py-2.5 rounded-full shadow-2xl flex items-center gap-2 text-xs font-semibold"
     style="display:none">
    <span class="material-symbols-outlined text-emerald-400 text-[16px]">check_circle</span>
    <span x-text="message"></span>
</div>

<script>
    // Pintu global untuk toast portal
    window.AlpineifyToast = (msg) => {
        const root = document.querySelector('[x-data="toast()"]');
        if (root && root._x_dataStack) root._x_dataStack[0].show(msg);
    };
</script>
</body>
</html>
