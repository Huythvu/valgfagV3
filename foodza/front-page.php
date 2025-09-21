<?php get_header(); ?>

<main>
  <?php
  while (have_posts()) {
    the_post();
    the_title();
    the_content();
  }
  ?>
  <div class="front front-hero">
    <h1>Velkommen til FoodZa</h1>
    <img src="<?php echo (get_theme_file_uri('/assets/images/hero.png')); ?>" alt="hero-image">
    <p>Scroll, gem og del - Foodza samler madelskere, der brænder for gode opskrifter</p>
  </div>

  <div class="front front-recipe">
    <h2>Recent recipes</h2>
    <a href="<?php echo (get_post_type_archive_link('recipe')); ?>">
      <img src="<?php echo (get_theme_file_uri('/assets/images/recipe_food.png')); ?>" alt="Recipes">
    </a>
    <p>Opdag den nyeste opskrift - klar til at blive prøvet i dit køkken.</p>
  </div>

  <div class="front front-kitchen">
    <h2>Kitchen utensils</h2>
    <a href="<?php echo (get_post_type_archive_link('kitchenware')); ?>">
      <img src="<?php echo (get_theme_file_uri('/assets/images/kitchen_utensils.png')); ?>" alt="Kitchenware">
    </a>
    <p>Gør madlavningen nemmere med det rette køkkenudstyr.</p>
  </div>

  <div class="front front-community">
    <h2>See our latest community feed</h2>
    <a href="<?php echo (get_post_type_archive_link('communitypost')); ?>">
      <img src="<?php echo (get_theme_file_uri('/assets/images/community_happy.png')); ?>" alt="Community">
    </a>
    <p>Del dine opskrifter, få feedback og find nye køkkenvenner i vores community.</p>
  </div>
</main>

<?php get_footer(); ?>