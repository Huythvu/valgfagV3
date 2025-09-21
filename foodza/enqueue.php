<?php
//! FIX THESE "ERRORS" LATER, JUST PUT THEM HERE AS A PLACEHOLDER TO REMEMBER WE NEED TO MAKE THEM BUT FILES AND PATH ARE NOT 100P CORRECT
function foodza_files(){
    // js files
    // wp_enqueue_script('foodza_test_js', get_theme_file_uri('/assets/js/test.js'), NULL, '1.0', true);
    wp_enqueue_script('foodza_author_js', get_theme_file_uri('/assets/js/author.js'), NULL, '1.0', true);
    wp_enqueue_script('foodza_search_js', get_theme_file_uri('/assets/js/search.js'), NULL, '1.0', true);
    wp_enqueue_script('foodza_filter_js', get_theme_file_uri('/assets/js/filter.js'), NULL, '1.0', true);
    
    // google fonts and font awesome
    wp_enqueue_style('google-font-roboto', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i');
    wp_enqueue_style('google-font-quicksand', '//fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('material-symbols-outlined', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined');
    
    // css styles
    wp_enqueue_style('foodza_main_styles', get_theme_file_uri('/assets/css/style-index.css'));
    wp_enqueue_style('foodza_extra_styles', get_theme_file_uri('/assets/css/index.css'));
    wp_enqueue_style('foodza_spinner_styles', get_theme_file_uri('/assets/css/spinner.css'));
    wp_enqueue_style('foodza_global_styles', get_theme_file_uri('/assets/css/global.css'));
    // Layout specific css styles
    wp_enqueue_style('foodza_header_styles', get_theme_file_uri('/assets/css/layout/header.css'));
    wp_enqueue_style('foodza_footer_styles', get_theme_file_uri('/assets/css/layout/footer.css'));
    // Page specific css styles
    wp_enqueue_style('foodza_recipe_styles', get_theme_file_uri('/assets/css/pages/single-recipe.css'));
    wp_enqueue_style('foodza_archive_styles', get_theme_file_uri('/assets/css/pages/archive.css'));
    wp_enqueue_style('foodza_userprofile_styles', get_theme_file_uri('/assets/css/pages/single-userprofile.css'));
    wp_enqueue_style('foodza_frontpage_styles', get_theme_file_uri('/assets/css/pages/front-page.css'));
    // Component specific css styles
    wp_enqueue_style('foodza_components_styles', get_theme_file_uri('/assets/css/components.css'));
    // Variables css styles
    wp_enqueue_style('foodza_variables_styles', get_theme_file_uri('/assets/css/variables.css'));
}