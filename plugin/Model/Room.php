<?php

namespace Brainsugar\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bshb_rooms';

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
    protected $fillable = ['room_name', 'room_type', 'order'];

    /**
     * Disable Timestamps.
     *
     * @var boolean
     */
    public $timestamps = false;

    protected $dates = ['deleted_at'];

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

    /**
     * Get all published room types.
     *
     * @return object
     */
    public function getRoomTypes(string $fields = null)
    {
        // Get all published room types
        $response = get_posts([
                        'post_type' => 'bshb_room',
                        'fields' => $fields,
                        'status' => 'published',
                ]);

        return $response;
    }
}
