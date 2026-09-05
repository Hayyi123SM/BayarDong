<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\DemoData;

class MonitoringController extends Controller
{
    public function __invoke()
    {
        return view('admin.monitoring', [
            'pageTitle' => 'Monitoring & Jadwal',
            'monitorInvoices' => DemoData::monitorInvoices(),
            'schedules' => DemoData::monitorSchedules(),
            'invoice' => DemoData::invoice(),
            'summary' => DemoData::summary(),
            'customer' => DemoData::customer(),
            'token' => DemoData::TOKEN,
        ]);
    }
}
