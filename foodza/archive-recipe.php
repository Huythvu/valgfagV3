<?php
while (have_posts()) {
    the_post();
?>
    <div class="recipe-container">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

    </div>
<?php





}
?>