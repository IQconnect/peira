<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);

    // Add logo 
    $wp_customize->add_setting('upload_logo');

    $wp_customize->add_control(
        new \WP_Customize_Image_Control(
            $wp_customize,
            'upload_logo',
            array(
                'label' => 'Logo',
                'section' => 'title_tagline',
                'settings' => 'upload_logo',
                'transport' => 'postMessage'
            )
        )
    );

    $wp_customize->add_setting(
        'sm_facebook',
        array(
          'default' => '',
          'sanitize_callback' => 'sanitize_text_field'
        )
      );
    
      $wp_customize->add_control(
        'sm_facebook',
        array(
          'label' => 'Facebook',
          'section' => 'sm_section',
          'settings' => 'sm_facebook',
          'transport' => 'postMessage'
        )
      );

      $wp_customize->add_section( 'sm_section' ,
        array(
            'title'      => __('Social media','Sage'),
            'priority'   => 30,
        ) 
    );

    $wp_customize->add_setting(
        'copyright',
        array(
          'default' => '',
          'sanitize_callback' => 'sanitize_text_field'
        )
      );
    
      $wp_customize->add_control(
        'copyright',
        array(
          'label' => 'Copyright',
          'section' => 'footer',
          'settings' => 'copyright',
          'transport' => 'postMessage'
        )
      );

      $wp_customize->add_section( 'footer' ,
        array(
            'title'      => __('Stopka','Sage'),
            'priority'   => 30,
        ) 
    );

    // Add By image
    $wp_customize->add_setting('by_logo');

    $wp_customize->add_control(
        new \WP_Customize_Image_Control(
            $wp_customize,
            'by_logo',
            array(
                'label' => 'Wykonano przez Logo',
                'section' => 'footer',
                'settings' => 'by_logo',
                'transport' => 'postMessage'
            )
        )
    );


});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});