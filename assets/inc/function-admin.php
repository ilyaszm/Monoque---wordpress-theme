<?php

/*

@package monoquetheme
    =======================
    ADMIN PAGE
    =======================

*/

function monoque_add_admin_page()
{
    // Generate Monoque Admin Page
    add_menu_page(
        'Monoque Theme Options',
        'Monoque',
        'manage_options',
        'sg_monoque',
        'monoque_theme_create_page',
        'dashicons-admin-customizer',
        110
    );
    
    // Generate Monoque Admin Sub-Pages
    add_submenu_page(
        'sg_monoque',
        'Monoque Sidebar Options',
        'Sidebar',
        'manage_options',
        'sg_monoque',
        'monoque_theme_create_page'
    );

    add_submenu_page(
        'sg_monoque',
        'Monoque Theme Options',
        'Theme Options',
        'manage_options',
        'sg_monoque_theme',
        'monoque_theme_support_page'
    );

    add_submenu_page(
        'sg_monoque',
        'Monoque CSS Options',
        'Custom CSS',
        'manage_options',
        'sg_monoque_css',
        'monoque_theme_settings_page'
    );
}

add_action( 'admin_menu', 'monoque_add_admin_page' );

// Activate custom settings
add_action( 'admin_init', 'monoque_custom_settings' );

// General page
function monoque_theme_create_page()
{
    require_once get_template_directory().'/assets/inc/templates/monoque-admin.php';
}

// Custom CSS page
function monoque_theme_settings_page()
{
    echo '<h1>Monoque Custom CSS</h1>';
}

// Template submenu functions
function monoque_theme_support_page()
{
    require_once get_template_directory().'/assets/inc/templates/monoque-theme-support.php';
}

function monoque_custom_settings()
{
    // Sidebar options
    //register_setting( 'monoque-settings-group', 'profile_picture' );
    register_setting( 'monoque-settings-group', 'first_name' );
    register_setting( 'monoque-settings-group', 'last_name' );
    register_setting( 'monoque-settings-group', 'user_description' );
    register_setting( 'monoque-settings-group', 'facebook_handler' );
    register_setting( 'monoque-settings-group', 'twitter_handler', 'monoque_sanitize_twitter_handler' );
    register_setting( 'monoque-settings-group', 'youtube_handler' );
    register_setting( 'monoque-settings-group', 'gplus_handler' );
    register_setting( 'monoque-settings-group', 'linkedin_handler' );
    register_setting( 'monoque-settings-group', 'pinterest_handler' );
    register_setting( 'monoque-settings-group', 'instagram_handler' );
    register_setting( 'monoque-settings-group', 'tumblr_handler' );
    register_setting( 'monoque-settings-group', 'flickr_handler' );
    register_setting( 'monoque-settings-group', 'snapchat_handler' );
    register_setting( 'monoque-settings-group', 'whatsapp_handler' );

    add_settings_section( 'monoque-sidebar-options', 'Sidebar Options', 'monoque_sidebar_options', 'sg_monoque' );

    //add_settings_field( 'sidebar-profile-picture', 'Profile Picture', 'monoque_sidebar_profile', 'sg_monoque', 'monoque-sidebar-options' );
    add_settings_field( 'sidebar-name', 'Full Name', 'monoque_sidebar_name', 'sg_monoque', 'monoque-sidebar-options' );
    add_settings_field( 'sidebar-description', 'Description', 'monoque_sidebar_description', 'sg_monoque', 'monoque-sidebar-options' );
    add_settings_field( 'sidebar-facebook', 'Facebook Handler', 'monoque_sidebar_facebook', 'sg_monoque', 'monoque-sidebar-options' );
    add_settings_field( 'sidebar-twitter', 'Twitter Handler', 'monoque_sidebar_twitter', 'sg_monoque', 'monoque-sidebar-options' );
    add_settings_field( 'sidebar-youtube', 'Youtube Handler', 'monoque_sidebar_youtube', 'sg_monoque', 'monoque-sidebar-options' );
    add_settings_field( 'sidebar-gplus', 'Google+ Handler', 'monoque_sidebar_gplus', 'sg_monoque', 'monoque-sidebar-options' );
    add_settings_field( 'sidebar-linkedin', 'LinkedIn Handler', 'monoque_sidebar_linkedin', 'sg_monoque', 'monoque-sidebar-options' );
    add_settings_field( 'sidebar-pinterest', 'Pinterest Handler', 'monoque_sidebar_pinterest', 'sg_monoque', 'monoque-sidebar-options' );
    add_settings_field( 'sidebar-instagram', 'Instagram Handler', 'monoque_sidebar_instagram', 'sg_monoque', 'monoque-sidebar-options' );
    add_settings_field( 'sidebar-tumblr', 'Tumblr Handler', 'monoque_sidebar_tumblr', 'sg_monoque', 'monoque-sidebar-options' );
    add_settings_field( 'sidebar-flickr', 'Flickr Handler', 'monoque_sidebar_flickr', 'sg_monoque', 'monoque-sidebar-options' );
    add_settings_field( 'sidebar-snapchat', 'Snapchat Handler', 'monoque_sidebar_snapchat', 'sg_monoque', 'monoque-sidebar-options' );
    add_settings_field( 'sidebar-whatsapp', 'WhatsApp Handler', 'monoque_sidebar_whatsapp', 'sg_monoque', 'monoque-sidebar-options' );

    // Theme support options
    register_setting( 'monoque-theme-support', 'post_formats', 'monoque_post_formats_callback' );
    add_settings_section( 'monoque-theme-options', 'Theme Options', 'monoque_theme_options', 'sg_monoque_theme' );
    add_settings_field( 'post-formats', 'Post Formats', 'monoque_post_formats', 'sg_monoque_theme', 'monoque-theme-options' );
}

// General page functions
// Sidebar page functions
/*function monoque_sidebar_profile()
{
    $picture = esc_attr(get_option( 'profile_picture' ));
    echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button" />
        <input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" />';
}*/

function monoque_sidebar_name()
{
    $firstname = esc_attr(get_option( 'first_name' ));
    $lastname = esc_attr(get_option( 'last_name' ));
    echo '<input type="text" name="first_name" value="'.$firstname.'" placeholder="Enter First Name" />
        <input type="text" name="last_name" value="'.$lastname.'" placeholder="Enter Last Name" />';
}

function monoque_sidebar_description()
{
    $description = esc_attr(get_option( 'user_description' ));
    echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Enter a description" />
        <p class="description">Write a description about yourself.</p>';
}

function monoque_sidebar_facebook()
{
    $facebook = esc_attr(get_option( 'facebook_handler' ));
    echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler" />';
}

function monoque_sidebar_twitter()
{
    $twitter = esc_attr(get_option( 'twitter_handler' ));
    echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" />
        <p class="description">Input your Twitter username without the @ character.</p>';
}

function monoque_sanitize_twitter_handler( $input )
{
    $output = sanitize_text_field( $input );
    $output = str_replace('@', '', $output);
    return $output;
}

function monoque_sidebar_youtube()
{
    $youtube = esc_attr(get_option( 'youtube_handler' ));
    echo '<input type="text" name="youtube_handler" value="'.$youtube.'" placeholder="Youtube handler" />';
}

function monoque_sidebar_gplus()
{
    $twitter = esc_attr(get_option( 'gplus_handler' ));
    echo '<input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="Google+ handler" />';
}

function monoque_sidebar_linkedin()
{
    $linkedin = esc_attr(get_option( 'linkedin_handler' ));
    echo '<input type="text" name="linkedin_handler" value="'.$linkedin.'" placeholder="LinkedIn handler" />';
}

function monoque_sidebar_pinterest()
{
    $pinterest = esc_attr(get_option( 'pinterest_handler' ));
    echo '<input type="text" name="pinterest_handler" value="'.$pinterest.'" placeholder="Pinterest handler" />';
}

function monoque_sidebar_instagram()
{
    $instagram = esc_attr(get_option( 'instagram_handler' ));
    echo '<input type="text" name="instagram_handler" value="'.$instagram.'" placeholder="Instagram handler" />';
}

function monoque_sidebar_tumblr()
{
    $tumblr = esc_attr(get_option( 'tumblr_handler' ));
    echo '<input type="text" name="tumblr_handler" value="'.$tumblr.'" placeholder="Tumblr handler" />';
}

function monoque_sidebar_flickr()
{
    $flickr = esc_attr(get_option( 'flickr_handler' ));
    echo '<input type="text" name="flickr_handler" value="'.$flickr.'" placeholder="Flickr handler" />';
}

function monoque_sidebar_snapchat()
{
    $snapchat = esc_attr(get_option( 'snapchat_handler' ));
    echo '<input type="text" name="snapchat_handler" value="'.$snapchat.'" placeholder="Snapchat handler" />';
}

function monoque_sidebar_whatsapp()
{
    $whatsapp = esc_attr(get_option( 'whatsapp_handler' ));
    echo '<input type="text" name="whatsapp_handler" value="'.$whatsapp.'" placeholder="WhatsApp handler" />';
}

// Theme support page functions

// post formats functions
function monoque_post_formats_callback( $input )
{
    return $input;
}

function monoque_theme_options()
{
    echo 'Activate and Deactivate Specific Theme Support Options';
}

function monoque_post_formats()
{
    $options = get_option('post_formats');
    $formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
    $output = '';

    foreach ($formats as $format) {
        $checked = ($options[$format] == 1 ? 'checked' : '');
        $output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.' </label><br> ';
    }
    echo $output;
}

// Custom CSS page functions

function monoque_sidebar_options()
{
    echo 'Customize Your Sidebar Information';
}

?>