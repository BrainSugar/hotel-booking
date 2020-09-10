<?php
namespace Brainsugar\Admin\Columns;

use Brainsugar\CustomPostTypes\TaxCustomPostType;

class TaxColumns extends ManageColumns {
	/**
	* The post type id.
	*
	* @var [string]
	*/
	protected $postType;
	
	public function __construct() {
		$postType = TaxCustomPostType::getPostType();

		$this->postType = $postType;
		$this->bshb_register_actions_and_filters();
	}
	
	public function bshb_register_actions_and_filters() {
		add_filter( "manage_{$this->postType}_posts_columns", array( $this, "bshb_list_metabox_columns" ) );
		add_filter( "manage_{$this->postType}_posts_custom_column", array( $this, "bshb_render_metabox_columns" ) );
	}
	
	public function bshb_list_metabox_columns( $existing_columns ) {
		if ( empty( $existing_columns ) && ! is_array( $existing_columns ) ) {
			$existing_columns = array();
		}
		
		unset( $existing_columns['comments'], $existing_columns['date'] );
		
		$columns               			= array();
		$columns['tax_percentage']   	= esc_html__( 'Tax Percentage', 'bshb' );

		return array_merge( $existing_columns, $columns );
	}
	
	public function bshb_render_metabox_columns( $column ) {
		global $post;
		
		switch( $column ){
			case 'tax_percentage':
				$tax_percentage = get_post_meta( $post->ID, '_bshb_tax_percentage', true );
                echo $tax_percentage ;
            break;
		}
	}
}