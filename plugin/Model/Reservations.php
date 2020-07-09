<?php

namespace Brainsugar\Model;
use Illuminate\Database\Eloquent\Model;

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
}