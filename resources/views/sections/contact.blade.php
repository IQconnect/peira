@php
    $invests = [];
    $query = new WP_Query(array(
        'post_type' => 'inwestycje',
        'post_status' => 'publish'
    ));


    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $post  = get_post($post_id);

        $invest = [
            'name' => $post->post_title,
            'slug' => $post->post_name,
        ];

        array_push($invests, $invest);
    }

    wp_reset_query();

    $rodo = option('rodo');
    $terms = option('terms');
@endphp

<section class="contact section">
    <div class="container">
        @include('components.form')
    </div>
</section>
