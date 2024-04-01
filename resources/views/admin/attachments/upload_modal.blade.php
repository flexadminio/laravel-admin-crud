<x-admin.modal-layout>
    <x-slot name="header">
        Upload Media
    </x-slot>

    <div id="upload-media-wrapper">
        <p><strong>Please select .jpeg, .jpg, .png, .docx, .doc, .pdf, .xls, .xlsx, .msg, .eml file up to 20mb.
            </strong></p>
        <div class="flexadmin-bulk-upload-form">
            <div class="upload-body">
                <div class="form-group control-group optional attachment_files mb-3">
                    <input type="file" name="images[]" id="flexadmin-bulk-upload-input" multiple
                        class="form-control-file">
                </div>
                <img src="{{ Vite::asset('resources/images/loader.gif') }}" alt="Loading" class="upload-loader d-none">
            </div>
        </div>
    </div>
    <script>
        var afterUpload = function() {
            $('#upload-media-wrapper').html(
                '<div class="alert alert-success" role="alert"> <strong>Files are uploaded success!</strong></div>');
            setTimeout(function() {
                window.location.reload();
            }, 4000);
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        var uploadOptions = {
            uploadUrl: "{{ route('attachments.store', ['attachable_type' => $attachable_type, 'attachable_id' => $attachable_id]) }}",
            allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif'],
            maxFileSize: 20,
            previewTemplates: null,
            afterUpload: afterUpload
        };
        window.FlexAdminBulkUploader.init(uploadOptions);
    </script>
</x-admin.modal-layout>
