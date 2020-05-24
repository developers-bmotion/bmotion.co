<?php
get_header();
?>
<section id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php
        $content = (is_active_sidebar('sidebar-single-blog')) ? 'col-lg-8 col-md-8 col-sm-12 col-xs-12 nxl_content' : 'col-lg-12 col-md-12 col-sm-12 col-xs-12 nxl_content';
		if ( have_posts() ) {
			// Load posts loop.
			?> <div class="nxl_blog_grid layout1 container">
			<div class="nxl_blog_grid_content row">
                      <div class="<?php echo esc_attr($content); ?>">
                        <div class="jws-post-archive">
                                <?php 
                    				while ( have_posts() ) {
                    					the_post();
                    					get_template_part( 'template-parts/content/content' );
                    				}
                    			?>  
                		 </div>
                            <?php  jws_query_pagination(); ?>    
                      </div>
                  <?php if (is_active_sidebar('sidebar-single-blog')) : ?>
        		      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 nxl_sidebar">
                        <div class="nxl_sticky_move">
                             <?php
                             
                                 dynamic_sidebar('sidebar-single-blog');
                            
                             ?>
                         </div>    
                      </div>
                  <?php  endif; ?>
		</div><?php
	} else {
			// If no content, include the "No posts found" template.
		get_template_part( 'template-parts/content/content', 'none' );
	}
	?>
</main><!-- .site-main -->
</section><!-- .content-area -->
<?php
get_footer();