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



/* Extend locate_template from WP Core 
* Define a location of your plugin file dir to a constant in this case = PLUGIN_DIR_PATH 
* Note: PLUGIN_DIR_PATH - can be any folder/subdirectory within your plugin files 
*/ 


function abc() {
        echo "hooking in";
}
add_action( 'bshb_room_type_container_end', 'abc', 10, 1 );




add_action('wp_head', 'myplugin_ajaxurl');

function myplugin_ajaxurl() {

   echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}