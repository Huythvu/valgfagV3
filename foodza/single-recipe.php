<?php
while (have_posts()) {
    the_post();
?>
    <h1><?php the_title(); ?> </h1>
    <img src="<?php the_post_thumbnail(); ?>" alt="">
    <p><?php the_content(); ?></p>
    <p>??</p>



<?php





}
?>

<?php
$acf = get_fields(get_the_ID()); // eller $data['acf'] hvis du bruger REST API
if ($acf) {
    foreach ($acf as $key => $value) {
        if (!empty($value)) {
            echo '<p><strong>' . esc_html($key) . ':</strong> ' . esc_html($value) . '</p>';
        }
    }
}
?>