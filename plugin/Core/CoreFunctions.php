<?php 
namespace Brainsugar\Core;

class CoreFunctions {
        
        /**
        * Format Currency from specified options.
        *
        * @param [float] $value
        * @return void
        */
        public static function formatCurrency($value) {                
                $symbol = Brainsugar()->options->get( 'General.currency.symbol' ); 
                $symbolPosition =  Brainsugar()->options->get( 'General.currency.symbol_position' ); 
                $decimals = Brainsugar()->options->get( 'General.currency.decimals' ); 
                $decimalSeparator = Brainsugar()->options->get( 'General.currency.decimal_separator' ); 
                $thousandsSeparator = Brainsugar()->options->get( 'General.currency.thousands_separator'); 
                $format = number_format($value,$decimals,$decimalSeparator,$thousandsSeparator);
                
                if($symbolPosition == 'before'){
                        $result = $symbol . ' ' . $format;
                }
                else if($symbolPosition == 'after'){
                        $result = $format . ' ' . $symbol;
                }
                else {
                        $result = $format;
                }
                return $result;
        }
        
        /**
        * Get column and sort order from options
        *
        * @return Array
        */
        public static function getRoomSorting() {
                
                $roomSort = Brainsugar()->options->get( 'Room.display.sorting' ); 
                
                switch($roomSort ) {
                        case  'manual' : 
                                $column = 'order';
                                $order = 'asc';
                        break;
                        case 'alphabetical' :
                                $column = 'name';
                                $order = 'asc';
                        break;
                        case 'ascending' :
                                $column = 'id';
                                $order = 'asc';
                        break;
                        case 'descending' :
                                $column = 'id';
                                $order = 'desc';
                        break;
                }
                $response = (array) [
                        'column' => $column,
                        'order' => $order,
                ];
                return $response;
                
        }
}
