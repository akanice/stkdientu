<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Yog_WC_Shortcodes class
 *
 * @class       Yog_WC_Shortcodes
 * @version     2.1.0
 * @package     WooCommerce/Classes
 * @category    Class
 * @author      WooThemes
 */
class Yog_WC_Shortcodes {

	/**
	 * Init shortcodes.
	 */
	public function __construct() {
	   
		$shortcodes = array(
			'yog_product'                    => __CLASS__ . '::yog_product',
            'yog_product_category'           => __CLASS__ . '::yog_product_category',
			'yog_product_categories'         => __CLASS__ . '::yog_product_categories',
			'yog_products'                   => __CLASS__ . '::yog_products',
			'yog_recent_products'            => __CLASS__ . '::yog_recent_products',
			'yog_sale_products'              => __CLASS__ . '::yog_sale_products',
			'yog_best_selling_products'      => __CLASS__ . '::yog_best_selling_products',
			'yog_featured_products'          => __CLASS__ . '::yog_featured_products',
			'yog_top_rated_products'         => __CLASS__ . '::yog_top_rated_products',
			'yog_related_products'           => __CLASS__ . '::yog_related_products',
		);

		foreach ( $shortcodes as $shortcode => $function ) {
			add_shortcode($shortcode, $function );
		}
    
	}
    
    /**
	 * Output the start of a product loop. By default this is a UL.
	 *
	 * @param bool $echo
	 * @return string
	 */
	function yog_woocommerce_product_loop_start( $echo = true, $atts = array() ) {
		ob_start();
		
        //Animation
        $yog_animation = ( isset( $atts['yog_animation'] ) && !empty( $atts['yog_animation'] ) )? $atts['yog_animation'] : '';
        $yog_delay     = ( isset( $atts['yog_delay'] ) && !empty( $atts['yog_delay'] ) )? $atts['yog_delay'] : '';

        if( $atts['style'] == 'one' ){
            ?>
            <div class="section featured-product outer-top-vs" <?php yog_helper()->attr( false, array( 'data-animation' => $yog_animation, 'data-animation-daley' => $yog_delay ) ) ?>>
                <?php 
                    //Heading
                    if ( isset( $atts['heading'] ) ) {
                        echo '<h3 class="section-title">'. esc_html( $atts['heading'] ) .'</h3>';
                    }
                ?>
            
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
            <?php
            
        }elseif( $atts['style'] == 'two' ){
            ?>
            <div class="best-deal outer-bottom-xs" <?php yog_helper()->attr( false, array( 'data-animation' => $yog_animation, 'data-animation-daley' => $yog_delay ) ) ?>>
                <?php 
                    //Heading
                    if ( isset( $atts['heading'] ) ) {
                        echo '<h3 class="section-title">'. esc_html( $atts['heading'] ) .'</h3>';
                    }
                ?>
            
                <div class="sidebar-widget-body outer-top-xs">
                    <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
            
            <?php
        }else{
            wc_get_template( 'loop/loop-start.php');  
        }
        
		if ( $echo )
			echo ob_get_clean();
		else
			return ob_get_clean();
	}
    
    /**
	 * Output the end of a product loop. By default this is a UL.
	 *
	 * @param bool $echo
	 * @return string
	 */
	function yog_woocommerce_product_loop_end( $echo = true, $atts = array() ) {
		ob_start();
        if( $atts['style'] == 'one' ){
            echo '</div></div>';
        }elseif( $atts['style'] == 'two' ){
            echo '</div></div></div>';
        }else{
            wc_get_template( 'loop/loop-start.php');  
        }
        
		if ( $echo )
			echo ob_get_clean();
		else
			return ob_get_clean();
	}

	/**
	 * Loop over found products.
	 * @param  array $query_args
	 * @param  array $atts
	 * @param  string $loop_name
	 * @return string
	 */
	private static function yog_product_loop( $query_args, $atts, $loop_name ) {
		global $woocommerce_loop;

		$columns                     = absint( $atts['columns'] );
		$woocommerce_loop['columns'] = $columns;
		$woocommerce_loop['name']    = $loop_name;
		$query_args                  = apply_filters( 'woocommerce_shortcode_products_query', $query_args, $atts, $loop_name );
		$transient_name              = 'wc_loop' . substr( md5( json_encode( $query_args ) . $loop_name ), 28 ) . WC_Cache_Helper::get_transient_version( 'product_query' );
		$products                    = get_transient( $transient_name );

		if ( false === $products || ! is_a( $products, 'WP_Query' ) ) {
			$products = new WP_Query( $query_args );
			set_transient( $transient_name, $products, DAY_IN_SECONDS * 30 );
		}

		ob_start();
        
        if ( $products->have_posts() ) {
            
            self::yog_woocommerce_product_loop_start(true, $atts);
            
            $yog_column_counter = 0; $yog_counter = 2;
            while ( $products->have_posts() ) : $products->the_post();
                
                if( $atts['style'] == 'one' ){
                    
                    wc_get_template_part( 'content-product-slider', 'v1' );
                    
                }elseif( $atts['style'] == 'two' ){
                    
                    //Slider Content Wrapper Start
                    $yog_column_counter++;
                    if ( $yog_column_counter == 1 ) {
                        
                        echo '<div class="item"><div class="products best-product">';
                        $yog_close = true;
                        
                    }
                    
                    wc_get_template_part( 'content-product-slider', 'v2' );
                    
                    //Slider Content Wrapper End
                    if ( $yog_column_counter == $yog_counter ) {
                        $yog_column_counter = 0;
                        echo '</div></div>';
                        $yog_close = false;
                    }
                    
                }else{
                    
                    wc_get_template_part( 'content', 'product' );
                    
                }
                 
                       
            endwhile; // end of the loop.
            
            //Slider Content Wrapper End
            if ( $yog_close && $atts['style'] == 'two'  ) {
                 echo '</div></div>';
            }
            
            self::yog_woocommerce_product_loop_end(true, $atts);
            
            //Pagination
            if( $atts['pagination'] ){
                if( $atts['style'] == 'three' ){
                    echo '<hr class="invis">';
                }
                
                yog_wp_paginate( array( 'query' => $products,  'before' => '<nav class="clearfix text-center">', 'after' => '</nav>', 'class' => 'pagination', 'title' => false ) ); //Paginations
            } 
            
        } else {
			do_action( "woocommerce_shortcode_{$loop_name}_loop_no_results", $atts );
		}

		woocommerce_reset_loop();
		wp_reset_postdata();

		return ob_get_clean();
        
	}
    
    /**
	 * List products in a category shortcode.
	 *
	 * @param array $atts
	 * @return string
	 */
	public static function yog_product_category( $atts ) {
		$atts = shortcode_atts( array(
			'per_page' => '12',
			'columns'  => '4',
			'orderby'  => 'menu_order title',
			'order'    => 'asc',
			'category' => '',  // Slugs
			'operator' => 'IN', // Possible values are 'IN', 'NOT IN', 'AND'.
		), $atts, 'product_category' );

		if ( ! $atts['category'] ) {
			return '';
		}

		// Default ordering args
		$ordering_args = WC()->query->get_catalog_ordering_args( $atts['orderby'], $atts['order'] );
		$meta_query    = WC()->query->get_meta_query();
		$query_args    = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'orderby'             => $ordering_args['orderby'],
			'order'               => $ordering_args['order'],
			'posts_per_page'      => $atts['per_page'],
			'meta_query'          => $meta_query,
			'tax_query'           => WC()->query->get_tax_query(),
		);

		$query_args = self::_maybe_add_category_args( $query_args, $atts['category'], $atts['operator'] );

		if ( isset( $ordering_args['meta_key'] ) ) {
			$query_args['meta_key'] = $ordering_args['meta_key'];
		}

		$return = self::product_loop( $query_args, $atts, 'product_cat' );

		// Remove ordering query arguments
		WC()->query->remove_ordering_args();

		return $return;
	}


	/**
	 * List all (or limited) product categories.
	 *
	 * @param array $atts
	 * @return string
	 */
	public static function yog_product_categories( $atts ) {
		global $woocommerce_loop;

		$atts = shortcode_atts( array(
			'number'     => null,
			'orderby'    => 'name',
			'order'      => 'ASC',
			'columns'    => '4',
			'hide_empty' => 1,
			'parent'     => '',
			'ids'        => '',
		), $atts, 'product_categories' );

		$ids        = array_filter( array_map( 'trim', explode( ',', $atts['ids'] ) ) );
		$hide_empty = ( true === $atts['hide_empty'] || 'true' === $atts['hide_empty'] || 1 === $atts['hide_empty'] || '1' === $atts['hide_empty'] ) ? 1 : 0;

		// get terms and workaround WP bug with parents/pad counts
		$args = array(
			'orderby'    => $atts['orderby'],
			'order'      => $atts['order'],
			'hide_empty' => $hide_empty,
			'include'    => $ids,
			'pad_counts' => true,
			'child_of'   => $atts['parent'],
		);

		$product_categories = get_terms( 'product_cat', $args );

		if ( '' !== $atts['parent'] ) {
			$product_categories = wp_list_filter( $product_categories, array( 'parent' => $atts['parent'] ) );
		}

		if ( $hide_empty ) {
			foreach ( $product_categories as $key => $category ) {
				if ( 0 == $category->count ) {
					unset( $product_categories[ $key ] );
				}
			}
		}

		if ( $atts['number'] ) {
			$product_categories = array_slice( $product_categories, 0, $atts['number'] );
		}

		$columns = absint( $atts['columns'] );
		$woocommerce_loop['columns'] = $columns;

		ob_start();

		if ( $product_categories ) {
			woocommerce_product_loop_start();

			foreach ( $product_categories as $category ) {
				wc_get_template( 'content-product_cat.php', array(
					'category' => $category,
				) );
			}

			woocommerce_product_loop_end();
		}

		woocommerce_reset_loop();

		return '<div class="woocommerce columns-' . $columns . '">' . ob_get_clean() . '</div>';

	}

	/**
	 * Recent Products shortcode.
	 *
	 * @param array $atts
	 * @return string
	 */
	public static function yog_recent_products( $atts ) {
	   $atts = shortcode_atts( array(
            'style'      => 'one',
            'heading'    => '',
			'per_page'   => '12',
			'orderby'    => 'date',
			'order'      => 'desc',
			'category'   => '',  // Slugs
            'pagination' => false,
            'animation'  => '',
            'delay'      => '',
			'operator'   => 'IN', // Possible values are 'IN', 'NOT IN', 'AND'.
		), $atts, 'recent_products' );

		$query_args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $atts['per_page'],
			'orderby'             => $atts['orderby'],
			'order'               => $atts['order'],
			'meta_query'          => WC()->query->get_meta_query(),
			'tax_query'           => WC()->query->get_tax_query(),
		);

		if ( isset( $atts['category'] ) && !empty( $atts['category'] ) ) {
			$vc_taxonomies_types = get_taxonomies( array( 'public' => true ) );
			$terms = get_terms( array_keys( $vc_taxonomies_types ), array(
				'hide_empty' => false,
				'include' => $atts['category'],
			) );
			$query_args['tax_query'] = array();
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
			$query_args['tax_query'] = array_values( $tax_queries );
			$query_args['tax_query']['relation'] = 'OR';
		}

		return self::yog_product_loop( $query_args, $atts, 'recent_products' );
       
	}

	/**
	 * List multiple products shortcode.
	 *
	 * @param array $atts
	 * @return string
	 */
	public static function yog_products( $atts ) {
		$atts = shortcode_atts( array(
			'style'         => 'one',
            'heading'       => '',
			'orderby'       => 'title',
			'order'         => 'asc',
			'ids'           => '',
			'skus'          => '',
            'yog_animation' => '',
            'yog_delay'     => ''
		), $atts, 'products' );

		$query_args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'orderby'             => $atts['orderby'],
			'order'               => $atts['order'],
			'posts_per_page'      => -1,
			'meta_query'          => WC()->query->get_meta_query(),
			'tax_query'           => WC()->query->get_tax_query(),
		);

		if ( ! empty( $atts['skus'] ) ) {
			$query_args['meta_query'][] = array(
				'key'     => '_sku',
				'value'   => array_map( 'trim', explode( ',', $atts['skus'] ) ),
				'compare' => 'IN',
			);
		}

		if ( ! empty( $atts['ids'] ) ) {
			$query_args['post__in'] = array_map( 'trim', explode( ',', $atts['ids'] ) );
		}

		return self::yog_product_loop( $query_args, $atts, 'products' );
	}

	/**
	 * Display a single product.
	 *
	 * @param array $atts
	 * @return string
	 */
	public static function yog_product( $atts ) {
	if ( empty( $atts ) ) {
			return '';
		}

		$meta_query = WC()->query->get_meta_query();

		$args = array(
			'post_type'      => 'product',
			'posts_per_page' => 1,
			'no_found_rows'  => 1,
			'post_status'    => 'publish',
			'meta_query'     => $meta_query,
			'tax_query'      => WC()->query->get_tax_query(),
		);

		if ( isset( $atts['sku'] ) ) {
			$args['meta_query'][] = array(
				'key'     => '_sku',
				'value'   => $atts['sku'],
				'compare' => '=',
			);
		}

		if ( isset( $atts['id'] ) ) {
			$args['p'] = $atts['id'];
		}

		ob_start();

		$products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );

		if ( $products->have_posts() ) : ?>

			<?php woocommerce_product_loop_start(); ?>

				<?php while ( $products->have_posts() ) : $products->the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

		<?php endif;

		wp_reset_postdata();

		$css_class = 'woocommerce';

		if ( isset( $atts['class'] ) ) {
			$css_class .= ' ' . $atts['class'];
		}

		return '<div class="' . esc_attr( $css_class ) . '">' . ob_get_clean() . '</div>';
	}


	/**
	 * List all products on sale.
	 *
	 * @param array $atts
	 * @return string
	 */
	public static function yog_sale_products( $atts ) {
		$atts = shortcode_atts( array(
            'style'         => 'one',
            'heading'       => '',
            'per_page'      => '12',
			'pagination'    => false,
			'orderby'       => 'title',
			'order'         => 'asc',
            'yog_animation' => '',
            'yog_delay'     => ''
		), $atts );

		$query_args = array(
			'posts_per_page' => $atts['per_page'],
			'orderby'        => $atts['orderby'],
			'order'          => $atts['order'],
			'no_found_rows'  => 1,
			'post_status'    => 'publish',
			'post_type'      => 'product',
			'meta_query'     => WC()->query->get_meta_query(),
			'post__in'       => array_merge( array( 0 ), wc_get_product_ids_on_sale() )
		);

		return self::yog_product_loop( $query_args, $atts, 'sale_products' );
	}

	/**
	 * List best selling products on sale.
	 *
	 * @param array $atts
	 * @return string
	 */
	public static function yog_best_selling_products( $atts ) {
		$atts = shortcode_atts( array(
            'style'         => 'one',
            'heading'       => '',
            'per_page'      => '12',
			'category'      => '',  // Slugs
			'operator'      => 'IN', // Possible values are 'IN', 'NOT IN', 'AND'.
            'yog_animation' => '',
            'yog_delay'     => ''
		), $atts );

		$query_args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $atts['per_page'],
			'meta_key'            => 'total_sales',
			'orderby'             => 'meta_value_num',
			'meta_query'          => WC()->query->get_meta_query()
		);

		$query_args = self::_maybe_add_category_args( $query_args, $atts['category'], $atts['operator'] );

		return self::yog_product_loop( $query_args, $atts, 'best_selling_products' );
	}

	/**
	 * List top rated products on sale.
	 *
	 * @param array $atts
	 * @return string
	 */
	public static function yog_top_rated_products( $atts ) {
		$atts = shortcode_atts( array(
            'style'         => 'one',
            'heading'       => '',
            'per_page'      => '12',
            'pagination'    => false,
			'orderby'       => 'title',
			'order'         => 'asc',
			'category'      => '',  // Slugs
			'operator'      => 'IN', // Possible values are 'IN', 'NOT IN', 'AND'.
            'yog_animation' => '',
            'yog_delay'     => ''
		), $atts );

		$query_args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'orderby'             => $atts['orderby'],
			'order'               => $atts['order'],
			'posts_per_page'      => $atts['per_page'],
			'meta_query'          => WC()->query->get_meta_query()
		);

		$query_args = self::_maybe_add_category_args( $query_args, $atts['category'], $atts['operator'] );

		add_filter( 'posts_clauses', array( __CLASS__, 'order_by_rating_post_clauses' ) );

		$return = self::yog_product_loop( $query_args, $atts, 'top_rated_products' );

		remove_filter( 'posts_clauses', array( __CLASS__, 'order_by_rating_post_clauses' ) );

		return $return;
	}

	/**
	 * Output featured products.
	 *
	 * @param array $atts
	 * @return string
	 */
	public static function yog_featured_products( $atts ) {
		$atts = shortcode_atts( array(
            'style'         => 'one',
            'heading'       => '',
            'per_page'      => '12',
            'pagination'    => false,
			'orderby'       => 'date',
			'order'         => 'desc',
			'category'      => '',  // Slugs
			'operator'      => 'IN',
            'yog_animation' => '',
            'yog_delay'     => '' // Possible values are 'IN', 'NOT IN', 'AND'.
		), $atts );

		$meta_query   = WC()->query->get_meta_query();
		$meta_query[] = array(
			'key'   => '_featured',
			'value' => 'yes'
		);

		$query_args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $atts['per_page'],
			'orderby'             => $atts['orderby'],
			'order'               => $atts['order'],
			'meta_query'          => $meta_query
		);

		$query_args = self::_maybe_add_category_args( $query_args, $atts['category'], $atts['operator'] );

		return self::yog_product_loop( $query_args, $atts, 'featured_products' );
	}
    

	/**
	 * woocommerce_order_by_rating_post_clauses function.
	 *
	 * @param array $args
	 * @return array
	 */
	public static function order_by_rating_post_clauses( $args ) {
		global $wpdb;

		$args['where']   .= " AND $wpdb->commentmeta.meta_key = 'rating' ";
		$args['join']    .= "LEFT JOIN $wpdb->comments ON($wpdb->posts.ID               = $wpdb->comments.comment_post_ID) LEFT JOIN $wpdb->commentmeta ON($wpdb->comments.comment_ID = $wpdb->commentmeta.comment_id)";
		$args['orderby'] = "$wpdb->commentmeta.meta_value DESC";
		$args['groupby'] = "$wpdb->posts.ID";

		return $args;
	}

	/**
	 * List products with an attribute shortcode.
	 * Example [product_attribute attribute='color' filter='black'].
	 *
	 * @param array $atts
	 * @return string
	 */
	public static function product_attribute( $atts ) {
		$atts = shortcode_atts( array(
			'per_page'  => '12',
			'columns'   => '4',
            'pagination' => false,
			'orderby'   => 'title',
			'order'     => 'asc',
			'attribute' => '',
			'filter'    => ''
		), $atts );

		$query_args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $atts['per_page'],
			'orderby'             => $atts['orderby'],
			'order'               => $atts['order'],
			'meta_query'          => WC()->query->get_meta_query(),
			'tax_query'           => array(
				array(
					'taxonomy' => strstr( $atts['attribute'], 'pa_' ) ? sanitize_title( $atts['attribute'] ) : 'pa_' . sanitize_title( $atts['attribute'] ),
					'terms'    => array_map( 'sanitize_title', explode( ',', $atts['filter'] ) ),
					'field'    => 'slug'
				)
			)
		);

		return self::yog_product_loop( $query_args, $atts, 'product_attribute' );
	}

	/**
	 * Adds a tax_query index to the query to filter by category.
	 *
	 * @param array $args
	 * @param string $category
	 * @param string $operator
	 * @return array;
	 * @access private
	 */
	private static function _maybe_add_category_args( $args, $category, $operator ) {
		if ( ! empty( $category ) ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'product_cat',
					'terms'    => array_map( 'sanitize_title', explode( ',', $category ) ),
					'field'    => 'slug',
					'operator' => $operator
				)
			);
		}

		return $args;
	}
    
    /**
	 * Adds a tax_query index to the query to filter by category.
	 *
	 * @param array $args
	 * @param string $category
	 * @param string $operator
	 * @return array;
	 * @access private
	 */
	private static function _maybe_add_categories_args( $args, $category, $operator ) {
		if ( ! empty( $category ) ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'product_cat',
					'terms'    => $category,
					'field'    => 'slug',
					'operator' => $operator
				)
			);
		}

		return $args;
	}
}

new Yog_WC_Shortcodes();