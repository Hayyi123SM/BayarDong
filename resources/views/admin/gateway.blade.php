@extends('layouts.admin')

@section('content')

{{-- Header Sub-Bar --}}
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-space-lg bg-surface-card p-space-xl rounded-xl shadow-sm relative overflow-hidden">
    <div class="absolute -right-12 -top-12 w-64 h-64 bg-secondary/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="flex flex-col gap-space-xs z-10">
        <div class="flex items-center gap-space-sm">
            <span class="inline-flex items-center gap-space-2xs px-space-sm py-space-2xs rounded-full bg-status-warning-bg text-status-warning-base font-label-sm text-label-sm">
                <span class="material-symbols-outlined text-[14px]">api</span>
                Sandbox Mode
            </span>
            <span class="font-tabular-numeric text-tabular-numeric text-text-tertiary">Versi Integrasi 2.0</span>
        </div>
        <h1 class="font-headline-lg text-headline-lg text-text-primary tracking-tight">Pengaturan Gateway &amp; API Duitku</h1>
        <p class="font-body-md text-body-md text-text-secondary">
            Konfigurasi kredensial payment gateway Duitku (merchant code &amp; API key), webhook callback, dan validasi signature transaksi.
        </p>
    </div>
    <div class="flex items-center gap-space-md z-10">
        <button @click="window.AlpineifyToast && window.AlpineifyToast('Test koneksi ke Duitku sandbox berhasil')"
                class="inline-flex items-center gap-space-xs px-space-lg py-space-sm rounded-lg bg-surface-canvas text-text-primary hover:bg-surface-container transition-all font-label-lg text-label-lg shadow-sm" type="button">
            <span class="material-symbols-outlined text-[18px]">bolt</span>
            <span>Test Koneksi</span>
        </button>
        <button @click="window.AlpineifyToast && window.AlpineifyToast('Konfigurasi gateway berhasil disimpan')"
                class="inline-flex items-center gap-space-xs px-space-lg py-space-sm rounded-lg bg-secondary text-on-secondary hover:bg-secondary-container transition-all font-label-lg text-label-lg shadow-sm" type="button">
            <span class="material-symbols-outlined text-[18px]">save</span>
            <span>Simpan Konfigurasi</span>
        </button>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-12 gap-space-xl items-start">

    {{-- Kredensial Duitku --}}
    <section class="xl:col-span-7 flex flex-col gap-space-xl">
        <div class="bg-surface-card rounded-xl shadow-sm p-space-xl flex flex-col gap-space-lg">
            <div class="flex items-center gap-space-xs">
                <span class="material-symbols-outlined text-[22px] text-secondary">key</span>
                <h2 class="font-headline-sm text-headline-sm text-text-primary">Kredensial Merchant Duitku</h2>
            </div>

            <div class="flex flex-col gap-space-md">
                <div class="flex flex-col gap-space-2xs">
                    <label class="font-label-sm text-label-sm text-text-secondary">Merchant Code (Kode Merchant)</label>
                    <div class="flex items-center gap-space-xs bg-surface-canvas rounded-lg px-space-md py-space-sm">
                        <span class="material-symbols-outlined text-[16px] text-text-tertiary">badge</span>
                        <span class="font-tabular-numeric text-label-md text-text-primary flex-1">D10291</span>
                        <button @click="navigator.clipboard.writeText('D10291'); window.AlpineifyToast && window.AlpineifyToast('Merchant code disalin')" class="text-text-tertiary hover:text-text-primary" type="button">
                            <span class="material-symbols-outlined text-[18px]">content_copy</span>
                        </button>
                    </div>
                </div>

                <div class="flex flex-col gap-space-2xs">
                    <label class="font-label-sm text-label-sm text-text-secondary">Merchant API Key</label>
                    <div class="flex items-center gap-space-xs bg-surface-canvas rounded-lg px-space-md py-space-sm">
                        <span class="material-symbols-outlined text-[16px] text-text-tertiary">lock</span>
                        <span class="font-tabular-numeric text-label-md text-text-primary flex-1">9a4c3f1b2e7d48509f6a1c8d3b5e2f40</span>
                        <button @click="navigator.clipboard.writeText('9a4c3f1b2e7d48509f6a1c8d3b5e2f40'); window.AlpineifyToast && window.AlpineifyToast('API Key disalin')" class="text-text-tertiary hover:text-text-primary" type="button">
                            <span class="material-symbols-outlined text-[18px]">content_copy</span>
                        </button>
                    </div>
                    <span class="text-[11px] text-text-tertiary">
                        API key digunakan untuk menghasilkan signature SHA256 pada setiap request ke Duitku.
                    </span>
                </div>

                <div class="flex flex-col gap-space-2xs">
                    <label class="font-label-sm text-label-sm text-text-secondary">Mode Transaksi</label>
                    <div class="flex items-center gap-space-md">
                        <label class="flex items-center gap-space-xs text-body-sm text-text-primary">
                            <input type="radio" name="mode" checked class="accent-[#4f46e5]">
                            Sandbox (Uji Coba)
                        </label>
                        <label class="flex items-center gap-space-xs text-body-sm text-text-tertiary">
                            <input type="radio" name="mode" class="accent-[#4f46e5]">
                            Production
                        </label>
                    </div>
                </div>
            </div>

            <div class="h-px bg-surface-subtle"></div>

            <div class="flex items-center justify-between">
                <div class="flex items-center gap-space-sm">
                    <div class="w-10 h-10 rounded-xl bg-status-success-bg text-status-success-base flex items-center justify-center">
                        <span class="material-symbols-outlined text-[22px]">link</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-label-lg text-label-lg text-text-primary">Endpoint Callback (Webhook)</span>
                        <span class="font-body-sm text-body-sm text-text-tertiary">Lokasi penerima notifikasi pembayaran dari Duitku</span>
                    </div>
                </div>
                <a href="{{ route('admin.monitoring') }}"
                   class="inline-flex items-center gap-space-xs px-space-md py-space-sm rounded-lg bg-surface-subtle text-text-secondary hover:text-text-primary font-label-md text-label-md transition-colors" type="button">
                    <span class="material-symbols-outlined text-[16px]">travel_explore</span>
                    Buka Monitoring Callback
                </a>
            </div>

            <div class="flex flex-col gap-space-xs">
                <label class="font-label-sm text-label-sm text-text-secondary">Callback URL</label>
                <div class="flex items-center gap-space-xs bg-surface-canvas rounded-lg px-space-md py-space-sm">
                    <span class="font-tabular-numeric text-label-md text-text-primary flex-1">https://api.bayarkilat.id/webhook/duitku/callback</span>
                    <button @click="navigator.clipboard.writeText('https://api.bayarkilat.id/webhook/duitku/callback'); window.AlpineifyToast && window.AlpineifyToast('Callback URL disalin')" class="text-text-tertiary hover:text-text-primary" type="button">
                        <span class="material-symbols-outlined text-[18px]">content_copy</span>
                    </button>
                </div>
            </div>
        </div>

        {{-- Metode Pembayaran Aktif --}}
        <div class="bg-surface-card rounded-xl shadow-sm p-space-xl flex flex-col gap-space-md">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-space-xs">
                    <span class="material-symbols-outlined text-[22px] text-secondary">credit_card</span>
                    <h2 class="font-headline-sm text-headline-sm text-text-primary">Metode Pembayaran Aktif</h2>
                </div>
                <span class="font-body-sm text-body-sm text-text-tertiary">8 channel aktif</span>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                <div class="p-space-md rounded-xl bg-surface-subtle flex items-center justify-between">
                    <div class="flex items-center gap-space-sm">
                        <div class="w-8 h-8 rounded-lg bg-surface-card flex items-center justify-center"><span class="material-symbols-outlined text-secondary text-[18px]">account_balance</span></div>
                        <span class="font-label-md text-label-md text-text-primary">BCA Virtual Account</span>
                    </div>
                    <span class="w-2 h-2 rounded-full bg-status-success-base"></span>
                </div>
                <div class="p-space-md rounded-xl bg-surface-subtle flex items-center justify-between">
                    <div class="flex items-center gap-space-sm">
                        <div class="w-8 h-8 rounded-lg bg-surface-card flex items-center justify-center"><span class="material-symbols-outlined text-secondary text-[18px]">account_balance</span></div>
                        <span class="font-label-md text-label-md text-text-primary">QRIS</span>
                    </div>
                    <span class="w-2 h-2 rounded-full bg-status-success-base"></span>
                </div>
                <div class="p-space-md rounded-xl bg-surface-subtle flex items-center justify-between">
                    <div class="flex items-center gap-space-sm">
                        <div class="w-8 h-8 rounded-lg bg-surface-card flex items-center justify-center"><span class="material-symbols-outlined text-secondary text-[18px]">account_balance_wallet</span></div>
                        <span class="font-label-md text-label-md text-text-primary">GoPay / OVO / DANA</span>
                    </div>
                    <span class="w-2 h-2 rounded-full bg-status-success-base"></span>
                </div>
                <div class="p-space-md rounded-xl bg-surface-subtle flex items-center justify-between">
                    <div class="flex items-center gap-space-sm">
                        <div class="w-8 h-8 rounded-lg bg-surface-card flex items-center justify-center"><span class="material-symbols-outlined text-secondary text-[18px]">credit_card</span></div>
                        <span class="font-label-md text-label-md text-text-primary">Kartu Kredit</span>
                    </div>
                    <span class="w-2 h-2 rounded-full bg-status-success-base"></span>
                </div>
            </div>
        </div>
    </section>

    {{-- Status Keamanan & Riwayat --}}
    <aside class="xl:col-span-5 flex flex-col gap-space-xl">
        <div class="bg-surface-card rounded-xl shadow-sm p-space-xl flex flex-col gap-space-md">
            <div class="flex items-center gap-space-xs">
                <span class="material-symbols-outlined text-[22px] text-status-success-base">verified_user</span>
                <h2 class="font-headline-sm text-headline-sm text-text-primary">Status Validasi Signature</h2>
            </div>
            <div class="p-space-md rounded-xl bg-surface-subtle flex items-center justify-between">
                <div class="flex flex-col gap-space-2xs">
                    <span class="font-label-sm text-label-sm text-text-tertiary uppercase tracking-wider">Algoritma</span>
                    <span class="font-label-md text-label-md text-text-primary font-tabular-numeric">SHA256 + MD5</span>
                </div>
                <span class="inline-flex items-center gap-space-2xs px-space-sm py-space-2xs rounded-full bg-status-success-bg text-status-success-base font-label-sm text-label-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-status-success-base animate-pulse"></span> Valid
                </span>
            </div>
            <div class="p-space-md rounded-xl bg-surface-subtle flex flex-col gap-space-xs">
                <span class="font-label-sm text-label-sm text-text-tertiary uppercase tracking-wider">Verifikasi Terakhir</span>
                <div class="flex items-center gap-space-xs">
                    <span class="material-symbols-outlined text-[16px] text-text-tertiary">schedule</span>
                    <span class="font-tabular-numeric text-body-sm text-text-secondary">Kamis, 03 Sep 2026 08:12 WIB</span>
                </div>
                <span class="font-body-sm text-body-sm text-status-success-base">Seluruh callback masuk tervalidasi ✕ 0 ditolak</span>
            </div>
        </div>

        <div class="bg-surface-card rounded-xl shadow-sm p-space-xl flex flex-col gap-space-md">
            <div class="flex items-center gap-space-xs">
                <span class="material-symbols-outlined text-[22px] text-secondary">policy</span>
                <h2 class="font-headline-sm text-headline-sm text-text-primary">Riwayat Verifikasi API Key</h2>
            </div>
            <div class="flex flex-col gap-space-sm">
                <div class="flex items-center justify-between p-space-sm rounded-lg bg-surface-canvas">
                    <span class="font-body-sm text-body-sm text-text-primary">API key diganti</span>
                    <span class="font-tabular-numeric text-[11px] text-text-tertiary">02 Sep 2026</span>
                </div>
                <div class="flex items-center justify-between p-space-sm rounded-lg bg-surface-canvas">
                    <span class="font-body-sm text-body-sm text-text-primary">Endpoint webhook diperbarui</span>
                    <span class="font-tabular-numeric text-[11px] text-text-tertiary">28 Agu 2026</span>
                </div>
                <div class="flex items-center justify-between p-space-sm rounded-lg bg-surface-canvas">
                    <span class="font-body-sm text-body-sm text-text-primary">Mode Sandbox diaktifkan</span>
                    <span class="font-tabular-numeric text-[11px] text-text-tertiary">20 Agu 2026</span>
                </div>
            </div>
        </div>

        <div class="bg-surface-card rounded-xl shadow-sm p-space-xl flex flex-col gap-space-md">
            <div class="flex items-center gap-space-xs">
                <span class="material-symbols-outlined text-[22px] text-text-secondary">help</span>
                <h2 class="font-headline-sm text-headline-sm text-text-primary">Catatan Implementasi</h2>
            </div>
            <p class="font-body-sm text-body-sm text-text-secondary leading-relaxed">
                Halaman ini adalah placeholder. Konfigurasi kredensial Duitku akan dihubungkan ke endpoint
                login/register resmi Duitku dan disimpan terenkripsi pada fase integrasi backend.
                Seluruh aksi di atas bersifat simulasi untuk keperluan demo.
            </p>
            <div class="p-space-sm rounded-lg bg-status-warning-bg text-status-warning-base font-body-sm text-body-sm">
                <span class="material-symbols-outlined text-[16px] align-middle">info</span>
                <span class="align-middle"> Kredensial tidak disimpan. Fitur konfigurasi nyata menyusul.</span>
            </div>
        </div>
    </aside>
</div>

@endsection
