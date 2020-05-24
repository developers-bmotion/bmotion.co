<?php
function jws_include_svg($attachment_id)
{

    if (!$attachment_id || !is_numeric($attachment_id)) {
        return '';
    }

    $url = get_attached_file($attachment_id);

    return $url ? $url : false;
}

/**
 * ------------------------------------------------------------------------------------------------
 * Get post image
 * ------------------------------------------------------------------------------------------------
 */

if (!function_exists('jws_get_post_thumbnail')) {
    function jws_get_post_thumbnail($size = 'medium', $attach_id = false)
    {
        global $post, $consbie_loop;

        if (has_post_thumbnail()) {

            if (function_exists('wpb_getImageBySize')) {
                if (!$attach_id) $attach_id = get_post_thumbnail_id();
                if (!empty($consbie_loop['img_size'])) $size = $consbie_loop['img_size'];

                $img = wpb_getImageBySize(array('attach_id' => $attach_id, 'thumb_size' => $size, 'class' => 'attachment-large wp-post-image'));
                $img = $img['thumbnail'];

            } else {
                $img = get_the_post_thumbnail($post->ID, $size);
                
            }

            return $img;
        }
    }
}

if (!function_exists('jws_link_post')) {
    function jws_link_post()
    {
        global $wp_query;
        
        $big = 999999999; // need an unlikely integer
        
        echo paginate_links( array(
        	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        	'format' => '?paged=%#%',
        	'current' => max( 1, get_query_var('paged') ),
        	'total' => $wp_query->max_num_pages
        ) );
    }
    if ( ! isset( $content_width ) ) {
	   $content_width = 600;
    }
}