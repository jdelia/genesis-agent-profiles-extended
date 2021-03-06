<?php
/**
 * Class and Function List:
 * Function list:
 * - add_body_class()
 * - agent_directory_archive_loop()
 * Classes list:
 */
add_filter('genesis_pre_get_option_site_layout', '__genesis_return_full_width_content');
remove_action('genesis_before_loop', 'genesis_do_breadcrumbs');
remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'agent_directory_archive_loop');
add_filter('body_class', 'add_body_class');

function add_body_class($classes) {
    $classes[] = 'archive-aeprofiles';
    return $classes;
}

function agent_directory_archive_loop() {
    
    $class = '';
    $i = 4;
    
    $photo_size = get_aeprofiles_photo_size();
    
    echo '<div class="archive-agent-wrap">';
    if (have_posts()):
        while (have_posts()):
            the_post();
            
            // starting at 4
            if ($i == 4) {
                $class = 'first one-fourth agent-wrap';
                $i = 0;
            } 
            else {
                $class = 'one-fourth agent-wrap';
            }
            
            //increase count by 1
            $i++;
            
            $thumb_id = get_post_thumbnail_id();
            $thumb_url = wp_get_attachment_image_src($thumb_id, $photo_size, true);
?>

    <div <?php
            post_class($class); ?> itemscope itemtype="http://schema.org/Person">
    


        <?php
            $post_id = get_the_id();
            $thumb_id = get_post_thumbnail_id($post_id);
            $thumb_url = wp_get_attachment_image_src($thumb_id, $photo_size, true);
            echo '<a href="' . get_permalink() . '"><img src="' . $thumb_url[0] . '" alt="' . get_the_title() . ' photo" class="attachment-agent-profile-photo wp-post-image" itemprop="image" /></a>';
?>
        <div class="agent-details vcard">
        <?php
            printf('<p><a class="fn" href="%s" itemprop="name">%s</a></p>', get_permalink(), get_the_title());
            do_action('sjd_agent_details_archive');
            
            //echo do_agent_details();
            if (function_exists('_p2p_init') && function_exists('agentpress_listings_init') || function_exists('_p2p_init') && function_exists('wp_listings_init')) {
                
                // let's see if there are any listings
                $has_listings = aeprofiles_has_listings( $post_id );
                if (!empty($has_listings)) {
                    echo '<p><a class="agent-listings-link" href="' . get_permalink() . '#agent-listings">View My Listings</a></p>';
                }
            }
            
            //echo do_agent_social();
            
            
?>
        </div><!-- .agent-details -->
    </div> <!-- .agent-wrap -->

    <?php
        endwhile;
        
        genesis_posts_nav();
    else: ?>
    
    <p><?php
        _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php
    endif;
    echo '</div>';
    
    //  <!--. archive-agent-wrap -->
    
    
}

genesis();
