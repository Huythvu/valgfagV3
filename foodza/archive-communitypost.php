<?php get_header(); ?>
<main>
  <article class="community-article">
    <h1>Create new post</h1>
    <input
      type="text"
      placeholder="What's on the menu today?"
      class="menu-textbox">
    <button class="btn">Create post</button>
    </input>
    <section class="community-section">

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
          <div class="author-image">
            <?php echo get_avatar(get_the_author_meta('ID'), 50); ?>
            <h2><?php echo get_the_author(); ?></h2>
          </div>
          <!-- Post Image, usually had esc_url for security, but didnt show img show removed -->

          <div class="container-community">
            <?php if ($postImage) { ?>
              <img class="recipe-img" src="<?php echo ($postImage->getSrc()); ?>" alt="<?php echo ($postImage->getAlt()); ?>">
            <?php } ?>

          <?php
          the_content();
        } ?>
          </div>
    </section>
  </article>

<?php } else { ?>
  <p>No posts found.</p>
<?php }


?>

</main>
<?php get_footer(); ?>

<img src="" alt="">