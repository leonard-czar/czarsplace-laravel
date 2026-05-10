(function () {
    var qtyInput = document.getElementById('quantity');
    var form = document.getElementById('edit-cart-form');
    var out = document.getElementById('line-total-value');
    if (!qtyInput || !form || !out) return;

    var unitPrice = parseFloat(form.getAttribute('data-unit-price'));
    if (isNaN(unitPrice)) return;

    function formatMoney(n) {
        return n.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function updateLineTotal() {
        var q = parseInt(qtyInput.value, 10);
        if (!q || q < 1) {
            out.textContent = '—';
            return;
        }
        out.textContent = '₦' + formatMoney(q * unitPrice);
    }

    qtyInput.addEventListener('input', updateLineTotal);
    qtyInput.addEventListener('change', updateLineTotal);
})();
