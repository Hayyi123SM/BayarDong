<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Support\DemoData;

class PortalController extends Controller
{
    /**
     * Halaman rincian tagihan & cicilan.
     * Route: GET /invoice/{token}
     */
    public function detail(string $token)
    {
        if ($token !== DemoData::TOKEN) {
            abort(404);
        }

        return view('portal.invoice-detail', [
            'pageTitle' => 'Rincian Tagihan & Cicilan',
            'token' => $token,
            'invoiceNumber' => DemoData::invoice()['invoice_number'],
            'customer' => DemoData::customer(),
            'invoice' => DemoData::invoice(),
            'schedules' => DemoData::schedules(),
            'summary' => DemoData::summary(),
            'earlySettlement' => DemoData::earlySettlement(),
        ]);
    }

    /**
     * Halaman pilih metode pembayaran.
     * Route: GET /invoice/{token}/methods
     */
    public function methods(string $token)
    {
        if ($token !== DemoData::TOKEN) {
            abort(404);
        }

        return view('portal.payment-methods', [
            'pageTitle' => 'Pilih Metode Pembayaran',
            'token' => $token,
            'invoiceNumber' => DemoData::invoice()['invoice_number'],
            'invoice' => DemoData::invoice(),
            'summary' => DemoData::summary(),
            'methods' => DemoData::paymentMethods(),
        ]);
    }

    /**
     * Halaman instruksi bayar (Virtual Account).
     * Route: GET /invoice/{token}/instructions
     */
    public function instructions(string $token)
    {
        if ($token !== DemoData::TOKEN) {
            abort(404);
        }

        return view('portal.payment-instructions', [
            'pageTitle' => 'Instruksi Pembayaran',
            'token' => $token,
            'invoiceNumber' => DemoData::invoice()['invoice_number'],
            'invoice' => DemoData::invoice(),
            'payment' => DemoData::vaPayment(),
        ]);
    }

    /**
     * Halaman instruksi bayar (desktop) — pembayaran kuitansi/kasir.
     * Route: GET /invoice/{token}/instructions-kuitansi
     */
    public function instructionsKuitansi(string $token)
    {
        if ($token !== DemoData::TOKEN) {
            abort(404);
        }

        return view('portal.kuitansi', [
            'pageTitle' => 'Instruksi Pembayaran',
            'token' => $token,
            'invoiceNumber' => DemoData::invoice()['invoice_number'],
            'invoice' => DemoData::invoice(),
        ]);
    }

    /**
     * Halaman checkout (desktop).
     * Route: GET /invoice/{token}/checkout
     */
    public function checkout(string $token)
    {
        if ($token !== DemoData::TOKEN) {
            abort(404);
        }

        return view('portal.checkout', [
            'pageTitle' => 'Konfirmasi Pembayaran',
            'token' => $token,
            'invoiceNumber' => DemoData::invoice()['invoice_number'],
            'invoice' => DemoData::invoice(),
            'summary' => DemoData::summary(),
        ]);
    }

    /**
     * Halaman kuitansi lunas.
     * Route: GET /invoice/{token}/receipt
     */
    public function receipt(string $token)
    {
        if ($token !== DemoData::TOKEN) {
            abort(404);
        }

        return view('portal.receipt', [
            'pageTitle' => 'Kuitansi Pembayaran',
            'token' => $token,
            'invoiceNumber' => DemoData::invoice()['invoice_number'],
            'invoice' => DemoData::invoice(),
            'receipt' => DemoData::receipt(),
        ]);
    }
}
