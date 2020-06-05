<?php 
namespace Brainsugar\Core;

class CoreFunctions {

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
}
