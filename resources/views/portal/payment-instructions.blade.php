@extends('layouts.portal')

@section('content')
<!-- 1. Eye-Catching Countdown Banner -->
<div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-amber-500 via-amber-600 to-orange-600 text-white p-4 shadow-lg shadow-amber-500/15">
<div class="absolute -right-6 -bottom-8 opacity-10 pointer-events-none">
<span class="material-symbols-outlined text-[130px]">schedule</span>
</div>
<div class="relative z-10">
<div class="flex items-center justify-between mb-1.5">
<div class="flex items-center gap-1.5 text-amber-100 text-xs font-semibold">
<span class="material-symbols-outlined text-sm">timelapse</span>
<span>Sisa Waktu Pembayaran</span>
</div>
<span class="text-[11px] bg-white/20 backdrop-blur-md px-2 py-0.5 rounded-full font-medium text-amber-50 border border-white/10">Otomatis Dibatalkan</span>
</div>
<div class="flex items-baseline justify-between mt-1">
<div class="flex items-baseline gap-1">
<span class="font-mono text-3xl font-extrabold tracking-tight text-white drop-shadow-sm" id="countdownDisplay">23:54:10</span>
</div>
<div class="text-right">
<div class="text-[10px] text-amber-200 uppercase font-medium">Jatuh Tempo</div>
<div class="text-xs font-bold text-white tracking-tight">11 Feb 2026, 09:15 WIB</div>
</div>
</div>
</div>
</div>
<!-- 2. Kartu Rekening Virtual Account (BCA) -->
<div class="bg-white rounded-2xl p-4 shadow-card border border-slate-100/80 space-y-4">
<!-- Bank Branding Row -->
<div class="flex items-center justify-between pb-3 border-b border-slate-100">
<div class="flex items-center gap-3">
<div class="w-11 h-11 rounded-xl bg-bca-light flex items-center justify-center font-extrabold text-bca text-sm border border-bca/15 shadow-xs tracking-wider">
              BCA
            </div>
<div>
<div class="flex items-center gap-1.5">
<h2 class="text-sm font-bold text-slate-900">BCA Virtual Account</h2>
<span class="material-symbols-outlined text-bca text-base fill-1" title="Terverifikasi">verified</span>
</div>
<p class="text-xs text-emerald-600 font-medium flex items-center gap-1 mt-0.5">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-500 inline-block"></span>
                Verifikasi Otomatis 24 Jam
              </p>
</div>
</div>
<span class="text-[11px] font-semibold text-slate-400 bg-slate-50 px-2 py-1 rounded-md border border-slate-100">Instan</span>
</div>
<!-- Nomor Virtual Account Display -->
<div class="bg-slate-50/90 rounded-xl p-3.5 border border-slate-200/70">
<div class="flex justify-between items-center mb-1.5">
<span class="text-[11px] font-semibold tracking-wider text-slate-500 uppercase">Nomor Virtual Account</span>
<span class="text-[11px] font-semibold text-bca bg-blue-50 px-1.5 py-0.5 rounded">Bank Central Asia</span>
</div>
<div class="flex items-center justify-between gap-2">
<span class="font-mono text-xl font-extrabold text-slate-900 tracking-wider select-all" id="vaNumber">8801 2345 6789 001</span>
<button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white border border-slate-200 text-bca hover:bg-bca hover:text-white hover:border-bca font-bold text-xs shadow-xs active:scale-95 transition-all" onclick="copyValue('880123456789001', 'Nomor Virtual Account berhasil disalin')" type="button">
<span class="material-symbols-outlined text-sm">content_copy</span>
<span>Salin</span>
</button>
</div>
</div>
<!-- Total Nominal Transfer Display -->
<div class="bg-slate-50/90 rounded-xl p-3.5 border border-slate-200/70">
<div class="flex justify-between items-center mb-1">
<span class="text-[11px] font-semibold tracking-wider text-slate-500 uppercase">Total Nominal Transfer</span>
<span class="inline-flex items-center gap-1 text-[11px] font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full border border-amber-200">
<span class="material-symbols-outlined text-[13px]">pin</span>
              Kode Unik 3 Digit
            </span>
</div>
<div class="flex items-center justify-between gap-2">
<div class="flex items-baseline">
<span class="text-2xl font-extrabold text-slate-900 tracking-tight select-all">Rp 335.<span class="text-bca bg-bca/10 px-1 py-0.5 rounded">833</span></span>
</div>
<button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white border border-slate-200 text-bca hover:bg-bca hover:text-white hover:border-bca font-bold text-xs shadow-xs active:scale-95 transition-all" onclick="copyValue('335833', 'Nominal transfer berhasil disalin')" type="button">
<span class="material-symbols-outlined text-sm">content_copy</span>
<span>Salin</span>
</button>
</div>
</div>
<!-- Warning Callout 3 Digit -->
<div class="rounded-xl bg-amber-50 border border-amber-200/80 p-3 flex gap-2.5 items-start">
<span class="material-symbols-outlined text-amber-600 text-lg shrink-0 mt-0.5">error</span>
<p class="text-xs text-amber-900 leading-relaxed font-body">
            Pastikan mentransfer nominal pas hingga <strong class="font-bold text-amber-950 underline decoration-amber-400">3 digit terakhir</strong> untuk proses verifikasi otomatis instan tanpa unggah bukti bayar.
          </p>
</div>
</div>
<!-- 3. Panduan Tata Cara Pembayaran (Interactive Tabs) -->
<div class="bg-white rounded-2xl p-4 shadow-card border border-slate-100/80 space-y-3.5">
<div class="flex items-center justify-between">
<h3 class="text-sm font-bold text-slate-900">Petunjuk Pembayaran</h3>
<span class="text-[11px] text-slate-400 font-medium">BCA Channel</span>
</div>
<!-- Segmented Tab Navigation -->
<div class="grid grid-cols-3 p-1 bg-slate-100/90 rounded-xl gap-1 text-xs font-semibold">
<button aria-selected="true" class="py-2 px-2 rounded-lg transition-all text-center bg-white text-bca shadow-xs font-bold" id="tab-mbca" onclick="switchTab('mbca')" type="button">
            m-BCA
          </button>
<button aria-selected="false" class="py-2 px-2 rounded-lg transition-all text-center text-slate-600 hover:text-slate-900" id="tab-klikbca" onclick="switchTab('klikbca')" type="button">
            KlikBCA
          </button>
<button aria-selected="false" class="py-2 px-2 rounded-lg transition-all text-center text-slate-600 hover:text-slate-900" id="tab-atmbca" onclick="switchTab('atmbca')" type="button">
            ATM BCA
          </button>
</div>
<!-- Tab Contents -->
<!-- Content 1: m-BCA -->
<div class="tab-panel pt-1" id="content-mbca">
<ol class="space-y-3">
<li class="flex items-start gap-3">
<span class="w-6 h-6 rounded-full bg-blue-50 text-bca border border-blue-200 text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">1</span>
<p class="text-xs text-slate-700 leading-relaxed font-body">Buka aplikasi <strong class="font-bold text-slate-900">BCA Mobile</strong>, lalu pilih menu <strong class="font-bold text-slate-900">m-Transfer</strong>.</p>
</li>
<li class="flex items-start gap-3">
<span class="w-6 h-6 rounded-full bg-blue-50 text-bca border border-blue-200 text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">2</span>
<p class="text-xs text-slate-700 leading-relaxed font-body">Pilih opsi <strong class="font-bold text-slate-900">BCA Virtual Account</strong>.</p>
</li>
<li class="flex items-start gap-3">
<span class="w-6 h-6 rounded-full bg-blue-50 text-bca border border-blue-200 text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">3</span>
<p class="text-xs text-slate-700 leading-relaxed font-body">Masukkan nomor Virtual Account <span class="font-mono font-bold text-bca bg-blue-50 px-1.5 py-0.5 rounded text-[11px]">880123456789001</span> lalu tekan <strong class="font-bold text-slate-900">Send</strong>.</p>
</li>
<li class="flex items-start gap-3">
<span class="w-6 h-6 rounded-full bg-blue-50 text-bca border border-blue-200 text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">4</span>
<p class="text-xs text-slate-700 leading-relaxed font-body">Periksa nama penerima <strong class="font-bold text-slate-900">BayarKilat - SPP Fahmi</strong> dan total tagihan <strong class="font-bold text-slate-900">Rp 335.833</strong>, lalu masukkan PIN m-BCA Anda.</p>
</li>
</ol>
</div>
<!-- Content 2: KlikBCA -->
<div class="tab-panel hidden pt-1" id="content-klikbca">
<ol class="space-y-3">
<li class="flex items-start gap-3">
<span class="w-6 h-6 rounded-full bg-blue-50 text-bca border border-blue-200 text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">1</span>
<p class="text-xs text-slate-700 leading-relaxed font-body">Login ke akun <strong class="font-bold text-slate-900">KlikBCA Individual</strong> Anda melalui browser.</p>
</li>
<li class="flex items-start gap-3">
<span class="w-6 h-6 rounded-full bg-blue-50 text-bca border border-blue-200 text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">2</span>
<p class="text-xs text-slate-700 leading-relaxed font-body">Pilih menu <strong class="font-bold text-slate-900">Transfer Dana</strong>, kemudian klik <strong class="font-bold text-slate-900">Transfer ke BCA Virtual Account</strong>.</p>
</li>
<li class="flex items-start gap-3">
<span class="w-6 h-6 rounded-full bg-blue-50 text-bca border border-blue-200 text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">3</span>
<p class="text-xs text-slate-700 leading-relaxed font-body">Ketik nomor Virtual Account <span class="font-mono font-bold text-bca bg-blue-50 px-1.5 py-0.5 rounded text-[11px]">880123456789001</span>.</p>
</li>
<li class="flex items-start gap-3">
<span class="w-6 h-6 rounded-full bg-blue-50 text-bca border border-blue-200 text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">4</span>
<p class="text-xs text-slate-700 leading-relaxed font-body">Validasi detail penerima, masukkan respons token KeyBCA Appli 1, dan selesaikan otorisasi transaksi.</p>
</li>
</ol>
</div>
<!-- Content 3: ATM BCA -->
<div class="tab-panel hidden pt-1" id="content-atmbca">
<ol class="space-y-3">
<li class="flex items-start gap-3">
<span class="w-6 h-6 rounded-full bg-blue-50 text-bca border border-blue-200 text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">1</span>
<p class="text-xs text-slate-700 leading-relaxed font-body">Masukkan kartu ATM BCA dan 6 digit PIN kartu Anda.</p>
</li>
<li class="flex items-start gap-3">
<span class="w-6 h-6 rounded-full bg-blue-50 text-bca border border-blue-200 text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">2</span>
<p class="text-xs text-slate-700 leading-relaxed font-body">Pilih menu <strong class="font-bold text-slate-900">Transaksi Lainnya</strong> &gt; <strong class="font-bold text-slate-900">Transfer</strong> &gt; <strong class="font-bold text-slate-900">Ke Rek BCA Virtual Account</strong>.</p>
</li>
<li class="flex items-start gap-3">
<span class="w-6 h-6 rounded-full bg-blue-50 text-bca border border-blue-200 text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">3</span>
<p class="text-xs text-slate-700 leading-relaxed font-body">Masukkan nomor VA <span class="font-mono font-bold text-bca bg-blue-50 px-1.5 py-0.5 rounded text-[11px]">880123456789001</span> lalu tekan <strong class="font-bold text-slate-900">Benar</strong>.</p>
</li>
<li class="flex items-start gap-3">
<span class="w-6 h-6 rounded-full bg-blue-50 text-bca border border-blue-200 text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">4</span>
<p class="text-xs text-slate-700 leading-relaxed font-body">Periksa konfirmasi data di layar ATM dan konfirmasi pembayaran hingga struk keluar.</p>
</li>
</ol>
</div>
</div>
<!-- 4. Real-time Polling & Status Sentinel Box -->
<div class="bg-white rounded-2xl p-4 shadow-card border border-slate-100/80 text-center space-y-3.5">
<!-- Loading Animation & Sentinel Info -->
<div class="flex flex-col items-center pt-1">
<div class="relative w-11 h-11 mb-2.5 flex items-center justify-center">
<span class="absolute inline-flex h-full w-full rounded-full bg-blue-100 opacity-70 animate-ping"></span>
<div class="w-10 h-10 rounded-full bg-blue-50 border border-blue-200 flex items-center justify-center text-bca">
<span class="material-symbols-outlined text-xl animate-spin">sync</span>
</div>
</div>
<h4 class="text-sm font-bold text-slate-900">Menghubungkan ke Bank...</h4>
<p class="text-xs text-slate-500 leading-relaxed max-w-xs mt-1 font-body">
            Mengecek status pembayaran secara otomatis setiap beberapa detik... Halaman ini akan beralih langsung saat transfer terdeteksi.
          </p>
</div>
<!-- Action Buttons -->
<div class="space-y-2 pt-1">
<button class="w-full h-11 px-4 rounded-xl bg-slate-900 hover:bg-slate-800 active:scale-[0.99] text-white font-bold text-xs flex items-center justify-center gap-2 shadow-sm transition-all" id="manualCheckBtn" onclick="manualCheckStatus()" type="button">
<span class="material-symbols-outlined text-base" id="checkIcon">autorenew</span>
<span id="checkText">Cek Status Pembayaran Sekarang</span>
</button>
<a class="w-full h-10 rounded-xl bg-slate-50 hover:bg-slate-100 text-slate-600 hover:text-slate-800 font-semibold text-xs inline-flex items-center justify-center gap-1.5 transition-colors border border-slate-200/80" href="{{ route('portal.methods', $token) }}">
<span class="material-symbols-outlined text-base">swap_horiz</span>
<span>Ganti Metode Pembayaran Lain</span>
</a>
</div>
</div>
<!-- 5. Footer Security & Compliance -->
<div class="py-3 text-center space-y-1">
<div class="inline-flex items-center justify-center gap-1.5 text-slate-400 text-[11px] font-medium">
<span class="material-symbols-outlined text-sm text-emerald-600">verified_user</span>
<span>Terenkripsi 256-bit SSL &amp; Berlisensi Bank Indonesia</span>
</div>
</div>
<script>// Countdown Timer logic (Jatuh tempo: 11 Feb 2026, 09:15 WIB)
    let totalSeconds = (23 * 3600) + (54 * 60) + 10;
    const timerElem = document.getElementById('countdownDisplay');

    function tickTimer() {
      if (totalSeconds <= 0) {
        if (timerElem) timerElem.textContent = "00:00:00";
        return;
      }
      totalSeconds--;
      const hours = Math.floor(totalSeconds / 3600).toString().padStart(2, '0');
      const minutes = Math.floor((totalSeconds % 3600) / 60).toString().padStart(2, '0');
      const seconds = Math.floor(totalSeconds % 60).toString().padStart(2, '0');
      if (timerElem) {
        timerElem.textContent = `${hours}:${minutes}:${seconds}`;
      }
    }
    setInterval(tickTimer, 1000);

    // Clipboard Copy Helper with Toast
    function copyValue(text, message) {
      if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(text).catch(() => fallbackCopy(text));
      } else {
        fallbackCopy(text);
      }
      showToast(message);
    }

    function fallbackCopy(text) {
      const textarea = document.createElement("textarea");
      textarea.value = text;
      textarea.style.position = "fixed";
      textarea.style.opacity = "0";
      document.body.appendChild(textarea);
      textarea.focus();
      textarea.select();
      try {
        document.execCommand('copy');
      } catch (e) {}
      document.body.removeChild(textarea);
    }

    let toastTimer = null;
    function showToast(message) {
      const toast = document.getElementById('copyToast');
      const toastMsg = document.getElementById('toastMsg');
      if (!toast || !toastMsg) return;

      toastMsg.textContent = message;
      toast.classList.remove('opacity-0', '-translate-y-3', 'pointer-events-none');
      toast.classList.add('opacity-100', 'translate-y-0');

      if (toastTimer) clearTimeout(toastTimer);
      toastTimer = setTimeout(() => {
        toast.classList.remove('opacity-100', 'translate-y-0');
        toast.classList.add('opacity-0', '-translate-y-3', 'pointer-events-none');
      }, 2300);
    }

    // Tabs Switcher
    function switchTab(activeId) {
      const tabs = ['mbca', 'klikbca', 'atmbca'];
      tabs.forEach(tab => {
        const btn = document.getElementById(`tab-${tab}`);
        const panel = document.getElementById(`content-${tab}`);
        if (!btn || !panel) return;

        if (tab === activeId) {
          btn.setAttribute('aria-selected', 'true');
          btn.className = "py-2 px-2 rounded-lg transition-all text-center bg-white text-bca shadow-xs font-bold";
          panel.classList.remove('hidden');
        } else {
          btn.setAttribute('aria-selected', 'false');
          btn.className = "py-2 px-2 rounded-lg transition-all text-center text-slate-600 hover:text-slate-900";
          panel.classList.add('hidden');
        }
      });
    }

    // Manual Status Check Simulation
    function manualCheckStatus() {
      const btn = document.getElementById('manualCheckBtn');
      const icon = document.getElementById('checkIcon');
      const text = document.getElementById('checkText');
      if (!btn || !icon || !text) return;

      btn.disabled = true;
      btn.classList.add('opacity-80');
      icon.classList.add('animate-spin');
      text.textContent = 'Memverifikasi status...';

      setTimeout(() => {
        btn.disabled = false;
        btn.classList.remove('opacity-80');
        icon.classList.remove('animate-spin');
        text.textContent = 'Cek Status Pembayaran Sekarang';
        window.location.href = '{{ route('portal.receipt', $token) }}';
      }, 1600);
    }</script>
@endsection
