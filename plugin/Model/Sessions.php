<?php

namespace Brainsugar\Model;
use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
        /**
        * The table associated with the model.
        *
        * @var string
        */
        protected $table = 'bshb_sessions';
        
        
        /**
        * Fillable attributes for the table,
        *
        * @var array
        */
        protected $fillable = [ 'session_key', 'session_value', 'cart_id' , 'session_expiry'];
        
        /**
        * Disable Timestamps
        *
        * @var boolean
        */
        public $timestamps = false;        
        
        /**
        * Get the table associated with the model.
        *
        * @return string
        */
        public function getTable()
        {
                global $wpdb;
                
                return $wpdb->prefix . preg_replace('/[[:<:]]' . $wpdb->prefix . '/', '', parent::getTable(), 1);
        }
        
        public function startSession() {
                if(!session_id()) {
                        session_start();                       
                }                
        }
        
        public function initializeSessionKey() {                
                if(isset($_SESSION['bshb_session_key'])){
                        return;
                }
                else {
                          $_SESSION['bshb_session_key'] = $this->generateSessionKey();                       
                }
        }
        
        public function setSessionValue($checkIn , $checkOut , $adults , $children) {               
                $searchData = array(
                        'check_in' => $checkIn , 
                        'check_out' => $checkOut ,
                        'adults' => $adults ,
                        'children' => $children
                );
                $sessionValue = serialize($searchData);
                         
                $_SESSION['bshb_session_value'] = $sessionValue;
        }
        
        
        public function generateSessionKey() {
                if ( is_user_logged_in() ) {
                        return \get_current_user();                        
                } else {
                        require_once( ABSPATH . 'wp-includes/class-phpass.php');
                        $hasher = new \PasswordHash( 8, false );
                        return md5( $hasher->get_random_bytes( 32 ) );
                }
        }
        
        
        
        public function unsetSessionKey() {
                unset($_SESSION['bshb_session_key']);
                
        }

        public function destroySession() {
                session_destroy();
        }
        
        
        public function createUserSession($sessionKey , $sessionValue) {
                
                $sessionExpiry = 60;
                
                
                $this->fill(array(
                        'session_key' => $sessionKey , 
                        'session_value' => $sessionValue,
                        'session_expiry' =>$sessionExpiry
                )); 
                
        }
        
        public function getSession($sessionKey) {
                $sessionId = $this->select('id')
                ->where('session_key' , $sessionKey)
                ->first()->id;
                
                return $sessionId;
        }
        
        public function deleteUserSession() {
                
        }
        
}