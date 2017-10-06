<?php
//Skin Create
add_action( 'wp_ajax_yog_skin_generator', 'yog_skin_generator' );
add_action('wp_ajax_nopriv_yog_skin_generator', 'yog_skin_generator');

//Skin Remove
add_action( 'wp_ajax_yog_skin_remove', 'yog_skin_remove' );
add_action('wp_ajax_nopriv_yog_skin_remove', 'yog_skin_remove');

//Cart Update
add_action('wp_ajax_yog_cart_update', 'yog_cart_update'); 
add_action('wp_ajax_nopriv_yog_cart_update', 'yog_cart_update');

function yog_skin_generator() {
    
    $name           = $_POST['skin_name'];
    $color          = $_POST['skin_color'];
    $skin_sec_color = $_POST['skin_sec_color'];

    if( empty( $name ) || empty( $color ) ) die();

    // generate filename
    $filename = yog_helper()->yog_uglify( $name );
    $skin     = get_template_directory() . '/assets/less/skin.less';
    $css      = get_template_directory() . '/assets/css/skins/' . $filename . '.css';

    // Delte previous file
    if( file_exists( $css ) ) unlink( $css );


    // LESS
    require_once( get_template_directory().'/yog/libs/class-lessc.php' );
    
    $less = new lessc;
    $less->setFormatter( 'compressed' );
    $less->setVariables( array(
        'skinColor' => $color,
        'skinSecColor' => $skin_sec_color
    ) );

   $result = $less->compileFile( $skin, $css );

    if( $result ) {
        
        $skins = get_option( '_yog_skins' );
        $skins = $skins ? $skins : array();
        $skins[$filename] = array(
            'name' => $name,
            'color' => $color,
            'skinSecColor' => $skin_sec_color
        );

        update_option( '_yog_skins', $skins );
    }

    // Refresh page
    echo 'window.location = "' . $_SERVER['HTTP_REFERER'] . '";';

    // Exit
    die();
}



function yog_skin_remove( ) {
  
    //File Name
    $filename = $_POST['skin_name'];
    
    //Check
    if( empty( $filename ) ) die();

    // generate filename
    $css = get_template_directory() . '/assets/css/skins/' . $filename . '.css';

    // Delte previous file
    unlink( $css );

    $skins = get_option( '_yog_skins' );
    unset( $skins[$filename] );
    update_option( '_yog_skins', $skins );

    // Refresh page
    echo 'window.location = "' . $_SERVER['HTTP_REFERER'] . '";';

    // Exit
    die();
}

function yog_cart_update(){
   ?> 
   <span class="cart-msg"><?php echo esc_html__( 'Cart Updated', 'flipmart' ); ?></span> 
   <div class="dropdown dropdown-cart"> 
        <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
              <div class="basket-item-count"><span class="count"><?php echo WC()->cart->get_cart_contents_count(); ?></span></div>
              <div class="total-price-basket"><?php echo sprintf ( '<span class="total-price"><span class="value">%s</span> </span>',WC()->cart->get_cart_total() ); ?></div>
            </div>
        </a>
        <div class="dropdown-menu">
            <ul>
                <?php if ( ! WC()->cart->is_empty() ) : ?>
    
        		<?php do_action( 'woocommerce_before_mini_cart_contents' ); ?>
        
        		<?php
        			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
        				$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
        
        				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
        					$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
        					$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
        					$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
        					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
        					?>
        					<li class="<?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
        						<div class="cart-item product-summary">
                                  <div class="row">
                                    <div class="col-xs-4">
                                      <div class="image">  
                                         <?php if ( ! $_product->is_visible() ) : ?>
                							<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                						<?php else : ?>
                							<a href="<?php echo esc_url( $product_permalink ); ?>">
                								<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                							</a>
                						<?php endif; ?>
                                      </div>
                                    </div>
                                    <div class="col-xs-7">
                                      <h3 class="name"><a href="<?php echo esc_url( $product_permalink ); ?>"><?php echo esc_html( $product_name ); ?></a></h3>
                                      <div class="price"><?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?></div>
                                    </div>
                                    <div class="col-xs-1 action"> 
                                        <?php
                						echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                							'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="fa fa-trash"></i></a>',
                							esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
                							__( 'Remove this item', 'flipmart' ),
                							esc_attr( $product_id ),
                							esc_attr( $_product->get_sku() )
                						), $cart_item_key );
                						?>
                                     </div>
                                  </div>
                                </div>
                                <div class="clearfix"></div><hr />
        					</li>
        					<?php
        				}
        			}
        		?>
        
        		<?php do_action( 'woocommerce_mini_cart_contents' ); ?>
        
        	<?php else : ?>
        
        		<li class="empty"><?php _e( 'No products in the cart.', 'flipmart' ); ?></li>
        
        	<?php endif; ?>
        </ul> 
            
        <?php if ( ! WC()->cart->is_empty() ) : ?>
            <div class="clearfix cart-total">
            
                <div class="pull-right"> <span class="text"><?php _e( 'Subtotal', 'flipmart' ); ?> :</span><span class='price'><?php echo WC()->cart->get_cart_subtotal(); ?></span> </div>
                <div class="clearfix"></div>
        	    <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
                <a href="<?php echo esc_url( wc_get_checkout_url() );?>" class="btn btn-upper btn-primary btn-block m-t-20"><?php echo esc_html__( 'Checkout', 'flipmart' ); ?></a> 
            
            </div>
        <?php endif; ?>
        </div>
    </div>
    <?php
    
    die();
}