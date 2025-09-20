<?php
$recipeImage = get_acpt_field([
    'post_id'    => get_the_ID(),
    'box_name'   => 'single-recipe-image',
    'field_name' => 'recipe-image',
]);

$ingredientList = get_acpt_field([
    'post_id'    => get_the_ID(),
    'box_name'   => 'ingredient-list',
    'field_name' => 'ingredient-list',
]);

$instructionList = get_acpt_field([
    'post_id'    => get_the_ID(),
    'box_name'   => 'instruction-list',
    'field_name' => 'instruction',
]);
?>

<?php if ($recipeImage): ?>
    <img src="<?php echo $recipeImage->getSrc(); ?>" alt="<?php echo $recipeImage->getAlt(); ?>">
<?php
endif;
// echo '<pre>';
//     print_r($recipeImage);
//     print_r($ingredientList);
//     print_r($instructionList);
//     echo '</pre>';
?>

<?php
$ingredients = get_acpt_field([
    'post_id'    => get_the_ID(),
    'box_name'   => 'ingredient-list',
    'field_name' => 'ingredients-section',
]);

$ingredients = get_acpt_field([
    'post_id'    => get_the_ID(),
    'box_name'   => 'ingredient-list',
    'field_name' => 'ingredients-section',
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

$ingredients = get_acpt_field([
    'post_id'    => get_the_ID(),
    'box_name'   => 'ingredient-list',
    'field_name' => 'ingredients-section',
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

$instruction = get_acpt_field([
    'post_id'    => get_the_ID(),
    'box_name'   => 'instruction-list',
    'field_name' => 'instruction-section',
]);

if ($instruction) {
    foreach ($instruction as $group) {
        echo '<ul>';
        echo '<li>';
        echo '<h3>' . esc_html($group['instruction']) . '</h3>';
        echo '</li>';
        echo '</ul>';
    }
}

echo '<pre>';
print_r($ingredients);
echo '</pre>';
?>