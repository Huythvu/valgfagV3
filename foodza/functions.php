<?php


//! FIX THESE "ERRORS" LATER, JUST PUT THEM HERE AS A PLACEHOLDER TO REMEMBER WE NEED TO MAKE THEM BUT FILES AND PATH ARE NOT 100P CORRECT
function foodza_files() {
    wp_enqueue_script('foodza_main_js', get_theme_file_uri('/assets/js/test.js'), NULL, '1.0', true);
    wp_enqueue_style('custom-google-font', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('foodza_main_styles', get_theme_file_uri('/assets/css/style-index.css'));
    wp_enqueue_style('foodza_extra_styles', get_theme_file_uri('/assets/css/index.css'));
}
// Runs foodza_files function on wp_enqueue_scripts action hook
add_action('wp_enqueue_scripts', 'foodza_files');


// OUR CUSTOM POST TYPES
function custom_post_types() {
    register_post_type("Recipe", array(
        'capability_type' => 'recipe',
        'map_meta_cap' => true,
        'show_in_rest' => true, // Det gør at wordpress bliver moderne
        'supports' => array('title', 'editor', 'excerpt', 'custom-fields'), // excerpt hvis vi skal have en kort tekst.
        'rewrite' => array('slug' => 'recipes'), // Vi ændrer urlen
        'has_archive' => true, // 
        'public' => true,
        'labels' => array(
            'name' => 'Recipes',
            'add_new_item' => 'Add New recipe',
            'edit_item' => 'Edit recipe',
            'all_items' => 'All recipe',
            'singular_name' => 'recipe'
        ),
        'menu_icon' => 'dashicons-book'
    ));

    register_post_type("Kitchenware", array(
        'capability_type' => 'kitchenware',
        'map_meta_cap' => true,
        'show_in_rest' => true, // Det gør at wordpress bliver moderne
        'supports' => array('title', 'editor', 'excerpt'), // excerpt hvis vi skal have en kort tekst.
        'rewrite' => array('slug' => 'kitchenware'), // Vi ændrer urlen
        'has_archive' => true, // 
        'public' => true,
        'labels' => array(
            'name' => 'Kitchenware',
            'add_new_item' => 'Add New kitchenware',
            'edit_item' => 'Edit kitchenware',
            'all_items' => 'All kitchenware',
            'singular_name' => 'kitchenware'
        ),
        'menu_icon' => 'dashicons-food'
    ));

    register_post_type("Communitypost", array(
        'capability_type' => 'communitypost',
        'map_meta_cap' => true,
        'show_in_rest' => true, // Det gør at wordpress bliver moderne
        'supports' => array('title', 'editor', 'excerpt'), // excerpt hvis vi skal have en kort tekst.
        'rewrite' => array('slug' => 'communityposts'), // Vi ændrer urlen
        'has_archive' => true, // 
        'public' => true,
        'labels' => array(
            'name' => 'Communityposts',
            'add_new_item' => 'Add New communitypost',
            'edit_item' => 'Edit communitypost',
            'all_items' => 'All communitypost',
            'singular_name' => 'communitypost'
        ),
        'menu_icon' => 'dashicons-admin-site-alt3'
    ));

    register_post_type("Userprofile", array(
        'capability_type' => 'userprofile',
        'map_meta_cap' => true,
        'show_in_rest' => true, // Det gør at wordpress bliver moderne
        'supports' => array('title', 'editor', 'excerpt'), // excerpt hvis vi skal have en kort tekst.
        'rewrite' => array('slug' => 'userprofile'), // Vi ændrer urlen
        'has_archive' => true, // 
        'public' => true,
        'labels' => array(
            'name' => 'Userprofiles',
            'add_new_item' => 'Add New userprofile',
            'edit_item' => 'Edit userprofile',
            'all_items' => 'All userprofile',
            'singular_name' => 'userprofile'
        ),
        'menu_icon' => 'dashicons-admin-users'
    ));
}
// Runs custom_post_types function on init action hook
add_action('init', 'custom_post_types');


// Redirect users after login out of the admin area and to the homepage
add_action('admin_init', 'redirectUsersToFrontend');
function redirectUsersToFrontend() {
    $ourCurrentUser = wp_get_current_user();
    if(count($ourCurrentUser->roles) == 1 AND 
    $ourCurrentUser->roles[0] == 'home_cook' OR 
    $ourCurrentUser->roles[0] == 'amateur_cook' OR 
    $ourCurrentUser->roles[0] == 'professional_cook' OR 
    $ourCurrentUser->roles[0] == 'company')
        {
        wp_redirect(home_url()); 
        exit;
    }
}


// Remove admin bar for users with subscriber, but even admin doesnt show idno how to make it show for some reason.
add_action('wp_loaded', 'noUserAdminBar');
function noUserAdminBar() {
    $ourCurrentUser = wp_get_current_user();
    if(count($ourCurrentUser->roles) == 1 AND 
    $ourCurrentUser->roles[0] == 'home_cook' OR 
    $ourCurrentUser->roles[0] == 'amateur_cook' OR 
    $ourCurrentUser->roles[0] == 'professional_cook' OR 
    $ourCurrentUser->roles[0] == 'company')
        {
        show_admin_bar(false);
}
}


// Login Screen Logo redirect to homepage
add_filter('login_headerurl', 'ourHeaderUrl');
function ourHeaderUrl() {
    return home_url();
}

// Style the login screen
//! IS NOT FIXED YET, BUT AT LEAST IT SHOWS HOW THE CSS IS ENQUEUED
add_action('login_enqueue_scripts', 'ourLoginCSS');
function ourLoginCSS() {
    wp_enqueue_style('custom-google-font', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('foodza_main_styles', get_theme_file_uri('/assets/css/style-index.css'));
    wp_enqueue_style('foodza_extra_styles', get_theme_file_uri('/assets/css/index.css'));
}

add_filter('login_headertitle', 'ourLoginTitle');
function ourLoginTitle() {
    return get_bloginfo('name');
}
