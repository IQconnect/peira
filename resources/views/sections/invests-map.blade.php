@php
    $markers = [];
    $invests = [];

    $query = new WP_Query(array(
        'post_type' => 'inwestycje',
        'post_status' => 'publish'
    ));


    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $post = get_post($post_id);

        $name = $post -> post_title;
        $lat = get_field('lat');
        $lng = get_field('lng');
        $zoom = get_field('zoom');
        $icon = get_field('img_active')['url'];
        $iconActive = get_field('img_inactive')['url'];

        $mark = [
            'name'=> $name,
            'lat'=> $lat,
            'lng'=> $lng,
            'icon'=> $iconActive,
            'iconActive'=> $icon,
            'zoom'=> $zoom,
        ];

        array_push($markers, $mark);
        array_push($invests, $post_id);
    }

    wp_reset_query();


    $JSON_MARKERS =  json_encode($markers);
@endphp

@if ($invests)
<section class="section invest-map">
    <div class="container">
        <div class="invest-map__wrapper">
            @include('components.invests-list', ['invests'=>$invests])
            <div class="invest-map__map" invest-map data-lat="51.7812267" data-lng="19.3825387" data-markers="{{ $JSON_MARKERS }}"></div>
        </div>
    </div>
</section>
@endif
