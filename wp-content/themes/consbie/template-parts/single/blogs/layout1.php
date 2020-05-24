<?php
global $jws_option;
$content = "col-lg-12 col-md-12 col-sm-12 col-xs-12 nxl_content";
$sidebar = "col-lg-12 col-md-12 col-sm-12 col-xs-12 nxl_sidebar";
?>
<div class="layout1">
    <div class="nxl_blogs_content">
        <div class="container">
            <div class="row_st">
                <div class="<?php echo esc_attr($content); ?>">
                     <div class="nxl_blog_thumbnail<?php echo( has_post_thumbnail() ) ? ' nxl_has_thumb' : ' nxl_no_thumb';  ?>">
                            <?php the_post_thumbnail('full')?>
                    </div>
                     <div class="nxl_blog_content_meta">
                                <span class="post_time"> <?php the_time('j F Y'); ?> </span>
                                <span class="post_cat"><?php  echo get_the_term_list(get_the_ID(), 'category', '', ', '); ?></span>
                                <span class="post_author"><?php echo esc_html__('BY ', 'consbie') ?></span><?php echo get_the_author(); ?></span></span>
                    </div>
                    <h1 class="nxl_blogs_title">
                           <?php the_title(); ?>
                    </h1>
                    <div class="nxl_blog_content_inner">
                        <?php 
                            the_content();
                            wp_link_pages( array(
                    			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'consbie' ) . '</span>',
                    			'after'       => '</div>',
                    			'link_before' => '<span>',
                    			'link_after'  => '</span>',
                            ) );
                         ?>
                    </div>
                     <?php if (has_tag()) { ?>
                    <div class="row tag_share">
                        <div class="col-xl-12 col-lg-12 col-12">
                            <div class="nxl_blogs_tags">
                            
                                    <span class="tag_label">
                                        <?php echo esc_html__('Tags:','consbie'); ?>
                                    </span>
                                    <?php echo jws_get_tags(); ?>
                            </div>
                        </div>
                    </div>
                   <?php } ?>
                    <div class="post_nav">
                        <nav class="navigation post-navigation" role="navigation">
                            <div class="nav-links">
                                <?php
                                if (is_attachment()) :
                                    previous_post_link('%link',
                                        esc_html__('%title', 'consbie'));
                                else :
                                    previous_post_link('<span class="left"> <i class="fa fa-angle-double-left"></i> %link </span>', 'Prev Post' , 'zahar');    
                                    next_post_link('<span class="right"> %link <i class="fa fa-angle-double-right"></i> </span>', 'Next Post', 'zahar');
                                endif;
                                ?>
                            </div>
                        </nav><!-- .navigation -->
                    </div>
                    <div class="nxl_comment_post post-comment">
                        <?php

                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) {
                            comments_template();
                        }

                        ?>
                    </div>
                </div>

            </div>


        </div>

    </div>

</div>