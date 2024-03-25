<div class="file-container">
    {!! Form::file($name, null) !!}
    @if (isset($attachable) && $attachable->getFirstMedia('images'))
        <div class="item mt-3">
            <div class="d-inline-block position-relative">
                <a class="flexadmin-ajax-delete-btn remove-image"
                    data-url="{{ route('attachments.destroy', $attachable->hasMedia('images')) }}"
                    data-method="delete" data-confirm="Are you sure you want to delete this image?">&#215;</a>
                <img class="img-thumbnail" alt="{{ $alt }}" src="{{ resource_image_url($attachable) }}" width="68" />
            </div>
        </div>
    @endif
</div>
