<?php
/*
 * WooCommerce Section
 *
 * Available options on $section array:
 * separate_box (boolean) - separate metabox is created if true
 * box_title - title for separate metabox
 * title - section title
 * desc - section description
 * icon - section icon
 * fields - fields, @see https://docs.reduxframework.com/ for details
*/

$sections[] = array(
	'post_types' => array( 'product' ),
	'title'      => esc_html__('WooCommerce', 'flipmart'),
	'icon'       => 'el-icon-adjust-alt',
	'fields'     => array(
    
        array(
			'title'  => esc_html__( 'Hot Product', 'flipmart' ),
			'id'     => 'product-hot-flash',
			'type'   => 'button_set',
            'desc'   => esc_html__( 'Display the "Hot" flash badge', 'flipmart' ),
            'options'  => array(
				'on'   => 'On',
				'off'  => 'Off'
			),
		 ),
         
         array(
			'title'         => esc_html__( 'Hot Product Discount', 'flipmart' ),
			'id'            => 'product-hot-discount',
			'type'          => 'slider',
            "min"           => 1,
            "step"          => 1,
            "max"           => 100,
            'display_value' => 'text',
            'required'      =>  array('product-hot-flash','equals','on'),
		 ),
         
         array(
			'title'         => esc_html__( 'Time Limit', 'flipmart' ),
			'id'            => 'product-hot-time',
			'type'          => 'datetime',
            'date-format'   => 'd MM yy',
            'time-format'   => 'HH:mm:ss',
            'split'         => false,
            'separator'     => ' ', 
            'required'      =>  array('product-hot-flash','equals','on'),
		 )
    )
);