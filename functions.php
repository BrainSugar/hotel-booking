<?php
use Brainsugar\Core\TemplateLoader;
/*
|--------------------------------------------------------------------------
| Global functions
|--------------------------------------------------------------------------
|
| Here you can insert your global function loaded by composer settings.
|
*/

// if ( ! function_exists( 'myGlobalFunction' ) ) {
        
//         function myGlobalFunction()
//         {   
       
                
//         }
        
        
// }
// myGlobalFunction();

// function abc() {
//         echo "looooolol";
// }

// function setGlobals() {
//         global $bshb_cart;
//         $bshb_cart = 'Roflfolrorlf';
// }
// add_action( 'init','setGlobals');

// function bshb_get_template_part($template) {
//         $templateLoader = new TemplateLoader;
//         $templateLoader->templateRender($template);
// }


function bshb_get_template_part($slug, $name = null) {

  do_action("bshb_get_template_part_{$slug}", $slug, $name);

  $templates = array();
  if (isset($name))
      $templates[] = "{$slug}-{$name}.php";

  $templates[] = "{$slug}.php";

  bshb_get_template_path($templates, true, false);
}

/* Extend locate_template from WP Core 
* Define a location of your plugin file dir to a constant in this case = PLUGIN_DIR_PATH 
* Note: PLUGIN_DIR_PATH - can be any folder/subdirectory within your plugin files 
*/ 

function bshb_get_template_path($template_names, $load = false, $require_once = true ) {
    $located = ''; 
    foreach ( (array) $template_names as $template_name ) { 
      if ( !$template_name ) 
        continue; 

      /* search file within the PLUGIN_DIR_PATH only */ 
        var_dump($template_name);
        if ( file_exists(locate_template( array( 'bshb-template/' . $template_name ) ))) { 
        $located = locate_template( array( 'bshb-template/' . $template_name));
        break; 
      } 

      if ( file_exists(BSHB_BASE_PATH . 'templates/' . $template_name)) { 
        $located = BSHB_BASE_PATH . 'templates/' . $template_name; 
        break; 
      } 
    }

    if ( $load && '' != $located )
        load_template( $located, $require_once );

    return $located;
}


function abc() {
        echo "hooking in";
}
add_action( 'bshb_room_type_container_end', 'abc', 10, 1 );