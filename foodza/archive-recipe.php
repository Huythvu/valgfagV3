<?php get_header(); ?>
<main>
    <div class="allRecipePage">
        <div class="allRecipeContent">
            <div class="cardGrid">
                <?php while (have_posts()) { 
                the_post(); 
                ?>
                <?php
    $recipeImage = get_acpt_field([
        'post_id'    => get_the_ID(),
        'box_name'   => 'single-recipe-image',
        'field_name' => 'recipe-image',
    ]);
    ?>
                <a href="<?php the_permalink(); ?>">
                    <article class="card">
                        <!-- Recipe Image, usually had esc_url for security, but didnt show img show removed -->
                        <?php if ( $recipeImage ) { ?>
                        <img src="<?php echo ($recipeImage->getSrc()); ?>"
                            alt="<?php echo ($recipeImage->getAlt()); ?>">
                        <?php } ?>
                        <div class="cardContent">
                            <div class="cardContentLayout">
                                <div class="cardContentLayout2">
                                    <p>
                                        <i class="material-symbols-outlined" aria-hidden="true">timer</i>
                                        <?php echo '<span>' . get_the_terms( get_the_ID(), 'cook-time' )[0]->name . '</span>'; ?>
                                    </p>
                                    <p>
                                        <i class="material-symbols-outlined" aria-hidden="true">chef_hat</i>
                                        <?php echo '<span>' . get_the_terms( get_the_ID(), 'cook-level' )[0]->name . '</span>'; ?>
                                    </p>
                                </div>
                                <h2>
                                    <?php the_title(); ?>
                                </h2>
                            </div>
                        </div>
                    </article>
                </a>
                <?php } 
        ?>
            </div>
            <div class="pagination"><?php echo paginate_links();?></div>
        </div>
        <div class="filterContainer">
            <?php echo do_shortcode('[fe_widget]'); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>