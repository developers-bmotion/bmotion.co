<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Consbie
 * @since 1.0.0
 */
get_header();
global $jws_option;

?>
<div id="primary" class="content-area">
	<div id="main" class="site-main">
    <?php if (!isset($jws_option['themecheck_style']) || $jws_option['themecheck_style'] ) echo '<div class="container">'; ?>
		<?php
    		/* Start the Loop */
    		while ( have_posts() ) :
    			the_post();
    		get_template_part( 'template-parts/content/content', 'page' );
    				// If comments are open or we have at least one comment, load up the comment template.
    		if ( comments_open() || get_comments_number() ) {
    		  echo '<div class="post-comment">';
    			comments_template();
              echo '</dv>';  
    		}
			endwhile; // End of the loop.
			?>
            <?php if (!isset($jws_option['themecheck_style']) || $jws_option['themecheck_style'] ) echo '</div>'; ?>
		</div><!-- #main -->
    </div><!-- #primary -->
    <a href="#" class="backToTop fa fa-arrow-up"></a>
	<?php
	get_footer();