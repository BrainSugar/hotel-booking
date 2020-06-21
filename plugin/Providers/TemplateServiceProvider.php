<?php

namespace Brainsugar\Providers;

use Brainsugar\WPBones\Support\ServiceProvider;
use Brainsugar\Core\TemplateLoader;

class TemplateServiceProvider extends ServiceProvider
{
        
        public function register()
        {
                  add_action( 'template_include', array($this ,'templateManager' ) , 10, 5 );
        }
       

        public function templateManager($template) {
                $templateLoader = new TemplateLoader;
                $postId = get_post_type( );
                $getTemplate = $templateLoader->templateRender('double');
                var_dump($getTemplate);
                return $getTemplate;
        }

        
}