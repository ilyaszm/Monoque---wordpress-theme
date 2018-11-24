<?php

/*

@package monoquetheme
    =======================
    THEME CUSTOM POST TYPES
    =======================

*/

$contact = get_option( 'activate_contact' );
if( $contact == 1 ) {

    add_action( 'init', 'monoque_contact_custom_post_type' );
    add_filter( 'manage_monoque-contact_posts_columns', 'monoque_set_contact_columns' );
    add_action( 'manage_monoque-contact_posts_custom_column', 'monoque_contact_custom_column', 10, 2 );

}

// Contact custom post type
function monoque_contact_custom_post_type()
{
    $labels = array(
        'name'              => 'Messages',
        'singular_name'     => 'Message',
        'menu_name'         => 'Messages',
        'name_admin_bar'    => 'Message'
    );

    $args = array(
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'capability_type'   => 'post',
        'hierarchical'      => false,
        'menu_position'     => 26,
        'menu_icon'         => 'dashicons-email-alt',
        'supports'          => array( 'title', 'editor', 'author' )
    );

    register_post_type( 'monoque-contact', $args );
}

function monoque_set_contact_columns($columns)
{
    $newCol = array();
    $newCol['title'] = 'Full Name';
    $newCol['message'] = 'Message';
    $newCol['email'] = 'Email';
    $newCol['date'] = 'Date';
    return $newCol;
}

function monoque_contact_custom_column($column, $post_id)
{
    switch($column)
    {
        case 'message':
            echo get_the_excerpt();
            break;
        case 'email':
            //
            break;
        
    }
}

?>