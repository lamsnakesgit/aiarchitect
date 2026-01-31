<?php
function viz_theme_scripts() {
    wp_enqueue_style('viz-style', get_stylesheet_uri());
    wp_enqueue_style('viz-main-style', get_template_directory_uri() . '/assets/css/styles.css');
    wp_enqueue_script('viz-script', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'viz_theme_scripts');

// Allow SVG upload
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
?>
