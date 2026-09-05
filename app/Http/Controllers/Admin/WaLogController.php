<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\DemoData;

class WaLogController extends Controller
{
    public function __invoke()
    {
        $meta = [
            'h3' => ['title' => 'Template H-3: Pengingat Awal Jatuh Tempo', 'code' => 'ID: reminder_h3_formal (Meta ID: 882910419)'],
            'dday' => ['title' => 'Template Hari-H: Pengingat Jatuh Tempo Hari Ini', 'code' => 'ID: due_today_urgent (Meta ID: 882910542)'],
            'overdue' => ['title' => 'Template Overdue: Pemberitahuan Tunggakan H+3 & H+7', 'code' => 'ID: overdue_notice_tier1 (Meta ID: 882910790)'],
            'receipt' => ['title' => 'Template Kuitansi Lunas: Konfirmasi Pembayaran Sukses', 'code' => 'ID: payment_receipt_success (Meta ID: 882910901)'],
            'newinv' => ['title' => 'Template Tagihan Baru: Terbit Invoice & Pilihan Tenor', 'code' => 'ID: new_invoice_issued (Meta ID: 882911122)'],
        ];

        $templates = [];
        foreach (DemoData::waTemplateBodies() as $key => $body) {
            $templates[$key] = array_merge($meta[$key] ?? [], ['text' => $body]);
        }

        return view('admin.wa-logs', [
            'pageTitle' => 'WhatsApp & Log',
            'templates' => DemoData::waTemplates(),
            'logs' => DemoData::waLogs(),
            'templatesData' => $templates,
            'sampleValues' => DemoData::waSampleValues(),
        ]);
    }
}
