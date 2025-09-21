<?php get_header(); ?>

<?php
while (have_posts()) {
    the_post();
}
?>

<?php
$recipeImage = get_acpt_field([
    'post_id'    => get_the_ID(),
    'box_name'   => 'single-recipe-image',
    'field_name' => 'recipe-image',
]);
?>
<div class="container-recipe">
    <div class="recipe-image-content">
        <?php if ($recipeImage) { ?>
            <img src="<?php echo ($recipeImage->getSrc()); ?>" alt="<?php echo ($recipeImage->getAlt()); ?>">
        <?php } ?>
        <p><?php the_content(); ?></p>
    </div>
    <div class="recipe-text">
        <h1><?php the_title(); ?></h1>
        <p>metatags</p>
    </div>
</div>


<?php
$ingredients = get_acpt_field([
    'post_id'    => get_the_ID(),
    'box_name'   => 'ingredient-list',
    'field_name' => 'ingredients-section',
]);

$instruction = get_acpt_field([
    'post_id'    => get_the_ID(),
    'box_name'   => 'instruction-list',
    'field_name' => 'instruction-section',
]);

if ($ingredients) {
    foreach ($ingredients as $group) {
        echo '<h3>' . esc_html($group['ingredient-category']) . '</h3>';
        echo '<ul>';

        // $group['ingredient-list'] is an array with one element (the list of items)
        foreach ($group['ingredient-list'][0] as $item) {
            echo '<li>' . esc_html($item['ingredient']) . '</li>';
        }

        echo '</ul>';
    }
}

if ($instruction) {
    echo '<ol>';
    foreach ($instruction as $group) {
        echo '<li>';
        echo '<h3>' . esc_html($group['instruction-steps']) . '</h3>';
        echo '</li>';
    }
    echo '</ol>';
}
?>
<div class="related-recipes">
    <div class="related-recipes-text">
        <a href="<?php echo (get_post_type_archive_link('recipe')); ?>">
            <img src="<?php echo (get_theme_file_uri('/assets/images/errorCat.png')); ?>" alt="Recipes">
            <p>brand</p>
            <p>navn</p>
            <p>stjerner</p>
        </a>
    </div>
    <div class="related-recipes-text">
        <a href="<?php echo (get_post_type_archive_link('recipe')); ?>">
            <img src="<?php echo (get_theme_file_uri('/assets/images/errorCat.png')); ?>" alt="Recipes">
            <p>brand</p>
            <p>navn</p>
            <p>stjerner</p>
        </a>
    </div>
    <div class="related-recipes-text">
        <a href="<?php echo (get_post_type_archive_link('recipe')); ?>">
            <img src="<?php echo (get_theme_file_uri('/assets/images/errorCat.png')); ?>" alt="Recipes">
            <p>brand</p>
            <p>navn</p>
            <p>stjerner</p>
        </a>
    </div>
</div>
<?php
echo '<pre>';
// print_r($recipeImage->getSrc());
// print_r($ingredientList);
// print_r($instruction);
echo '</pre>';
?>

<?php get_footer(); ?>