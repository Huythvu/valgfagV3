<?php get_header(); ?>
<main>
    <?php
while ( have_posts() ) {
  the_post();
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
$userEducation = get_acpt_field([
  'post_id'    => get_the_ID(),
  'box_name'   => 'user-expertise',
  'field_name' => 'user-education'
]);
$userExperience = get_acpt_field([
  'post_id'    => get_the_ID(),
  'box_name'   => 'user-expertise',
  'field_name' => 'user-experience'
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
    <div class="userProfilePage">
        <div class="userProfileContainer">
            <div class="userTopContainer">
                <div class="userTags">
                    <span class="userProfileImg"><?php echo get_avatar(get_the_author_meta('ID'), 200); ?></span>
                    <ul>
                        <li class="user-display-name">Name: <?php echo get_the_author() ?></li>
                        <li class="user-gender">Gender: <?php echo $userGender; ?></li>
                        <li class="user-birthday">Birthday: <?php echo $userBirthdayString; ?></li>
                        <li class="user-location">Location: <?php echo $userLocationString; ?></li>
                        <li class="user-account-creation">Account Created:
                            <?php echo get_the_date('d-m-Y', get_the_ID()); ?>
                        </li>
                    </ul>
                </div>
                <div class="userDescription">
                    <div class="userDescriptionTopContent">
                        <h2>About me</h2>
                        <h2>Followers:</h2>
                    </div>
                    <hr>
                    <div class="userDescriptionBottomContent">
                        <p><?php echo get_the_content(); ?></p>
                    </div>
                </div>
            </div>
            <div class="userExpertise">
                <?php if($userEducation){ ?>
                <h2>My Education</h2>
                <p><?php echo $userEducation ?></p>
                <hr>
                <?php } ?>
                <?php if($userExperience){ ?>
                <h2>My Experience</h2>
                <p><?php echo $userExperience ?></p>
                <?php } ?>
            </div>
            <div class="userRecipes">
              
            </div>
        </div>
    </div>

</main>
<?php get_footer(); ?>