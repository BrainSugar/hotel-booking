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
                
                // Get post type for cpt pages
                $postId = get_post_type();
                
                // Get page id for all the frontend pages.
                $pageId = get_the_ID(); 

                // Pages set by the user.
                $searchPage = Brainsugar()->options->get( 'Pages.search');
                
                // If is page then return page templates or return default.
                if( is_page() ){
                        if ($pageId == $searchPage) {                        
                                return $this->getTemplate( 'search-page' );
                        }
                        else {
                                return $template;
                        }
                } 
                
                // If is single display templates for Cpt's.
                if ( is_single() ) {
                        if ( $postId == 'bshb_room' ) {
                                return $this->getTemplate( 'single-room-type' );
                        }
                        else {
                                return $template;
                        }
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