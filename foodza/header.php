<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REMEMBER TO CHANGE THIS IN HEADER.php</title>
  <?php wp_head(); ?>
</head>

<body>
  <header>
    <div>
      <h1>
        <a href="<?php echo home_url(); ?>"><strong>Foodza</strong></a>
      </h1>
      <!-- Navigation Menu For mobile i guess-->
      <!-- <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
      <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i> -->
      <div>
        <nav>
          <ul>
            <li><a href="<?php echo get_post_type_archive_link('recipe'); ?>">All Recipes</a></li>
            <li><a href="<?php echo get_post_type_archive_link('communitypost'); ?>">Community</a></li>
            <li><a href="<?php echo get_post_type_archive_link('kitchenware'); ?>">Kitchenware</a></li>
            <li><a href="<?php echo site_url("/about"); ?>">About us</a></li>
          </ul>
        </nav>

        <div>
          <?php if (is_user_logged_in()) { ?>
            <a href="<?php echo wp_logout_url(); ?>">
              <span><?php echo get_avatar(wp_get_current_user()->ID); ?></span>
              <span>Log Out</span>
              <span><?php echo wp_get_current_user()->display_name; ?></span>
            </a>
          <?php } else { ?>
            <a href="<?php echo wp_login_url(); ?>">Login</a>
            <a href="<?php echo wp_registration_url(); ?>">Sign Up</a>
          <?php } ?>
          <a id="search-toggle" href="#" aria-label="Open search">
            <i class="fa fa-search" aria-hidden="true"></i>
          </a>
          <div id="search-wrap" hidden>
            <input id="sogefelt" type="search" placeholder="Search recipes…" aria-label="Search recipes">
            <div id="out" role="status" aria-live="polite"></div>
          </div>
        </div>
      </div>
    </div>
    </div>
    
    <!-- Trigger-ikonet (skal have en entydig selector)
    <a id="search-toggle" href="#" aria-label="Open search">
      <i class="fa fa-search" aria-hidden="true"></i>
    </a> -->



  </header>