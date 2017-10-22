<?php
if ( ! function_exists( 'stock_mr_google_fonts_url' ) ) :
    /**
     * Register Google fonts.
     *
     * @return string Google fonts URL for the theme.
     */
    function stock_mr_google_fonts_url() {
        $fonts_url = '';
        $fonts     = array();

        $body_font_variant = cs_get_option('body_font_variant');
        $body_font_variant_processed = implode(',', $body_font_variant);
        $body_subsets   = ':'.$body_font_variant_processed.'';

        $heading_font_variant = cs_get_option('heading_font_variant');
        $heading_font_variant_processed = implode(',', $heading_font_variant);
        $heading_subsets   = ':'.$heading_font_variant_processed.'';

        $body_font = cs_get_option('body_font') ['family'];
        $body_font .= $body_subsets;

        $heading_font = cs_get_option('heading_font') ['family'];
        $heading_font .= $heading_subsets;

        /* translators: If there are characters in your language that are not supported by this font,
        translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== esc_html_x( 'on', 'Karla font: on or off', 'stock-mr' ) ) {
            $fonts[] = $body_font;
        }

        /* translators: If there are characters in your language that are not supported by this font,
        translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== esc_html_x( 'on', 'Lato font: on or off', 'stock-mr' ) ) {
            $fonts[] = $heading_font;
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
            ), 'https://fonts.googleapis.com/css' );
        }
        return $fonts_url;
    }
endif;

/**
 * Enqueue scripts and styles.
 */
function stock_mr_prefix_scripts() {
    // add custom fonts, used in the main stylesheet
    wp_enqueue_style( 'stock-mr-google-fonts', stock_mr_google_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'stock_mr_prefix_scripts' );


// add inline stylesheet
function stock_mr_custom_css() {
    wp_enqueue_style( 'stock-mr-custom-style',
        get_template_directory_uri().'/assets/css/custom-style.css');

    $body_font = cs_get_option('body_font')['family'];
    $body_font_variant = cs_get_option('body_font')['variant'];

    $heading_font = cs_get_option('heading_font')['family'];
    $heading_font_variant = cs_get_option('heading_font')['variant'];

    $enable_boxed_layout = cs_get_option('enable_boxed_layout');
    $body_bg_color = cs_get_option('body_bg_color');

    $body_bg_img = cs_get_option('body_bg_img');
    $body_bg_img_array = wp_get_attachment_image_src($body_bg_img, 'large', false);

    $body_bg_repeat = cs_get_option('body_bg_repeat');
    $body_bg_attachment = cs_get_option('body_bg_attachment');

    $footer_bg_color = cs_get_option('footer_bg_color');
    $footer_text_color = cs_get_option('footer_text_color');
    $footer_heading_color = cs_get_option('footer_heading_color');

    //$footer_bg_image = cs_get_option('footer_bg_image');
    //$footer_bg_image_array = wp_get_attachment_image_src($footer_bg_image,'large');

    $custom_css = '
       body {
           font-family:'.$body_font.'; 
           font-weight:'.$body_font_variant.'
       }
       h1,h2,h3,h4,h5,h6 { 
           font-family: '.$heading_font.'; 
           font-weight:'.$heading_font_variant.'
       }';

    if($enable_boxed_layout == true){

        if(!empty($body_bg_color)){
            $custom_css .= '
                body{background-color : '.$body_bg_color.'}
             ';
        }
        if(!empty($body_bg_img)){
            $custom_css .= '
                body{background-image : url('.$body_bg_img_array[0].') }
             ';
        }
        if(!empty($body_bg_repeat)){
            $custom_css .= '
                body{background-repeat : '.$body_bg_repeat.'}
             ';
        }
        if(!empty($body_bg_attachment)){
            $custom_css .= '
                body{background-attachment : '.$body_bg_attachment.'}
             ';
        }
    }

    if(!empty( $footer_bg_color ) ){
        $custom_css .= '.site-footer {
                background-color:'.$footer_bg_color.'}
        ';
    }
    if(!empty( $footer_text_color ) ){
        $custom_css .= '.site-footer, .site-footer a {
                color:'.$footer_text_color.'}
        ';
    }
    if(!empty( $footer_heading_color ) ){
        $custom_css .= '.site-footer h4.widget-title {
                color:'.$footer_heading_color.'}
        ';
    }

    wp_add_inline_style('stock-mr-custom-style',$custom_css);
}
add_action( 'wp_enqueue_scripts', 'stock_mr_custom_css' );
