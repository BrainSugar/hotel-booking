<?php
namespace Brainsugar\Admin\Columns;

use Brainsugar\CustomPostTypes\ReservationCustomPostType;
use Brainsugar\Model\Reservation;

class ReservationColumns extends ManageColumns{
	/**
	* The post type id.
	*
	* @var [string]
	*/
	protected $postType;
	
	public function __construct(){         
		$postType = ReservationCustomPostType::getPostType();
		
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
		
		unset( $existing_columns['comments'], $existing_columns['title'], $existing_columns['date'] );
		
		$columns               	= [];
		$columns['reference']   = esc_html__( 'Reference', 'bshb' );
		$columns['status']   	= esc_html__( 'Status', 'bshb' );
		$columns['nights']    	= esc_html__( 'Nights', 'bshb' );
		$columns['check_in']    = esc_html__( 'Check In', 'bshb' );
		$columns['check_out']   = esc_html__( 'Check Out', 'bshb' );
		$columns['summary']   	= esc_html__( 'Summary', 'bshb' );
		$columns['total']   	= esc_html__( 'Total', 'bshb' );
		$columns['paid']   		= esc_html__( 'Paid', 'bshb' );
		$columns['date']   		= esc_html__( 'Date', 'bshb' );

		return array_merge( $existing_columns, $columns );
	}
	
	/**
	* Ouput custom columns for reservations.
	*/
	public function bshb_render_metabox_columns( $column ) {
		global $post;

		$reservation_model = new Reservation;
		
		switch( $column ){
			case 'reference':
				echo $reservation_model->get_reservation_reference( $post->ID );
			break;

			case 'status':
				echo $reservation_model->get_reservation_status( $post->ID );
			break;

			case 'nights':
				echo $reservation_model->get_reserved_nights_count( $post->ID );
			break;

			case 'check_in':
				echo $reservation_model->get_reservation_check_in_date( $post->ID );
			break;

			case 'check_out':
				echo $reservation_model->get_reservation_check_out_date( $post->ID );
			break;

			case 'summary':
				
			break;	

			case 'total':
				
			break;

			case 'paid':
				echo '0';
			break;
		}
	}
}