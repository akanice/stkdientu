<?php
/**
 * Product Loop End
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-end.php.
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
 * @version     2.0.0
 */
?>

<?php 
    if( isset( $_GET['shop'] ) && !isset( $_COOKIE['gridcookie'] )){
        if( $_GET['shop'] == 'grid' ){
           echo '</div>';
        }
    }elseif( isset( $_COOKIE['gridcookie'] ) ){
         if( $_COOKIE['gridcookie'] == 'grid' ){
           echo '</div>';
        }         
    }else{
        if( yog_helper()->get_option( 'shop-layout', 'raw', 'grid', 'options' ) == 'grid' ){
           echo '</div>';
        }
    }
?>
</div></div></div></div>
