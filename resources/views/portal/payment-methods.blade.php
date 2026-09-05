@extends('layouts.portal')

@section('content')
<!-- Ringkasan Termin Tagihan Card -->
<div class="bg-gradient-to-br from-blue-600 via-indigo-600 to-blue-700 rounded-2xl p-4 text-white shadow-lg shadow-blue-500/15 relative overflow-hidden">
<div class="absolute -right-8 -bottom-8 w-32 h-32 bg-white/10 rounded-full blur-xl pointer-events-none"></div>
<div class="relative z-10 flex items-start justify-between gap-3">
<div>
<div class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-md bg-white/20 text-white text-[11px] font-semibold backdrop-blur-sm mb-1.5">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-300 animate-pulse"></span>
              Tagihan Pendidikan
            </div>
<h2 class="text-sm font-semibold text-blue-50 tracking-tight">Cicilan Ke-2 (SPP Ganjil 2026)</h2>
<p class="text-2xl font-extrabold text-white tracking-tight mt-1">Rp 333.333</p>
</div>
<div class="w-10 h-10 rounded-xl bg-white/15 backdrop-blur-md flex items-center justify-center border border-white/20 shrink-0 text-white">
<span class="material-symbols-outlined text-[22px]">school</span>
</div>
</div>
<div class="mt-3 pt-3 border-t border-white/15 flex items-center justify-between text-xs text-blue-100 font-medium">
<span>Jatuh Tempo: 15 Feb 2026</span>
<span class="text-white font-semibold">Tepat Waktu</span>
</div>
</div>
<!-- Heading Section -->
<div class="flex items-center justify-between pt-1">
<div>
<h3 class="text-sm font-bold text-slate-900">Metode Pembayaran Tersedia</h3>
<p class="text-xs text-slate-500">Pilih salah satu channel instan &amp; otomatis</p>
</div>
<span class="text-[11px] text-blue-600 font-semibold bg-blue-50 px-2 py-0.5 rounded-md border border-blue-100">Verifikasi 24/7</span>
</div>
<!-- Payment Accordion 1: Virtual Account (Default Expanded) -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden transition-all duration-200">
<button class="accordion-header w-full px-4 py-3.5 flex items-center justify-between text-left bg-white hover:bg-slate-50/80 transition-colors" type="button">
<div class="flex items-center gap-3">
<div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-semibold">
<span class="material-symbols-outlined text-[20px]">account_balance</span>
</div>
<div>
<div class="flex items-center gap-2">
<span class="text-xs font-bold text-slate-900">Virtual Account</span>
<span class="text-[10px] font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-1.5 py-0.5 rounded border border-emerald-200/60">Otomatis 24 Jam</span>
</div>
<p class="text-[11px] text-slate-500 mt-0.5">Konfirmasi instan tanpa upload bukti</p>
</div>
</div>
<span class="material-symbols-outlined text-slate-400 text-[20px] transition-transform duration-300 accordion-arrow rotate-180">expand_more</span>
</button>
<div class="accordion-body px-3 pb-3 pt-1 space-y-2 border-t border-slate-100">
<!-- BCA VA (Checked) -->
<label class="relative block cursor-pointer">
<input checked="" class="sr-only channel-input" data-fee="2500" data-fee-label="Rp 2.500" data-name="BCA Virtual Account" name="payment_channel" type="radio" value="bca_va"/>
<div class="channel-label p-3 rounded-xl border border-slate-200 bg-white hover:border-blue-300 flex items-center justify-between gap-3 transition-all">
<div class="flex items-center gap-3 min-w-0">
<div class="w-11 h-8 rounded-lg bg-blue-900 text-white font-black text-[12px] tracking-tight flex items-center justify-center shrink-0 shadow-xs">
                  BCA
                </div>
<div class="min-w-0">
<div class="text-xs font-bold text-slate-900 truncate">BCA Virtual Account</div>
<div class="text-[11px] text-slate-500">Biaya Layanan: <span class="font-semibold text-slate-700">Rp 2.500</span></div>
</div>
</div>
<div class="radio-outer w-5 h-5 rounded-full border-2 border-slate-300 flex items-center justify-center shrink-0 transition-colors">
<div class="radio-inner w-2.5 h-2.5 rounded-full bg-blue-600 transform scale-0 transition-transform"></div>
</div>
</div>
</label>
<!-- Mandiri VA -->
<label class="relative block cursor-pointer">
<input class="sr-only channel-input" data-fee="2500" data-fee-label="Rp 2.500" data-name="Mandiri Virtual Account" name="payment_channel" type="radio" value="mandiri_va"/>
<div class="channel-label p-3 rounded-xl border border-slate-200 bg-white hover:border-blue-300 flex items-center justify-between gap-3 transition-all">
<div class="flex items-center gap-3 min-w-0">
<div class="w-11 h-8 rounded-lg bg-amber-500 text-blue-950 font-black text-[10px] tracking-tight flex items-center justify-center shrink-0 shadow-xs">
                  MANDIRI
                </div>
<div class="min-w-0">
<div class="text-xs font-bold text-slate-900 truncate">Mandiri Virtual Account</div>
<div class="text-[11px] text-slate-500">Biaya Layanan: <span class="font-semibold text-slate-700">Rp 2.500</span></div>
</div>
</div>
<div class="radio-outer w-5 h-5 rounded-full border-2 border-slate-300 flex items-center justify-center shrink-0 transition-colors">
<div class="radio-inner w-2.5 h-2.5 rounded-full bg-blue-600 transform scale-0 transition-transform"></div>
</div>
</div>
</label>
<!-- BNI VA -->
<label class="relative block cursor-pointer">
<input class="sr-only channel-input" data-fee="2500" data-fee-label="Rp 2.500" data-name="BNI Virtual Account" name="payment_channel" type="radio" value="bni_va"/>
<div class="channel-label p-3 rounded-xl border border-slate-200 bg-white hover:border-blue-300 flex items-center justify-between gap-3 transition-all">
<div class="flex items-center gap-3 min-w-0">
<div class="w-11 h-8 rounded-lg bg-orange-600 text-white font-black text-[11px] tracking-tight flex items-center justify-center shrink-0 shadow-xs">
                  BNI
                </div>
<div class="min-w-0">
<div class="text-xs font-bold text-slate-900 truncate">BNI Virtual Account</div>
<div class="text-[11px] text-slate-500">Biaya Layanan: <span class="font-semibold text-slate-700">Rp 2.500</span></div>
</div>
</div>
<div class="radio-outer w-5 h-5 rounded-full border-2 border-slate-300 flex items-center justify-center shrink-0 transition-colors">
<div class="radio-inner w-2.5 h-2.5 rounded-full bg-blue-600 transform scale-0 transition-transform"></div>
</div>
</div>
</label>
<!-- BRI VA -->
<label class="relative block cursor-pointer">
<input class="sr-only channel-input" data-fee="2500" data-fee-label="Rp 2.500" data-name="BRI Virtual Account" name="payment_channel" type="radio" value="bri_va"/>
<div class="channel-label p-3 rounded-xl border border-slate-200 bg-white hover:border-blue-300 flex items-center justify-between gap-3 transition-all">
<div class="flex items-center gap-3 min-w-0">
<div class="w-11 h-8 rounded-lg bg-blue-700 text-white font-black text-[11px] tracking-tight flex items-center justify-center shrink-0 shadow-xs">
                  BRI
                </div>
<div class="min-w-0">
<div class="text-xs font-bold text-slate-900 truncate">BRI Virtual Account</div>
<div class="text-[11px] text-slate-500">Biaya Layanan: <span class="font-semibold text-slate-700">Rp 2.500</span></div>
</div>
</div>
<div class="radio-outer w-5 h-5 rounded-full border-2 border-slate-300 flex items-center justify-center shrink-0 transition-colors">
<div class="radio-inner w-2.5 h-2.5 rounded-full bg-blue-600 transform scale-0 transition-transform"></div>
</div>
</div>
</label>
<!-- Permata VA -->
<label class="relative block cursor-pointer">
<input class="sr-only channel-input" data-fee="2500" data-fee-label="Rp 2.500" data-name="Permata Virtual Account" name="payment_channel" type="radio" value="permata_va"/>
<div class="channel-label p-3 rounded-xl border border-slate-200 bg-white hover:border-blue-300 flex items-center justify-between gap-3 transition-all">
<div class="flex items-center gap-3 min-w-0">
<div class="w-11 h-8 rounded-lg bg-emerald-700 text-white font-bold text-[10px] tracking-tight flex items-center justify-center shrink-0 shadow-xs">
                  PERMATA
                </div>
<div class="min-w-0">
<div class="text-xs font-bold text-slate-900 truncate">Permata VA &amp; Bank Lainnya</div>
<div class="text-[11px] text-slate-500">Biaya Layanan: <span class="font-semibold text-slate-700">Rp 2.500</span></div>
</div>
</div>
<div class="radio-outer w-5 h-5 rounded-full border-2 border-slate-300 flex items-center justify-center shrink-0 transition-colors">
<div class="radio-inner w-2.5 h-2.5 rounded-full bg-blue-600 transform scale-0 transition-transform"></div>
</div>
</div>
</label>
</div>
</div>
<!-- Payment Accordion 2: QRIS & E-Wallet -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden transition-all duration-200">
<button class="accordion-header w-full px-4 py-3.5 flex items-center justify-between text-left bg-white hover:bg-slate-50/80 transition-colors" type="button">
<div class="flex items-center gap-3">
<div class="w-9 h-9 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center font-semibold">
<span class="material-symbols-outlined text-[20px]">qr_code_scanner</span>
</div>
<div>
<div class="flex items-center gap-2">
<span class="text-xs font-bold text-slate-900">Instan QRIS &amp; E-Wallet</span>
<span class="text-[10px] font-bold uppercase tracking-wider text-rose-700 bg-rose-50 px-1.5 py-0.5 rounded border border-rose-200/60">Semua E-Wallet</span>
</div>
<p class="text-[11px] text-slate-500 mt-0.5">GoPay, OVO, ShopeePay, DANA &amp; BCA QR</p>
</div>
</div>
<span class="material-symbols-outlined text-slate-400 text-[20px] transition-transform duration-300 accordion-arrow">expand_more</span>
</button>
<div class="accordion-body hidden px-3 pb-3 pt-1 space-y-2 border-t border-slate-100">
<label class="relative block cursor-pointer">
<input class="sr-only channel-input" data-fee="1500" data-fee-label="Rp 1.500" data-name="QRIS Universal" name="payment_channel" type="radio" value="qris"/>
<div class="channel-label p-3 rounded-xl border border-slate-200 bg-white hover:border-blue-300 flex items-center justify-between gap-3 transition-all">
<div class="flex items-center gap-3 min-w-0">
<div class="w-11 h-8 rounded-lg bg-slate-900 text-white font-black text-[10px] tracking-wider flex items-center justify-center shrink-0 shadow-xs">
                  QRIS
                </div>
<div class="min-w-0">
<div class="text-xs font-bold text-slate-900 truncate">QRIS Nasional (GoPay, OVO, ShopeePay, DANA)</div>
<div class="text-[11px] text-slate-500">Biaya Layanan: <span class="font-semibold text-slate-700">Rp 1.500</span></div>
</div>
</div>
<div class="radio-outer w-5 h-5 rounded-full border-2 border-slate-300 flex items-center justify-center shrink-0 transition-colors">
<div class="radio-inner w-2.5 h-2.5 rounded-full bg-blue-600 transform scale-0 transition-transform"></div>
</div>
</div>
</label>
</div>
</div>
<!-- Payment Accordion 3: Kartu Kredit / Debit Online -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden transition-all duration-200">
<button class="accordion-header w-full px-4 py-3.5 flex items-center justify-between text-left bg-white hover:bg-slate-50/80 transition-colors" type="button">
<div class="flex items-center gap-3">
<div class="w-9 h-9 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-semibold">
<span class="material-symbols-outlined text-[20px]">credit_card</span>
</div>
<div>
<div class="flex items-center gap-2">
<span class="text-xs font-bold text-slate-900">Kartu Kredit / Debit Online</span>
<span class="text-[10px] font-bold uppercase tracking-wider text-indigo-700 bg-indigo-50 px-1.5 py-0.5 rounded border border-indigo-200/60">3D Secure</span>
</div>
<p class="text-[11px] text-slate-500 mt-0.5">Visa &amp; Mastercard berlisensi</p>
</div>
</div>
<span class="material-symbols-outlined text-slate-400 text-[20px] transition-transform duration-300 accordion-arrow">expand_more</span>
</button>
<div class="accordion-body hidden px-3 pb-3 pt-1 space-y-2 border-t border-slate-100">
<label class="relative block cursor-pointer">
<input class="sr-only channel-input" data-fee="7000" data-fee-label="Rp 7.000" data-name="Kartu Kredit / Debit" name="payment_channel" type="radio" value="cc_online"/>
<div class="channel-label p-3 rounded-xl border border-slate-200 bg-white hover:border-blue-300 flex items-center justify-between gap-3 transition-all">
<div class="flex items-center gap-3 min-w-0">
<div class="w-11 h-8 rounded-lg bg-slate-100 border border-slate-300 text-slate-800 font-extrabold text-[11px] flex items-center justify-center shrink-0">
<span class="text-blue-700 font-serif font-black">V</span><span class="text-red-500 font-sans font-black ml-0.5">M</span>
</div>
<div class="min-w-0">
<div class="text-xs font-bold text-slate-900 truncate">Visa / Mastercard (3D Secure OTP)</div>
<div class="text-[11px] text-slate-500">Biaya Layanan: <span class="font-semibold text-slate-700">Rp 7.000</span></div>
</div>
</div>
<div class="radio-outer w-5 h-5 rounded-full border-2 border-slate-300 flex items-center justify-center shrink-0 transition-colors">
<div class="radio-inner w-2.5 h-2.5 rounded-full bg-blue-600 transform scale-0 transition-transform"></div>
</div>
</div>
</label>
</div>
</div>
<!-- Payment Accordion 4: Gerai Tunai Retail -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden transition-all duration-200">
<button class="accordion-header w-full px-4 py-3.5 flex items-center justify-between text-left bg-white hover:bg-slate-50/80 transition-colors" type="button">
<div class="flex items-center gap-3">
<div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center font-semibold">
<span class="material-symbols-outlined text-[20px]">storefront</span>
</div>
<div>
<div class="flex items-center gap-2">
<span class="text-xs font-bold text-slate-900">Gerai Tunai Retail</span>
<span class="text-[10px] font-bold uppercase tracking-wider text-amber-700 bg-amber-50 px-1.5 py-0.5 rounded border border-amber-200/60">Tunai Kasir</span>
</div>
<p class="text-[11px] text-slate-500 mt-0.5">Indomaret &amp; Alfamart terdekat</p>
</div>
</div>
<span class="material-symbols-outlined text-slate-400 text-[20px] transition-transform duration-300 accordion-arrow">expand_more</span>
</button>
<div class="accordion-body hidden px-3 pb-3 pt-1 space-y-2 border-t border-slate-100">
<label class="relative block cursor-pointer">
<input class="sr-only channel-input" data-fee="3500" data-fee-label="Rp 3.500" data-name="Indomaret / Alfamart" name="payment_channel" type="radio" value="retail"/>
<div class="channel-label p-3 rounded-xl border border-slate-200 bg-white hover:border-blue-300 flex items-center justify-between gap-3 transition-all">
<div class="flex items-center gap-3 min-w-0">
<div class="w-11 h-8 rounded-lg bg-red-600 text-white font-extrabold text-[9px] tracking-tight flex items-center justify-center shrink-0 shadow-xs">
                  KASIR
                </div>
<div class="min-w-0">
<div class="text-xs font-bold text-slate-900 truncate">Indomaret / Alfamart</div>
<div class="text-[11px] text-slate-500">Biaya Layanan: <span class="font-semibold text-slate-700">Rp 3.500</span></div>
</div>
</div>
<div class="radio-outer w-5 h-5 rounded-full border-2 border-slate-300 flex items-center justify-center shrink-0 transition-colors">
<div class="radio-inner w-2.5 h-2.5 rounded-full bg-blue-600 transform scale-0 transition-transform"></div>
</div>
</div>
</label>
</div>
</div>
<!-- Kartu Rincian Total -->
<div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm p-4 space-y-3">
<div class="flex items-center justify-between border-b border-slate-100 pb-2.5">
<h4 class="text-xs font-bold uppercase tracking-wider text-slate-500">Rincian Pembayaran</h4>
<span class="text-xs font-semibold text-blue-600" id="selected-channel-badge">BCA Virtual Account</span>
</div>
<div class="space-y-2 text-xs">
<div class="flex items-center justify-between text-slate-600">
<span>Subtotal Cicilan</span>
<span class="font-semibold text-slate-800">Rp 333.333</span>
</div>
<div class="flex items-center justify-between text-slate-600">
<div class="flex items-center gap-1">
<span>Biaya Layanan Duitku</span>
<span class="material-symbols-outlined text-[13px] text-slate-400 cursor-help" title="Biaya pemrosesan transaksi gateway">help</span>
</div>
<span class="font-semibold text-slate-800" id="duitku-fee-text">Rp 2.500</span>
</div>
</div>
<div class="border-t border-dashed border-slate-200 pt-3 flex items-baseline justify-between">
<div>
<div class="text-xs font-bold text-slate-900">Total Pembayaran</div>
<div class="text-[10px] text-slate-400">Termasuk PPN jika berlaku</div>
</div>
<div class="text-right">
<span class="text-lg font-extrabold text-blue-600 tracking-tight" id="total-payment-text">Rp 335.833</span>
</div>
</div>
<!-- Trust Badge -->
<div class="pt-1">
<div class="flex items-center justify-center gap-1.5 py-2 px-3 rounded-xl bg-slate-50 border border-slate-100 text-center">
<span class="material-symbols-outlined text-[15px] text-emerald-600 shrink-0">verified</span>
<span class="text-[11px] font-medium text-slate-600 leading-tight">Bebas Biaya Tersembunyi • Terenkripsi 256-Bit SSL</span>
</div>
</div>
</div>
<script>(function () {
      const baseAmount = 333333;
      const feeTextElem = document.getElementById('duitku-fee-text');
      const totalTextElem = document.getElementById('total-payment-text');
      const btnPayTextElem = document.getElementById('btn-pay-text');
      const selectedBadgeElem = document.getElementById('selected-channel-badge');
      const btnPay = document.getElementById('btn-pay');

      function formatRupiah(num) {
        return 'Rp ' + num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
      }

      // Accordion handler
      document.querySelectorAll('.accordion-header').forEach(header => {
        header.addEventListener('click', () => {
          const body = header.nextElementSibling;
          const arrow = header.querySelector('.accordion-arrow');
          const isHidden = body.classList.contains('hidden');

          if (isHidden) {
            body.classList.remove('hidden');
            arrow.classList.add('rotate-180');
          } else {
            body.classList.add('hidden');
            arrow.classList.remove('rotate-180');
          }
        });
      });

      // Channel selection handler
      document.querySelectorAll('input[name="payment_channel"]').forEach(radio => {
        radio.addEventListener('change', function () {
          if (this.checked) {
            const fee = parseInt(this.getAttribute('data-fee'), 10) || 0;
            const channelName = this.getAttribute('data-name');
            const total = baseAmount + fee;

            const formattedFee = formatRupiah(fee);
            const formattedTotal = formatRupiah(total);

            feeTextElem.textContent = formattedFee;
            totalTextElem.textContent = formattedTotal;
            btnPayTextElem.textContent = `Bayar Sekarang — ${formattedTotal}`;
            selectedBadgeElem.textContent = channelName;
          }
        });
      });

      // CTA Click Feedback
      btnPay.addEventListener('click', function () {
        const originalHtml = btnPay.innerHTML;
        btnPay.disabled = true;
        btnPay.innerHTML = `
          <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
          </svg>
          Menghubungkan ke Duitku PG...
        `;

        setTimeout(() => {
          btnPay.disabled = false;
          btnPay.innerHTML = originalHtml;
        }, 1500);
      });
    })();</script>
@endsection

@section('bottom-bar')
<div class="flex justify-center">
    <a href="{{ route('portal.instructions', $token) }}"
       class="w-full h-12 rounded-xl bg-blue-600 hover:bg-blue-700 active:scale-[0.98] transition-all duration-150 text-white font-bold text-sm shadow-md shadow-blue-600/25 flex items-center justify-center gap-2 cursor-pointer">
        <span class="material-symbols-outlined text-[19px]">lock</span>
        <span id="btn-pay-text">Bayar Sekarang — Rp 335.833</span>
    </a>
</div>
@endsection

