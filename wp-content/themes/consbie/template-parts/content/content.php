<div class="layout-post-archive1">
<div class="elementor-post<?php if(is_sticky()) echo ' sticky'; ?>">
<a href="<?php the_permalink()?>"><?php the_post_thumbnail('full')?></a>
<div class="m-30">
			<div class="post-info">
			<time class="post-time <?php if (!get_the_post_thumbnail()) {
				echo 'post-time-position';
			} ?>">
				<span class="color-layout-hover">
                    <?php 
							the_time('d M');
					?>
				</span>
			</time>
            <span class="post-category">
				<span class="color-layout-hover"><?php  echo get_the_term_list(get_the_ID(), 'category', '', ', '); ?></span>
			</span>
            <span class="post-author <?php if (!get_the_post_thumbnail()) {
			echo 'post-author-position';
		    } ?>">
			    <span class="color-7a7a7a">By </span><span class="color-layout-hover"><?php the_author(); ?></span>
			</span>
        </div>
        <a href="<?php the_permalink() ?>">
				<p class="post-title"><?php the_title() ?></p>
		</a>
        <div class="post-decription"><?php echo get_the_excerpt(); ?></div>
        <div class="post-link">
			<a href="<?php the_permalink() ?>">
				<span class="post-link__text" ><?php echo esc_html__('READ MORE','consbie'); ?></span>
			</a>
		</div>
</div>  
</div> 
</div>     
            