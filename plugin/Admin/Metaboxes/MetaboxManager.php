<?php
namespace Brainsugar\Admin\Metaboxes;

if ( !class_exists( 'MetaboxManager' ) ) {
	abstract class MetaboxManager {
		protected $post_type;
        protected $prefix = 'bshb';
        
        public function __construct( $post_type ) {
            $this->post_type = $post_type;
            $this->register_hooks( $post_type );
        }

		public function register_hooks( $post_type ){
			add_action( 'cmb2_init', array( $this, "register_fields" ) );
			add_action( 'admin_head-post.php', array( $this, "hide_publishing_actions" ) );
			add_action( 'admin_head-post-new.php', array( $this, "hide_publishing_actions" ) );
		}

        public function hide_publishing_actions() {
            echo 
            '<style type="text/css">
                #misc-publishing-actions,
                #minor-publishing-actions {
                    display:none;
                }
            </style>';
        }
	}
}
