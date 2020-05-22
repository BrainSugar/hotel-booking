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
    'max_rooms' => '5',
    'option_2' => 'true',
    'option_3' => [
      'sub_option_of_3' => 'Hello'
    ],
    'option_4' => 'to delete'
  ],

  'Special' => [
    'Name' => 'James Kirk'
  ]
];