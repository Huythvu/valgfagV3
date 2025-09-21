<?php get_header(); ?>
<main>
    <div class="cardGrid">
        <?php 
            while (have_posts()){
            the_post(); 
            ?>
        <?php
    $kitchenwareImage = get_acpt_field([
    'post_id'    => get_the_ID(),
    'box_name'   => 'kitchenware',
    'field_name' => 'kitchenware-image',
    ]);
    ?>
        <a href="<?php the_permalink(); ?>">
            <article class="card">
                <?php if ( $kitchenwareImage ) { ?>
                <img src="<?php echo $kitchenwareImage->getSrc(); ?>" alt="<?php echo $kitchenwareImage->getAlt(); ?>">
                <?php } ?>

                <div class="cardContent">
                    <div class="cardContentLayout">
                        <p>
                            <i class="material-symbols-outlined" aria-hidden="true">apartment</i>
                            <?php echo '<span>' . get_the_terms( get_the_ID(), 'brand' )[0]->name . '</span>'; ?>
                        </p>
                        <div class="cardContentLayout">
                            <h2><?php the_title(); ?></h2>
                        </div>
                    </div>
                </div>
            </article>
        </a>
        <?php } ?>
    </div>
</main>
<?php get_footer(); ?>