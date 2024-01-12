@if($status)
    <span class="badge badge-success">{{ __("Active") }}</span>
@else
    <span class="badge badge-danger">{{ __("Deactive") }}</span>
@endif
