@php
$mark = option('marker');

$JSON_MARKER =  json_encode($mark);

@endphp

<section class="office-map" data-office-map="{{ $JSON_MARKER }}"></section>
