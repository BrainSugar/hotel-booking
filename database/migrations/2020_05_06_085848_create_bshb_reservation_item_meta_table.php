<?php

use Brainsugar\WPBones\Database\Migrations\Migration;

class bshb_reservation_item_meta extends Migration
{
        protected $tableName = 'bshb_reservation_item_meta';
        
	public function up(){
		$this->create( "CREATE TABLE IF NOT EXISTS {$this->tablename} (
			id bigint(20) UNSIGNED AUTO_INCREMENT,
			item_id bigint(20) UNSIGNED NOT NULL,
			meta_key VARCHAR(255) NOT NULL,
			meta_value LONGTEXT,
			PRIMARY KEY  (`id`),
			KEY item_id (`item_id`)
		) {$this->charsetCollate};" );
	}
}