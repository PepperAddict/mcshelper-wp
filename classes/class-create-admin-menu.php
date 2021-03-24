<?php
/**
 * This file will create admin menu page.
 */

 class Create_Admin_Page {
     public function __construct() {
         add_action('admin_menu', [ $this, 'create_admin_menu']);
     }

     public function create_admin_menu() {

         $properties = [
             'page_title' => 'MCS Helper',
             'menu_title' => 'MCS Helper',
             'capability' => 'manage_options',
             'menu_slug' => 'mcshelper',
             'callback' => [$this, 'menu_page'],
             'icon_url' => 'dashicons-store',
             'position' => 110
         ];

         add_menu_page(
            $properties['page_title'], 
            $properties['menu_title'], 
            $properties['capability'], 
            $properties['menu_slug'], 
            $properties['callback'],
            $properties['icon_url'],
            $properties['position']
         );
     }

     public function menu_page() {
        
        echo '<div class="wrap">
            <div id="mcs-admin-app">
        Hello
            </div>
        </div>';
     }
 }

 new Create_Admin_Page();