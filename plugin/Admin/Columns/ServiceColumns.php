<?php
namespace Brainsugar\Admin\Columns;

use Brainsugar\CustomPostTypes\ServiceCustomPostType;
use Brainsugar\Admin\Collections\CollectionsList;

class ServiceColumns extends ManageColumns {
	protected $postType;
    protected $prefix;
	
	public function __construct() {
		$postType = ServiceCustomPostType::getPostType();

		$this->postType = $postType;
        $this->prefix = 'bshb';

		$this->bshb_register_hooks();
	}
	
	public function bshb_register_hooks() {
		add_filter( "manage_{$this->postType}_posts_columns", array( $this, "{$this->prefix}_list_metabox_columns" ) );
		add_filter( "manage_{$this->postType}_posts_custom_column", array( $this, "{$this->prefix}_render_metabox_columns" ) );
	}
	
	public function bshb_list_metabox_columns( $existing_columns ) {
		if ( empty( $existing_columns ) && ! is_array( $existing_columns ) ) {
			$existing_columns = array();
		}
		
		unset( $existing_columns['comments'],  $existing_columns['date'] );
		
		$columns               				= array();
		$columns['service_operation']   	= esc_html__( 'Operation', 'bshb-td' );
		$columns['service_amount']    		= esc_html__( 'Amount', 'bshb-td' );
		$columns['service_image']   		= esc_html__( 'Image', 'bshb-td' );

		return array_merge( $existing_columns, $columns );
	}
	
	public function bshb_render_metabox_columns( $column ) {
		global $post;

		switch( $column ){
			case 'service_operation':
				$key = get_post_meta( $post->ID, "_{$this->prefix}_service_operation", true );
				$service_operation = array_get( CollectionsList::bshb_get_service_operations(), $key );
                echo $service_operation ;
			break;

			case 'service_amount':
				$service_amount = get_post_meta( $post->ID, "_{$this->prefix}_service_amount", true );
                echo $service_amount ;
			break;

			case 'service_image':
				if ( has_post_thumbnail() ) {
					$featured_image = the_post_thumbnail( array(40, 40) );
					echo $featured_image;
				}
			break;
		}
	}
}