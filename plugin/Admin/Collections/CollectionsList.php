<?php

namespace Brainsugar\Admin\Collections;
// use Alcohol\ISO4217;
// use League\ISO3166\ISO3166;

class CollectionsList {

	// HANDLED BY SHREYAS SO COMMENTED OUT. NOT REQUIRED ANYMORE, CAN BE DELETED
    // public static function GetCurrencies() {
	// 	$collection = collect(new ISO4217)->transform( function ($item, $key) {
	// 		return array_column($item, 'name', 'alpha3'); 
	// 	})->flatten()->all();

	// 	return $collection;
    // }
    // public static function GetCountries() {
	// 	$collection = collect(new ISO3166)->map( function ($item, $key) {
	// 		return $item['name'];
	// 	})->values()->all();
		
	// 	return $collection;
	// }
	// public static function GetPublishedPages() {
	// 	$pages = get_pages();
	// 	if ( ! empty( $pages ) ) {
	// 		$pages = wp_list_pluck( $pages, 'post_title', 'ID' );
	// 	}
		
	// 	return $pages;
	// }

	public static function bshb_get_service_operations() {
		$response = [
            'add_to_price'               	=> esc_html_x( 'Adds to Price', 'Service Operation', 'bshb' ),
            'add_to_price_per_night'     	=> esc_html_x( 'Adds to Price/Night', 'Service Operation', 'bshb' ),
            'add_percent_amount_to_total'	=> esc_html_x( 'Adds % of Amount to the Total', 'Service Operation', 'bshb' ),
		];

        return $response ;
	}

	public static function bshb_get_service_stock_availability() {
		$response = [
            'out_of_stock'   				=> esc_html_x( 'Out of Stock', 'Stock Availability', 'bshb' ),
            'in_stock'       				=> esc_html_x( 'In Stock', 'Stock Availability', 'bshb' ),
		];

        return $response ;
	}

	public static function bshb_get_beds() {
		$response = [
            'single_bed'   					=> esc_html__( 'Single bed', 'Beds', 'bshb' ),
			'queen_bed'       				=> esc_html__( 'Queen bed', 'Beds', 'bshb' ),
			'king_bed'   					=> esc_html__( 'King bed', 'Beds', 'bshb' ),
			'twin_bed'       				=> esc_html__( 'Twin bed', 'Beds', 'bshb' ),
			'super_king_bed'   				=> esc_html__( 'Super King bed', 'Beds', 'bshb' ),
			'futon_bed'       				=> esc_html__( 'Futon bed', 'Beds', 'bshb' ),
			'murphy_bed'   					=> esc_html__( 'Murphy bed', 'Beds', 'bshb' ),
			'sofa_bed'       				=> esc_html__( 'Sofa bed', 'Beds', 'bshb' ),
			'tatami_mats_bed'   			=> esc_html__( 'Tatami Mats bed', 'Beds', 'bshb' ),
            'run_of_the_house_bed'      	=> esc_html__( 'Run of the House', 'Beds', 'bshb' ),
            'dorm_bed'       				=> esc_html__( 'Dorm bed', 'Beds', 'bshb' ),
            'rollaway_bed'       			=> esc_html__( 'Roll-Away bed', 'Beds', 'bshb' ),
            'crib'       					=> esc_html__( 'Crib', 'Beds', 'bshb' ),
		];

        return $response ;
	}

	public static function bshb_get_salutations() {
		$response = [
            'mr'   							=> esc_html__( 'Mr.', 'Salutations', 'bshb' ),
			'ms'       						=> esc_html__( 'Ms.', 'Salutations', 'bshb' ),
			'mrs'   						=> esc_html__( 'Mrs.', 'Salutations', 'bshb' ),
			'miss'       					=> esc_html__( 'Miss', 'Salutations', 'bshb' ),
			'dr'   							=> esc_html__( 'Dr.', 'Salutations', 'bshb' ),
			'prof'       					=> esc_html__( 'Prof.', 'Salutations', 'bshb' ),
            'unspecified'       			=> esc_html__( 'Unspecified', 'Salutations', 'bshb' ),
		];

        return $response ;
	}

	public static function bshb_get_reservation_statuses() {
        $response = [
            'bshb-completed'  				=> esc_html_x( 'Completed', 'Reservation Status', 'bshb' ),
            'bshb-confirmed'  				=> esc_html_x( 'Confirmed', 'Reservation Status', 'bshb' ),
            'bshb-pending'    				=> esc_html_x( 'Pending', 'Reservation Status', 'bshb' ),
            'bshb-on-hold'    				=> esc_html_x( 'On Hold', 'Reservation Status', 'bshb' ),
            'bshb-cancelled'  				=> esc_html_x( 'Cancelled', 'Reservation Status', 'bshb' ),
            'bshb-refunded'   				=> esc_html_x( 'Refunded', 'Reservation Status', 'bshb' ),
			'bshb-failed'     				=> esc_html_x( 'Failed', 'Reservation Status', 'bshb' ),
		];

        return $response ;
	}
	
	public static function bshb_get_eta_hours() {
        $response = [
            '-1'  							=> 'I do not know',
            '0'  							=> '00:00 - 01:00',
            '1'  							=> '01:00 - 02:00',
            '2'  							=> '02:00 - 03:00',
            '3'  							=> '03:00 - 04:00',
            '4'  							=> '04:00 - 05:00',
            '5'  							=> '05:00 - 06:00',
            '6'  							=> '06:00 - 07:00',
            '7'  							=> '07:00 - 08:00',
            '8'  							=> '08:00 - 09:00',
            '9'  							=> '09:00 - 10:00',
            '10' 							=> '10:00 - 11:00',
            '11' 							=> '11:00 - 12:00',
            '12' 							=> '12:00 - 13:00',
            '13' 							=> '13:00 - 14:00',
            '14' 							=> '14:00 - 15:00',
            '15' 							=> '15:00 - 16:00',
            '16' 							=> '16:00 - 17:00',
            '17' 							=> '17:00 - 18:00',
            '18' 							=> '18:00 - 19:00',
            '19' 							=> '19:00 - 20:00',
            '20' 							=> '20:00 - 21:00',
            '21' 							=> '21:00 - 22:00',
            '22' 							=> '22:00 - 23:00',
            '23' 							=> '23:00 - 00:00',
		];
		
        return $response ;
	}
}