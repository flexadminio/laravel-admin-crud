<x-admin.modal-layout>
    <x-slot name="modalSize">
        modal-md
    </x-slot>
    <x-slot name="header">
        Bulk Delete  {{ str_plural(ucfirst($resourceType)) }}
    </x-slot>

    <div id="bulk-delete-resources-wrapper">
        <form action="{{ route('resources.bulk.delete.delete') }}" method="POST" data-remote="true">
            @csrf
            @method('DELETE')
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-4 mt-4">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-danger">Are you sure you want to delete the selected {{ ucwords(str_humanize(str_plural($resourceType))) }}?</p>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        <input type="hidden" name="resource_type" id="resource_type" value="{{$resourceType}}">
                        <input type="hidden" name="resource_ids" id="resource_ids" value="">
                    </div>
                    <div class="text-end">
                        <button class="btn btn-highlight waves-effect" type="submit">Submit</button>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </form>

    </div>
    <script>
      $(document).ready(function() {
        var ids = $('.resources-datatable tbody input[type="checkbox"]:checked').map(function() {
          return $(this).data('id');
        }).get();
        $('#bulk-delete-resources-wrapper #resource_ids').val(ids);
      });
    </script>
</x-admin.modal-layout>
