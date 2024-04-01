@props([
    'mainactions',
    'bulkactions',
])
 
<div class="row mb-4">
    <div class="col-12">
        <div class="input-group">
            {{ $mainactions }}
            @if(isset($bulkactions))
              <button type="button" class="btn btn-highlight dropdown-toggle dropdown-toggle-split waves-effect"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-list-check"></i>
                  <span class="d-none d-md-inline">{{ __('Bulk Actions') }}</span>
              </button>
              <ul class="dropdown-menu">
                  {{ $bulkactions }}
              </ul>
            @endif
        </div>
    </div>
</div>
