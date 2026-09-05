/**
 * BayarKilat — utilities (reusable lintas halaman).
 *
 * Dipakai via `window.bk.*` dari Blade (inline/`x-on`) maupun dari komponen
 * Alpine lain. Contoh:
 *   - bk.formatIDR(1000000)      => "1.000.000"
 *   - bk.currency(1000000)       => "Rp 1.000.000"
 *   - bk.parseCurrency("1.000.000") => 1000000
 *   - bk.buildSchedule(total, tenor, policy) => { rows, base, ... }
 */

const DIGITS_ONLY = /[^\d]/g;

/**
 * Bersihkan string angka dari pemisah (titik/koma/spasi) lalu kembalikan integer.
 * @param {string|number} value
 * @returns {number}
 */
function parseNumber(value) {
    if (typeof value === 'number') return Math.trunc(value) || 0;
    const cleaned = String(value == null ? '' : value).replace(DIGITS_ONLY, '');
    const parsed = Number.parseInt(cleaned, 10);
    return Number.isFinite(parsed) ? parsed : 0;
}

/**
 * Parse string rupiah menjadi integer dengan fallback aman.
 * @param {string|number} value
 * @returns {number}
 */
function parseCurrency(value) {
    return parseNumber(value);
}

/**
 * Format angka menjadi "1.000.000" (pemisah ribuan, tanpa simbol Rp).
 * @param {number} value
 * @returns {string}
 */
function formatIDR(value) {
    return parseNumber(value).toLocaleString('id-ID');
}

/**
 * Format angka menjadi "Rp 1.000.000".
 * @param {number} value
 * @returns {string}
 */
function currency(value) {
    return `Rp ${formatIDR(value)}`;
}

/**
 * Bangun jadwal angsuran dengan penanganan sisa bagi (rounding policy).
 *
 * Algoritma:
 *   base      = floor(total / tenor)
 *   remainder = total - (base * tenor)   // selalu 0 <= remainder < tenor
 *   policy 'last'  -> seluruh sisa dijumlahkan ke termin terakhir.
 *   policy 'first' -> seluruh sisa dijumlahkan ke termin pertama.
 *
 * Jumlah seluruh termin selalu identik dengan `total` => delta = 0 (presisi 100%).
 *
 * @param {number} total        Nilai pokok tagihan induk.
 * @param {number} tenor        Jumlah termin (>= 1).
 * @param {'last'|'first'} policy Kebijakan alokasi sisa.
 * @returns {{base:number, remainder:number, delta:number, rows:Array<object>}}
 */
function buildSchedule(total, tenor, policy = 'last') {
    const parsedTotal = Math.max(0, parseNumber(total));
    const parsedTenor = Math.max(1, parseInt(tenor, 10) || 1);
    const order = policy === 'first' ? 'first' : 'last';

    const base = Math.floor(parsedTotal / parsedTenor);
    const remainder = parsedTotal - base * parsedTenor;

    const rows = Array.from({ length: parsedTenor }, (_, i) => {
        const no = i + 1;
        const isRemainderTerm = order === 'last' ? no === parsedTenor : no === 1;
        const amount = base + (isRemainderTerm ? remainder : 0);
        return {
            no,
            label: installmentLabel(no),
            amount,
            amountText: currency(amount),
            remainder: isRemainderTerm ? remainder : 0,
            isLast: no === parsedTenor,
            isFirst: no === 1,
        };
    });

    const totalApplied = rows.reduce((sum, row) => sum + row.amount, 0);

    return {
        base,
        remainder,
        order,
        tenor: parsedTenor,
        total: parsedTotal,
        rows,
        delta: parsedTotal - totalApplied,
        totalApplied,
        totalText: currency(parsedTotal),
        baseText: currency(base),
        remainderText: currency(remainder),
        formulaText: `${formatIDR(parsedTotal)} ÷ ${parsedTenor}`,
    };
}

/**
 * Label termin human-readable.
 * @param {number} no
 * @returns {string}
 */
function installmentLabel(no) {
    if (no === 1) return 'Cicilan Pertama';
    if (no === 2) return 'Cicilan Kedua';
    if (no === 3) return 'Cicilan Ketiga';
    return `Cicilan Ke-${no}`;
}

/**
 * Titik-titik umum untuk modal & helper.
 */
const bk = {
    parseNumber,
    parseCurrency,
    formatIDR,
    currency,
    buildSchedule,
    installmentLabel,
};

export { parseNumber, parseCurrency, formatIDR, currency, buildSchedule, installmentLabel };
export default bk;
