<?php

/**
 * This file will create custom rest api endpoints
 */
class WP_React_Settings_Rest_route {

    public function __construct() {
        add_action('rest_api_init', [$this, 'create_rest_routes']);
    }

    public function create_rest_routes() {
        /**
         * Our get method
         */

        $getProperties = [
            'namespace' => 'mcsh',
            'route' => '/settings',
            'args' => [
                'methods' => 'GET',
                'callback' => [$this, 'get_settings'],
                'permission_callback' => [$this, 'get_settings_permission']
            ]
            ];
        $postProperties = [
            'namespace' => 'mcsh',
            'route' => '/settings',
            'args' => [
                'methods' => 'POST',
                'callback' => [$this, 'post_settings'],
                'permission_callback' => [$this, 'post_settings_permission']
            ]
            ];
        register_rest_route($getProperties['namespace'], $getProperties['route'], $getProperties['args'] );

        /**
         * Now for our post method endpoint
         */
        register_rest_route($postProperties['namespace'], $postProperties['route'], $postProperties['args'] );

    }

    public function get_settings() {
        $token = get_option('mcsh_token');

        $response = [
            'token' => $token
        ];

        return rest_ensure_response($response);
    }

    public function get_settings_permission() {
        return true;
    }

    public function post_settings($req) {

        $token = sanitize_text_field($req['token']);
        update_option('mcsh_token', $token);
        return rest_ensure_response('success');

    }

    public function post_settings_permission() {

        if (current_user_can('manage_options')) {
            return true;
        }
        
    }

}

new WP_React_Settings_Rest_route();