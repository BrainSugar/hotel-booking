<?php

/*
|--------------------------------------------------------------------------
| Create The Plugin
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Bones plugin instance
| which serves as the "glue" for all the components.
|
*/
if (class_exists('\Brainsugar\WPBones\Foundation\Plugin')) {

    $plugin = new \Brainsugar\WPBones\Foundation\Plugin(
        realpath(__DIR__ . '/../')
    );

    /*
    |--------------------------------------------------------------------------
    | Actions and filters
    |--------------------------------------------------------------------------
    |
    | Feel free to insert your actions and filters.
    |
    */






add_action( 'init', function() {
        if ( ! defined( 'BSHB_BASE_PATH' ) ) {
                define('BSHB_BASE_PATH', plugin_dir_path( __DIR__ ));
        }
         if ( ! defined( 'BSHB_ASSETS_PATH' ) ) {       
                define('BSHB_ASSETS_PATH' , plugins_url('brainsugar-hotel-booking/resources/assets/'));
         }
 } );

    /*
    |--------------------------------------------------------------------------
    | Return The Plugin
    |--------------------------------------------------------------------------
    |
    | This script returns the plugin instance. The instance is given to
    | the calling script so we can separate the building of the instances
    | from the actual running of the application and sending responses.
    |
    */

    /**
     * Fire when the plugin is loaded
     */
    do_action('brainsugar_loaded');

    return $plugin;
}