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
        <div class="content-text">
            <p><?php the_content(); ?></p>
        </div>
    </div>
    <div class="recipe-text">
        <h1><?php the_title(); ?></h1>
        <p><?php the_terms(get_the_ID(), 'cook-time', 'Cook-time:'); ?></p>
        <p><?php the_terms(get_the_ID(), 'cook-level', 'Cook-level:'); ?></p>
        <p><?php the_terms(get_the_ID(), 'dietary', 'Dietary:'); ?></p>
        <p><?php the_terms(get_the_ID(), 'meal-type', 'Meal-type:'); ?></p>
        <p><?php the_terms(get_the_ID(), 'tool', 'Tool:'); ?></p>

        <!-- https://developer.wordpress.org/reference/functions/the_terms/?utm_source=chatgpt.com The_terms er en function i wordpress her kan jeg direkte fange mine taxonomier ved hjælp af the_terms også bare skrive category name jeg har angivet. -->

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
<div class="review-container">
    <h3>Submit a review</h3>
    <p>stjerner</p>
    <p>Tell us more about your experience</p>
    <form>
        <input class="form" type="text" placeholder="What made your experience great? REmember to be honest, helpful, 
and construvtive!" name="msg">
    </form>
    <button class="button" type="submit">Send</button>
</div>

<div class="related-recipes">
    <div class="related-recipes-text">
        <a href="<?php echo get_the_permalink(67); ?>">
            <img src="<?php echo (get_theme_file_uri('/assets/images/vegan_apple_pie.jpg')); ?>" alt="Recipes">
            <p>brand</p>
            <p>navn</p>
            <p>stjerner</p>
        </a>
    </div>
    <div class="related-recipes-text">
        <a href="<?php echo get_the_permalink(70); ?>">
            <img src="<?php echo (get_theme_file_uri('/assets/images/chicken_in_a_pot.jpg')); ?>" alt="Recipes">
            <p>brand</p>
            <p>navn</p>
            <p>stjerner</p>
        </a>
    </div>
    <div class="related-recipes-text">
        <a href="<?php echo get_the_permalink(); ?>">
            <img src="<?php echo (get_theme_file_uri('/assets/images/pot-roast_pork_enchaud.jpg')); ?>" alt="Recipes">
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