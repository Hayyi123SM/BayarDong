@extends('layouts.admin')

@section('content')
<div class="flex flex-col w-full gap-space-2xl" x-data="monitoringTable(@js($monitorInvoices))">
<!-- Top Stat Counters & Technical Status Summary -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-lg">
<div class="bg-surface-card rounded-xl p-space-lg shadow-sm flex flex-col justify-between relative overflow-hidden">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-text-tertiary">Total Piutang Berjalan</span>
<span class="p-space-xs rounded-lg bg-status-info-bg text-status-info-base material-symbols-outlined text-[20px]">account_balance_wallet</span>
</div>
<div class="mt-space-md">
<div class="font-display-currency text-display-currency text-text-primary">Rp 412.850.000</div>
<div class="flex items-center gap-space-xs mt-space-2xs text-text-secondary font-body-sm text-body-sm">
<span class="text-status-success-base font-semibold flex items-center"><span class="material-symbols-outlined text-[16px]">arrow_upward</span> 14.2%</span>
<span>dari siklus bulan lalu</span>
</div>
</div>
<div class="w-full bg-surface-subtle h-1.5 rounded-full mt-space-md overflow-hidden">
<div class="bg-secondary h-full rounded-full w-[68%]"></div>
</div>
</div>
<div class="bg-surface-card rounded-xl p-space-lg shadow-sm flex flex-col justify-between relative overflow-hidden">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-text-tertiary">Otomasi Duitku (24 Jam)</span>
<span class="p-space-xs rounded-lg bg-status-success-bg text-status-success-base material-symbols-outlined text-[20px]">sync_saved_locally</span>
</div>
<div class="mt-space-md">
<div class="font-display-currency text-display-currency text-text-primary">99.4%</div>
<div class="flex items-center gap-space-xs mt-space-2xs text-text-secondary font-body-sm text-body-sm">
<span class="inline-flex items-center gap-1 font-semibold text-status-success-base"><span class="w-1.5 h-1.5 rounded-full bg-status-success-base"></span> 218 Webhooks</span>
<span class="text-text-tertiary">| 0 Fallback manual</span>
</div>
</div>
<div class="w-full bg-surface-subtle h-1.5 rounded-full mt-space-md overflow-hidden">
<div class="bg-status-success-base h-full rounded-full w-[99.4%]"></div>
</div>
</div>
<div class="bg-surface-card rounded-xl p-space-lg shadow-sm flex flex-col justify-between relative overflow-hidden">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-text-tertiary">Jatuh Tempo &amp; Overdue</span>
<span class="p-space-xs rounded-lg bg-status-danger-bg text-status-danger-base material-symbols-outlined text-[20px]">event_busy</span>
</div>
<div class="mt-space-md">
<div class="font-display-currency text-display-currency text-status-danger-base">4 Tagihan</div>
<div class="flex items-center gap-space-xs mt-space-2xs text-text-secondary font-body-sm text-body-sm">
<span class="font-semibold text-status-danger-base">Rp 12.450.000</span>
<span>terancam macet (H+1 s/d H+4)</span>
</div>
</div>
<div class="w-full bg-surface-subtle h-1.5 rounded-full mt-space-md overflow-hidden">
<div class="bg-status-danger-base h-full rounded-full w-[12%]"></div>
</div>
</div>
<div class="bg-surface-card rounded-xl p-space-lg shadow-sm flex flex-col justify-between relative overflow-hidden">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-text-tertiary">Pemberitahuan WA Scheduler</span>
<span class="p-space-xs rounded-lg bg-status-warning-bg text-status-warning-base material-symbols-outlined text-[20px]">forward_to_inbox</span>
</div>
<div class="mt-space-md">
<div class="font-display-currency text-display-currency text-text-primary">84 / 88</div>
<div class="flex items-center gap-space-xs mt-space-2xs text-text-secondary font-body-sm text-body-sm">
<span class="inline-flex items-center gap-1 font-semibold text-status-warning-base"><span class="w-1.5 h-1.5 rounded-full bg-status-warning-base"></span> 4 Dalam Antrean</span>
<span class="text-text-tertiary">Cron 08:00 WIB</span>
</div>
</div>
<div class="w-full bg-surface-subtle h-1.5 rounded-full mt-space-md overflow-hidden">
<div class="bg-status-warning-base h-full rounded-full w-[95%]"></div>
</div>
</div>
</div>
<!-- Header Actions & Controls Area -->
<div class="bg-surface-card rounded-xl p-space-lg shadow-sm flex flex-col gap-space-lg">
<!-- Status Filter Tabs -->
<div class="flex flex-wrap items-center justify-between gap-space-md">
<div class="flex items-center gap-space-xs overflow-x-auto pb-space-xs sm:pb-0">
<button class="px-space-md py-space-xs rounded-lg font-label-md text-label-md bg-secondary text-on-secondary shadow-sm transition-all flex items-center gap-space-xs" type="button">
<span>Semua Tagihan</span>
<span class="px-space-xs py-0.5 rounded-full bg-surface-card text-secondary font-tabular-numeric text-label-sm">124</span>
</button>
<button class="px-space-md py-space-xs rounded-lg font-label-md text-label-md bg-surface-subtle text-text-secondary hover:bg-surface-container-high transition-colors flex items-center gap-space-xs" type="button">
<span>Aktif / Berjalan</span>
<span class="px-space-xs py-0.5 rounded-full bg-surface-container-high text-text-primary font-tabular-numeric text-label-sm">88</span>
</button>
<button class="px-space-md py-space-xs rounded-lg font-label-md text-label-md bg-surface-subtle text-text-secondary hover:bg-surface-container-high transition-colors flex items-center gap-space-xs" type="button">
<span>Lunas / Completed</span>
<span class="px-space-xs py-0.5 rounded-full bg-status-success-bg text-status-success-base font-tabular-numeric text-label-sm">32</span>
</button>
<button class="px-space-md py-space-xs rounded-lg font-label-md text-label-md bg-surface-subtle text-text-secondary hover:bg-surface-container-high transition-colors flex items-center gap-space-xs" type="button">
<span>Jatuh Tempo / Overdue</span>
<span class="px-space-xs py-0.5 rounded-full bg-status-danger-bg text-status-danger-base font-tabular-numeric text-label-sm">4</span>
</button>
<button class="px-space-md py-space-xs rounded-lg font-label-md text-label-md bg-surface-subtle text-text-secondary hover:bg-surface-container-high transition-colors flex items-center gap-space-xs" type="button">
<span>Dibatalkan</span>
<span class="px-space-xs py-0.5 rounded-full bg-surface-container-high text-text-tertiary font-tabular-numeric text-label-sm">0</span>
</button>
</div>
<!-- Action Buttons -->
<div class="flex items-center gap-space-sm">
<!-- Mode Tampilan: Tabel / Kartu -->
<div class="flex items-center gap-space-2xs bg-surface-subtle rounded-lg p-1" role="group" aria-label="Mode tampilan daftar">
<button type="button" title="Tampilan Tabel" :aria-pressed="viewMode === 'table' ? 'true' : 'false'"
        @click="setViewMode('table')"
        class="p-space-xs rounded-md transition-colors"
        :class="viewMode === 'table' ? 'bg-surface-card text-secondary shadow-sm' : 'text-text-secondary hover:text-text-primary'">
<span class="material-symbols-outlined text-[20px]">table_rows</span>
</button>
<button type="button" title="Tampilan Kartu" :aria-pressed="viewMode === 'cards' ? 'true' : 'false'"
        @click="setViewMode('cards')"
        class="p-space-xs rounded-md transition-colors"
        :class="viewMode === 'cards' ? 'bg-surface-card text-secondary shadow-sm' : 'text-text-secondary hover:text-text-primary'">
<span class="material-symbols-outlined text-[20px]">grid_view</span>
</button>
</div>
<button class="inline-flex items-center gap-space-xs px-space-md py-space-xs rounded-lg bg-surface-subtle text-text-primary hover:bg-surface-container-high font-label-md text-label-md transition-colors" id="btnExport" type="button">
<span class="material-symbols-outlined text-[18px]">download</span>
<span>Export Rekap (Excel/CSV)</span>
</button>
<button class="inline-flex items-center gap-space-xs px-space-md py-space-xs rounded-lg bg-surface-container text-secondary hover:bg-surface-container-high font-label-md text-label-md transition-colors" id="btnTriggerSync" type="button">
<span class="material-symbols-outlined text-[18px]">cached</span>
<span>Trigger Cron Fallback Sync</span>
</button>
</div>
</div>
<!-- Filter Bar: Search, Method, Date Range -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-space-md pt-space-xs">
<!-- Search -->
<div class="md:col-span-5 relative">
<span class="material-symbols-outlined absolute left-space-md top-1/2 -translate-y-1/2 text-text-tertiary text-[20px]">search</span>
<input class="w-full pl-10 pr-space-md py-space-sm bg-surface-subtle rounded-lg text-text-primary font-body-sm text-body-sm placeholder:text-text-tertiary focus:outline-none focus:bg-surface-container-lowest" placeholder="Cari nomor invoice (INV/...), nama pelanggan, atau ref Duitku..." type="text"/>
</div>
<!-- Channel / Method Dropdown -->
<div class="md:col-span-3">
<div class="relative">
<select class="w-full appearance-none pl-space-md pr-10 py-space-sm bg-surface-subtle rounded-lg text-text-primary font-body-sm text-body-sm focus:outline-none focus:bg-surface-container-lowest cursor-pointer">
<option value="">Semua Metode Pembayaran</option>
<option value="BCA_VA">BCA Virtual Account</option>
<option value="MANDIRI_VA">Mandiri Virtual Account</option>
<option value="BNI_VA">BNI Virtual Account</option>
<option value="BRI_VA">BRI Virtual Account</option>
<option value="QRIS">QRIS Dinamis</option>
<option value="EWALLET">E-Wallet (OVO / ShopeePay / Dana)</option>
</select>
<span class="material-symbols-outlined absolute right-space-md top-1/2 -translate-y-1/2 text-text-tertiary pointer-events-none text-[20px]">keyboard_arrow_down</span>
</div>
</div>
<!-- Date Range Filter -->
<div class="md:col-span-3">
<div class="relative">
<span class="material-symbols-outlined absolute left-space-md top-1/2 -translate-y-1/2 text-text-tertiary text-[18px]">calendar_today</span>
<input class="w-full pl-10 pr-space-md py-space-sm bg-surface-subtle rounded-lg text-text-primary font-body-sm text-body-sm focus:outline-none focus:bg-surface-container-lowest" readonly="" type="text" value="01 Jan 2026 - 31 Mar 2026"/>
</div>
</div>
<!-- Reset Filter Button -->
<div class="md:col-span-1 flex items-center justify-end">
<button class="w-full h-full min-h-[38px] flex items-center justify-center rounded-lg bg-surface-subtle text-text-secondary hover:text-text-primary hover:bg-surface-container-high transition-colors" title="Reset Filter" type="button">
<span class="material-symbols-outlined text-[20px]">filter_alt_off</span>
</button>
</div>
</div>
</div>
<!-- Master Table & Schedule Card Container -->
<div class="bg-surface-card rounded-xl shadow-sm overflow-hidden flex flex-col">
<!-- Table Header Info Bar -->
<div class="px-space-lg py-space-md bg-surface-subtle/50 flex flex-wrap items-center justify-between gap-space-sm">
<div class="flex items-center gap-space-sm">
<span class="font-label-md text-label-md text-text-primary">Daftar Tagihan &amp; Jadwal Termin</span>
<span class="px-space-xs py-0.5 rounded bg-surface-container-high text-text-secondary font-label-sm text-label-sm">Bagian 3 Flow 3 &amp; 5.3</span>
</div>
<div class="flex items-center gap-space-md text-text-tertiary font-body-sm text-body-sm">
<span class="inline-flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-status-success-base"></span> Terverifikasi Duitku Otomatis</span>
<span class="inline-flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-status-warning-base"></span> Menunggu Bayar</span>
<span class="inline-flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-status-danger-base"></span> Overdue</span>
</div>
</div>
<!-- Table Responsive Scroller (Mode Tabel) -->
<template x-if="viewMode === 'table'">
<div class="overflow-x-auto w-full">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-subtle text-text-tertiary font-label-sm text-label-sm uppercase tracking-wider">
<th class="py-space-md px-space-lg w-12 text-center"></th>
<th class="py-space-md px-space-md">No. Invoice &amp; Tagihan</th>
<th class="py-space-md px-space-md">Pelanggan &amp; WhatsApp</th>
<th class="py-space-md px-space-md">Nominal Total</th>
<th class="py-space-md px-space-md">Status &amp; Progres Termin</th>
<th class="py-space-md px-space-md">Gateway &amp; Rekonsiliasi</th>
<th class="py-space-md px-space-lg text-right">Aksi</th>
</tr>
</thead>
<tbody class="divide-none font-body-md text-body-md text-text-primary">
<template x-for="(inv, idx) in invoices" :key="inv.id">
<tr class="transition-colors cursor-pointer group"
    :class="idx % 2 === 0 ? 'bg-surface-container-low/30 hover:bg-surface-container-low/70' : 'hover:bg-surface-subtle/70'"
    @click="openDetail(inv)">
<td class="py-space-md px-space-lg text-center text-text-tertiary">
<span class="material-symbols-outlined text-[22px] group-hover:text-secondary transition-colors">chevron_right</span>
</td>
<td class="py-space-md px-space-md">
<div class="flex flex-col">
<span class="font-tabular-numeric font-semibold text-secondary" x-text="inv.invoice"></span>
<span class="font-label-md text-label-md text-text-primary" x-text="inv.description"></span>
<span class="font-body-sm text-body-sm text-text-tertiary" x-text="'Skema Tenor ' + inv.tenor + 'x Pembayaran'"></span>
</div>
</td>
<td class="py-space-md px-space-md">
<div class="flex flex-col">
<span class="font-label-md text-label-md text-text-primary" x-text="inv.customer"></span>
<a class="inline-flex items-center gap-1 font-body-sm text-body-sm text-secondary hover:underline"
   :href="'https://wa.me/' + inv.waLink" target="_blank" @click.stop>
<span class="material-symbols-outlined text-[14px]">chat</span>
<span x-text="inv.wa"></span>
</a>
</div>
</td>
<td class="py-space-md px-space-md">
<div class="flex flex-col">
<span class="font-tabular-numeric font-bold text-text-primary" x-text="inv.total"></span>
<span class="font-body-sm text-body-sm" :class="inv.status === 'completed' ? 'text-status-success-base' : (inv.status === 'overdue' ? 'text-status-danger-base' : 'text-text-tertiary')">
<span x-text="'Sisa: '"></span><strong class="font-semibold" :class="inv.status === 'completed' ? 'text-status-success-base' : (inv.status === 'overdue' ? 'text-status-danger-base' : 'text-text-primary')" x-text="inv.sisa"></strong>
</span>
</div>
</td>
<td class="py-space-md px-space-md">
<div class="flex flex-col gap-1.5 min-w-[160px]">
<div class="flex items-center justify-between font-label-sm text-label-sm">
<span class="inline-flex items-center gap-1 px-space-sm py-0.5 rounded-full font-semibold"
      :class="inv.status === 'completed' ? 'bg-status-success-bg text-status-success-base' : (inv.status === 'overdue' ? 'bg-status-danger-bg text-status-danger-base' : (inv.status === 'due' ? 'bg-status-warning-bg text-status-warning-base' : 'bg-status-info-bg text-status-info-base'))">
<span class="w-1.5 h-1.5 rounded-full"
      :class="inv.status === 'completed' ? 'bg-status-success-base' : (inv.status === 'overdue' ? 'bg-status-danger-base' : (inv.status === 'due' ? 'bg-status-warning-base' : 'bg-status-info-base'))"></span>
<span x-text="inv.statusLabel"></span>
</span>
<span class="text-text-secondary font-tabular-numeric" x-text="inv.paidCount + ' / ' + inv.tenor"></span>
</div>
<div class="w-full bg-surface-subtle h-2 rounded-full overflow-hidden flex">
<div class="bg-status-success-base h-full" :style="'width:' + progressWidth(inv) + '%'"></div>
<template x-if="inv.status === 'due'">
<div class="bg-status-warning-base h-full animate-pulse" :style="'width:' + Math.max(0, 100 - progressWidth(inv)) + '%'"></div>
</template>
<template x-if="inv.status === 'overdue'">
<div class="bg-status-danger-base h-full animate-pulse" :style="'width:' + Math.max(0, 100 - progressWidth(inv)) + '%'"></div>
</template>
</div>
</div>
</td>
<td class="py-space-md px-space-md">
<div class="flex flex-col">
<span class="inline-flex items-center gap-1 font-label-md text-label-md"
      :class="inv.status === 'completed' ? 'text-text-secondary' : (inv.status === 'overdue' ? 'text-status-danger-base' : 'text-text-secondary')">
<span class="material-symbols-outlined text-[18px]"
      :class="inv.status === 'overdue' ? 'text-status-danger-base' : (inv.status === 'active' ? 'text-status-info-base' : 'text-status-success-base')" x-text="inv.channelIcon"></span>
<span x-text="inv.channel"></span>
</span>
<span class="font-body-sm text-body-sm text-text-tertiary" x-text="inv.channelMeta"></span>
</div>
</td>
<td class="py-space-md px-space-lg text-right">
<div class="flex items-center justify-end gap-space-xs">
<button class="p-space-xs rounded-lg hover:bg-surface-container-high text-text-secondary hover:text-text-primary transition-colors"
        @click.stop="openDetail(inv)" title="Lihat Rincian Jadwal Termin" type="button">
<span class="material-symbols-outlined text-[20px]">calendar_view_week</span>
</button>
<button class="p-space-xs rounded-lg hover:bg-surface-container-high text-text-secondary hover:text-text-primary transition-colors"
        @click.stop="navigator.clipboard.writeText('https://pay.bayarkilat.id/i/' + inv.token); showToast('Tautan portal disalin!')" title="Salin Tautan Token" type="button">
<span class="material-symbols-outlined text-[20px]">link</span>
</button>
<button class="px-space-sm py-space-xs rounded-lg bg-surface-subtle hover:bg-surface-container-high text-text-secondary font-label-sm text-label-sm transition-colors flex items-center gap-1"
        @click.stop="openDetail(inv)" type="button">
<span class="material-symbols-outlined text-[16px]">edit_note</span>
<span>Rincian</span>
</button>
</div>
</td>
</tr>
</template>
</tbody>
</table>
</div>
</template>

<!-- Card Grid Layout (Mode Kartu) -->
<template x-if="viewMode === 'cards'">
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-space-lg p-space-lg">
<template x-for="(inv, idx) in invoices" :key="inv.id">
<div class="bg-surface-card border border-surface-border rounded-xl shadow-sm p-space-lg flex flex-col gap-space-md transition-all hover:shadow-md hover:border-secondary/40 cursor-pointer"
     @click="openDetail(inv)">
<!-- Header: invoice + status -->
<div class="flex items-start justify-between gap-space-sm">
<div class="flex flex-col gap-0.5 min-w-0">
<span class="font-tabular-numeric font-semibold text-secondary truncate" x-text="inv.invoice"></span>
<span class="font-label-md text-label-md text-text-primary" x-text="inv.description"></span>
<span class="font-body-sm text-body-sm text-text-tertiary" x-text="'Skema Tenor ' + inv.tenor + 'x Pembayaran'"></span>
</div>
<span class="inline-flex items-center gap-space-xs px-space-sm py-0.5 rounded-full font-semibold font-label-sm text-label-sm shrink-0"
      :class="inv.status === 'completed' ? 'bg-status-success-bg text-status-success-base' : (inv.status === 'overdue' ? 'bg-status-danger-bg text-status-danger-base' : (inv.status === 'due' ? 'bg-status-warning-bg text-status-warning-base' : 'bg-status-info-bg text-status-info-base'))">
<span class="w-1.5 h-1.5 rounded-full"
      :class="inv.status === 'completed' ? 'bg-status-success-base' : (inv.status === 'overdue' ? 'bg-status-danger-base' : (inv.status === 'due' ? 'bg-status-warning-base' : 'bg-status-info-base'))"></span>
<span x-text="inv.statusLabel"></span>
</span>
</div>
<!-- Customer + WA -->
<div class="flex items-center gap-space-md">
<div class="w-10 h-10 rounded-full bg-secondary/10 text-secondary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[20px]">person</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-text-primary truncate" x-text="inv.customer"></span>
<a class="inline-flex items-center gap-1 font-body-sm text-body-sm text-secondary hover:underline"
   :href="'https://wa.me/' + inv.waLink" target="_blank" @click.stop>
<span class="material-symbols-outlined text-[14px]">chat</span>
<span x-text="inv.wa"></span>
</a>
</div>
</div>
<!-- Total & Sisa -->
<div class="flex items-center justify-between bg-surface-subtle rounded-lg px-space-md py-space-sm">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-text-tertiary">Total</span>
<span class="font-tabular-numeric font-bold text-text-primary" x-text="inv.total"></span>
</div>
<div class="flex flex-col items-end">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-text-tertiary">Sisa</span>
<span class="font-tabular-numeric font-semibold"
      :class="inv.status === 'completed' ? 'text-status-success-base' : (inv.status === 'overdue' ? 'text-status-danger-base' : 'text-text-primary')" x-text="inv.sisa"></span>
</div>
</div>
<!-- Progress -->
<div class="flex flex-col gap-1.5">
<div class="flex items-center justify-between font-label-sm text-label-sm">
<span class="text-text-secondary font-tabular-numeric" x-text="inv.paidCount + ' / ' + inv.tenor + ' termin'"></span>
<span class="text-text-tertiary" x-text="inv.status === 'completed' ? 'Lunas' : 'Sedang berjalan'"></span>
</div>
<div class="w-full bg-surface-subtle h-2 rounded-full overflow-hidden flex">
<div class="bg-status-success-base h-full" :style="'width:' + progressWidth(inv) + '%'"></div>
<template x-if="inv.status === 'due'">
<div class="bg-status-warning-base h-full animate-pulse" :style="'width:' + Math.max(0, 100 - progressWidth(inv)) + '%'"></div>
</template>
<template x-if="inv.status === 'overdue'">
<div class="bg-status-danger-base h-full animate-pulse" :style="'width:' + Math.max(0, 100 - progressWidth(inv)) + '%'"></div>
</template>
</div>
</div>
<!-- Channel + Actions -->
<div class="flex items-center justify-between gap-space-sm pt-space-2xs border-t border-surface-border mt-auto">
<div class="flex items-center gap-1 font-label-md text-label-md text-text-secondary min-w-0">
<span class="material-symbols-outlined text-[18px] shrink-0" :class="inv.status === 'overdue' ? 'text-status-danger-base' : (inv.status === 'active' ? 'text-status-info-base' : 'text-status-success-base')" x-text="inv.channelIcon"></span>
<span class="truncate" x-text="inv.channel"></span>
</div>
<div class="flex items-center gap-space-2xs shrink-0" @click.stop>
<button class="p-space-xs rounded-lg hover:bg-surface-container-high text-text-secondary hover:text-text-primary transition-colors"
        @click="openDetail(inv)" title="Lihat Rincian Jadwal Termin" type="button">
<span class="material-symbols-outlined text-[20px]">calendar_view_week</span>
</button>
<button class="p-space-xs rounded-lg hover:bg-surface-container-high text-text-secondary hover:text-text-primary transition-colors"
        @click="navigator.clipboard.writeText('https://pay.bayarkilat.id/i/' + inv.token); showToast('Tautan portal disalin!')" title="Salin Tautan Token" type="button">
<span class="material-symbols-outlined text-[20px]">link</span>
</button>
<button class="px-space-sm py-space-xs rounded-lg bg-surface-subtle hover:bg-surface-container-high text-text-secondary font-label-sm text-label-sm transition-colors flex items-center gap-1"
        @click="openDetail(inv)" type="button">
<span class="material-symbols-outlined text-[16px]">edit_note</span>
<span>Rincian</span>
</button>
</div>
</div>
</div>
</template>
</div>
</template>

<!-- Pagination Controls -->
<div class="px-space-lg py-space-md bg-surface-card border-none flex flex-wrap items-center justify-between gap-space-md">
<div class="flex items-center gap-space-sm text-text-secondary font-body-sm text-body-sm">
<span>Menampilkan</span>
<select class="bg-surface-subtle rounded px-space-xs py-1 text-text-primary font-medium focus:outline-none cursor-pointer">
<option>10</option>
<option>25</option>
<option>50</option>
</select>
<span>dari <strong>124</strong> total tagihan terdaftar</span>
</div>
<div class="flex items-center gap-space-xs">
<button class="p-space-xs rounded-lg bg-surface-subtle text-text-tertiary cursor-not-allowed" disabled="" type="button">
<span class="material-symbols-outlined text-[18px]">chevron_left</span>
</button>
<button class="w-8 h-8 rounded-lg bg-secondary text-on-secondary font-label-sm text-label-sm font-semibold shadow-sm" type="button">1</button>
<button class="w-8 h-8 rounded-lg bg-surface-subtle hover:bg-surface-container-high text-text-secondary font-label-sm text-label-sm transition-colors" type="button">2</button>
<button class="w-8 h-8 rounded-lg bg-surface-subtle hover:bg-surface-container-high text-text-secondary font-label-sm text-label-sm transition-colors" type="button">3</button>
<span class="px-1 text-text-tertiary">...</span>
<button class="w-8 h-8 rounded-lg bg-surface-subtle hover:bg-surface-container-high text-text-secondary font-label-sm text-label-sm transition-colors" type="button">13</button>
<button class="p-space-xs rounded-lg bg-surface-subtle hover:bg-surface-container-high text-text-secondary transition-colors" type="button">
<span class="material-symbols-outlined text-[18px]">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- Realtime Reconcile Technical Log Snippet (Bagian 5.3-5.4 Duitku Engine) -->
<div class="bg-surface-card rounded-xl p-space-lg shadow-sm flex flex-col gap-space-md">
<div class="flex flex-wrap items-center justify-between gap-space-sm">
<div class="flex items-center gap-space-sm">
<span class="w-3 h-3 rounded-full bg-status-success-base animate-pulse"></span>
<span class="font-headline-sm text-headline-sm text-text-primary">Live Duitku Callback Stream &amp; Cron Fallback Engine</span>
</div>
<span class="font-label-sm text-label-sm text-text-tertiary uppercase tracking-wider font-mono">MD5 Sig: merchantCode + amount + merchantOrderId + apiKey</span>
</div>
<div class="bg-primary-container text-on-secondary-container p-space-md rounded-lg font-mono text-body-sm flex flex-col gap-space-xs overflow-x-auto">
<div class="flex items-center gap-space-md text-text-tertiary">
<span class="text-status-success-base">[2026-02-10 09:22:14.081]</span>
<span class="text-secondary-fixed">POST /api/v1/duitku/callback</span>
<span class="text-on-secondary-container">orderId: INV-2026-09-0001-T2 | resultCode: "00" (SUCCESS) | amt: 333333</span>
</div>
<div class="flex items-center gap-space-md text-text-tertiary">
<span class="text-status-info-base">[2026-02-10 09:22:14.195]</span>
<span class="text-secondary-fixed">DB Transaction:</span>
<span class="text-on-secondary-container">Invoice #INV/2026/09/0001 Termin 2 updated to 'PAID' via BCA VA #8277081234567890</span>
</div>
<div class="flex items-center gap-space-md text-text-tertiary">
<span class="text-status-warning-base">[2026-02-10 09:22:15.004]</span>
<span class="text-secondary-fixed">WA Gateway Engine:</span>
<span class="text-on-secondary-container">Kuitansi digital otomatis terkirim via WhatsApp API ke +6281234567890 (Status: DELIVERED)</span>
</div>
<div class="flex items-center gap-space-md text-text-tertiary">
<span class="text-text-tertiary">[2026-02-10 09:00:00.000]</span>
<span class="text-text-tertiary">Cron Scheduler:</span>
<span class="text-on-secondary-container">Cron fallback scan completed. 88 invoices checked, 0 discrepancies detected against Duitku Inquiry API.</span>
</div>
</div>
</div>
<!-- ALPINE SLIDE-OVER DRAWER: RINCIAN JADWAL TERMIN -->
<div x-cloak x-ref="monitoringBackdrop" @click="closeDrawer()"
     class="fixed inset-0 z-50 bg-inverse-surface/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity flex justify-end">
<div x-ref="monitoringPanel" @click.stop
     class="w-full max-w-lg bg-surface-card h-full shadow-2xl flex flex-col transform translate-x-full transition-transform duration-300">
<!-- Header -->
<div class="p-space-xl border-b border-surface-border flex items-start justify-between gap-space-sm">
<div class="flex items-center gap-space-sm min-w-0">
<div class="w-10 h-10 rounded-lg bg-secondary/10 text-secondary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[22px]">calendar_view_week</span>
</div>
<div class="flex flex-col min-w-0">
<h3 class="font-headline-sm text-headline-sm text-text-primary leading-tight truncate" x-text="selected ? selected.customer : ''"></h3>
<p class="font-body-sm text-body-sm text-text-tertiary" x-text="selected ? (selected.invoice + ' • ' + selected.description) : ''"></p>
</div>
</div>
<button type="button" @click="closeDrawer()" class="p-space-xs rounded-lg hover:bg-surface-container-high text-text-secondary shrink-0">
<span class="material-symbols-outlined text-[22px]">close</span>
</button>
</div>

<!-- Summary strip -->
<div x-show="selected" class="px-space-xl py-space-md bg-surface-subtle/60 flex flex-wrap items-center gap-space-md border-b border-surface-border">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-text-tertiary">Total Tagihan</span>
<span class="font-display-currency text-display-currency text-text-primary" x-text="selected ? selected.total : ''"></span>
</div>
<div class="w-px h-8 bg-surface-border"></div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-text-tertiary">Progres Termin</span>
<span class="font-label-lg text-label-lg text-text-primary font-semibold" x-text="selected ? (selected.paidCount + ' dari ' + selected.tenor + ' termin') : ''"></span>
</div>
<div class="ml-auto">
<span class="inline-flex items-center gap-1 px-space-sm py-space-2xs rounded-full font-label-sm text-label-sm font-semibold"
      :class="selected && selected.status === 'completed' ? 'bg-status-success-bg text-status-success-base' : (selected && selected.status === 'overdue' ? 'bg-status-danger-bg text-status-danger-base' : (selected && selected.status === 'due' ? 'bg-status-warning-bg text-status-warning-base' : 'bg-status-info-bg text-status-info-base'))">
<span class="w-1.5 h-1.5 rounded-full"
      :class="selected && selected.status === 'completed' ? 'bg-status-success-base' : (selected && selected.status === 'overdue' ? 'bg-status-danger-base' : (selected && selected.status === 'due' ? 'bg-status-warning-base' : 'bg-status-info-base'))"></span>
<span x-text="selected ? selected.statusLabel : ''"></span>
</span>
</div>
</div>

<!-- Progress bar -->
<div x-show="selected" class="px-space-xl py-space-md">
<div class="w-full bg-surface-subtle h-2 rounded-full overflow-hidden">
<div class="bg-status-success-base h-full transition-all duration-500" :style="selected ? 'width:' + progressWidth(selected) + '%' : 'width:0%'"></div>
</div>
<div class="flex items-center justify-between mt-space-xs font-body-sm text-body-sm text-text-tertiary">
<span class="inline-flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">verified</span> Auto-Rekonsiliasi Duitku</span>
<span class="font-tabular-numeric" x-text="selected ? progressWidth(selected) + '% terselesaikan' : ''"></span>
</div>
</div>

<!-- Term list -->
<div x-show="selected" class="flex-1 overflow-y-auto px-space-xl pb-space-lg flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<span class="font-label-md text-label-md text-text-tertiary uppercase tracking-wider" x-text="'Rincian ' + (selected ? selected.tenor : 0) + ' Termin'"></span>
</div>
<template x-for="term in selected.terms" :key="term.no">
<div class="bg-surface-card rounded-xl p-space-md shadow-sm border border-surface-border flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-full flex items-center justify-center font-label-md text-label-md font-bold shrink-0"
     :class="term.status === 'lunas' ? 'bg-status-success-bg text-status-success-base' : (term.status === 'overdue' ? 'bg-status-danger-bg text-status-danger-base' : (term.status === 'due' ? 'bg-status-warning-bg text-status-warning-base' : 'bg-surface-container-high text-text-secondary'))">
<span x-text="term.no"></span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-text-primary font-semibold" x-text="'Termin ' + term.no + ' dari ' + selected.tenor"></span>
<span class="font-tabular-numeric text-tabular-numeric font-bold text-text-primary" x-text="term.nominal"></span>
</div>
</div>
<span class="inline-flex items-center gap-1 px-space-sm py-0.5 rounded-full font-label-sm text-label-sm font-semibold"
      :class="term.status === 'lunas' ? 'bg-status-success-bg text-status-success-base' : (term.status === 'overdue' ? 'bg-status-danger-bg text-status-danger-base' : (term.status === 'due' ? 'bg-status-warning-bg text-status-warning-base' : 'bg-surface-container-high text-text-secondary'))">
<span class="w-1.5 h-1.5 rounded-full"
      :class="term.status === 'lunas' ? 'bg-status-success-base' : (term.status === 'overdue' ? 'bg-status-danger-base' : (term.status === 'due' ? 'bg-status-warning-base' : 'bg-surface-container-high'))"></span>
<span x-text="termStatusLabel(term.status)"></span>
</span>
</div>
<div class="grid grid-cols-2 gap-space-sm bg-surface-subtle rounded-lg p-space-sm font-body-sm text-body-sm">
<div class="flex flex-col">
<span class="text-text-tertiary">Jatuh Tempo</span>
<span class="font-tabular-numeric font-medium text-text-primary" x-text="term.due"></span>
</div>
<div class="flex flex-col">
<span class="text-text-tertiary">Waktu Bayar</span>
<span class="font-medium" :class="term.paidAt === null ? 'text-text-tertiary' : 'text-status-success-base'" x-text="term.paidAt === null ? 'Belum dibayar' : term.paidAt"></span>
</div>
<template x-if="term.channel">
<div class="col-span-2 flex flex-col">
<span class="text-text-tertiary">Kanal / Ref</span>
<span class="font-medium text-text-primary" x-text="term.channel"></span>
</div>
</template>
</div>
</div>
</template>
</div>

<!-- Footer actions -->
<div x-show="selected" class="p-space-xl bg-surface-subtle flex flex-col gap-space-sm border-t border-surface-border">
<button type="button" @click="showToast('Kuitansi ' + selected.invoice + ' disiapkan untuk diunduh.'); closeDrawer()"
        class="w-full px-space-md py-space-sm rounded-lg bg-secondary text-on-secondary font-label-md text-label-md font-semibold shadow-sm hover:bg-secondary-container transition-colors flex items-center justify-center gap-space-xs">
<span class="material-symbols-outlined text-[18px]">download</span>
<span>Unduh Rekap Kuitansi</span>
</button>
<button type="button" @click="closeDrawer()"
        class="w-full px-space-md py-space-sm rounded-lg bg-surface-card hover:bg-surface-container-high text-text-secondary font-label-md text-label-md transition-colors">
          Tutup
        </button>
</div>
</div>
</div>

<!-- SLIDE-OVER DRAWER: PENCATATAN OFFLINE (FALLBACK) -->
<div class="fixed inset-0 bg-inverse-surface/60 backdrop-blur-sm z-50 hidden transition-opacity flex justify-end" id="offlineDrawerBackdrop">
<div class="w-full max-w-lg bg-surface-card h-full shadow-2xl flex flex-col justify-between overflow-y-auto transform translate-x-full transition-transform duration-300" id="offlineDrawerPanel">
<div class="p-space-xl flex flex-col gap-space-lg">
<!-- Header Drawer -->
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-sm">
<div class="w-9 h-9 rounded-lg bg-status-warning-bg text-status-warning-base flex items-center justify-center">
<span class="material-symbols-outlined text-[22px]">account_balance</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-text-primary leading-tight">Pencatatan Pembayaran Manual</h3>
<p class="font-body-sm text-body-sm text-text-tertiary">Fallback Rekonsiliasi Kasir / Transfer Bank Manual</p>
</div>
</div>
<button class="p-space-xs rounded-lg hover:bg-surface-container-high text-text-secondary" onclick="closeOfflinePaymentDrawer()" type="button">
<span class="material-symbols-outlined text-[22px]">close</span>
</button>
</div>
<!-- Warning Callout Box: Absolute Transparency -->
<div class="bg-status-warning-bg rounded-xl p-space-md flex items-start gap-space-sm">
<span class="material-symbols-outlined text-status-warning-base text-[22px] shrink-0 mt-0.5">warning</span>
<div class="flex flex-col gap-space-2xs text-text-secondary font-body-sm text-body-sm">
<strong class="font-label-md text-label-md text-text-primary">Peringatan Penting Otomasi:</strong>
<p>
              Hanya gunakan formulir ini jika pelanggan membayar secara <strong>tunai langsung di loket kasir</strong> atau transfer manual di luar Virtual Account Duitku.
            </p>
<p class="font-semibold text-text-primary mt-1">
              Pembayaran melalui Duitku VA / QRIS akan terverifikasi 100% otomatis secara instan tanpa perlu tindakan di formulir ini.
            </p>
</div>
</div>
<!-- Form Fields -->
<form class="flex flex-col gap-space-md" onsubmit="event.preventDefault(); submitOfflinePayment();">
<div>
<label class="block font-label-md text-label-md text-text-primary mb-space-xs">No. Invoice &amp; Pelanggan</label>
<input class="w-full px-space-md py-space-sm bg-surface-subtle rounded-lg text-text-primary font-medium font-body-md text-body-md" id="drawerInvoiceRef" readonly="" type="text" value="INV/2026/09/0001 - Fahmi Ramadhan"/>
</div>
<div>
<label class="block font-label-md text-label-md text-text-primary mb-space-xs">Termin yang Diselesaikan</label>
<input class="w-full px-space-md py-space-sm bg-surface-subtle rounded-lg text-text-primary font-medium font-body-md text-body-md" id="drawerTerminRef" readonly="" type="text" value="Cicilan Ke-3"/>
</div>
<div>
<label class="block font-label-md text-label-md text-text-primary mb-space-xs">Nominal yang Diterima (Rp)</label>
<input class="w-full px-space-md py-space-sm bg-surface-canvas rounded-lg text-text-primary font-bold font-tabular-numeric focus:outline-none focus:bg-surface-container-lowest" id="drawerAmountRef" type="text" value="Rp 333.334"/>
</div>
<div>
<label class="block font-label-md text-label-md text-text-primary mb-space-xs">Kanal Pembayaran Manual</label>
<div class="grid grid-cols-2 gap-space-sm">
<label class="flex items-center gap-space-xs p-space-sm rounded-lg bg-surface-subtle cursor-pointer hover:bg-surface-container">
<input checked="" class="text-secondary focus:ring-0" name="payment_channel" type="radio" value="TUNAI"/>
<span class="font-label-md text-label-md text-text-primary">Tunai / Loket</span>
</label>
<label class="flex items-center gap-space-xs p-space-sm rounded-lg bg-surface-subtle cursor-pointer hover:bg-surface-container">
<input class="text-secondary focus:ring-0" name="payment_channel" type="radio" value="TRANSFER_DIRECT"/>
<span class="font-label-md text-label-md text-text-primary">Transfer Rekening Giro</span>
</label>
</div>
</div>
<div>
<label class="block font-label-md text-label-md text-text-primary mb-space-xs">Nomor Referensi Bukti / Kasir</label>
<input class="w-full px-space-md py-space-sm bg-surface-subtle rounded-lg text-text-primary font-body-sm text-body-sm placeholder:text-text-tertiary focus:outline-none focus:bg-surface-container-lowest" placeholder="Contoh: KSR-LKT-08892 atau Ref Transfer 91823" required="" type="text"/>
</div>
<div>
<label class="block font-label-md text-label-md text-text-primary mb-space-xs">Catatan Admin Finance</label>
<textarea class="w-full px-space-md py-space-sm bg-surface-subtle rounded-lg text-text-primary font-body-sm text-body-sm placeholder:text-text-tertiary focus:outline-none focus:bg-surface-container-lowest" placeholder="Sertakan keterangan verifikasi slip tunai fisik..." rows="3"></textarea>
</div>
<div class="bg-surface-subtle p-space-md rounded-lg flex items-center gap-space-sm">
<input checked="" class="w-4 h-4 rounded text-secondary focus:ring-0 cursor-pointer" id="chkSendReceiptWA" type="checkbox"/>
<label class="font-label-md text-label-md text-text-primary cursor-pointer" for="chkSendReceiptWA">
              Kirim Kuitansi Pelunasan Resmi ke WhatsApp Pelanggan
            </label>
</div>
</form>
</div>
<!-- Drawer Footer Actions -->
<div class="p-space-xl bg-surface-subtle flex items-center justify-end gap-space-sm">
<button class="px-space-md py-space-sm rounded-lg bg-surface-card hover:bg-surface-container-high text-text-secondary font-label-md text-label-md transition-colors" onclick="closeOfflinePaymentDrawer()" type="button">
          Batal
        </button>
<button class="px-space-lg py-space-sm rounded-lg bg-secondary text-on-secondary hover:bg-secondary-container font-label-md text-label-md font-semibold transition-colors shadow-sm flex items-center gap-space-xs" onclick="submitOfflinePayment()" type="button">
<span class="material-symbols-outlined text-[18px]">verified</span>
<span>Konfirmasi &amp; Cetak Kuitansi</span>
</button>
</div>
</div>
</div>
<!-- TOAST NOTIFICATION CONTAINER -->
<div class="fixed bottom-6 right-6 z-50 bg-inverse-surface text-inverse-on-surface px-space-lg py-space-md rounded-xl shadow-2xl flex items-center gap-space-sm opacity-0 pointer-events-none transition-all transform translate-y-2" id="toastNotification">
<span class="material-symbols-outlined text-status-success-base text-[22px]">check_circle</span>
<span class="font-label-md text-label-md" id="toastMessage">Pesan notifikasi berhasil muncul</span>
</div>
</div>
<script>
  // Drawer Fallback Functions
  function openOfflinePaymentDrawer(invoiceId, customerName, terminName, amount) {
    const backdrop = document.getElementById('offlineDrawerBackdrop');
    const panel = document.getElementById('offlineDrawerPanel');
    document.getElementById('drawerInvoiceRef').value = invoiceId + ' - ' + customerName;
    document.getElementById('drawerTerminRef').value = terminName;
    document.getElementById('drawerAmountRef').value = amount;
    
    backdrop.classList.remove('hidden');
    setTimeout(() => {
      panel.classList.remove('translate-x-full');
    }, 10);
  }

  function closeOfflinePaymentDrawer() {
    const backdrop = document.getElementById('offlineDrawerBackdrop');
    const panel = document.getElementById('offlineDrawerPanel');
    panel.classList.add('translate-x-full');
    setTimeout(() => {
      backdrop.classList.add('hidden');
    }, 300);
  }

  function submitOfflinePayment() {
    closeOfflinePaymentDrawer();
    showToast('Pembayaran kasir/offline berhasil diverifikasi & kuitansi tersinkronkan.');
  }

  // Action Helpers
  function sendManualReminder(phone, amount) {
    showToast('Pesan pengingat jatuh tempo berhasil dikirim via WA ke ' + phone);
  }

  function resendWhatsAppReceipt(phone, termin) {
    showToast('Kuitansi digital untuk ' + termin + ' berhasil dikirim ulang ke ' + phone);
  }

  function showReceiptModal(receiptNo) {
    showToast('Membuka pratinjau dokumen kuitansi: ' + receiptNo);
  }

  function openCustomerPortalModal(invoiceNo) {
    window.open('{{ route('portal.detail', $token) }}', '_blank');
  }

  // Toast System
  function showToast(message) {
    const toast = document.getElementById('toastNotification');
    const toastMsg = document.getElementById('toastMessage');
    toastMsg.textContent = message;
    toast.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-2');
    toast.classList.add('opacity-100', 'translate-y-0');
    
    setTimeout(() => {
      toast.classList.remove('opacity-100', 'translate-y-0');
      toast.classList.add('opacity-0', 'pointer-events-none', 'translate-y-2');
    }, 3500);
  }

  // Trigger Sync Simulation
  document.getElementById('btnTriggerSync').addEventListener('click', function() {
    this.disabled = true;
    const originalText = this.innerHTML;
    this.innerHTML = '<span class="material-symbols-outlined text-[18px] animate-spin">refresh</span><span>Menghubungi Duitku API...</span>';
    setTimeout(() => {
      this.disabled = false;
      this.innerHTML = originalText;
      showToast('Cron Duitku Sync selesai: Semua 88 tagihan aktif selaras dengan payment gateway.');
    }, 1200);
  });

  // Export Simulation
  document.getElementById('btnExport').addEventListener('click', function() {
    showToast('Mengunduh berkas rekapitulasi: Rekap_Tagihan_Cicilan_2026.xlsx');
  });
</script>
@endsection
