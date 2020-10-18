<?php
namespace Brainsugar\Admin\Columns;

if ( !class_exists( 'ColumnManager' ) ) {
	abstract class ColumnManager {
		protected $post_type;
		protected $prefix = 'bshb';

		public function __construct( $post_type ) {
			$this->post_type = $post_type;
			$this->register_hooks( $post_type );
		}
		
		public function register_hooks( $post_type ){
			add_filter( "manage_{$post_type}_posts_columns", array( $this, "list_columns" ) );
			add_filter( "manage_{$post_type}_posts_custom_column", array( $this, "render_columns" ) );
		}
	}
}
