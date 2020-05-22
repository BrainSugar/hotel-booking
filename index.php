<?php

/**
 * Plugin Name: Brainsugar Hotel Booking
 * Plugin URI: http://brainsugar.studio
 * Description: 
 * Version: 0.5
 * Author: Brainsugar Studio.
 * Author URI: http://brainsugar.studio
 * Text Domain: bshb
 * Domain Path: localization
 *
 */

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels nice to relax.
|
*/
use Brainsugar\WPBones\Foundation\Plugin;

require_once __DIR__ . '/bootstrap/autoload.php';



/*
|--------------------------------------------------------------------------
| Bootstrap the plugin
|--------------------------------------------------------------------------
|
| We need to bootstrap the plugin.
|
*/

// comodity define for text domain
define( 'BRAINSUGAR_TEXTDOMAIN', 'brainsugar' );

$GLOBALS[ 'Brainsugar' ] = require_once __DIR__ . '/bootstrap/plugin.php';

if ( ! function_exists( 'Brainsugar' ) ) {

  /**
   * Return the instance of plugin.
   *
   * @return Plugin
   */
  function Brainsugar()
  {
    return $GLOBALS[ 'Brainsugar' ];
  }
}