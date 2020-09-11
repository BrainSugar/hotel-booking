<?php
namespace Brainsugar\Admin\Columns;

use Brainsugar\CustomPostTypes\TaxCustomPostType;

class TaxColumns extends ManageColumns {
	protected $postType;
    protected $prefix;
	
	public function __construct() {
		$postType = TaxCustomPostType::getPostType();

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
		
		unset( $existing_columns['comments'], $existing_columns['date'] );
		
		$columns               		= array();
		$columns['tax_percentage']  = esc_html__( 'Tax Percentage', 'bshb-td' );
		$columns['tax_order']  		= esc_html__( 'Order', 'bshb-td' );

		return array_merge( $existing_columns, $columns );
	}
	
	public function bshb_render_metabox_columns( $column ) {
		global $post;
		
		switch( $column ){
			case 'tax_percentage':
				$tax_percentage = get_post_meta( $post->ID, "_{$this->prefix}_tax_percentage", true );
                echo $tax_percentage ;
			break;
			
			case 'tax_order':
				$tax_order = get_post_meta( $post->ID, "_{$this->prefix}_tax_order", true );
                echo $tax_order == ''? '0' : $tax_order ;
            break;
		}
	}
}