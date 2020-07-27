<?php

namespace Brainsugar\Model;

use Illuminate\Database\Eloquent\Model;
class ReservationItems extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bshb_reservation_items';

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

    public function getRoomItems($reservation) { 
            $roomItems = $this->select('item_id')
            ->where('item_type' , 'room_item')
            ->where('reservation_id' , $reservation)
            ->get();
            $response = $roomItems->pluck('item_id')->toArray();                

            return $response;
    }
    public function getServiceItems($reservation) {
        $response = $this->select('item_id')
            ->where('item_type' , 'service_item')
            ->where('reservation_id' , $reservation)
            ->get();

            return $response;

    }
}