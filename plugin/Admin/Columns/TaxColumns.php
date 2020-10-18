<?php
namespace Brainsugar\Admin\Columns;

if ( !class_exists( 'TaxColumns' ) ) {
	class TaxColumns extends ColumnManager implements RenderColumnsInterface {
		public function list_columns( $existing_columns ) {
			if ( empty( $existing_columns ) && ! is_array( $existing_columns ) ) {
				$existing_columns = array();
			}
			
			unset( $existing_columns['comments'], $existing_columns['date'] );
			
			$columns               		= array();
			$columns['tax_percentage']  = esc_html__( 'Tax Percentage', 'bshb-td' );
			$columns['tax_order']  		= esc_html__( 'Order', 'bshb-td' );

			return array_merge( $existing_columns, $columns );
		}
		
		public function render_columns( $column ) {
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
}
