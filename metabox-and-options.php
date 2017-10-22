<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

function stock_theme_options( $options ){
    $options = array(); // remove default theme options

    $options[]    = array(
        'name'      => 'stock_mr_blog_settings',
        'title'     => 'Blog Settings',
        'icon'      => 'fa fa-pencil',
        'fields'    => array(
            array(
                'id'        => 'display_post_by',
                'type'      => 'switcher',
                'default'   =>  true,
                'title'     => 'Display Post By?',
                'desc'    => 'If you want to show posted by name on blog index page and single blog, select on',
            ),
            array(
                'id'        => 'display_post_date',
                'type'      => 'switcher',
                'default'   =>  true,
                'title'     => 'Display Post Date?',
                'desc'    => 'If you want to show blog post date on blog index page and single blog, select on',
            ),
            array(
                'id'        => 'display_post_comment_count',
                'type'      => 'switcher',
                'default'   =>  true,
                'title'     => 'Display Comment Count?',
                'desc'    => 'If you want to show comments count on blog index page, select on',
            ),
            array(
                'id'        => 'display_post_category',
                'type'      => 'switcher',
                'default'   =>  true,
                'title'     => 'Display Post Categories?',
                'desc'    => 'If you want to show blog categories on blog index page and single blog, select on',
            ),
            array(
                'id'        => 'display_post_tag',
                'type'      => 'switcher',
                'default'   =>  true,
                'title'     => 'Display Post Tags?',
                'desc'    => 'If you want to show tags on blog index page and single blog, select on',
            ),
            array(
                'id'        => 'display_post_nav',
                'type'      => 'switcher',
                'default'   =>  true,
                'title'     => 'Enable next previous link on single post?',
                'desc'    => 'If you want to show next previous link on single blog, select on',
            ),
        )
    );

    $options[]    = array(
        'name'      => 'stock_mr_footer_settings',
        'title'     => 'Footer Settings',
        'icon'      => 'fa fa-file-archive-o',
        'fields'    => array(
            array(
                'id'        => 'footer_bg_color',
                'type'      => 'color_picker',
                'default'   =>  '#2a2d2f',
                'title'     => 'Footer Background Color',
            ),
            array(
                'id'        => 'footer_text_color',
                'type'      => 'color_picker',
                'default'   =>  '#afb9c0',
                'title'     => 'Footer Text Color',
            ),
            array(
                'id'        => 'footer_heading_color',
                'type'      => 'color_picker',
                'default'   =>  '#ffffff',
                'title'     => 'Footer Heading Color',
            ),
            array(
                'id'        => 'footer_copyright_text',
                'type'      => 'textarea',
                'default'   =>  'Copyright © 2017 FairDealLab - All Rights Reserved',
                'title'     => 'Footer Copyright Text',
            ),
        )
    );
    
    return $options ;
}
add_filter('cs_framework_options','stock_theme_options');

