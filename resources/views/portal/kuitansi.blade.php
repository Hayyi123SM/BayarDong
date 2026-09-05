@extends('layouts.portal-desktop')

@section('content')
<!-- Top Announcement / Breadcrumb Bar -->
<div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-3 pb-4 border-b border-slate-200">
<div>
<div class="flex items-center gap-2 text-xs font-semibold tracking-wide uppercase text-blue-600 mb-1">
<span>Checkout Pembayaran</span>
<span class="text-slate-300">•</span>
<span class="text-slate-500">Order ID: DKT-20260210-98421</span>
</div>
<h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">Selesaikan Pembayaran Virtual Account</h1>
</div>
<div class="flex items-center gap-2 self-start md:self-auto bg-emerald-50 border border-emerald-200 text-emerald-800 px-3.5 py-1.5 rounded-lg text-xs font-semibold">
<span class="material-symbols-outlined text-[16px] text-emerald-600">bolt</span>
        Verifikasi Otomatis Tanpa Konfirmasi Manual
      </div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
<!-- LEFT COLUMN (col-span-7) -->
<div class="lg:col-span-7 space-y-6">
<!-- Virtual Account Payment Box -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-7 transition-shadow hover:shadow-md">
<!-- Alert Countdown Banner -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-3.5 bg-amber-50/80 border border-amber-200/80 rounded-xl mb-6">
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-amber-600 text-[22px]">hourglass_top</span>
<div>
<p class="text-xs font-bold text-amber-900">Sisa Waktu Pembayaran:</p>
<span class="font-mono text-base font-extrabold text-amber-950" id="main-timer">23:54:08</span>
</div>
</div>
<div class="text-left sm:text-right border-t sm:border-t-0 pt-2 sm:pt-0 border-amber-200/60">
<p class="text-[11px] font-medium text-amber-700">Jatuh Tempo Otomatis</p>
<p class="text-xs font-bold text-amber-900">11 Feb 2026, 09:15 WIB</p>
</div>
</div>
<!-- Bank Header -->
<div class="flex items-center justify-between pb-5 border-b border-slate-100 mb-6">
<div class="flex items-center gap-3.5">
<div class="w-14 h-11 bg-blue-700 rounded-xl flex items-center justify-center font-black text-white text-base tracking-tighter shadow-sm">
                BCA
              </div>
<div>
<h2 class="text-base font-bold text-slate-900 leading-snug">BCA Virtual Account</h2>
<p class="text-xs text-slate-500 font-medium">Pengecekan Otomatis 24 Jam • Duitku Gateway</p>
</div>
</div>
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
              Kanal Aktif
            </span>
</div>
<!-- VA Number Section -->
<div class="space-y-2 mb-6">
<label class="block text-xs font-bold uppercase tracking-wider text-slate-500">Nomor Virtual Account</label>
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 bg-slate-50 rounded-xl border border-slate-200">
<div>
<div class="font-mono text-xl sm:text-2xl font-extrabold text-slate-900 tracking-wider" id="va-val">
                  8801 2345 6789 001
                </div>
<p class="text-xs text-slate-500 mt-0.5">Nama Rekening: <span class="font-semibold text-slate-700">BayarKilat / Mitra E-Billing</span></p>
</div>
<button class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 active:scale-[0.98] text-white rounded-lg text-xs font-bold shadow-sm transition-all" onclick="copyData('880123456789001', 'Nomor Virtual Account')" type="button">
<span class="material-symbols-outlined text-[18px]">content_copy</span>
<span>Salin No. VA</span>
</button>
</div>
</div>
<!-- Total Nominal Transfer Section -->
<div class="space-y-2 mb-6">
<div class="flex items-center justify-between">
<label class="block text-xs font-bold uppercase tracking-wider text-slate-500">Total Nominal Transfer Tepat</label>
<span class="text-xs font-medium text-amber-700 bg-amber-50 px-2 py-0.5 rounded border border-amber-200">Kode Unik: <strong>+Rp 833</strong></span>
</div>
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 bg-slate-50 rounded-xl border border-slate-200">
<div>
<div class="flex items-baseline gap-1.5">
<span class="text-2xl sm:text-3xl font-extrabold text-blue-600 tracking-tight font-mono">Rp 335.833</span>
</div>
<p class="text-xs text-slate-500 mt-0.5">Termasuk biaya transaksi &amp; kode unik pencocokan otomatis</p>
</div>
<button class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-white hover:bg-slate-100 border border-slate-300 active:scale-[0.98] text-slate-700 rounded-lg text-xs font-bold shadow-sm transition-all" onclick="copyData('335833', 'Nominal Pembayaran')" type="button">
<span class="material-symbols-outlined text-[18px] text-slate-600">content_copy</span>
<span>Salin Nominal</span>
</button>
</div>
</div>
<!-- Important Warning Note -->
<div class="flex items-start gap-3 p-3.5 bg-rose-50 border border-rose-200 rounded-xl">
<span class="material-symbols-outlined text-rose-600 text-[20px] shrink-0 mt-0.5">warning</span>
<p class="text-xs text-rose-900 leading-relaxed font-medium">
<strong class="font-bold">PERINGATAN PENTING:</strong> Pastikan transfer persis sampai 3 digit terakhir (<span class="font-bold underline text-rose-700 font-mono">Rp 335.833</span>) untuk verifikasi otomatis instan tanpa perlu unggah bukti struk manual.
            </p>
</div>
</div>
<!-- Step-by-Step Payment Instructions -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-7">
<div class="flex items-center justify-between mb-5">
<h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
<span class="material-symbols-outlined text-blue-600 text-[22px]">menu_book</span>
              Instruksi Cara Pembayaran
            </h3>
<span class="text-xs font-medium text-slate-400">Pilih Jalur Bank</span>
</div>
<!-- Tab Channels Switcher -->
<div class="grid grid-cols-2 sm:grid-cols-4 gap-2 p-1.5 bg-slate-100 rounded-xl mb-6">
<button class="tab-btn active px-3 py-2 text-xs font-bold rounded-lg transition-all bg-white text-blue-700 shadow-sm" id="btn-mbca" onclick="switchMethod('mbca')">
              m-BCA (Mobile)
            </button>
<button class="tab-btn px-3 py-2 text-xs font-medium rounded-lg transition-all text-slate-600 hover:text-slate-900" id="btn-klikbca" onclick="switchMethod('klikbca')">
              KlikBCA
            </button>
<button class="tab-btn px-3 py-2 text-xs font-medium rounded-lg transition-all text-slate-600 hover:text-slate-900" id="btn-atm" onclick="switchMethod('atm')">
              ATM BCA
            </button>
<button class="tab-btn px-3 py-2 text-xs font-medium rounded-lg transition-all text-slate-600 hover:text-slate-900" id="btn-bifast" onclick="switchMethod('bifast')">
              BI-FAST / Lainnya
            </button>
</div>
<!-- Instruction Steps List -->
<!-- Tab 1: m-BCA -->
<div class="tab-content space-y-3.5" id="method-mbca">
<div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-50 border border-slate-100">
<span class="w-6 h-6 rounded-full bg-blue-600 text-white font-mono text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">1</span>
<div>
<p class="text-xs font-bold text-slate-900">Buka BCA Mobile &amp; Pilih m-Transfer</p>
<p class="text-xs text-slate-600 mt-0.5">Login ke aplikasi m-BCA di smartphone Anda, lalu klik menu <span class="font-semibold text-slate-800">m-Transfer</span> &gt; pilih opsi <span class="font-semibold text-slate-800">BCA Virtual Account</span>.</p>
</div>
</div>
<div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-50 border border-slate-100">
<span class="w-6 h-6 rounded-full bg-blue-600 text-white font-mono text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">2</span>
<div>
<p class="text-xs font-bold text-slate-900">Masukkan Nomor Virtual Account</p>
<p class="text-xs text-slate-600 mt-0.5">Ketikkan nomor <span class="font-mono font-bold text-slate-900 bg-white px-1.5 py-0.5 border rounded">8801 2345 6789 001</span> kemudian klik tombol <strong>Send</strong> di pojok kanan atas.</p>
</div>
</div>
<div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-50 border border-slate-100">
<span class="w-6 h-6 rounded-full bg-blue-600 text-white font-mono text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">3</span>
<div>
<p class="text-xs font-bold text-slate-900">Periksa Ringkasan Tagihan</p>
<p class="text-xs text-slate-600 mt-0.5">Pastikan nama penerima tertera <span class="font-semibold text-slate-800">BayarKilat / Duitku</span> dengan nominal pas sebesar <span class="font-mono font-bold text-blue-700">Rp 335.833</span>.</p>
</div>
</div>
<div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-50 border border-slate-100">
<span class="w-6 h-6 rounded-full bg-blue-600 text-white font-mono text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">4</span>
<div>
<p class="text-xs font-bold text-slate-900">Otorisasi PIN &amp; Selesai</p>
<p class="text-xs text-slate-600 mt-0.5">Masukkan 6-digit PIN m-BCA Anda. Transaksi berhasil dan sistem portal ini akan otomatis terverifikasi lunas dalam beberapa detik.</p>
</div>
</div>
</div>
<!-- Tab 2: KlikBCA -->
<div class="tab-content hidden space-y-3.5" id="method-klikbca">
<div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-50 border border-slate-100">
<span class="w-6 h-6 rounded-full bg-blue-600 text-white font-mono text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">1</span>
<div>
<p class="text-xs font-bold text-slate-900">Login KlikBCA Individual</p>
<p class="text-xs text-slate-600 mt-0.5">Buka website KlikBCA dan masukkan User ID serta PIN Internet Banking Anda.</p>
</div>
</div>
<div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-50 border border-slate-100">
<span class="w-6 h-6 rounded-full bg-blue-600 text-white font-mono text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">2</span>
<div>
<p class="text-xs font-bold text-slate-900">Buka Menu Transfer ke Virtual Account</p>
<p class="text-xs text-slate-600 mt-0.5">Pilih menu <span class="font-semibold text-slate-800">Transfer Dana</span> lalu klik <span class="font-semibold text-slate-800">Transfer ke BCA Virtual Account</span>.</p>
</div>
</div>
<div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-50 border border-slate-100">
<span class="w-6 h-6 rounded-full bg-blue-600 text-white font-mono text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">3</span>
<div>
<p class="text-xs font-bold text-slate-900">Input No. Rekening VA</p>
<p class="text-xs text-slate-600 mt-0.5">Masukkan <span class="font-mono font-bold text-slate-900">8801 2345 6789 001</span> lalu klik <strong>Lanjutkan</strong>.</p>
</div>
</div>
<div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-50 border border-slate-100">
<span class="w-6 h-6 rounded-full bg-blue-600 text-white font-mono text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">4</span>
<div>
<p class="text-xs font-bold text-slate-900">Otorisasi KeyBCA Respon Appli 1</p>
<p class="text-xs text-slate-600 mt-0.5">Ketik respon KeyBCA Token Anda dan klik <strong>Kirim</strong>. Transaksi langsung diverifikasi.</p>
</div>
</div>
</div>
<!-- Tab 3: ATM BCA -->
<div class="tab-content hidden space-y-3.5" id="method-atm">
<div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-50 border border-slate-100">
<span class="w-6 h-6 rounded-full bg-blue-600 text-white font-mono text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">1</span>
<div>
<p class="text-xs font-bold text-slate-900">Masukkan Kartu &amp; PIN ATM</p>
<p class="text-xs text-slate-600 mt-0.5">Kunjungi mesin ATM BCA, masukkan kartu debit Anda dan ketikkan 6 digit PIN secara aman.</p>
</div>
</div>
<div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-50 border border-slate-100">
<span class="w-6 h-6 rounded-full bg-blue-600 text-white font-mono text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">2</span>
<div>
<p class="text-xs font-bold text-slate-900">Pilih Transaksi Lainnya &gt; Transfer</p>
<p class="text-xs text-slate-600 mt-0.5">Tekan menu <span class="font-semibold text-slate-800">Transaksi Lainnya</span> &gt; <span class="font-semibold text-slate-800">Transfer</span> &gt; pilih opsi <span class="font-semibold text-slate-800">Ke Rek BCA Virtual Account</span>.</p>
</div>
</div>
<div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-50 border border-slate-100">
<span class="w-6 h-6 rounded-full bg-blue-600 text-white font-mono text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">3</span>
<div>
<p class="text-xs font-bold text-slate-900">Input Nomor VA 8801 2345 6789 001</p>
<p class="text-xs text-slate-600 mt-0.5">Masukkan 16 digit nomor VA lalu tekan <strong>Benar</strong>.</p>
</div>
</div>
<div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-50 border border-slate-100">
<span class="w-6 h-6 rounded-full bg-blue-600 text-white font-mono text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">4</span>
<div>
<p class="text-xs font-bold text-slate-900">Konfirmasi Nominal &amp; Ambil Struk</p>
<p class="text-xs text-slate-600 mt-0.5">Pastikan nominal Rp 335.833 sesuai di layar, tekan <strong>Ya</strong>, dan simpan resi sebagai arsip Anda.</p>
</div>
</div>
</div>
<!-- Tab 4: BI-FAST / Lainnya -->
<div class="tab-content hidden space-y-3.5" id="method-bifast">
<div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-50 border border-slate-100">
<span class="w-6 h-6 rounded-full bg-blue-600 text-white font-mono text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">1</span>
<div>
<p class="text-xs font-bold text-slate-900">Akses Mobile Banking Bank Apapun</p>
<p class="text-xs text-slate-600 mt-0.5">Gunakan Mandiri Livin, BRImo, BNI Mobile, Seabank, Blu, atau bank lain pilihan Anda.</p>
</div>
</div>
<div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-50 border border-slate-100">
<span class="w-6 h-6 rounded-full bg-blue-600 text-white font-mono text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">2</span>
<div>
<p class="text-xs font-bold text-slate-900">Pilih Transfer Antar Bank / BI-FAST</p>
<p class="text-xs text-slate-600 mt-0.5">Pilih tujuan bank: <span class="font-bold text-slate-800">BANK BCA (Kode 014)</span>.</p>
</div>
</div>
<div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-50 border border-slate-100">
<span class="w-6 h-6 rounded-full bg-blue-600 text-white font-mono text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">3</span>
<div>
<p class="text-xs font-bold text-slate-900">Masukkan No. Rekening Tujuan</p>
<p class="text-xs text-slate-600 mt-0.5">Ketikkan nomor VA <span class="font-mono font-bold text-slate-900">880123456789001</span> sebagai nomor rekening tujuan.</p>
</div>
</div>
<div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-50 border border-slate-100">
<span class="w-6 h-6 rounded-full bg-blue-600 text-white font-mono text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">4</span>
<div>
<p class="text-xs font-bold text-slate-900">Input Nominal Persis Rp 335.833</p>
<p class="text-xs text-slate-600 mt-0.5">Pastikan jumlah transfer tepat sama hingga nominal digit terakhir agar gateway mendeteksi secara otomatis.</p>
</div>
</div>
</div>
</div>
<!-- Real-Time Payment Polling Sentinel -->
<div class="bg-gradient-to-r from-slate-900 to-slate-800 text-white rounded-2xl p-5 sm:p-6 shadow-md border border-slate-700">
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
<div class="flex items-start gap-3.5">
<div class="relative flex items-center justify-center w-10 h-10 rounded-full bg-blue-500/20 text-blue-400 shrink-0 mt-0.5">
<span class="material-symbols-outlined text-[24px] animate-spin">sync</span>
<span class="absolute w-full h-full rounded-full border border-blue-400 animate-ping opacity-25"></span>
</div>
<div>
<div class="flex items-center gap-2">
<h4 class="text-sm font-bold text-white">Menghubungkan ke Duitku PG &amp; Bank BCA...</h4>
<span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
</div>
<p class="text-xs text-slate-300 mt-1">
                  Mengecek status pembayaran otomatis tiap 5 detik. Tidak perlu refresh halaman browser.
                </p>
</div>
</div>
</div>
<div class="mt-4 pt-4 border-t border-slate-700/80 flex flex-wrap items-center justify-between gap-3">
<button class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-500 active:scale-[0.98] text-white rounded-lg text-xs font-bold transition-all shadow-sm" onclick="checkStatusManual()" type="button">
<span class="material-symbols-outlined text-[16px]">refresh</span>
<span>Cek Status Pembayaran Sekarang</span>
</button>
<button class="inline-flex items-center gap-1.5 text-xs text-slate-300 hover:text-white transition-colors underline-offset-4 hover:underline" onclick="window.location.href='{{ route('portal.methods', $token) }}'" type="button">
<span>Ganti Metode Pembayaran Lain</span>
<span class="material-symbols-outlined text-[15px]">arrow_forward</span>
</button>
</div>
</div>
</div>
<!-- RIGHT COLUMN (col-span-5) -->
<div class="lg:col-span-5 space-y-6">
<!-- Official Digital E-Receipt Card -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
<!-- Receipt Header Banner -->
<div class="bg-slate-900 text-white p-5">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-emerald-400 text-[22px]">verified</span>
<span class="text-xs font-extrabold uppercase tracking-widest text-slate-200">Kuitansi Pembayaran Resmi</span>
</div>
<span class="text-[10px] font-mono uppercase bg-slate-800 text-emerald-300 border border-emerald-500/30 px-2 py-0.5 rounded font-semibold">
                FINANCIAL DOC
              </span>
</div>
<div class="mt-3 flex items-end justify-between">
<div>
<p class="text-xs text-slate-400">Nomor Faktur / Invoice:</p>
<p class="font-mono text-sm font-bold text-white tracking-wide">INV/2026/09/0001</p>
</div>
<!-- Barcode Mock -->
<div class="hidden sm:block text-right">
<div class="h-6 w-24 barcode-lines bg-white/90 rounded-sm"></div>
<span class="text-[9px] font-mono text-slate-400">DUITKU-SECURED</span>
</div>
</div>
</div>
<div class="p-6 space-y-5">
<!-- Reference Details Grid -->
<div class="bg-slate-50 border border-slate-200/80 rounded-xl p-3.5 space-y-2 text-xs">
<div class="flex justify-between items-center">
<span class="text-slate-500">No. Referensi Gateway:</span>
<span class="font-mono font-bold text-slate-800">DUITKU-REF-20260210-88741</span>
</div>
<div class="flex justify-between items-center">
<span class="text-slate-500">ID Pesanan / Order ID:</span>
<span class="font-mono font-bold text-slate-800">DKT-20260210-98421</span>
</div>
<div class="flex justify-between items-center">
<span class="text-slate-500">Kanal Bayar:</span>
<span class="font-semibold text-blue-600">BCA Virtual Account</span>
</div>
<div class="flex justify-between items-center">
<span class="text-slate-500">Waktu Diterbitkan:</span>
<span class="font-medium text-slate-700">10 Feb 2026, 09:15 WIB</span>
</div>
</div>
<!-- Itemization -->
<div class="space-y-3 pt-1">
<h5 class="text-xs font-bold uppercase tracking-wider text-slate-400">Rincian Komponen Biaya</h5>
<div class="space-y-2 text-xs border-b border-slate-100 pb-3">
<div class="flex justify-between items-center">
<span class="text-slate-600">Tagihan Pokok (Cicilan ke-2)</span>
<span class="font-mono font-semibold text-slate-800">Rp 333.333</span>
</div>
<div class="flex justify-between items-center">
<span class="text-slate-600">Biaya Gateway Duitku (BCA VA)</span>
<span class="font-mono font-semibold text-slate-800">Rp 2.500</span>
</div>
<div class="flex justify-between items-center text-amber-700 bg-amber-50/70 px-2 py-1 rounded">
<span class="font-medium">Kode Unik Verifikasi</span>
<span class="font-mono font-bold">+ Rp 833</span>
</div>
</div>
<!-- Grand Total -->
<div class="p-3.5 bg-blue-50/70 border border-blue-100 rounded-xl flex items-center justify-between">
<div>
<span class="block text-[11px] font-bold uppercase tracking-wider text-blue-800">Total Pembayaran</span>
<span class="text-xs text-blue-600">Terverifikasi Otomatis</span>
</div>
<span class="font-mono text-xl font-black text-blue-700">Rp 335.833</span>
</div>
</div>
<!-- Installment Progress Bar -->
<div class="p-4 bg-slate-50 border border-slate-200/80 rounded-xl space-y-2.5">
<div class="flex items-center justify-between text-xs">
<span class="font-bold text-slate-800">Progres Pelunasan Paket</span>
<span class="font-bold text-emerald-700 font-mono">66% (2 dari 3 Selesai)</span>
</div>
<div class="w-full bg-slate-200 h-2.5 rounded-full overflow-hidden">
<div class="bg-emerald-500 h-full rounded-full transition-all duration-700" style="width: 66.6%;"></div>
</div>
<p class="text-[11px] text-slate-500 flex items-center gap-1.5">
<span class="material-symbols-outlined text-[15px] text-emerald-600 shrink-0">check_circle</span>
                Tersisa 1 cicilan lagi jatuh tempo pada <strong>10 Maret 2026</strong>.
              </p>
</div>
<!-- Receipt Actions Buttons -->
<div class="space-y-2.5 pt-2">
<button class="w-full py-3 px-4 rounded-xl bg-slate-900 hover:bg-slate-800 active:scale-[0.99] text-white text-xs font-bold flex items-center justify-center gap-2 transition-all shadow-sm" onclick="downloadReceipt()" type="button">
<span class="material-symbols-outlined text-[18px] text-emerald-400">download</span>
<span>Unduh Kuitansi PDF Resmi</span>
</button>
<button class="w-full py-2.5 px-4 rounded-xl border border-slate-300 hover:bg-slate-50 active:scale-[0.99] text-slate-700 text-xs font-bold flex items-center justify-center gap-2 transition-all" onclick="sendToWhatsApp()" type="button">
<span class="material-symbols-outlined text-[18px] text-emerald-600">chat</span>
<span>Kirim Salinan ke WhatsApp (0812-3456-7890)</span>
</button>
</div>
</div>
</div>
<!-- WhatsApp Synchronization & Support Card -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 space-y-3.5">
<div class="flex items-center gap-3">
<div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 border border-emerald-100">
<span class="material-symbols-outlined text-[20px]">mark_chat_read</span>
</div>
<div>
<div class="flex items-center gap-1.5">
<h5 class="text-xs font-bold text-slate-900">Sinkronisasi Notifikasi WhatsApp</h5>
<span class="material-symbols-outlined text-[15px] text-emerald-600" title="Meta WABA Official">verified</span>
</div>
<p class="text-[11px] text-slate-500">Resmi Meta Business API (BayarKilat Bot)</p>
</div>
</div>
<p class="text-xs text-slate-600 leading-relaxed bg-slate-50 p-3 rounded-xl border border-slate-100">
            Sistem kami akan langsung mengirimkan resi kuitansi digital bermaterai ke nomor WhatsApp <strong class="font-mono text-slate-900">0812-3456-7890</strong> dalam 3 detik setelah pembayaran berhasil dideteksi.
          </p>
<div class="flex items-center justify-between pt-1 text-xs">
<a class="text-blue-600 hover:text-blue-700 font-semibold inline-flex items-center gap-1" href="https://wa.me/support" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[15px]">support_agent</span>
              Butuh bantuan? Chat CS 24/7
            </a>
<span class="text-slate-400 text-[11px]">Respon &lt; 2 menit</span>
</div>
</div>
</div>
</div>
<script>// Copy To Clipboard
    function copyData(text, title) {
      if (navigator.clipboard) {
        navigator.clipboard.writeText(text).then(function() {
          showToast(title + ' berhasil disalin ke clipboard!');
        }).catch(function() {
          fallbackCopy(text, title);
        });
      } else {
        fallbackCopy(text, title);
      }
    }

    function fallbackCopy(text, title) {
      const el = document.createElement('textarea');
      el.value = text;
      document.body.appendChild(el);
      el.select();
      try {
        document.execCommand('copy');
        showToast(title + ' berhasil disalin!');
      } catch (err) {
        showToast('Gagal menyalin teks');
      }
      document.body.removeChild(el);
    }

    // Toast UI
    function showToast(msg) {
      const toast = document.getElementById('toast');
      const text = document.getElementById('toast-text');
      if (!toast || !text) return;

      text.textContent = msg;
      toast.classList.remove('translate-y-20', 'opacity-0');
      toast.classList.add('translate-y-0', 'opacity-100');

      setTimeout(function() {
        toast.classList.remove('translate-y-0', 'opacity-100');
        toast.classList.add('translate-y-20', 'opacity-0');
      }, 3000);
    }

    // Tab Switching Logic
    function switchMethod(method) {
      const methods = ['mbca', 'klikbca', 'atm', 'bifast'];
      methods.forEach(function(m) {
        const btn = document.getElementById('btn-' + m);
        const content = document.getElementById('method-' + m);
        if (m === method) {
          btn.className = 'tab-btn active px-3 py-2 text-xs font-bold rounded-lg transition-all bg-white text-blue-700 shadow-sm';
          content.classList.remove('hidden');
        } else {
          btn.className = 'tab-btn px-3 py-2 text-xs font-medium rounded-lg transition-all text-slate-600 hover:text-slate-900';
          content.classList.add('hidden');
        }
      });
    }

    // Action Triggers
    function checkStatusManual() {
      showToast('Menghubungkan ke Duitku Gateway & BCA... Status: Menunggu Transfer.');
    }

    function downloadReceipt() {
      showToast('Menyiapkan file PDF Kuitansi Resmi INV/2026/09/0001...');
    }

    function sendToWhatsApp() {
      showToast('Salinan kuitansi berhasil dikirimkan ke WhatsApp 0812-3456-7890!');
    }

    // Countdown Timer Synchronizer
    (function initTimer() {
      let secondsLeft = 23 * 3600 + 54 * 60 + 8;
      const navTimer = document.getElementById('nav-timer');
      const mainTimer = document.getElementById('main-timer');

      setInterval(function() {
        if (secondsLeft <= 0) return;
        secondsLeft--;
        const h = Math.floor(secondsLeft / 3600);
        const m = Math.floor((secondsLeft % 3600) / 60);
        const s = secondsLeft % 60;
        const str = 
          String(h).padStart(2, '0') + ':' +
          String(m).padStart(2, '0') + ':' +
          String(s).padStart(2, '0');

        if (navTimer) navTimer.textContent = str;
        if (mainTimer) mainTimer.textContent = str;
      }, 1000);
    })();</script>
@endsection
