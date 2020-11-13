<?php

namespace Brainsugar\Providers;

use Brainsugar\WPBones\Support\ServiceProvider;
use Brainsugar\Model\ReservationCart;
use Brainsugar\Model\Sessions;


class SessionServiceProvider extends ServiceProvider
{ 
        
        public function register()
        {  
              
                        $this->initializeSession();
           
                
                // add_action('init' , array($this , 'initializeSession') , 1);
                add_action('wp_logout', array($this ,'resetSessionKey') , 1);
                add_action('wp_login', array($this,'resetSessionKey') , 1);
        }

        public function initializeSession() {
                $sessions = new Sessions;
                // $session->startSession();
                // $session->initializeSessionKey();
        }

        public function resetSessionKey() {
                $session = new Sessions;

                $session->unsetSessionKey();
                // $session->destroySession();              
        }

}