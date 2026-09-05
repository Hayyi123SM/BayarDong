<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? 'Portal Pembayaran' }} — BayarKilat</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen flex flex-col antialiased selection:bg-blue-100">

{{-- Desktop Top Bar --}}
<header class="sticky top-0 z-40 bg-white/90 backdrop-blur-md border-b border-slate-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 160 40" fill="none" class="h-9 w-auto object-contain shrink-0">
                <rect width="40" height="40" rx="10" fill="#2563EB"/>
                <path d="M12 20L18 26L28 14" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M20 10C24 10 27 12 28 15" stroke="white" stroke-width="2" stroke-linecap="round" opacity="0.6"/>
                <text x="48" y="26" font-family="Plus Jakarta Sans, sans-serif" font-weight="700" font-size="18" fill="#0F172A">Bayar<tspan fill="#2563EB">Kilat</tspan></text>
            </svg>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">Resmi</span>
                <span class="text-xs text-slate-500 font-mono">{{ $invoiceNumber ?? 'INV/2026/09/0001' }}</span>
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
<main class="flex-1 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    @yield('content')
</main>

{{-- Footer --}}
<footer class="border-t border-slate-200 bg-white">
    <div class="max-w-7xl mx-auto px-6 py-4 flex flex-col sm:flex-row items-center justify-between gap-2 text-xs text-slate-500">
        <span>© 2026 PT BayarKilat Finansial — E-Billing &amp; Payment Gateway.</span>
        <span class="font-mono">{{ $invoiceNumber ?? '' }}</span>
    </div>
</footer>

{{-- Toast global --}}
<div x-data="toast()"
     x-show="visible"
     x-transition.opacity.duration.300ms
     class="fixed top-5 left-1/2 -translate-x-1/2 z-[99] bg-slate-900 text-white px-4 py-2.5 rounded-full shadow-2xl flex items-center gap-2 text-xs font-semibold"
     style="display:none">
    <span class="material-symbols-outlined text-emerald-400 text-[16px]">check_circle</span>
    <span x-text="message"></span>
</div>

<script>
    window.AlpineifyToast = (msg) => {
        const root = document.querySelector('[x-data="toast()"]');
        if (root && root._x_dataStack) root._x_dataStack[0].show(msg);
    };
</script>
</body>
</html>
