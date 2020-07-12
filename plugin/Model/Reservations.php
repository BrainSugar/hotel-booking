<?php

namespace Brainsugar\Model;
use Illuminate\Database\Eloquent\Model;
use Brainsugar\Model\Pricing;
use Brainsugar\Model\Room;

class Reservations extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bshb_reservations';

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

    public function getAvailableRooms($checkIn , $checkOut , $guests) {
                    $roomTypes = get_posts(array(
                        'post_type' => 'bshb_room',
                        'fields'          => 'ids',
                        'status' => 'published'
                ));
                return $roomTypes;
    }
}