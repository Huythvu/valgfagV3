<?php get_header(); ?>
<main>
  <?php if (have_posts()) { ?>
    <?php while (have_posts()) { 
        the_post();
        // the_title();
    ?>

    


    <?php
    $postImage = get_acpt_field([
        'post_id'    => get_the_ID(),
        'box_name'   => 'post-section',
        'field_name' => 'post-image',
    ]);
    ?>
<article>
<!-- Post Image, usually had esc_url for security, but didnt show img show removed -->
<?php if ( $postImage ) { ?>
  <img src="<?php echo ($postImage->getSrc()); ?>" 
       alt="<?php echo ($postImage->getAlt()); ?>">
       <?php } ?>
    </article>
    <?php 
        the_content();
} ?>
    
    <?php } else { ?>
        <p>No posts found.</p>
  <?php } 
  
  
  ?>
  
</main>
<?php get_footer(); ?>

<img src="" alt="">
