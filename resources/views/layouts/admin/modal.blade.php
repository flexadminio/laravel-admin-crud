@props([
    'modalSize' => 'modal-lg',
])

<div class="modal" data-bs-backdrop="static" role="dialog" aria-modal="true">
    <div class="modal-dialog {{$modalSize}}">
        <div class="modal-content">
            <div class="modal-header">
                @if (isset($header))
                  <h4 class="modal-title">{{ $header }}</h4>
                @endif
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body-container">
                <div class="modal-body">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
