(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        var modalEl = document.getElementById('czpConfirmModal');
        if (!modalEl || typeof bootstrap === 'undefined' || !bootstrap.Modal) {
            return;
        }

        var modal =
            bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
        var titleEl = document.getElementById('czpConfirmModalLabel');
        var bodyEl = document.getElementById('czpConfirmModalBody');
        var okBtn = document.getElementById('czpConfirmModalOk');
        var okLabelEl = document.getElementById('czpConfirmModalOkLabel');
        var pendingForm = null;

        function bindForm(form) {
            form.addEventListener('submit', function (e) {
                if (form.getAttribute('data-czp-skip-confirm') === '1') {
                    form.removeAttribute('data-czp-skip-confirm');
                    return;
                }
                if (!form.hasAttribute('data-czp-confirm')) {
                    return;
                }
                e.preventDefault();
                pendingForm = form;

                var title = form.getAttribute('data-czp-confirm-title') || 'Please confirm';
                var body = form.getAttribute('data-czp-confirm-body') || 'Are you sure you want to continue?';
                var okText = form.getAttribute('data-czp-confirm-ok') || 'Yes, continue';

                if (titleEl) {
                    titleEl.textContent = title;
                }
                if (bodyEl) {
                    bodyEl.textContent = body;
                }
                if (okLabelEl) {
                    okLabelEl.textContent = okText;
                }

                modal.show();
            });
        }

        document.querySelectorAll('form[data-czp-confirm]').forEach(bindForm);

        if (okBtn) {
            okBtn.addEventListener('click', function () {
                if (!pendingForm) {
                    modal.hide();
                    return;
                }
                var form = pendingForm;
                pendingForm = null;
                form.setAttribute('data-czp-skip-confirm', '1');
                modal.hide();
                if (typeof form.requestSubmit === 'function') {
                    form.requestSubmit();
                } else {
                    form.submit();
                }
            });
        }

        modalEl.addEventListener('hidden.bs.modal', function () {
            pendingForm = null;
        });
    });
})();
