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
        protected $fillable = [ 'reservation_id', 'meta_key' , 'meta_value'];

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

    public function insertReservationMeta($reservationId , $guestInfo , $paymentMethod){

                $session = new Sessions;
                $sessionValue = $session->getSessionValue();
                $adults = $sessionValue['adults'];
                $children = $sessionValue['children'];
                $metaKeys = [
                        '_guest_info' => serialize($guestInfo),
                        '_payment_method' => $paymentMethod['payment_option'],
                        '_adults' => $adults,
                        '_children' => $children];
                $itemMeta = [];
                foreach($metaKeys as $key => $value){
                        array_push($itemMeta , [
                                'reservation_id' =>$reservationId,
                                'meta_key' => $key,
                                'meta_value' => $value,
                        ]);
                }
                $this->insert($itemMeta);
    }

    public function getGuestDetails($reservationId){
            $guestInfo = $this->select('meta_value')
            ->where('meta_key' ,'_guest_info')            
            ->where('reservation_id' , $reservationId)->value('meta_value');
            $response = \unserialize($guestInfo);
            return $response;
    }


   
}