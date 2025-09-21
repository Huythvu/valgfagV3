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
        <nav>
            <div>
                <h1>
                    <a href="<?php echo home_url(); ?>"><strong>Foodza</strong></a>
                </h1>
            </div>

            <div class="nav-right">
                <ul class="nav-links">
                    <li><a href="<?php echo get_post_type_archive_link('recipe'); ?>">All Recipes</a></li>
                    <li><a href="<?php echo get_post_type_archive_link('communitypost'); ?>">Community</a></li>
                    <li><a href="<?php echo get_post_type_archive_link('kitchenware'); ?>">Kitchenware</a></li>
                    <li><a href="<?php echo site_url("/about"); ?>">About us</a></li>
                </ul>

                <a id="search-toggle" href="#" aria-label="Open search">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </a>

                <div class="user-profile">
                    <?php
      $profile = get_posts([
        'post_type'   => 'userprofile',
        'author'      => get_current_user_id(),
        'numberposts' => 1,
      ]);
      if ($profile) {
        $profile_url = get_permalink($profile[0]->ID);
      }
      ?>
                    <div class="user-info">
                        <div>
                            <?php if (is_user_logged_in()) { ?>
                                <a href="<?php echo wp_logout_url(); ?>">
                                    <span>Log Out</span>
                        </a>
                        <?php } else { ?>
                        <a href="<?php echo wp_login_url(); ?>">Login</a>
                        <a href="<?php echo wp_registration_url(); ?>">Sign Up</a>
                        <?php } ?>
                    </div>
                    <div>
                        <a href="<?php echo $profile_url; ?>">
                            <?php echo get_avatar(wp_get_current_user()->ID, 50); ?>
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </nav>
        <div id="search-wrap" hidden>
            <input id="sogefelt" type="search" placeholder="Search recipes…" aria-label="Search recipes">
            <div id="out" role="status" aria-live="polite"></div>
        </div>
    </header>
    