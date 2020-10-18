<?php
namespace Brainsugar\Admin\Columns;

use Brainsugar\Admin\Collections\CollectionsRepository;

if ( !class_exists( 'ServiceColumns' ) ) {
	class ServiceColumns extends ColumnManager implements RenderColumnsInterface {
		public function list_columns( $existing_columns ) {
			if ( empty( $existing_columns ) && ! is_array( $existing_columns ) ) {
				$existing_columns = array();
			}
			
			unset( $existing_columns['comments'],  $existing_columns['date'] );
			
			$columns               			 = array();
			$columns['service_operation']    = esc_html__( 'Operation', 'bshb-td' );
			$columns['service_amount']    	 = esc_html__( 'Amount', 'bshb-td' );
			$columns['service_availability'] = esc_html__( 'Availability', 'bshb-td' );
			$columns['service_image']   	 = esc_html__( 'Image', 'bshb-td' );

			return array_merge( $existing_columns, $columns );
		}
		
		public function render_columns( $column ) {
			global $post;

			switch( $column ){
				case 'service_operation':
					$key = get_post_meta( $post->ID, "_{$this->prefix}_service_operation", true );
					$service_operation = array_get( CollectionsRepository::get_service_operations(), $key );
					echo $service_operation ;
				break;

				case 'service_amount':
					$service_amount = get_post_meta( $post->ID, "_{$this->prefix}_service_amount", true );
					echo $service_amount ;
				break;

				case 'service_availability':
					$key = get_post_meta( $post->ID, "_{$this->prefix}_service_availability", true );
					$service_availability = array_get( CollectionsRepository::get_service_availability(), $key );
					echo $service_availability ;
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
}
