<?php

namespace Brainsugar\Model;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bshb_pricing';

    /**
     * Primary Key.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Fillable attributes for the table,.
     *
     * @var array
     */
    protected $fillable = ['room_type', 'price', 'start_date', 'end_date'];

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
