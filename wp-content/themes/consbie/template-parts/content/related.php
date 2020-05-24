<div class="nxl_blog_item">
    <div class="nxl_blog_image">
        <div class="nxl_blog_image_inner">
            <a href="<?php the_permalink(); ?>">
                <?php

                echo jws_get_post_thumbnail('770x570');

                ?>
            </a>
        </div>

    </div>
    <div class="nxl_blog_content">

        <div class="nxl_blog_title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </div>
        <div class="nxl_blog__date">

            <?php echo get_the_date(); ?>

        </div>
        <span class="line"></span>
        <div class="nxl_blog_cat">
            <?php echo get_the_term_list(get_the_ID(), 'category', '', ', '); ?>
        </div>

    </div>
</div>