<?php get_header(); ?>
<main>
    <article class="community-article">
      <section class="community-section">
        <h1>Create new post</h1>
        <input type="text" placeholder="What's on the menu today?" class="menu-textbox">
        <button class="button communityBtn">Create post</button>
        </input>
            <?php while (have_posts()) {
              the_post();
              // the_title();
              ?>

            <div class="community-content">
                <div class="community-author">
                    <a href="<?php echo site_url('/userprofile/' . get_the_author()); ?>"><?php echo get_avatar(get_the_author_meta('ID'), 50); ?>
                    <div class="community-author-date">
                      <h2><?php echo get_the_author(); ?></h2>
                    </a>
                      <p><?php echo get_the_date(); ?></p>
                    </div>
                </div>
                <!-- Post Image, usually had esc_url for security, but didnt show img show removed -->
                <div class="container-community">
                    <?php
                    $postImage = get_acpt_field([
                    'post_id'    => get_the_ID(),
                    'box_name'   => 'post-section',
                    'field_name' => 'post-image',
                    ]);
                    ?>
                    <?php if ($postImage) { 
                the_content();
                ?>
                    <img class="recipe-img" src="<?php echo ($postImage->getSrc()); ?>"
                        alt="<?php echo ($postImage->getAlt()); ?>">
                    <?php } ?>
                </div>
            </div>
            <?php
            } 
            ?>
        </section>
    </article>
</main>
<?php get_footer(); ?>