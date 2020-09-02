<?php

namespace Brainsugar\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bshb_reservation_cart';

    /**
     * Primary Key
     *
     * @var array[]
     */ 
    protected $primaryKey = 'id';

    /**
     * Guarded/Fillable Columns
     *
     * @var array[]
     */ 
    protected $guarded = ['id'];
        
    /**
     * Disable timestamp columns
     *
     * @var string
     */
    public $timestamps = false;

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';

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
     * 1-1 Relation with Reservation (Cart has one reservation)
     *
     * @return Model\Reservation
     */
    public function Reservation()
    {
        return $this->hasOne( Reservation::class, 'reservation_id', 'reservation_id' );
    }
    
    public function savecart( $args ){
        $updated = $this->updateOrCreate(
            [ 
                'reservation_id'    => $args['post_id'],
                'item_id'           => $args['item_id'],
                'item_quantity'     => $args['item_quantity'],
            ],
            [
                'item_total'        => $args['item_total'],
            ]
        );

        return !! $updated;
    }

    public function remove_from_cart( $args ){
        $updated = $this->where('reservation_id', $args['reservation_id'])->where('item_id', $args['item_id'])->delete();

        return !! $updated;
    }
}