<?php

/**
 * Genesis Agent Profiles Extended
 *
 * @package           Genesis_Agent_Profiles_Extended
 * @author            Jackie D'Elia
 * @license           GPL-2.0+
 * @link              http://savvyjackiedesigns.com/
 * @copyright         2015, Jackie D'Elia
 *
 * @wordpress-plugin
 * Plugin Name:       Genesis Agent Profiles Extended
 * Plugin URI:        http://savvyjackiedesigns.com/
 * Description:       Adds functionality to the Genesis Agent Profiles plugin
 * Version:           0.9.2
 * Author:            Jackie D'Elia
 * Author URI:        http://savvyjackiedesigns.com/
 * Text Domain:       genesis-agent-profiles-extended
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

// Prevent direct access.
defined('ABSPATH') || exit;

// Check to see if Genesis Agent Profiles plugin is active
if (!in_array('genesis-agent-profiles/plugin.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    add_action('admin_init', 'deactivate_plugin');
    function deactivate_plugin() {
        deactivate_plugins(plugin_basename('genesis-agent-profiles-extended/plugin.php'));
        wp_die(sprintf(__('Sorry, you can\'t activate unless you have Genesis Agent Profiles plugin installed and activated')));
    }
    return;
}

    


add_action('after_setup_theme', 'agent_profiles_init_extended',999);

/**
 * Initialize Agent Directory.
 *
 * Include the libraries, define global variables, instantiate the classes.
 *
 * @since 0.1.0
 */
function agent_profiles_init_extended() {
    

    define('AEPE_URL', plugin_dir_url(__FILE__));
    define('AEPE_VERSION', '1.0');
    
    require_once (dirname(__FILE__) . '/includes/class-aeprofiles-extended.php');

    // Load up the functions we've written
    require_once (dirname(__FILE__) . '/includes/functions.php');

    // Load up the functions we've written
    //require_once (dirname(__FILE__) . '/includes/helpers.php');
    
    // Load up the functions we've written
    require_once (dirname(__FILE__) . '/includes/shortcodes.php');

  
   

/** Create new featured image size */
    add_image_size( 'agent-profile-photo-square', 200, 200, true );
   
    /** Enqueues style file if it exists and has not been deregistered */
    add_action('wp_enqueue_scripts', 'add_aep_css_extended',99);
    function add_aep_css_extended() {
        
        $options = get_option('plugin_ae_profiles_settings');
     
        
        
        if (!isset($options['stylesheet_load'])) {
            $options['stylesheet_load'] = 0;
        }
        
        // if checked that means stylesheet has been deregistered
        if (1 == $options['stylesheet_load']) {
            return;
        }

       
        
        // Only load the stylesheet if it has not been deregistered in Genesis Agent Profiles plugin
        $aep_css_path = AEPE_URL . 'aep-extended.css';
        $var = dirname(__FILE__) . '/aep-extended.css';

       
          

        if (file_exists(dirname(__FILE__) . '/aep-extended.css')) {
            
            wp_dequeue_style( 'agent-profiles' );
            wp_deregister_style( 'agent-profiles' );
            wp_register_style('agent-profiles', $aep_css_path);
            wp_enqueue_style('agent-profiles');
        }
    }


    
    //Okay we are ready to go!
// Load up the functions we've written

    add_action('widgets_init', 'genesis_agent_profiles_extended_widget', 15);
    
    /**
     * Register widgets for use in a Genesis child theme.
     *
     * @since 1.0.0
     */
    function genesis_agent_profiles_extended_widget() {
        require plugin_dir_path(__FILE__) . '/includes/genesis-agent-profiles-extended-widget.php';
        register_widget('Custom_AgentEvolution_Profiles_Widget');
          
    }
    /** Instantiate */
    $_agent_directory = new Agent_Directory_Extended;
}

