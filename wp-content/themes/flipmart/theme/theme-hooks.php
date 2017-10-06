<?php
/**
 * Theme Framework
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * [yog_custom_sidebars description]
 * @method yog_custom_sidebars
 * @return [type]                [description]
 */
add_action( 'widgets_init', 'yog_custom_sidebars' );
function yog_custom_sidebars() {

	//adding custom sidebars defined in theme options
	$custom_sidebars = yog_helper()->get_theme_option( 'custom-sidebars' );
	$custom_sidebars = array_filter( (array)$custom_sidebars );

	if ( !empty( $custom_sidebars ) ) {

		foreach ( $custom_sidebars as $sidebar ) {

			register_sidebar ( array (
				'name'          => $sidebar,
				'id'            => sanitize_title( $sidebar ),
				'before_widget' => '<div id="%1$s" class="clearfix sidebar-widget outer-bottom-small %2$s">',
				'after_widget'  => '</div><div class="clearfix"></div>',
				'before_title'  => '<h3 class="section-title">',
				'after_title'   => '</h3>',
			) );
		}
	}
}

/**
 * Remove ver variable from enqueued scripts and css files
 * E.g. http://yourdomain/style.css?ver=1.3
 *
 * @method yog_clear_files_query_string
 * @param  [type]                         $src [description]
 * @return [type]                              [description]
 */

add_action( 'init', function(){
	if ( yog_helper()->get_theme_option( 'clear-static-files' ) ) {
		add_filter( 'script_loader_src', 'yog_clear_files_query_string', 9999 );
		add_filter( 'style_loader_src', 'yog_clear_files_query_string', 9999 );
	}
});
function yog_clear_files_query_string( $src ) {

	$src = remove_query_arg( 'ver', $src );

	return $src;
}

/**
 * Remove type and id attribute from stylesheet
 * @method yog_html5_stylesheet
 * @param  [type]                 $html   [description]
 * @param  [type]                 $handle [description]
 * @return [type]                         [description]
 */

if( current_theme_supports( 'html5', 'yog-assets' ) ) {
	add_filter( 'style_loader_tag', 'yog_html5_stylesheet', 10, 2 );
	add_filter( 'script_loader_tag', 'yog_html5_stylesheet', 10, 2 );
}
function yog_html5_stylesheet( $html, $handle ) {

	$html = str_replace(" type='text/css'", '', $html );
	$html = str_replace(" type='text/javascript'", '', $html );
    return str_replace( " id='$handle-css' ", '', $html );
}

/**
 * Remove Defualt Excerpt filters 
 */
remove_all_filters( 'get_the_excerpt' );
remove_all_filters( 'the_excerpt' );

/**
 * New Contact Methods in User profile
 */
function yog_contactmethods( $contactmethods ) {

    // this will remove existing contact fields
    unset( $contactmethods['aim'] );
    unset( $contactmethods['yim'] );
    unset( $contactmethods['jabber'] );

    $contactmethods['twitter']  = esc_html__( 'Twitter', 'flipmart' );
    $contactmethods['facebook'] = esc_html__( 'Facebook', 'flipmart' );
    $contactmethods['linkedin'] = esc_html__( 'LinkedIn', 'flipmart' );

    return $contactmethods;
}
add_filter( 'user_contactmethods', 'yog_contactmethods', 10, 1 );

/**
 * Add Site Layout Class in Body
 */
add_filter('body_class', 'multisite_body_classes');
function multisite_body_classes($classes) {
        $yog_class = yog_helper()->get_option( 'site-layout', 'raw', 'wide', 'options' );
        $classes[] = $yog_class;
        return $classes;
}

/**
 * Disable compare icon 
 */
function yog_wcwl_positions() {
    return 0;
}
add_filter( 'yith_wcwl_positions','yog_wcwl_positions');

/**
 * Add compare icon 
 */
function yog_translate_single_string( $button_text, $var ){
    
    if( $var == 'Plugins' ){
        return '<i class="fa fa-signal" aria-hidden="true"></i>';    
    }else{
        return $button_text;
    }
    
}
add_filter( 'wpml_translate_single_string','yog_translate_single_string', 10, 2 );