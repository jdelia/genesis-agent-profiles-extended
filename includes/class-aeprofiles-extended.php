<?php
/**
* Class and Function List:
* Function list:
* - __construct()
* - register_settings_extended()
* - add_options_extended()
* - settings_init_extended()
* - settings_page_extended()
* - register_meta_boxes_extended()
* - sjd_metabox()
* Classes list:
* - Agent_Directory_Extended
*/

/**
 * This file contains the Agent_Directory class.
 */

/**
 * This class handles the creation of the "Agent" post type,
 * and creates a UI to display the Agent-specific data on
 * the admin screens.
 */
class Agent_Directory_Extended
{
    
    var $settings_page_extended = 'aep-settings-extended';
    
    function __construct() {
        
        add_action('admin_init', array(&$this, 'register_settings_extended'), 15);
        add_action('admin_init', array(&$this, 'add_options_extended'), 15);
        add_action('admin_menu', array(&$this, 'settings_init_extended'), 20);
        add_action('admin_menu', array( $this, 'register_meta_boxes_extended' ), 10 );
    }
    
    function register_settings_extended() {
        
        register_setting('aep_options_extended', 'plugin_ae_profiles_settings_extended');
    }
    
    function add_options_extended() {
        
        $new_options = array('use_square_photo' => 0);
        
        if (empty($this->options['use_square_photo'])) {
            add_option('plugin_ae_profiles_settings_extended', $new_options);
        }
    }
    
    /**
     * Adds settings page under agent post type in admin menu
     */
    function settings_init_extended() {
        add_submenu_page('edit.php?post_type=aeprofiles', __('Extended Settings', 'aep'), __('Extended Settings', 'aep'), 'manage_options', $this->settings_page_extended, array(&$this, 'settings_page_extended'));
    }
    
    /**
     * Creates display of settings page along with form fields
     */
    function settings_page_extended() {
        include (dirname(__FILE__) . '/views/aep-settings-extended.php');
    }
    function register_meta_boxes_extended() {
        add_meta_box('sjd_metabox', __('Plugin by Savvy Jackie Designs', 'aep_options_extended'), array(&$this, 'sjd_metabox'), 'aep_options_extended', 'side', 'core');
       
    }
    function sjd_metabox() {
        include (dirname(__FILE__) . '/views/sjd-metabox.php');
    }
}
