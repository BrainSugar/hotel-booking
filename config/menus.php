<?php

/*
|--------------------------------------------------------------------------
| Plugin Menus routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the menu routes for a plugin.
| In this context, the route are the menu link.
|
*/

return [      
    'brainsugar_dashboard' => [
        "menu_title" => "Brainsugar Hotel Booking",
        'capability' => 'read',
        'icon' => 'dashicons-lightbulb',
        'items' => [
                'dashboard' =>[
                        "menu_title" => "Dashboard",
                        'route' => [
                                'get' => 'Dashboard\DashboardController@placeholder',
                        ]
                ],                
                'calendar' => [
                        "menu_title" => "Calendar",
                        'route' => [
                        'get' => 'Calendar\CalendarController@availabilityCalendar',
                        ]
                ],
                 'pricing' => [
                        "menu_title" => "Pricing",
                        'route' => [
                        'get' => 'Calendar\CalendarController@pricingCalendar',
                        ]
                ],
  
        //     [
        //         "menu_title" => "Reservation Calendar",
        //         'route' => [
        //             'get' => 'Calendar\CalendarController@reservationCalendar',
        //         ],
        //     ],
        //     'options_submenu' => [
        //         "menu_title" => "Options",
        //         'route' => [
        //             'get' => 'Dashboard\DashboardController@optionsMenu',
        //         ],

        //     ],
        //     [
        //         "menu_title" => "Options View",
        //         'route' => [
        //             'get' => 'Dashboard\DashboardController@optionsView',
        //             'post' => 'Dashboard\DashboardController@saveOptions',
        //         ],
        //     ],
        //     [
        //         "menu_title" => "Options View Resource",
        //         'route' => [
        //             'load' => 'Dashboard\DashboardResourceController@load',
        //             'resource' => 'Dashboard\DashboardResourceController',
        //         ],
        //     ],
        //     [
        //         "menu_title" => "Html Tags",
        //         'route' => [
        //             'get' => 'Dashboard\DashboardController@html',
        //         ],
        //     ],
        //     [
        //         "menu_title" => "Official Packages",
        //         'route' => [
        //             'get' => 'Dashboard\DashboardController@package',
        //             'post' => 'Dashboard\DashboardController@packagePost',
        //         ],
        //     ],
        //     [
        //         "menu_title" => "Tables Example #1",
        //         'route' => [
        //             'load' => 'ExampleTableController@load',
        //             'get' => 'ExampleTableController@index',
        //         ],
        //     ],
        //     [
        //         "menu_title" => "Tables Example #2",
        //         'route' => [
        //             'load' => 'ExampleTableController@loadFluentExample',
        //             'get' => 'ExampleTableController@indexFluentExample',
        //         ],
        //     ],
        //     [
        //         "menu_title" => "Tables Example #3",
        //         'route' => [
        //             'load' => 'ExampleTableController@loadSearchExample',
        //             'get' => 'ExampleTableController@indexSearchExample',
        //         ],
        //     ],
        //     [
        //         "menu_title" => "User Agent",
        //         'route' => [
        //             'get' => 'ExampleUserAgentController@index',
        //         ],
        //     ],
        //     [
        //         "menu_title" => "Database",
        //         'route' => [
        //             'get' => 'ExampleDatabaseController@index',
        //         ],
        //     ],
        ],
    ],
];
