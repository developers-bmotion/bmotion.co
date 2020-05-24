<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Consbie
 * @since 1.0.0
 */
global $jws_option;
$entries = get_post_meta( get_the_ID(), 'jws_hidden_footer_deafault', true );
?>
</div>
</div>
<?php wp_footer();  ?>
</body>
</html>