<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\DemoData;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard', [
            'pageTitle' => 'Dashboard & Ringkasan',
            'metrics' => DemoData::dashboardMetrics(),
            'transactions' => DemoData::dashboardTransactions(),
            'schedules' => DemoData::monitorSchedules(),
        ]);
    }
}
