<?php get_header(); ?>

 
 <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article>
                <h2>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <div><?php the_excerpt(); ?></div>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p>No posts found.</p>
    <?php endif; ?>



<!-- User Role Information -->
<?php
if (is_user_logged_in()) {
  $user = wp_get_current_user();
  echo '<p>Current role: ' . esc_html( implode(', ', $user->roles) ) . '</p>';
} else {
  echo '<p>You are not logged in.</p>';
}
?>

<!-- User Role Change Form -->
<?php
// Handle form submit
if (isset($_POST['user_role']) && is_user_logged_in() && !current_user_can('administrator')) {
  $allowed = ['home_cook', 'amateur_cook', 'professional_cook', 'company'];
  $picked  = sanitize_key($_POST['user_role']);
  if (in_array($picked, $allowed, true)) {
    $user = wp_get_current_user();
    $user->set_role($picked);
    echo '<p>Role changed to: ' . esc_html($picked) . '</p>';
  }
}
?>
<!-- User Role Change Form -->
<?php if (is_user_logged_in()) : ?>
  <form method="post">
    <select name="user_role">
      <option value="home_cook">Home Cook</option>
      <option value="amateur_cook">Amateur Cook</option>
      <option value="professional_cook">Professional Cook</option>
      <option value="company">Company</option>
    </select>
    <button type="submit">Change role</button>
  </form>
<?php endif; ?>


<?php get_footer(); ?>