<?php

namespace App\Support;

/**
 * DemoData
 *
 * Sumber data sementara untuk keperluan demo (UI statis, tanpa database).
 * Struktur mengikuti skema di `system_flow_ebilling_1.md` agar mudah
 * dipindahkan ke Eloquent nantinya.
 */
final class DemoData
{
    /** Token unik portal publik (possession-based access). */
    public const TOKEN = 'tok_98f4a1bc7e23d4f5a6b7c8d9e0f1a2b3';

    /**
     * Data pelanggan tunggal (tabel `customers`).
     */
    public static function customer(): array
    {
        return [
            'id' => 'CUST-881903',
            'full_name' => 'Fahmi Ramadhan',
            'phone_number' => '+6281234567890',
            'phone_display' => '812-3456-7890',
            'email' => 'fahmi.r@gmail.com',
            'segment' => 'Siswa Aktif',
        ];
    }

    /**
     * Daftar pelanggan untuk searchable combobox (di invoice create).
     */
    public static function customers(): array
    {
        return [
            [
                'id' => 'CUS-001',
                'name' => 'Fahmi Ramadhan',
                'phone' => '6281234567890',
                'email' => 'fahmi.r@gmail.com',
                'segment' => 'Premium',
                'initials' => 'FR',
            ],
            [
                'id' => 'CUS-002',
                'name' => 'Fahmi Hidayat',
                'phone' => '6285678901234',
                'email' => 'hidayat@gmail.com',
                'segment' => 'Reguler',
                'initials' => 'FH',
            ],
            [
                'id' => 'CUS-003',
                'name' => 'Putri Rahma',
                'phone' => '6289012345678',
                'email' => 'putri@outlook.com',
                'segment' => 'Premium',
                'initials' => 'PR',
            ],
            [
                'id' => 'CUS-004',
                'name' => 'Budi Santoso',
                'phone' => '6283456789012',
                'email' => 'budi@yahoo.com',
                'segment' => 'Enterprise',
                'initials' => 'BS',
            ],
        ];
    }

    /**
     * Direktori pelanggan lengkap untuk halaman admin Data Pelanggan.
     *
     * Setiap entri memuat info profil, status WA, tagihan & tenor, metode
     * bayar, warna avatar, dan jadwal angsuran terkini untuk drawer.
     */
    public static function customerDirectory(): array
    {
        return [
            [
                'id' => 'CUST-881903',
                'name' => 'Fahmi Ramadhan',
                'initials' => 'FR',
                'avatar' => ['bg' => 'bg-secondary', 'text' => 'text-on-secondary'],
                'join_at' => '12 Nov 2025',
                'phone' => '+62 812-3456-7890',
                'email' => 'fahmi.r@gmail.com',
                'wa' => ['status' => 'Aktif', 'tone' => 'success'],
                'invoice' => 'SPP Semester Ganjil',
                'termin_now' => 2,
                'termin_total' => 3,
                'amount' => 'Rp 333.333',
                'progress' => 66,
                'progress_color' => 'bg-secondary',
                'total' => 'Total: Rp 1.000.000',
                'status' => ['label' => 'Jatuh Tempo Hari Ini', 'bg' => 'bg-status-warning-bg', 'text' => 'text-status-warning-base', 'dot' => 'bg-status-warning-base'],
                'method' => ['icon' => 'account_balance', 'label' => 'BCA Virtual Account'],
                'action' => 'normal',
                'schedule' => [
                    ['term' => 'Termin 1 / 3', 'sub' => 'Dibayar 10 Jan 2025', 'amount' => 'Rp 333.333', 'icon' => 'check_circle', 'color' => 'text-status-success-base', 'bg' => 'bg-surface-subtle'],
                    ['term' => 'Termin 2 / 3', 'sub' => 'BCA VA: 8810 0812 3456', 'amount' => 'Rp 333.333', 'icon' => 'hourglass_top', 'color' => 'text-status-warning-base', 'bg' => 'bg-status-warning-bg'],
                    ['term' => 'Termin 3 / 3', 'sub' => 'Jatuh Tempo 10 Mar 2025', 'amount' => 'Rp 333.334', 'icon' => 'radio_button_unchecked', 'color' => 'text-text-tertiary', 'bg' => 'bg-surface-subtle opacity-70'],
                ],
            ],
            [
                'id' => 'CUST-882014',
                'name' => 'Anisa Suryani',
                'initials' => 'AS',
                'avatar' => ['bg' => 'bg-brand-indigo', 'text' => 'text-on-secondary'],
                'join_at' => '02 Feb 2026',
                'phone' => '+62 857-1122-3344',
                'email' => 'anisa.suryani@gmail.com',
                'wa' => ['status' => 'Aktif', 'tone' => 'success'],
                'invoice' => 'Iuran Langganan Jasa',
                'termin_now' => 1,
                'termin_total' => 6,
                'amount' => 'Rp 250.000',
                'progress' => 16,
                'progress_color' => 'bg-brand-indigo',
                'total' => 'Total: Rp 1.500.000',
                'status' => ['label' => 'Termin Berjalan', 'bg' => 'bg-status-info-bg', 'text' => 'text-status-info-base', 'dot' => 'bg-status-info-base'],
                'method' => ['icon' => 'qr_code_2', 'label' => 'QRIS Realtime'],
                'action' => 'normal',
                'schedule' => [
                    ['term' => 'Termin 1 / 6', 'sub' => 'Dibayar 03 Feb 2026', 'amount' => 'Rp 250.000', 'icon' => 'check_circle', 'color' => 'text-status-success-base', 'bg' => 'bg-surface-subtle'],
                    ['term' => 'Termin 2 / 6', 'sub' => 'QRIS: Duitku-2881', 'amount' => 'Rp 250.000', 'icon' => 'hourglass_top', 'color' => 'text-status-info-base', 'bg' => 'bg-status-info-bg'],
                    ['term' => 'Termin 3 / 6', 'sub' => 'Jatuh Tempo 03 Apr 2026', 'amount' => 'Rp 250.000', 'icon' => 'radio_button_unchecked', 'color' => 'text-text-tertiary', 'bg' => 'bg-surface-subtle opacity-70'],
                ],
            ],
            [
                'id' => 'CUST-882105',
                'name' => 'Budi Wicaksono',
                'initials' => 'BW',
                'avatar' => ['bg' => 'bg-status-success-base', 'text' => 'text-on-secondary'],
                'join_at' => '19 Sep 2025',
                'phone' => '+62 813-9090-1122',
                'email' => 'budi.w@gmail.com',
                'wa' => ['status' => 'Aktif', 'tone' => 'success'],
                'invoice' => 'Simpan Pinjam Koperasi',
                'termin_now' => 3,
                'termin_total' => 3,
                'amount' => 'LUNAS',
                'amount_tone' => 'text-status-success-base',
                'progress' => 100,
                'progress_color' => 'bg-status-success-base',
                'total' => 'Total: Rp 900.000',
                'termin_text' => 'Termin 3 / 3 (Selesai)',
                'status' => ['label' => 'Lunas Sempurna', 'bg' => 'bg-status-success-bg', 'text' => 'text-status-success-base', 'dot' => 'bg-status-success-base'],
                'method' => ['icon' => 'account_balance', 'label' => 'Mandiri Virtual Account'],
                'action' => 'normal',
                'schedule' => [
                    ['term' => 'Termin 1 / 3', 'sub' => 'Dibayar 19 Sep 2025', 'amount' => 'Rp 300.000', 'icon' => 'check_circle', 'color' => 'text-status-success-base', 'bg' => 'bg-surface-subtle'],
                    ['term' => 'Termin 2 / 3', 'sub' => 'Dibayar 19 Okt 2025', 'amount' => 'Rp 300.000', 'icon' => 'check_circle', 'color' => 'text-status-success-base', 'bg' => 'bg-surface-subtle'],
                    ['term' => 'Termin 3 / 3', 'sub' => 'Dibayar 19 Nov 2025', 'amount' => 'Rp 300.000', 'icon' => 'check_circle', 'color' => 'text-status-success-base', 'bg' => 'bg-surface-subtle'],
                ],
            ],
            [
                'id' => 'CUST-882309',
                'name' => 'Dewi Maharani',
                'initials' => 'DM',
                'avatar' => ['bg' => 'bg-status-danger-base', 'text' => 'text-on-secondary'],
                'join_at' => '20 Jan 2026',
                'phone' => '+62 819-4455-6677',
                'email' => 'dewi.m@gmail.com',
                'wa' => ['status' => 'Validasi', 'tone' => 'warning', 'reminder' => true],
                'invoice' => 'Sewa Alat Berat',
                'termin_now' => 3,
                'termin_total' => 4,
                'amount' => 'Rp 450.000',
                'progress' => 50,
                'progress_color' => 'bg-status-danger-base',
                'total' => 'Total: Rp 1.800.000',
                'status' => ['label' => 'Overdue 3 Hari', 'bg' => 'bg-status-danger-bg', 'text' => 'text-status-danger-base', 'dot' => 'bg-status-danger-base'],
                'method' => ['icon' => 'account_balance', 'label' => 'BRI Virtual Account'],
                'action' => 'normal',
                'overdue' => true,
                'schedule' => [
                    ['term' => 'Termin 1 / 4', 'sub' => 'Dibayar 20 Jan 2026', 'amount' => 'Rp 450.000', 'icon' => 'check_circle', 'color' => 'text-status-success-base', 'bg' => 'bg-surface-subtle'],
                    ['term' => 'Termin 2 / 4', 'sub' => 'Dibayar 20 Feb 2026', 'amount' => 'Rp 450.000', 'icon' => 'check_circle', 'color' => 'text-status-success-base', 'bg' => 'bg-surface-subtle'],
                    ['term' => 'Termin 3 / 4', 'sub' => 'Overdue (Jatuh Tempo 20 Agu)', 'amount' => 'Rp 450.000', 'icon' => 'error', 'color' => 'text-status-danger-base', 'bg' => 'bg-status-danger-bg'],
                    ['term' => 'Termin 4 / 4', 'sub' => 'Jatuh Tempo 20 Sep 2026', 'amount' => 'Rp 450.000', 'icon' => 'radio_button_unchecked', 'color' => 'text-text-tertiary', 'bg' => 'bg-surface-subtle opacity-70'],
                ],
            ],
            [
                'id' => 'CUST-882401',
                'name' => 'Hendra Pratama',
                'initials' => 'HP',
                'avatar' => ['bg' => 'bg-surface-dim', 'text' => 'text-on-surface'],
                'join_at' => '28 Agu 2026',
                'phone' => '+62 812-7777-8899',
                'email' => 'hendra.p@gmail.com',
                'wa' => ['status' => 'Aktif', 'tone' => 'success'],
                'invoice' => null,
                'status' => ['label' => 'Data Tersimpan', 'bg' => 'bg-surface-subtle', 'text' => 'text-text-secondary', 'dot' => 'bg-text-tertiary'],
                'method' => ['icon' => 'account_balance', 'label' => 'BRI Virtual Account'],
                'action' => 'create',
                'schedule' => [],
            ],
            [
                'id' => 'CUST-882512',
                'name' => 'Siti Nurhaliza',
                'initials' => 'SN',
                'avatar' => ['bg' => 'bg-surface-container-highest', 'text' => 'text-secondary'],
                'join_at' => '05 Mar 2026',
                'phone' => '+62 856-2020-3344',
                'email' => 'siti.n@gmail.com',
                'wa' => ['status' => 'Aktif', 'tone' => 'success'],
                'invoice' => 'SPP Tahunan',
                'termin_now' => 4,
                'termin_total' => 12,
                'amount' => 'Rp 200.000',
                'progress' => 33,
                'progress_color' => 'bg-secondary',
                'total' => 'Total: Rp 2.400.000',
                'status' => ['label' => 'Termin Berjalan', 'bg' => 'bg-status-info-bg', 'text' => 'text-status-info-base', 'dot' => 'bg-status-info-base'],
                'method' => ['icon' => 'qr_code_2', 'label' => 'QRIS Dinamis'],
                'action' => 'normal',
                'schedule' => [
                    ['term' => 'Termin 1 / 12', 'sub' => 'Dibayar 05 Mar 2026', 'amount' => 'Rp 200.000', 'icon' => 'check_circle', 'color' => 'text-status-success-base', 'bg' => 'bg-surface-subtle'],
                    ['term' => 'Termin 2 / 12', 'sub' => 'Dibayar 05 Apr 2026', 'amount' => 'Rp 200.000', 'icon' => 'check_circle', 'color' => 'text-status-success-base', 'bg' => 'bg-surface-subtle'],
                    ['term' => 'Termin 3 / 12', 'sub' => 'Dibayar 05 Mei 2026', 'amount' => 'Rp 200.000', 'icon' => 'check_circle', 'color' => 'text-status-success-base', 'bg' => 'bg-surface-subtle'],
                    ['term' => 'Termin 4 / 12', 'sub' => 'QRIS: Duitku-7712', 'amount' => 'Rp 200.000', 'icon' => 'hourglass_top', 'color' => 'text-status-info-base', 'bg' => 'bg-status-info-bg'],
                    ['term' => 'Termin 5 / 12', 'sub' => 'Jatuh Tempo 05 Jul 2026', 'amount' => 'Rp 200.000', 'icon' => 'radio_button_unchecked', 'color' => 'text-text-tertiary', 'bg' => 'bg-surface-subtle opacity-70'],
                ],
            ],
        ];
    }

    /**
     * Data invoice induk (tabel `invoices`).
     */
    public static function invoice(): array
    {
        return [
            'invoice_number' => 'INV/2026/09/0001',
            'description' => 'SPP Semester Ganjil 2026',
            'category' => 'Pendidikan',
            'total_amount' => 1000000,
            'tenor_count' => 3,
            'interval_type' => 'monthly',
            'issued_date' => '10 Jan 2026',
            'token' => self::TOKEN,
            'status' => 'active',
        ];
    }

    /**
     * Daftar jadwal cicilan (tabel `invoice_schedules`).
     */
    public static function schedules(): array
    {
        return [
            [
                'installment_no' => 1,
                'label' => 'Cicilan Ke-1',
                'amount' => 333333,
                'due_date' => '10 Jan 2026',
                'status' => 'paid',
                'paid_text' => 'LUNAS',
                'paid_at' => '09 Jan 2026 via BCA VA',
                'reference' => 'DUITKU-REF-20260109-33210',
                'lock' => false,
                'active' => false,
            ],
            [
                'installment_no' => 2,
                'label' => 'Cicilan Ke-2',
                'amount' => 333333,
                'due_date' => '10 Feb 2026',
                'status' => 'due_today',
                'paid_text' => 'JATUH TEMPO',
                'paid_at' => null,
                'reference' => null,
                'lock' => false,
                'active' => true,
            ],
            [
                'installment_no' => 3,
                'label' => 'Cicilan Ke-3',
                'amount' => 333334,
                'due_date' => '10 Mar 2026',
                'status' => 'upcoming',
                'paid_text' => 'BELUM JATUH TEMPO',
                'paid_at' => null,
                'reference' => null,
                'remainder' => true,
                'lock' => true,
                'active' => false,
            ],
        ];
    }

    /**
     * Opsi pelunasan cepat (seluruh sisa cicilan).
     */
    public static function earlySettlement(): array
    {
        return [
            'enabled' => true,
            'amount' => 666667,
            'label' => 'Bayar Semua Sisa Cicilan',
            'subtitle' => 'Termin 2 & Termin 3 Sekaligus',
            'fee_free' => true,
        ];
    }

    /**
     * Ringkasan jumlah untuk halaman portal.
     */
    public static function summary(): array
    {
        $paid = 333333;
        $remaining = 666667;

        return [
            'total' => 1000000,
            'total_text' => 'Rp 1.000.000',
            'paid' => ['value' => $paid, 'text' => 'Rp 333.333'],
            'remaining' => ['value' => $remaining, 'text' => 'Rp 666.667'],
            'current' => ['value' => 333333, 'text' => 'Rp 333.333'],
            'progress' => ['paid_text' => '1 dari 3 Lunas (33%)', 'remaining_terms' => 2],
        ];
    }

    /**
     * Daftar metode pembayaran aktif dari Duitku (Inquiry Payment Method).
     */
    public static function paymentMethods(): array
    {
        return [
            [
                'id' => 'virtual-account',
                'name' => 'Virtual Account',
                'description' => 'Transfer ke nomor VA melalui m-banking, ATM, atau internet banking.',
                'items' => [
                    ['code' => 'VA', 'channel' => 'BCA Virtual Account', 'fee' => 3500],
                    ['code' => 'VA', 'channel' => 'BNI Virtual Account', 'fee' => 2500],
                    ['code' => 'VA', 'channel' => 'Mandiri Virtual Account', 'fee' => 3000],
                    ['code' => 'VA', 'channel' => 'Permata Virtual Account', 'fee' => 2500],
                ],
            ],
            [
                'id' => 'qris',
                'name' => 'QRIS',
                'description' => 'Scan QR dengan aplikasi e-wallet atau mobile banking.',
                'items' => [
                    ['code' => 'QR', 'channel' => 'QRIS (semua aplikasi)', 'fee' => 0],
                ],
            ],
            [
                'id' => 'e-wallet',
                'name' => 'E-Wallet',
                'description' => 'Bayar langsung dari saldo e-wallet Anda.',
                'items' => [
                    ['code' => 'SP', 'channel' => 'ShopeePay', 'fee' => 1500],
                    ['code' => 'OV', 'channel' => 'OVO', 'fee' => 2000],
                    ['code' => 'SA', 'channel' => 'DANA', 'fee' => 2000],
                ],
            ],
            [
                'id' => 'kartu-kredit',
                'name' => 'Kartu Kredit',
                'description' => 'Bayar dengan kartu kredit (memerlukan email).',
                'items' => [
                    ['code' => 'CC', 'channel' => 'Kartu Kredit (Visa/Mastercard)', 'fee' => 2.9],
                ],
            ],
        ];
    }

    /**
     * Detail transaksi VA (tabel `payments`) untuk instruksi bayar.
     */
    public static function vaPayment(): array
    {
        return [
            'method' => 'Virtual Account',
            'channel' => 'BCA Virtual Account',
            'va_number' => '880123456789001',
            'amount' => 333333,
            'admin_fee' => 3500,
            'total' => 336833,
            'expiry_minutes' => 871,
            'reference' => 'DUITKU-REF-20260210-99122',
            'customer_name' => 'Fahmi Ramadhan',
        ];
    }

    /**
     * Data kuitansi lunas untuk halaman receipt.
     */
    public static function receipt(): array
    {
        return [
            'invoice_number' => 'INV/2026/09/0001',
            'description' => 'SPP Semester Ganjil 2026',
            'customer' => 'Fahmi Ramadhan',
            'installment_label' => 'Cicilan Ke-2 dari 3',
            'amount_paid' => 333333,
            'method' => 'BCA Virtual Account',
            'paid_at' => '10 Feb 2026, 14:22 WIB',
            'reference' => 'DUITKU-REF-20260210-88741',
            'remaining_installments' => 1,
            'remaining_total' => 333334,
            'all_settled' => false,
        ];
    }

    /**
     * Dashboard admin — kartu metrik ringkasan.
     */
    public static function dashboardMetrics(): array
    {
        return [
            'active_invoices' => ['label' => 'Invoice Aktif', 'value' => '128', 'delta' => '+12 bulan ini', 'icon' => 'receipt_long', 'trend' => 'up'],
            'pending_payments' => ['label' => 'Transaksi Pending', 'value' => '23', 'delta' => '-5 dr kemarin', 'icon' => 'hourglass_top', 'trend' => 'down'],
            'overdue' => ['label' => 'Tunggakan', 'value' => '9', 'delta' => '+2 minggu ini', 'icon' => 'warning', 'trend' => 'up'],
            'collected' => ['label' => 'Terkumpul Bulan Ini', 'value' => 'Rp 148,5 Jt', 'delta' => '98,2% dari target', 'icon' => 'payments', 'trend' => 'up'],
        ];
    }

    /**
     * Dashboard admin — aktivitas transaksi masuk real-time.
     */
    public static function dashboardTransactions(): array
    {
        return [
            ['time' => '09:41:22', 'customer' => 'Siti Nurhaliza', 'invoice' => 'INV/2026/09/0088', 'amount' => 'Rp 525.000', 'method' => 'QRIS', 'status' => 'success'],
            ['time' => '09:38:17', 'customer' => 'Budi Santoso', 'invoice' => 'INV/2026/09/0076', 'amount' => 'Rp 1.250.000', 'method' => 'BCA VA', 'status' => 'success'],
            ['time' => '09:31:55', 'customer' => 'Andi Wijaya', 'invoice' => 'INV/2026/09/0091', 'amount' => 'Rp 750.000', 'method' => 'OVO', 'status' => 'pending'],
            ['time' => '09:27:44', 'customer' => 'Rina Kartika', 'invoice' => 'INV/2026/09/0055', 'amount' => 'Rp 2.100.000', 'method' => 'Mandiri VA', 'status' => 'success'],
            ['time' => '09:15:03', 'customer' => 'Dewi Lestari', 'invoice' => 'INV/2026/09/0042', 'amount' => 'Rp 890.000', 'method' => 'Shopeepay', 'status' => 'expired'],
        ];
    }

    /**
     * Monitoring admin — daftar cicilan & status.
     */
    public static function monitorSchedules(): array
    {
        return [
            ['termin' => 1, 'invoice' => 'INV/2026/09/0001', 'customer' => 'Fahmi Ramadhan', 'nominal' => 'Rp 333.333', 'due' => '10 Jan 2026', 'status' => 'lunas', 'paid_at' => '09 Jan 2026'],
            ['termin' => 2, 'invoice' => 'INV/2026/09/0001', 'customer' => 'Fahmi Ramadhan', 'nominal' => 'Rp 333.333', 'due' => '10 Feb 2026', 'status' => 'due', 'paid_at' => null],
            ['termin' => 3, 'invoice' => 'INV/2026/09/0001', 'customer' => 'Fahmi Ramadhan', 'nominal' => 'Rp 333.334', 'due' => '10 Mar 2026', 'status' => 'pending', 'paid_at' => null],
            ['termin' => 1, 'invoice' => 'INV/2026/09/0042', 'customer' => 'Dewi Lestari', 'nominal' => 'Rp 890.000', 'due' => '08 Feb 2026', 'status' => 'overdue', 'paid_at' => null],
            ['termin' => 2, 'invoice' => 'INV/2026/09/0076', 'customer' => 'Budi Santoso', 'nominal' => 'Rp 625.000', 'due' => '12 Feb 2026', 'status' => 'lunas', 'paid_at' => '11 Feb 2026'],
        ];
    }

    /**
     * Monitoring admin — data tagihan induk (per invoice) lengkap dengan
     * jadwal termin & status, untuk render tabel + drawer rincian via Alpine.
     */
    public static function monitorInvoices(): array
    {
        return [
            [
                'id' => 'inv-0001',
                'invoice' => 'INV/2026/09/0001',
                'description' => 'SPP Semester Ganjil 2026',
                'customer' => 'Fahmi Ramadhan',
                'wa' => '+62 812-3456-7890',
                'waLink' => '6281234567890',
                'total' => 'Rp 1.000.000',
                'totalValue' => 1000000,
                'sisa' => 'Rp 333.334',
                'tenor' => 3,
                'paidCount' => 2,
                'status' => 'due',
                'statusLabel' => 'JATUH TEMPO HARI INI',
                'channel' => 'BCA Virtual Account',
                'channelIcon' => 'verified',
                'channelTone' => 'success',
                'channelMeta' => 'Auto-Sync Cron Duitku',
                'token' => 'tok_89abfc9810',
                'tax' => 'ppn',
                'terms' => [
                    ['no' => 1, 'nominal' => 'Rp 333.333', 'due' => '10 Jan 2026', 'status' => 'lunas', 'paidAt' => '09 Jan 2026, 09:22 WIB', 'channel' => 'BCA VA (DKT-8841)'],
                    ['no' => 2, 'nominal' => 'Rp 333.333', 'due' => '10 Feb 2026', 'status' => 'lunas', 'paidAt' => '10 Feb 2026, 07:04 WIB', 'channel' => 'BCA VA (DKT-9312)'],
                    ['no' => 3, 'nominal' => 'Rp 333.334', 'due' => '10 Mar 2026', 'status' => 'pending', 'paidAt' => null, 'channel' => null],
                ],
            ],
            [
                'id' => 'inv-0002',
                'invoice' => 'INV/2026/09/0002',
                'description' => 'Kursus Desain UI/UX Fundamental',
                'customer' => 'Sarah Azhari',
                'wa' => '+62 857-1122-3344',
                'waLink' => '6285711223344',
                'total' => 'Rp 3.000.000',
                'totalValue' => 3000000,
                'sisa' => 'Rp 0',
                'tenor' => 6,
                'paidCount' => 6,
                'status' => 'completed',
                'statusLabel' => 'COMPLETED',
                'channel' => 'Auto-Reconciled QRIS',
                'channelIcon' => 'qr_code_2',
                'channelTone' => 'success',
                'channelMeta' => 'Ref: DKT-QRIS-99210',
                'token' => 'tok_sarah99120',
                'tax' => 'none',
                'terms' => [
                    ['no' => 1, 'nominal' => 'Rp 500.000', 'due' => '05 Jan 2026', 'status' => 'lunas', 'paidAt' => '04 Jan 2026, 19:11 WIB', 'channel' => 'QRIS (DKT-QRIS-99201)'],
                    ['no' => 2, 'nominal' => 'Rp 500.000', 'due' => '12 Jan 2026', 'status' => 'lunas', 'paidAt' => '12 Jan 2026, 08:40 WIB', 'channel' => 'QRIS (DKT-QRIS-99202)'],
                    ['no' => 3, 'nominal' => 'Rp 500.000', 'due' => '19 Jan 2026', 'status' => 'lunas', 'paidAt' => '19 Jan 2026, 12:05 WIB', 'channel' => 'QRIS (DKT-QRIS-99203)'],
                    ['no' => 4, 'nominal' => 'Rp 500.000', 'due' => '26 Jan 2026', 'status' => 'lunas', 'paidAt' => '26 Jan 2026, 09:18 WIB', 'channel' => 'QRIS (DKT-QRIS-99204)'],
                    ['no' => 5, 'nominal' => 'Rp 500.000', 'due' => '02 Feb 2026', 'status' => 'lunas', 'paidAt' => '02 Feb 2026, 21:03 WIB', 'channel' => 'QRIS (DKT-QRIS-99205)'],
                    ['no' => 6, 'nominal' => 'Rp 500.000', 'due' => '09 Feb 2026', 'status' => 'lunas', 'paidAt' => '09 Feb 2026, 07:55 WIB', 'channel' => 'QRIS (DKT-QRIS-99206)'],
                ],
            ],
            [
                'id' => 'inv-0003',
                'invoice' => 'INV/2026/09/0003',
                'description' => 'Uang Gedung Siswa Baru 2026',
                'customer' => 'Budi Santoso',
                'wa' => '+62 813-9988-7766',
                'waLink' => '6281399887766',
                'total' => 'Rp 4.000.000',
                'totalValue' => 4000000,
                'sisa' => 'Rp 3.000.000',
                'tenor' => 4,
                'paidCount' => 1,
                'status' => 'overdue',
                'statusLabel' => 'OVERDUE (H+4)',
                'channel' => 'WA Sent (Retry 0)',
                'channelIcon' => 'sms_failed',
                'channelTone' => 'danger',
                'channelMeta' => 'Mandiri VA #8920199201',
                'token' => 'tok_budi_0093',
                'tax' => 'none',
                'terms' => [
                    ['no' => 1, 'nominal' => 'Rp 1.000.000', 'due' => '08 Feb 2026', 'status' => 'lunas', 'paidAt' => '07 Feb 2026, 14:30 WIB', 'channel' => 'Mandiri VA (MND-0021)'],
                    ['no' => 2, 'nominal' => 'Rp 1.000.000', 'due' => '12 Feb 2026', 'status' => 'overdue', 'paidAt' => null, 'channel' => 'Mandiri VA #8920199201'],
                    ['no' => 3, 'nominal' => 'Rp 1.000.000', 'due' => '12 Mar 2026', 'status' => 'pending', 'paidAt' => null, 'channel' => null],
                    ['no' => 4, 'nominal' => 'Rp 1.000.000', 'due' => '12 Apr 2026', 'status' => 'pending', 'paidAt' => null, 'channel' => null],
                ],
            ],
            [
                'id' => 'inv-0004',
                'invoice' => 'INV/2026/09/0004',
                'description' => 'Pendaftaran Les Bahasa Inggris',
                'customer' => 'Amanda Putri',
                'wa' => '+62 812-7766-5544',
                'waLink' => '6281277665544',
                'total' => 'Rp 1.500.000',
                'totalValue' => 1500000,
                'sisa' => 'Rp 1.000.000',
                'tenor' => 3,
                'paidCount' => 1,
                'status' => 'active',
                'statusLabel' => 'AKTIF (H-2)',
                'channel' => 'Reminder Antre (12 Feb)',
                'channelIcon' => 'schedule',
                'channelTone' => 'info',
                'channelMeta' => 'BNI VA #9880129401',
                'token' => 'tok_amanda38491',
                'tax' => 'pph23',
                'terms' => [
                    ['no' => 1, 'nominal' => 'Rp 500.000', 'due' => '01 Feb 2026', 'status' => 'lunas', 'paidAt' => '31 Jan 2026, 10:12 WIB', 'channel' => 'BNI VA (BNI-7710)'],
                    ['no' => 2, 'nominal' => 'Rp 500.000', 'due' => '12 Feb 2026', 'status' => 'pending', 'paidAt' => null, 'channel' => null],
                    ['no' => 3, 'nominal' => 'Rp 500.000', 'due' => '12 Mar 2026', 'status' => 'pending', 'paidAt' => null, 'channel' => null],
                ],
            ],
        ];
    }

    /**
     * WhatsApp Automation — template & log.
     */
    public static function waTemplates(): array
    {
        return [
            ['category' => 'h-3', 'label' => 'H-3 Pengingat Awal', 'status' => 'active', 'meta' => 'reminder_h3_formal'],
            ['category' => 'due', 'label' => 'Hari-H Jatuh Tempo', 'status' => 'active', 'meta' => 'due_today_urgent'],
            ['category' => 'overdue', 'label' => 'Overdue H+3 & H+7', 'status' => 'active', 'meta' => 'overdue_notice_tier1'],
            ['category' => 'receipt', 'label' => 'Kuitansi Lunas', 'status' => 'active', 'meta' => 'payment_receipt_success'],
            ['category' => 'new_invoice', 'label' => 'Tagihan Baru Terbit', 'status' => 'active', 'meta' => 'new_invoice_issued'],
        ];
    }

    public static function waLogs(): array
    {
        return [
            ['time' => '10 Feb, 07:00', 'customer' => 'Fahmi Ramadhan', 'phone' => '+6281234567890', 'category' => 'Hari-H', 'message_id' => 'wamid.882910542.001', 'status' => 'delivered'],
            ['time' => '09 Feb, 07:00', 'customer' => 'Fahmi Ramadhan', 'phone' => '+6281234567890', 'category' => 'H-3', 'message_id' => 'wamid.882910419.005', 'status' => 'read'],
            ['time' => '08 Feb, 07:00', 'customer' => 'Dewi Lestari', 'phone' => '+6281298765432', 'category' => 'Hari-H', 'message_id' => 'wamid.882910542.018', 'status' => 'delivered'],
            ['time' => '07 Feb, 07:00', 'customer' => 'Budi Santoso', 'phone' => '+6281155667788', 'category' => 'Overdue', 'message_id' => 'wamid.882910790.033', 'status' => 'failed'],
            ['time' => '10 Feb, 14:22', 'customer' => 'Fahmi Ramadhan', 'phone' => '+6281234567890', 'category' => 'Kuitansi', 'message_id' => 'wamid.882910901.009', 'status' => 'delivered'],
        ];
    }

    /**
     * Template pesan untuk live preview (Alpine) di halaman WA log.
     * Kunci adalah kategori, nilai adalah teks template dengan placeholder.
     */
    public static function waTemplateBodies(): array
    {
        return [
            'h3' => "Halo {{customer_name}}, ini pengingat ramah bahwa tagihan {{invoice_description}} untuk cicilan ke-{{installment_no}} dari {{tenor_count}} sebesar {{amount}} akan jatuh tempo pada {{due_date}}.\n\nSilakan lakukan pembayaran instan sebelum tanggal tersebut melalui link resmi:\n{{portal_link}}",
            'due' => "PENTING: Halo {{customer_name}}, hari ini adalah batas akhir pembayaran tagihan {{invoice_description}} untuk cicilan ke-{{installment_no}} dari {{tenor_count}} sebesar {{amount}}.\n\nHindari denda keterlambatan dengan melakukan pembayaran melalui link terverifikasi:\n{{portal_link}}",
            'overdue' => "PERINGATAN: Halo {{customer_name}}, tagihan {{invoice_description}} cicilan ke-{{installment_no}} sebesar {{amount}} telah melewati jatuh tempo sejak {{due_date}}.\n\nMohon segera selesaikan pelunasan melalui portal resmi kami:\n{{portal_link}}",
            'receipt' => "Halo {{customer_name}} ✅ Pembayaran Anda untuk cicilan ke-{{installment_no}} dari {{tenor_count}} tagihan {{invoice_description}} sebesar {{amount}} telah kami terima dan diverifikasi otomatis.\n\nAnda dapat mengunduh bukti kuitansi elektronik resmi melalui tautan:\n{{portal_link}}",
            'new_invoice' => "Halo {{customer_name}}, tagihan baru untuk {{invoice_description}} dengan total {{amount}} telah diterbitkan. Rincian cicilan dapat Anda akses melalui link portal aman berikut:\n{{portal_link}}",
        ];
    }

    public static function waSampleValues(): array
    {
        return [
            'customer_name' => 'Fahmi Ramadhan',
            'installment_no' => '1',
            'tenor_count' => '3',
            'invoice_description' => 'SPP Semester Ganjil 2026',
            'due_date' => '15 Februari 2026',
            'amount' => 'Rp 1.000.000',
            'portal_link' => 'https://bayarkilat.id/invoice/tok_98f4a1bc7e23',
        ];
    }
}
