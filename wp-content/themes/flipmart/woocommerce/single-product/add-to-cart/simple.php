<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product );

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
    
    <div class="quantity-container info-container">
		<div class="row">
            
            <form class="cart" method="post" enctype='multipart/form-data'>
        		
                <div class="col-sm-2">
					<span class="label"><?php echo esc_html__( 'Qty :', 'flipmart' ); ?></span>
				</div>
                
                <div class="col-sm-2">
					<div class="cart-quantity">
						<div class="quant-input">
			                <?php
                    			/**
                    			 * @since 2.1.0.
                    			 */
                    			do_action( 'woocommerce_before_add_to_cart_button' );
                    
                    			/**
                    			 * @since 3.0.0.
                    			 */
                    			do_action( 'woocommerce_before_add_to_cart_quantity' );
                    
                    			woocommerce_quantity_input( array(
                    				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                    				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                    				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity(),
                    			) );
                    
                    			/**
                    			 * @since 3.0.0.
                    			 */
                    			do_action( 'woocommerce_after_add_to_cart_quantity' );
                    		?>
		              </div>
		            </div>
				</div>
                
        
        		<div class="col-sm-7">
                    <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button btn btn-primary alt"><i class="fa fa-shopping-cart inner-right-vs"></i> <?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
                </div>
        
        		<?php
        			/**
        			 * @since 2.1.0.
        			 */
        			do_action( 'woocommerce_after_add_to_cart_button' );
        		?>
        	</form>
            
        </div>
    </div>
    
	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
