<?php
/*-------------------------------------------------------------------------------
|				Flipmart:  Row Setting / Element Map				            |						
--------------------------------------------------------------------------------*/
    
    vc_map( array(
        'name'         =>  esc_html__( 'Row', 'yog' ),
        'base'         => 'vc_row',
        'is_container' => true,
        'icon'         => 'icon-wpb-row',
        'show_settings_on_create' => false,
        'category'     =>  esc_html__( 'Content', 'yog' ),
        'description'  =>  esc_html__( 'Place content elements inside the row', 'yog' ),
        'params'       => array(
        
            array(
            	'type'       => 'dropdown',
            	'heading'    =>  esc_html__( 'Row stretch', 'yog' ),
            	'param_name' => 'full_width',
            	'value'      => array(
            		esc_html__( 'Default', 'yog' )       => '',
                    esc_html__( 'Fullwidth Row', 'yog' ) => 'stretch_row',
            		esc_html__( 'Fluid Row', 'yog' )     => 'stretch_row_fluid',
            	)
            ),
            
            array(
                'heading'     =>  esc_html__( 'Row Skin', 'yog' ),
            	'type'        => 'dropdown',
            	'param_name'  => 'yog_skin',
            	'value'       => array(
            		 esc_html__( 'Default', 'yog' )  => '',
                     esc_html__( 'Faq Page', 'yog' ) => 'checkout-box faq-page',
                     esc_html__( 'Space Top', 'yog' ) => 'outer-top-xs',
                     esc_html__( 'Space Bottom', 'yog' ) => 'outer-bottom-xs',
            	),
            	'description' =>  esc_html__( 'Select Row Container Class.', 'yog' )
            ),
            
            array(
            	'type'       => 'dropdown',
            	'heading'    =>  esc_html__( 'Columns gap', 'yog' ),
            	'param_name' => 'gap',
            	'value' => array(
            		'0px'  => '0',
            		'1px'  => '1',
            		'2px'  => '2',
            		'3px'  => '3',
            		'4px'  => '4',
            		'5px'  => '5',
            		'10px' => '10',
            		'15px' => '15',
            		'20px' => '20',
            		'25px' => '25',
            		'30px' => '30',
            		'35px' => '35',
            	),
            	'std'         => '0',
            	'description' =>  esc_html__( 'Select gap between columns in row.', 'yog' ),
            ),
            
            array(
            	'type'        => 'el_id',
            	'heading'     =>  esc_html__( 'Row ID', 'yog' ),
            	'param_name'  => 'el_id',
            	'description' => sprintf(  esc_html__( 'Enter row ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'yog' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
            ),
            
            array(
            	'type'        => 'checkbox',
            	'heading'     =>  esc_html__( 'Disable row', 'yog' ),
            	'param_name'  => 'disable_element', // Inner param name.
            	'description' =>  esc_html__( 'If checked the row won\'t be visible on the public side of your website. You can switch it back any time.', 'yog' ),
            	'value'       => array(  esc_html__( 'Yes', 'yog' ) => 'yes' ),
            ),
            
            array(
            	'type'        => 'textfield',
            	'heading'     =>  esc_html__( 'Extra class name', 'yog' ),
            	'param_name'  => 'el_class',
            	'description' =>  esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'yog' ),
            ),
            
            array(
            	'type'        => 'css_editor',
            	'heading'     =>  esc_html__( 'CSS box', 'yog' ),
            	'param_name'  => 'css',
            	'group'       =>  esc_html__( 'Design Options', 'yog' ),
            )
        ),
        'js_view' => 'VcRowView',
        )
    );

/*-------------------------------------------------------------------------------
|				Flipmart:  Heading Module / Element Map				            |						
--------------------------------------------------------------------------------*/

	vc_map( array(
	  'name'        => esc_html__('Flipmart Heading', 'yog'),
	  'base'        => 'yog_heading',
	  'class'       => 'icon_yog_heading',
	  'icon'	    => 'icon-wpb-ui-custom_heading',
	  'weight'      => 101,
	  'category'    => esc_html__('Flipmart Modules', 'yog'),
	  'description' => esc_html__( 'Insert heading of section.', 'yog' ),
	  'params'      => array(
            array(
                'heading'     => esc_html__('Style', 'yog'),
    			'type'        => 'dropdown',
    			'param_name'  => 'yog_heading_style',
    			'admin_label' => true,
    			'value' => array(
                    esc_html__('One', 'yog') => 'one',
    				esc_html__('Two', 'yog') => 'two'
    			),
    			'description' => esc_html__('Select banner style', 'yog'),
    	    ),
            
			array(
                'heading'     => esc_html__( 'Heading','yog'),
                'type'        => 'textfield',
                'admin_label' => true,
                'value'       => '',
                'param_name'  => 'yog_heading',
            ),
             
            array(
                'heading'     => esc_html__( 'Sub Heading','yog'),
                'type'        => 'textfield',
                'value'       => '',
                'param_name'  => 'yog_sub_heading',
            )
         )
       )
    );
        
/*-------------------------------------------------------------------------------
|				Flipmart:  Accordion Module / Element Map				            |						
--------------------------------------------------------------------------------*/

	vc_map( array(
	  'name'        => esc_html__('Flipmart FAQ Accordion', 'yog'),
	  'base'        => 'yog_accordions',
	  'class'       => 'icon_yog_accordions',
	  'icon'	    => 'icon-wpb-ui-accordion',
	  'weight'      => 101,
	  'category'    => esc_html__('Flipmart Modules', 'yog'),
	  'description' => esc_html__( 'Insert Accordion', 'yog' ),
	  'params'      => array(
            
            array(
                'type'       => 'param_group',
                'value'      => '',
                'param_name' => 'yog_accordion',
                'params'     => array(
                
                     array(
            			'type'        => 'checkbox',
            			'heading'     => esc_html__( 'Active', 'yog' ),
            			'param_name'  => 'enable_active', // Inner param name.
            			'description' => esc_html__( 'If checked active content', 'yog' ),
            			'value'       => array( esc_html__( 'Yes', 'yog' ) => 'yes' ),
            		 ),
                     
                     array(
                        'heading'     => esc_html__( 'Heading','yog'),
                        'type'        => 'textfield',
                        'admin_label' => true,
                        'value'       => '',
                        'param_name'  => 'yog_heading',
                     ),
                     
                     array(
                        'type'        => 'textarea_raw_html',
            			'holder'      => 'div',
            			'heading'     => esc_html__( 'Content', 'yog' ),
            			'param_name'  => 'yog_content',
            			'value'       => base64_encode( '<p>I am raw html block.<br/>Click edit button to change this html</p>' ),
            			'description' => esc_html__( 'Enter your HTML content.', 'yog' ),
                    )
                )
             )
          )
       )
    );
    
/*-------------------------------------------------------------------------------
|				Flipmart:  Lists Module / Element Map				            |						
--------------------------------------------------------------------------------*/

	vc_map( array(
	  'name'        => esc_html__('Flipmart Lists', 'yog'),
	  'base'        => 'yog_lists',
	  'class'       => 'icon_yog_lists',
	  'icon'	    => 'icon-wpb-ui-lists',
	  'weight'      => 101,
	  'category'    => esc_html__('Flipmart Modules', 'yog'),
	  'description' => esc_html__( 'Insert Lists', 'yog' ),
	  'params'      => array(
            
            array(
                'type'       => 'param_group',
                'value'      => '',
                'param_name' => 'yog_list',
                'params'     => array(
                    
                     array(
                        'heading'     => esc_html__( 'List','yog'),
                        'type'        => 'textarea',
                        'value'       => '',
                        'param_name'  => 'yog_list_item',
                     )
                )
             )
          )
       )
    );
    
/*-------------------------------------------------------------------------------
|				Flipmart:  Google Map Module / Element Map				            |						
--------------------------------------------------------------------------------*/

	vc_map( array(
	  'name'        => esc_html__('Flipmart Google Map', 'yog'),
	  'base'        => 'yog_google_maps',
	  'class'       => 'icon_yog_google_maps',
	  'icon'	    => 'icon-wpb-ui-separator',
	  'weight'      => 101,
	  'category'    => esc_html__('Flipmart Modules', 'yog'),
	  'description' => esc_html__( 'Insert Google Map', 'yog' ),
	  'params'      => array(
      
            array(
                'heading'    => esc_html__( 'Latitude','yog'),
                'type'       => 'textfield',
                'value'      => '',
                'param_name' => 'yog_lat',
            ),
            
            array(
                'heading'    => esc_html__( 'Longitude','yog'),
                'type'       => 'textfield',
                'value'      => '',
                'param_name' => 'yog_long',
            ),
            
            array(
                'heading'    => esc_html__( 'Maker Image','yog'),
                'type'       => 'attach_image',
                'value'      => '',
                'param_name' => 'yog_marker_image',
            )
         )
       )
    );
    
/*-------------------------------------------------------------------------------
|				Flipmart:  Contact Info Module / Element Map				            |						
--------------------------------------------------------------------------------*/

	vc_map( array(
	  'name'        => esc_html__('Flipmart Contact Info', 'yog'),
	  'base'        => 'yog_contact_info',
	  'class'       => 'icon_yog_contact_info',
	  'icon'	    => 'icon-wpb-ui-separator',
	  'weight'      => 101,
	  'category'    => esc_html__('Flipmart Modules', 'yog'),
	  'description' => esc_html__( 'Insert Contact Info', 'yog' ),
	  'params'      => array(
      
            array(
                'heading'    => esc_html__( 'Heading','yog'),
                'type'       => 'textfield',
                'value'      => '',
                'admin_label' => true,
                'param_name' => 'yog_heading',
            ),
            
            array(
                'heading'    => esc_html__( 'Address','yog'),
                'type'       => 'textarea',
                'value'      => '',
                'param_name' => 'yog_address',
            ),
            
            array(
                'heading'    => esc_html__( 'Phone Number','yog'),
                'type'       => 'textfield',
                'value'      => '',
                'param_name' => 'yog_phone_number',
            ),
            
            array(
                'heading'    => esc_html__( 'Email','yog'),
                'type'       => 'textfield',
                'value'      => '',
                'param_name' => 'yog_email',
            )
         )
       )
    );
    
/*-------------------------------------------------------------------------------
|				Flipmart:  Client Logs Module / Element Map				            |						
--------------------------------------------------------------------------------*/

	vc_map( array(
	  'name'        => esc_html__('Flipmart Client Logs', 'yog'),
	  'base'        => 'yog_client_logos',
	  'class'       => 'icon_yog_client_logos',
	  'icon'	    => 'icon-wpb-ui-accordion',
	  'weight'      => 101,
	  'category'    => esc_html__('Flipmart Modules', 'yog'),
	  'description' => esc_html__( 'Insert Client Logs', 'yog' ),
	  'params'      => array(
            
            array(
                'heading'     => esc_html__('Animation', 'yog'),
    			'type'        => 'dropdown',
    			'param_name'  => 'yog_animation',
    			'value'       => yog_get_animations(),
    			'description' => esc_html__('Choose Animation from the drop down list.', 'yog'),
    		),
             
            array(
                'heading'    => esc_html__( 'Delay','yog'),
                'type'       => 'textfield',
                'param_name' => 'yog_delay',
            ),
             
            array(
                'type'       => 'param_group',
                'value'      => '',
                'param_name' => 'yog_client_logo',
                'params'     => array(
                
                    array(
                        'heading'    => esc_html__( 'Logo','yog'),
                        'type'       => 'attach_image',
                        'value'      => '',
                        'param_name' => 'yog_logo',
                    ),
                    
                    array(
                        'heading'    => esc_html__( 'Link','yog'),
                        'type'       => 'vc_link',
                        'value'      => '',
                        'param_name' => 'yog_link',
                    )
                )
             )
          )
       )
    );
    
/*-------------------------------------------------------------------------------
|				Flipmart:  Hero Section Module / Element Map				            |						
--------------------------------------------------------------------------------*/

	vc_map( array(
	  'name'        => esc_html__('Flipmart Hero Section', 'yog'),
	  'base'        => 'yog_hero_sections',
	  'class'       => 'icon_yog_hero_section',
	  'icon'	    => 'icon-wpb-ui-accordion',
	  'weight'      => 101,
	  'category'    => esc_html__('Flipmart Modules', 'yog'),
	  'description' => esc_html__( 'Insert Hero Section Slider', 'yog' ),
	  'params'      => array(
            
            array(
                'type'       => 'param_group',
                'value'      => '',
                'param_name' => 'yog_hero_section',
                'params'     => array(
                    
                     array(
                        'heading'     => esc_html__( 'Heading','yog'),
                        'type'        => 'textfield',
                        'admin_label' => true,
                        'value'       => '',
                        'param_name'  => 'yog_heading',
                    ),
                     
                    array(
                        'heading'     => esc_html__( 'Sub Heading','yog'),
                        'type'        => 'textfield',
                        'value'       => '',
                        'param_name'  => 'yog_sub_heading',
                    ),
                    
                    array(
                        'heading'     => esc_html__( 'Content','yog'),
                        'type'        => 'textfield',
                        'value'       => '',
                        'param_name'  => 'yog_content',
                    ),
                    
                    array(
                        'heading'     => esc_html__( 'Background Image','yog'),
                        'type'        => 'attach_image',
                        'value'       => '',
                        'param_name'  => 'yog_bg',
                    ),
                    
                    array(
                        'heading'     => esc_html__( 'Link','yog'),
                        'type'        => 'vc_link',
                        'value'       => '',
                        'param_name'  => 'yog_link',
                    )
                )
             )
          )
       )
    );
    
/*-------------------------------------------------------------------------------
|				Flipmart:  Info Box Module / Element Map				            |						
--------------------------------------------------------------------------------*/

	vc_map( array(
	  'name'        => esc_html__('Flipmart Info Box', 'yog'),
	  'base'        => 'yog_info_boxes',
	  'class'       => 'icon_yog_info_boxes',
	  'icon'	    => 'icon-wpb-ui-accordion',
	  'weight'      => 101,
	  'category'    => esc_html__('Flipmart Modules', 'yog'),
	  'description' => esc_html__( 'Insert Info Box', 'yog' ),
	  'params'      => array(
      
            array(
                'heading'     => esc_html__('Columns', 'yog'),
    			'type'        => 'dropdown',
    			'param_name'  => 'yog_column',
    			'admin_label' => true,
    			'value' => array(
                    esc_html__('Default Column', 'yog') => '',
    				esc_html__('Two Column', 'yog')     => '2',
    				esc_html__('Three Column', 'yog')   => '3',
                    esc_html__('Four Column', 'yog')    => '4',
    			),
    			'description' => esc_html__('Select Number Of Column', 'yog'),
    	    ),
            
            array(
                'type'       => 'param_group',
                'value'      => '',
                'param_name' => 'yog_info_boxe',
                'params'     => array(
                    
                     array(
                        'heading'     => esc_html__( 'Heading','yog'),
                        'type'        => 'textfield',
                        'admin_label' => true,
                        'value'       => '',
                        'param_name'  => 'yog_heading',
                    ),
                     
                    array(
                        'heading'     => esc_html__( 'Sub Heading','yog'),
                        'type'        => 'textfield',
                        'value'       => '',
                        'param_name'  => 'yog_sub_heading',
                    )
                )
             ),
             
             array(
                'heading'     => esc_html__('Animation', 'yog'),
    			'type'        => 'dropdown',
    			'param_name'  => 'yog_animation',
    			'value'       => yog_get_animations(),
    			'description' => esc_html__('Choose Animation from the drop down list.', 'yog'),
    		 ),
             
             array(
                'heading'    => esc_html__( 'Delay','yog'),
                'type'       => 'textfield',
                'param_name' => 'yog_delay',
             )
          )
       )
    );
    
/*-------------------------------------------------------------------------------
|				Flipmart:  Image Banner Module / Element Map				            |						
--------------------------------------------------------------------------------*/

	vc_map( array(
	  'name'        => esc_html__('Flipmart Image Banner', 'yog'),
	  'base'        => 'yog_image_banner',
	  'class'       => 'icon_yog_image_banner',
	  'icon'	    => 'icon-wpb-ui-separator',
	  'weight'      => 101,
	  'category'    => esc_html__('Flipmart Modules', 'yog'),
	  'description' => esc_html__( 'Insert Image Banner', 'yog' ),
	  'params'      => array(
            
            array(
                'heading'     => esc_html__('Style', 'yog'),
    			'type'        => 'dropdown',
    			'param_name'  => 'yog_style',
    			'admin_label' => true,
    			'value' => array(
                    esc_html__('Image', 'yog')               => '',
    				esc_html__('Image With Text One', 'yog') => 'image-text',
                    esc_html__('Image With Text Two', 'yog') => 'image-text-two'
    			),
    			'description' => esc_html__('Select banner style', 'yog'),
    	    ),
            
            array(
                'heading'     => esc_html__( 'Banner Image','yog'),
                'type'        => 'attach_image',
                'value'       => '',
                'param_name'  => 'yog_banner',
            ),
            
            array(
                'heading'     => esc_html__( 'Heading','yog'),
                'type'        => 'textfield',
                'value'       => '',
                'admin_label' => true,
                'param_name'  => 'yog_heading',
                'dependency'  => array(
    				'element' => 'yog_style',
                    'value'   => array( 'image-text', 'image-text-two' )
   			    )
            ),
            
            array(
                'heading'     => esc_html__( 'Sub Heading','yog'),
                'type'        => 'textfield',
                'value'       => '',
                'param_name'  => 'yog_sub_heading',
                'dependency'  => array(
    				'element' => 'yog_style',
                    'value'   => array( 'image-text', 'image-text-two' )
   			    )
            ),
            
            array(
                'heading'     => esc_html__( 'Content','yog'),
                'type'        => 'textfield',
                'value'       => '',
                'param_name'  => 'yog_content',
                'dependency'  => array(
    				'element' => 'yog_style',
                    'value'   => array( 'image-text-two' )
   			    )
            ),
            
            array(
                'heading'     => esc_html__( 'Label','yog'),
                'type'        => 'textfield',
                'value'       => '',
                'param_name'  => 'yog_label',
                'dependency'  => array(
    				'element' => 'yog_style',
                    'value'   => array( 'image-text' )
   			    )
            ),
            
            array(
                'heading'     => esc_html__('Animation', 'yog'),
    			'type'        => 'dropdown',
    			'param_name'  => 'yog_animation',
    			'value'       => yog_get_animations(),
    			'description' => esc_html__('Choose Animation from the drop down list.', 'yog'),
    		 ),
             
             array(
                'heading'     => esc_html__( 'Delay','yog'),
                'type'        => 'textfield',
                'param_name'  => 'yog_delay',
             )
         )
       )
    );
    
 /*-------------------------------------------------------------------------------
|				Flipmart:  Blog Module / Element Map				            |						
--------------------------------------------------------------------------------*/

	vc_map( array(
	  'name'        => esc_html__('Flipmart Blog Posts', 'yog'),
	  'base'        => 'yog_blog_posts',
	  'class'       => 'icon_yog_blog_posts',
	  'icon'	    => 'icon-wpb-ui-separator',
	  'weight'      => 101,
	  'category'    => esc_html__('Flipmart Modules', 'yog'),
	  'description' => esc_html__( 'Insert Blog Posts', 'yog' ),
	  'params'      => array(

            array(
                'heading'     => esc_html__( 'Heading','yog'),
                'type'        => 'textfield',
                'value'       => '',
                'admin_label' => true,
                'param_name'  => 'yog_heading'
            ),
            
            array(
                'heading'    => esc_html__( 'Number Of Posts','yog'),
                'type'       => 'textfield',
                'value'      => '',
                'param_name' => 'yog_limit',
            ),
            
            array(
        		'type'       => 'autocomplete',
        		'heading'    => esc_html__( 'Choose Categories', 'yog' ),
        		'param_name' => 'taxonomie',
        		'settings'   => array(
        			'multiple'       => true,
        			'min_length'     => 1,
        			'groups'         => true,
        			'unique_values'  => true,
        			'display_inline' => true,
        			'delay'          => 500,
        			'auto_focus'     => true,
        		),
        		'param_holder_class' => 'vc_not-for-custom',
        		'description'        => esc_html__( 'Enter categories of blog posts.', 'yog' ),
        	),
            
            array(
                'heading'     => esc_html__('Animation', 'yog'),
    			'type'        => 'dropdown',
    			'param_name'  => 'yog_animation',
    			'value'       => yog_get_animations(),
    			'description' => esc_html__('Choose Animation from the drop down list.', 'yog'),
    		),
             
            array(
                'heading'     => esc_html__( 'Delay','yog'),
                'type'        => 'textfield',
                'param_name'  => 'yog_delay',
            )
         )
       )
    );

/*-------------------------------------------------------------------------------
|				Flipmart: Woocommerce Shortcode / Element Shortcode			|						
--------------------------------------------------------------------------------*/    
/**
 * Check if WooCommerce is active
 **/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'woocommerce/woocommerce.php' ) || is_plugin_active_for_network( 'woocommerce/woocommerce.php' ) || is_network_only_plugin( 'woocommerce/woocommerce.php' ) ) {
/*-------------------------------------------------------------------------------
|				Flipmart: Woocommerce product / Element Shortcode			|						
--------------------------------------------------------------------------------*/        
  vc_map( array(
		'name'        => esc_html__( 'Product', 'yog' ),
		'base'        => 'yog_product',
		'icon'        => 'icon-wpb-woocommerce',
		'category'    => esc_html__( 'WooCommerce', 'yog' ),
		'description' => esc_html__( 'Show a single product by ID or SKU', 'yog' ),
		'params'      => array(
        
            array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Style', 'yog' ),
				'param_name' => 'style',
				'value'      => array(
                    esc_html__('Style One', 'yog')   => 'one', 
                    esc_html__('Style Two', 'yog')   => 'two',
                    esc_html__('Style Three', 'yog') => 'four',
                ),
				'save_always' => true,
				'description' =>  esc_html__( 'Select how to show product', 'yog' ),
			),
            
			array(
				'type'        => 'autocomplete',
				'heading'     => esc_html__( 'Select identificator', 'yog' ),
				'param_name'  => 'id',
				'description' => esc_html__( 'Input product ID or product SKU or product title to see suggestions', 'yog' ),
			),
            
			array(
				'type'       => 'hidden',
				'param_name' => 'sku',
			)
		)
	));
    
/*-------------------------------------------------------------------------------
|				Flipmart: Woocommerce products / Element Shortcode			|						
--------------------------------------------------------------------------------*/        
  vc_map( array(
		'name'        => esc_html__( 'Products', 'yog' ),
		'base'        => 'yog_products',
		'icon'        => 'icon-wpb-woocommerce',
		'category'    => esc_html__( 'WooCommerce', 'yog' ),
		'description' => esc_html__( 'Show multiple products by ID or SKU.', 'yog' ),
		'params'      => array(
        
            array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Style', 'yog' ),
				'param_name'    => 'style',
				'value' => array(
                    esc_html__('Style One', 'yog')   => 'one', 
                    esc_html__('Style Two', 'yog')   => 'two'
                ),
				'save_always'   => true,
				'description'   =>  esc_html__( 'Select how to show product', 'yog' ),
			),
            
            array(
				'type'          => 'textfield',
				'heading'       => esc_html__( 'Heading', 'yog' ),
				'save_always'   => true,
				'param_name'    => 'heading',
			),
            
			array(
				'type'         => 'dropdown',
				'heading'      => esc_html__( 'Order by', 'yog' ),
				'param_name'   => 'orderby',
				'value'        => $yog_order_by_values,
				'std'          => 'title',
				'save_always'  => true,
				'description'  => sprintf( __( 'Select how to sort retrieved products. More at %s. Default by Title', 'yog' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
			),
            
			array(
				'type'         => 'dropdown',
				'heading'      => esc_html__( 'Sort order', 'yog' ),
				'param_name'   => 'order',
				'value'        => $yog_order_way_values,
				'save_always'  => true,
				'description'  => sprintf( __( 'Designates the ascending or descending order. More at %s. Default by ASC', 'yog' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
			),
            
			array(
				'type'         => 'autocomplete',
				'heading'      => esc_html__( 'Products', 'yog' ),
				'param_name'   => 'ids',
				'settings'     => array(
					'multiple' => true,
					'sortable' => true,
					'unique_values' => true,
				),
				'save_always'  => true,
				'description'  => esc_html__( 'Enter List of Products', 'yog' ),
			),
            
            array(
                'heading'      => esc_html__('Pagination', 'teach-me'),
    			'type'         => 'checkbox',
    			'param_name'   => 'pagination',
    			'description'  => esc_html__('Make checked to Enable Pagination.', 'teach-me'),
            ),
            
			array(
				'type'         => 'hidden',
				'param_name'   => 'skus',
			),
            
            array(
                'heading'     => esc_html__('Animation', 'yog'),
    			'type'        => 'dropdown',
    			'param_name'  => 'yog_animation',
    			'value'       => yog_get_animations(),
    			'description' => esc_html__('Choose Animation from the drop down list.', 'yog'),
    		),
             
            array(
                'heading'     => esc_html__( 'Delay','yog'),
                'type'        => 'textfield',
                'param_name'  => 'yog_delay',
            )
		)
	));
            
/*-------------------------------------------------------------------------------
|				Flipmart: Woocommerce Recent products / Element Shortcode			|						
--------------------------------------------------------------------------------*/    
    
    vc_map( array(
        'name'        => esc_html__( 'Recent products', 'yog' ),
		'base'        => 'yog_recent_products',
		'icon'        => 'icon-wpb-woocommerce',
		'category'    => esc_html__( 'WooCommerce', 'yog' ),
		'description' => esc_html__( 'Lists recent products', 'yog' ),
		'params'      => array(
        
            array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Style', 'yog' ),
				'param_name'    => 'style',
				'value' => array(
                    esc_html__('Style One', 'yog')   => 'one', 
                    esc_html__('Style Two', 'yog')   => 'two'
                ),
				'save_always'   => true,
				'description'   =>  esc_html__( 'Select how to show product', 'yog' ),
			),
            
            array(
				'type'          => 'textfield',
				'heading'       => esc_html__( 'Heading', 'yog' ),
				'save_always'   => true,
				'param_name'    => 'heading',
			),
            
            array(
				'type'          => 'textfield',
				'heading'       => esc_html__( 'Per page', 'yog' ),
				'value'         => 12,
				'save_always'   => true,
				'param_name'    => 'per_page',
				'description'   => esc_html__( 'The "per_page" shortcode determines how many products to show on the page', 'yog' ),
			),
            
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__( 'Columns', 'yog' ),
				'value'         => 4,
				'param_name'    => 'columns',
				'save_always'   => true,
				'description'   => esc_html__( 'The columns attribute controls how many columns wide the products should be before wrapping.', 'yog' ),
			    'dependency'    => array(
    				'element'   => 'style',
                    'value'     => array( 'three' )
   			     ) 
            ),
            
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Order by', 'yog' ),
				'param_name'    => 'orderby',
				'value'         => $yog_order_by_values,
				'save_always'   => true,
				'description'   => sprintf( __( 'Select how to sort retrieved products. More at %s.', 'yog' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
			),
            
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Sort order', 'yog' ),
				'param_name'    => 'order',
				'value'         => $yog_order_way_values,
				'save_always'   => true,
				'description'   => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'yog' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
			),
            
            array(
                'heading'       => esc_html__('Pagination', 'teach-me'),
    			'type'          => 'checkbox',
    			'param_name'    => 'pagination',
    			'description'   => esc_html__('Make checked to Enable Pagination.', 'teach-me'),
            ),
            
            array(
				'type'          => 'autocomplete',
				'heading'       => esc_html__( 'Categories', 'yog' ),
				'param_name'    => 'category',
				'settings'      => array(
					'multiple'  => true,
					'sortable'  => true,
				),
				'save_always'   => true,
				'description'   => esc_html__( 'List of product categories', 'yog' ),
			),
            
            array(
                'heading'     => esc_html__('Animation', 'yog'),
    			'type'        => 'dropdown',
    			'param_name'  => 'yog_animation',
    			'value'       => yog_get_animations(),
    			'description' => esc_html__('Choose Animation from the drop down list.', 'yog'),
    		),
             
            array(
                'heading'     => esc_html__( 'Delay','yog'),
                'type'        => 'textfield',
                'param_name'  => 'yog_delay',
            )
		)
	));
    
/*-------------------------------------------------------------------------------
|				Flipmart: Woocommerce Featured products / Element Shortcode			|						
--------------------------------------------------------------------------------*/    
    
    vc_map( array(
        'name'        => esc_html__( 'Featured products', 'yog' ),
		'base'        => 'yog_featured_products',
		'icon'        => 'icon-wpb-woocommerce',
		'category'    => esc_html__( 'WooCommerce', 'yog' ),
		'description' => esc_html__( 'Display products set as "featured"', 'yog' ),
		'params'      => array(
            
            array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Style', 'yog' ),
				'param_name'    => 'style',
				'value' => array(
                    esc_html__('Style One', 'yog')   => 'one', 
                    esc_html__('Style Two', 'yog')   => 'two'
                ),
				'save_always'   => true,
				'description'   =>  esc_html__( 'Select how to show product', 'yog' ),
			),
            
            array(
				'type'          => 'textfield',
				'heading'       => esc_html__( 'Heading', 'yog' ),
				'save_always'   => true,
				'param_name'    => 'heading',
			),
			
            array(
				'type'          => 'textfield',
				'heading'       => esc_html__( 'Per page', 'yog' ),
				'value'         => 12,
				'save_always'   => true,
				'param_name'    => 'per_page',
				'description'   => esc_html__( 'The "per_page" shortcode determines how many products to show on the page', 'yog' ),
			),
            
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Order by', 'yog' ),
				'param_name'    => 'orderby',
				'value'         => $yog_order_by_values,
				'save_always'   => true,
				'description'   => sprintf( __( 'Select how to sort retrieved products. More at %s.', 'yog' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
			),
            
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Sort order', 'yog' ),
				'param_name'    => 'order',
				'value'         => $yog_order_way_values,
				'save_always'   => true,
				'description'   => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'yog' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
			),
            
            array(
                'heading'       => esc_html__('Pagination', 'teach-me'),
    			'type'          => 'checkbox',
    			'param_name'    => 'pagination',
    			'description'   => esc_html__('Make checked to Enable Pagination.', 'teach-me'),
            ),
            
            array(
                'heading'     => esc_html__('Animation', 'yog'),
    			'type'        => 'dropdown',
    			'param_name'  => 'yog_animation',
    			'value'       => yog_get_animations(),
    			'description' => esc_html__('Choose Animation from the drop down list.', 'yog'),
    		),
             
            array(
                'heading'     => esc_html__( 'Delay','yog'),
                'type'        => 'textfield',
                'param_name'  => 'yog_delay',
            )
		)
	));
    
/*-------------------------------------------------------------------------------
|				Flipmart: Woocommerce Sale products / Element Shortcode			|						
--------------------------------------------------------------------------------*/    
    
    vc_map( array(
        'name'        => esc_html__( 'Sale products', 'yog' ),
		'base'        => 'yog_sale_products',
		'icon'        => 'icon-wpb-woocommerce',
		'category'    => esc_html__( 'WooCommerce', 'yog' ),
		'description' => esc_html__( 'List all products on sale', 'yog' ),
		'params'      => array(
            array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Style', 'yog' ),
				'param_name'    => 'style',
				'value' => array(
                    esc_html__('Style One', 'yog')   => 'one', 
                    esc_html__('Style Two', 'yog')   => 'two'
                ),
				'save_always'   => true,
				'description'   =>  esc_html__( 'Select how to show product', 'yog' ),
			),
            
            array(
				'type'          => 'textfield',
				'heading'       => esc_html__( 'Heading', 'yog' ),
				'save_always'   => true,
				'param_name'    => 'heading',
			),
            
            array(
				'type'          => 'textfield',
				'heading'       => esc_html__( 'Per page', 'yog' ),
				'value'         => 12,
				'save_always'   => true,
				'param_name'    => 'per_page',
				'description'   => esc_html__( 'The "per_page" shortcode determines how many products to show on the page', 'yog' ),
			),
            
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Order by', 'yog' ),
				'param_name'    => 'orderby',
				'value'         => $yog_order_by_values,
				'save_always'   => true,
				'description'   => sprintf( __( 'Select how to sort retrieved products. More at %s.', 'yog' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
			),
            
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Sort order', 'yog' ),
				'param_name'    => 'order',
				'value'         => $yog_order_way_values,
				'save_always'   => true,
				'description'   => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'yog' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
			),
            
            array(
                'heading'       => esc_html__('Pagination', 'teach-me'),
    			'type'          => 'checkbox',
    			'param_name'    => 'pagination',
    			'description'   => esc_html__('Make checked to Enable Pagination.', 'teach-me'),
            ),
            
            array(
                'heading'     => esc_html__('Animation', 'yog'),
    			'type'        => 'dropdown',
    			'param_name'  => 'yog_animation',
    			'value'       => yog_get_animations(),
    			'description' => esc_html__('Choose Animation from the drop down list.', 'yog'),
    		),
             
            array(
                'heading'     => esc_html__( 'Delay','yog'),
                'type'        => 'textfield',
                'param_name'  => 'yog_delay',
            )
		)
	));
    
/*-------------------------------------------------------------------------------
|				Flipmart: Woocommerce Best Selling products / Element Shortcode			|						
--------------------------------------------------------------------------------*/    
    
    vc_map( array(
        'name'        => esc_html__( 'Best Selling Products', 'yog' ),
		'base'        => 'yog_best_selling_products',
		'icon'        => 'icon-wpb-woocommerce',
		'category'    => esc_html__( 'WooCommerce', 'yog' ),
		'description' => esc_html__( 'List best selling products on sale', 'yog' ),
		'params'      => array(
            array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Style', 'yog' ),
				'param_name'    => 'style',
				'value' => array(
                    esc_html__('Style One', 'yog')   => 'one', 
                    esc_html__('Style Two', 'yog')   => 'two'
                ),
				'save_always'   => true,
				'description'   =>  esc_html__( 'Select how to show product', 'yog' ),
			),
            
            array(
				'type'          => 'textfield',
				'heading'       => esc_html__( 'Heading', 'yog' ),
				'save_always'   => true,
				'param_name'    => 'heading',
			),
            
            array(
				'type'          => 'textfield',
				'heading'       => esc_html__( 'Per page', 'yog' ),
				'value'         => 12,
				'param_name'    => 'per_page',
				'save_always'   => true,
				'description'   => esc_html__( 'How much items per page to show', 'yog' ),
			),
			
            array(
                'heading'       => esc_html__('Pagination', 'teach-me'),
    			'type'          => 'checkbox',
    			'param_name'    => 'pagination',
    			'description'   => esc_html__('Make checked to Enable Pagination.', 'teach-me'),
            ),
            
            array(
                'heading'     => esc_html__('Animation', 'yog'),
    			'type'        => 'dropdown',
    			'param_name'  => 'yog_animation',
    			'value'       => yog_get_animations(),
    			'description' => esc_html__('Choose Animation from the drop down list.', 'yog'),
    		),
             
            array(
                'heading'     => esc_html__( 'Delay','yog'),
                'type'        => 'textfield',
                'param_name'  => 'yog_delay',
            )
		)
	));
    
/*-------------------------------------------------------------------------------
|				Flipmart: Woocommerce Sale products / Element Shortcode			|						
--------------------------------------------------------------------------------*/    
    
    vc_map( array(
        'name'        => esc_html__( 'Top Rated Products', 'yog' ),
		'base'        => 'yog_top_rated_products',
		'icon'        => 'icon-wpb-woocommerce',
		'category'    => esc_html__( 'WooCommerce', 'yog' ),
		'description' => esc_html__( 'List all products on sale', 'yog' ),
		'params'      => array(
            array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Style', 'yog' ),
				'param_name'    => 'style',
				'value' => array(
                    esc_html__('Style One', 'yog')   => 'one', 
                    esc_html__('Style Two', 'yog')   => 'two'
                ),
				'save_always'   => true,
				'description'   =>  esc_html__( 'Select how to show product', 'yog' ),
			),
            
            array(
				'type'          => 'textfield',
				'heading'       => esc_html__( 'Heading', 'yog' ),
				'save_always'   => true,
				'param_name'    => 'heading',
			),
            
            array(
				'type'          => 'textfield',
				'heading'       => esc_html__( 'Per page', 'yog' ),
				'value'         => 12,
				'save_always'   => true,
				'param_name'    => 'per_page',
				'description'   => esc_html__( 'The "per_page" shortcode determines how many products to show on the page', 'yog' ),
			),

			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Order by', 'yog' ),
				'param_name'    => 'orderby',
				'value'         => $yog_order_by_values,
				'save_always'   => true,
				'description'   => sprintf( __( 'Select how to sort retrieved products. More at %s.', 'yog' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
			),
            
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Sort order', 'yog' ),
				'param_name'    => 'order',
				'value'         => $yog_order_way_values,
				'save_always'   => true,
				'description'   => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'yog' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
			),
            
            array(
                'heading'       => esc_html__('Pagination', 'teach-me'),
    			'type'          => 'checkbox',
    			'param_name'    => 'pagination',
    			'description'   => esc_html__('Make checked to Enable Pagination.', 'teach-me'),
            ),
            
            array(
                'heading'     => esc_html__('Animation', 'yog'),
    			'type'        => 'dropdown',
    			'param_name'  => 'yog_animation',
    			'value'       => yog_get_animations(),
    			'description' => esc_html__('Choose Animation from the drop down list.', 'yog'),
    		),
             
            array(
                'heading'     => esc_html__( 'Delay','yog'),
                'type'        => 'textfield',
                'param_name'  => 'yog_delay',
            )
		)
	));

/*-------------------------------------------------------------------------------
|				Flipmart: Woocommerce product Categories/ Element Shortcode			|						
--------------------------------------------------------------------------------*/    
  vc_map( array(
		'name'        => esc_html__( 'Product Category', 'yog' ),
		'base'        => 'yog_product_category',
		'icon'        => 'icon-wpb-woocommerce',
		'category'    => esc_html__( 'WooCommerce', 'yog' ),
		'description' => esc_html__( 'Show multiple products in a category', 'yog' ),
		'params'      => array(
            array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Style', 'yog' ),
				'param_name'    => 'style',
				'value'         => array(
                    esc_html__('Style One', 'yog')   => 'one', 
                    esc_html__('Style Two', 'yog')   => 'two',
                    esc_html__('Style Three', 'yog') => 'three',
                    esc_html__('Style Four', 'yog')  => 'four',
                    esc_html__('Style Five', 'yog')  => 'five',
                    esc_html__('Style Six', 'yog')   => 'six',
                    esc_html__('Style Seven', 'yog') => 'seven',
                ),
				'save_always'   => true,
				'description'   =>  esc_html__( 'Select how to show product', 'yog' ),
			),
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__( 'Per page', 'yog' ),
				'value'         => 12,
				'save_always'   => true,
				'param_name'    => 'per_page',
				'description'   => esc_html__( 'How much items per page to show', 'yog' ),
			),
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__( 'Columns', 'yog' ),
				'value'         => 4,
				'save_always'   => true,
				'param_name'    => 'columns',
				'description'   => esc_html__( 'How much columns grid', 'yog' ),
                'dependency'    => array(
    				'element'   => 'style',
                    'value'     => array( 'one', 'two', 'four' )
   			     ) 
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Order by', 'yog' ),
				'param_name'    => 'orderby',
				'value'         => $yog_order_by_values,
				'save_always'   => true,
				'description'   => sprintf( __( 'Select how to sort retrieved products. More at %s.', 'yog' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Sort order', 'yog' ),
				'param_name'    => 'order',
				'value'         => $yog_order_way_values,
				'save_always'   => true,
				'description'   => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'yog' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Category', 'yog' ),
				'value'         => yog_get_taxonomy_dropdown('product_cat'),
				'param_name'    => 'category',
				'save_always'   => true,
				'description'   => esc_html__( 'Product category list', 'yog' ),
			),
            array(
                'heading'       => esc_html__('Pagination', 'teach-me'),
    			'type'          => 'checkbox',
    			'param_name'    => 'pagination',
    			'description'   => esc_html__('Make checked to Enable Pagination.', 'teach-me'),
            )
		)
  ));
/*-------------------------------------------------------------------------------
|				Flipmart: Woocommerce product Categories/ Element Shortcode			|						
--------------------------------------------------------------------------------*/    
  vc_map( array(
		'name'        => esc_html__( 'Product categories', 'yog' ),
		'base'        => 'yog_product_categories',
		'icon'        => 'icon-wpb-woocommerce',
		'category'    => esc_html__( 'WooCommerce', 'yog' ),
		'description' => esc_html__( 'Display product categories loop', 'yog' ),
		'params'      => array(
            array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Style', 'yog' ),
				'param_name'    => 'style',
				'value'         => array(
                    esc_html__('Default', 'yog') => 'one', 
                    esc_html__('Filter', 'yog') => 'four',
                ),
				'save_always'   => true,
				'description'   =>  esc_html__( 'Select how to show product', 'yog' ),
			),
            array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Style', 'yog' ),
				'param_name'    => 'style_sec',
				'value'         => array(
                    esc_html__('Style One', 'yog')   => 'one', 
                    esc_html__('Style Two', 'yog')   => 'two'
                ),
				'save_always'   => true,
				'description'   =>  esc_html__( 'Select how to show product', 'yog' ),
                'dependency'    => array(
    				'element'   => 'style',
                    'value'     => array( 'one' )
   			     )
			),
            array(
				'type'          => 'textfield',
				'heading'       => esc_html__( 'Columns', 'yog' ),
				'value'         => 4,
				'save_always'   => true,
				'param_name'    => 'columns',
				'description'   => esc_html__( 'How much columns grid', 'yog' ),
                'dependency'    => array(
    				'element'   => 'style_sec',
                    'value'     => array( 'two' )
   			     ) 
			),
            array(
				'type'          => 'textfield',
				'heading'       => esc_html__( 'Per page', 'yog' ),
				'value'         => 12,
				'save_always'   => true,
				'param_name'    => 'per_page',
				'description'   => esc_html__( 'How much items per page to show', 'yog' ),
                'dependency'    => array(
    				'element'   => 'style',
                    'value'     => array( 'four' )
   			     )
			),
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__( 'Number', 'yog' ),
				'param_name'    => 'number',
				'description'   => esc_html__( 'The `number` field is used to display the number of products.', 'yog' ),
                'dependency'    => array(
    				'element'   => 'style',
                    'value'     => array( 'one' )
   			     )
			),
            array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Product Order by', 'yog' ),
				'param_name'    => 'poduct_orderby',
				'value'         => $yog_order_by_values,
				'save_always'   => true,
				'description'   => sprintf( __( 'Select how to sort retrieved products. More at %s.', 'yog' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
                'dependency'    => array(
    				'element'   => 'style',
                    'value'     => array( 'four' )
   			     )
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Product Sort order', 'yog' ),
				'param_name'    => 'poduct_order',
				'value'         => $yog_order_way_values,
				'save_always'   => true,
				'description'   => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'yog' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
                'dependency'    => array(
    				'element'   => 'style',
                    'value'     => array( 'four' )
   			     )
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Order by', 'yog' ),
				'param_name'    => 'orderby',
				'value'         => $yog_order_by_values,
				'save_always'   => true,
				'description'   => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'yog' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
			),
			array(
				'type'          => 'dropdown',
				'heading'       => esc_html__( 'Sort order', 'yog' ),
				'param_name'    => 'order',
				'value'         => $yog_order_way_values,
				'save_always'   => true,
				'description'   => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'yog' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
			),
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__( 'Number', 'yog' ),
				'param_name'    => 'hide_empty',
				'description'   => esc_html__( 'Hide empty', 'yog' ),
			),
			array(
				'type'          => 'autocomplete',
				'heading'       => esc_html__( 'Categories', 'yog' ),
				'param_name'    => 'ids',
				'settings'      => array(
					'multiple'  => true,
					'sortable'  => true,
				),
				'save_always'   => true,
				'description'   => esc_html__( 'List of product categories', 'yog' ),
			)
		 )
	   )
    );
}