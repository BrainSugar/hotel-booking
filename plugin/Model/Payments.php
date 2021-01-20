<?php

namespace Brainsugar\Http\Controllers;

use Brainsugar\WPBones\Database\Model;

class Payments extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bshb_payments';

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

    public function setguest_infoAttribute($value){
            $this->attributes['guest_info'] = \serialize($value);
    }
    public function getguest_infoAttribute($value){
            return \unserialize($value);
    }
}