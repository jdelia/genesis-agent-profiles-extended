<?php
/**
* Class and Function List:
* Function list:
* - aep_template_include_extended()
* - do_agent_details_archive()
* Classes list:
*/

/**
 * Functions for Genesis Agent Profile Extended.
 *
 * @since 2.0
 * @author Jackie D'Elia
 */

// Override settings from Genesis Agent Profiles plugin
add_filter('template_include', 'aep_template_include_extended', 15);

/**
 * Display based on templates in plugin, or override with same name template in theme directory
 */
function aep_template_include_extended($template) {
    
    $post_type = 'aeprofiles';
    
    if (aeprofiles_is_taxonomy_of($post_type)) {
        
        if (file_exists(get_stylesheet_directory() . '/archive-' . $post_type . '.php')) {
            
            echo 'The template is:' . $template;
            return get_stylesheet_directory() . '/archive-' . $post_type . '.php';
        } 
        else {
            
            return dirname(__FILE__) . '/views/archive-' . $post_type . '.php';
        }
    }
    
    if (is_post_type_archive($post_type)) {
        
        if (file_exists(get_stylesheet_directory() . '/archive-' . $post_type . '.php')) {
            
            echo $template;
            return $template;
        } 
        else {
            
            return dirname(__FILE__) . '/views/archive-' . $post_type . '.php';
        }
    }
    
    if ($post_type == get_post_type()) {
        
        if (file_exists(get_stylesheet_directory() . '/single-' . $post_type . '.php')) {
            
            return $template;
        } 
        else {
            
            return dirname(__FILE__) . '/views/single-' . $post_type . '.php';
        }
    }
    
    if (get_post_type() == 'listing') {
        
        if (file_exists(get_stylesheet_directory() . '/single-listing.php')) {
            
            return $template;
        } 
        else {
            
            return dirname(__FILE__) . '/views/single-listing.php';
        }
    }
    
    return $template;
}
// add a hook for this function
add_action( 'sjd_agent_details_archive', 'do_agent_details_archive');

function do_agent_details_archive() {
    
    $output = '';
    
    if (genesis_get_custom_field('_agent_license') != '')
        $output .= sprintf('<p class="license">%s</p>', genesis_get_custom_field('_agent_license') );

    if (genesis_get_custom_field('_agent_title') != '') {
        
        $output.= sprintf('<p class="title" itemprop="jobTitle">%s</p>', genesis_get_custom_field('_agent_title'));
    }
    if (genesis_get_custom_field('_agent_designations') != '') {
        
        $output.= sprintf('<p class="designations" itemprop="awards">%s</p>', genesis_get_custom_field('_agent_designations'));
    }
    if (genesis_get_custom_field('_agent_phone') != '') {
        
        $output.= sprintf('<p class="tel" itemprop="telephone"><span class="type">Office</span>: <span class="value">%s</span></p>', genesis_get_custom_field('_agent_phone'));
    }
    if (genesis_get_custom_field('_agent_mobile') != '') {
        
        $output.= sprintf('<p class="tel" itemprop="telephone"><span class="type">Cell</span>: <span class="value">%s</span></p>', genesis_get_custom_field('_agent_mobile'));
    }
    if (genesis_get_custom_field('_agent_email') != '') {
        
        $email = genesis_get_custom_field('_agent_email');
        $output.= sprintf('<p><a class="email" itemprop="email" href="mailto:%s">%s</a></p>', antispambot($email), 'Send Email');
    }
    if (genesis_get_custom_field('_agent_website') != '') {
        
        $output.= sprintf('<p><a class="website" itemprop="url" href="http://%s">%s</a></p>', genesis_get_custom_field('_agent_website'), 'Visit Website');
    }
    echo $output;
}


// Allow for all agents on one page up to 999

add_action( 'pre_get_posts', 'aeprofiles_change_sort_order_extended', 15 );

function aeprofiles_change_sort_order_extended( $query ) {
  

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  
    if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'aeprofiles' ) || is_tax() ) {

        $query->set( 'orderby', 'menu_order' );
        $query->set( 'order', 'ASC' );
        $query->set( 'paged', $paged );
        $query->set( 'posts_per_page', '999' );
    } 
}


