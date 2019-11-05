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
// Hooking up our function to theme setup
add_action( 'init', 'create_inwestycje' );