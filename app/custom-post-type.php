<?php
// Inwestycje
function create_inwestycje() {

    register_post_type( 'inwestycje',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'inwestycje' ),
                'singular_name' => __( 'inwestycje' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'inwestycje'),
            'supports' => array('title'),
            'taxonomies'  => array( 'category' ),
            'menu_icon'  => 'dashicons-admin-multisite',
        )
    );
}

//Zespół
function create_inteam() {

    register_post_type( 'inteam',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Zespół' ),
                'singular_name' => __( 'inteam' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'inteam'),
            'supports' => array('title'),
            'menu_icon'  => 'dashicons-id',
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_inwestycje' );
add_action( 'init', 'create_inteam' );
