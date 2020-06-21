<?php
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


// // Register Global Scripts
// function registerGlobalAdminScripts(){
//         if ( is_admin() ) {
//                 // Register Bootstrap JS 
//                 wp_register_script( 'bootstrap-bundle', plugin_dir_url( __FILE__ ) . "public/js/bootstrap.bundle.js", array( "jquery" ));
//                 // Sortable JS vendor script
//                 wp_register_script( "sortable", plugin_dir_url( __FILE__ ) . "/public/js/vendor/Sortable.js", array( "jquery")); 
//                 // Register Scripts for generating room fields in CMB2
//                 wp_register_script( "generate-room", plugin_dir_url( __FILE__ ) . "/public/js/generate-room.js", array( "jquery", "bootstrap-bundle" , "sortable"), Brainsugar()->Version , true);


//         }
// }
// add_action( "admin_enqueue_scripts", "registerGlobalAdminScripts");


// // CMB2 Field Scripts
// function generateRoomScripts($hook) {
//         global $post_type;        
//         if($hook === "post.php" && $post_type === "bshb_room") {
//                 //Script for AJAx calls and sortable declarations. 
//                   wp_enqueue_script( "generate-room");
//         }
// }
// add_action( "admin_enqueue_scripts", "generateRoomScripts" );

// function calendarScripts($hook) {
//         $screen = get_current_screen()->id;
//         if($hook === "admin.php" ){
//                 if($screen === "brainsugar-hotel-booking_page_brainsugar_calendar") {
//                         wp_enqueue_script("availability-calendar");
//                 }
//                 else if($screen === "toplevel_page_room_calendar"){
//                         wp_enqueue_script( 'room-calendar' );
//                 }
//                 else if($screen === "toplevel_page_brainsugar_dashboard") {
//                  wp_enqueue_script( 'dashboard-calendar' );
//                 }
//                 else if($screen === "brainsugar-hotel-booking_page_brainsugar_pricing") {
//                  wp_enqueue_script( 'pricing-calendar' );
//                 }
//                 // else if($screen === )
//                 wp_enqueue_script( 'room-pricing' );
                
                
//         }

// }
// add_action("admin_enqueue_scripts" , "calendarScripts");


// function setupPluginScripts() {
        
       
      


//         //     Ajax Calls
  
        
//         wp_enqueue_style( 'brainsugar-css', plugins_url( '/brainsugar-hotel-booking/public/css/brainsugar.css'), array());
//         wp_enqueue_style( 'brainsugar-css' );     
        
        
        
//         wp_register_script( 'moment', plugins_url( '/brainsugar-hotel-booking/resources/assets/js/moment.js'), array( 'jquery' ));
//         wp_enqueue_script( 'moment' );
        
        
//         //     Wp alternative for underscore JS

//         wp_register_script('availability-calendar',plugins_url( '/brainsugar-hotel-booking/public/js/availability-calendar.js'), array( 'jquery' , 'clndr' ));
//         // wp_enqueue_script( 'availability-calendar' );

        
//         wp_register_script('room-calendar',plugins_url( '/brainsugar-hotel-booking/public/js/room-calendar.js'), array( 'jquery' ));
//         // wp_enqueue_script( 'room-calendar' );
        

//         wp_register_script('dashboard-calendar',plugins_url( '/brainsugar-hotel-booking/public/js/dashboard-calendar.js' ), array( 'jquery' ));
       
       
//         wp_register_script('pricing-calendar',plugins_url( '/brainsugar-hotel-booking/public/js/pricing-calendar.js'), array( 'jquery' ));

//         wp_register_script('room-pricing',plugins_url( '/brainsugar-hotel-booking/public/js/room-pricing.js'), array( 'jquery' ));
        
        
// }
// add_action( 'admin_enqueue_scripts', 'setupPluginScripts' ); 

// function footerScripts () {


        
//         // Wordpress Util functions. Required for Underscore Templating in Calendar.
//         wp_enqueue_script( 'wp-util' );
                        
//         wp_register_script( 'clndr', plugins_url( '/brainsugar-hotel-booking/resources/assets/js/clndr.js'), array( 'jquery' , 'moment' ) , false , true);
//         wp_enqueue_script( 'clndr' );

// }
// add_action('admin_footer' , 'footerScripts');
