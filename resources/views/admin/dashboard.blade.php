@extends('layouts.admin')

@section('content')
<div class="flex flex-col w-full gap-space-2xl">
<!-- Header Sub-Bar with Contextual Metadata & Direct Execution Triggers -->
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-space-lg bg-surface-card p-space-xl rounded-xl shadow-sm relative overflow-hidden">
<div class="absolute -right-12 -top-12 w-64 h-64 bg-secondary/5 rounded-full blur-3xl pointer-events-none"></div>
<div class="flex flex-col gap-space-2xs z-10">
<div class="flex items-center gap-space-sm">
<span class="inline-flex items-center gap-space-xs px-space-sm py-space-2xs rounded-full bg-status-success-bg text-status-success-base font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-status-success-base animate-pulse"></span>
          Payment Callback Engine Active
        </span>
<span class="font-tabular-numeric text-tabular-numeric text-text-tertiary">v2.4.12-prod</span>
</div>
<h1 class="font-headline-lg text-headline-lg text-text-primary tracking-tight">Ikhtisar Rekonsiliasi &amp; Tagihan Real-Time</h1>
<p class="font-body-md text-body-md text-text-secondary">Sinkronisasi otomatis Duitku PG webhook dengan automated reminders WhatsApp Business API.</p>
</div>
<div class="flex flex-wrap items-center gap-space-md z-10">
<div class="flex items-center gap-space-xs px-space-md py-space-sm rounded-lg bg-surface-subtle text-text-secondary">
<span class="material-symbols-outlined text-[18px] text-text-tertiary">event</span>
<span class="font-label-md text-label-md">Kamis, 26 Okt 2026</span>
</div>
<button class="inline-flex items-center gap-space-xs px-space-lg py-space-sm rounded-lg bg-surface-canvas text-text-primary hover:bg-surface-container transition-all font-label-lg text-label-lg shadow-sm" type="button">
<span class="material-symbols-outlined text-[18px]">download</span>
<span>Unduh Jurnal Finansial</span>
</button>
<button class="inline-flex items-center gap-space-xs px-space-lg py-space-sm rounded-lg bg-secondary text-on-secondary hover:bg-secondary-container transition-all font-label-lg text-label-lg shadow-sm" type="button">
<span class="material-symbols-outlined text-[18px]">flash_on</span>
<span>Trigger Cron Manual</span>
</button>
</div>
</div>
<!-- 1. Top KPI Summary Cards (4 Columns) -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-space-lg">
<!-- Card 1: Total Piutang Aktif -->
<div class="bg-surface-card rounded-xl p-space-xl shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-shadow">
<div class="flex items-start justify-between">
<div class="flex flex-col gap-space-2xs">
<span class="font-label-sm text-label-sm text-text-tertiary uppercase tracking-wider">Total Piutang Aktif</span>
<span class="font-display-currency text-display-currency text-text-primary">Rp 485,25<span class="text-text-tertiary font-headline-sm text-headline-sm">jt</span></span>
</div>
<div class="w-10 h-10 rounded-xl bg-surface-subtle flex items-center justify-center text-text-secondary group-hover:bg-primary-fixed group-hover:text-primary transition-colors">
<span class="material-symbols-outlined text-[22px]">account_balance_wallet</span>
</div>
</div>
<div class="pt-space-md mt-space-sm flex items-center justify-between">
<span class="inline-flex items-center gap-space-xs font-label-sm text-label-sm text-text-secondary">
<span class="w-2 h-2 rounded-full bg-brand-indigo"></span>
          124 Invoice Aktif Berjalan
        </span>
<span class="font-label-sm text-label-sm text-brand-indigo hover:underline cursor-pointer">Buka Ledger →</span>
</div>
</div>
<!-- Card 2: Realisasi Bulan Ini -->
<div class="bg-surface-card rounded-xl p-space-xl shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-shadow">
<div class="flex items-start justify-between">
<div class="flex flex-col gap-space-2xs">
<span class="font-label-sm text-label-sm text-text-tertiary uppercase tracking-wider">Realisasi Bulan Ini</span>
<span class="font-display-currency text-display-currency text-status-success-base">Rp 142,85<span class="text-status-success-base/70 font-headline-sm text-headline-sm">jt</span></span>
</div>
<div class="w-10 h-10 rounded-xl bg-status-success-bg flex items-center justify-center text-status-success-base">
<span class="material-symbols-outlined text-[22px]" style="font-variation-settings: 'FILL' 1;">trending_up</span>
</div>
</div>
<div class="pt-space-md mt-space-sm flex items-center justify-between">
<span class="inline-flex items-center gap-space-2xs px-space-xs py-space-2xs rounded-full bg-status-success-bg font-label-sm text-label-sm text-status-success-base">
<span class="material-symbols-outlined text-[14px]">north_east</span>
          +18.4% MoM
        </span>
<span class="font-body-sm text-body-sm text-text-tertiary">100% Otomatis PG</span>
</div>
</div>
<!-- Card 3: Jatuh Tempo Hari Ini -->
<div class="bg-surface-card rounded-xl p-space-xl shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-shadow">
<div class="flex items-start justify-between">
<div class="flex flex-col gap-space-2xs">
<span class="font-label-sm text-label-sm text-text-tertiary uppercase tracking-wider">Jatuh Tempo Hari-H</span>
<span class="font-display-currency text-display-currency text-status-warning-base">Rp 24,66<span class="text-status-warning-base/70 font-headline-sm text-headline-sm">jt</span></span>
</div>
<div class="w-10 h-10 rounded-xl bg-status-warning-bg flex items-center justify-center text-status-warning-base">
<span class="material-symbols-outlined text-[22px]">notification_important</span>
</div>
</div>
<div class="pt-space-md mt-space-sm flex items-center justify-between">
<span class="font-label-sm text-label-sm text-text-secondary">28 Termin Terjadwal</span>
<span class="inline-flex items-center gap-space-2xs font-label-sm text-label-sm text-status-warning-base bg-status-warning-bg px-space-xs py-space-2xs rounded-md">
<span class="material-symbols-outlined text-[14px]">schedule</span>
          Reminded
        </span>
</div>
</div>
<!-- Card 4: Tunggakan / Overdue -->
<div class="bg-surface-card rounded-xl p-space-xl shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-shadow">
<div class="flex items-start justify-between">
<div class="flex flex-col gap-space-2xs">
<span class="font-label-sm text-label-sm text-text-tertiary uppercase tracking-wider">Tunggakan (&gt;3 Hari)</span>
<span class="font-display-currency text-display-currency text-status-danger-base">Rp 18,20<span class="text-status-danger-base/70 font-headline-sm text-headline-sm">jt</span></span>
</div>
<div class="w-10 h-10 rounded-xl bg-status-danger-bg flex items-center justify-center text-status-danger-base animate-pulse">
<span class="material-symbols-outlined text-[22px]">error</span>
</div>
</div>
<div class="pt-space-md mt-space-sm flex items-center justify-between">
<span class="font-label-sm text-label-sm text-status-danger-base font-semibold">14 Termin Butuh Eskalasi</span>
<span class="font-label-sm text-label-sm text-text-secondary underline cursor-pointer hover:text-text-primary">Kirim Dunning →</span>
</div>
</div>
</div>
<!-- 2. Live Gateway & Webhook Health Status Card -->
<div class="bg-surface-card rounded-xl p-space-xl shadow-sm flex flex-col gap-space-lg">
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-space-sm">
<div class="flex items-center gap-space-sm">
<div class="w-3 h-3 rounded-full bg-status-success-base animate-ping"></div>
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-text-primary">Konektivitas Transaksional &amp; Webhook Sentinel</span>
<span class="font-body-sm text-body-sm text-text-tertiary">Monitoring real-time latency, validasi SHA256/MD5 signature, &amp; throughput gateway</span>
</div>
</div>
<div class="flex items-center gap-space-xs font-tabular-numeric text-tabular-numeric text-text-secondary bg-surface-subtle px-space-md py-space-xs rounded-lg">
<span class="material-symbols-outlined text-[16px] text-text-tertiary">history</span>
<span>Sinkronisasi otomatis setiap 60 detik</span>
</div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-space-md">
<!-- Duitku PG Webhook -->
<div class="p-space-lg rounded-xl bg-surface-subtle flex flex-col gap-space-md">
<div class="flex items-start justify-between">
<div class="flex items-center gap-space-sm">
<div class="w-9 h-9 rounded-lg bg-surface-card flex items-center justify-center shadow-xs">
<span class="material-symbols-outlined text-secondary text-[20px]">payments</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-text-primary">Duitku PG Callback</span>
<span class="font-body-sm text-body-sm text-text-tertiary">Signature Validated (SHA256)</span>
</div>
</div>
<span class="inline-flex items-center gap-space-2xs px-space-sm py-space-2xs rounded-full bg-status-success-bg text-status-success-base font-label-sm text-label-sm">
            99.8% Success
          </span>
</div>
<div class="flex items-center justify-between pt-space-xs">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-text-tertiary">Avg Response Time</span>
<span class="font-tabular-numeric text-tabular-numeric text-text-primary">420 ms</span>
</div>
<div class="flex flex-col items-end">
<span class="font-label-sm text-label-sm text-text-tertiary">Failed Callbacks (24h)</span>
<span class="font-tabular-numeric text-tabular-numeric text-status-success-base">0 Req</span>
</div>
</div>
</div>
<!-- Fallback Cron Scheduler -->
<div class="p-space-lg rounded-xl bg-surface-subtle flex flex-col gap-space-md">
<div class="flex items-start justify-between">
<div class="flex items-center gap-space-sm">
<div class="w-9 h-9 rounded-lg bg-surface-card flex items-center justify-center shadow-xs">
<span class="material-symbols-outlined text-brand-indigo text-[20px]">sync_saved_locally</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-text-primary">Fallback Cron Reconciler</span>
<span class="font-body-sm text-body-sm text-text-tertiary">Job ID: #CRON-DUITKU-CHK</span>
</div>
</div>
<span class="inline-flex items-center gap-space-2xs px-space-sm py-space-2xs rounded-full bg-status-info-bg text-status-info-base font-label-sm text-label-sm">
            Optimal
          </span>
</div>
<div class="flex items-center justify-between pt-space-xs">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-text-tertiary">Terakhir Dieksekusi</span>
<span class="font-tabular-numeric text-tabular-numeric text-text-primary">4 menit lalu</span>
</div>
<div class="flex flex-col items-end">
<span class="font-label-sm text-label-sm text-text-tertiary">Audit Batch</span>
<span class="font-tabular-numeric text-tabular-numeric text-status-success-base">12 Terverifikasi (0 Gagal)</span>
</div>
</div>
</div>
<!-- WhatsApp Gateway -->
<div class="p-space-lg rounded-xl bg-surface-subtle flex flex-col gap-space-md">
<div class="flex items-start justify-between">
<div class="flex items-center gap-space-sm">
<div class="w-9 h-9 rounded-lg bg-surface-card flex items-center justify-center shadow-xs">
<span class="material-symbols-outlined text-status-success-base text-[20px]">sms</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-text-primary">WA Cloud Engine API</span>
<span class="font-body-sm text-body-sm text-text-tertiary">Official Business Tier-2</span>
</div>
</div>
<span class="inline-flex items-center gap-space-2xs px-space-sm py-space-2xs rounded-full bg-status-success-bg text-status-success-base font-label-sm text-label-sm">
            98.4% Delivered
          </span>
</div>
<div class="flex items-center justify-between pt-space-xs">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-text-tertiary">Antrean Jadwal (14:00)</span>
<span class="font-tabular-numeric text-tabular-numeric text-status-warning-base font-semibold">3 Pesan Queued</span>
</div>
<div class="flex flex-col items-end">
<span class="font-label-sm text-label-sm text-text-tertiary">Throughput TPS</span>
<span class="font-tabular-numeric text-tabular-numeric text-text-primary">18 msg/detik</span>
</div>
</div>
</div>
</div>
</div>
<!-- 3. Main Content Grid (8-col Left, 4-col Right) -->
<div class="grid grid-cols-1 xl:grid-cols-12 gap-space-xl">
<!-- Left Section (Col-8): Real-Time Inbound Transaction Table -->
<div class="xl:col-span-8 flex flex-col gap-space-lg bg-surface-card p-space-xl rounded-xl shadow-sm">
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-space-md">
<div class="flex flex-col gap-space-2xs">
<div class="flex items-center gap-space-sm">
<h2 class="font-headline-md text-headline-md text-text-primary">Aktivitas Transaksi Masuk Real-Time</h2>
<span class="px-space-xs py-space-2xs rounded bg-status-info-bg text-status-info-base font-label-sm text-label-sm">Live Callbacks</span>
</div>
<p class="font-body-sm text-body-sm text-text-tertiary">Daftar rekonsiliasi seketika dari Duitku PG webhook endpoint</p>
</div>
<div class="flex items-center gap-space-xs">
<button class="p-space-xs rounded-lg bg-surface-subtle text-text-secondary hover:text-text-primary transition-colors" title="Export CSV" type="button">
<span class="material-symbols-outlined text-[20px]">file_download</span>
</button>
<button class="p-space-xs rounded-lg bg-surface-subtle text-text-secondary hover:text-text-primary transition-colors" title="Filter Lanjutan" type="button">
<span class="material-symbols-outlined text-[20px]">filter_list</span>
</button>
</div>
</div>
<!-- Filter Tabs -->
<div class="flex items-center gap-space-xs overflow-x-auto pb-space-xs">
<button class="px-space-md py-space-xs rounded-lg bg-secondary text-on-secondary font-label-md text-label-md whitespace-nowrap shadow-sm" type="button">Semua Transaksi (48)</button>
<button class="px-space-md py-space-xs rounded-lg bg-surface-subtle text-text-secondary hover:text-text-primary font-label-md text-label-md whitespace-nowrap transition-colors" type="button">Virtual Account (31)</button>
<button class="px-space-md py-space-xs rounded-lg bg-surface-subtle text-text-secondary hover:text-text-primary font-label-md text-label-md whitespace-nowrap transition-colors" type="button">QRIS Dinamis (12)</button>
<button class="px-space-md py-space-xs rounded-lg bg-surface-subtle text-text-secondary hover:text-text-primary font-label-md text-label-md whitespace-nowrap transition-colors" type="button">E-Wallet (5)</button>
<button class="px-space-md py-space-xs rounded-lg bg-surface-subtle text-text-secondary hover:text-text-primary font-label-md text-label-md whitespace-nowrap transition-colors" type="button">Settlement Dini (3)</button>
</div>
<!-- Transaction Feed Table -->
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead>
<tr class="bg-surface-subtle text-text-tertiary font-label-sm text-label-sm uppercase tracking-wider">
<th class="py-space-sm px-space-md rounded-l-lg">Waktu Bayar</th>
<th class="py-space-sm px-space-md">Invoice &amp; Termin</th>
<th class="py-space-sm px-space-md">Pelanggan</th>
<th class="py-space-sm px-space-md">Metode PG</th>
<th class="py-space-sm px-space-md text-right">Nominal</th>
<th class="py-space-sm px-space-md text-center">Status</th>
<th class="py-space-sm px-space-md rounded-r-lg text-right">Aksi</th>
</tr>
</thead>
<tbody class="divide-y-0">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="py-space-md px-space-md whitespace-nowrap">
<div class="flex flex-col">
<span class="font-tabular-numeric text-tabular-numeric text-text-primary">09:22:14 WIB</span>
<span class="font-body-sm text-body-sm text-text-tertiary">26 Okt 2026</span>
</div>
</td>
<td class="py-space-md px-space-md whitespace-nowrap">
<div class="flex flex-col">
<span class="font-label-md text-label-md text-brand-indigo font-semibold">INV/2026/09/0001</span>
<span class="font-body-sm text-body-sm text-text-secondary">Cicilan Ke-2 dari 3</span>
</div>
</td>
<td class="py-space-md px-space-md whitespace-nowrap">
<div class="flex items-center gap-space-sm">
<div class="w-7 h-7 rounded-full bg-primary-fixed text-primary font-label-sm text-label-sm flex items-center justify-center font-bold">FR</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-text-primary">Fahmi Ramadhan</span>
<span class="font-body-sm text-body-sm text-text-tertiary">+62 812-8821-9901</span>
</div>
</div>
</td>
<td class="py-space-md px-space-md whitespace-nowrap">
<div class="inline-flex items-center gap-space-xs px-space-sm py-space-2xs rounded bg-surface-subtle font-label-sm text-label-sm text-text-secondary">
<span class="font-bold text-secondary">BCA</span> VA
                </div>
</td>
<td class="py-space-md px-space-md whitespace-nowrap text-right font-tabular-numeric text-tabular-numeric text-text-primary font-semibold">
                Rp 335.833
              </td>
<td class="py-space-md px-space-md whitespace-nowrap text-center">
<span class="inline-flex items-center gap-space-xs px-space-sm py-space-2xs rounded-full bg-status-success-bg text-status-success-base font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-status-success-base"></span>
                  Auto-Reconciled
                </span>
</td>
<td class="py-space-md px-space-md whitespace-nowrap text-right">
<div class="flex items-center justify-end gap-space-xs">
<button class="p-space-xs rounded-lg hover:bg-surface-subtle text-text-secondary hover:text-text-primary transition-colors" title="Lihat Detail" type="button">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</button>
<button class="p-space-xs rounded-lg hover:bg-status-success-bg text-text-secondary hover:text-status-success-base transition-colors" title="Kirim Ulang Kuitansi WA" type="button">
<span class="material-symbols-outlined text-[18px]">send</span>
</button>
</div>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="py-space-md px-space-md whitespace-nowrap">
<div class="flex flex-col">
<span class="font-tabular-numeric text-tabular-numeric text-text-primary">09:14:02 WIB</span>
<span class="font-body-sm text-body-sm text-text-tertiary">26 Okt 2026</span>
</div>
</td>
<td class="py-space-md px-space-md whitespace-nowrap">
<div class="flex flex-col">
<span class="font-label-md text-label-md text-brand-indigo font-semibold">INV/2026/09/0142</span>
<span class="font-body-sm text-body-sm text-text-secondary">Cicilan Ke-1 dari 6</span>
</div>
</td>
<td class="py-space-md px-space-md whitespace-nowrap">
<div class="flex items-center gap-space-sm">
<div class="w-7 h-7 rounded-full bg-surface-variant text-secondary font-label-sm text-label-sm flex items-center justify-center font-bold">AS</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-text-primary">Anisa Suryani</span>
<span class="font-body-sm text-body-sm text-text-tertiary">+62 856-1192-3329</span>
</div>
</div>
</td>
<td class="py-space-md px-space-md whitespace-nowrap">
<div class="inline-flex items-center gap-space-xs px-space-sm py-space-2xs rounded bg-surface-subtle font-label-sm text-label-sm text-text-secondary">
<span class="font-bold text-text-primary">QRIS</span> Duitku
                </div>
</td>
<td class="py-space-md px-space-md whitespace-nowrap text-right font-tabular-numeric text-tabular-numeric text-text-primary font-semibold">
                Rp 1.250.000
              </td>
<td class="py-space-md px-space-md whitespace-nowrap text-center">
<span class="inline-flex items-center gap-space-xs px-space-sm py-space-2xs rounded-full bg-status-success-bg text-status-success-base font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-status-success-base"></span>
                  Auto-Reconciled
                </span>
</td>
<td class="py-space-md px-space-md whitespace-nowrap text-right">
<div class="flex items-center justify-end gap-space-xs">
<button class="p-space-xs rounded-lg hover:bg-surface-subtle text-text-secondary hover:text-text-primary transition-colors" title="Lihat Detail" type="button">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</button>
<button class="p-space-xs rounded-lg hover:bg-status-success-bg text-text-secondary hover:text-status-success-base transition-colors" title="Kirim Ulang Kuitansi WA" type="button">
<span class="material-symbols-outlined text-[18px]">send</span>
</button>
</div>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="py-space-md px-space-md whitespace-nowrap">
<div class="flex flex-col">
<span class="font-tabular-numeric text-tabular-numeric text-text-primary">08:48:55 WIB</span>
<span class="font-body-sm text-body-sm text-text-tertiary">26 Okt 2026</span>
</div>
</td>
<td class="py-space-md px-space-md whitespace-nowrap">
<div class="flex flex-col">
<span class="font-label-md text-label-md text-brand-indigo font-semibold">INV/2026/08/0989</span>
<span class="font-body-sm text-body-sm text-text-secondary">Pelunasan Penuh (Lunas)</span>
</div>
</td>
<td class="py-space-md px-space-md whitespace-nowrap">
<div class="flex items-center gap-space-sm">
<div class="w-7 h-7 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm flex items-center justify-center font-bold">BW</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-text-primary">Budi Wicaksono</span>
<span class="font-body-sm text-body-sm text-text-tertiary">+62 813-4402-8871</span>
</div>
</div>
</td>
<td class="py-space-md px-space-md whitespace-nowrap">
<div class="inline-flex items-center gap-space-xs px-space-sm py-space-2xs rounded bg-surface-subtle font-label-sm text-label-sm text-text-secondary">
<span class="font-bold text-status-warning-base">Mandiri</span> VA
                </div>
</td>
<td class="py-space-md px-space-md whitespace-nowrap text-right font-tabular-numeric text-tabular-numeric text-text-primary font-semibold">
                Rp 2.850.000
              </td>
<td class="py-space-md px-space-md whitespace-nowrap text-center">
<span class="inline-flex items-center gap-space-xs px-space-sm py-space-2xs rounded-full bg-status-success-bg text-status-success-base font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-status-success-base"></span>
                  Lunas Dini
                </span>
</td>
<td class="py-space-md px-space-md whitespace-nowrap text-right">
<div class="flex items-center justify-end gap-space-xs">
<button class="p-space-xs rounded-lg hover:bg-surface-subtle text-text-secondary hover:text-text-primary transition-colors" title="Lihat Detail" type="button">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</button>
<button class="p-space-xs rounded-lg hover:bg-status-success-bg text-text-secondary hover:text-status-success-base transition-colors" title="Kirim Ulang Kuitansi WA" type="button">
<span class="material-symbols-outlined text-[18px]">send</span>
</button>
</div>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="py-space-md px-space-md whitespace-nowrap">
<div class="flex flex-col">
<span class="font-tabular-numeric text-tabular-numeric text-text-primary">08:05:11 WIB</span>
<span class="font-body-sm text-body-sm text-text-tertiary">26 Okt 2026</span>
</div>
</td>
<td class="py-space-md px-space-md whitespace-nowrap">
<div class="flex flex-col">
<span class="font-label-md text-label-md text-brand-indigo font-semibold">INV/2026/09/0073</span>
<span class="font-body-sm text-body-sm text-text-secondary">Cicilan Ke-3 dari 4</span>
</div>
</td>
<td class="py-space-md px-space-md whitespace-nowrap">
<div class="flex items-center gap-space-sm">
<div class="w-7 h-7 rounded-full bg-status-warning-bg text-status-warning-base font-label-sm text-label-sm flex items-center justify-center font-bold">DM</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-text-primary">Dewi Maharani</span>
<span class="font-body-sm text-body-sm text-text-tertiary">+62 821-7744-1290</span>
</div>
</div>
</td>
<td class="py-space-md px-space-md whitespace-nowrap">
<div class="inline-flex items-center gap-space-xs px-space-sm py-space-2xs rounded bg-surface-subtle font-label-sm text-label-sm text-text-secondary">
<span class="font-bold text-status-info-base">BRI</span> VA
                </div>
</td>
<td class="py-space-md px-space-md whitespace-nowrap text-right font-tabular-numeric text-tabular-numeric text-text-primary font-semibold">
                Rp 875.000
              </td>
<td class="py-space-md px-space-md whitespace-nowrap text-center">
<span class="inline-flex items-center gap-space-xs px-space-sm py-space-2xs rounded-full bg-status-success-bg text-status-success-base font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-status-success-base"></span>
                  Auto-Reconciled
                </span>
</td>
<td class="py-space-md px-space-md whitespace-nowrap text-right">
<div class="flex items-center justify-end gap-space-xs">
<button class="p-space-xs rounded-lg hover:bg-surface-subtle text-text-secondary hover:text-text-primary transition-colors" title="Lihat Detail" type="button">
<span class="material-symbols-outlined text-[18px]">visibility</span>
</button>
<button class="p-space-xs rounded-lg hover:bg-status-success-bg text-text-secondary hover:text-status-success-base transition-colors" title="Kirim Ulang Kuitansi WA" type="button">
<span class="material-symbols-outlined text-[18px]">send</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<div class="flex items-center justify-between pt-space-sm">
<span class="font-body-sm text-body-sm text-text-tertiary">Menampilkan 4 dari 48 rekonsiliasi hari ini</span>
<button class="font-label-md text-label-md text-secondary hover:underline flex items-center gap-space-xs" type="button">
<span>Buka Riwayat Lengkap &amp; Export Jurnal</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</button>
</div>
</div>
<!-- Right Section (Col-4): WA Scheduler & Action Needed Sentinel -->
<div class="xl:col-span-4 flex flex-col gap-space-xl">
<!-- Card: WA Automation Dispatch Schedule -->
<div class="bg-surface-card rounded-xl p-space-xl shadow-sm flex flex-col gap-space-lg">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-status-success-bg flex items-center justify-center text-status-success-base">
<span class="material-symbols-outlined text-[20px]">mark_chat_read</span>
</div>
<div class="flex flex-col">
<h3 class="font-headline-sm text-headline-sm text-text-primary">Notifikasi WA Hari Ini</h3>
<span class="font-body-sm text-body-sm text-text-tertiary">Scheduler pengingat otomatis Duitku link</span>
</div>
</div>
<span class="material-symbols-outlined text-text-tertiary cursor-pointer hover:text-text-primary text-[20px]">more_vert</span>
</div>
<div class="flex flex-col gap-space-md">
<!-- H-3 Notice Track -->
<div class="flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-text-secondary">Pengingat H-3 (Early Notice)</span>
<span class="font-tabular-numeric text-tabular-numeric text-status-success-base font-semibold">42 / 42 Terkirim</span>
</div>
<div class="w-full h-2 rounded-full bg-surface-subtle overflow-hidden">
<div class="bg-status-success-base h-full rounded-full" style="width: 100%"></div>
</div>
</div>
<!-- Hari-H Notice Track -->
<div class="flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-text-secondary">Jatuh Tempo Hari-H (Due Date)</span>
<span class="font-tabular-numeric text-tabular-numeric text-brand-indigo font-semibold">28 / 28 Terkirim</span>
</div>
<div class="w-full h-2 rounded-full bg-surface-subtle overflow-hidden">
<div class="bg-brand-indigo h-full rounded-full" style="width: 100%"></div>
</div>
</div>
<!-- Overdue Track -->
<div class="flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-text-secondary">Tunggakan Overdue (+3 Hari)</span>
<span class="font-tabular-numeric text-tabular-numeric text-status-danger-base font-semibold">13 / 14 (1 Gagal)</span>
</div>
<div class="w-full h-2 rounded-full bg-surface-subtle overflow-hidden">
<div class="bg-status-danger-base h-full rounded-full" style="width: 92%"></div>
</div>
</div>
</div>
<div class="p-space-md rounded-lg bg-surface-subtle flex items-center justify-between">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-status-warning-base text-[18px]">update</span>
<span class="font-body-sm text-body-sm text-text-secondary">Jadwal blast berikutnya: <strong>14:00 WIB</strong></span>
</div>
<button class="font-label-sm text-label-sm text-secondary hover:underline font-semibold" type="button">Lihat Draft</button>
</div>
</div>
<!-- Card: Perhatian Khusus / Action Needed Sentinel -->
<div class="bg-surface-card rounded-xl p-space-xl shadow-sm flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-status-danger-bg flex items-center justify-center text-status-danger-base">
<span class="material-symbols-outlined text-[20px]">emergency</span>
</div>
<div class="flex flex-col">
<h3 class="font-headline-sm text-headline-sm text-text-primary">Perhatian Khusus</h3>
<span class="font-body-sm text-body-sm text-text-tertiary">3 Isu membutuhkan intervensi admin</span>
</div>
</div>
<span class="px-space-xs py-space-2xs rounded-full bg-status-danger-bg text-status-danger-base font-label-sm text-label-sm font-bold">3 Alert</span>
</div>
<div class="flex flex-col gap-space-sm pt-space-xs">
<!-- Issue 1: Bad Phone Number -->
<div class="p-space-md rounded-lg bg-surface-subtle flex flex-col gap-space-xs">
<div class="flex items-start justify-between">
<span class="font-label-sm text-label-sm text-status-danger-base uppercase font-semibold flex items-center gap-space-2xs">
<span class="material-symbols-outlined text-[14px]">phone_disabled</span>
                No. WA Pelanggan Tidak Valid
              </span>
<span class="font-tabular-numeric text-tabular-numeric text-text-tertiary">INV-0192</span>
</div>
<p class="font-body-sm text-body-sm text-text-secondary">
              Nomor <strong>+62 812-9900-xxx</strong> menolak dispatch WA API template (Error 131026).
            </p>
<div class="flex items-center justify-end gap-space-sm pt-space-2xs">
<button class="font-label-sm text-label-sm text-text-tertiary hover:text-text-secondary" type="button">Abaikan</button>
<button class="font-label-sm text-label-sm text-secondary font-semibold hover:underline" type="button">Perbarui Kontak →</button>
</div>
</div>
<!-- Issue 2: Odd Amount Payment -->
<div class="p-space-md rounded-lg bg-surface-subtle flex flex-col gap-space-xs">
<div class="flex items-start justify-between">
<span class="font-label-sm text-label-sm text-status-warning-base uppercase font-semibold flex items-center gap-space-2xs">
<span class="material-symbols-outlined text-[14px]">difference</span>
                Nominal Ganjil Butuh Verifikasi
              </span>
<span class="font-tabular-numeric text-tabular-numeric text-text-tertiary">2 Laporan</span>
</div>
<p class="font-body-sm text-body-sm text-text-secondary">
              Diterima transfer manual rekening koran Rp 450.120 tanpa referensi VA Duitku yang cocok.
            </p>
<div class="flex items-center justify-end gap-space-sm pt-space-2xs">
<button class="font-label-sm text-label-sm text-secondary font-semibold hover:underline" type="button">Cocokkan Invoice →</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
