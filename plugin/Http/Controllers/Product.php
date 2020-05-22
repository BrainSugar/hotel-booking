<?php

namespace Brainsugar\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Disable Illuminate timestamp columns.
     *
     * @var boolean
     */
    public $timestamps = false;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'log_id';

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
