@extends('layouts.admin')

@section('content')
<div class="flex flex-col w-full gap-space-2xl" x-data="modal">
<!-- Top Operational Banner & Meta Metrics -->
<div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-space-lg bg-surface-card p-space-xl rounded-xl shadow-sm">
<div class="flex flex-col gap-space-xs">
<div class="flex items-center gap-space-sm flex-wrap">
<span class="font-headline-md text-headline-md text-text-primary">WhatsApp Automation &amp; Delivery Logs</span>
<span class="inline-flex items-center gap-1.5 px-space-sm py-space-2xs rounded-full bg-status-success-bg text-status-success-base font-label-sm text-label-sm">
<span class="w-2 h-2 rounded-full bg-status-success-base animate-pulse"></span>
          WABA Cloud API Connected
        </span>
<span class="inline-flex items-center gap-1 px-space-sm py-space-2xs rounded-full bg-status-info-bg text-status-info-base font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[14px]">verified</span> Meta Tier 1
        </span>
</div>
<p class="font-body-sm text-body-sm text-text-secondary">
        Mesin orkestrasi notifikasi otomatis invoice, reminder jatuh tempo, serta kuitansi pembayaran via webhook terenkripsi.
      </p>
</div>
<div class="flex items-center gap-space-md w-full md:w-auto">
<button class="inline-flex items-center justify-center gap-space-xs px-space-lg py-space-sm rounded-lg bg-surface-subtle text-text-primary hover:bg-surface-container-high transition-colors font-label-md text-label-md" @click="show()" type="button">
<span class="material-symbols-outlined text-[18px]">send</span>
<span>Test Kirim Pesan</span>
</button>
<button class="inline-flex items-center justify-center gap-space-xs px-space-lg py-space-sm rounded-lg bg-secondary text-on-secondary hover:bg-secondary-container transition-colors font-label-md text-label-md" type="button">
<span class="material-symbols-outlined text-[18px]">rule_settings</span>
<span>Kelola Template WABA</span>
</button>
</div>
</div>
<!-- Telemetry Bar -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-space-md">
<div class="bg-surface-card p-space-lg rounded-xl shadow-sm flex items-center justify-between">
<div class="flex flex-col gap-space-2xs">
<span class="font-label-sm text-label-sm text-text-tertiary uppercase">Kuota Terpakai Hari Ini</span>
<span class="font-display-currency text-[24px] leading-8 text-text-primary">84 <span class="font-body-sm text-body-sm text-text-tertiary font-normal">/ 1.000 pesan</span></span>
<span class="font-body-sm text-body-sm text-status-success-base">Sisa 916 pesan (Tier 1)</span>
</div>
<div class="w-12 h-12 rounded-xl bg-status-info-bg text-status-info-base flex items-center justify-center">
<span class="material-symbols-outlined text-[24px]">mark_chat_read</span>
</div>
</div>
<div class="bg-surface-card p-space-lg rounded-xl shadow-sm flex items-center justify-between">
<div class="flex flex-col gap-space-2xs">
<span class="font-label-sm text-label-sm text-text-tertiary uppercase">Quality Rating Meta</span>
<div class="flex items-center gap-space-xs">
<span class="w-2.5 h-2.5 rounded-full bg-status-success-base"></span>
<span class="font-headline-sm text-headline-sm text-status-success-base font-semibold">Tinggi (High)</span>
</div>
<span class="font-body-sm text-body-sm text-text-secondary">Blokir &lt; 0.1% pelanggan</span>
</div>
<div class="w-12 h-12 rounded-xl bg-status-success-bg text-status-success-base flex items-center justify-center">
<span class="material-symbols-outlined text-[24px]">format_image_left</span>
</div>
</div>
<div class="bg-surface-card p-space-lg rounded-xl shadow-sm flex items-center justify-between">
<div class="flex flex-col gap-space-2xs">
<span class="font-label-sm text-label-sm text-text-tertiary uppercase">Tingkat Baca (Read Rate)</span>
<span class="font-display-currency text-[24px] leading-8 text-text-primary">96.8%</span>
<span class="font-body-sm text-body-sm text-text-secondary">Rata-rata respons 4.2 mnt</span>
</div>
<div class="w-12 h-12 rounded-xl bg-surface-subtle text-brand-indigo flex items-center justify-center">
<span class="material-symbols-outlined text-[24px]">visibility</span>
</div>
</div>
<div class="bg-surface-card p-space-lg rounded-xl shadow-sm flex items-center justify-between">
<div class="flex flex-col gap-space-2xs">
<span class="font-label-sm text-label-sm text-text-tertiary uppercase">Gagal Kirim (Perlu Aksi)</span>
<span class="font-display-currency text-[24px] leading-8 text-error">1 <span class="font-body-sm text-body-sm text-text-tertiary font-normal">antrean</span></span>
<span class="font-body-sm text-body-sm text-error">No. tujuan tidak aktif</span>
</div>
<div class="w-12 h-12 rounded-xl bg-status-danger-bg text-status-danger-base flex items-center justify-center">
<span class="material-symbols-outlined text-[24px]">error_outline</span>
</div>
</div>
</div>
<!-- Main 12-Col Workspace -->
<div class="grid grid-cols-1 xl:grid-cols-12 gap-space-xl items-start">
<!-- LEFT COLUMN: Col-5 Template Manager & Live Smartphone Mockup -->
<section class="xl:col-span-5 flex flex-col gap-space-xl" x-data="templatePreview(@js($templatesData), @js($sampleValues))">
<div class="bg-surface-card rounded-xl shadow-sm overflow-hidden">
<div class="p-space-lg bg-surface-card flex items-center justify-between">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-[22px] text-secondary">tune</span>
<h2 class="font-headline-sm text-headline-sm text-text-primary">Konfigurasi Template (wa_templates)</h2>
</div>
<span class="font-label-sm text-label-sm text-text-tertiary">5 Kategori</span>
</div>
<!-- Template Selector Tabs -->
<div class="px-space-md py-space-xs bg-surface-subtle overflow-x-auto flex gap-space-xs">
<button class="px-space-md py-space-xs rounded-lg font-label-sm text-label-sm whitespace-nowrap transition-colors" @click="select('h3')" :class="isActive('h3') ? 'bg-secondary text-on-secondary' : 'text-text-secondary hover:text-text-primary'" type="button">H-3 Pengingat</button>
<button class="px-space-md py-space-xs rounded-lg font-label-sm text-label-sm whitespace-nowrap text-text-secondary hover:text-text-primary transition-colors" id="tab-dday" onclick="switchTemplate('dday')" type="button">
            Hari-H Tempo
          </button>
<button class="px-space-md py-space-xs rounded-lg font-label-sm text-label-sm whitespace-nowrap text-text-secondary hover:text-text-primary transition-colors" id="tab-overdue" onclick="switchTemplate('overdue')" type="button">
            Overdue H+3/7
          </button>
<button class="px-space-md py-space-xs rounded-lg font-label-sm text-label-sm whitespace-nowrap text-text-secondary hover:text-text-primary transition-colors" id="tab-receipt" onclick="switchTemplate('receipt')" type="button">
            Kuitansi Lunas
          </button>
<button class="px-space-md py-space-xs rounded-lg font-label-sm text-label-sm whitespace-nowrap text-text-secondary hover:text-text-primary transition-colors" id="tab-newinv" onclick="switchTemplate('newinv')" type="button">
            Invoice Baru
          </button>
</div>
<!-- Editor Body -->
<div class="p-space-lg flex flex-col gap-space-lg">
<div class="flex items-center justify-between">
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-text-primary" class="font-label-lg text-label-lg text-text-primary" x-text="active.title">Template H-3: Pengingat Awal Jatuh Tempo</span>
<span class="font-body-sm text-body-sm text-text-tertiary" class="font-body-sm text-body-sm text-text-tertiary" x-text="active.code">ID: reminder_h3_formal (Meta ID: 882910419)</span>
</div>
<span class="inline-flex items-center gap-1 px-space-sm py-space-2xs rounded-full bg-status-success-bg text-status-success-base font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-status-success-base"></span> Aktif
            </span>
</div>
<!-- Parameter Chips -->
<div class="flex flex-col gap-space-xs">
<label class="font-label-sm text-label-sm text-text-secondary">Variabel Dinamis Tersedia (Klik untuk salin)</label>
<div class="flex flex-wrap gap-1.5">
<button class="px-space-xs py-1 rounded bg-surface-subtle hover:bg-surface-container text-text-primary font-tabular-numeric text-body-sm" @click="insertVariable('@{{customer_name}}')" type="button"><code>@{{customer_name}}</code></button>
<button class="px-space-xs py-1 rounded bg-surface-subtle hover:bg-surface-container text-text-primary font-tabular-numeric text-body-sm" @click="insertVariable('@{{installment_no}}')" type="button"><code>@{{installment_no}}</code></button>
<button class="px-space-xs py-1 rounded bg-surface-subtle hover:bg-surface-container text-text-primary font-tabular-numeric text-body-sm" @click="insertVariable('@{{tenor_count}}')" type="button"><code>@{{tenor_count}}</code></button>
<button class="px-space-xs py-1 rounded bg-surface-subtle hover:bg-surface-container text-text-primary font-tabular-numeric text-body-sm" @click="insertVariable('@{{invoice_description}}')" type="button"><code>@{{invoice_description}}</code></button>
<button class="px-space-xs py-1 rounded bg-surface-subtle hover:bg-surface-container text-text-primary font-tabular-numeric text-body-sm" @click="insertVariable('@{{due_date}}')" type="button"><code>@{{due_date}}</code></button>
<button class="px-space-xs py-1 rounded bg-surface-subtle hover:bg-surface-container text-text-primary font-tabular-numeric text-body-sm" @click="insertVariable('@{{amount}}')" type="button"><code>@{{amount}}</code></button>
<button class="px-space-xs py-1 rounded bg-surface-subtle hover:bg-surface-container text-text-primary font-tabular-numeric text-body-sm" @click="insertVariable('@{{portal_link}}')" type="button"><code>@{{portal_link}}</code></button>
</div>
</div>
<!-- Editor Area -->
<div class="flex flex-col gap-space-xs">
<div class="flex justify-between items-center">
<label class="font-label-sm text-label-sm text-text-secondary" for="template-editor">Template Text Body (Sync Meta Cloud API)</label>
<span class="font-body-sm text-body-sm text-text-tertiary"><span x-text="charCount"></span> / <span x-text="charLimit"></span> karakter</span>
</div>
<textarea class="w-full p-space-md rounded-lg bg-surface-canvas text-text-primary font-body-sm text-body-sm focus:outline-none focus:bg-surface-card transition-colors resize-none leading-relaxed" id="template-editor" x-model="editorText" x-ref="editor" rows="7"></textarea>
</div>
<!-- Dispatch Schedulers / Cron Config -->
<div class="p-space-md rounded-lg bg-surface-subtle flex flex-col gap-space-md">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-[18px] text-text-secondary">schedule</span>
<span class="font-label-md text-label-md text-text-primary">Pengaturan Mesin Cron Scheduler</span>
</div>
<div class="grid grid-cols-2 gap-space-md">
<div class="flex flex-col gap-space-2xs">
<label class="font-label-sm text-label-sm text-text-tertiary">Jam Kirim Otomatis</label>
<div class="flex items-center bg-surface-card rounded-lg px-space-md py-space-xs">
<span class="material-symbols-outlined text-[16px] text-text-tertiary mr-1.5">alarm</span>
<input class="w-full bg-transparent font-tabular-numeric text-label-md text-text-primary focus:outline-none" type="text" value="08:00 WIB"/>
</div>
</div>
<div class="flex flex-col gap-space-2xs">
<label class="font-label-sm text-label-sm text-text-tertiary">Batas Retry Exp.</label>
<div class="flex items-center bg-surface-card rounded-lg px-space-md py-space-xs">
<span class="material-symbols-outlined text-[16px] text-text-tertiary mr-1.5">replay</span>
<input class="w-full bg-transparent font-tabular-numeric text-label-md text-text-primary focus:outline-none" type="text" value="3x (15m &amp; 60m)"/>
</div>
</div>
</div>
</div>
<!-- Buttons -->
<div class="flex items-center justify-end gap-space-sm pt-space-xs">
<button class="px-space-md py-space-xs rounded-lg text-text-secondary hover:bg-surface-subtle font-label-md text-label-md transition-colors" type="button">
              Reset Default
            </button>
<button class="inline-flex items-center gap-space-xs px-space-lg py-space-xs rounded-lg bg-primary text-on-primary font-label-lg text-label-lg hover:bg-surface-tint transition-colors" @click="window.AlpineifyToast && window.AlpineifyToast('Template berhasil disinkronkan ke Meta WABA Cloud')" type="button">
<span class="material-symbols-outlined text-[18px]">cloud_sync</span>
              Simpan &amp; Sinkron WABA
            </button>
</div>
</div>
</div>
<!-- Live Mobile Smartphone Mockup -->
<div class="bg-surface-card rounded-xl p-space-lg shadow-sm flex flex-col items-center">
<div class="w-full flex items-center justify-between mb-space-md">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-[20px] text-brand-indigo">smartphone</span>
<span class="font-label-lg text-label-lg text-text-primary">Preview Tampilan di WhatsApp Klien</span>
</div>
<span class="font-body-sm text-body-sm text-text-tertiary">Real-time Simulation</span>
</div>
<!-- Phone Shell -->
<div class="w-full max-w-[340px] bg-[#0b141b] rounded-[32px] p-3 shadow-xl">
<div class="w-full bg-[#efeae2] rounded-[24px] overflow-hidden flex flex-col h-[460px] relative">
<!-- WhatsApp Chat Header -->
<div class="bg-[#005d4b] text-white p-space-sm flex items-center justify-between shadow-sm">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-[18px] text-white">arrow_back</span>
<div class="w-7 h-7 rounded-full bg-white/20 flex items-center justify-center font-bold text-[11px] text-white">
                  BK
                </div>
<div class="flex flex-col">
<div class="flex items-center gap-1">
<span class="font-headline-sm text-[13px] leading-tight text-white font-semibold">BayarKilat Official</span>
<span class="material-symbols-outlined text-[13px] text-[#4edea3]" style="font-variation-settings: 'FILL' 1;">verified</span>
</div>
<span class="text-[10px] text-white/80 leading-none">Official Business Account</span>
</div>
</div>
<div class="flex items-center gap-1 text-white/80">
<span class="material-symbols-outlined text-[18px]">videocam</span>
<span class="material-symbols-outlined text-[18px]">call</span>
</div>
</div>
<!-- Chat Date Stamp -->
<div class="flex justify-center my-space-xs">
<span class="px-space-sm py-0.5 rounded-md bg-white/80 text-[10px] font-medium text-[#54656f] shadow-sm">HARI INI</span>
</div>
<!-- WhatsApp Message Bubble -->
<div class="p-space-sm flex flex-col gap-space-xs overflow-y-auto flex-1">
<div class="self-start max-w-[92%] bg-[#d9fdd3] text-[#111b21] p-space-sm rounded-lg rounded-tl-none shadow-sm flex flex-col gap-space-xs relative">
<div class="font-body-sm text-[12px] leading-[17px] whitespace-pre-wrap" x-text="previewText" id="whatsapp-preview-text">Halo Fahmi Ramadhan, ini pengingat ramah bahwa tagihan Kursus Pemrograman Web untuk cicilan ke-1 dari 3 sebesar Rp 1.500.000 akan jatuh tempo pada 15 Februari 2026.

Silakan lakukan pembayaran instan sebelum tanggal tersebut melalui link resmi:
https://bayarkilat.id/pay/tok_99182ab871

Abaikan pesan ini bila telah melunasi.</div>
<!-- Quick Action CTA Button (Interactive Template CTA) -->
<div class="pt-space-2xs flex flex-col gap-1">
<a class="w-full py-1.5 px-space-xs rounded bg-white text-center text-[12px] font-semibold text-[#00a884] shadow-sm flex items-center justify-center gap-1" href="#">
<span class="material-symbols-outlined text-[14px]">payments</span>
                    Buka Tagihan &amp; Bayar
                  </a>
</div>
<div class="self-end flex items-center gap-1 text-[9px] text-[#667781] mt-0.5">
<span>08:00</span>
<span class="material-symbols-outlined text-[13px] text-[#53bdeb]">done_all</span>
</div>
</div>
</div>
<!-- Bottom Chat Bar (Visual only) -->
<div class="bg-[#f0f2f5] p-space-xs flex items-center gap-space-xs">
<div class="flex-1 bg-white rounded-full px-space-sm py-1 text-[11px] text-[#8696a0]">Balas pesan ini...</div>
<div class="w-7 h-7 rounded-full bg-[#00a884] text-white flex items-center justify-center">
<span class="material-symbols-outlined text-[14px]">mic</span>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- RIGHT COLUMN: Col-7 Delivery Logs (wa_logs) -->
<section class="xl:col-span-7 flex flex-col gap-space-lg">
<div class="bg-surface-card rounded-xl shadow-sm p-space-lg flex flex-col gap-space-md">
<!-- Header & Search/Filter Controls -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-md">
<div class="flex flex-col">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-[22px] text-text-primary">receipt_long</span>
<h2 class="font-headline-sm text-headline-sm text-text-primary">Riwayat Log Pengiriman (wa_logs)</h2>
</div>
<span class="font-body-sm text-body-sm text-text-tertiary">Real-time webhook callback &amp; acknowledgement status</span>
</div>
<!-- Status Filter Tabs -->
<div class="flex items-center gap-1 bg-surface-subtle p-1 rounded-lg">
<button class="px-space-sm py-1 rounded text-body-sm font-label-md text-text-primary bg-surface-card shadow-sm" type="button">Semua</button>
<button class="px-space-sm py-1 rounded text-body-sm font-label-md text-text-secondary hover:text-text-primary" type="button">Terkirim</button>
<button class="px-space-sm py-1 rounded text-body-sm font-label-md text-text-secondary hover:text-text-primary" type="button">Dibaca</button>
<button class="px-space-sm py-1 rounded text-body-sm font-label-md text-text-secondary hover:text-text-primary" type="button">Antrean</button>
<button class="px-space-sm py-1 rounded text-body-sm font-label-md text-error hover:bg-status-danger-bg" type="button">Gagal (1)</button>
</div>
</div>
<!-- Mini Search Bar in Logs -->
<div class="flex items-center justify-between gap-space-md">
<div class="relative flex-1 max-w-sm">
<span class="material-symbols-outlined absolute left-space-md top-1/2 -translate-y-1/2 text-text-tertiary text-[18px]">search</span>
<input class="w-full pl-9 pr-space-md py-space-2xs bg-surface-canvas rounded-lg text-text-primary font-body-sm text-body-sm placeholder:text-text-tertiary focus:outline-none focus:bg-surface-subtle" placeholder="Cari wamid, nama, no WhatsApp..." type="text"/>
</div>
<button class="inline-flex items-center gap-space-xs px-space-md py-space-2xs rounded-lg text-text-secondary bg-surface-subtle hover:text-text-primary text-body-sm font-label-md" type="button">
<span class="material-symbols-outlined text-[16px]">file_download</span>
<span>Export CSV</span>
</button>
</div>
<!-- Log List Feed -->
<div class="flex flex-col gap-space-sm">
<!-- Entry 1: READ (Payment Receipt) -->
<div class="p-space-md rounded-xl bg-surface-canvas hover:bg-surface-subtle transition-colors flex flex-col gap-space-xs">
<div class="flex items-center justify-between flex-wrap gap-2">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-full bg-status-success-bg text-status-success-base flex items-center justify-center font-bold text-label-sm">
                  FR
                </div>
<div class="flex flex-col">
<div class="flex items-center gap-space-xs">
<span class="font-label-lg text-label-lg text-text-primary">Fahmi Ramadhan</span>
<span class="font-tabular-numeric text-body-sm text-text-tertiary">+62 812-3456-7890</span>
</div>
<span class="font-body-sm text-body-sm text-text-secondary">Kuitansi Lunas (Payment Confirmation)</span>
</div>
</div>
<!-- Status Badge -->
<div class="flex items-center gap-space-md">
<span class="inline-flex items-center gap-1 px-space-sm py-space-2xs rounded-full bg-status-info-bg text-status-info-base font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[16px] text-status-info-base">done_all</span>
                  Dibaca (Read)
                </span>
<span class="font-tabular-numeric text-body-sm text-text-tertiary">10 Feb 2026, 09:23 WIB</span>
</div>
</div>
<!-- Message Excerpt -->
<p class="font-body-sm text-body-sm text-text-primary bg-surface-card p-space-sm rounded-lg leading-relaxed">
              "Halo <strong>Fahmi Ramadhan</strong> ✅ Pembayaran Anda untuk cicilan ke-2 dari 3 tagihan SPP &amp; Praktikum sebesar <strong>Rp 1.250.000</strong> telah kami terima pada 10 Feb 2026 09:20 WIB. Kuitansi sah digital Anda: https://bayarkilat.id/receipt/rc_8921a9x"
            </p>
<!-- Metadata & Action Footer -->
<div class="flex items-center justify-between text-body-sm pt-space-2xs">
<div class="flex items-center gap-space-md text-text-tertiary font-tabular-numeric text-[11px]">
<span>WAMID: <code class="text-text-secondary">wamid.HBgLMjYxOTE4MjM0NVUA</code></span>
<span>Latency: <strong class="text-status-success-base">1.1s</strong></span>
</div>
<div class="flex items-center gap-space-xs">
<button class="p-1 text-text-tertiary hover:text-text-primary rounded" onclick="copyLogEntry('wamid.HBgLMjYxOTE4MjM0NVUA')" title="Salin ID Pesan" type="button">
<span class="material-symbols-outlined text-[18px]">content_copy</span>
</button>
<button class="inline-flex items-center gap-1 text-secondary hover:text-primary font-label-sm text-label-sm" type="button">
<span class="material-symbols-outlined text-[16px]">refresh</span> Kirim Ulang
                </button>
</div>
</div>
</div>
<!-- Entry 2: FAILED (Overdue Alert - Need Admin Attention) -->
<div class="p-space-md rounded-xl bg-status-danger-bg/40 flex flex-col gap-space-xs">
<div class="flex items-center justify-between flex-wrap gap-2">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-full bg-status-danger-bg text-status-danger-base flex items-center justify-center font-bold text-label-sm">
                  DH
                </div>
<div class="flex flex-col">
<div class="flex items-center gap-space-xs">
<span class="font-label-lg text-label-lg text-text-primary">Denny Hermawan</span>
<span class="font-tabular-numeric text-body-sm text-error font-medium">+62 819-9988-0012</span>
</div>
<span class="font-body-sm text-body-sm text-text-secondary">Template Overdue (Tunggakan H+3)</span>
</div>
</div>
<!-- Status Badge with Warning -->
<div class="flex items-center gap-space-sm">
<span class="inline-flex items-center gap-1 px-space-sm py-space-2xs rounded-full bg-status-danger-bg text-status-danger-base font-label-sm text-label-sm font-semibold">
<span class="material-symbols-outlined text-[16px]">error</span>
                  Failed (Error 404: Unregistered)
                </span>
<span class="font-tabular-numeric text-body-sm text-text-tertiary">10 Feb 2026, 08:00 WIB</span>
</div>
</div>
<!-- Message Excerpt -->
<p class="font-body-sm text-body-sm text-text-primary bg-surface-card p-space-sm rounded-lg leading-relaxed">
              "Halo <strong>Denny Hermawan</strong>, tagihan Langganan Internet Bisnis cicilan ke-1 dari 1 sebesar <strong>Rp 750.000</strong> telah melewati jatuh tempo 3 hari..."
            </p>
<!-- Failure Breakdown Box -->
<div class="p-space-xs rounded bg-surface-card flex items-center justify-between">
<div class="flex items-center gap-space-sm text-body-sm">
<span class="inline-flex items-center gap-1 text-status-danger-base font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[14px]">warning</span>
                  Batas Retry Maksimal: 3x Habis (Cron Stop)
                </span>
<span class="text-text-tertiary text-[11px]">Meta Code 131026 (Recipient phone number not on WhatsApp)</span>
</div>
<span class="px-space-sm py-0.5 rounded bg-error text-on-error font-label-sm text-label-sm">
                Butuh Tindak Lanjut Admin
              </span>
</div>
<!-- Footer -->
<div class="flex items-center justify-between text-body-sm pt-space-2xs">
<span class="text-text-tertiary font-tabular-numeric text-[11px]">WAMID: <code class="text-text-secondary">wamid.HBgLMjYxMTA0OTg3MAUA</code></span>
<div class="flex items-center gap-space-sm">
<button class="inline-flex items-center gap-1 text-text-secondary hover:text-text-primary font-label-sm text-label-sm" type="button">
<span class="material-symbols-outlined text-[16px]">edit</span> Perbarui Nomor
                </button>
<button class="inline-flex items-center gap-1 text-secondary hover:text-primary font-label-sm text-label-sm" type="button">
<span class="material-symbols-outlined text-[16px]">sms</span> Kirim via Fallback SMS
                </button>
</div>
</div>
</div>
<!-- Entry 3: DELIVERED (H-3 Reminder) -->
<div class="p-space-md rounded-xl bg-surface-canvas hover:bg-surface-subtle transition-colors flex flex-col gap-space-xs">
<div class="flex items-center justify-between flex-wrap gap-2">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-full bg-surface-subtle text-text-primary flex items-center justify-center font-bold text-label-sm">
                  SN
                </div>
<div class="flex flex-col">
<div class="flex items-center gap-space-xs">
<span class="font-label-lg text-label-lg text-text-primary">Siti Nurhaliza</span>
<span class="font-tabular-numeric text-body-sm text-text-tertiary">+62 857-1122-3344</span>
</div>
<span class="font-body-sm text-body-sm text-text-secondary">Template H-3 (Pengingat Awal)</span>
</div>
</div>
<!-- Status Badge -->
<div class="flex items-center gap-space-md">
<span class="inline-flex items-center gap-1 px-space-sm py-space-2xs rounded-full bg-status-success-bg text-status-success-base font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[16px] text-text-tertiary">done_all</span>
                  Tersampaikan (Delivered)
                </span>
<span class="font-tabular-numeric text-body-sm text-text-tertiary">10 Feb 2026, 08:00 WIB</span>
</div>
</div>
<p class="font-body-sm text-body-sm text-text-primary bg-surface-card p-space-sm rounded-lg leading-relaxed">
              "Halo <strong>Siti Nurhaliza</strong>, ini pengingat ramah bahwa tagihan Jasa Konsultasi Pajak cicilan ke-2 dari 4 sebesar <strong>Rp 2.500.000</strong> akan jatuh tempo pada 13 Feb 2026..."
            </p>
<div class="flex items-center justify-between text-body-sm pt-space-2xs">
<span class="text-text-tertiary font-tabular-numeric text-[11px]">WAMID: <code class="text-text-secondary">wamid.HBgLMjYxMDI5Mzc1M0UA</code></span>
<div class="flex items-center gap-space-xs">
<button class="p-1 text-text-tertiary hover:text-text-primary rounded" onclick="copyLogEntry('wamid.HBgLMjYxMDI5Mzc1M0UA')" type="button">
<span class="material-symbols-outlined text-[18px]">content_copy</span>
</button>
</div>
</div>
</div>
<!-- Entry 4: QUEUED (Hari-H Invoice) -->
<div class="p-space-md rounded-xl bg-surface-canvas hover:bg-surface-subtle transition-colors flex flex-col gap-space-xs">
<div class="flex items-center justify-between flex-wrap gap-2">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-full bg-surface-subtle text-text-primary flex items-center justify-center font-bold text-label-sm">
                  BP
                </div>
<div class="flex flex-col">
<div class="flex items-center gap-space-xs">
<span class="font-label-lg text-label-lg text-text-primary">Budi Pratama</span>
<span class="font-tabular-numeric text-body-sm text-text-tertiary">+62 813-8877-6655</span>
</div>
<span class="font-body-sm text-body-sm text-text-secondary">Template Hari-H (Jatuh Tempo)</span>
</div>
</div>
<!-- Status Badge -->
<div class="flex items-center gap-space-md">
<span class="inline-flex items-center gap-1 px-space-sm py-space-2xs rounded-full bg-status-warning-bg text-status-warning-base font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[16px]">hourglass_top</span>
                  Menunggu Antrean (Queued)
                </span>
<span class="font-tabular-numeric text-body-sm text-text-tertiary">Jadwal: 10 Feb, 10:00 WIB</span>
</div>
</div>
<p class="font-body-sm text-body-sm text-text-primary bg-surface-card p-space-sm rounded-lg leading-relaxed">
              "PENTING: Halo <strong>Budi Pratama</strong>, tagihan Sewa Server Cloud cicilan ke-3 dari 3 sebesar <strong>Rp 900.000</strong> jatuh tempo HARI INI..."
            </p>
<div class="flex items-center justify-between text-body-sm pt-space-2xs">
<span class="text-text-tertiary font-tabular-numeric text-[11px]">Batch ID: <code class="text-text-secondary">batch_20260210_02</code></span>
<button class="text-error hover:underline font-label-sm text-label-sm" type="button">
                Batalkan Antrean
              </button>
</div>
</div>
</div>
<!-- Log Pagination -->
<div class="flex items-center justify-between pt-space-sm">
<span class="font-body-sm text-body-sm text-text-tertiary">Menampilkan 4 dari 84 pengiriman hari ini</span>
<div class="flex items-center gap-1">
<button class="px-space-sm py-1 rounded bg-surface-subtle text-text-tertiary font-label-sm text-label-sm cursor-not-allowed" type="button">Sebelumnya</button>
<button class="px-space-sm py-1 rounded bg-secondary text-on-secondary font-label-sm text-label-sm" type="button">1</button>
<button class="px-space-sm py-1 rounded hover:bg-surface-subtle text-text-secondary font-label-sm text-label-sm" type="button">2</button>
<button class="px-space-sm py-1 rounded hover:bg-surface-subtle text-text-secondary font-label-sm text-label-sm" type="button">3</button>
<button class="px-space-sm py-1 rounded bg-surface-subtle hover:bg-surface-container text-text-primary font-label-sm text-label-sm" type="button">Berikutnya</button>
</div>
</div>
</div>
</section>
</div>
<!-- Interactive Test Send Modal (Hidden by default) -->
<div class="fixed inset-0 bg-inverse-surface/60 backdrop-blur-sm z-50 flex items-center justify-center p-space-md" x-show="open" x-cloak x-transition.opacity>
<div class="bg-surface-card rounded-2xl max-w-lg w-full p-space-xl shadow-xl flex flex-col gap-space-lg animate-in fade-in zoom-in duration-150">
<div class="flex items-center justify-between">
<div class="flex items-center gap-space-xs">
<div class="w-8 h-8 rounded-full bg-secondary-fixed text-secondary flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">send_time_extension</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-text-primary">Kirim Pesan Uji Coba (Sandbox/Live)</h3>
</div>
<button class="text-text-tertiary hover:text-text-primary" @click="hide()" type="button">
<span class="material-symbols-outlined text-[24px]">close</span>
</button>
</div>
<p class="font-body-sm text-body-sm text-text-secondary">
        Kirimkan payload WhatsApp resmi menggunakan nomor uji developer internal untuk memastikan validasi template Meta dan format link token.
      </p>
<div class="flex flex-col gap-space-md">
<div class="flex flex-col gap-space-2xs">
<label class="font-label-sm text-label-sm text-text-secondary">Nomor WhatsApp Penerima Uji Coba</label>
<div class="flex items-center bg-surface-canvas rounded-lg px-space-md py-space-xs">
<span class="font-label-md text-label-md text-text-tertiary mr-2">+62</span>
<input class="w-full bg-transparent font-tabular-numeric text-label-md text-text-primary focus:outline-none" placeholder="8123456789" type="text" value="81234567890"/>
</div>
<span class="text-[11px] text-text-tertiary">Pastikan nomor aktif dan telah di-whitelist jika menggunakan WABA Sandbox.</span>
</div>
<div class="flex flex-col gap-space-2xs">
<label class="font-label-sm text-label-sm text-text-secondary">Pilih Template yang Dikirim</label>
<select class="w-full p-space-xs rounded-lg bg-surface-canvas text-text-primary font-body-sm text-body-sm focus:outline-none">
<option>H-3 Pengingat Awal (reminder_h3_formal)</option>
<option>Hari-H Jatuh Tempo (due_today_urgent)</option>
<option>Kuitansi Lunas (payment_receipt_success)</option>
<option>Overdue Tunggakan (overdue_notice_tier1)</option>
</select>
</div>
</div>
<div class="flex items-center justify-end gap-space-sm pt-space-sm">
<button class="px-space-lg py-space-sm rounded-lg text-text-secondary hover:bg-surface-subtle font-label-md text-label-md" @click="hide()" type="button">
          Batal
        </button>
<button class="inline-flex items-center gap-space-xs px-space-xl py-space-sm rounded-lg bg-secondary text-on-secondary hover:bg-secondary-container font-label-md text-label-md shadow-sm" @click="hide(); window.AlpineifyToast && window.AlpineifyToast('Payload uji berhasil dikirimkan via WhatsApp API!')" type="button">
<span class="material-symbols-outlined text-[18px]">send</span>
          Kirim Sekarang
        </button>
</div>
</div>
</div>


@endsection
