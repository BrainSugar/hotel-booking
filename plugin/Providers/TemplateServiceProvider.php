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

        $postId = get_the_ID();
        var_dump($postId);
        // For all other CPT
    if ( get_post_type( $postId ) != 'room_type' ) {
        return $template;
    }
 
    // Else use custom template
    if ( is_single() ) {
        return templateHierarchy( 'single' );
    }

          
          
  }






  
}