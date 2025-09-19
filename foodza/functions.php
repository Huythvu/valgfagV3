<?php

function custom_post_types()
{
    register_post_type("Recipe", array(
        // 'capability_type' => 'recipe',
        // 'map_meta_cap' => true,
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
        // 'capability_type' => 'kitchenware',
        // 'map_meta_cap' => true,
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
        // 'capability_type' => 'communitypost',
        // 'map_meta_cap' => true,
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
        // 'capability_type' => 'userprofile',
        // 'map_meta_cap' => true,
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

    register_post_type("test2", array(
        // 'capability_type' => 'userprofile',
        // 'map_meta_cap' => true,
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
        'menu_icon' => 'dashicons-admin-site'
    ));
}

add_action('init', 'custom_post_types');


    function singleRecipeImage($args = NULL) {
        
        if (!isset($args['title'])) {
            $args['title'] = get_the_title();
        }
        
        if (!isset($args['subtitle'])) {
            $args['subtitle'] = get_field('page_banner_subtitle');
        }
        
        if (!isset($args['photo'])) {
            if (get_field('page_banner_background_image') AND !is_archive() AND !is_home() ) {
                $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
            } else {
                $args['photo'] = get_theme_file_uri('/images/errorCat.png');
            }
        }
        ?>

    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
            <div class="page-banner__intro">
                <p><?php echo $args['subtitle']; ?></p>
            </div>
        </div>
    </div>
    <?php }


?>