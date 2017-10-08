<?php

/**
 * STKhoadientu - Responsive Multipurpose Ecommerce WordPress Child Theme - Functions
 */
 
 add_action( 'wp_enqueue_scripts', 'load_my_child_styles', 20 );
 function load_my_child_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri().'/style.css', array('yog-main-v1'), '1.2' );
 }