<?php

namespace Brainsugar\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
Use Carbon\Carbon;

class Pricing extends Model
{
        /**
        * The table associated with the model.
        *
        * @var string
        */
        protected $table = 'bshb_pricing';
        
        /**
        * Primary Key
        *
        * @var string
        */       
        protected $primaryKey = "id";
        
        /**
        * Fillable attributes for the table,
        *
        * @var array
        */
        protected $fillable = [ 'room_type', 'price', 'start_date' , 'end_date'];
        
        /**
        * Disable Timestamps
        *
        * @var boolean
        */
        public $timestamps = false;
        
        
        
        /**
        * Get the table associated with the model.
        *
        * @return string
        */
        public function getTable()
        {
                global $wpdb;
                
                return $wpdb->prefix . preg_replace('/[[:<:]]' . $wpdb->prefix . '/', '', parent::getTable(), 1);
        }

        /**
         * Insert a Price range into the DB
         *
         * @param [type] $roomType
         * @param [type] $price
         * @param [type] $startDate
         * @param [type] $endDate
         * @return void
         */

        public function insertPriceRange($roomType , $price , $startDate , $endDate) { 

                // Check if the given range overlaps with the other ranges.

                // Get all the ranges with the same room type.
                //  $allRanges = $this->where('room_type', $roomType)->get();

                //  foreach($allRanges as $range) {


                //         $checkStart =  Carbon::parse($startDate)->between($range->start_date, $range->end_date , false);
                //         $checkEnd = Carbon::parse($endDate)->betweenIncluded($range->start_date, $range->end_date , false);
                //         $checkMid = Carbon::parse($range->start)->greaterThan($startDate);

                //          if($checkStart == true) {                                                 
                //                 $this->create(array(
                //                 'room_type' => $roomType, 
                //                 'price' => $range->price,
                //                 'start_date' => $range->start_date,
                //                 'end_date' => Carbon::parse($startDate)->subDay(),
                //                 )); 
                //          }
                //         if($checkEnd == true){
                //                 $this->create(array(
                //                 'room_type' => $roomType, 
                //                 'price' => $range->price,
                //                 'start_date' =>  Carbon::parse($endDate)->addDay(),
                //                 'end_date' => $range->end_date,
                //                 )); 
                //         }
                //         // if($checkStart == true || $checkEnd == true) {
                //         //         $this->destroy($range->id);
                //         // }
                //         if($checkMid == true) {
                //                 $this->destroy($range->id);
                //         }
                //  }

               $this->fill(array(
                        'room_type' => $roomType , 
                        'price' => $price,
                        'start_date' => $startDate,
                        'end_date' => $endDate
                )); 
                 $response = $this->save();
                return $response;
        }



        public function getPriceRange($room_id) {
                 $price_arr = '';

        $all_room_prices = self::all()->where( 'room_type', $room_id )->map( function( $args ) {
            $sd_date = Carbon::parse( $args->toArray()['start_date'] );
            $ed_date = Carbon::parse( $args->toArray()['end_date'] );

            while( $sd_date->lte( $ed_date ) ){
                $price_arr[ $sd_date->toDateString() ] = $args->toArray()['price'];
                $sd_date->addDay(1);
            }

            return $price_arr;
        });

        $merged_collection = new Collection;
        foreach( $all_room_prices as $args){
            $merged_collection = $merged_collection->merge($args);
        }

        $grouped_collection = $merged_collection->mapToGroups(function ($key, $value) {
            return [$key => $value];
        })->map( function( $key, $value ){
            return [$value => $key->min() . ' to ' . $key->max()];
        });

        return $grouped_collection;
        }

                      
    
}