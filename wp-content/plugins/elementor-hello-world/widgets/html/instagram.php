<?php 
      $class_row = '';  
      $class_row .= ' jws_dektop_'.$settings['jws_instafeed_columns'].'';
      if(!empty($settings['jws_instafeed_columns_tablet'])) {
        $class_row .= ' jws_tablet_'.$settings['jws_instafeed_columns_tablet'].'';
      }
      if(!empty($settings['jws_instafeed_columns_mobile'])) {
        $class_row .= ' jws_mobile_'.$settings['jws_instafeed_columns_mobile'].'';
      }
?>
<div class="jws-instagram-feed <?php echo $class_row; ?>">
        <?php 
        if ( $this->get_settings( 'show_title' ) ) {
            ?>        
            <h5><?php echo $settings['title'] ?></h5>
            <?php
        }
        ?>
		<div id="jws-instagram-feed-<?php echo esc_attr($this->get_id()); ?>" class="jws-insta-grid jws_row" data-get="<?php echo esc_attr($settings['jws_instafeed_source'] ); ?>" data-tag-name="<?php echo esc_attr($settings['jws_instafeed_hashtag'] ); ?>" data-user-id="<?php echo esc_attr($settings['jws_instafeed_user_id'] ); ?>" data-client-id="<?php echo esc_attr($settings['jws_instafeed_client_id'] ); ?>" data-access-token="<?php echo esc_attr($settings['jws_instafeed_access_token'] ); ?>" data-limit="<?php echo $image_limit['size']; ?>" data-resolution="<?php echo esc_attr($settings['jws_instafeed_image_resolution'] ); ?>" data-sort-by="<?php echo esc_attr($settings['jws_instafeed_sort_by'] ); ?>" data-target="jws-instagram-feed-<?php echo esc_attr($this->get_id()); ?>" data-link="<?php echo esc_attr($settings['jws_instafeed_link'] ); ?>" data-link-target="<?php echo esc_attr($settings['jws_instafeed_link_target'] ); ?>" data-caption="<?php echo esc_attr($settings['jws_instafeed_caption'] ); ?>" data-likes="<?php echo esc_attr($settings['jws_instafeed_likes'] ); ?>" data-comments="<?php echo esc_attr($settings['jws_instafeed_comments'] ); ?>">
		</div>
		<div class="clearfix"></div>

		<?php if ( ($settings['jws_instafeed_pagination'] == 'yes') ) { ?>
		<div class="jws-load-more-button-wrap">
			<button class="jws-load-more-button" id="jws-load-more-btn-<?php echo $this->get_id(); ?>">
				<div class="jws-btn-loader button__loader"></div>
		  		<span>Load more</span>
			</button>
		</div>
		<?php } ?>
</div>