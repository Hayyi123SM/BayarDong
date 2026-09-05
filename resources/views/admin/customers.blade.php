@extends('layouts.admin')

@section('content')
<div x-data="directoryCustomers(@js($customers))" class="flex flex-col w-full gap-space-2xl">

    {{-- ===== Header + Action Buttons ===== --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-space-lg bg-surface-card p-space-xl rounded-xl shadow-sm">
        <div class="flex flex-col gap-space-2xs">
            <div class="font-label-sm text-label-sm text-text-tertiary uppercase tracking-wider">
                Sistem Penagihan / <span class="text-secondary font-semibold">Direktori Pelanggan</span>
            </div>
            <h1 class="font-headline-lg text-headline-lg text-text-primary tracking-tight">Manajemen Data Pelanggan</h1>
            <p class="font-body-md text-body-md text-text-secondary leading-relaxed max-w-2xl">
                Kelola database pelanggan, riwayat tagihan aktif/lunas, status nomor WhatsApp E.164,
                dan profil pembayaran Duitku PG secara real-time.
            </p>
        </div>
        <div class="flex flex-wrap items-center gap-space-sm">
            <button type="button" class="inline-flex items-center gap-space-xs px-space-md py-space-sm rounded-lg bg-surface-subtle hover:bg-surface-container text-text-primary font-label-md text-label-md shadow-sm transition-colors">
                <span class="material-symbols-outlined text-[18px]">file_download</span>
                <span>Ekspor CSV</span>
            </button>
            <button type="button" class="inline-flex items-center gap-space-xs px-space-md py-space-sm rounded-lg bg-surface-subtle hover:bg-surface-container text-text-primary font-label-md text-label-md shadow-sm transition-colors">
                <span class="material-symbols-outlined text-[18px]">upload_file</span>
                <span>Import Kontak</span>
            </button>
            <button type="button" @click="addOpen=true"
                    class="inline-flex items-center gap-space-xs px-space-md py-space-sm rounded-lg bg-secondary hover:bg-secondary-container text-on-secondary font-label-lg text-label-lg shadow-sm transition-colors">
                <span class="material-symbols-outlined text-[18px]">person_add</span>
                <span>Tambah Pelanggan Baru</span>
            </button>
        </div>
    </div>

    {{-- ===== KPI Metrics Strip ===== --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-space-lg">
        <div class="bg-surface-card rounded-xl p-space-lg shadow-sm flex flex-col justify-between relative overflow-hidden">
            <div class="flex items-center justify-between">
                <span class="font-label-sm text-label-sm uppercase tracking-wider text-text-tertiary">Total Pelanggan Terdaftar</span>
                <span class="p-space-xs rounded-lg bg-surface-container text-secondary material-symbols-outlined text-[20px]">group</span>
            </div>
            <div class="mt-space-md">
                <div class="font-display-currency text-display-currency text-text-primary">1.428</div>
                <div class="flex items-center gap-space-xs mt-space-2xs text-body-sm text-body-sm text-text-secondary">
                    <span class="text-text-tertiary">Nasabah</span>
                </div>
            </div>
            <div class="-mx-space-lg -mb-space-lg mt-space-md px-space-lg py-space-xs bg-surface-subtle flex items-center gap-space-2xs">
                <span class="material-symbols-outlined text-[16px] text-status-success-base">trending_up</span>
                <span class="font-body-sm text-body-sm text-status-success-base font-semibold">+12,4%</span>
                <span class="font-body-sm text-body-sm text-text-secondary">pertumbuhan bulan ini</span>
            </div>
        </div>
        <div class="bg-surface-card rounded-xl p-space-lg shadow-sm flex flex-col justify-between relative overflow-hidden">
            <div class="flex items-center justify-between">
                <span class="font-label-sm text-label-sm uppercase tracking-wider text-text-tertiary">Pelanggan Tagihan Aktif</span>
                <span class="p-space-xs rounded-lg bg-surface-container-high text-brand-indigo material-symbols-outlined text-[20px]">schedule</span>
            </div>
            <div class="mt-space-md">
                <div class="font-display-currency text-display-currency text-text-primary">342 <span class="text-label-lg font-label-lg text-text-tertiary">Akun</span></div>
                <div class="flex items-center gap-space-xs mt-space-2xs text-body-sm text-body-sm text-text-secondary">
                    <span class="text-text-tertiary">Termin Berjalan: <span class="font-semibold text-text-primary">589 Angsuran</span></span>
                </div>
            </div>
            <div class="-mx-space-lg -mb-space-lg mt-space-md px-space-lg py-space-xs bg-surface-subtle flex items-center justify-between">
                <span class="font-body-sm text-body-sm text-text-secondary">Tersebar di 4 kategori</span>
                <span class="px-space-sm py-0.5 rounded-full bg-status-info-bg text-status-info-base font-label-sm text-label-sm">24% Total</span>
            </div>
        </div>
        <div class="bg-surface-card rounded-xl p-space-lg shadow-sm flex flex-col justify-between relative overflow-hidden">
            <div class="flex items-center justify-between">
                <span class="font-label-sm text-label-sm uppercase tracking-wider text-text-tertiary">Kepatuhan Bayar (On-Time)</span>
                <span class="p-space-xs rounded-lg bg-status-success-bg text-status-success-base material-symbols-outlined text-[20px]">verified_user</span>
            </div>
            <div class="mt-space-md">
                <div class="font-display-currency text-display-currency text-text-primary">94,8%</div>
                <div class="flex items-center gap-space-xs mt-space-2xs text-body-sm text-body-sm text-text-secondary">
                    <span class="inline-flex items-center gap-1 font-semibold text-status-success-base"><span class="w-1.5 h-1.5 rounded-full bg-status-success-base"></span>Otomasi Duitku Callback Aktif</span>
                </div>
            </div>
            <div class="-mx-space-lg -mb-space-lg mt-space-md px-space-lg py-space-xs bg-status-success-bg/50 flex items-center gap-space-2xs">
                <span class="font-body-sm text-body-sm text-status-success-base">Rasio nunggak terendah Q1-Q3</span>
            </div>
        </div>
        <div class="bg-surface-card rounded-xl p-space-lg shadow-sm flex flex-col justify-between relative overflow-hidden">
            <div class="flex items-center justify-between">
                <span class="font-label-sm text-label-sm uppercase tracking-wider text-text-tertiary">Perhatian: Tunggakan &amp; Kontak</span>
                <span class="p-space-xs rounded-lg bg-status-danger-bg text-status-danger-base material-symbols-outlined text-[20px]">error_outline</span>
            </div>
            <div class="mt-space-md">
                <div class="font-display-currency text-display-currency text-status-danger-base">14 <span class="text-label-lg font-label-lg text-text-tertiary">Perlu Aksi</span></div>
                <div class="flex items-center gap-space-xs mt-space-2xs text-body-sm text-body-sm text-text-secondary">
                    <span class="text-text-tertiary">9 Overdue <span class="text-text-secondary">*</span> 5 WA Invalid</span>
                </div>
            </div>
            <div class="-mx-space-lg -mb-space-lg mt-space-md px-space-lg py-space-xs bg-status-warning-bg/60 flex items-center justify-between">
                <span class="font-body-sm text-body-sm text-status-warning-base font-semibold">Segerakan tindak lanjut</span>
                <span class="material-symbols-outlined text-[18px] text-status-warning-base">arrow_forward</span>
            </div>
        </div>
    </div>

    {{-- ===== Search, Filter & Tab Bar ===== --}}
    <div class="bg-surface-card rounded-xl shadow-sm p-space-lg flex flex-col gap-space-md">
        <div class="flex items-center gap-space-xs overflow-x-auto pb-space-2xs">
            <button type="button" @click="tab='all'; selectedIndex=0"
                    class="px-space-md py-space-xs rounded-lg font-label-md text-label-md flex items-center gap-space-xs transition-colors whitespace-nowrap"
                    :class="tab==='all' ? 'bg-secondary text-on-secondary shadow-sm' : 'bg-surface-subtle hover:bg-surface-container text-text-secondary'">
                <span>Semua Pelanggan</span>
                <span class="px-space-xs py-0.5 rounded-full font-tabular-numeric text-label-sm" :class="tab==='all' ? 'bg-surface-card text-secondary' : 'bg-surface-container text-text-secondary'" x-text="counts.all"></span>
            </button>
            <button type="button" @click="tab='active'; selectedIndex=0"
                    class="px-space-md py-space-xs rounded-lg font-label-md text-label-md flex items-center gap-space-xs transition-colors whitespace-nowrap"
                    :class="tab==='active' ? 'bg-secondary text-on-secondary shadow-sm' : 'bg-surface-subtle hover:bg-surface-container text-text-secondary'">
                <span>Tagihan Berjalan</span>
                <span class="px-space-xs py-0.5 rounded-full font-tabular-numeric text-label-sm" :class="tab==='active' ? 'bg-surface-card text-secondary' : 'bg-surface-container text-text-secondary'" x-text="counts.active"></span>
            </button>
            <button type="button" @click="tab='overdue'; selectedIndex=0"
                    class="px-space-md py-space-xs rounded-lg font-label-md text-label-md flex items-center gap-space-xs transition-colors whitespace-nowrap"
                    :class="tab==='overdue' ? 'bg-secondary text-on-secondary shadow-sm' : 'bg-surface-subtle hover:bg-surface-container text-status-danger-base'">
                <span class="flex items-center gap-space-xs"><span class="w-2 h-2 rounded-full" :class="tab==='overdue' ? 'bg-on-secondary' : 'bg-status-danger-base'"></span>Tunggakan &gt;3 Hari</span>
                <span class="px-space-xs py-0.5 rounded-full font-tabular-numeric text-label-sm" :class="tab==='overdue' ? 'bg-surface-card text-secondary' : 'bg-surface-container text-status-danger-base'" x-text="counts.overdue"></span>
            </button>
            <button type="button" @click="tab='done'; selectedIndex=0"
                    class="px-space-md py-space-xs rounded-lg font-label-md text-label-md flex items-center gap-space-xs transition-colors whitespace-nowrap"
                    :class="tab==='done' ? 'bg-secondary text-on-secondary shadow-sm' : 'bg-surface-subtle hover:bg-surface-container text-text-secondary'">
                <span>Selesai / Lunas</span>
                <span class="px-space-xs py-0.5 rounded-full font-tabular-numeric text-label-sm" :class="tab==='done' ? 'bg-surface-card text-secondary' : 'bg-surface-container text-text-secondary'" x-text="counts.done"></span>
            </button>
            <button type="button" @click="tab='new'; selectedIndex=0"
                    class="px-space-md py-space-xs rounded-lg font-label-md text-label-md flex items-center gap-space-xs transition-colors whitespace-nowrap"
                    :class="tab==='new' ? 'bg-secondary text-on-secondary shadow-sm' : 'bg-surface-subtle hover:bg-surface-container text-text-secondary'">
                <span>Baru Ditambahkan</span>
                <span class="px-space-xs py-0.5 rounded-full font-tabular-numeric text-label-sm" :class="tab==='new' ? 'bg-surface-card text-secondary' : 'bg-surface-container text-text-secondary'" x-text="counts.new"></span>
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-space-md items-center">
            <div class="md:col-span-5 relative">
                <span class="material-symbols-outlined absolute left-space-md top-1/2 -translate-y-1/2 text-text-tertiary text-[18px]">search</span>
                <input type="text" x-model="query"
                       placeholder="Cari nama pelanggan, nomor WhatsApp (+62), email, atau ID..."
                       class="w-full pl-10 pr-space-md py-space-sm bg-surface-subtle rounded-lg font-body-sm text-body-sm text-text-primary placeholder:text-text-tertiary focus:outline-none focus:bg-surface-card">
            </div>
            <div class="md:col-span-2">
                <select x-model="category"
                        class="w-full px-space-md py-space-sm bg-surface-subtle rounded-lg font-body-sm text-body-sm text-text-primary focus:outline-none focus:bg-surface-card border-0">
                    <option value="">Semua Kategori</option>
                    <option value="Siswa Aktif">SPP / Pendidikan</option>
                    <option value="Langganan">Langganan Jasa</option>
                    <option value="Koperasi">Koperasi &amp; Anggota</option>
                    <option value="Enterprise">B2B Corporate</option>
                </select>
            </div>
            <div class="md:col-span-2">
                <select x-model="waStatus"
                        class="w-full px-space-md py-space-sm bg-surface-subtle rounded-lg font-body-sm text-body-sm text-text-primary focus:outline-none focus:bg-surface-card border-0">
                    <option value="">Status WhatsApp</option>
                    <option value="Aktif">Terverifikasi (WABA)</option>
                    <option value="Validasi">Menunggu Validasi</option>
                    <option value="Gagal">Gagal Terkirim</option>
                </select>
            </div>
            <div class="md:col-span-2">
                <select x-model="method"
                        class="w-full px-space-md py-space-sm bg-surface-subtle rounded-lg font-body-sm text-body-sm text-text-primary focus:outline-none focus:bg-surface-card border-0">
                    <option value="">Metode Duitku</option>
                    <option value="account_balance">Virtual Account</option>
                    <option value="qr_code_2">QRIS Dinamis</option>
                </select>
            </div>
            <div class="md:col-span-2 flex items-center gap-space-xs md:justify-end">
                <button type="button" @click="resetFilters()" title="Reset filter"
                        class="p-space-sm rounded-lg text-text-tertiary hover:text-text-primary hover:bg-surface-container transition-colors">
                    <span class="material-symbols-outlined text-[20px]">filter_alt_off</span>
                </button>
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
            </div>
        </div>
    </div>

    {{-- ===== Table + Drawer ===== --}}
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-space-lg items-start">

        {{-- Table --}}
        <div class="xl:col-span-8 bg-surface-card rounded-xl shadow-sm overflow-hidden flex flex-col">
            {{-- Mode Tabel --}}
            <template x-if="viewMode === 'table'">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-surface-subtle text-text-secondary font-label-md text-label-md uppercase tracking-wider">
                            <th class="py-space-md px-space-lg font-label-md text-label-md">Pelanggan</th>
                            <th class="py-space-md px-space-lg font-label-md text-label-md">Kontak &amp; WhatsApp</th>
                            <th class="py-space-md px-space-lg font-label-md text-label-md">Tagihan &amp; Tenor</th>
                            <th class="py-space-md px-space-lg font-label-md text-label-md">Status &amp; Metode</th>
                            <th class="py-space-md px-space-lg font-label-md text-label-md text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="(c, index) in filtered" :key="c.id">
                            <tr @click="select(index)"
                                class="hover:bg-surface-container-low transition-colors cursor-pointer"
                                :class="index === selectedIndex ? 'bg-surface-container-low/60' : (c.overdue ? 'bg-status-danger-bg/20' : '')">
                                {{-- Pelanggan --}}
                                <td class="py-space-md px-space-lg align-top">
                                    <div class="flex items-center gap-space-md">
                                        <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0 shadow-sm font-headline-sm text-headline-sm"
                                             :class="c.avatar ? (c.avatar.bg + ' ' + (c.avatar.text||'text-on-secondary')) : 'bg-secondary text-on-secondary'">
                                            <span x-text="c.initials"></span>
                                        </div>
                                        <div class="flex flex-col min-w-0">
                                            <span class="font-headline-sm text-headline-sm text-text-primary truncate" x-text="c.name"></span>
                                            <span class="font-tabular-numeric text-body-sm text-text-tertiary" x-text="c.id"></span>
                                            <span class="font-body-sm text-body-sm text-text-secondary" x-text="'Join: ' + c.join_at"></span>
                                        </div>
                                    </div>
                                </td>
                                {{-- Kontak & WhatsApp --}}
                                <td class="py-space-md px-space-lg align-top">
                                    <div class="flex flex-col gap-space-xs">
                                        <div class="flex items-center gap-space-xs">
                                            <span class="font-tabular-numeric text-label-md text-text-primary" x-text="c.phone"></span>
                                            <template x-if="c.wa">
                                                <span class="inline-flex items-center px-1.5 py-0.5 rounded-full font-label-sm text-label-sm"
                                                      :class="c.wa.tone==='success' ? 'bg-status-success-bg text-status-success-base' : 'bg-status-warning-bg text-status-warning-base'">
                                                    <span class="material-symbols-outlined text-[12px] mr-0.5" x-text="c.wa.tone==='success' ? 'check_circle' : 'warning'"></span>
                                                    <span x-text="c.wa.status"></span>
                                                </span>
                                            </template>
                                        </div>
                                        <span class="font-body-sm text-body-sm text-text-tertiary truncate" x-text="c.email || '—'"></span>
                                        <template x-if="c.overdue">
                                            <a href="#" @click.prevent @click.stop
                                               class="inline-flex items-center gap-space-2xs text-status-danger-base hover:underline font-semibold font-body-sm text-body-sm">
                                                <span class="material-symbols-outlined text-[14px]">notification_important</span>
                                                Ingatkan via WA
                                            </a>
                                        </template>
                                        <template x-if="!c.overdue">
                                            <a href="#" @click.prevent @click.stop
                                               class="inline-flex items-center gap-space-2xs text-secondary hover:underline font-body-sm text-body-sm">
                                                <span class="material-symbols-outlined text-[14px]">chat</span>
                                                Kirim Pesan
                                            </a>
                                        </template>
                                    </div>
                                </td>
                                {{-- Tagihan & Tenor --}}
                                <td class="py-space-md px-space-lg align-top">
                                    <template x-if="c.invoice">
                                        <div class="flex flex-col gap-space-xs">
                                            <span class="font-label-md text-label-md text-text-primary" x-text="c.invoice"></span>
                                            <div class="flex items-center justify-between text-body-sm font-body-sm text-text-secondary">
                                                <span x-text="c.termin_text || ('Termin ' + c.termin_now + ' / ' + c.termin_total)"></span>
                                                <span class="font-tabular-numeric font-semibold text-text-primary" :class="c.amount_tone || ''" x-text="c.amount"></span>
                                            </div>
                                            <div class="w-full bg-surface-subtle h-1.5 rounded-full overflow-hidden">
                                                <div class="h-full rounded-full" :class="c.progress_color" :style="'width:' + c.progress + '%'"></div>
                                            </div>
                                            <span class="font-body-sm text-body-sm text-text-tertiary" x-text="c.total"></span>
                                        </div>
                                    </template>
                                    <template x-if="!c.invoice">
                                        <div class="flex flex-col gap-space-2xs">
                                            <span class="font-body-sm text-body-sm italic text-text-tertiary">Belum Ada Tagihan</span>
                                            <span class="font-body-sm text-body-sm text-text-tertiary">Siap dibuatkan jadwal tenor</span>
                                        </div>
                                    </template>
                                </td>
                                {{-- Status & Metode --}}
                                <td class="py-space-md px-space-lg align-top">
                                    <div class="flex flex-col gap-space-xs">
                                        <span class="inline-flex items-center gap-space-xs px-space-sm py-space-2xs rounded-full font-label-sm text-label-sm self-start"
                                              :class="c.status.bg + ' ' + c.status.text">
                                            <span class="w-1.5 h-1.5 rounded-full" :class="c.status.dot"></span>
                                            <span x-text="c.status.label"></span>
                                        </span>
                                        <div class="flex items-center gap-space-xs text-text-secondary font-body-sm text-body-sm pt-0.5">
                                            <span class="material-symbols-outlined text-[16px] text-text-tertiary" x-text="c.method ? c.method.icon : 'account_balance'"></span>
                                            <span x-text="c.method ? c.method.label : '—'"></span>
                                        </div>
                                    </div>
                                </td>
                                {{-- Aksi --}}
                                <td class="py-space-md px-space-lg align-top">
                                    <template x-if="c.action === 'create'">
                                        <a :href="'{{ route('admin.invoices.create') }}'"
                                           class="inline-flex items-center gap-space-2xs px-space-sm py-1 bg-secondary text-on-secondary rounded-lg font-label-sm text-label-sm shadow-sm hover:bg-secondary-container transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">add_circle</span>
                                            Buat Tagihan
                                        </a>
                                    </template>
                                    <template x-if="c.action !== 'create'">
                                        <div class="flex items-center justify-end gap-space-xs" @click.stop>
                                            <button type="button" title="Lihat Profil &amp; Riwayat" class="p-space-xs text-secondary hover:bg-surface-container rounded-lg transition-colors">
                                                <span class="material-symbols-outlined text-[20px]">visibility</span>
                                            </button>
                                            <a :href="'{{ route('admin.invoices.create') }}'" title="Buat Tagihan Baru" class="p-space-xs text-secondary hover:bg-surface-container rounded-lg transition-colors">
                                                <span class="material-symbols-outlined text-[20px]">post_add</span>
                                            </a>
                                            <button type="button" title="Menu Opsi" class="p-space-xs text-secondary hover:bg-surface-container rounded-lg transition-colors">
                                                <span class="material-symbols-outlined text-[20px]">more_vert</span>
                                            </button>
                                        </div>
                                    </template>
                                </td>
                            </tr>
                        </template>
                        <tr x-show="filtered.length === 0">
                            <td colspan="5" class="py-space-2xl px-space-lg text-center">
                                <div class="flex flex-col items-center gap-space-sm text-text-tertiary">
                                    <span class="material-symbols-outlined text-[40px]">search_off</span>
                                    <span class="font-body-md text-body-md">Tidak ada pelanggan yang cocok dengan filter.</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </template>

            {{-- Mode Kartu --}}
            <template x-if="viewMode === 'cards'">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-space-lg p-space-lg">
                <template x-for="(c, index) in filtered" :key="c.id">
                <div class="bg-surface-card border border-surface-border rounded-xl shadow-sm p-space-lg flex flex-col gap-space-md transition-all hover:shadow-md hover:border-secondary/40 cursor-pointer"
                     @click="select(index)"
                     :class="c.overdue ? 'border-status-danger-bg' : ''">
                    {{-- Header: avatar + nama + status --}}
                    <div class="flex items-start justify-between gap-space-sm">
                        <div class="flex items-center gap-space-md min-w-0">
                            <div class="w-11 h-11 rounded-full flex items-center justify-center shrink-0 shadow-sm font-headline-sm text-headline-sm"
                                 :class="c.avatar ? (c.avatar.bg + ' ' + (c.avatar.text||'text-on-secondary')) : 'bg-secondary text-on-secondary'">
                                <span x-text="c.initials"></span>
                            </div>
                            <div class="flex flex-col min-w-0">
                                <span class="font-headline-sm text-headline-sm text-text-primary truncate" x-text="c.name"></span>
                                <span class="font-tabular-numeric text-body-sm text-text-tertiary" x-text="c.id"></span>
                                <span class="font-body-sm text-body-sm text-text-secondary" x-text="'Join: ' + c.join_at"></span>
                            </div>
                        </div>
                        <template x-if="c.status">
                            <span class="inline-flex items-center gap-space-xs px-space-sm py-0.5 rounded-full font-label-sm text-label-sm shrink-0"
                                  :class="c.status.bg + ' ' + c.status.text">
                                <span class="w-1.5 h-1.5 rounded-full" :class="c.status.dot"></span>
                                <span x-text="c.status.label"></span>
                            </span>
                        </template>
                    </div>

                    {{-- Kontak & WhatsApp --}}
                    <div class="flex flex-col gap-space-xs">
                        <div class="flex items-center justify-between gap-space-xs">
                            <span class="font-tabular-numeric text-label-md text-text-primary" x-text="c.phone"></span>
                            <template x-if="c.wa">
                                <span class="inline-flex items-center px-1.5 py-0.5 rounded-full font-label-sm text-label-sm shrink-0"
                                      :class="c.wa.tone==='success' ? 'bg-status-success-bg text-status-success-base' : 'bg-status-warning-bg text-status-warning-base'">
                                    <span class="material-symbols-outlined text-[12px] mr-0.5" x-text="c.wa.tone==='success' ? 'check_circle' : 'warning'"></span>
                                    <span x-text="c.wa.status"></span>
                                </span>
                            </template>
                        </div>
                        <span class="font-body-sm text-body-sm text-text-tertiary truncate" x-text="c.email || '—'"></span>
                    </div>

                    {{-- Tagihan & Tenor --}}
                    <template x-if="c.invoice">
                        <div class="flex flex-col gap-space-xs">
                            <div class="flex items-center justify-between gap-space-xs">
                                <span class="font-label-md text-label-md text-text-primary truncate" x-text="c.invoice"></span>
                                <span class="text-text-secondary font-tabular-numeric font-label-sm text-label-sm whitespace-nowrap" x-text="c.termin_text || ('Termin ' + c.termin_now + ' / ' + c.termin_total)"></span>
                            </div>
                            <div class="flex items-center justify-between text-body-sm font-body-sm text-text-secondary">
                                <span x-text="c.total"></span>
                                <span class="font-tabular-numeric font-semibold text-text-primary" :class="c.amount_tone || ''" x-text="c.amount"></span>
                            </div>
                            <div class="w-full bg-surface-subtle h-1.5 rounded-full overflow-hidden">
                                <div class="h-full rounded-full" :class="c.progress_color" :style="'width:' + c.progress + '%'"></div>
                            </div>
                        </div>
                    </template>
                    <template x-if="!c.invoice">
                        <div class="flex flex-col gap-space-2xs bg-surface-subtle rounded-lg px-space-md py-space-sm">
                            <span class="font-body-sm text-body-sm italic text-text-tertiary">Belum Ada Tagihan</span>
                            <span class="font-body-sm text-body-sm text-text-tertiary">Siap dibuatkan jadwal tenor</span>
                        </div>
                    </template>

                    {{-- Footer: tindakan --}}
                    <div class="flex items-center justify-between gap-space-sm pt-space-2xs border-t border-surface-border mt-auto">
                        <div class="flex items-center gap-space-xs text-text-secondary font-body-sm text-body-sm min-w-0">
                            <template x-if="c.overdue">
                                <a href="#" @click.prevent @click.stop
                                   class="inline-flex items-center gap-space-2xs text-status-danger-base hover:underline font-semibold">
                                    <span class="material-symbols-outlined text-[14px]">notification_important</span>
                                    Ingatkan via WA
                                </a>
                            </template>
                            <template x-if="!c.overdue">
                                <a href="#" @click.prevent @click.stop
                                   class="inline-flex items-center gap-space-2xs text-secondary hover:underline">
                                    <span class="material-symbols-outlined text-[14px]">chat</span>
                                    Kirim Pesan
                                </a>
                            </template>
                        </div>
                        <div class="flex items-center gap-space-xs shrink-0">
                            <template x-if="c.action === 'create'">
                                <a :href="'{{ route('admin.invoices.create') }}'"
                                   class="inline-flex items-center gap-space-2xs px-space-sm py-1 bg-secondary text-on-secondary rounded-lg font-label-sm text-label-sm shadow-sm hover:bg-secondary-container transition-colors">
                                    <span class="material-symbols-outlined text-[16px]">add_circle</span>
                                    Buat Tagihan
                                </a>
                            </template>
                            <template x-if="c.action !== 'create'">
                                <div class="flex items-center gap-space-xs" @click.stop>
                                    <button type="button" title="Lihat Profil &amp; Riwayat" class="p-space-xs text-secondary hover:bg-surface-container rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">visibility</span>
                                    </button>
                                    <a :href="'{{ route('admin.invoices.create') }}'" title="Buat Tagihan Baru" class="p-space-xs text-secondary hover:bg-surface-container rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">post_add</span>
                                    </a>
                                    <button type="button" title="Menu Opsi" class="p-space-xs text-secondary hover:bg-surface-container rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">more_vert</span>
                                    </button>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
                </template>
                <div x-show="filtered.length === 0" class="col-span-full flex flex-col items-center gap-space-sm text-text-tertiary py-space-2xl">
                    <span class="material-symbols-outlined text-[40px]">search_off</span>
                    <span class="font-body-md text-body-md">Tidak ada pelanggan yang cocok dengan filter.</span>
                </div>
            </div>
            </template>

            {{-- Pagination --}}
            <div class="p-space-lg bg-surface-subtle flex flex-col sm:flex-row sm:items-center sm:justify-between gap-space-md">
                <div class="font-body-sm text-body-sm text-text-secondary">
                    Menampilkan <span class="font-semibold text-text-primary" x-text="'1 - ' + filtered.length"></span> dari
                    <span class="font-semibold text-text-primary">1.428</span> pelanggan
                    <span class="hidden md:inline text-text-tertiary">•</span>
                    <span class="hidden md:inline-flex items-center gap-space-2xs text-status-success-base">
                        <span class="material-symbols-outlined text-[16px]">lock</span>
                        Enkripsi ISO 27001 &amp; Duitku Merchant Safe
                    </span>
                </div>
                <div class="flex items-center gap-space-2xs">
                    <button type="button" disabled class="px-space-sm py-1 rounded font-label-sm text-label-sm bg-surface-card text-text-tertiary shadow-sm">
                        <span class="material-symbols-outlined text-[18px]">chevron_left</span>
                    </button>
                    <button type="button" class="px-space-sm py-1 rounded font-label-sm text-label-sm bg-secondary text-on-secondary shadow-sm">1</button>
                    <button type="button" class="px-space-sm py-1 rounded font-label-sm text-label-sm bg-surface-card hover:bg-surface-container text-text-secondary shadow-sm">2</button>
                    <button type="button" class="px-space-sm py-1 rounded font-label-sm text-label-sm bg-surface-card hover:bg-surface-container text-text-secondary shadow-sm">3</button>
                    <span class="font-label-sm text-label-sm text-text-tertiary px-space-2xs">...</span>
                    <button type="button" class="px-space-sm py-1 rounded font-label-sm text-label-sm bg-surface-card hover:bg-surface-container text-text-secondary shadow-sm">238</button>
                    <button type="button" class="px-space-sm py-1 rounded font-label-sm text-label-sm bg-surface-card hover:bg-surface-container text-text-secondary shadow-sm">
                        <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                    </button>
                </div>
            </div>
        </div>

        {{-- Quick Preview Drawer --}}
        <div class="xl:col-span-4 bg-surface-card rounded-xl shadow-sm p-space-xl sticky top-20 flex flex-col gap-space-lg">
            {{-- Profile header --}}
            <div class="flex items-start justify-between gap-space-md">
                <div class="flex items-center gap-space-md min-w-0">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center shrink-0 shadow-sm font-headline-md text-headline-md"
                         :class="active ? (active.avatar ? (active.avatar.bg + ' ' + (active.avatar.text||'text-on-secondary')) : 'bg-secondary text-on-secondary') : 'bg-surface-container text-text-tertiary'">
                        <span x-text="active ? active.initials : '—'"></span>
                    </div>
                    <div class="flex flex-col min-w-0">
                        <span class="font-headline-md text-headline-md text-text-primary truncate" x-text="active ? active.name : 'Pilih Pelanggan'"></span>
                        <span class="font-tabular-numeric text-body-sm text-text-tertiary" x-text="active ? active.id : ''"></span>
                        <span class="font-body-sm text-body-sm text-text-secondary" x-text="active ? active.phone : 'Klik baris tabel untuk pratinjau.'"></span>
                    </div>
                </div>
                <template x-if="active && active.status">
                    <span class="inline-flex items-center gap-space-xs px-space-sm py-space-2xs rounded-full font-label-sm text-label-sm whitespace-nowrap"
                          :class="active.status.bg + ' ' + active.status.text">
                        <span class="w-1.5 h-1.5 rounded-full" :class="active.status.dot"></span>
                        <span x-text="active.status.label"></span>
                    </span>
                </template>
            </div>

            <div class="flex items-center gap-space-sm">
                <button type="button" @click.stop
                        x-data="clipboard('Tautan portal disalin!')"
                        @click="copy('{{ route('portal.detail', ['token' => $token]) }}', 'Tautan portal disalin!')"
                        class="flex-1 inline-flex items-center justify-center gap-space-xs px-space-md py-space-sm rounded-lg bg-surface-subtle hover:bg-surface-container text-text-primary font-label-md text-label-md transition-colors">
                    <span class="material-symbols-outlined text-[18px]">content_copy</span>
                    <span>Salin Tautan</span>
                </button>
                <button type="button" @click="window.AlpineifyToast?.('Pesan otomatis telah diantrekan ke antrean WhatsApp Gateway!')"
                        class="flex-1 inline-flex items-center justify-center gap-space-xs px-space-md py-space-sm rounded-lg bg-secondary hover:bg-secondary-container text-on-secondary font-label-md text-label-md transition-colors">
                    <span class="material-symbols-outlined text-[18px]">send</span>
                    <span>Kirim Ulang WA</span>
                </button>
            </div>

            <div class="h-px bg-surface-border"></div>

            {{-- Jadwal Angsuran Terkini --}}
            <div class="flex flex-col gap-space-md">
                <div class="flex items-center justify-between">
                    <span class="font-headline-sm text-headline-sm text-text-primary">Jadwal Angsuran Terkini</span>
                </div>

                <template x-if="active && active.schedule && active.schedule.length > 0">
                    <div class="flex flex-col gap-space-sm">
                        <template x-for="(s, i) in active.schedule" :key="i">
                            <div class="flex items-center justify-between p-space-sm rounded-lg text-body-sm" :class="s.bg">
                                <div class="flex items-center gap-space-sm">
                                    <span class="material-symbols-outlined text-[18px]" :class="s.color" x-text="s.icon"></span>
                                    <div class="flex flex-col">
                                        <span class="font-label-md text-label-md text-text-primary" x-text="s.term"></span>
                                        <span class="font-body-sm text-body-sm" :class="s.color" x-text="s.sub"></span>
                                    </div>
                                </div>
                                <span class="font-tabular-numeric font-semibold" :class="s.color" x-text="s.amount"></span>
                            </div>
                        </template>
                    </div>
                </template>

                <template x-if="!(active && active.schedule && active.schedule.length > 0)">
                    <div class="flex flex-col items-center gap-space-2xs text-center py-space-lg text-text-tertiary">
                        <span class="material-symbols-outlined text-[32px]">event_note</span>
                        <span class="font-body-sm text-body-sm">Belum ada jadwal angsuran.</span>
                    </div>
                </template>

                <div class="flex flex-col gap-space-xs pt-space-xs">
                    <a href="#" @click.prevent @click.stop class="flex items-center gap-space-sm p-space-sm rounded-lg bg-surface-subtle hover:bg-surface-container text-text-primary font-label-md text-label-md transition-colors">
                        <span class="material-symbols-outlined text-[18px] text-secondary">account_balance_wallet</span>
                        <span>Buka Ledger Lengkap Nasabah</span>
                        <span class="material-symbols-outlined ml-auto text-[18px] text-text-tertiary">arrow_forward</span>
                    </a>
                    <a :href="'{{ route('admin.invoices.create') }}'" class="flex items-center gap-space-sm p-space-sm rounded-lg bg-surface-subtle hover:bg-surface-container text-text-primary font-label-md text-label-md transition-colors">
                        <span class="material-symbols-outlined text-[18px] text-secondary">add_task</span>
                        <span>Buat Tagihan Baru untuk Pelanggan Ini</span>
                        <span class="material-symbols-outlined ml-auto text-[18px] text-text-tertiary">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== Tambah Pelanggan Modal ===== --}}
    <div x-show="addOpen"
         x-cloak
         x-transition.opacity.duration.200ms
         class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm flex items-center justify-center p-space-md">
        <div class="bg-surface-card rounded-2xl max-w-lg w-full p-space-2xl shadow-2xl flex flex-col gap-space-lg relative" @click.outside="addOpen=false">
            <button type="button" @click="addOpen=false" class="absolute top-space-md right-space-md p-space-xs rounded-lg text-text-tertiary hover:text-text-primary hover:bg-surface-container transition-colors">
                <span class="material-symbols-outlined text-[20px]">close</span>
            </button>

            <div class="flex items-center gap-space-md">
                <div class="w-9 h-9 rounded-lg bg-surface-container text-secondary flex items-center justify-center">
                    <span class="material-symbols-outlined text-[20px]">person_add</span>
                </div>
                <div class="flex flex-col">
                    <span class="font-headline-md text-headline-md text-text-primary">Tambah Pelanggan Baru</span>
                    <span class="font-body-sm text-body-sm text-text-tertiary">Registrasi kontak &amp; aktivasi payment token</span>
                </div>
            </div>

            <form @submit.prevent="submitNewCustomer()" class="flex flex-col gap-space-lg">
                <div class="flex flex-col gap-space-xs">
                    <label class="font-label-md text-label-md text-text-primary">Nama Lengkap Sesuai Rekening / KTP</label>
                    <input type="text" required x-model="form.name" placeholder="Contoh: Muhammad Rayhan"
                           class="px-space-md py-space-sm bg-surface-subtle rounded-lg font-body-sm text-body-sm text-text-primary placeholder:text-text-tertiary focus:outline-none focus:bg-surface-card shadow-inner">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
                    <div class="flex flex-col gap-space-xs">
                        <label class="font-label-md text-label-md text-text-primary">Nomor WhatsApp (E.164)</label>
                        <input type="text" x-model="form.phone" placeholder="+62 812-XXXX-XXXX"
                               class="px-space-md py-space-sm bg-surface-subtle rounded-lg font-body-sm text-body-sm text-text-primary placeholder:text-text-tertiary focus:outline-none focus:bg-surface-card shadow-inner">
                    </div>
                    <div class="flex flex-col gap-space-xs">
                        <label class="font-label-md text-label-md text-text-primary">Kategori Pelanggan</label>
                        <select x-model="form.category"
                                class="px-space-md py-space-sm bg-surface-subtle rounded-lg font-body-sm text-body-sm text-text-primary focus:outline-none focus:bg-surface-card shadow-inner border-0">
                            <option value="">Pilih kategori</option>
                            <option value="Siswa Aktif">Pendidikan / Siswa SPP</option>
                            <option value="Langganan">Langganan Jasa Rutin</option>
                            <option value="Koperasi">Koperasi Simpan Pinjam</option>
                            <option value="Enterprise">B2B Corporate</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-col gap-space-xs">
                    <label class="font-label-md text-label-md text-text-primary">Alamat Email (Untuk Tembusan PDF)</label>
                    <input type="email" x-model="form.email" placeholder="nama@email.com (opsional)"
                           class="px-space-md py-space-sm bg-surface-subtle rounded-lg font-body-sm text-body-sm text-text-primary placeholder:text-text-tertiary focus:outline-none focus:bg-surface-card shadow-inner">
                </div>
                <div class="flex flex-col gap-space-xs">
                    <label class="font-label-md text-label-md text-text-primary">Preferensi Gateway Duitku</label>
                    <select x-model="form.gateway"
                            class="px-space-md py-space-sm bg-surface-subtle rounded-lg font-body-sm text-body-sm text-text-primary focus:outline-none focus:bg-surface-card shadow-inner border-0">
                        <option value="Virtual Account">BCA Virtual Account (Otomatis)</option>
                        <option value="Virtual Account">Mandiri Virtual Account</option>
                        <option value="Virtual Account">BRI Virtual Account</option>
                        <option value="Virtual Account">BNI Virtual Account</option>
                        <option value="QRIS Dinamis">QRIS Dinamis Realtime</option>
                    </select>
                </div>

                <div class="pt-space-sm flex items-center justify-end gap-space-sm">
                    <button type="button" @click="addOpen=false" class="px-space-md py-space-sm rounded-lg bg-surface-subtle hover:bg-surface-container text-text-secondary font-label-md text-label-md transition-colors">
                        Batalkan
                    </button>
                    <button type="submit" class="px-space-md py-space-sm rounded-lg bg-secondary hover:bg-secondary-container text-on-secondary font-label-lg text-label-lg shadow-sm transition-colors">
                        Simpan Pelanggan
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
