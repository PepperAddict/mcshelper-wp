<?php

/**
 * Plugin Name: MCS Helper
 * Author: Jenearly Ang 
 * Author URI: https://pepperaddict.github.io/portfolio/
 * Version: 1.0.0
 * Description: Customer Service Chat 
 * 
 */
if (!function_exists('add_action')) {
    die('you don\'t belong here');
};

/**
 * Define Plugin Constants
 */

 define( 'MCS_PATH', trailingslashit(plugin_dir_path(__FILE__)));
 define( 'MCS_URL', trailingslashit(plugins_url('/',__FILE__)));

 /**
  * Loading Necessary Scripts
  */

  add_action('admin_enqueue_scripts', 'load_scripts');

  function load_scripts() {
      wp_enqueue_script('mcshelper', MCS_URL . 'dist/bundle.js', ['wp-element'], 1, true);
      wp_localize_script(
          'mcshelper', 
          'appLocalizer',
           [
               'apiUrl' => home_url('/wp-json'),
                'nonce' => wp_create_nonce('wp_rest')
            ]
        );
  }

  require_once MCS_PATH . 'classes/class-create-admin-menu.php';
  require_once MCS_PATH . 'classes/class-create-settings-route.php';
