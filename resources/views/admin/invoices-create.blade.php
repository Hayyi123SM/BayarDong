@extends('layouts.admin')

@section('content')
<div class="flex flex-col w-full" x-data="tenorCalculator({ token: @js($token) })"
     @customer-selected.window="setCustomer($event.detail.customer)"
     @customer-cleared.window="clearCustomer()">
<!-- Stepper Header Wizard -->
<section class="mb-space-2xl">
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-space-md mb-space-lg">
<div>
<div class="flex items-center gap-space-xs text-secondary mb-space-2xs">
<span class="material-symbols-outlined text-[18px]">account_tree</span>
<span class="font-label-sm text-label-sm uppercase tracking-wider font-semibold">Engine V2.0 • Alokasi Presisi Saldo</span>
</div>
<h1 class="font-headline-lg text-headline-lg text-text-primary tracking-tight">Kalkulator Tenor &amp; Penerbit Tagihan</h1>
<p class="font-body-md text-body-md text-text-secondary mt-space-2xs">Konfigurasikan skema angsuran berkala dengan penanganan sisa bagi otomatis (rounding policy) dan penerbitan token Duitku PG terenkripsi.</p>
</div>
<div class="flex items-center gap-space-sm bg-surface-card p-space-xs rounded-xl shadow-sm">
<span class="px-space-sm py-space-xs rounded-lg font-label-md text-label-md bg-status-info-bg text-status-info-base flex items-center gap-space-xs">
<span class="material-symbols-outlined text-[16px]">verified</span> Multi-Tenant Safe
        </span>
<span class="px-space-sm py-space-xs rounded-lg font-label-md text-label-md bg-surface-subtle text-text-secondary">
          ID Draft: <span class="font-tabular-numeric text-text-primary font-semibold">#DRF-2026-9042</span>
</span>
</div>
</div>
<!-- Stepper Progress Tracks -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-md">
<!-- Step 1 Complete -->
<div class="flex items-center gap-space-md p-space-md rounded-xl bg-surface-card shadow-sm relative overflow-hidden">
<div class="w-10 h-10 rounded-lg bg-status-success-bg text-status-success-base flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[22px]">check_circle</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-sm text-label-sm uppercase text-text-tertiary">Langkah 1</span>
<span class="font-label-lg text-label-lg text-text-primary truncate">Identitas &amp; Kontak Pembayar</span>
<span class="font-body-sm text-body-sm text-status-success-base">Tervalidasi (Duitku CC Ready)</span>
</div>
<div class="absolute bottom-0 left-0 right-0 h-1 bg-status-success-base"></div>
</div>
<!-- Step 2 Complete (reactive to Section A readiness) -->
<div class="flex items-center gap-space-md p-space-md rounded-xl bg-surface-card shadow-sm relative overflow-hidden">
<div class="w-10 h-10 rounded-lg flex items-center justify-center shrink-0" :class="customerReady ? 'bg-status-success-bg text-status-success-base' : 'bg-surface-subtle text-text-tertiary'">
<span class="material-symbols-outlined text-[22px]" x-text="customerReady ? 'tune' : 'lock'"></span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-sm text-label-sm uppercase text-text-tertiary">Langkah 2</span>
<span class="font-label-lg text-label-lg text-text-primary truncate">Tenor &amp; Interval Waktu</span>
<template x-if="customerReady">
<span class="font-body-sm text-body-sm text-status-success-base">Skema <span x-text="tenor"></span>x Angsuran Bulanan</span>
</template>
<template x-if="!customerReady">
<span class="font-body-sm text-body-sm text-text-tertiary">Terkunci — lengkapi Data Pelanggan dulu</span>
</template>
</div>
<div class="absolute bottom-0 left-0 right-0 h-1" :class="customerReady ? 'bg-status-success-base' : 'bg-surface-border'"></div>
</div>
<!-- Step 3 Active -->
<div class="flex items-center gap-space-md p-space-md rounded-xl bg-primary-container text-on-primary shadow-md relative overflow-hidden">
<div class="w-10 h-10 rounded-lg bg-secondary text-on-secondary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[22px]">analytics</span>
</div>
<div class="flex flex-col min-w-0">
<div class="flex items-center gap-space-xs">
<span class="font-label-sm text-label-sm uppercase text-primary-fixed">Langkah 3</span>
<span class="w-2 h-2 rounded-full bg-tertiary-fixed animate-pulse"></span>
</div>
<span class="font-label-lg text-label-lg text-on-secondary truncate">Kalkulasi &amp; Preview Jadwal</span>
<span class="font-body-sm text-body-sm text-primary-fixed">Siap Terbit &amp; Otomasi WA</span>
</div>
<div class="absolute bottom-0 left-0 right-0 h-1 bg-secondary"></div>
</div>
</div>
</section>
<!-- Two-Column Form Layout: Configuration vs Live Preview -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-start mb-space-3xl">
<!-- Left Column: Form Konfigurasi Tagihan (7 Cols) -->
<div class="lg:col-span-7 flex flex-col gap-space-lg">
<!-- Section A: Profil Pelanggan -->
<div x-ref="sectionA" class="bg-surface-card rounded-xl p-space-xl shadow-sm scroll-mt-20">
<div class="flex items-center justify-between pb-space-sm mb-space-md border-b border-surface-border">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-surface-container-high text-secondary flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">person_search</span>
</div>
<div>
<h2 class="font-headline-sm text-headline-sm text-text-primary">Data Pelanggan &amp; Tagihan</h2>
<p class="font-body-sm text-body-sm text-text-secondary">Pilih akun via searchable combobox atau daftarkan kontak baru instan.</p>
</div>
</div>
<span class="px-space-sm py-space-2xs rounded-full bg-status-info-bg text-status-info-base font-label-sm text-label-sm flex items-center gap-space-xs">
<span class="w-1.5 h-1.5 rounded-full bg-status-info-base"></span> Duitku CC Terintegrasi
          </span>
</div>
<div class="flex flex-col gap-space-md" x-data="customerCombobox(@js($customers))">
<!-- Selected customer state -->
<div x-show="selected" x-cloak>
<label class="block font-semibold font-label-sm text-label-sm text-text-secondary mb-space-xs uppercase tracking-wider">Nama Lengkap Penerima</label>
<div class="flex items-center justify-between p-space-md bg-surface-card border border-surface-border rounded-xl">
<div class="flex items-center gap-space-md">
<div class="w-10 h-10 rounded-full bg-brand-indigo text-on-primary flex items-center justify-center font-headline-sm text-headline-sm" x-text="selected.initials">
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-text-primary" x-text="selected.name"></span>
<span class="font-body-sm text-body-sm text-text-secondary" x-text="`ID ${selected.id} • ${selected.segment}`"></span>
</div>
</div>
<button class="flex items-center gap-space-xs text-secondary font-label-md text-label-md hover:text-secondary-container transition-colors" type="button" @click="clearSelection()">
<span>Ganti</span>
<span class="material-symbols-outlined text-[18px]">expand_more</span>
</button>
</div>
</div>

<!-- Searchable combobox state -->
<div class="relative" x-show="!selected" x-cloak>
<label class="block font-semibold font-label-sm text-label-sm text-text-secondary mb-space-xs uppercase tracking-wider">Nama Lengkap Penerima</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-space-md top-1/2 -translate-y-1/2 text-text-tertiary text-[20px]">person_search</span>
<input class="w-full pl-10 pr-10 py-space-md bg-surface-card border-2 border-surface-border rounded-xl font-body-md text-body-md text-text-primary placeholder:text-text-tertiary focus:border-secondary focus:outline-none transition-colors" type="text" placeholder="Ketik nama, ID pelanggan, atau no. WhatsApp..." x-model="query" @input="search()" @focus="isOpen = true">
<button class="absolute right-space-md top-1/2 -translate-y-1/2 text-text-tertiary hover:text-text-primary transition-colors" type="button" x-show="query.length > 0" @click="query=''; results=customers; isOpen=false" x-cloak>
<span class="material-symbols-outlined text-[18px]">cancel</span>
</button>
</div>

<!-- Dropdown panel -->
<div class="absolute z-20 mt-2 w-full bg-surface-card rounded-xl shadow-lg border border-surface-border overflow-hidden" x-show="isOpen" x-cloak>
<div class="px-space-md py-space-sm border-b border-surface-border flex items-center justify-between">
<p class="font-label-sm text-label-sm text-text-tertiary">Hasil Pencarian (<span class="font-semibold text-text-primary" x-text="results.length"></span> Ditemukan)</p>
<span class="font-label-sm text-label-sm text-text-tertiary hidden sm:inline">Gunakan Enter ⏎</span>
</div>
<ul class="max-h-56 overflow-y-auto" x-show="query.length > 0">
<template x-for="c in results" :key="c.id">
<li>
<button type="button" class="w-full flex items-center gap-space-md px-space-md py-space-sm hover:bg-surface-subtle transition-colors text-left" @click="selectCustomer(c)">
<div class="w-9 h-9 rounded-full bg-secondary/10 text-secondary flex items-center justify-center font-label-md text-label-md font-semibold shrink-0" x-text="c.initials"></div>
<div class="flex-1 min-w-0">
<p class="font-body-md font-semibold text-text-primary truncate" x-text="c.name"></p>
<p class="font-label-sm text-label-sm text-text-tertiary" x-text="`${c.id} • ${c.segment}`"></p>
</div>
<span class="font-label-sm text-label-sm text-text-tertiary tabular-nums" x-text="c.phone"></span>
</button>
</li>
</template>
<li x-show="results.length === 0">
<div class="px-space-md py-space-2xs font-body-sm text-body-sm text-text-tertiary">Tidak ada pelanggan yang cocok dengan "<span class="font-semibold text-text-primary" x-text="query"></span>".</div>
</li>
</ul>

<!-- Register new option -->
<button type="button" class="w-full flex items-center gap-space-sm px-space-md py-space-sm border-t border-surface-border hover:bg-surface-subtle transition-colors text-left" x-show="query.length > 0" @click="registerNew()">
<span class="material-symbols-outlined text-secondary text-[18px]">person_add</span>
<div class="flex-1 min-w-0">
<p class="font-body-sm font-semibold text-text-primary">Daftarkan "<span x-text="query" class="text-secondary"></span>" sebagai Pelanggan Baru</p>
<p class="font-label-sm text-label-sm text-text-tertiary">Nama akan dipilih dan kontak diisi manual</p>
</div>
<span class="material-symbols-outlined text-text-tertiary text-[16px]">arrow_forward</span>
</button>
</div>
</div>

<input type="hidden" name="customer_name" :value="selected ? selected.name : ''">
</div>

<div class="flex flex-col gap-space-lg mt-space-lg pt-space-lg border-t border-surface-border">
<div class="grid grid-cols-1 sm:grid-cols-2 gap-space-lg">
<div>
<label class="block font-semibold font-label-sm text-label-sm text-text-secondary mb-space-xs uppercase tracking-wider">Nomor WhatsApp Pelanggan
<span class="inline-flex items-center gap-space-2xs ml-space-xs px-space-xs py-space-2xs rounded-full font-label-sm text-label-sm font-semibold" x-show="customer && !customer.isNew" x-bind:class="'bg-status-success-bg text-status-success-base'" x-cloak>
<span class="w-1.5 h-1.5 rounded-full bg-status-success-base"></span> Auto-filled (E.164)
</span>
</label>
<div class="relative">
<span class="absolute left-space-md top-1/2 -translate-y-1/2 font-label-md text-label-md text-text-tertiary">ID (+62)</span>
<input class="w-full pl-16 pr-10 py-space-sm rounded-lg border bg-surface-card font-tabular-numeric text-tabular-numeric text-text-primary focus:border-secondary focus:outline-none transition-colors" type="text" placeholder="81234567890" x-model="wa" :readonly="customer && !customer.isNew" :class="customer && !customer.isNew ? 'bg-surface-subtle' : 'bg-surface-card'"/>
<span class="material-symbols-outlined absolute right-space-md top-1/2 -translate-y-1/2 text-status-success-base text-[18px]" x-show="customer && !customer.isNew" x-cloak>verified</span>
</div>
</div>
<div>
<label class="block font-semibold font-label-sm text-label-sm text-text-secondary mb-space-xs uppercase tracking-wider">Email (Disarankan Wajib Duitku CC)
<span class="inline-flex items-center gap-space-2xs ml-space-xs px-space-xs py-space-2xs rounded-full font-label-sm text-label-sm font-semibold" x-show="customer && !customer.isNew" x-bind:class="'bg-status-info-bg text-status-info-base'" x-cloak>
<span class="w-1.5 h-1.5 rounded-full bg-status-info-base"></span> Auto-filled
</span>
</label>
<div class="relative">
<input class="w-full px-space-md py-space-sm rounded-lg border bg-surface-card font-body-sm text-body-sm text-text-primary focus:border-secondary focus:outline-none transition-colors" type="email" placeholder="nama@email.com" :readonly="customer && !customer.isNew" :value="customer ? customer.email : ''" :class="customer && !customer.isNew ? 'bg-surface-subtle' : 'bg-surface-card'"/>
<span class="material-symbols-outlined absolute right-space-md top-1/2 -translate-y-1/2 text-status-info-base text-[18px]" x-show="customer && !customer.isNew" x-cloak>mail</span>
</div>
</div>
</div>
<div class="mt-space-lg">
<label class="block font-semibold font-label-sm text-label-sm text-text-secondary mb-space-xs uppercase tracking-wider">Deskripsi &amp; Peruntukan Tagihan</label>
<div class="relative">
<input class="w-full px-space-md py-space-sm pr-24 rounded-lg border bg-surface-card font-label-lg text-label-lg text-text-primary focus:border-secondary focus:outline-none transition-colors" type="text" placeholder="Contoh: SPP Semester Ganjil 2026" x-model="description" @keydown.enter="onDescriptionKeydown($event)" @input="onDescriptionInput()"/>
<span class="material-symbols-outlined absolute right-space-md top-1/2 -translate-y-1/2 text-text-tertiary text-[18px]">edit_note</span>
</div>
<p class="mt-space-xs font-body-sm text-body-sm text-text-tertiary flex items-center gap-space-2xs">
<span class="material-symbols-outlined text-[16px]">keyboard_return</span>
Tekan <span class="font-semibold text-text-secondary">Enter</span> untuk mengaktifkan Skema Angsuran &amp; Tenor
</p>
</div>
</div>
</div>
<!-- Section B: Nominal & Kalkulator Tenor Dinamis -->
<div x-ref="sectionB" class="bg-surface-card rounded-xl p-space-xl shadow-sm scroll-mt-20 transition-shadow duration-500"
     :class="sectionBGlow ? 'ring-2 ring-secondary' : ''">
<div class="flex items-center gap-space-sm pb-space-sm mb-space-md">
<div class="w-8 h-8 rounded-lg bg-surface-container-high text-secondary flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">calculate</span>
</div>
<div>
<h2 class="font-headline-sm text-headline-sm text-text-primary">Skema Angsuran &amp; Tenor</h2>
<p class="font-body-sm text-body-sm text-text-secondary">Tentukan total pokok tagihan dan pembagian periode cicilan.</p>
</div>
</div>

{{-- Lock banner: Section B terkunci sampai Section A lengkap --}}
<div x-show="!customerReady" x-cloak class="flex flex-col gap-space-sm mb-space-lg p-space-md rounded-xl bg-surface-subtle border border-surface-border">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-[22px] text-text-tertiary">lock</span>
<span class="font-label-md text-label-md text-text-primary font-semibold">Section ini terkunci</span>
</div>
<p class="font-body-sm text-body-sm text-text-secondary">Lengkapi <span class="font-semibold text-text-primary">Data Pelanggan &amp; Tagihan</span> terlebih dahulu (pilih pelanggan, isi nomor WhatsApp, dan deskripsi tagihan) untuk mengaktifkan pengaturan angsuran &amp; tenor.</p>
<button type="button" @click="focusSectionA()" class="self-start inline-flex items-center gap-space-xs px-space-md py-space-2xs rounded-lg bg-secondary text-on-secondary font-label-md text-label-md shadow-sm hover:bg-secondary-container transition-colors">
<span class="material-symbols-outlined text-[18px]">arrow_upward</span>
<span>Ke Data Pelanggan</span>
</button>
</div>

<div class="flex flex-col gap-space-lg" :class="!customerReady && 'opacity-50 pointer-events-none select-none'">
<!-- Total Nominal Input -->
<div>
<div class="flex items-center justify-between mb-space-xs">
<label class="font-label-sm text-label-sm text-text-secondary uppercase tracking-wider">Total Nominal Tagihan Induk</label>
<span class="font-label-sm text-label-sm text-secondary font-semibold">IDR (Indonesian Rupiah)</span>
</div>
<div class="relative bg-surface-subtle rounded-xl p-space-md flex items-center">
<span class="font-headline-md text-headline-md text-text-tertiary mr-space-sm">Rp</span>
<input x-ref="totalInput" x-model="totalText" :disabled="!customerReady" class="w-full bg-transparent font-display-currency text-display-currency text-text-primary focus:outline-none tracking-tight disabled:cursor-not-allowed" id="nominal-input" type="text" placeholder="0"/>
<div class="flex items-center gap-space-xs ml-space-sm bg-surface-card px-space-sm py-space-xs rounded-lg shadow-sm">
<span class="w-2 h-2 rounded-full bg-status-success-base"></span>
<span class="font-label-sm text-label-sm text-text-secondary">Fixed Total</span>
</div>
</div>
</div>
<!-- Tenor Selector Chips -->
<div>
<div class="flex items-center justify-between mb-space-xs">
<label class="font-label-sm text-label-sm text-text-secondary uppercase tracking-wider">Frekuensi Pembagian Cicilan</label>
<span class="font-body-sm text-body-sm text-text-tertiary">Pilih preset atau buat nilai kustom</span>
</div>
<div class="grid grid-cols-2 sm:grid-cols-5 gap-space-sm">
<button type="button" @click="setTenor(1)" :disabled="!customerReady"
class="py-space-sm px-space-md rounded-lg text-center font-label-md text-label-md transition-all"
:class="isTenor(1) ? 'bg-secondary text-on-secondary shadow-sm font-semibold' : 'bg-surface-subtle text-text-secondary hover:bg-surface-container-high'">
<span class="block">1x (Lunas)</span>
<span class="block mt-space-2xs inline-flex items-center justify-center gap-space-2xs"
:class="isTenor(1) ? 'text-on-secondary' : 'text-text-tertiary'"
x-show="isTenor(1)">
<span class="w-1.5 h-1.5 rounded-full bg-status-success-base"></span>
<span class="font-label-sm text-label-sm">Aktif</span>
</span>
</button>
<button type="button" @click="setTenor(3)" :disabled="!customerReady"
class="py-space-sm px-space-md rounded-lg text-center font-label-md text-label-md transition-all"
:class="isTenor(3) ? 'bg-secondary text-on-secondary shadow-sm font-semibold' : 'bg-surface-subtle text-text-secondary hover:bg-surface-container-high'">
<span class="block">3x Cicilan</span>
<span class="block mt-space-2xs inline-flex items-center justify-center gap-space-2xs"
:class="isTenor(3) ? 'text-on-secondary' : 'text-text-tertiary'"
x-show="isTenor(3)">
<span class="w-1.5 h-1.5 rounded-full bg-status-success-base"></span>
<span class="font-label-sm text-label-sm">Aktif</span>
</span>
</button>
<button type="button" @click="setTenor(6)" :disabled="!customerReady"
class="py-space-sm px-space-md rounded-lg text-center font-label-md text-label-md transition-all"
:class="isTenor(6) ? 'bg-secondary text-on-secondary shadow-sm font-semibold' : 'bg-surface-subtle text-text-secondary hover:bg-surface-container-high'">
<span class="block">6x Cicilan</span>
<span class="block mt-space-2xs inline-flex items-center justify-center gap-space-2xs"
:class="isTenor(6) ? 'text-on-secondary' : 'text-text-tertiary'"
x-show="isTenor(6)">
<span class="w-1.5 h-1.5 rounded-full bg-status-success-base"></span>
<span class="font-label-sm text-label-sm">Aktif</span>
</span>
</button>
<button type="button" @click="setTenor(12)" :disabled="!customerReady"
class="py-space-sm px-space-md rounded-lg text-center font-label-md text-label-md transition-all"
:class="isTenor(12) ? 'bg-secondary text-on-secondary shadow-sm font-semibold' : 'bg-surface-subtle text-text-secondary hover:bg-surface-container-high'">
<span class="block">12x Cicilan</span>
<span class="block mt-space-2xs inline-flex items-center justify-center gap-space-2xs"
:class="isTenor(12) ? 'text-on-secondary' : 'text-text-tertiary'"
x-show="isTenor(12)">
<span class="w-1.5 h-1.5 rounded-full bg-status-success-base"></span>
<span class="font-label-sm text-label-sm">Aktif</span>
</span>
</button>
<button type="button" @click="openCustomModal()" :disabled="!customerReady"
class="py-space-sm px-space-md rounded-lg text-center font-label-md text-label-md transition-all flex flex-col items-center justify-center gap-space-2xs"
:class="isCustomTenor ? 'bg-secondary text-on-secondary shadow-sm font-semibold' : 'bg-surface-subtle text-text-secondary hover:bg-surface-container-high'">
<span class="flex items-center gap-space-2xs">
<span class="material-symbols-outlined text-[18px]">tune</span>
<span>Kustom</span>
</span>
<span class="inline-flex mx-auto items-center gap-space-2xs rounded-full px-space-sm py-space-2xs transition-colors"
:class="isCustomTenor ? 'bg-white/20 text-on-secondary' : 'bg-surface-container-high text-secondary'"
x-show="isCustomTenor">
<span class="font-tabular-numeric text-tabular-numeric font-bold font-label-md text-label-md" x-text="tenor + ' Termin'"></span>
<span class="material-symbols-outlined text-[14px]" :class="isCustomTenor ? 'text-on-secondary' : 'text-text-tertiary'">check_circle</span>
</span>
<span class="inline-flex items-center justify-center gap-space-2xs"
:class="isCustomTenor ? 'text-on-secondary' : 'text-text-tertiary'"
x-show="isCustomTenor">
<span class="w-1.5 h-1.5 rounded-full bg-status-success-base"></span>
<span class="font-label-sm text-label-sm">Aktif</span>
</span>
</button>
</div>
</div>
<!-- Interval & Tanggal Terbit Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
<div>
<label class="block font-label-sm text-label-sm text-text-secondary mb-space-xs uppercase tracking-wider">Interval Waktu Jatuh Tempo</label>
<div class="flex flex-col gap-space-sm">
<div class="grid grid-cols-3 gap-space-sm">
<button type="button" @click="setInterval('monthly')" :disabled="!customerReady"
class="py-space-sm px-space-md rounded-lg text-center font-label-md text-label-md transition-all"
:class="isInterval('monthly') ? 'bg-secondary text-on-secondary shadow-sm font-semibold' : 'bg-surface-subtle text-text-secondary hover:bg-surface-container-high'">
<span class="flex items-center justify-center gap-space-2xs">
<span class="material-symbols-outlined text-[18px]">calendar_month</span>
<span>Bulanan</span>
</span>
<span class="block mt-space-2xs inline-flex items-center justify-center gap-space-2xs font-label-sm text-label-sm"
:class="isInterval('monthly') ? 'text-on-secondary' : 'text-text-tertiary'"
x-show="isInterval('monthly')">
<span class="w-1.5 h-1.5 rounded-full bg-status-success-base"></span>
Aktif
</span>
</button>
<button type="button" @click="setInterval('weekly')" :disabled="!customerReady"
class="py-space-sm px-space-md rounded-lg text-center font-label-md text-label-md transition-all"
:class="isInterval('weekly') ? 'bg-secondary text-on-secondary shadow-sm font-semibold' : 'bg-surface-subtle text-text-secondary hover:bg-surface-container-high'">
<span class="flex items-center justify-center gap-space-2xs">
<span class="material-symbols-outlined text-[18px]">event_repeat</span>
<span>Mingguan</span>
</span>
<span class="block mt-space-2xs inline-flex items-center justify-center gap-space-2xs font-label-sm text-label-sm"
:class="isInterval('weekly') ? 'text-on-secondary' : 'text-text-tertiary'"
x-show="isInterval('weekly')">
<span class="w-1.5 h-1.5 rounded-full bg-status-success-base"></span>
Aktif
</span>
</button>
<button type="button" @click="setInterval('custom')" :disabled="!customerReady"
class="py-space-sm px-space-md rounded-lg text-center font-label-md text-label-md transition-all"
:class="isInterval('custom') ? 'bg-secondary text-on-secondary shadow-sm font-semibold' : 'bg-surface-subtle text-text-secondary hover:bg-surface-container-high'">
<span class="flex items-center justify-center gap-space-2xs">
<span class="material-symbols-outlined text-[18px]">tune</span>
<span>Kustom</span>
</span>
<span class="block mt-space-2xs inline-flex items-center justify-center gap-space-2xs font-label-sm text-label-sm"
:class="isInterval('custom') ? 'text-on-secondary' : 'text-text-tertiary'"
x-show="isInterval('custom')">
<span class="w-1.5 h-1.5 rounded-full bg-status-success-base"></span>
Aktif
</span>
</button>
</div>

{{-- Panel Kustom: quick-pick + input numerik + ringkasan live --}}
<div x-show="isInterval('custom')" x-cloak class="bg-surface-card border border-surface-border rounded-xl shadow-sm p-space-md flex flex-col gap-space-md">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-2xs">
<span class="material-symbols-outlined text-[18px] text-secondary">schedule</span>
<span class="font-label-md text-label-md text-text-primary font-semibold">Frekuensi Jatuh Tempo</span>
</div>
<span class="font-body-sm text-body-sm text-text-tertiary">Pilih cepat atau ketik manual</span>
</div>

<div class="flex items-center gap-space-2xs flex-wrap">
<span class="font-body-sm text-body-sm text-text-secondary mr-space-2xs">Setiap</span>
<template x-for="n in [7, 10, 14, 30, 60]" :key="n">
<button type="button" @click="setCustomIntervalDays(n)" :disabled="!customerReady"
class="px-space-sm py-space-2xs rounded-lg font-tabular-numeric text-tabular-numeric font-label-md text-label-md transition-all"
:class="customIntervalDays === n && interval === 'custom' ? 'bg-secondary text-on-secondary font-semibold shadow-sm' : 'bg-surface-subtle text-text-secondary hover:bg-surface-container-high'">
<span x-text="n + ' hari'"></span>
</button>
</template>
</div>

<div class="grid grid-cols-[auto_1fr_auto] items-center gap-space-sm bg-surface-subtle rounded-lg px-space-md py-space-sm">
<span class="font-label-md text-label-md text-text-secondary">Setiap</span>
<input x-model="customIntervalDays" type="number" min="1" max="365" :disabled="!customerReady"
class="w-20 px-space-md py-space-xs bg-surface-card rounded-lg font-tabular-numeric text-tabular-numeric text-text-primary text-center focus:outline-none focus:border-secondary border border-surface-border disabled:opacity-50"/>
<span class="font-label-md text-label-md text-text-secondary">hari</span>
</div>

<p class="font-body-sm text-body-sm text-text-secondary flex items-center gap-space-2xs">
<span class="material-symbols-outlined text-[16px] text-secondary">verified</span>
Jatuh tempo tiap <span class="font-semibold text-text-primary" x-text="Math.max(1, Number(customIntervalDays) || 7) + ' hari'"></span> per termin
</p>
</div>
</div>
</div>
<div>
<label class="block font-label-sm text-label-sm text-text-secondary mb-space-xs uppercase tracking-wider">Tanggal Terbit Tagihan Induk</label>
<div class="flex flex-col gap-space-xs">
<div class="relative">
<input x-ref="issuedDateRef" x-model="issuedDate" type="date" :disabled="!customerReady" class="w-full px-space-md py-space-sm bg-surface-subtle rounded-lg font-tabular-numeric text-tabular-numeric text-text-primary focus:outline-none disabled:cursor-not-allowed"/>
<button type="button" @click="openDatePicker()" :disabled="!customerReady"
class="absolute right-space-xs top-1/2 -translate-y-1/2 text-text-secondary hover:text-secondary transition-colors p-space-xs rounded-lg disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer"
aria-label="Buka kalender untuk tanggal terbit">
<span class="material-symbols-outlined text-[18px]">today</span>
</button>
</div>
<p class="font-body-sm text-body-sm text-text-tertiary flex items-center gap-space-2xs" x-show="issuedDateLabel">
<span class="material-symbols-outlined text-[16px]">event</span>
Akan terbit: <span class="font-semibold text-text-secondary" x-text="issuedDateLabel"></span>
</p>
</div>
</div>
</div>
<!-- Rounding Engine Policy Selection -->
<div class="p-space-md rounded-xl bg-status-warning-bg">
<div class="flex items-start gap-space-sm">
<span class="material-symbols-outlined text-status-warning-base text-[22px] mt-0.5">balance</span>
<div class="flex flex-col flex-1">
<div class="flex items-center justify-between">
<span class="font-label-lg text-label-lg text-text-primary">Kebijakan Pembulatan (Rounding Policy)</span>
<span class="px-space-xs py-space-2xs rounded bg-status-warning-border text-on-surface font-label-sm text-label-sm font-semibold">Engine v2.0</span>
</div>
<p class="font-body-sm text-body-sm text-text-secondary mt-space-2xs mb-space-sm">
                  Metode otomatis penyeimbang desimal ganjil agar akumulasi angsuran identik 100% dengan induk tanpa pembulatan ke atas yang membebani pembayar di awal.
                </p>
<!-- Radio Options -->
<div class="flex flex-col gap-space-xs">
<label class="flex items-start gap-space-sm p-space-sm rounded-lg bg-surface-card cursor-pointer shadow-sm">
<input x-model="policy" value="last" :disabled="!customerReady" class="mt-1 accent-secondary disabled:opacity-50" name="rounding_policy" type="radio"/>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-text-primary font-semibold flex items-center gap-space-xs">
Alokasikan Sisa (Remainder) ke Cicilan Terakhir
<span class="px-space-xs rounded bg-status-success-bg text-status-success-base font-label-sm text-label-sm">Rekomendasi v2.0</span>
</span>
<span class="font-body-sm text-body-sm text-text-secondary">
Termin 1 s.d. <span x-text="tenor - 1"></span> <span x-text="'Rp '+bk.formatIDR(Math.floor(total/tenor))"></span>, Termin terakhir menampung +sisa.
</span>
</div>
</label>
<label class="flex items-start gap-space-sm p-space-sm rounded-lg bg-surface-card cursor-pointer shadow-sm opacity-80 hover:opacity-100 transition-opacity">
<input x-model="policy" value="first" :disabled="!customerReady" class="mt-1 accent-secondary disabled:opacity-50" name="rounding_policy" type="radio"/>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-text-primary font-semibold">Alokasikan Sisa (Remainder) ke Cicilan Pertama</span>
<span class="font-body-sm text-body-sm text-text-secondary">Termin 1 menampung +sisa, termin berikutnya bernilai sama.</span>
</div>
</label>
</div>
</div>
</div>
</div>
<!-- WhatsApp Automation Trigger Switch -->
<div class="flex items-center justify-between p-space-md bg-surface-subtle rounded-xl">
<div class="flex items-center gap-space-sm">
<div class="w-9 h-9 rounded-lg bg-status-success-bg text-status-success-base flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">send_to_mobile</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-text-primary font-semibold">Notifikasi WhatsApp Otomatis</span>
<span class="font-body-sm text-body-sm text-text-secondary">Kirim pesan WhatsApp otomatis saat invoice terbit (+ tautan portal unik).</span>
</div>
</div>
<label class="relative inline-flex items-center cursor-pointer">
<input x-model="waOn" :disabled="!customerReady" class="sr-only peer disabled:opacity-50" type="checkbox"/>
<div class="w-11 h-6 bg-surface-dim peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-secondary"></div>
</label>
</div>
</div>
</div>
</div>
{{-- Modal Kustom Termin --}}
<div x-show="customModalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-space-md"
     role="dialog" aria-modal="true" aria-label="Kustom Jumlah Termin">
<div class="absolute inset-0 bg-black/50" @click="closeCustomModal()"></div>
<div class="relative w-full max-w-sm bg-surface-card rounded-2xl shadow-2xl overflow-hidden">
<div class="flex items-start justify-between p-space-lg pb-space-sm border-b border-surface-border">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-lg bg-secondary/10 text-secondary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[22px]">tune</span>
</div>
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-text-primary">Kustom Jumlah Termin</span>
<span class="font-body-sm text-body-sm text-text-secondary">Atur banyaknya cicilan sesuai kebutuhan.</span>
</div>
</div>
<button type="button" @click="closeCustomModal()" class="text-text-tertiary hover:text-text-primary transition-colors p-space-2xs">
<span class="material-symbols-outlined text-[22px]">close</span>
</button>
</div>
<div class="p-space-lg flex flex-col gap-space-sm">
<label class="block font-label-md text-label-md text-text-secondary mb-space-2xs">Jumlah Termin (2 - 48)</label>
<div class="relative">
<input x-ref="customTenorInputRef" x-model="customTenorInput" type="number" min="2" max="48" inputmode="numeric" :placeholder="''" @focus="$event.target.select()" @keydown.enter="applyCustomTenor()"
class="w-full px-space-md py-space-sm rounded-lg border bg-surface-card font-display-currency text-display-currency text-text-primary text-center focus:border-secondary focus:ring-2 focus:ring-secondary/30 focus:outline-none border-surface-border"/>
</div>
<p x-show="customTenorError" x-cloak class="font-body-sm text-body-sm text-status-danger-base flex items-center gap-space-2xs">
<span class="material-symbols-outlined text-[16px]">error</span>
<span x-text="customTenorError"></span>
</p>
</div>
<div class="flex gap-space-sm p-space-lg pt-space-2xs border-t border-surface-border">
<button type="button" @click="closeCustomModal()"
class="flex-1 px-space-md py-space-sm rounded-lg bg-surface-subtle text-text-secondary font-label-md text-label-md font-semibold hover:bg-surface-container-high transition-colors">
Batal
</button>
<button type="button" @click="applyCustomTenor()"
class="flex-1 px-space-md py-space-sm rounded-lg bg-secondary text-on-secondary font-label-md text-label-md font-semibold shadow-sm hover:bg-secondary-container transition-colors">
Terapkan
</button>
</div>
</div>
</div>
<!-- Right Column: Live Preview Jadwal Angsuran & Algoritma Pembulatan (5 Cols) -->
<div class="lg:col-span-5 flex flex-col gap-space-lg sticky top-20">
{{-- Locked placeholder: ditampilkan sebelum Section A lengkap --}}
<div x-show="!customerReady" x-cloak class="bg-surface-card rounded-xl p-space-xl shadow-sm flex flex-col items-center text-center gap-space-md">
<div class="w-14 h-14 rounded-full bg-surface-subtle flex items-center justify-center">
<span class="material-symbols-outlined text-[28px] text-text-tertiary">lock</span>
</div>
<div class="flex flex-col gap-space-2xs">
<span class="font-headline-sm text-headline-sm text-text-primary">Preview Angsuran Terkunci</span>
<span class="font-body-sm text-body-sm text-text-secondary">Lengkapi Data Pelanggan &amp; Tagihan untuk melihat Algoritma Presisi dan Jadwal Angsuran.</span>
</div>
<button type="button" @click="focusSectionA()" class="inline-flex items-center gap-space-xs px-space-md py-space-xs rounded-lg bg-secondary text-on-secondary font-label-md text-label-md shadow-sm hover:bg-secondary-container transition-colors">
<span class="material-symbols-outlined text-[18px]">arrow_upward</span>
<span>Ke Data Pelanggan</span>
</button>
</div>

<!-- Rounding Math Highlight Box -->
<div x-show="customerReady" x-cloak class="bg-primary-container text-on-primary rounded-xl p-space-xl shadow-lg relative overflow-hidden">
<div class="flex items-center justify-between pb-space-sm mb-space-md">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-tertiary-fixed text-[20px]">verified_user</span>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-primary-fixed">Algoritma Presisi 100%</span>
</div>
<span class="px-space-xs py-space-2xs rounded bg-surface-tint text-on-primary font-tabular-numeric text-label-sm">Delta: <span x-text="bk.currency(schedule.delta)"></span></span>
</div>
<div class="bg-surface-card/10 backdrop-blur-md rounded-lg p-space-md mb-space-md">
<div class="flex items-center justify-between text-body-sm text-primary-fixed mb-space-xs">
<span>Formula Pembagian Pokok:</span>
<span class="font-tabular-numeric font-semibold" x-text="schedule.formulaText"></span>
</div>
<div class="flex items-baseline justify-between">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-primary-fixed">Base Instalment</span>
<span class="font-headline-md text-headline-md text-on-secondary font-bold" x-text="schedule.baseText"></span>
</div>
<div class="text-right">
<span class="font-label-sm text-label-sm text-tertiary-fixed font-semibold" x-show="schedule.remainder > 0">Remainder (+Rp <span x-text="schedule.remainder"></span>)</span>
<span class="block font-body-sm text-body-sm text-primary-fixed">
<span x-show="schedule.remainder > 0" x-text="'Dialokasikan ke ' + (policy === 'first' ? 'Termin 1' : 'Termin ' + tenor)"></span>
<span x-show="schedule.remainder === 0">Pembagian merata tanpa sisa</span>
</span>
</div>
</div>
</div>
<!-- Token & Portal Link Preview Box -->
<div class="flex flex-col gap-space-xs p-space-sm rounded-lg bg-surface-card/5">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-text-tertiary uppercase">Generated Public Token</span>
<span class="font-label-sm text-label-sm text-status-success-border font-mono flex items-center gap-space-2xs">
<span class="w-1.5 h-1.5 rounded-full bg-status-success-base"></span> SHA-256 HMAC
            </span>
</div>
<div class="flex items-center justify-between bg-primary-container p-space-xs rounded font-mono text-body-sm text-primary-fixed">
<span class="truncate">tok_98f4a1bc7e23...</span>
<button class="text-text-tertiary hover:text-on-primary p-space-2xs" title="Salin Token" type="button">
<span class="material-symbols-outlined text-[16px]">content_copy</span>
</button>
</div>
<span class="font-body-sm text-body-sm text-text-tertiary truncate">https://bayarkilat.id/invoice/tok_98f4a1bc7e23</span>
</div>
</div>
<!-- Schedule Breakdown Card -->
<div x-show="customerReady" x-cloak class="bg-surface-card rounded-xl p-space-xl shadow-sm">
<div class="flex items-center justify-between pb-space-sm mb-space-md">
<div>
<h3 class="font-headline-sm text-headline-sm text-text-primary">Jadwal Angsuran Dinamis</h3>
<p class="font-body-sm text-body-sm text-text-secondary">Simulasi pembayaran multi-termin pelanggan.</p>
</div>
<span class="px-space-sm py-space-xs rounded-full bg-surface-subtle font-label-sm text-label-sm text-text-primary font-semibold">
<span x-text="tenor"></span> Termin
</span>
</div>
<!-- Timeline Items List (dinamis) -->
<div class="flex flex-col relative before:absolute before:top-4 before:bottom-4 before:left-4 before:w-0.5 before:bg-surface-container">
<template x-for="(row, index) in schedule.rows" :key="row.no">
<div class="flex items-start gap-space-md py-space-sm relative">
<div class="w-8 h-8 rounded-full flex items-center justify-center font-label-md text-label-md font-bold z-10 shrink-0 shadow-sm"
:class="index === 0 ? 'bg-secondary text-on-secondary' : 'bg-surface-container-high text-secondary'">
<span x-text="row.no"></span>
</div>
<div class="flex-1 rounded-xl"
:class="row.remainder > 0 ? 'bg-status-warning-bg/50 p-space-md' : 'bg-surface-subtle p-space-md'">
<div class="flex items-center justify-between mb-space-2xs">
<div class="flex items-center gap-space-xs" x-show="row.remainder > 0">
<span class="font-label-lg text-label-lg text-text-primary" x-text="row.isLast ? 'Cicilan Terakhir (Pelunasan)' : 'Cicilan Pertama (Pelunasan)'"></span>
<span class="px-space-xs rounded bg-status-warning-base text-on-primary font-label-sm text-label-sm">+Rp <span x-text="row.remainder"></span></span>
</div>
<span class="font-label-lg text-label-lg text-text-primary" x-show="row.remainder === 0" x-text="row.label"></span>
<span class="px-space-sm py-space-2xs rounded-full font-label-sm text-label-sm"
:class="index === 0 ? 'bg-status-info-bg text-status-info-base' : 'bg-surface-container text-text-secondary'">
<span x-text="index === 0 ? 'Siap Terbit' : 'Terjadwal'"></span>
</span>
</div>
<div class="flex items-baseline justify-between">
<span class="font-headline-sm text-headline-sm text-text-primary font-bold" x-text="row.amountText"></span>
<span class="font-tabular-numeric text-body-sm text-text-secondary">Jatuh Tempo: <span x-text="dueDates[index]"></span></span>
</div>
</div>
</div>
</template>
</div>
<!-- Total Kumulatif Summary Bar -->
<div class="mt-space-md pt-space-md bg-surface-subtle p-space-md rounded-xl flex items-center justify-between">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase text-text-tertiary">Total Kumulatif <span x-text="tenor"></span> Termin</span>
<span class="font-body-sm text-body-sm text-status-success-base font-semibold" x-show="schedule.delta === 0">Presisi 100% (Selisih Rp 0)</span>
<span class="font-body-sm text-body-sm text-status-danger-base font-semibold" x-show="schedule.delta !== 0">Selisih Rp <span x-text="schedule.delta"></span></span>
</div>
<span class="font-display-currency text-headline-lg text-text-primary" x-text="schedule.totalText"></span>
</div>
<!-- Simulated WhatsApp Alert Template Preview -->
<div class="mt-space-md p-space-md rounded-xl bg-surface-subtle" x-show="waOn" x-cloak>
<div class="flex items-center justify-between mb-space-xs">
<div class="flex items-center gap-space-xs text-text-secondary">
<span class="material-symbols-outlined text-[18px]">chat</span>
<span class="font-label-sm text-label-sm uppercase">Pratinjau Pesan WhatsApp</span>
</div>
<span class="font-body-sm text-body-sm text-text-tertiary">Template: tagihan_tenor_v1</span>
</div>
<p class="font-body-sm text-body-sm text-text-secondary bg-surface-card p-space-sm rounded-lg leading-relaxed shadow-sm">
Halo <span class="font-semibold text-text-primary" x-text="customerName"></span>, tagihan Anda untuk <span class="font-semibold text-text-primary" x-text="description"></span> telah diterbitkan dengan opsi <span x-text="tenor"></span>x cicilan.
Termin 1 (<span class="font-semibold text-text-primary" x-text="schedule.rows[0] ? schedule.rows[0].amountText : ''"></span>) jatuh tempo pada <span class="font-semibold text-text-primary" x-text="dueDates[0]"></span>.
Bayar langsung melalui tautan aman resmi: <span class="text-secondary font-medium underline">bayarkilat.id/invoice/<span x-text="token"></span></span>
</p>
</div>
</div>
</div>
</div>
<!-- Bottom Floating Action Bar -->
<footer class="sticky bottom-0 bg-surface-card/95 backdrop-blur-md p-space-md rounded-xl shadow-xl flex flex-col sm:flex-row items-center justify-between gap-space-md z-30">
<div class="flex items-center gap-space-md w-full sm:w-auto">
<div class="w-10 h-10 rounded-full bg-status-info-bg text-status-info-base flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[20px]">info</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-text-primary">Duitku Signature &amp; Gateway Terhubung</span>
<span class="font-body-sm text-body-sm text-text-secondary">Notifikasi WhatsApp dijadwalkan terkirim otomatis setelah konfirmasi ini.</span>
</div>
</div>
<div class="flex items-center gap-space-sm w-full sm:w-auto justify-end">
<button class="px-space-lg py-space-sm rounded-lg bg-surface-canvas text-text-secondary hover:bg-surface-container-high transition-colors font-label-md text-label-md" type="button">
        Batal
      </button>
<button class="px-space-lg py-space-sm rounded-lg bg-surface-subtle text-text-primary hover:bg-surface-container-high transition-colors font-label-md text-label-md flex items-center gap-space-xs" type="button">
<span class="material-symbols-outlined text-[18px]">bookmark_border</span>
<span>Simpan Sebagai Draft</span>
</button>
<button class="px-space-xl py-space-sm rounded-lg bg-secondary text-on-secondary hover:bg-secondary-container shadow-md transition-all font-label-lg text-label-lg flex items-center gap-space-xs" id="publish-cta" type="button">
<span class="material-symbols-outlined text-[20px]">rocket_launch</span>
<span>Terbitkan Invoice &amp; Jadwalkan Notifikasi WA</span>
</button>
</div>
</footer>
<!-- Toast Notification Overlay (Micro-interaction) -->
<div class="fixed bottom-24 right-8 bg-inverse-surface text-inverse-on-surface px-space-lg py-space-md rounded-xl shadow-xl flex items-center gap-space-md transform translate-y-12 opacity-0 pointer-events-none transition-all duration-300 z-50" id="toast-notif">
<span class="material-symbols-outlined text-status-success-base text-[24px]">check_circle</span>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-primary font-semibold">Berhasil Diterbitkan!</span>
<span class="font-body-sm text-body-sm text-text-tertiary">3 Termin invoice dibuat &amp; WhatsApp otomatis terkirim ke +62 812-3456-7890.</span>
</div>
</div>
</div>
<script>
  (function() {
    const publishBtn = document.getElementById('publish-cta');
    const toast = document.getElementById('toast-notif');

    if (publishBtn && toast) {
      publishBtn.addEventListener('click', () => {
        publishBtn.classList.add('opacity-75', 'cursor-wait');
        const origContent = publishBtn.innerHTML;
        publishBtn.innerHTML = '<span class="material-symbols-outlined animate-spin text-[20px]">autorenew</span><span>Memproses Tagihan...</span>';
        
        setTimeout(() => {
          publishBtn.innerHTML = origContent;
          publishBtn.classList.remove('opacity-75', 'cursor-wait');
          
          toast.classList.remove('translate-y-12', 'opacity-0', 'pointer-events-none');
          toast.classList.add('translate-y-0', 'opacity-100');

          setTimeout(() => {
            toast.classList.add('translate-y-12', 'opacity-0', 'pointer-events-none');
            toast.classList.remove('translate-y-0', 'opacity-100');
          }, 4500);
        }, 900);
      });
    }
  })();
</script>
@endsection
