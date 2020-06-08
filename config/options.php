<?php

/*
|--------------------------------------------------------------------------
| Plugin options
|--------------------------------------------------------------------------
|
| Here is where you can insert the options model of your plugin.
| These options model will store in WordPress options table
| (usually wp_options).
| You'll get these options by using `$plugin->options` property
|
*/

return [
        
        'version' => '1.0',
        'General' => [
                'hotel' => [
                        'name' => '',
                        'address_line_1' => '',
                        'address_line_2' => '',
                        'city' => '',
                        'country' => '',
                        'postcode' => '',
                        'phone' => '',
                        'email' => '',
                        
                ],                
                'currency' => [
                        'code' => '',
                        'name' => '',                        
                        'symbol' => '',
                        'symbol_position' => 'before',
                        'decimals' => '2',
                        'decimal_separator' => '.',
                        'thousands_separator' => ',',
                ],
        ],
        'Room' => [
                'display' => [
                        'display_amenities' => 'true',
                        'display_policies' => 'true',
                        'sorting' => 'ascending',
                ],
                'max_rooms' => '8',
        ],
];
//    'Form'          => [
        //         'reservation_mode'                  => 'single',
        //         'children_bookable'                 => true,
        //         'form_style'                        => 'horizontal',
        //         'max_adults'                        => '10',
        //         'max_children'                      => '10',
        //     ],
        //     'Unit'          => [
                //         'measurement_unit'                  => 'feet'
                //     ],
                //     'Page'          => [
                        //         'availabilityresults_page'          => '',
                        //         'checkout_page'                     => '',
                        //         'termsandconditions_page'           => '',
                        //     ],
                        //     'Currency'      => [
                                //         'currency'                          => '',
                                //         'currency_symbol_position'          => 'left',
                                //     ],
                                //     'Hotel'         => [
                                        //         'name_of_the_hotel'                 => 'Narg',
                                        //         'check_in_time'                     => '12:00',
                                        //         'check_out_time'                    => '11:00',
                                        //         'star_rating'                       => 'One',
                                        //         'address_line_1'                    => '',
                                        //         'address_line_2'                    => '',
                                        //         'city'                              => '',
                                        //         'country'                           => '',
                                        //         'postcode'                          => '',
                                        //         'phone'                             => '',
                                        //     ],
                                        //     'Availability'  => [
                                                //         'minimum_nights'                    => '1',
                                                //         'maximum_nights'                    => '50',
                                                //         'limit_available_days_from_today'   => '',
                                                //         'disabled_dates'                    => '',
                                                //     ],   
                                                //     'SearchForm'    => [
                                                        //         'display_search_form'               => true,
                                                        //         'display_filter_form'               => true,
                                                        //         'price_displayed_on_search'         => true,
                                                        //     ],
                                                        //     'CSS'           => [
                                                                //         'custom_css'           => '',
                                                                //     ],
                                                                //     'Tax'           => [
                                                                        //         'enable_tax'                        => true,
                                                                        //         'tax_rate_model'                    => 'one',
                                                                        //         'price_includes_tax'                => 'separate',
                                                                        //     ],
                                                                        // ];