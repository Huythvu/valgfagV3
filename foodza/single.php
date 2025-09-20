<?php
get_header();
while (have_posts()) {
    the_post(); 
    ?>
    <div>
        <div>
            <p>
                <h1>THIS CODE IS WRITTEN IN SINGLE.PHP!</h1> <span>Posted by <?php the_author_posts_link(); ?> on <?php the_time('d/m-y'); ?> in <?php echo get_the_category_list(', ') ?></span>
            </p>
        </div>
        <div><?php the_content(); ?></div>
    </div>

<?php }
get_footer();
?>