<?php
// Enqueue styles and scripts
require get_template_directory() . '/enqueue.php';
// Runs foodza_files function on wp_enqueue_scripts action hook
add_action('wp_enqueue_scripts', 'foodza_files');


// Custom Post Types
require get_template_directory() . '/custom-post-types.php';
// Runs custom_post_types function on init action hook
add_action('init', 'custom_post_types');


// Redirect users after login out of the admin area and to the homepage
add_action('admin_init', 'redirectUsersToFrontend');
function redirectUsersToFrontend()
{
    $ourCurrentUser = wp_get_current_user();
    if (
        count($ourCurrentUser->roles) == 1 and
        $ourCurrentUser->roles[0] == 'home_cook' or
        $ourCurrentUser->roles[0] == 'amateur_cook' or
        $ourCurrentUser->roles[0] == 'professional_cook' or
        $ourCurrentUser->roles[0] == 'company'
    ) {
        wp_redirect(home_url());
        exit;
    }
}


// Remove admin bar for users with subscriber, but even admin doesnt show idno how to make it show for some reason.
add_action('wp_loaded', 'noUserAdminBar');
function noUserAdminBar()
{
    $ourCurrentUser = wp_get_current_user();
    if (
        count($ourCurrentUser->roles) == 1 and
        isset($ourCurrentUser->roles[0]) and
        (
            $ourCurrentUser->roles[0] == 'home_cook' or
            $ourCurrentUser->roles[0] == 'amateur_cook' or
            $ourCurrentUser->roles[0] == 'professional_cook' or
            $ourCurrentUser->roles[0] == 'company'
        )
    ) {
        show_admin_bar(false);
    }
}


// Login Screen Logo redirect to homepage
add_filter('login_headerurl', 'ourHeaderUrl');
function ourHeaderUrl()
{
    return home_url();
}

// Style the login screen
add_action('login_enqueue_scripts', 'ourLoginCSS');
function ourLoginCSS()
{
    wp_enqueue_style('google-font-roboto', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('foodza_main_styles', get_theme_file_uri('/assets/css/style-index.css'));
    wp_enqueue_style('foodza_extra_styles', get_theme_file_uri('/assets/css/index.css'));
}

// Login Screen Logo title
add_filter('login_headertitle', 'ourLoginTitle');
function ourLoginTitle()
{
    return get_bloginfo('name');
}
