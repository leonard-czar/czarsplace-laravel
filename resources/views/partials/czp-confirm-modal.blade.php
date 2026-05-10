@once
    <link rel="stylesheet" href="{{ asset('css/czp-confirm-modal.css') }}">
@endonce

<div class="modal fade czp-confirm-modal" id="czpConfirmModal" tabindex="-1" aria-labelledby="czpConfirmModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content czp-confirm-modal__content shadow-lg border-0">
            <div class="modal-header czp-confirm-modal__header border-0 pb-0">
                <h5 class="modal-title czp-confirm-modal__title" id="czpConfirmModalLabel">Confirm</h5>
                <button type="button" class="btn-close czp-confirm-modal__close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body czp-confirm-modal__body pt-2" id="czpConfirmModalBody">
                Are you sure?
            </div>
            <div class="modal-footer czp-confirm-modal__footer border-0 pt-0">
                <button type="button" class="btn czp-confirm-modal__btn-cancel" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn czp-confirm-modal__btn-ok" id="czpConfirmModalOk">
                    <span id="czpConfirmModalOkLabel">Yes, continue</span>
                </button>
            </div>
        </div>
    </div>
</div>
