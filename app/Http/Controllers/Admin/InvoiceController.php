<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\DemoData;

class InvoiceController extends Controller
{
    public function create()
    {
        return view('admin.invoices-create', [
            'pageTitle' => 'Buat Tagihan & Tenor',
            'customers' => DemoData::customers(),
            'customer' => DemoData::customer(),
            'invoice' => DemoData::invoice(),
            'schedules' => DemoData::schedules(),
            'summary' => DemoData::summary(),
            'token' => DemoData::TOKEN,
        ]);
    }
}
