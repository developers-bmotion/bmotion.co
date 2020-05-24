<?php
get_header();
global $jws_option;
$layout = get_post_meta( get_the_ID(), 'layout', true );
if((isset($layout) && !empty($layout)) && $layout != 'global') {
	$sllayout = $layout;
}else {
    if((isset($jws_option['blogs_layout']) && !empty($jws_option['blogs_layout'])) || $layout == 'global' ) {
      $sllayout = $jws_option['blogs_layout']; 
    }else {
        $sllayout = 'layout1'; 
    }	
}

?>
<section id="primary" class="content-area">
	<main id="main" class="site-main">
        <?php if (!isset($jws_option['themecheck_style']) || $jws_option['themecheck_style'] ) echo '<div class="no_vc_composer">'; ?>
    		<?php
    		/* Start the Loop */
    		while ( have_posts() ) :
    			the_post();
    		get_template_part( 'template-parts/single/blogs/'.$sllayout.'' );
    		endwhile; // End of the loop.
          
    		?>
        <?php if (!isset($jws_option['themecheck_style']) || $jws_option['themecheck_style'] ) echo '</div">'; ?>
	</main><!-- #main -->
</section><!-- #primary -->
<?php
get_footer();