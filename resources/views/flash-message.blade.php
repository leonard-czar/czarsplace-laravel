@php
    $notifyQueue = [];

    $sessionKeys = [
        'success' => 'success',
        'error' => 'error',
        'failed' => 'error',
        'warning' => 'warning',
        'info' => 'info',
        'deny' => 'error',
    ];

    foreach ($sessionKeys as $sessionKey => $toastType) {
        $message = Session::get($sessionKey);
        if ($message !== null && $message !== '') {
            $notifyQueue[] = ['type' => $toastType, 'msg' => $message];
        }
    }

    $paymentMsg = Session::get('msg');
    if ($paymentMsg !== null && $paymentMsg !== '') {
        $paymentType = Session::get('type', 'info');
        $typeMap = [
            'error' => 'error',
            'success' => 'success',
            'warning' => 'warning',
        ];
        $notifyQueue[] = [
            'type' => $typeMap[$paymentType] ?? 'info',
            'msg' => $paymentMsg,
        ];
    }

    $hasValidationErrors = isset($errors) && method_exists($errors, 'any') && $errors->any();
    $shouldLoadNotify = count($notifyQueue) > 0 || $hasValidationErrors;
@endphp

@if ($shouldLoadNotify)
    @once
        <link rel="stylesheet" href="{{ asset('css/toast-notify.css') }}">
        <script src="{{ asset('js/toast-notify.js') }}"></script>
        <script src="{{ asset('js/flash-bootstrap.js') }}" defer></script>
    @endonce

    <script type="application/json" id="czp-toast-bootstrap">{!! json_encode([
        'queue' => $notifyQueue,
        'validationErrors' => $hasValidationErrors ? $errors->all() : [],
    ], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE) !!}</script>
@endif
