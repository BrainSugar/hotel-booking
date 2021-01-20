<?php

namespace Brainsugar\Model;

use Illuminate\Database\Eloquent\Model;

class ReservationCart extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bshb_reservation_cart';

    /**
     * Fillable attributes for the table,.
     *
     * @var array
     */
    protected $fillable = ['session_id', 'item_id', 'item_type', 'item_quantity', 'item_total'];

    /**
     * Disable Timestamps.
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

        return $wpdb->prefix.preg_replace('/[[:<:]]'.$wpdb->prefix.'/', '', parent::getTable(), 1);
    }
}
