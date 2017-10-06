<?php
/**
 * Disbale VC front-end editor
 *
 * @category VC extend
 * @author YOGThemes
 * @since  1.0
 * @package yog-addons
 * @subpackage yog-addons/includes/libs/js_composer
 *
 */
if(function_exists('vc_disable_frontend')){
	vc_disable_frontend();
}

/**
 * Remove unnecessory elemnts
 *
 * @category VC extend
 * @author YOGThemes
 * @since  1.0
 * @package yog-addons
 * @subpackage yog-addons/includes/libs/js_composer
 *
 */
if( function_exists( 'vc_remove_element' ) ){
	vc_remove_element('vc_separator');
	vc_remove_element('vc_text_separator');
	vc_remove_element('vc_message');
	vc_remove_element('vc_facebook');
	vc_remove_element('vc_tweetmeme');
	vc_remove_element('vc_googleplus');
	vc_remove_element('vc_pinterest');
	vc_remove_element('vc_toggle');
	vc_remove_element('vc_single_image');
	vc_remove_element('vc_gallery');
	vc_remove_element('vc_images_carousel');
	vc_remove_element('vc_tabs');
	vc_remove_element('vc_accordion');
	vc_remove_element('vc_posts_grid');
	vc_remove_element('vc_carousel');
	vc_remove_element('vc_button');
	vc_remove_element('vc_button2');
	vc_remove_element('vc_cta_button');
	vc_remove_element('vc_cta_button2');
	vc_remove_element('vc_video');
	vc_remove_element('vc_gmaps');
	vc_remove_element('vc_flickr');
	vc_remove_element('vc_progress_bar');
    vc_remove_element('vc_pie');
    vc_remove_element('vc_round_chart');
    vc_remove_element('vc_line_chart');
    vc_remove_element('vc_empty_space');
    vc_remove_element('vc_custom_heading');
    vc_remove_element('vc_basic_grid');
    vc_remove_element('vc_media_grid');
    vc_remove_element('vc_masonry_grid');
    vc_remove_element('vc_masonry_media_grid');
    vc_remove_element('vc_accordion_tab');
    vc_remove_element('vc_tour');
    vc_remove_element('vc_icon');
    vc_remove_element('vc_tta_pageable');
    vc_remove_element('vc_tta_accordion');
    vc_remove_element('vc_tta_tabs');
    vc_remove_element('vc_tta_tour');
    vc_remove_element('vc_btn');
    vc_remove_element('vc_cta');
}


/**
 * Create animation social network icons
 *
 * @category VC extend
 * @author YOGThemes
 * @since  1.0
 * @package yog-addons
 * @subpackage yog-addons/includes/libs/js_composer
 *
 */
function yog_get_animations() {
    return array( 
		esc_html__('No Animation','yog') => '',
        esc_html__('Bounce','yog') => 'bounce',
        esc_html__('Bounce In','yog') => 'bounceIn',
        esc_html__('Bounce In Up','yog') => 'bounceInUp',
        esc_html__('Bounce In Down','yog') => 'bounceInDown',
        esc_html__('Bounce In Left','yog') => 'bounceInLeft',
        esc_html__('Bounce In Right','yog') => 'bounceInRight',
        esc_html__('Fade In','yog') => 'fadeIn',
        esc_html__('Fade In Up','yog') => 'fadeInUp',
        esc_html__('Fade In Down','yog') => 'fadeInDown',
        esc_html__('Fade In Left','yog') => 'fadeInLeft',
        esc_html__('Fade In Right','yog') => 'fadeInRight',
        esc_html__('Fade In Up Big','yog') => 'fadeInUpBig',
        esc_html__('Fade In Down Big','yog') => 'fadeInDownBig',
        esc_html__('Fade In Left Big','yog') => 'fadeInLeftBig',
        esc_html__('Fade In Right Big','yog') => 'fadeInRightBig',
		esc_html__('Flash','yog') => 'flash',
        esc_html__('Flip In X','yog') => 'flipInX',
        esc_html__('Flip In Y','yog') => 'flipInY',
        esc_html__('Jello','yog') => 'jello',
        esc_html__('Pulse','yog') => 'pulse',
		esc_html__('Shake','yog') => 'shake',
		esc_html__('Swing','yog') => 'swing',
		esc_html__('Tada','yog') => 'tada',
		esc_html__('Rotate In','yog') => 'rotateIn',
        esc_html__('Rotate In Up Left','yog') => 'rotateInUpLeft',
        esc_html__('Rotate In Down Left','yog') => 'rotateInDownLeft',
        esc_html__('Rotate In Up Right','yog') => 'rotateInUpRight',
        esc_html__('Rotate In Down Right','yog') => 'rotateInDownRight',
        esc_html__('Rubber Band','yog') => 'rubberBand',
		esc_html__('Wobble','yog') => 'wobble',
		esc_html__('Wiggle','yog') => 'wiggle',
        esc_html__('Zoom In','yog') => 'zoomIn',
        esc_html__('Zoom In Up','yog') => 'zoomInUp',
        esc_html__('Zoom In Down','yog') => 'zoomInDown',
        esc_html__('Zoom In Left','yog') => 'zoomInLeft',
        esc_html__('Zoom In Right','yog') => 'zoomInRight',
        esc_html__('Zoom Out','yog') => 'zoomOut',
        esc_html__('Zoom Out Up','yog') => 'zoomOutUp',
        esc_html__('Zoom Out Down','yog') => 'zoomOutDown',
        esc_html__('Zoom Out Left','yog') => 'zoomOutLeft',
        esc_html__('Zoom Out Right','yog') => 'zoomOutRight',
    );
}
        
/**
 * Get Post object
 *
 * @category VC extend
 * @author YOGThemes
 * @since  1.0
 * @package yog-addons
 * @subpackage yog-addons/includes/libs/js_composer
 *
 */   
if ( ! function_exists( 'yog_post_query' ) ) :

    function yog_post_query( $yog_args = array(), $yog_category = false ) {
        //Post Type Argument
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $yog_defaults = array(
            'post_type'		=> 'post',
            'post_status'	=> 'publish',
            'paged'         => $paged,
            'posts_per_page' => '-1',
        );
        
        $yog_args = wp_parse_args( $yog_args, $yog_defaults );
        
        //Category Filter.
        if ( isset( $yog_category ) && !empty( $yog_category ) ) {
			$vc_taxonomies_types = get_taxonomies( array( 'public' => true ) );
			$terms = get_terms( array_keys( $vc_taxonomies_types ), array(
				'hide_empty' => false,
				'include' => $yog_category,
			) );
			$yog_args['tax_query'] = array();
			$tax_queries = array(); // List of taxnonimes
			foreach ( $terms as $t ) {
				if ( ! isset( $tax_queries[ $t->taxonomy ] ) ) {
					$tax_queries[ $t->taxonomy ] = array(
						'taxonomy' => $t->taxonomy,
						'field' => 'id',
						'terms' => array( $t->term_id ),
						'relation' => 'IN',
					);
				} else {
					$tax_queries[ $t->taxonomy ]['terms'][] = $t->term_id;
				}
			}
			$yog_args['tax_query'] = array_values( $tax_queries );
			$yog_args['tax_query']['relation'] = 'OR';
		}
        
        //Wordpress Custom Query.
        $my_query = new WP_Query( $yog_args );
        
        //Return Post Object.
        return $my_query;
    }

endif;

/**
 * Categories Search Filter
 *
 * @category VC extend
 * @author YOGThemes
 * @since  1.0
 * @package yog-addons
 * @subpackage yog-addons/includes/libs/js_composer
 *
 */
add_filter( 'vc_autocomplete_yog_blog_posts_taxonomie_callback','vc_autocomplete_blog_taxonomie_field_search', 10, 1 );
add_filter( 'vc_autocomplete_yog_blog_posts_taxonomie_render','vc_autocomplete_blog_taxonomie_field_render', 10, 1 );


/**
 * @since 4.5.2
 *
 * @param $search_string
 *
 * @return array|bool
 */
function vc_autocomplete_blog_taxonomie_field_search( $search_string ) {
    $data = array();
	$vc_filter_by = vc_post_param( 'vc_filter_by', '' );
	$vc_taxonomies_types = strlen( $vc_filter_by ) > 0 ? array( $vc_filter_by ) : array_keys( get_taxonomies( array( 'name' => 'category', 'public' => true ), 'objects' ) );
	$vc_taxonomies = get_terms( $vc_taxonomies_types, array(
		'hide_empty' => false,
		'search' => $search_string,
	) );
	if ( is_array( $vc_taxonomies ) && ! empty( $vc_taxonomies ) ) {
		foreach ( $vc_taxonomies as $t ) {
			if ( is_object( $t ) ) {
				$data[] = vc_get_term_object( $t );
			}
		}
	}

	return $data;

}

/**
 * @since 4.5.2
 *
 * @param $term
 *
 * @return array|bool
 */
function vc_autocomplete_blog_taxonomie_field_render( $term ) {
	$vc_taxonomies_types = get_taxonomies( array( 'name' => 'category', 'public' => true ), 'objects' );
	$terms = get_terms( array_keys( $vc_taxonomies_types ), array(
		'include' => array( $term['value'] ),
		'hide_empty' => false,
	) );
	$data = false;
	if ( is_array( $terms ) && 1 === count( $terms ) ) {
		$term = $terms[0];
		$data = vc_get_term_object( $term );
	}

	return $data;
}

/**
 * WooCommerce Variables
 *
 * @category VC extend
 * @author YOGThemes
 * @since  1.0
 * @package yog-addons
 * @subpackage yog-addons/includes/libs/js_composer
 *
 */
$yog_order_by_values = array(
	'',
	esc_html__( 'Date', 'yog' ) => 'date',
	esc_html__( 'ID', 'yog' ) => 'ID',
	esc_html__( 'Author', 'yog' ) => 'author',
	esc_html__( 'Title', 'yog' ) => 'title',
	esc_html__( 'Modified', 'yog' ) => 'modified',
	esc_html__( 'Random', 'yog' ) => 'rand',
	esc_html__( 'Comment count', 'yog' ) => 'comment_count',
	esc_html__( 'Menu order', 'yog' ) => 'menu_order',
);

$yog_order_way_values = array(
	'',
	esc_html__( 'Descending', 'yog' ) => 'DESC',
	esc_html__( 'Ascending', 'yog' ) => 'ASC',
);

//For suggestion: vc_autocomplete_[shortcode_name]_[param_name]_callback
add_filter( 'vc_autocomplete_yog_product_id_callback','yogProductIdAutocompleteSuggester', 10, 1 ); // Get suggestion(find). Must return an array
add_filter( 'vc_autocomplete_yog_product_id_render','yogProductIdAutocompleteRender', 10, 1 ); // Render exact product. Must return an array (label,value)
//For param: ID default value filter
add_filter( 'vc_form_fields_render_field_yog_product_id_param_value','yogProductIdDefaultValue', 10, 4 ); // Defines default value for param if not provided. Takes from other param value.

add_filter( 'vc_autocomplete_yog_products_ids_callback','yogProductIdAutocompleteSuggester', 10, 1 ); // Get suggestion(find). Must return an array
add_filter( 'vc_autocomplete_yog_products_ids_render','yogProductIdAutocompleteRender', 10, 1 ); // Render exact product. Must return an array (label,value)
//For param: ID default value filter
add_filter( 'vc_form_fields_render_field_products_ids_param_value','yogProductsIdsDefaultValue', 10, 4 ); // Defines default value for param if not provided. Takes from other param value.

//For suggestion: vc_autocomplete_[shortcode_name]_[param_name]_callback
add_filter( 'vc_autocomplete_yog_product_categories_ids_callback','yogProductCategoryCategoryAutocompleteSuggester', 10, 1 ); // Get suggestion(find). Must return an array
add_filter( 'vc_autocomplete_yog_product_categories_ids_render','yogProductCategoryCategoryRenderByIdExact', 10, 1 ); // Render exact category by id. Must return an array (label,value)

add_filter( 'vc_autocomplete_yog_recent_products_category_callback','vc_autocomplete_recent_product_taxonomie_field_search', 10, 1 );
add_filter( 'vc_autocomplete_yog_recent_products_category_render','vc_autocomplete_recent_product_taxonomie_field_render', 10, 1 );

/**
 * Suggester for autocomplete by id/name/title/sku
 * @since 4.4
 *
 * @param $query
 *
 * @return array - id's from products with title/sku.
 */
function yogProductIdAutocompleteSuggester( $query ) {
	global $wpdb;
	$product_id = (int) $query;
	$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.ID AS id, a.post_title AS title, b.meta_value AS sku
				FROM {$wpdb->posts} AS a
				LEFT JOIN ( SELECT meta_value, post_id  FROM {$wpdb->postmeta} WHERE `meta_key` = '_sku' ) AS b ON b.post_id = a.ID
				WHERE a.post_type = 'product' AND ( a.ID = '%d' OR b.meta_value LIKE '%%%s%%' OR a.post_title LIKE '%%%s%%' )", $product_id > 0 ? $product_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );

	$results = array();
	if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
		foreach ( $post_meta_infos as $value ) {
			$data = array();
			$data['value'] = $value['id'];
			$data['label'] = __( 'Id', 'yog' ) . ': ' . $value['id'] . ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . __( 'Title', 'yog' ) . ': ' . $value['title'] : '' ) . ( ( strlen( $value['sku'] ) > 0 ) ? ' - ' . __( 'Sku', 'yog' ) . ': ' . $value['sku'] : '' );
			$results[] = $data;
		}
	}

	return $results;
}

/**
 * Find product by id
 * @since 4.4
 *
 * @param $query
 *
 * @return bool|array
 */
function yogProductIdAutocompleteRender( $query ) {
	$query = trim( $query['value'] ); // get value from requested
	if ( ! empty( $query ) ) {
		// get product
		$product_object = wc_get_product( (int) $query );
		if ( is_object( $product_object ) ) {
			$product_sku = $product_object->get_sku();
			$product_title = $product_object->get_title();
			$product_id = $product_object->id;

			$product_sku_display = '';
			if ( ! empty( $product_sku ) ) {
				$product_sku_display = ' - ' . esc_html__( 'Sku', 'yog' ) . ': ' . $product_sku;
			}

			$product_title_display = '';
			if ( ! empty( $product_title ) ) {
				$product_title_display = ' - ' . esc_html__( 'Title', 'yog' ) . ': ' . $product_title;
			}

			$product_id_display = esc_html__( 'Id', 'yog' ) . ': ' . $product_id;

			$data = array();
			$data['value'] = $product_id;
			$data['label'] = $product_id_display . $product_title_display . $product_sku_display;

			return ! empty( $data ) ? $data : false;
		}

		return false;
	}

	return false;
}

/**
 * Replaces product skus to id's.
 * @since 4.4
 *
 * @param $current_value
 * @param $param_settings
 * @param $map_settings
 * @param $atts
 *
 * @return string
 */
 function yogProductsIdsDefaultValue( $current_value, $param_settings, $map_settings, $atts ) {
	$value = trim( $current_value );
	if ( strlen( trim( $value ) ) === 0 && isset( $atts['skus'] ) && strlen( $atts['skus'] ) > 0 ) {
		$data = array();
		$skus = $atts['skus'];
		$skus_array = explode( ',', $skus );
		foreach ( $skus_array as $sku ) {
			$id = $this->productIdDefaultValueFromSkuToId( trim( $sku ) );
			if ( is_numeric( $id ) ) {
				$data[] = $id;
			}
		}
		if ( ! empty( $data ) ) {
			$values = explode( ',', $value );
			$values = array_merge( $values, $data );
			$value = implode( ',', $values );
		}
	}

	return $value;
}

/**
 * Replace single product sku to id.
 * @since 4.4
 *
 * @param $current_value
 * @param $param_settings
 * @param $map_settings
 * @param $atts
 *
 * @return bool|string
 */
function yogProductIdDefaultValue( $current_value, $param_settings, $map_settings, $atts ) {
	$value = trim( $current_value );
	if ( strlen( trim( $current_value ) ) === 0 && isset( $atts['sku'] ) && strlen( $atts['sku'] ) > 0 ) {
		$value = $this->productIdDefaultValueFromSkuToId( $atts['sku'] );
	}

	return $value;
}

/**
 * Return product category value|label array
 *
 * @param $term
 *
 * @since 4.4
 * @return array|bool
 */
function histoiaProductCategoryTermOutput( $term ) {
	$term_slug = $term->slug;
	$term_title = $term->name;
	$term_id = $term->term_id;

	$term_slug_display = '';
	if ( ! empty( $term_slug ) ) {
		$term_slug_display = ' - ' . esc_html__( 'Sku', 'yog' ) . ': ' . $term_slug;
	}

	$term_title_display = '';
	if ( ! empty( $term_title ) ) {
		$term_title_display = ' - ' . esc_html__( 'Title', 'yog' ) . ': ' . $term_title;
	}

	$term_id_display = esc_html__( 'Id', 'yog' ) . ': ' . $term_id;

	$data = array();
	$data['value'] = $term_id;
	$data['label'] = $term_id_display . $term_title_display . $term_slug_display;

	return ! empty( $data ) ? $data : false;
}
    
/**
 * Autocomplete suggester to search product category by name/slug or id.
 * @since 4.4
 *
 * @param $query
 * @param bool $slug - determines what output is needed
 *      default false - return id of product category
 *      true - return slug of product category
 *
 * @return array
 */
function yogProductCategoryCategoryAutocompleteSuggester( $query, $slug = false ) {
	global $wpdb;
	$cat_id = (int) $query;
	$query = trim( $query );
	$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.term_id AS id, b.name as name, b.slug AS slug
					FROM {$wpdb->term_taxonomy} AS a
					INNER JOIN {$wpdb->terms} AS b ON b.term_id = a.term_id
					WHERE a.taxonomy = 'product_cat' AND (a.term_id = '%d' OR b.slug LIKE '%%%s%%' OR b.name LIKE '%%%s%%' )", $cat_id > 0 ? $cat_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );

	$result = array();
	if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
		foreach ( $post_meta_infos as $value ) {
			$data = array();
			$data['value'] = $slug ? $value['slug'] : $value['id'];
			$data['label'] = esc_html__( 'Id', 'yog' ) . ': ' . $value['id'] . ( ( strlen( $value['name'] ) > 0 ) ? ' - ' . esc_html__( 'Name', 'yog' ) . ': ' . $value['name'] : '' ) . ( ( strlen( $value['slug'] ) > 0 ) ? ' - ' . __( 'Slug', 'yog' ) . ': ' . $value['slug'] : '' );
			$result[] = $data;
		}
	}

	return $result;
}

/**
 * Search product category by id
 * @since 4.4
 *
 * @param $query
 *
 * @return bool|array
 */
function yogProductCategoryCategoryRenderByIdExact( $query ) {
	$query = $query['value'];
	$cat_id = (int) $query;
	$term = get_term( $cat_id, 'product_cat' );

	return histoiaProductCategoryTermOutput( $term );
}

/**
 * Custom Taxonomies.
 *
 * @since flipmart 1.0
 */
function yog_get_taxonomy_dropdown( $yog_tax = '' ) {
    global $wpdb;
    
    //Check
    if( empty( $yog_tax ) ){
        return;
    }
    //Category Query.
    $yog_query = 'SELECT * FROM '.$wpdb->terms.' AS t INNER JOIN '.$wpdb->term_taxonomy.' AS tt ON t.term_id = tt.term_id WHERE tt.taxonomy =  "'. $yog_tax .'" AND tt.count > 0 ORDER BY  t.term_id DESC LIMIT 0 , 30';
    $yog_terms = $wpdb->get_results($yog_query, ARRAY_A);
    
    $yog_cat = array( 'Choose Category' => '' );
    if( !empty( $yog_terms ) ){
        foreach( $yog_terms as $yog_term ){
            $yog_cat[$yog_term['name']] = $yog_term['slug'];
        }
    }
    return $yog_cat;
}

/**
 * @since 4.5.2
 *
 * @param $search_string
 *
 * @return array|bool
 */
function vc_autocomplete_recent_product_taxonomie_field_search( $search_string ) {
    $data = array();
	$vc_filter_by = vc_post_param( 'vc_filter_by', '' );
	$vc_taxonomies_types = strlen( $vc_filter_by ) > 0 ? array( $vc_filter_by ) : array_keys( get_taxonomies( array( 'name' => 'product_cat', 'public' => true ), 'objects' ) );
	$vc_taxonomies = get_terms( $vc_taxonomies_types, array(
		'hide_empty' => false,
		'search' => $search_string,
	) );
	if ( is_array( $vc_taxonomies ) && ! empty( $vc_taxonomies ) ) {
		foreach ( $vc_taxonomies as $t ) {
			if ( is_object( $t ) ) {
				$data[] = vc_get_term_object( $t );
			}
		}
	}

	return $data;

}

/**
 * @since 4.5.2
 *
 * @param $term
 *
 * @return array|bool
 */
function vc_autocomplete_recent_product_taxonomie_field_render( $term ) {
	$vc_taxonomies_types = get_taxonomies( array( 'name' => 'product_cat', 'public' => true ), 'objects' );
	$terms = get_terms( array_keys( $vc_taxonomies_types ), array(
		'include' => array( $term['value'] ),
		'hide_empty' => false,
	) );
	$data = false;
	if ( is_array( $terms ) && 1 === count( $terms ) ) {
		$term = $terms[0];
		$data = vc_get_term_object( $term );
	}

	return $data;
}
