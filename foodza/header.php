<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
    <div>
      <h1>
        <a href="<?php echo home_url(); ?>"><strong>Foodza</strong></a>
      </h1>
      <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
      <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
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
          <a href="#">Login</a>
          <a href="#">Sign Up</a>
          <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
  </header>

  <main>
  

  </main>
</body>
</html>
