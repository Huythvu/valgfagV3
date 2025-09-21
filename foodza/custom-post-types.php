<?php
// OUR CUSTOM POST TYPES
function custom_post_types()
{
    register_post_type("Recipe", array(
        'capability_type' => 'recipe',
        'map_meta_cap' => true,
        'show_in_rest' => true, // Det gør at wordpress bliver moderne
        'supports' => array('title', 'editor', 'excerpt', 'custom-fields', 'author'), // excerpt hvis vi skal have en kort tekst.
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
        'supports' => array('title', 'editor', 'excerpt', 'custom-fields', 'author'), // excerpt hvis vi skal have en kort tekst.
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
        'supports' => array('title', 'editor', 'excerpt', 'custom-fields', 'author'), // excerpt hvis vi skal have en kort tekst.
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
        'supports' => array('title', 'editor', 'excerpt', 'custom-fields', 'author'), // excerpt hvis vi skal have en kort tekst.
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