{{-- @if(!empty(config('custom.public.global.js')))
  @foreach(config('custom.public.global.js') as $script)
      <script src="{{ asset($script) }}" type="text/javascript"></script>
  @endforeach
@endif --}}

<script>
  var jQuery = window.$;
</script>

<?php
  $action = Route::currentRouteAction();
  $action = explode('@', $action);
  $action = end($action);
?>
