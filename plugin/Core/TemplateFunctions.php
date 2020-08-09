<?php 
use Brainsugar\Core\CoreFunctions;
use Brainsugar\Model\Pricing;
// The functions for the Frontend Templates.

/**
 * Get Template Part
 * 
 * An extension of default wp get template part function
 * @param [type] $slug
 * @param [type] $name
 * @return void
 */ 
function bshb_get_template_part($slug, $name = null , $data = []) {
        
        do_action("bshb_get_template_part_{$slug}", $slug, $name);
        
        $templates = array();
        if (isset($name))
        $templates[] = "{$slug}-{$name}.php";
        
        $templates[] = "{$slug}.php";       
        
        bshb_get_template_path($templates, true, false , $data);
}


/**
 * Get template path
 * 
 * Called by get template part function
 * Checks the theme folder for a template.
 * if found loads the template or loads the default plugin template
 *
 * @param [type] $template_names
 * @param boolean $load
 * @param boolean $require_once
 * @param object $data
 * @return void
 */
function bshb_get_template_path($template_names, $load = false, $require_once = true , $data ) {
        $located = ''; 
        foreach ( (array) $template_names as $template_name ) { 
                if ( !$template_name ) 
                continue; 

                if ( file_exists(locate_template( array( 'bshb-templates/' . $template_name ) ))) { 
                        $located = locate_template( array( 'bshb-templates/' . $template_name));
                break; 
        } 
        
        if ( file_exists(BSHB_BASE_PATH . 'templates/' . $template_name)) { 
                $located = BSHB_BASE_PATH . 'templates/' . $template_name; 
        break; 
} 
}
if($data){
        set_query_var('data', $data );
}

if ( $load && '' != $located ) {
        load_template( $located , $require_once);
        }
        return $located;
        
}


/**
 * Loads the Single Content
 *
 * @return void
 */
function bshb_get_single_content() {
        bshb_get_template_part('template-parts/single/content');
}


/**
 * Loads the single Title
 *
 * @return void
 */
function bshb_get_single_title() {
        bshb_get_template_part('template-parts/single/title');
}


/**
 * Echo the starting Divs
 *
 * @return void
 */
function bshb_container_start() {
       bshb_get_template_part('template-parts/global/wrapper-start');
}
add_action( 'bshb_container_start' , 'bshb_container_start' , 10 , 5 );


/**
 * Echo the output Divs
 *
 * @return void
 */
function bshb_container_end() {
        bshb_get_template_part('template-parts/global/wrapper-end');
}
add_action( 'bshb_container_end' , 'bshb_container_end' , 10 , 5 );


/**
 * Get the styles for the template elements specified in the settings.
 *
 * @param [type] $element
 * @return void
 */
function bshb_get_style($element) {
        $style = "";
        switch($element) {
                case  'search-button'  :
                        $style = "color: #000000; background:#fff;";
                break;
        }
        return $style;
}


function bshb_get_room_price($post_id , $checkIn , $checkOut) {   
        $pricingModel = new Pricing;
        $price = $pricingModel->get_room_rates_between_dates($post_id , $checkIn , $checkOut) ;
        // $room_price = get_post_meta($post_id , 'bshb_rack_rate' , true);
        // $format_price = CoreFunctions::formatCurrency($room_price);
        return $price;
}