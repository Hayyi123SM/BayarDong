@extends('layouts.portal')

@section('content')
<!-- Urgent Notification Banner: Jatuh Tempo Hari Ini -->
<div class="bg-gradient-to-r from-amber-500 via-amber-500 to-rose-500 rounded-2xl p-[1px] shadow-sm">
<div class="bg-white rounded-[15px] p-3.5 flex items-center justify-between gap-3">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-amber-50 border border-amber-200 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-amber-600 text-[22px]" style="font-variation-settings: 'FILL' 1;">timer</span>
</div>
<div>
<div class="flex items-center gap-2">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-extrabold bg-rose-50 text-rose-600 border border-rose-200 uppercase tracking-wide animate-pulse">
                  Jatuh Tempo Hari Ini
                </span>
</div>
<p class="text-xs text-slate-600 font-medium mt-0.5">Segera bayar sebelum 23:59 WIB</p>
</div>
</div>
<div class="text-right shrink-0">
<span class="font-mono text-sm font-bold text-amber-600 tracking-wider" id="countdown">14:28:40</span>
<span class="block text-[10px] text-slate-600 font-medium">Sisa Waktu</span>
</div>
</div>
</div>
<!-- Kartu Tagihan Induk & Profil Pelanggan -->
<div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-100 shadow-soft relative overflow-hidden">
<div class="flex items-start justify-between border-b border-slate-100 pb-3 mb-3.5">
<div>
<span class="text-[11px] uppercase tracking-wider font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded">
              Pendidikan
            </span>
<h1 class="text-base font-bold text-slate-900 mt-1.5 leading-snug">
              SPP Semester Ganjil 2026
            </h1>
<p class="text-xs text-slate-500 mt-0.5 flex items-center gap-1">
<span class="material-symbols-outlined text-[15px] text-slate-400">person</span>
              Fahmi Ramadhan <span class="text-slate-300">•</span> Siswa Aktif
            </p>
</div>
<div class="w-9 h-9 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center text-slate-600">
<span class="material-symbols-outlined text-[19px]">school</span>
</div>
</div>
<!-- Total Breakdown Grid -->
<div class="grid grid-cols-2 gap-3 p-3 bg-slate-50 rounded-xl mb-4 border border-slate-100">
<div>
<span class="text-[11px] text-slate-600 font-medium block">Total Biaya SPP</span>
<span class="text-base sm:text-lg font-bold text-slate-900">Rp 1.000.000</span>
</div>
<div class="text-right">
<span class="text-[11px] text-slate-600 font-medium block">Sisa Belum Dibayar</span>
<span class="text-base sm:text-lg font-bold text-rose-600">Rp 666.667</span>
</div>
</div>
<!-- Progress Pelunasan -->
<div class="space-y-1.5">
<div class="flex items-center justify-between text-xs">
<span class="font-semibold text-slate-700 flex items-center gap-1">
<span class="material-symbols-outlined text-[15px] text-emerald-600">donut_large</span>
              Status Pelunasan
            </span>
<span class="font-bold text-blue-600">1 dari 3 Lunas (33%)</span>
</div>
<!-- Segmented Progress Bar -->
<div class="w-full bg-slate-100 h-2.5 rounded-full overflow-hidden flex gap-1 p-0.5">
<div class="bg-emerald-500 h-full rounded-full flex-1" title="Termin 1 (Lunas)"></div>
<div class="bg-amber-400 h-full rounded-full flex-1 animate-pulse" title="Termin 2 (Hari Ini)"></div>
<div class="bg-slate-200 h-full rounded-full flex-1" title="Termin 3 (Mendatang)"></div>
</div>
<div class="flex justify-between items-center text-[11px] text-slate-600 pt-0.5">
<span>Rp 333.333 Terbayar</span>
<span>2 Termin Tersisa</span>
</div>
</div>
</div>
<!-- Header Section: Daftar Cicilan -->
<div class="flex items-center justify-between px-1">
<h2 class="text-sm font-bold text-slate-900 flex items-center gap-1.5">
<span class="material-symbols-outlined text-blue-600 text-[19px]">event_note</span>
          Jadwal &amp; Status Cicilan
        </h2>
<span class="text-[11px] font-semibold text-slate-500 bg-slate-200/60 px-2 py-0.5 rounded-full">
          3 Termin Otomatis
        </span>
</div>
<!-- Card Termin 1: LUNAS -->
<div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-sm transition-all hover:border-emerald-200">
<div class="flex items-start justify-between mb-2.5">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-xl bg-emerald-50 text-emerald-600 border border-emerald-200 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[19px]">check</span>
</div>
<div>
<span class="text-[11px] font-semibold text-slate-600 uppercase">Termin 1</span>
<h3 class="text-sm font-bold text-slate-800">Cicilan Ke-1</h3>
</div>
</div>
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
            LUNAS
          </span>
</div>
<div class="bg-slate-50 rounded-xl p-3 border border-slate-100/80 space-y-1">
<div class="flex justify-between items-center text-xs">
<span class="text-slate-500">Nominal Terbayar</span>
<span class="font-bold text-slate-400 line-through">Rp 333.333</span>
</div>
<div class="flex justify-between items-center text-[11px] text-slate-600 border-t border-slate-200/60 pt-1.5 mt-1.5">
<span>Jatuh Tempo: 10 Jan 2026</span>
<span class="text-emerald-700 font-medium flex items-center gap-0.5">
<span class="material-symbols-outlined text-[13px]">verified</span>
              09 Jan 2026 via BCA VA
            </span>
</div>
</div>
</div>
<!-- Card Termin 2: AKTIF & SIAP BAYAR (JATUH TEMPO HARI INI) -->
<div class="bg-blue-50/40 rounded-2xl p-4 border-2 border-blue-500 shadow-card relative transition-all">
<!-- Floating tag badge -->
<div class="flex items-start justify-between mb-2.5">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-xl bg-blue-600 text-white flex items-center justify-center shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[18px]">credit_score</span>
</div>
<div>
<span class="text-[11px] font-bold text-blue-700 uppercase tracking-wide">Termin 2 (Siap Bayar)</span>
<h3 class="text-sm font-bold text-slate-900">Cicilan Ke-2</h3>
</div>
</div>
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10.5px] font-black bg-amber-100 text-amber-800 border border-amber-300 animate-pulse">
<span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
            JATUH TEMPO HARI INI
          </span>
</div>
<div class="bg-white rounded-xl p-3.5 border border-blue-100 shadow-sm space-y-2 mb-3">
<div class="flex justify-between items-baseline">
<span class="text-xs text-slate-600 font-medium">Tagihan Harus Dibayar</span>
<span class="text-lg font-extrabold text-blue-600">Rp 333.333</span>
</div>
<div class="flex justify-between items-center text-[11px] text-slate-600 border-t border-slate-100 pt-2">
<span class="font-medium text-amber-700 flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">calendar_clock</span>
              Hari Ini, 10 Feb 2026
            </span>
<span class="bg-emerald-50 text-emerald-700 px-1.5 py-0.5 rounded font-medium text-[10px]">
              Bebas Denda Keterlambatan
            </span>
</div>
</div>
<!-- Radio Option Pill -->
<label class="flex items-center justify-between p-2.5 rounded-xl bg-white border border-blue-200 cursor-pointer select-none hover:bg-blue-50/50 transition-colors">
<div class="flex items-center gap-2.5">
<input checked="" class="w-4 h-4 text-blue-600 border-slate-300 focus:ring-blue-500" id="radio_term_2" name="pay_option" type="radio"/>
<span class="text-xs font-bold text-slate-800">Bayar termin ke-2 ini sekarang</span>
</div>
<span class="material-symbols-outlined text-blue-600 text-[20px]">check_circle</span>
</label>
</div>
<!-- Card Termin 3: BELUM JATUH TEMPO (+Rp 1 Pembulatan) -->
<div class="bg-white rounded-2xl p-4 border border-slate-200/70 shadow-sm opacity-90 transition-all">
<div class="flex items-start justify-between mb-2.5">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-xl bg-slate-100 text-slate-500 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[18px]">lock</span>
</div>
<div>
<span class="text-[11px] font-semibold text-slate-600 uppercase">Termin 3 (Terakhir)</span>
<h3 class="text-sm font-bold text-slate-700">Cicilan Ke-3</h3>
</div>
</div>
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-slate-100 text-slate-600 border border-slate-200">
            Belum Jatuh Tempo
          </span>
</div>
<div class="bg-slate-50 rounded-xl p-3 border border-slate-100 space-y-1.5">
<div class="flex justify-between items-baseline">
<div class="flex items-center gap-1.5">
<span class="text-xs text-slate-500">Nominal Termin</span>
<span class="text-[10px] font-semibold text-blue-700 bg-blue-50 border border-blue-200 px-1.5 py-0.5 rounded">
                +Rp 1 alokasi pembulatan
              </span>
</div>
<span class="text-sm font-bold text-slate-800">Rp 333.334</span>
</div>
<div class="flex justify-between items-center text-[11px] text-slate-600 border-t border-slate-200/60 pt-1.5">
<span>Jatuh Tempo: 10 Mar 2026</span>
<span class="text-slate-600 italic">Otomatis terbuka setelah termin 2</span>
</div>
</div>
</div>
<!-- Pelunasan Cepat Banner -->
<div class="bg-gradient-to-r from-blue-900 to-indigo-900 rounded-2xl p-4 text-white shadow-soft relative overflow-hidden">
<div class="absolute -right-6 -bottom-6 w-28 h-28 bg-blue-500/20 rounded-full blur-xl pointer-events-none"></div>
<div class="flex items-center justify-between gap-3 relative z-10">
<div class="space-y-1">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-amber-300 text-[18px]">bolt</span>
<span class="text-xs font-extrabold uppercase tracking-wide text-amber-300">Opsi Pelunasan Cepat</span>
</div>
<h4 class="text-sm font-bold leading-tight">Bayar Semua Sisa Cicilan</h4>
<p class="text-xs text-slate-300">Termin 2 &amp; Termin 3 Sekaligus</p>
</div>
<div class="text-right shrink-0">
<div class="text-base font-extrabold text-white">Rp 666.667</div>
<span class="inline-block mt-1 text-[10px] font-bold bg-emerald-500 text-white px-2 py-0.5 rounded-full shadow-sm">
              Bebas Biaya Layanan
            </span>
</div>
</div>
</div>
<script>(function() {
      // Countdown Timer
      let totalSec = (14 * 3600) + (28 * 60) + 40;
      const el = document.getElementById('countdown');
      if (el) {
        setInterval(() => {
          if (totalSec <= 0) return;
          totalSec--;
          const h = String(Math.floor(totalSec / 3600)).padStart(2, '0');
          const m = String(Math.floor((totalSec % 3600) / 60)).padStart(2, '0');
          const s = String(totalSec % 60).padStart(2, '0');
          el.textContent = `${h}:${m}:${s}`;
        }, 1000);
      }

    })();</script>
@endsection

@section('bottom-bar')
<div class="fixed bottom-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-lg border-t border-slate-200/80 shadow-[0_-8px_25px_rgba(0,0,0,0.06)]">
    <div class="space-y-2">
        <a href="{{ route('portal.methods', $token) }}"
           class="w-full bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white font-bold py-3.5 px-4 rounded-xl shadow-glow flex items-center justify-between transition-all duration-150 transform active:scale-[0.99]">
            <div class="flex flex-col text-left">
                <span class="text-[11px] font-medium text-blue-100 uppercase tracking-wider">Total Pembayaran</span>
                <span class="text-base font-extrabold leading-tight">Rp 333.333</span>
            </div>
            <div class="flex items-center gap-1 text-sm font-bold bg-blue-500/50 hover:bg-blue-500 px-3 py-1.5 rounded-lg border border-blue-400/40">
                <span>Lanjut Bayar Termin 2</span>
                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
            </div>
        </a>
        <div class="flex items-center justify-center gap-2 text-[11px] text-slate-600 font-medium">
            <span class="material-symbols-outlined text-emerald-600 text-[14px]">verified</span>
            <span>Verifikasi Otomatis Duitku PG &amp; Bank Indonesia</span>
        </div>
    </div>
</div>
@endsection

