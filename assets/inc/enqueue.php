<?php

/*

@package monoquetheme
    =======================
    ADMIN ENQUEUE FUNCTIONS
    =======================

*/

function monoque_load_admin_scripts( $hook )
{
    if('toplevel_page_sg_monoque' != $hook) return;

    wp_register_style( 'monoque_admin', get_template_directory_uri().'/assets/css/monoque.admin.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'monoque_admin' );

    wp_enqueue_media();

    wp_register_script( 'monoque-admin-script', get_template_directory_uri().'/assets/js/monoque.admin.js', array($jquery), '1.0.0', true );
    wp_enqueue_style( 'monoque-admin-script' );
}

add_action( 'admin_enqueue_scripts', 'monoque_load_admin_scripts' );

?>