<div class="nxl_projects_item col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="nxl_projects_image">
        <div class="nxl_projects_image_inner">
            <a href="<?php the_permalink(); ?>">
                <?php


                echo jws_get_post_thumbnail('520x570');


                ?>
            </a>
        </div>
        <div class="nxl_projects_cat">
            <?php echo get_the_term_list(get_the_ID(), 'projects_cat', '', ', '); ?>
        </div>
    </div>
    <div class="nxl_projects_content">

        <div class="nxl_projects_title">
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        </div>
        <div class="nxl_projects_link">
            <a href="<?php the_permalink(); ?>">
                <span class="fa fa-arrow-right"></span>
                <span class="nxl_text"><?php echo esc_html__('DISCOVER PROJECT', 'consbie'); ?></span>
            </a>
        </div>

    </div>

</div>