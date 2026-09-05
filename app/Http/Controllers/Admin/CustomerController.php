<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\DemoData;

class CustomerController extends Controller
{
    public function __invoke()
    {
        return view('admin.customers', [
            'pageTitle' => 'Data Pelanggan',
            'customers' => DemoData::customerDirectory(),
            'token' => DemoData::TOKEN,
        ]);
    }
}
