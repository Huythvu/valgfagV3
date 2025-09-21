<?php get_header();

while (have_posts()) {
  the_post();
  the_title();
  the_content();
  ?>
  <!-- User Display Name -->
<span><?php echo wp_get_current_user()->display_name; ?></span>
<?php 
}
// Display current user role
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
<?php endif; 

get_footer();
?>