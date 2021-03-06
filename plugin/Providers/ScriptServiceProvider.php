<?php

namespace Brainsugar\Providers;

use Brainsugar\WPBones\Support\ServiceProvider;

class ScriptServiceProvider extends ServiceProvider
{

  public function register()
  {
    add_action( "admin_enqueue_scripts", array($this,'registerGlobalAdminScripts'));
    add_action( "admin_enqueue_scripts", array($this,'generateRoomScripts') );
    add_action("admin_enqueue_scripts" , array($this,'calendarScripts'));
    add_action( 'admin_enqueue_scripts', array($this,'setupPluginScripts') ); 
    add_action('admin_footer' , array($this,'footerScripts'));

    add_action( 'wp_enqueue_scripts', array($this,'frontendScripts') );

  }





// Register Global Scripts
function registerGlobalAdminScripts(){
        if ( is_admin() ) {

                  wp_register_script( 'validate', plugins_url( '/brainsugar-hotel-booking/resources/assets/js/jquery.validate.js'), array( 'jquery' ) , false , true);
                // Register Bootstrap JS 
                wp_register_script( 'bootstrap-bundle',  plugins_url('/brainsugar-hotel-booking/public/js/bootstrap.bundle.js'), array( "jquery" ));
                // Sortable JS vendor script
                wp_register_script( "sortable", plugins_url(  '/brainsugar-hotel-booking/public/js/vendor/Sortable.js'), array( "jquery")); 
                // Register Scripts for generating room fields in CMB2
                wp_register_script( "generate-room", plugins_url( '/brainsugar-hotel-booking/public/js/generate-room.js'), array( "jquery", "bootstrap-bundle" , "sortable" , "validate"), Brainsugar()->Version , true);


        }
}



// CMB2 Field Scripts
function generateRoomScripts($hook) {
        global $post_type;        
        if($hook === "post.php" && $post_type === "bshb_room") {
                //Script for AJAx calls and sortable declarations. 
                  wp_enqueue_script( "generate-room");
        }
}


function calendarScripts($hook) {
        $screen = get_current_screen()->id;
        if($hook === "admin.php" ){
                if($screen === "brainsugar-hotel-booking_page_brainsugar_calendar") {
                        wp_enqueue_script("availability-calendar");
                }
                else if($screen === "toplevel_page_room_calendar"){
                        wp_enqueue_script( 'room-calendar' );
                }
                else if($screen === "toplevel_page_brainsugar_dashboard") {
                 wp_enqueue_script( 'dashboard-calendar' );
                }
                else if($screen === "brainsugar-hotel-booking_page_brainsugar_pricing") {
                 wp_enqueue_script( 'pricing-calendar' );
                }
                // else if($screen === )
                wp_enqueue_script( 'room-pricing' );
                
                
        }

}



function setupPluginScripts() {
        
       
      


        //     Ajax Calls
  
        
        wp_enqueue_style( 'brainsugar-css', plugins_url( '/brainsugar-hotel-booking/public/css/brainsugar.css'), array());
        wp_enqueue_style( 'brainsugar-css' );     
        
        
        
        wp_register_script( 'moment', plugins_url( '/brainsugar-hotel-booking/resources/assets/js/moment.js'), array( 'jquery' ));
        wp_enqueue_script( 'moment' );
        
        
        //     Wp alternative for underscore JS

        wp_register_script('availability-calendar',plugins_url( '/brainsugar-hotel-booking/public/js/availability-calendar.js'), array( 'jquery' , 'clndr' ));
        // wp_enqueue_script( 'availability-calendar' );

        
        wp_register_script('room-calendar',plugins_url( '/brainsugar-hotel-booking/public/js/room-calendar.js'), array( 'jquery' ));
        // wp_enqueue_script( 'room-calendar' );
        

        wp_register_script('dashboard-calendar',plugins_url( '/brainsugar-hotel-booking/public/js/dashboard-calendar.js' ), array( 'jquery' ));
       
       
        wp_register_script('pricing-calendar',plugins_url( '/brainsugar-hotel-booking/public/js/pricing-calendar.js'), array( 'jquery' ));

        wp_register_script('room-pricing',plugins_url( '/brainsugar-hotel-booking/public/js/room-pricing.js'), array( 'jquery' ));
        
        
}


function footerScripts () {


        
        // Wordpress Util functions. Required for Underscore Templating in Calendar.
        wp_enqueue_script( 'wp-util' );
                        
        wp_register_script( 'clndr', plugins_url( '/brainsugar-hotel-booking/resources/assets/js/clndr.js'), array( 'jquery' , 'moment' ) , false , true);
        wp_enqueue_script( 'clndr' );

}

function frontendScripts() {
        wp_enqueue_style( 'flatpickr-css', plugins_url( '/brainsugar-hotel-booking/public/css/flatpickr.css'), array());
        wp_enqueue_style( 'flatpickr-css' ); 
        wp_register_script( "flatpickr-range", plugins_url(  '/brainsugar-hotel-booking/public/js/vendor/range.js'), array( "jquery")); 
        wp_enqueue_script( 'flatpickr-range' );
        wp_register_script( "flatpickr", plugins_url(  '/brainsugar-hotel-booking/public/js/vendor/flatpickr.js'), array( "jquery" , "flatpickr-range")); 
        wp_enqueue_script( 'flatpickr' );
        wp_register_script( 'bootstrap-bundle',  plugins_url('/brainsugar-hotel-booking/public/js/bootstrap.bundle.js'), array( "jquery" ));
                wp_enqueue_style( 'brainsugar-frontend', plugins_url( '/brainsugar-hotel-booking/public/css/bshb-frontend.css'), array());
        wp_enqueue_style( 'brainsugar-frontend' ); 
                        wp_enqueue_style( 'swipercss', plugins_url( '/brainsugar-hotel-booking/public/css/swiper.css'), array());
        wp_enqueue_style( 'swipercss' ); 
                      wp_register_script( "swiper", plugins_url(  '/brainsugar-hotel-booking/public/js/vendor/swiper-bundle.min.js')); 

                                     

                // Get page id for all the frontend pages.
                $pageId = get_the_ID(); 

                // Pages set by the user.
                $searchPage = Brainsugar()->options->get( 'Pages.search');
                $checkOutPage = Brainsugar()->options->get('Pages.check_out');

        if($pageId ==  $searchPage ){
                wp_register_script( "search", plugins_url(  '/brainsugar-hotel-booking/public/js/search.js'), array( "jquery" , "moment" , "swiper" , "bootstrap-bundle")); 
                wp_enqueue_script( 'search' );

                }
                else if($pageId == $checkOutPage) {
                        wp_register_script( "checkout", plugins_url(  '/brainsugar-hotel-booking/public/js/checkout.js'), array( "jquery" , "moment" , "swiper" , "bootstrap-bundle" , "validate")); 
                        wp_enqueue_script( 'checkout' );
                }

   wp_register_script( 'validate', plugins_url( '/brainsugar-hotel-booking/resources/assets/js/jquery.validate.js'), array( 'jquery' ) , false , true);
  

                
                wp_register_script( "cart", plugins_url(  '/brainsugar-hotel-booking/public/js/cart.js'), array( "jquery" , "moment" , "swiper" , "bootstrap-bundle")); 
        wp_enqueue_script( 'cart' );



}






}