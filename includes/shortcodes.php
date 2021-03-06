<?php
/**
 * Class and Function List:
 * Function list:
 * - load_shortcode_last()
 * - gap_profile_shortcode_extended()
 * Classes list:
 */

/**
 * Adds shortcode to display agent profiles extended
 */

add_action('after_setup_theme', 'load_shortcode_last', 99);
function load_shortcode_last() {
    if (shortcode_exists('agent_profiles')) {
        remove_shortcode('agent_profiles', 'gap_profile_shortcode');
    }
    add_shortcode('agent_profiles', 'gap_profile_shortcode_extended');
}

function gap_profile_shortcode_extended($atts, $content = null) {
    extract(shortcode_atts(array('id' => '', 'orderby' => 'menu_order', 'order' => 'ASC'), $atts));
    
    if ($id == '') {
        $query_args = array('post_type' => 'aeprofiles', 'posts_per_page' => - 1, 'orderby' => $orderby, 'order' => $order);
    } 
    else {
        $query_args = array('post_type' => 'aeprofiles', 'post__in' => explode(',', $id), 'posts_per_page' => - 1, 'orderby' => $orderby, 'order' => $order);
    }
    
    global $post;
    
    $profiles_array = get_posts($query_args);
    
    $output = '';
    
    $photo_size = get_aeprofiles_photo_size();
    
    foreach ($profiles_array as $post):
        setup_postdata($post);
        
        $output.= '<div class="shortcode-agent-wrap">';
        $output.= '<a href="' . get_permalink() . '">' . get_the_post_thumbnail($post->ID, $photo_size) . '</a>';
        $output.= '<div class="shortcode-agent-details"><a class="fn" href="' . get_permalink() . '">' . get_the_title() . '</a>';
        $output.= do_agent_details();
        
        if (function_exists('_p2p_init') && function_exists('agentpress_listings_init') || function_exists('_p2p_init') && function_exists('wp_listings_init')) {
            
            // let's see if there are any listings
            $has_listings = aeprofiles_has_listings($post->ID);
            if (!empty($has_listings)) {
                $output.= '<p><a class="agent-listings-link" href="' . get_permalink() . '#agent-listings">View My Listings</a></p>';
            }
        }
        $output.= '</div>';
        $output.= do_agent_social();
        
        $output.= '</div><!-- .shortcode-agent-wrap -->';
    endforeach;
    wp_reset_postdata();
    
    return $output;
}
