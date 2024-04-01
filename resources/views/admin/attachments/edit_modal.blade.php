<x-admin.modal-layout>
    <x-slot name="header">
        Edit Media
    </x-slot>

    <div id="edit-media-wrapper">
        {!! Form::model($attachment, ['method' => 'POST', 'route' => ['attachments.update', $attachment->id], 'data-remote' => "true"]) !!}
            @csrf
            @method('PUT')
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <div class="row">
                <div class="col-4">
                    <img src="{{ attachment_url($attachment) }}" alt="{{ $attachment->custom_properties['alt_text'] }}"
                        width="400px" class="img-thumbnail">
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label for="attachment-name">Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="name" value="{{ $attachment->name }}"
                                                    id="attachment-name" class="form-control" />
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label class="custom-checkbox">
                                                    <input id="attachment-featured" type="checkbox"
                                                        name="custom_properties[featured]" value="true"
                                                        {{ $attachment->getCustomProperty('featured', 'false') == 'true' ? 'checked=checked' : '' }} />
                                                    Featured
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label for="attachment-alt-text">Alt text</label>
                                                <input type="text" name="custom_properties[alt_text]"
                                                    value="{{ $attachment->custom_properties['alt_text'] }}"
                                                    id="attachment-custom-properties-alt-text" class="form-control" />
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label for="attachment-title">Title</label>
                                                <input type="text" name="custom_properties[title]"
                                                    value="{{ $attachment->custom_properties['title'] }}"
                                                    id="attachment-custom-properties-title" class="form-control" />
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label for="attachment-caption">Caption</label>
                                                <input type="text" name="custom_properties[caption]"
                                                    value="{{ $attachment->custom_properties['caption'] }}"
                                                    id="attachment-custom-properties-caption" class="form-control" />
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                    <div class="modal-footer">
                                        <button class="btn btn-highlight waves-effect" type="submit"><i
                                                class="fa-regular fa-floppy-disk"></i> Save</button>
                                    </div>
                                </div>
                                <!-- end card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    <script></script>
</x-admin.modal-layout>
