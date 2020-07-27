<?php

use Brainsugar\WPBones\Database\Migrations\Migration;

class bshb_reservation_items extends Migration
{
        protected $tableName = 'bshb_reservation_items';
        
  	public function up(){
		$this->create( "CREATE TABLE IF NOT EXISTS {$this->tablename} (
			id bigint(20) UNSIGNED AUTO_INCREMENT,
			reservation_id bigint(20) UNSIGNED NOT NULL,
			item_id bigint(20) UNSIGNED NOT NULL,
			item_type VARCHAR(255) NOT NULL,
			PRIMARY KEY  (`id`),
			KEY reservation_id (`reservation_id`),
			KEY item_id (`item_id`)
		) {$this->charsetCollate};" );
	}
}