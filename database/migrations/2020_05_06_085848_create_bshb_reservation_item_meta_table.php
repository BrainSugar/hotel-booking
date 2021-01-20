<?php

use Brainsugar\WPBones\Database\Migrations\Migration;

class bshb_reservation_item_meta extends Migration
{
        protected $tableName = 'bshb_reservation_item_meta';
        
	public function up(){
		$this->create( "CREATE TABLE IF NOT EXISTS {$this->tablename} (
			id bigint(20) UNSIGNED AUTO_INCREMENT,
			reservation_id bigint(20) UNSIGNED NOT NULL,			
			guest_info LONGTEXT NOT NULL,
                        adults bigint(20) UNSIGNED NOT NULL,
                        children bigint(20) UNSIGNED NOT NULL,
                        coupon LONGTEXT NULL,
                        price_info LONGTEXT NOT NULL,
			PRIMARY KEY  (`id`),
			KEY reservation_id (`reservation_id`)
		) {$this->charsetCollate};" );
	}
}