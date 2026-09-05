import Alpine from 'alpinejs';
import * as bk from './helpers';
import { parseCurrency, formatIDR, currency, buildSchedule } from './helpers';

/* ============================================================
   BayarKilat — Alpine.js global components (reusable)
   Akses di Blade via: x-data="accordion", x-data="tabs('tab-key')", dst.
   ============================================================ */

/* ----------------------- Accordion ----------------------- */
Alpine.data('accordion', () => ({
    open: null,
    toggle(key) {
        this.open = this.open === key ? null : key;
    },
    isOpen(key) {
        return this.open === key;
    },
}));

/* ----------------------- Tabs / switchTab ----------------------- */
Alpine.data('tabs', (initial = null) => ({
    active: initial,
    set(key) {
        this.active = key;
    },
    isActive(key) {
        return this.active === key;
    },
}));

/* ----------------------- Toast notification ----------------------- */
Alpine.data('toast', () => ({
    visible: false,
    message: '',
    timer: null,
    show(msg = '') {
        this.message = msg || this.message;
        this.visible = true;
        clearTimeout(this.timer);
        this.timer = setTimeout(() => {
            this.visible = false;
        }, 2800);
    },
    hide() {
        this.visible = false;
    },
}));

/* ----------------------- Clipboard (salin nilai) ----------------------- */
Alpine.data('clipboard', (toast = null) => ({
    copy(text, successMsg = 'Berhasil disalin') {
        navigator.clipboard.writeText(text).then(() => {
            if (toast && window.AlpineifyToast) {
                window.AlpineifyToast(successMsg);
            } else if (toast && toast.show) {
                toast.show(successMsg);
            } else {
                alert(successMsg);
            }
        });
    },
}));

/* ----------------------- Countdown timer ----------------------- */
Alpine.data('countdown', (seconds) => ({
    total: Number(seconds) || 0,
    display: '00:00:00',
    init() {
        this.tick();
        this.interval = setInterval(() => {
            if (this.total <= 0) {
                clearInterval(this.interval);
                return;
            }
            this.total -= 1;
            this.tick();
        }, 1000);
    },
    tick() {
        const t = this.total;
        const h = String(Math.floor(t / 3600)).padStart(2, '0');
        const m = String(Math.floor((t % 3600) / 60)).padStart(2, '0');
        const s = String(t % 60).padStart(2, '0');
        this.display = `${h}:${m}:${s}`;
    },
}));

/* ----------------------- Modal / Drawer ----------------------- */
Alpine.data('modal', () => ({
    open: false,
    show() {
        this.open = true;
    },
    hide() {
        this.open = false;
    },
    toggle() {
        this.open = !this.open;
    },
}));

/* ----------------------- Live template preview (WA Log) ----------------------- */
Alpine.data('templatePreview', (templates, samples) => ({
    templates,
    samples,
    activeKey: Object.keys(templates)[0] ?? null,
    editorText: '',
    init() {
        this.select(Object.keys(this.templates)[0] ?? null);
    },
    get active() {
        return this.templates[this.activeKey] ?? {};
    },
    get charCount() {
        return this.editorText.length;
    },
    get charLimit() {
        return 1024;
    },
    get previewText() {
        let text = this.editorText;
        for (const [key, value] of Object.entries(this.samples)) {
            text = text.split(`{{${key}}}`).join(value);
        }
        return text;
    },
    select(key) {
        if (!key) return;
        this.activeKey = key;
        this.editorText = this.templates[key].text;
    },
    isActive(key) {
        return this.activeKey === key;
    },
    insertVariable(variable, toast) {
        const editor = this.$refs.editor;
        const start = editor.selectionStart;
        const end = editor.selectionEnd;
        const text = editor.value;
        editor.value = text.substring(0, start) + variable + text.substring(end);
        this.editorText = editor.value;
        setTimeout(() => editor.focus(), 0);
        if (toast) {
            toast.show(`Variabel ${variable} ditambahkan`);
        }
    },
}));

/* ----------------------- Filter pencarian tabel ----------------------- */
Alpine.data('tableFilter', () => ({
    query: '',
    filter(items, fields) {
        const q = this.query.trim().toLowerCase();
        if (!q) return items;
        return items.filter((item) =>
            fields.some((field) =>
                String(item[field] ?? '').toLowerCase().includes(q)
            )
        );
    },
}));

/* ----------------------- Customer searchable combobox ----------------------- */
Alpine.data('customerCombobox', (serverCustomers = []) => ({
    query: '',
    isOpen: false,
    selected: null,
    results: [],
    customers: [],

    init() {
        const stored = JSON.parse(localStorage.getItem('bk_customers') || '[]');
        this.customers = [...serverCustomers, ...stored];
        this.results = this.customers;
        document.addEventListener('click', (e) => {
            if (!this.$el.contains(e.target)) this.isOpen = false;
        });
    },

    search() {
        if (!this.query) {
            this.results = this.customers;
            return;
        }
        const q = this.query.toLowerCase();
        this.results = this.customers.filter(
            (c) =>
                c.name.toLowerCase().includes(q) ||
                c.id.toLowerCase().includes(q) ||
                c.phone.includes(q)
        );
    },

    selectCustomer(c) {
        this.selected = { ...c };
        this.query = '';
        this.isOpen = false;
        this.$dispatch('customer-selected', { customer: c });
    },

    registerNew() {
        const name = this.query.trim();
        if (!name) return;
        const newC = {
            id: 'CUS-' + Date.now().toString(36).toUpperCase(),
            name,
            phone: '',
            email: '',
            segment: 'Baru',
            isNew: true,
            initials: name
                .split(' ')
                .map((w) => w[0])
                .join('')
                .substring(0, 2)
                .toUpperCase(),
        };
        this.customers.push(newC);
        localStorage.setItem('bk_customers', JSON.stringify(this.customers));
        this.selectCustomer(newC);
    },

    clearSelection() {
        this.selected = null;
        this.query = '';
        this.results = this.customers;
        this.$dispatch('customer-cleared');
    },
}));

/* ----------------------- Direktori pelanggan (Data Pelanggan) ----------------------- */
Alpine.data('directoryCustomers', (serverCustomers = []) => ({
    tab: 'all',
    query: '',
    category: '',
    waStatus: '',
    method: '',
    customers: [],
    selectedIndex: 0,
    addOpen: false,
    viewMode: localStorage.getItem('bk_view_mode') ?? (window.innerWidth < 640 ? 'cards' : 'table'),
    form: {
        name: '',
        phone: '',
        category: '',
        email: '',
        gateway: '',
    },

    init() {
        const stored = JSON.parse(localStorage.getItem('bk_directory_customers') || '[]');
        this.customers = [...serverCustomers, ...stored.map((c) => ({ ...c, isNew: true }))];
        if (this.customers.length > 0) this.selectedIndex = 0;
    },

    setViewMode(mode) {
        this.viewMode = mode;
        localStorage.setItem('bk_view_mode', mode);
    },

    get terms() {
        return this.customers.filter((c) => this.tab === 'all' || this.tab === c.bucket);
    },

    get filtered() {
        const q = this.query.trim().toLowerCase();
        return this.terms.filter((c) => {
            const matchQuery =
                !q ||
                c.name.toLowerCase().includes(q) ||
                c.id.toLowerCase().includes(q) ||
                c.phone.toLowerCase().includes(q) ||
                (c.email || '').toLowerCase().includes(q);
            const matchCategory = !this.category || (c.invoiceCategory || '') === this.category;
            const matchWa = !this.waStatus || this.waStatus === (c.wa ? c.wa.status : '');
            const matchMethod =
                !this.method || (c.method ? c.method.icon : '') === this.method;
            return matchQuery && matchCategory && matchWa && matchMethod;
        });
    },

    get active() {
        return this.filtered[this.selectedIndex] ?? null;
    },

    get bucketed() {
        return this.customers.map((c) => {
            if (c.isNew) return { ...c, bucket: 'new' };
            if (c.invoice === null) return { ...c, bucket: 'new' };
            if (c.overdue) return { ...c, bucket: 'overdue' };
            if (c.progress >= 100) return { ...c, bucket: 'done' };
            return { ...c, bucket: 'active' };
        });
    },

    get counts() {
        const base = this.bucketed;
        return {
            all: base.length,
            active: base.filter((c) => c.bucket === 'active').length,
            overdue: base.filter((c) => c.bucket === 'overdue').length,
            done: base.filter((c) => c.bucket === 'done').length,
            new: base.filter((c) => c.bucket === 'new').length,
        };
    },

    select(index) {
        const row = this.filtered[index];
        if (!row) return;
        this.selectedIndex = index;
        window.AlpineifyToast?.(`Pratinjau data: ${row.name}`);
    },

    resetFilters() {
        this.query = '';
        this.category = '';
        this.waStatus = '';
        this.method = '';
        this.tab = 'all';
    },

    get methodOptions() {
        return {
            account_balance: 'Virtual Account',
            qr_code_2: 'QRIS',
        };
    },

    submitNewCustomer() {
        const name = this.form.name.trim();
        if (!name) return;
        const initials = name
            .split(' ')
            .map((w) => w[0])
            .join('')
            .substring(0, 2)
            .toUpperCase();
        const created = {
            id: 'CUST-' + Date.now().toString(36).toUpperCase(),
            name,
            initials,
            avatar: { bg: 'bg-secondary', text: 'text-on-secondary' },
            join_at: 'Hari Ini',
            phone: this.form.phone || '(belum diisi)',
            email: this.form.email || '',
            wa: { status: 'Aktif', tone: 'success' },
            invoice: null,
            status: { label: 'Data Tersimpan', bg: 'bg-surface-subtle', text: 'text-text-secondary', dot: 'bg-text-tertiary' },
            method: { icon: 'account_balance', label: this.form.gateway || 'Virtual Account' },
            invoiceCategory: this.form.category || '',
            action: 'create',
            schedule: [],
            isNew: true,
        };
        this.customers = [...this.bucketed, created].map((c) => ({
            ...c,
            bucket: c.bucket || (c.isNew ? 'new' : 'active'),
        }));
        localStorage.setItem('bk_directory_customers', JSON.stringify([created]));
        this.resetFilters();
        this.selectedIndex = this.customers.length - 1;
        this.form = { name: '', phone: '', category: '', email: '', gateway: '' };
        this.addOpen = false;
        window.AlpineifyToast?.('Data pelanggan baru berhasil ditambahkan ke direktori!');
    },
}));

/* ----------------------- Kalkulator Tenor (Buat Tagihan) ----------------------- */
Alpine.data('tenorCalculator', (initial = {}) => ({
    totalText: String(initial.total ?? ''),
    tenor: Number(initial.tenor || 3),
    isCustomTenor: false,
    policy: initial.policy || 'last',
    interval: initial.interval || 'monthly',
    customIntervalDays: initial.customIntervalDays || 14,
    issuedDate: initial.issuedDate || '2026-01-10',
    waOn: initial.waOn !== false,
    token: initial.token || '',

    // State Section A (diangkat ke scope ini agar Section B & preview bisa membaca).
    customer: null,
    description: '',
    wa: '',
    descriptionConfirmed: false,
    sectionBGlow: false,

    // State modal Kustom Termin.
    customModalOpen: false,
    customTenorInput: 1,
    customTenorError: '',

    init() {
        this.$refs.totalInput?.addEventListener('input', this.onTotalInput.bind(this));
        this.$watch('customerReady', (ready) => {
            if (ready) this.highlightSectionB();
        });
    },

    /* ---- Sinkronisasi dari Section A ---- */
    setCustomer(customer) {
        this.customer = customer;
        if (customer && customer.phone && !customer.isNew) {
            this.wa = customer.phone;
        }
        this.resetDescriptionGate();
    },

    clearCustomer() {
        this.customer = null;
        this.wa = '';
        this.sectionBGlow = false;
        this.resetDescriptionGate();
    },

    /* Deskripsi dikonfirmasi via tombol Enter, bukan per-keystroke,
       sehingga Section B tidak tertrigger lebih awal hanya karena
       user mengetik satu karakter. */
    onDescriptionKeydown(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            this.confirmDescription();
        }
    },

    onDescriptionInput() {
        this.resetDescriptionGate();
    },

    confirmDescription() {
        if (!String(this.description || '').trim()) return;
        this.descriptionConfirmed = true;
        this.focusTotalInput();
    },

    resetDescriptionGate() {
        this.descriptionConfirmed = false;
    },

    /* ---- Validitas gerbang: pelanggan + WA + deskripsi dikonfirmasi ---- */
    get customerReady() {
        return Boolean(
            this.customer &&
            this.customer.name &&
            String(this.wa || '').trim() &&
            this.descriptionConfirmed
        );
    },

    /* ---- Auto-focus ke Total Nominal + highlight ringkas Section B ---- */
    focusTotalInput() {
        this.$nextTick(() => {
            const input = this.$refs.totalInput;
            if (!input) return;
            input.focus();
            input.scrollIntoView({ behavior: 'smooth', block: 'center' });
        });
    },

    highlightSectionB() {
        this.sectionBGlow = true;
        this.$nextTick(() => {
            const node = this.$refs.sectionB;
            if (node) node.scrollIntoView({ behavior: 'smooth', block: 'start' });
            setTimeout(() => {
                this.sectionBGlow = false;
            }, 2200);
        });
    },

    /* ---- Perhitungan aktif hanya jika Section A valid ---- */
    get total() {
        return this.customerReady ? parseCurrency(this.totalText) : 0;
    },

    get schedule() {
        return buildSchedule(this.total, this.tenor, this.policy);
    },

    get dueDates() {
        return buildDueDates(this.issuedDate, this.interval, this.customIntervalDays, this.tenor);
    },

    /* Label tanggal terbit terformat (ISO -> "10 Jan 2026"). */
    get issuedDateLabel() {
        return formatISODate(this.issuedDate);
    },

    onTotalInput(e) {
        if (!this.customerReady) {
            e.target.value = '';
            return;
        }
        const digits = e.target.value.replace(/[^\d]/g, '');
        e.target.value = digits ? formatIDR(digits) : '';
        this.totalText = e.target.value;
    },

    /* ---- Tenor / Frekuensi Pembagian Cicilan ---- */
    setTenor(value) {
        if (!this.customerReady) return;
        const parsed = Math.max(1, parseInt(value, 10) || 1);
        this.tenor = parsed;
        this.isCustomTenor = false;
    },

    isTenor(value) {
        return !this.isCustomTenor && this.tenor === Number(value);
    },

    /* ---- Modal Kustom Termin ---- */
    openCustomModal() {
        this.customTenorInput = this.tenor;
        this.customTenorError = '';
        this.customModalOpen = true;
        this.$nextTick(() => {
            const input = this.$refs.customTenorInputRef;
            if (!input) return;
            input.focus();
            input.select();
        });
    },

    closeCustomModal() {
        this.customModalOpen = false;
    },

    applyCustomTenor() {
        const parsed = parseInt(this.customTenorInput, 10);
        if (!Number.isInteger(parsed) || parsed < 2 || parsed > 48) {
            this.customTenorError = 'Masukkan jumlah termin antara 2 hingga 48.';
            return;
        }
        this.tenor = parsed;
        this.isCustomTenor = true;
        this.customModalOpen = false;
        this.customTenorError = '';
        this.focusTotalInput();
    },

    /* ---- Interval Waktu Jatuh Tempo ---- */
    isInterval(value) {
        return this.interval === value;
    },

    setInterval(value) {
        if (!this.customerReady) return;
        this.interval = value;
    },

    /* Quick-pick nilai hari untuk interval kustom.
       Menyinkronkan nilai sekaligus mengaktifkan mode custom. */
    setCustomIntervalDays(days) {
        const parsed = Math.max(1, parseInt(days, 10) || 1);
        this.customIntervalDays = parsed;
        this.setInterval('custom');
    },

    /* Membuka kalender native pada input tanggal terbit.
       Memakai Web API showPicker() (Chromium/Firefox) dengan
       fallback focus + click untuk browser yang belum mendukung. */
    openDatePicker() {
        this.$nextTick(() => {
            const input = this.$refs.issuedDateRef;
            if (!input) return;
            if (typeof input.showPicker === 'function') {
                try {
                    input.showPicker();
                    return;
                } catch (_) {
                    /* fallback di bawah */
                }
            }
            input.focus();
            input.click();
        });
    },

    focusSectionA() {
        this.$nextTick(() => {
            const node = this.$refs.sectionA;
            if (node) node.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    },
}));

/* Balancing dari string ISO (YYYY-MM-DD); aman dari pergeseran zona waktu. */
function parseISODate(value) {
    const m = /^(\d{4})-(\d{2})-(\d{2})$/.exec(String(value || '').trim());
    if (!m) return null;
    return new Date(Number(m[1]), Number(m[2]) - 1, Number(m[3]));
}

function formatISODate(value) {
    const d = parseISODate(value);
    if (!d) return '';
    const v = String(value || '');
    const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    return `${d.getDate()} ${monthNames[d.getMonth()]} ${d.getFullYear()}`;
}

function buildDueDates(issuedDate, interval, customDays, count) {
    const base = parseISODate(issuedDate) || new Date();
    const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    const out = [];

    for (let i = 0; i < count; i += 1) {
        const d = new Date(base);
        if (interval === 'weekly') d.setDate(d.getDate() + 7 * i);
        else if (interval === 'biweekly') d.setDate(d.getDate() + 14 * i);
        else if (interval === 'custom') d.setDate(d.getDate() + Math.max(1, Number(customDays) || 7) * i);
        else d.setMonth(base.getMonth() + i);
        out.push(`${d.getDate()} ${monthNames[d.getMonth()]} ${d.getFullYear()}`);
    }
    return out;
}

/* ---- Monitoring: daftar tagihan & jadwal termin (drawer rincian) ---- */
Alpine.data('monitoringTable', (serverInvoices = []) => ({
    invoices: Array.isArray(serverInvoices) ? serverInvoices : [],
    selected: null,
    viewMode: localStorage.getItem('bk_view_mode') ?? (window.innerWidth < 640 ? 'cards' : 'table'),

    setViewMode(mode) {
        this.viewMode = mode;
        localStorage.setItem('bk_view_mode', mode);
    },

    openDetail(invoice) {
        this.selected = invoice;
        this.$nextTick(() => {
            const panel = this.$refs.monitoringPanel;
            const backdrop = this.$refs.monitoringBackdrop;
            if (panel) panel.classList.remove('translate-x-full');
            if (backdrop) {
                backdrop.classList.remove('pointer-events-none', 'opacity-0');
                backdrop.classList.add('opacity-100');
            }
        });
    },

    closeDrawer() {
        const panel = this.$refs.monitoringPanel;
        const backdrop = this.$refs.monitoringBackdrop;
        if (panel) panel.classList.add('translate-x-full');
        if (backdrop) {
            backdrop.classList.add('pointer-events-none', 'opacity-0');
            backdrop.classList.remove('opacity-100');
        }
        this.$nextTick(() => {
            this.selected = null;
        });
    },

    progressWidth(invoice) {
        if (!invoice || !invoice.tenor) return 0;
        const paid = Math.min(invoice.paidCount || 0, invoice.tenor);
        return Math.round((paid / invoice.tenor) * 100);
    },

    statusTone(status) {
        const tones = { lunas: 'success', due: 'warning', overdue: 'danger', pending: 'neutral', active: 'info' };
        return tones[status] || 'neutral';
    },

    termStatusLabel(status) {
        const labels = { lunas: 'LUNAS', due: 'JATUH TEMPO', overdue: 'OVERDUE', pending: 'MENUNGGU', active: 'AKTIF' };
        return labels[status] || String(status).toUpperCase();
    },
}));

/* ---- App shell: sidebar drawer responsif (mobile <-> desktop) ---- */
Alpine.data('appShell', () => ({
    sidebarOpen: window.innerWidth >= 1024,
    prevWidth: window.innerWidth,

    init() {
        this.syncFromViewport();
        window.addEventListener('resize', () => this.syncFromViewport());
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') this.closeSidebar();
        });
    },

    syncFromViewport() {
        const width = window.innerWidth;
        if (width >= 1024) {
            this.sidebarOpen = true;
        } else if (this.prevWidth >= 1024) {
            this.sidebarOpen = false;
        }
        this.prevWidth = width;
    },

    toggleSidebar() {
        this.sidebarOpen = !this.sidebarOpen;
    },

    openSidebar() {
        this.sidebarOpen = true;
    },

    closeSidebar() {
        this.sidebarOpen = false;
    },
}));

/* Ekspose helper ke window agar bisa dipanggil dari halaman mana pun. */
window.bk = bk;

window.Alpine = Alpine;
Alpine.start();
