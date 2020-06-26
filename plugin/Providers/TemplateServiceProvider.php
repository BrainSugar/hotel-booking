<?php

namespace Brainsugar\Providers;

use Brainsugar\WPBones\Support\ServiceProvider;

class TemplateServiceProvider extends ServiceProvider
{
        
        public function register()
        {                
                add_action( 'template_include', array($this ,'loadTemplate' ) , 10, 5 );
                
                //   Register all the template functions for the frontend
                include( plugin_dir_path( __DIR__ ) .  'Core/TemplateFunctions.php');
                
        }
        
        /**
        * Loads the Template
        * 
        * Check which is the current page and call the template.
        *
        * @param [type] $template
        * @return void
        */
        public function loadTemplate($template){
                $postId = get_post_type( );
                
                // For all other CPT
                if ( $postId != 'bshb_room' ) {
                        return $template;
                }
                
                // Else use custom template
                if ( is_single() ) { 
                        return $this->getTemplate( 'single-room-type' );
                }
                
                
        }
        
        /**
        * getTemplate
        * 
        * Checks the Theme folder for the template , if not found loads the plugin template.
        *
        * @param [type] $template
        * @return void
        */

        function getTemplate( $template ) {
                
                // Get the template slug
                $template_slug = rtrim( $template, '.php' );
                $template = $template_slug . '.php';
                
                // Check if a custom template exists in the theme folder, if not, load the plugin template file
                if ( $theme_file = locate_template( array( 'bshb-template/' . $template ) ) ) {
                        $file = $theme_file;            
                }
                
                else {
                        $file = BSHB_BASE_PATH . 'templates/' . $template;
                }
                
                return $file;
        }

        
        
        
        
        
        
        
        
}