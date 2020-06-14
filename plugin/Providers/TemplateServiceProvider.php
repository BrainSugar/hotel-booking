<?php

namespace Brainsugar\Providers;

use Brainsugar\WPBones\Support\ServiceProvider;

class TemplateServiceProvider extends ServiceProvider
{
        
        public function register()
        {
                add_filter( 'template_include', array($this ,'templateChooser' ) , 10, 5 );
        }
        
        public function templateChooser($template){
                
                $postId = get_post_type( );
                
                // For all other CPT
                if ( $postId != 'bshb_room' ) {
                        return $template;
                }
               
                // Else use custom template
                if ( is_single() ) {
                        return $this->templateHierarchy( 'single' );
                }
                
                
        }
        /**
        * Get the custom template if is set
        *
        * @since 1.0
        */
        
        function templateHierarchy( $template ) {
        
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