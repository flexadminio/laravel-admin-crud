<x-admin.modal-layout>
    <x-slot name="modalSize">
        modal-md
    </x-slot>
    <x-slot name="header">
        Bulk Update Product Status
    </x-slot>

    <div id="bulk-update-status-wrapper">
        <form action="{{ route('product.bulk.status.update') }}" method="POST" data-remote="true">
            @csrf
            @method('PUT')
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="product-status">Status</label>
                                {!! Form::select('status', App\Enums\ProductStatus::toSelectArray(), 1, [
                                    'class' => 'form-control input-lg select2',
                                    'id' => 'status_id',
                                    'name' => 'status_id',
                                    'data-placeholder' => 'Select status',
                                ]) !!}
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    <input type="hidden" name="product_ids" id="product_ids" value="">
                </div>
                <!-- end card-body -->
                <div class="modal-footer">
                    <button class="btn btn-highlight waves-effect" type="submit">
                      <i class="fa fa-save"></i>
                      Save
                    </button>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </form>
      </div>
    <script>
      $(document).ready(function() {
        var ids = $('#product-datatable tbody input[type="checkbox"]:checked').map(function() {
          return $(this).data('id');
        }).get();
        $('#bulk-update-status-wrapper #product_ids').val(ids);
      });
    </script>
</x-admin.modal-layout>
