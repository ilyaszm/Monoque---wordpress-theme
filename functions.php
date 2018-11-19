<?php

require get_template_directory() . '/assets/inc/function-admin.php';
require get_template_directory() . '/assets/inc/enqueue.php';

/*function mq_script_enqueue()
{
    wp_enqueue_style( 'btcss', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0.0');
    wp_enqueue_style( 'spcss', get_template_directory_uri() . '/css/swiper.min.css', array(), '1.0.0');
    wp_enqueue_script( 'btjs', get_template_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script( 'spjs', get_template_directory_uri() . '/js/swiper.min.js');
    wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/js/main.js');
}

add_action('wp_enqueue_scripts', 'mq_script_enqueue');

// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';


/* Theme setup 
add_action('after_setup_theme', 'wpt_setup');

if(!function_exists('wpt_setup')) :
    function wpt_setup() {
        register_nav_menu('primary', __('Primary navigation', 'monoque'));
    }
endif;*/

?>