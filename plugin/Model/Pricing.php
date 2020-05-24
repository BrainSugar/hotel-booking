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
                // Check if there are overlapping price ranges before inserting into DB
                $this->checkOverlap($roomType , $startDate , $endDate);
                
                // If the Given price range doesn't lie between any previous range then insert into DB.
                $this->fill(array(
                        'room_type' => $roomType , 
                        'price' => $price,
                        'start_date' => $startDate,
                        'end_date' => $endDate
                )); 
                $response = $this->save();
                return $response;
        }

        public function deletePriceRange($roomType , $startDate , $endDate) {
                // Check where the dates lie and check overlapping Ranges.
                $response = $this->checkOverlap($roomType , $startDate , $endDate);
                return $response;
        }

        /**
         * Check overlapping price ranges.
         * Check left and right overlapping ranges ,
         * Create new left and right Price range
         * Delete the ranges in between
         *
         * @param [type] $roomType
         * @param [type] $startDate
         * @param [type] $endDate
         * @return void
         */
        public function checkOverlap($roomType , $startDate , $endDate) {
                 // Check if the given range overlaps with the other ranges.
                // Get all the ranges with the same room type.
                $allRanges = $this->where('room_type', $roomType)->get();
                
                foreach($allRanges as $range) {                        
                        $checkStart =  Carbon::parse($startDate)->between($range->start_date, $range->end_date);
                        $checkEnd = Carbon::parse($endDate)->between($range->start_date, $range->end_date); 
                        
                        // If the start date lies between any of the previous price ranges.
                        if($checkStart == true) {
                                $leftRangeStart = Carbon::parse($range->start_date);
                                $leftRangeEnd = Carbon::parse($startDate)->subDay();
                                if($leftRangeStart <= $leftRangeEnd) {
                                        $this->create(array(
                                                'room_type' => $roomType, 
                                                'price' => $range->price,
                                                'start_date' => $leftRangeStart,
                                                'end_date' => $leftRangeEnd,
                                        ));                                        
                                }
                        }
                        
                        //  If the end date lies between any of the previous price ranges.
                        if($checkEnd == true){
                                $rightRangeStart = Carbon::parse($endDate)->addDay();
                                $rightRangeEnd = Carbon::parse($range->end_date);
                                if($rightRangeStart <= $rightRangeEnd) {
                                        $this->create(array(
                                                'room_type' => $roomType, 
                                                'price' => $range->price,
                                                'start_date' =>$rightRangeStart,
                                                'end_date' =>$rightRangeEnd,
                                        )); 
                                }
                        }
                        // If either of the dates lies between the current looping range then delete the range.
                        if($checkStart == true || $checkEnd == true) {
                                $this->destroy($range->id);
                        }
                        // If there are any other price ranges between the current price range then delete them.
                        if($range->start_date >= $startDate && $range->end_date <= $endDate) {
                                $this->destroy($range->id);
                        }
                }
                return true;
        }

        /**
         * Get price range for a room type
         *
         * @param [type] $roomType
         * @return void
         */
        public function getPriceRange($roomType) {

                $response = $this->where('room_type', $roomType)->get();
                return $response;

        }
}