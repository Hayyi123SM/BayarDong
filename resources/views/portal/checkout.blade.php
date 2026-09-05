@extends('layouts.portal-desktop')

@section('content')
<!-- Top Breadcrumb & Status Bar -->
<div class="flex flex-wrap items-center justify-between gap-3 mb-6">
<div class="flex items-center gap-2 text-xs sm:text-sm">
<span class="text-slate-400 font-medium">Invoice ID:</span>
<span class="font-mono font-bold text-slate-800 bg-white px-2.5 py-1 rounded-lg border border-slate-200 shadow-xs">
          INV/2026/09/0001
        </span>
<span class="inline-flex items-center gap-1 text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full text-xs font-medium border border-emerald-200">
<span class="material-symbols-outlined text-[14px]">verified</span>
          Token WhatsApp Terverifikasi
        </span>
</div>
<div class="inline-flex items-center gap-2 bg-amber-50 text-amber-900 border border-amber-200 px-3 py-1 rounded-full text-xs font-semibold">
<span class="relative flex h-2 w-2">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
<span class="relative inline-flex rounded-full h-2 w-2 bg-amber-500"></span>
</span>
        Menunggu Pembayaran Termin 2
      </div>
</div>
<!-- TWO COLUMN GRID -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
<!-- LEFT COLUMN (col-span-8): Primary Details, Schedule, Channels -->
<div class="lg:col-span-8 flex flex-col gap-6">
<!-- 1. Header Banner & Student Metadata Card -->
<div class="bg-white rounded-2xl border border-slate-200 p-6 md:p-7 shadow-xs">
<div class="flex flex-col md:flex-row md:items-start justify-between gap-6 pb-6 border-b border-slate-100">
<div>
<div class="flex items-center gap-2 text-xs font-semibold text-blue-600 uppercase tracking-wider mb-1.5">
<span class="material-symbols-outlined text-[16px]">school</span>
                Lembaga Pendidikan • Ta. 2025/2026
              </div>
<h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                SPP Semester Ganjil 2026
              </h1>
<p class="text-sm text-slate-500 mt-1">
                Program Reguler Sarjana — Fakultas Ilmu Komputer
              </p>
</div>
<!-- Student Badge Box -->
<div class="bg-slate-50 border border-slate-200/80 rounded-xl p-3.5 flex items-center gap-3.5 shrink-0 self-start">
<div class="w-10 h-10 rounded-lg bg-blue-600 text-white flex items-center justify-center font-bold text-sm shadow-xs">
                FR
              </div>
<div>
<span class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider block">Mahasiswa</span>
<div class="font-bold text-slate-900 text-sm">Fahmi Ramadhan</div>
<div class="text-xs text-slate-500 font-mono">0812-3456-7890</div>
</div>
</div>
</div>
<!-- Due Date & Timer Alert Row -->
<div class="mt-5 rounded-xl bg-gradient-to-r from-amber-50 to-orange-50 border border-amber-200/80 p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-amber-500 text-white flex items-center justify-center shadow-xs shrink-0">
<span class="material-symbols-outlined text-[22px]">timer</span>
</div>
<div>
<span class="text-xs font-bold uppercase tracking-wider text-amber-800 block">Jatuh Tempo Hari Ini</span>
<span class="text-sm font-semibold text-slate-900">Batas Waktu: Selasa, 10 Februari 2026 (23:59 WIB)</span>
</div>
</div>
<div class="flex items-center gap-2 bg-white px-3.5 py-2 rounded-xl border border-amber-200/60 shadow-xs self-start sm:self-center">
<span class="text-xs font-medium text-slate-500">Sisa Waktu:</span>
<div class="flex items-center gap-1 font-mono font-bold text-red-600 text-sm" id="countdown-timer">
<span class="bg-red-50 text-red-700 px-2 py-0.5 rounded border border-red-100">05</span>:
                <span class="bg-red-50 text-red-700 px-2 py-0.5 rounded border border-red-100">42</span>:
                <span class="bg-red-50 text-red-700 px-2 py-0.5 rounded border border-red-100">19</span>
</div>
</div>
</div>
</div>
<!-- 2. Overall Installment Progress Card -->
<div class="bg-white rounded-2xl border border-slate-200 p-6 md:p-7 shadow-xs">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-5">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">donut_large</span>
</div>
<h2 class="text-lg font-bold text-slate-900">Progres Pelunasan Tagihan</h2>
</div>
<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100">
              1 dari 3 Termin Terbayar (33%)
            </span>
</div>
<!-- Progress Metrics -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-3.5 mb-5">
<div class="p-4 rounded-xl bg-slate-50 border border-slate-100 flex flex-col">
<span class="text-xs font-medium text-slate-500 mb-1">Total Nilai Tagihan</span>
<span class="text-xl font-extrabold text-slate-900 font-mono">Rp 1.000.000</span>
<span class="text-xs text-slate-400 mt-1">3 Termin Pembayaran</span>
</div>
<div class="p-4 rounded-xl bg-emerald-50/70 border border-emerald-100 flex flex-col">
<span class="text-xs font-semibold text-emerald-800 mb-1">Telah Terbayar</span>
<span class="text-xl font-extrabold text-emerald-700 font-mono">Rp 333.333</span>
<span class="text-xs text-emerald-600 mt-1 flex items-center gap-1 font-medium">
<span class="material-symbols-outlined text-[14px]">done_all</span> Termin 1 Lunas
              </span>
</div>
<div class="p-4 rounded-xl bg-blue-50/60 border border-blue-100 flex flex-col">
<span class="text-xs font-semibold text-blue-800 mb-1">Sisa Piutang Berjalan</span>
<span class="text-xl font-extrabold text-blue-600 font-mono">Rp 666.667</span>
<span class="text-xs text-blue-600/80 mt-1 font-medium">2 Termin Tersisa (Termin 2 &amp; 3)</span>
</div>
</div>
<!-- Segmented Progress Bar -->
<div class="space-y-2">
<div class="w-full bg-slate-100 rounded-full h-3 flex overflow-hidden p-0.5 border border-slate-200/50">
<div class="bg-emerald-500 h-full rounded-l-full" style="width: 33.33%"></div>
<div class="bg-blue-600 h-full" style="width: 33.33%"></div>
<div class="bg-transparent h-full" style="width: 33.34%"></div>
</div>
<div class="flex justify-between items-center text-xs text-slate-500 pt-1 font-medium">
<span class="flex items-center gap-1.5 text-emerald-700 font-semibold">
<span class="w-2 h-2 rounded-full bg-emerald-500"></span> Termin 1 (Lunas)
              </span>
<span class="flex items-center gap-1.5 text-blue-600 font-semibold">
<span class="w-2 h-2 rounded-full bg-blue-600"></span> Termin 2 (Hari Ini)
              </span>
<span class="flex items-center gap-1.5 text-slate-400">
<span class="w-2 h-2 rounded-full bg-slate-300"></span> Termin 3 (10 Mar 2026)
              </span>
</div>
</div>
</div>
<!-- 3. Interactive Schedule Cards (3 Termin) -->
<div class="bg-white rounded-2xl border border-slate-200 p-6 md:p-7 shadow-xs">
<div class="flex items-center justify-between mb-5">
<div>
<h2 class="text-lg font-bold text-slate-900">Jadwal &amp; Skema Cicilan</h2>
<p class="text-xs sm:text-sm text-slate-500">Pilih tagihan termin aktif untuk diselesaikan</p>
</div>
<span class="material-symbols-outlined text-slate-400">event_note</span>
</div>
<div class="flex flex-col gap-3.5">
<!-- Termin 1: Lunas -->
<div class="p-4 sm:p-5 rounded-xl border border-slate-200 bg-slate-50/80 flex flex-col sm:flex-row sm:items-center justify-between gap-4 transition-all">
<div class="flex items-center gap-3.5">
<div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[20px] font-bold">check</span>
</div>
<div>
<div class="flex items-center gap-2">
<span class="font-bold text-slate-900">Termin 1</span>
<span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-emerald-100 text-emerald-800">
                      Lunas
                    </span>
</div>
<p class="text-xs text-slate-500 mt-0.5">
                    Diverifikasi Duitku • 09 Jan 2026, 14:20 WIB via BCA VA
                  </p>
</div>
</div>
<div class="flex items-center justify-between sm:justify-end gap-5 pt-2 sm:pt-0 border-t sm:border-0 border-slate-200/60">
<div class="sm:text-right">
<span class="text-[11px] font-medium text-slate-400 block">Nominal</span>
<span class="text-sm font-bold text-slate-800 font-mono">Rp 333.333</span>
</div>
<button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-white hover:bg-slate-100 text-blue-600 border border-slate-200 shadow-xs transition-colors" type="button">
<span class="material-symbols-outlined text-[15px]">receipt</span>
                  Lihat Kuitansi
                </button>
</div>
</div>
<!-- Termin 2: Aktif & Jatuh Tempo Hari Ini (Selected) -->
<div class="p-4 sm:p-5 rounded-xl border-2 border-blue-600 bg-blue-50/40 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4 transition-all" id="termin2-card">
<div class="flex items-center gap-3.5">
<div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[20px]">priority_high</span>
</div>
<div>
<div class="flex items-center gap-2">
<span class="font-bold text-slate-900 text-base">Termin 2</span>
<span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-amber-100 text-amber-900">
                      Jatuh Tempo Hari Ini
                    </span>
</div>
<p class="text-xs text-slate-600 mt-0.5">
                    Batas Akhir: 10 Feb 2026 • 23:59 WIB
                  </p>
</div>
</div>
<div class="flex items-center justify-between sm:justify-end gap-5 pt-2 sm:pt-0 border-t sm:border-0 border-blue-100">
<div class="sm:text-right">
<span class="text-[11px] font-bold text-blue-700 block uppercase tracking-wider">Wajib Diselesaikan</span>
<span class="text-lg font-extrabold text-blue-700 font-mono">Rp 333.333</span>
</div>
<div class="w-6 h-6 rounded-full bg-blue-600 text-white flex items-center justify-center shadow-xs">
<span class="material-symbols-outlined text-[16px] font-bold">check</span>
</div>
</div>
</div>
<!-- Termin 3: Belum Jatuh Tempo -->
<div class="p-4 sm:p-5 rounded-xl border border-slate-200 bg-slate-50/50 flex flex-col sm:flex-row sm:items-center justify-between gap-4 opacity-75">
<div class="flex items-center gap-3.5">
<div class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[20px]">lock_clock</span>
</div>
<div>
<div class="flex items-center gap-2">
<span class="font-bold text-slate-700">Termin 3</span>
<span class="px-2 py-0.5 rounded-full text-[11px] font-medium bg-slate-200 text-slate-700">
                      Belum Jatuh Tempo
                    </span>
</div>
<p class="text-xs text-slate-500 mt-0.5">
                    Jatuh Tempo: 10 Mar 2026 • (+Rp 1 pembulatan sistem akhir)
                  </p>
</div>
</div>
<div class="flex items-center justify-between sm:justify-end gap-5 pt-2 sm:pt-0 border-t sm:border-0 border-slate-200/60">
<div class="sm:text-right">
<span class="text-[11px] font-medium text-slate-400 block">Nominal</span>
<span class="text-sm font-semibold text-slate-600 font-mono">Rp 333.334</span>
</div>
<span class="material-symbols-outlined text-slate-400 text-[20px]">lock</span>
</div>
</div>
</div>
<!-- Early Settlement Banner (Opsi Pelunasan Cepat) -->
<div class="mt-5 rounded-2xl bg-gradient-to-r from-blue-900 to-indigo-900 text-white p-5 sm:p-6 shadow-md flex flex-col sm:flex-row sm:items-center justify-between gap-5">
<div class="flex items-start gap-4">
<div class="w-11 h-11 rounded-xl bg-blue-500/30 border border-blue-400/40 text-blue-300 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[24px]">bolt</span>
</div>
<div>
<div class="flex flex-wrap items-center gap-2">
<h3 class="font-bold text-base text-white">Bayar Semua Sisa Cicilan Sekaligus</h3>
<span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-emerald-500 text-white">
                    Bebas Biaya Admin
                  </span>
</div>
<p class="text-xs sm:text-sm text-blue-100/90 mt-1 max-w-xl">
                  Langsung lunasi Termin 2 &amp; 3 (Total <strong class="text-white font-mono">Rp 666.667</strong>). Tagihan beres lebih cepat dan bebas biaya transaksi gateway Duitku.
                </p>
</div>
</div>
<!-- Toggle Switch -->
<label class="relative inline-flex items-center cursor-pointer shrink-0 self-end sm:self-center">
<input class="sr-only peer" id="pay-all-toggle" type="checkbox"/>
<div class="w-14 h-8 bg-blue-950/80 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:start-[4px] after:bg-white after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-blue-500 border border-blue-700"></div>
</label>
</div>
</div>
<!-- 4. Payment Channel Selector (Duitku Payment Gateway) -->
<div class="bg-white rounded-2xl border border-slate-200 p-6 md:p-7 shadow-xs">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-6">
<div>
<div class="flex items-center gap-2">
<h2 class="text-lg font-bold text-slate-900">Pilih Kanal Pembayaran Duitku PG</h2>
<span class="material-symbols-outlined text-blue-600 text-[18px]">verified</span>
</div>
<p class="text-xs sm:text-sm text-slate-500">Metode resmi terlisensi Bank Indonesia dengan verifikasi real-time 24 jam</p>
</div>
<div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200 text-xs font-semibold self-start sm:self-center">
<span class="w-2 h-2 rounded-full bg-emerald-500"></span>
              Otomatis 24 Jam
            </div>
</div>
<!-- Channel Tabs -->
<div class="flex items-center gap-1.5 p-1 bg-slate-100 rounded-xl mb-5 overflow-x-auto">
<button class="tab-btn flex-1 min-w-[130px] py-2 px-3 rounded-lg text-xs font-bold transition-all flex items-center justify-center gap-1.5 bg-white text-blue-600 shadow-xs" data-target="panel-va" type="button">
<span class="material-symbols-outlined text-[18px]">account_balance</span>
              Virtual Account
            </button>
<button class="tab-btn flex-1 min-w-[120px] py-2 px-3 rounded-lg text-xs font-semibold text-slate-600 hover:text-slate-900 transition-all flex items-center justify-center gap-1.5" data-target="panel-qris" type="button">
<span class="material-symbols-outlined text-[18px]">qr_code_2</span>
              QRIS Instan
            </button>
<button class="tab-btn flex-1 min-w-[120px] py-2 px-3 rounded-lg text-xs font-semibold text-slate-600 hover:text-slate-900 transition-all flex items-center justify-center gap-1.5" data-target="panel-cc" type="button">
<span class="material-symbols-outlined text-[18px]">credit_card</span>
              Kartu Kredit
            </button>
<button class="tab-btn flex-1 min-w-[120px] py-2 px-3 rounded-lg text-xs font-semibold text-slate-600 hover:text-slate-900 transition-all flex items-center justify-center gap-1.5" data-target="panel-retail" type="button">
<span class="material-symbols-outlined text-[18px]">storefront</span>
              Gerai Retail
            </button>
</div>
<!-- Panel: Virtual Account (Default) -->
<div class="channel-panel grid grid-cols-1 sm:grid-cols-2 gap-3.5" id="panel-va">
<!-- BCA VA (Selected) -->
<label class="channel-card relative flex items-center justify-between p-4 rounded-xl border-2 border-blue-600 bg-blue-50/40 cursor-pointer transition-all hover:shadow-sm" data-channel="BCA Virtual Account" data-fee="2500">
<input checked="" class="sr-only" name="payment_method" type="radio" value="BCA"/>
<div class="flex items-center gap-3.5">
<div class="w-12 h-9 rounded-lg bg-blue-900 text-white font-extrabold text-xs flex items-center justify-center tracking-wider shadow-xs">
                  BCA
                </div>
<div>
<div class="font-bold text-slate-900 text-sm">BCA Virtual Account</div>
<div class="text-xs text-slate-500">Biaya admin Rp 2.500</div>
</div>
</div>
<div class="indicator w-5 h-5 rounded-full bg-blue-600 text-white flex items-center justify-center shadow-xs">
<span class="material-symbols-outlined text-[14px] font-bold">check</span>
</div>
</label>
<!-- Mandiri VA -->
<label class="channel-card relative flex items-center justify-between p-4 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 cursor-pointer transition-all hover:shadow-sm" data-channel="Mandiri Virtual Account" data-fee="2500">
<input class="sr-only" name="payment_method" type="radio" value="MANDIRI"/>
<div class="flex items-center gap-3.5">
<div class="w-12 h-9 rounded-lg bg-amber-500 text-blue-950 font-extrabold text-xs flex items-center justify-center tracking-wider shadow-xs">
                  MDR
                </div>
<div>
<div class="font-bold text-slate-900 text-sm">Mandiri VA</div>
<div class="text-xs text-slate-500">Livin' &amp; ATM Mandiri</div>
</div>
</div>
<div class="indicator w-5 h-5 rounded-full border-2 border-slate-300 text-transparent flex items-center justify-center">
<span class="material-symbols-outlined text-[14px] font-bold">check</span>
</div>
</label>
<!-- BNI VA -->
<label class="channel-card relative flex items-center justify-between p-4 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 cursor-pointer transition-all hover:shadow-sm" data-channel="BNI Virtual Account" data-fee="2500">
<input class="sr-only" name="payment_method" type="radio" value="BNI"/>
<div class="flex items-center gap-3.5">
<div class="w-12 h-9 rounded-lg bg-teal-600 text-white font-extrabold text-xs flex items-center justify-center tracking-wider shadow-xs">
                  BNI
                </div>
<div>
<div class="font-bold text-slate-900 text-sm">BNI Virtual Account</div>
<div class="text-xs text-slate-500">Wondr &amp; BNI Mobile</div>
</div>
</div>
<div class="indicator w-5 h-5 rounded-full border-2 border-slate-300 text-transparent flex items-center justify-center">
<span class="material-symbols-outlined text-[14px] font-bold">check</span>
</div>
</label>
<!-- BRI VA -->
<label class="channel-card relative flex items-center justify-between p-4 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 cursor-pointer transition-all hover:shadow-sm" data-channel="BRIVA (BRI VA)" data-fee="2500">
<input class="sr-only" name="payment_method" type="radio" value="BRI"/>
<div class="flex items-center gap-3.5">
<div class="w-12 h-9 rounded-lg bg-blue-600 text-white font-extrabold text-xs flex items-center justify-center tracking-wider shadow-xs">
                  BRI
                </div>
<div>
<div class="font-bold text-slate-900 text-sm">BRIVA (BRI VA)</div>
<div class="text-xs text-slate-500">BRImo &amp; AgenBRILink</div>
</div>
</div>
<div class="indicator w-5 h-5 rounded-full border-2 border-slate-300 text-transparent flex items-center justify-center">
<span class="material-symbols-outlined text-[14px] font-bold">check</span>
</div>
</label>
<!-- Permata VA -->
<label class="channel-card relative flex items-center justify-between p-4 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 cursor-pointer transition-all hover:shadow-sm" data-channel="Permata Virtual Account" data-fee="2500">
<input class="sr-only" name="payment_method" type="radio" value="PERMATA"/>
<div class="flex items-center gap-3.5">
<div class="w-12 h-9 rounded-lg bg-emerald-600 text-white font-extrabold text-xs flex items-center justify-center tracking-wider shadow-xs">
                  PMT
                </div>
<div>
<div class="font-bold text-slate-900 text-sm">Permata VA</div>
<div class="text-xs text-slate-500">PermataME &amp; Jaringan ATM</div>
</div>
</div>
<div class="indicator w-5 h-5 rounded-full border-2 border-slate-300 text-transparent flex items-center justify-center">
<span class="material-symbols-outlined text-[14px] font-bold">check</span>
</div>
</label>
<!-- Instant Verification badge card -->
<div class="p-4 rounded-xl border border-dashed border-slate-200 bg-slate-50/70 flex items-center gap-3">
<span class="material-symbols-outlined text-blue-600 text-[26px]">flash_on</span>
<div>
<div class="font-bold text-slate-900 text-xs sm:text-sm">Bebas Upload Struk Manual</div>
<div class="text-xs text-slate-500">Sistem otomatis mengenali pelunasan dalam hitungan detik.</div>
</div>
</div>
</div>
<!-- Panel: QRIS Instan -->
<div class="channel-panel hidden grid-cols-1 sm:grid-cols-2 gap-3.5" id="panel-qris">
<label class="channel-card relative flex items-center justify-between p-4 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 cursor-pointer transition-all" data-channel="QRIS Instan" data-fee="1500">
<input class="sr-only" name="payment_method" type="radio" value="QRIS"/>
<div class="flex items-center gap-3.5">
<div class="w-12 h-9 rounded-lg bg-slate-900 text-white flex items-center justify-center shadow-xs">
<span class="material-symbols-outlined text-[20px]">qr_code_2</span>
</div>
<div>
<div class="font-bold text-slate-900 text-sm">QRIS Nasional</div>
<div class="text-xs text-slate-500">GoPay, OVO, Dana, ShopeePay, BCA</div>
</div>
</div>
<div class="indicator w-5 h-5 rounded-full border-2 border-slate-300 text-transparent flex items-center justify-center">
<span class="material-symbols-outlined text-[14px] font-bold">check</span>
</div>
</label>
</div>
<!-- Panel: Kartu Kredit -->
<div class="channel-panel hidden grid-cols-1 gap-3.5" id="panel-cc">
<label class="channel-card relative flex items-center justify-between p-4 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 cursor-pointer transition-all" data-channel="Kartu Kredit 3D Secure" data-fee="5500">
<input class="sr-only" name="payment_method" type="radio" value="CC"/>
<div class="flex items-center gap-3.5">
<div class="w-12 h-9 rounded-lg bg-indigo-600 text-white flex items-center justify-center shadow-xs">
<span class="material-symbols-outlined text-[20px]">credit_card</span>
</div>
<div>
<div class="font-bold text-slate-900 text-sm">Visa / MasterCard / JCB</div>
<div class="text-xs text-slate-500">Dilindungi Otentikasi OTP 3D Secure</div>
</div>
</div>
<div class="indicator w-5 h-5 rounded-full border-2 border-slate-300 text-transparent flex items-center justify-center">
<span class="material-symbols-outlined text-[14px] font-bold">check</span>
</div>
</label>
</div>
<!-- Panel: Gerai Retail -->
<div class="channel-panel hidden grid-cols-1 sm:grid-cols-2 gap-3.5" id="panel-retail">
<label class="channel-card relative flex items-center justify-between p-4 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 cursor-pointer transition-all" data-channel="Gerai Indomaret" data-fee="4000">
<input class="sr-only" name="payment_method" type="radio" value="INDOMARET"/>
<div class="flex items-center gap-3.5">
<div class="w-12 h-9 rounded-lg bg-blue-700 text-white font-extrabold text-xs flex items-center justify-center shadow-xs">
                  IDM
                </div>
<div>
<div class="font-bold text-slate-900 text-sm">Indomaret / Ceriamart</div>
<div class="text-xs text-slate-500">Bayar di kasir dengan kode bayar</div>
</div>
</div>
<div class="indicator w-5 h-5 rounded-full border-2 border-slate-300 text-transparent flex items-center justify-center">
<span class="material-symbols-outlined text-[14px] font-bold">check</span>
</div>
</label>
<label class="channel-card relative flex items-center justify-between p-4 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 cursor-pointer transition-all" data-channel="Gerai Alfamart" data-fee="4000">
<input class="sr-only" name="payment_method" type="radio" value="ALFAMART"/>
<div class="flex items-center gap-3.5">
<div class="w-12 h-9 rounded-lg bg-red-600 text-white font-extrabold text-xs flex items-center justify-center shadow-xs">
                  ALFA
                </div>
<div>
<div class="font-bold text-slate-900 text-sm">Alfamart / Dan+Dan</div>
<div class="text-xs text-slate-500">Bayar di kasir dengan kode bayar</div>
</div>
</div>
<div class="indicator w-5 h-5 rounded-full border-2 border-slate-300 text-transparent flex items-center justify-center">
<span class="material-symbols-outlined text-[14px] font-bold">check</span>
</div>
</label>
</div>
</div>
</div>
<!-- RIGHT COLUMN (col-span-4, sticky top-24): Payment Summary -->
<div class="lg:col-span-4 sticky top-24 flex flex-col gap-5">
<!-- SUMMARY CARD -->
<div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm flex flex-col">
<div class="flex items-center justify-between pb-4 border-b border-slate-100">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-blue-600 text-[22px]">receipt_long</span>
<h3 class="text-lg font-bold text-slate-900">Ringkasan Pembayaran</h3>
</div>
<span class="inline-flex items-center gap-1 text-[11px] font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded-full border border-blue-100">
<span class="material-symbols-outlined text-[13px]">shield</span> Duitku
            </span>
</div>
<!-- Target Item Breakdown -->
<div class="py-4 border-b border-slate-100">
<div class="bg-slate-50 rounded-xl p-3.5 border border-slate-100">
<div class="flex items-center justify-between">
<span class="font-bold text-slate-900 text-sm" id="summary-term-title">Cicilan SPP Termin 2</span>
<span class="text-xs font-semibold px-2 py-0.5 rounded bg-blue-100 text-blue-800" id="summary-term-badge">Termin 2</span>
</div>
<div class="text-xs text-slate-500 mt-1 flex items-center justify-between">
<span>Fahmi Ramadhan</span>
<span>Semester Ganjil 2026</span>
</div>
</div>
</div>
<!-- Price Calculation Rows -->
<div class="py-4 space-y-3 border-b border-slate-100 text-sm">
<div class="flex justify-between items-center text-slate-600">
<span id="summary-subtotal-label">Subtotal Tagihan</span>
<span class="font-mono font-semibold text-slate-900" id="summary-subtotal">Rp 333.333</span>
</div>
<div class="flex justify-between items-center text-slate-600">
<div class="flex items-center gap-1">
<span>Biaya Layanan Duitku PG</span>
<span class="material-symbols-outlined text-[15px] text-slate-400 cursor-help" title="Biaya gateway resmi perbankan">help</span>
</div>
<span class="font-mono font-semibold text-slate-900" id="summary-admin-fee">Rp 2.500</span>
</div>
<div class="flex justify-between items-center text-slate-600">
<span>Metode Terpilih</span>
<span class="font-semibold text-blue-600" id="summary-channel-name">BCA Virtual Account</span>
</div>
</div>
<!-- TOTAL AMOUNT BOX -->
<div class="py-4">
<div class="flex items-baseline justify-between">
<div>
<span class="text-xs font-bold uppercase tracking-wider text-slate-400 block">Total Pembayaran</span>
<span class="text-xs text-slate-500">Termasuk pajak &amp; administrasi</span>
</div>
<div class="text-right">
<span class="text-2xl sm:text-3xl font-extrabold text-blue-600 font-mono tracking-tight" id="summary-total">
                  Rp 335.833
                </span>
</div>
</div>
</div>
<!-- CTA BUTTON -->
<a class="w-full py-4 px-5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-base shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 transition-all flex items-center justify-center gap-2 group cursor-pointer active:scale-[0.99]" id="pay-submit-btn" href="{{ route('portal.receipt', $token) }}">
<span id="btn-text">Lanjut ke Pembayaran VA (Rp 335.833)</span>
<span class="material-symbols-outlined text-[20px] transition-transform group-hover:translate-x-1">arrow_forward</span>
</a>
<!-- WhatsApp Direct Receipt Banner -->
<div class="mt-4 p-3 rounded-xl bg-emerald-50 border border-emerald-100 text-xs text-slate-600 flex items-start gap-2.5">
<span class="material-symbols-outlined text-emerald-600 text-[18px] shrink-0 mt-0.5">mark_chat_read</span>
<p class="leading-relaxed">
<strong class="text-slate-800">Notifikasi Kuitansi WhatsApp:</strong> Bukti lunas resmi akan otomatis terkirim ke WhatsApp <span class="font-semibold text-slate-900 font-mono">0812-3456-7890</span> begitu dana diterima.
            </p>
</div>
<!-- Security Trust Badges -->
<div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-400 font-medium">
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[14px] text-emerald-600">lock</span> Enkripsi 256-Bit
            </span>
<span>•</span>
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[14px] text-blue-600">verified</span> Duitku Verified
            </span>
<span>•</span>
<span>Bank Indonesia</span>
</div>
</div>
<!-- QUICK HELP BOX -->
<div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-xs flex flex-col gap-2">
<div class="flex items-center gap-2 text-slate-900 font-bold text-sm">
<span class="material-symbols-outlined text-blue-600 text-[20px]">support_agent</span>
<span>Kendala atau Pertanyaan Tagihan?</span>
</div>
<p class="text-xs text-slate-500 leading-relaxed">
            Jika ada perbedaan nominal tagihan atau pertanyaan beasiswa, silakan hubungi Bendahara Keuangan Kampus.
          </p>
<a class="inline-flex items-center gap-1 text-xs font-bold text-blue-600 hover:text-blue-700 hover:underline mt-1" href="https://wa.me/support" rel="noopener noreferrer" target="_blank">
<span>Buka Tiket Bantuan Keuangan</span>
<span class="material-symbols-outlined text-[14px]">open_in_new</span>
</a>
</div>
</div>
</div>
<script>(function () {
      let isPayAll = false;
      let currentSubtotal = 333333;
      let currentAdminFee = 2500;
      let currentChannelName = 'BCA Virtual Account';

      const payAllToggle = document.getElementById('pay-all-toggle');
      const summarySubtotal = document.getElementById('summary-subtotal');
      const summarySubtotalLabel = document.getElementById('summary-subtotal-label');
      const summaryAdminFee = document.getElementById('summary-admin-fee');
      const summaryChannelName = document.getElementById('summary-channel-name');
      const summaryTotal = document.getElementById('summary-total');
      const summaryTermTitle = document.getElementById('summary-term-title');
      const summaryTermBadge = document.getElementById('summary-term-badge');
      const btnText = document.getElementById('btn-text');
      const paySubmitBtn = document.getElementById('pay-submit-btn');

      const tabBtns = document.querySelectorAll('.tab-btn');
      const channelPanels = document.querySelectorAll('.channel-panel');
      const channelCards = document.querySelectorAll('.channel-card');
      const toastNotification = document.getElementById('toast-notification');
      const toastMessage = document.getElementById('toast-message');

      function showToast(msg) {
        if (!toastNotification || !toastMessage) return;
        toastMessage.textContent = msg;
        toastNotification.classList.remove('translate-y-24', 'opacity-0');
        setTimeout(() => {
          toastNotification.classList.add('translate-y-24', 'opacity-0');
        }, 2200);
      }

      function formatRupiah(num) {
        return 'Rp ' + num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
      }

      function recalculateSummary() {
        if (isPayAll) {
          currentSubtotal = 666667;
          const fee = 0; // Free admin on full settlement
          const total = currentSubtotal + fee;

          summarySubtotal.textContent = formatRupiah(currentSubtotal);
          summarySubtotalLabel.textContent = 'Subtotal Sisa Cicilan (Termin 2 & 3)';
          summaryAdminFee.textContent = 'Rp 0 (Bebas Biaya)';
          summaryAdminFee.className = 'font-mono font-bold text-emerald-600';
          summaryTotal.textContent = formatRupiah(total);
          summaryTermTitle.textContent = 'Pelunasan Cicilan (Termin 2 & 3)';
          summaryTermBadge.textContent = '2 Termin Sekaligus';
          btnText.textContent = `Lanjut Pelunasan Penuh (${formatRupiah(total)})`;
        } else {
          currentSubtotal = 333333;
          const total = currentSubtotal + currentAdminFee;

          summarySubtotal.textContent = formatRupiah(currentSubtotal);
          summarySubtotalLabel.textContent = 'Subtotal Tagihan';
          summaryAdminFee.textContent = formatRupiah(currentAdminFee);
          summaryAdminFee.className = 'font-mono font-semibold text-slate-900';
          summaryTotal.textContent = formatRupiah(total);
          summaryTermTitle.textContent = 'Cicilan SPP Termin 2';
          summaryTermBadge.textContent = 'Termin 2';
          btnText.textContent = `Lanjut ke Pembayaran (${formatRupiah(total)})`;
        }
      }

      if (payAllToggle) {
        payAllToggle.addEventListener('change', function(e) {
          isPayAll = e.target.checked;
          recalculateSummary();
          showToast(isPayAll ? 'Opsi pelunasan penuh dipilih (Bebas Biaya Duitku)' : 'Kembali ke pembayaran Termin 2 saja');
        });
      }

      // Tab Switching
      tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
          tabBtns.forEach(b => {
            b.classList.remove('bg-white', 'text-blue-600', 'shadow-xs');
            b.classList.add('text-slate-600');
          });
          this.classList.add('bg-white', 'text-blue-600', 'shadow-xs');
          this.classList.remove('text-slate-600');

          const targetId = this.getAttribute('data-target');
          channelPanels.forEach(panel => {
            if (panel.id === targetId) {
              panel.classList.remove('hidden');
              panel.classList.add('grid');
            } else {
              panel.classList.add('hidden');
              panel.classList.remove('grid');
            }
          });
        });
      });

      // Channel Card Selection
      channelCards.forEach(card => {
        card.addEventListener('click', function() {
          channelCards.forEach(c => {
            c.classList.remove('border-2', 'border-blue-600', 'bg-blue-50/40');
            c.classList.add('border', 'border-slate-200', 'bg-white');
            const ind = c.querySelector('.indicator');
            if (ind) {
              ind.className = 'indicator w-5 h-5 rounded-full border-2 border-slate-300 text-transparent flex items-center justify-center';
            }
            const r = c.querySelector('input[type="radio"]');
            if (r) r.checked = false;
          });

          this.classList.remove('border', 'border-slate-200', 'bg-white');
          this.classList.add('border-2', 'border-blue-600', 'bg-blue-50/40');
          const radio = this.querySelector('input[type="radio"]');
          if (radio) radio.checked = true;

          const ind = this.querySelector('.indicator');
          if (ind) {
            ind.className = 'indicator w-5 h-5 rounded-full bg-blue-600 text-white flex items-center justify-center shadow-xs';
          }

          currentChannelName = this.getAttribute('data-channel') || 'Virtual Account';
          currentAdminFee = parseInt(this.getAttribute('data-fee') || '2500', 10);
          summaryChannelName.textContent = currentChannelName;

          recalculateSummary();
          showToast(`Kanal ${currentChannelName} dipilih`);
        });
      });

      // CTA Button Loading Simulation
      if (paySubmitBtn) {
        paySubmitBtn.addEventListener('click', function() {
          btnText.textContent = 'Menghubungkan ke Duitku PG...';
          this.classList.add('opacity-80', 'cursor-wait');
          setTimeout(() => {
            showToast('Nomor Virtual Account Berhasil Diterbitkan!');
            btnText.textContent = 'Nomor VA Siap Dibayar ✓';
            setTimeout(() => {
              recalculateSummary();
              paySubmitBtn.classList.remove('opacity-80', 'cursor-wait');
            }, 1200);
          }, 1000);
        });
      }

      // Countdown Timer
      const timerDisplay = document.getElementById('countdown-timer');
      if (timerDisplay) {
        let totalSeconds = (5 * 3600) + (42 * 60) + 19;
        setInterval(() => {
          if (totalSeconds <= 0) return;
          totalSeconds--;
          const hours = Math.floor(totalSeconds / 3600);
          const mins = Math.floor((totalSeconds % 3600) / 60);
          const secs = totalSeconds % 60;
          const pad = n => n < 10 ? '0' + n : n;

          timerDisplay.innerHTML = `
            <span class="bg-red-50 text-red-700 px-2 py-0.5 rounded border border-red-100">${pad(hours)}</span>:
            <span class="bg-red-50 text-red-700 px-2 py-0.5 rounded border border-red-100">${pad(mins)}</span>:
            <span class="bg-red-50 text-red-700 px-2 py-0.5 rounded border border-red-100">${pad(secs)}</span>
          `;
        }, 1000);
      }
    })();</script>
@endsection
