<?php

namespace Brainsugar\Model;

use Illuminate\Database\Eloquent\Model;
class ReservationItemMeta extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bshb_reservation_item_meta';

        /**
        * Fillable attributes for the table,
        *
        * @var array
        */
        protected $fillable = [ 'item_id', 'meta_key' , 'meta_value'];

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

   
}