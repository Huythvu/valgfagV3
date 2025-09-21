<?php get_header(); ?>
<main> 
  <?php
while ( have_posts() ) {
  the_post();
  the_title();
}
?>
<?php
$userGender = get_acpt_field([
  'post_id'    => get_the_ID(),
  'box_name'   => 'user-tags',
  'field_name' => 'gender'
]);
$userBirthday = get_acpt_field([
  'post_id'    => get_the_ID(),
  'box_name'   => 'user-tags',
  'field_name' => 'birthday'
]);
$userLocation = get_acpt_field([
  'post_id'    => get_the_ID(),
  'box_name'   => 'user-tags',
  'field_name' => 'location'
]);
?>

<?php
if($userLocation){
$userLocationString = $userLocation['country'] . ', ' . $userLocation['city'];
} 
?>

<?php
if($userBirthday){
  $userBirthdayString = $userBirthday['object']->format('Y-m-d');
} 
?>

<ol>
  <li class="user-display-name"><?php echo get_the_ID(); ?></li>
  <li class="user-gender"><?php echo $userGender; ?></li>
  <li class="user-birthday"><?php echo $userBirthday; ?></li>
  <li class="user-location"><?php echo $userLocationString; ?></li>
  <li class="user-account-creation"><?php echo get_the_date( 'Y-m-d', get_the_ID() ); ?></li>
</ol>

<?php 
echo '<pre>';
print_r(get_the_ID(127));
print_r($userGender);
print_r($userBirthday);
print_r($userLocation);
echo '</pre>';
?>

</main>
<?php get_footer(); ?>