@php
    $navItems = [
        [
            'label' => 'Dashboard & Ringkasan',
            'route' => 'admin.dashboard',
            'icon' => 'dashboard',
        ],
        [
            'label' => 'Data Pelanggan',
            'route' => 'admin.customers',
            'icon' => 'group',
        ],
        [
            'label' => 'Buat Tagihan & Tenor',
            'route' => 'admin.invoices.create',
            'icon' => 'calculate',
        ],
        [
            'label' => 'Monitoring & Jadwal',
            'route' => 'admin.monitoring',
            'icon' => 'receipt_long',
        ],
        [
            'label' => 'WhatsApp & Log',
            'route' => 'admin.wa-logs',
            'icon' => 'chat',
        ],
        [
            'label' => 'Pengaturan Gateway & API',
            'route' => 'admin.gateway',
            'icon' => 'tune',
        ],
    ];
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? 'BayarKilat' }} — BayarKilat Billing Engine</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-surface-canvas text-on-surface font-body-md text-body-md antialiased">
<div x-data="appShell()">

{{-- Backdrop mobile: menutup sidebar saat diklik --}}
<div x-show="sidebarOpen"
     @click="closeSidebar()"
     x-cloak
     x-transition.opacity.duration.200ms
     class="fixed inset-0 z-40 bg-inverse-surface/60 lg:hidden"></div>

{{-- ===== Sidebar ===== --}}
<aside x-cloak
       class="fixed left-0 top-0 h-full w-72 bg-surface-card z-50 flex flex-col justify-between shadow-[0_1px_8px_rgba(0,0,0,0.04)]
              transition-transform duration-300 ease-out"
       :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">
    <div class="flex flex-col">
        <div class="h-16 px-space-lg flex items-center justify-between">
            <div class="flex items-center gap-space-sm">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 160 40" fill="none" class="h-9 w-auto shrink-0">
                    <rect width="40" height="40" rx="10" fill="#2563EB"/>
                    <path d="M12 20L18 26L28 14" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M20 10C24 10 27 12 28 15" stroke="white" stroke-width="2" stroke-linecap="round" opacity="0.6"/>
                    <text x="48" y="26" font-family="Plus Jakarta Sans, sans-serif" font-weight="700" font-size="18" fill="#0F172A">Bayar<tspan fill="#2563EB">Kilat</tspan></text>
                </svg>
                <div class="flex flex-col">
                    <span class="font-headline-sm text-headline-sm text-text-primary leading-tight tracking-tight">BayarKilat</span>
                    <span class="font-label-sm text-label-sm text-text-tertiary uppercase tracking-wider">Billing Engine</span>
                </div>
            </div>
            <button class="lg:hidden text-text-tertiary hover:text-text-primary transition-colors p-space-2xs"
                    @click="closeSidebar()" type="button" aria-label="Tutup menu">
                <span class="material-symbols-outlined text-[22px]">close</span>
            </button>
        </div>

        <div class="px-space-md py-space-sm">
            <div class="px-space-sm py-space-xs font-label-sm text-label-sm uppercase tracking-wider text-text-tertiary">Menu Navigasi</div>
        </div>

        <nav class="flex flex-col gap-space-xs px-space-md">
            @foreach ($navItems as $item)
                <a class="flex items-center gap-space-md px-space-md py-space-sm rounded-lg transition-colors
                          @if (request()->routeIs($item['route']))
                              bg-secondary text-on-secondary font-semibold shadow-[0_1px_3px_0_rgba(15,23,42,0.05)]
                          @else
                              text-text-secondary hover:bg-surface-container-high hover:text-on-surface
                          @endif"
                   href="{{ route($item['route']) }}"
                   @click="closeSidebar()">
                    <span class="material-symbols-outlined text-[20px]">{{ $item['icon'] }}</span>
                    <span class="font-label-lg text-label-lg">{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>
    </div>

    <div class="flex flex-col gap-space-md p-space-md bg-surface-subtle">
        <div class="bg-surface-card rounded-lg p-space-sm flex flex-col gap-space-xs">
            <div class="font-label-sm text-label-sm text-text-tertiary uppercase tracking-wider">Konektivitas Gateway</div>
            <div class="flex items-center justify-between py-space-2xs">
                <span class="font-body-sm text-body-sm text-text-secondary">Duitku PG</span>
                <span class="inline-flex items-center gap-space-xs font-label-sm text-label-sm text-status-success-base">
                    <span class="w-2 h-2 rounded-full bg-status-success-base"></span>Terhubung
                </span>
            </div>
            <div class="flex items-center justify-between py-space-2xs">
                <span class="font-body-sm text-body-sm text-text-secondary">WA Gateway</span>
                <span class="inline-flex items-center gap-space-xs font-label-sm text-label-sm text-status-success-base">
                    <span class="w-2 h-2 rounded-full bg-status-success-base"></span>Aktif
                </span>
            </div>
            <div class="flex items-center justify-between py-space-2xs">
                <span class="font-body-sm text-body-sm text-text-secondary">Cron Scheduler</span>
                <span class="inline-flex items-center gap-space-xs font-label-sm text-label-sm text-status-info-base">
                    <span class="w-2 h-2 rounded-full bg-status-info-base"></span>Normal
                </span>
            </div>
        </div>

        <div class="flex items-center justify-between pt-space-xs">
            <div class="flex items-center gap-space-sm">
                <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center">
                    <span class="material-symbols-outlined text-on-primary text-[18px]">person</span>
                </div>
                <div class="flex flex-col">
                    <span class="font-label-md text-label-md text-text-primary leading-tight">Admin Finance</span>
                    <span class="font-body-sm text-body-sm text-text-tertiary">ID: #ADM-08</span>
                </div>
            </div>
            <button class="text-text-tertiary hover:text-error transition-colors p-space-xs rounded-lg hover:bg-surface-container-high"
                    title="Keluar Aplikasi" type="button">
                <span class="material-symbols-outlined text-[20px]">logout</span>
            </button>
        </div>
    </div>
</aside>

{{-- ===== Main Area ===== --}}
<div class="lg:pl-72">
    <header class="fixed top-0 left-0 right-0 lg:left-72 h-16 bg-surface-card shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-30 flex items-center justify-between gap-space-md px-space-sm sm:px-space-lg">
        <div class="flex items-center gap-space-sm flex-1 min-w-0">
            <button class="lg:hidden p-space-xs -ml-space-2xs rounded-lg text-text-secondary hover:text-text-primary hover:bg-surface-container-high transition-colors"
                    @click="toggleSidebar()" type="button" aria-label="Buka menu">
                <span class="material-symbols-outlined text-[24px]">menu</span>
            </button>
            <div class="relative w-full max-w-md hidden md:block">
                <span class="material-symbols-outlined absolute left-space-md top-1/2 -translate-y-1/2 text-text-tertiary text-[20px]">search</span>
                <input class="w-full pl-10 pr-space-md py-space-xs bg-surface-canvas rounded-lg text-text-primary font-body-sm text-body-sm placeholder:text-text-tertiary focus:outline-none focus:bg-surface-card"
                       placeholder="Cari nomor INV/..., nama pelanggan, no. WA..." type="text">
            </div>
            <span class="inline-flex items-center gap-space-xs px-space-sm py-space-2xs rounded-full bg-status-info-bg text-status-info-base font-label-sm text-label-sm whitespace-nowrap hidden sm:inline-flex">
                <span class="w-1.5 h-1.5 rounded-full bg-status-info-base"></span>Production Gateway
            </span>
        </div>

        <div class="flex items-center gap-space-xs sm:gap-space-md">
            <a class="inline-flex items-center gap-space-xs px-space-xs sm:px-space-md py-space-xs rounded-lg bg-surface-canvas text-text-secondary hover:text-text-primary hover:bg-surface-container-high transition-colors font-label-md text-label-md"
               href="{{ route('admin.monitoring') }}" title="Sinkronisasi Duitku">
                <span class="material-symbols-outlined text-[18px]">sync</span>
                <span class="hidden sm:inline">Sinkronisasi Duitku</span>
            </a>
            <a class="inline-flex items-center gap-space-xs px-space-xs sm:px-space-md py-space-xs rounded-lg bg-secondary text-on-secondary hover:bg-secondary-container transition-colors font-label-md text-label-md"
               href="{{ route('admin.invoices.create') }}" title="Buat Tagihan Baru">
                <span class="material-symbols-outlined text-[18px]">add</span>
                <span class="hidden sm:inline">Buat Tagihan Baru</span>
            </a>
            <div class="relative">
                <button class="relative p-space-xs rounded-lg text-text-secondary hover:text-text-primary hover:bg-surface-container-high transition-colors" type="button">
                    <span class="material-symbols-outlined text-[22px]">notifications</span>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-error ring-2 ring-surface-card"></span>
                </button>
            </div>
            <div class="flex items-center gap-space-sm pl-space-xs">
                <div class="flex-col text-right hidden lg:flex">
                    <span class="font-label-md text-label-md text-text-primary">Putri Rahma</span>
                    <span class="font-body-sm text-body-sm text-text-tertiary">Finance Officer</span>
                </div>
                <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center">
                    <span class="material-symbols-outlined text-on-primary text-[18px]">person</span>
                </div>
            </div>
        </div>
    </header>

    <main class="px-space-sm sm:px-space-lg pt-20 pb-space-5xl min-h-screen">
        @yield('content')
    </main>
</div>

{{-- Toast global untuk komponen Alpine --}}
<div x-data="toast()"
     x-show="visible"
     x-transition.opacity.duration.300ms
     class="fixed bottom-24 right-8 bg-inverse-surface text-inverse-on-surface px-space-lg py-space-md rounded-xl shadow-xl flex items-center gap-space-md z-50"
     style="display:none">
    <span class="material-symbols-outlined text-status-success-base text-[24px]">check_circle</span>
    <div class="flex flex-col">
        <span class="font-label-md text-label-md text-on-primary font-semibold">Berhasil</span>
        <span class="font-body-sm text-body-sm text-text-tertiary" x-text="message"></span>
    </div>
</div>

<script>
    // Pintu bagi komponen Alpine lain untuk memicu toast global di halaman admin.
    window.AlpineifyToast = (msg) => {
        const root = document.querySelector('[x-data="toast()"]');
        if (root && root._x_dataStack) root._x_dataStack[0].show(msg);
    };
</script>
</div>
</body>
</html>
