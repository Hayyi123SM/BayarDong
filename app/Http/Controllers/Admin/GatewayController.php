<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class GatewayController extends Controller
{
    public function __invoke()
    {
        return view('admin.gateway', [
            'pageTitle' => 'Pengaturan Gateway & API',
        ]);
    }
}
