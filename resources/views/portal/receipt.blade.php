@extends('layouts.portal')

@section('content')
<!-- Confetti & Celebration Glow -->
<div class="w-full flex flex-col items-center text-center">
<!-- Animated Green Hero Badge -->
<div class="relative flex items-center justify-center mb-4">
<div class="absolute w-24 h-24 rounded-full bg-emerald-400/20 animate-ping"></div>
<div class="w-20 h-20 rounded-full bg-emerald-100 ring-8 ring-emerald-50 flex items-center justify-center shadow-inner">
<div class="w-14 h-14 rounded-full bg-gradient-to-tr from-emerald-600 to-emerald-400 flex items-center justify-center shadow-lg shadow-emerald-500/30">
<span class="material-symbols-outlined text-white text-[32px] font-bold" style="font-variation-settings: 'FILL' 1;">check</span>
</div>
</div>
</div>
<!-- Status Badge -->
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-100/80 border border-emerald-200 text-emerald-800 text-[11px] font-bold tracking-wider uppercase mb-2 shadow-xs">
<span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
        Lunas (Automatic Reconciled)
      </div>
<!-- Header Typography -->
<h1 class="text-xl font-bold text-slate-900 tracking-tight">Pembayaran Berhasil Dikonfirmasi!</h1>
<p class="text-xs text-slate-500 mt-1 max-w-xs leading-relaxed">
        Diverifikasi otomatis oleh sistem Duitku Payment Gateway.
      </p>
</div>
<!-- Official E-Receipt Card -->
<div class="w-full mt-6 bg-white rounded-2xl border border-slate-200/80 shadow-lg shadow-slate-100 overflow-hidden">
<!-- Card Banner -->
<div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-5 py-3.5 flex items-center justify-between text-white">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[19px] text-blue-200">receipt</span>
<span class="text-xs font-bold uppercase tracking-wider">Kuitansi Digital Resmi</span>
</div>
<div class="flex items-center gap-1 text-[11px] font-medium bg-white/15 backdrop-blur-md px-2.5 py-0.5 rounded-full border border-white/20">
<span class="material-symbols-outlined text-[13px] text-emerald-300">verified</span>
          Tersertifikasi
        </div>
</div>
<!-- Total Amount Hero Section -->
<div class="p-5 text-center bg-gradient-to-b from-blue-50/40 to-white">
<p class="text-[11px] uppercase tracking-wider font-semibold text-slate-400">Total Nominal Dibayar</p>
<div class="mt-1 flex items-baseline justify-center gap-1 text-slate-900">
<span class="text-base font-bold text-slate-500">Rp</span>
<span class="text-3xl font-extrabold tracking-tight">335.833</span>
</div>
<div class="mt-2 inline-flex items-center gap-2 bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-xs font-medium">
<span>Cicilan: <strong class="text-slate-700">Rp 333.333</strong></span>
<span class="text-slate-300">•</span>
<span>Admin: <strong class="text-slate-700">Rp 2.500</strong></span>
</div>
</div>
<!-- Ticket Perforated Cutout Divider -->
<div class="relative flex items-center justify-between px-3 my-0.5 ticket-edge">
<div class="w-full border-b-2 border-dashed border-slate-200"></div>
</div>
<!-- Detail Items List -->
<div class="p-5 space-y-3.5 text-xs">
<!-- Reference Row with Copy button -->
<div class="flex justify-between items-center bg-slate-50 p-2.5 rounded-xl border border-slate-100">
<span class="text-slate-500">No. Referensi Duitku</span>
<button class="flex items-center gap-1.5 font-mono font-bold text-blue-600 hover:text-blue-700 active:scale-95 transition-all" onclick="copyValue('DUITKU-REF-20260210-88741', 'No. Referensi berhasil disalin')" type="button">
<span>DUITKU-REF-20260210-88741</span>
<span class="material-symbols-outlined text-[15px] text-slate-400">content_copy</span>
</button>
</div>
<div class="flex justify-between items-center py-1">
<span class="text-slate-500">Merchant Order ID</span>
<span class="font-mono font-semibold text-slate-800">DKT-20260210-98421</span>
</div>
<div class="flex justify-between items-center py-1">
<span class="text-slate-500">No. Invoice Induk</span>
<span class="font-mono font-semibold text-slate-800">INV/2026/09/0001</span>
</div>
<div class="flex justify-between items-start py-1">
<span class="text-slate-500">Tagihan</span>
<div class="text-right font-medium">
<span class="font-semibold text-slate-900 block">SPP Semester Ganjil 2026</span>
<span class="text-slate-500 text-[11px]">Fahmi Ramadhan</span>
</div>
</div>
<div class="flex justify-between items-center py-1">
<span class="text-slate-500">Termin</span>
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-blue-50 text-blue-700 font-semibold text-[11px] border border-blue-100">
<span class="material-symbols-outlined text-[13px]">date_range</span>
            Cicilan Ke-2 dari 3 Termin
          </span>
</div>
<div class="flex justify-between items-center py-1">
<span class="text-slate-500">Metode</span>
<div class="flex items-center gap-1.5 font-semibold text-slate-800">
<span class="bg-blue-600 text-white text-[9px] font-black px-1.5 py-0.5 rounded">BCA</span>
<span>BCA Virtual Account</span>
</div>
</div>
<div class="flex justify-between items-center py-1">
<span class="text-slate-500">Waktu Bayar</span>
<span class="font-medium text-slate-800">10 Feb 2026, 09:22 WIB</span>
</div>
</div>
</div>
<!-- Status Progres Angsuran Card -->
<div class="w-full mt-4 bg-white rounded-2xl border border-slate-200/80 p-4 shadow-sm">
<div class="flex items-center justify-between mb-3">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-blue-600 text-[18px]">timelapse</span>
<h2 class="font-bold text-slate-900 text-xs">Status Progres Angsuran</h2>
</div>
<span class="text-[11px] font-bold px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
          66% Selesai (2 dari 3 Lunas)
        </span>
</div>
<!-- 3-Segment Progress Bar -->
<div class="grid grid-cols-3 gap-1.5 h-2.5 rounded-full overflow-hidden bg-slate-100 p-0.5">
<div class="bg-emerald-500 rounded-full" title="Cicilan 1: Lunas"></div>
<div class="bg-emerald-500 rounded-full" title="Cicilan 2: Lunas"></div>
<div class="bg-slate-200 rounded-full" title="Cicilan 3: Belum Dibayar"></div>
</div>
<!-- Warning Reminder Box -->
<div class="mt-3.5 bg-amber-50/80 border border-amber-200/80 rounded-xl p-3 flex items-start gap-2.5">
<span class="material-symbols-outlined text-amber-600 text-[20px] shrink-0">info</span>
<div class="text-xs text-amber-900 leading-snug">
<span class="font-bold block text-amber-950 mb-0.5">Tersisa 1 Cicilan Lagi</span>
          Cicilan Ke-3 (<strong class="font-bold">Rp 333.334</strong>) jatuh tempo pada <strong class="font-bold text-amber-950">10 Mar 2026</strong>.
        </div>
</div>
</div>
<!-- WhatsApp Delivery Notice -->
<div class="w-full mt-3 bg-emerald-50/90 border border-emerald-200/90 rounded-xl p-3 flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-emerald-600 text-white flex items-center justify-center shrink-0 shadow-xs">
<span class="material-symbols-outlined text-[18px]">chat</span>
</div>
<p class="text-xs text-emerald-950 leading-tight">
        Salinan kuitansi PDF juga telah terkirim via WhatsApp ke <span class="font-bold">0812-3456-7890</span>.
      </p>
</div>
<!-- Action Buttons -->
<div class="w-full mt-5 space-y-2.5">
<!-- Primary Action -->
<button class="w-full bg-blue-600 hover:bg-blue-700 active:scale-[0.98] text-white font-bold py-3.5 px-4 rounded-xl shadow-md shadow-blue-500/20 flex items-center justify-center gap-2 transition-all text-sm" id="btn-download" onclick="triggerDownload()" type="button">
<span class="material-symbols-outlined text-[20px]">download</span>
<span>Unduh Kuitansi Resmi (PDF)</span>
</button>
<!-- Secondary Action -->
<button class="w-full bg-white hover:bg-slate-100 active:scale-[0.98] text-slate-700 font-semibold py-3 px-4 rounded-xl border border-slate-200 flex items-center justify-center gap-2 transition-all text-sm shadow-xs" onclick="goToInvoicePortal()" type="button">
<span class="material-symbols-outlined text-[18px] text-slate-500">receipt_long</span>
<span>Kembali ke Beranda Tagihan</span>
</button>
<!-- Admin Support Link -->
<a class="w-full py-2 flex items-center justify-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-emerald-700 transition-colors" href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20ingin%20menanyakan%20kuitansi%20DUITKU-REF-20260210-88741" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-emerald-600 text-[18px]">support_agent</span>
<span>Butuh bantuan? Hubungi Admin via WhatsApp</span>
</a>
</div>
<script>// Copy to clipboard helper
    function copyValue(text, toastMsg) {
      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(text).then(() => {
          showToast(toastMsg);
        }).catch(() => {
          showToast(toastMsg);
        });
      } else {
        showToast(toastMsg);
      }
    }

    // Toast show logic
    function showToast(message) {
      const toast = document.getElementById('toast-notif');
      const toastText = document.getElementById('toast-text');
      if (!toast || !toastText) return;

      toastText.textContent = message;
      toast.classList.remove('-translate-y-8', 'opacity-0', 'pointer-events-none');
      toast.classList.add('translate-y-0', 'opacity-100');

      setTimeout(() => {
        toast.classList.add('-translate-y-8', 'opacity-0', 'pointer-events-none');
        toast.classList.remove('translate-y-0', 'opacity-100');
      }, 2500);
    }

    // Download action simulation
    function triggerDownload() {
      const btn = document.getElementById('btn-download');
      if (!btn) return;

      const originalHtml = btn.innerHTML;
      btn.disabled = true;
      btn.innerHTML = `
        <span class="inline-block w-4 h-4 rounded-full border-2 border-white border-t-transparent animate-spin"></span>
        <span>Memproses Kuitansi PDF...</span>
      `;

      setTimeout(() => {
        btn.innerHTML = `
          <span class="material-symbols-outlined text-[20px]">check</span>
          <span>Kuitansi Berhasil Diunduh!</span>
        `;
        showToast('Kuitansi PDF resmi berhasil diunduh');

        setTimeout(() => {
          btn.innerHTML = originalHtml;
          btn.disabled = false;
        }, 2000);
      }, 1000);
    }

    // Back to Invoice Portal
    function goToInvoicePortal() {
      window.location.href = '{{ route('portal.detail', $token) }}';
    }</script>
@endsection
