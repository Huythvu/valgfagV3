<?php get_header(); ?>
<main>
  <?php if (have_posts()) { ?>
    <?php while (have_posts()) { 
        the_post(); 
        ?>

    <?php
    $kitchenwareImage = get_acpt_field([
        'post_id'    => get_the_ID(),
        'box_name'   => 'kitchenware',
        'field_name' => 'kitchenware-image',
    ]);
    ?>
<article>
<!-- Recipe Image, usually had esc_url for security, but didnt show img show removed -->
<?php if ( $kitchenwareImage ) { ?>
  <img src="<?php echo ($kitchenwareImage->getSrc()); ?>" 
       alt="<?php echo ($kitchenwareImage->getAlt()); ?>">
<?php } ?>

        <h2>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
      </article>
    <?php } ?>
  <?php } else { ?>
    <p>No posts found.</p>
  <?php } ?>
</main>
<?php get_footer(); ?>
