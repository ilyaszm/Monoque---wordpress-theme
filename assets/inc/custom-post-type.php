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

    add_action( 'add_meta_boxes', 'monoque_contact_add_meta_box' );
    add_action( 'save_post', 'monoque_save_contact_email_data' );

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
            $email = get_post_meta( $post_id, '_contact_email_value_key', true );
            echo '<a href="mailto:'.$email.'">'.$email.'</a>';
            break;
        
    }
}

// Contact Meta Boxes
function monoque_contact_add_meta_box()
{
    add_meta_box( 'contact_email', 'User Email', 'monoque_contact_email_callback', 'monoque-contact', 'side' );
}

function monoque_contact_email_callback($post)
{
    wp_nonce_field( 'monoque_save_contact_email_data', 'monoque_contact_email_meta_box_nonce' );
    $value = get_post_meta( $post->ID, '_contact_email_value_key', true );

    echo '<label for="monoque_contact_email_field">User Email Address: </label>';
    echo '<input type="email" id="monoque_contact_email_field" name="monoque_contact_email_field" value="'.esc_attr( $value ).'" size="25" />';

}

function monoque_save_contact_email_data($post_id)
{
    if(!isset($_POST['monoque_contact_email_meta_box_nonce'])) return;

    if(!wp_verify_nonce( $_POST['monoque_contact_email_meta_box_nonce'], 'monoque_save_contact_email_data' )) return;
    
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if(!current_user_can( 'edit_post', $post_id )) return;

    if(!isset($_POST['monoque_contact_email_field'])) return;

    $my_data = sanitize_text_field( $_POST['monoque_contact_email_field'] );

    update_post_meta( $post_id, '_contact_email_value_key', $my_data );
}

?>