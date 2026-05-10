(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        var el = document.getElementById('czp-toast-bootstrap');
        if (!el || typeof CzarsToast === 'undefined') return;

        var data;
        try {
            data = JSON.parse(el.textContent);
        } catch (e) {
            return;
        }

        var queue = data.queue || [];
        for (var i = 0; i < queue.length; i++) {
            var item = queue[i];
            CzarsToast.show(item.msg, item.type, 5000);
        }

        var errs = data.validationErrors || [];
        for (var j = 0; j < errs.length; j++) {
            CzarsToast.show(errs[j], 'error', 5000);
        }
    });
})();
