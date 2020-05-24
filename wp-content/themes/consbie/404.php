<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage consbie
 * @since 1.0.0
 */
get_header();
global $jws_option;
?>
<section id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="error-404 not-found">
			<div class="page-content">
				<?php if(isset($jws_option['select-page-404']) && !empty($jws_option['select-page-404'])) {
				    echo  do_shortcode('[html_block_build id="'.$jws_option['select-page-404'].'"]');
				} else { ?>
                    
				    <div class="page-content-error container">
                    <span class="flaticon-ground icon_404"></span>
                    <p><?php echo esc_html__('It looks like nothing was found at this location. Maybe try a search?', 'consbie'); ?></p>

                    <?php get_search_form(); ?>
                </div><!-- .page-content -->
				<?php } ?>
			</div><!-- .page-content -->
		</div><!-- .error-404 -->
	</main><!-- #main -->
</section><!-- #primary -->
<?php
get_footer();