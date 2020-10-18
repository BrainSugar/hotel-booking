<?php

namespace Brainsugar\Admin\Collections;

if ( !class_exists( 'CollectionsRepository' ) ) {
    class CollectionsRepository {
        public static function get_service_operations() {
            $response = [
                'add_to_price'                  => esc_html_x( 'Adds to Price', 'Service Operation', 'bshb-td' ),
                'add_to_price_per_night'        => esc_html_x( 'Adds to Price/Night', 'Service Operation', 'bshb-td' ),
                'add_percent_amount_to_total'   => esc_html_x( 'Adds % of Amount to the Total', 'Service Operation', 'bshb-td' ),
            ];

            return $response ;
        }

        public static function get_service_availability() {
            $response = [
                'in_stock'      => esc_html_x( 'In Stock', 'Stock Availability', 'bshb-td' ),
                'out_of_stock'  => esc_html_x( 'Out of Stock', 'Stock Availability', 'bshb-td' )
            ];

            return $response ;
        }
        
        public static function get_beds() {
            $response = [
                'single_bed'   			=> esc_html__( 'Single bed', 'Beds', 'bshb-td' ),
                'queen_bed'       		=> esc_html__( 'Queen bed', 'Beds', 'bshb-td' ),
                'king_bed'   			=> esc_html__( 'King bed', 'Beds', 'bshb-td' ),
                'twin_bed'       		=> esc_html__( 'Twin bed', 'Beds', 'bshb-td' ),
                'super_king_bed'   		=> esc_html__( 'Super King bed', 'Beds', 'bshb-td' ),
                'futon_bed'       		=> esc_html__( 'Futon bed', 'Beds', 'bshb-td' ),
                'murphy_bed'   			=> esc_html__( 'Murphy bed', 'Beds', 'bshb-td' ),
                'sofa_bed'       		=> esc_html__( 'Sofa bed', 'Beds', 'bshb-td' ),
                'tatami_mats_bed'   	=> esc_html__( 'Tatami Mats bed', 'Beds', 'bshb-td' ),
                'run_of_the_house_bed'  => esc_html__( 'Run of the House', 'Beds', 'bshb-td' ),
                'dorm_bed'       		=> esc_html__( 'Dorm bed', 'Beds', 'bshb-td' ),
                'rollaway_bed'       	=> esc_html__( 'Roll-Away bed', 'Beds', 'bshb-td' ),
                'crib'       			=> esc_html__( 'Crib', 'Beds', 'bshb-td' ),
            ];

            return $response ;
        }

        public static function get_salutations() {
            $response = [
                'mr'   			=> esc_html__( 'Mr.', 'Salutations', 'bshb-td' ),
                'ms'       	    => esc_html__( 'Ms.', 'Salutations', 'bshb-td' ),
                'mrs'   		=> esc_html__( 'Mrs.', 'Salutations', 'bshb-td' ),
                'miss'       	=> esc_html__( 'Miss', 'Salutations', 'bshb-td' ),
                'dr'   			=> esc_html__( 'Dr.', 'Salutations', 'bshb-td' ),
                'prof'          => esc_html__( 'Prof.', 'Salutations', 'bshb-td' ),
                'unspecified'   => esc_html__( 'Unspecified', 'Salutations', 'bshb-td' ),
            ];

            return $response ;
        }

        public static function get_reservation_statuses() {
            $response = [
                'bshb-completed'  	=> esc_html_x( 'Completed', 'Reservation Status', 'bshb-td' ),
                'bshb-confirmed'  	=> esc_html_x( 'Confirmed', 'Reservation Status', 'bshb-td' ),
                'bshb-pending'    	=> esc_html_x( 'Pending', 'Reservation Status', 'bshb-td' ),
                'bshb-on-hold'    	=> esc_html_x( 'On Hold', 'Reservation Status', 'bshb-td' ),
                'bshb-cancelled'  	=> esc_html_x( 'Cancelled', 'Reservation Status', 'bshb-td' ),
                'bshb-refunded'   	=> esc_html_x( 'Refunded', 'Reservation Status', 'bshb-td' ),
                'bshb-failed'     	=> esc_html_x( 'Failed', 'Reservation Status', 'bshb-td' ),
            ];

            return $response ;
        }
        
        public static function get_eta_hours() {
            $response = [
                '-1'  	=> 'I do not know',
                '0'  	=> '00:00 - 01:00',
                '1'  	=> '01:00 - 02:00',
                '2'  	=> '02:00 - 03:00',
                '3'  	=> '03:00 - 04:00',
                '4'  	=> '04:00 - 05:00',
                '5'  	=> '05:00 - 06:00',
                '6'  	=> '06:00 - 07:00',
                '7'  	=> '07:00 - 08:00',
                '8'  	=> '08:00 - 09:00',
                '9'  	=> '09:00 - 10:00',
                '10' 	=> '10:00 - 11:00',
                '11' 	=> '11:00 - 12:00',
                '12' 	=> '12:00 - 13:00',
                '13' 	=> '13:00 - 14:00',
                '14' 	=> '14:00 - 15:00',
                '15' 	=> '15:00 - 16:00',
                '16' 	=> '16:00 - 17:00',
                '17' 	=> '17:00 - 18:00',
                '18' 	=> '18:00 - 19:00',
                '19' 	=> '19:00 - 20:00',
                '20' 	=> '20:00 - 21:00',
                '21' 	=> '21:00 - 22:00',
                '22' 	=> '22:00 - 23:00',
                '23' 	=> '23:00 - 00:00',
            ];
            
            return $response ;
        }
    }
}
