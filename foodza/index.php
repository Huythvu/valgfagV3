<?php
$my_query = new WP_Query([
    'post_type'      => 'recipe',
    'posts_per_page' => 10,
]);

if ($my_query->have_posts()) {
    while ($my_query->have_posts()) {
        $my_query->the_post();
        echo '<h1><a href="' . get_permalink() . '">' . get_the_title() . '</a></h1>';
    }
    wp_reset_postdata();
} else {
    echo '<p>Ingen indlæg i custom query.</p>';
}
