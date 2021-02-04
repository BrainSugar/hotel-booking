<?php

use Brainsugar\WPBones\Database\Migrations\Migration;

class bshb_reservations extends Migration
{
  	public function up() {
    	$this->create( "CREATE TABLE IF NOT EXISTS {$this->tablename} (
			`id` BIGINT(20) UNSIGNED AUTO_INCREMENT,
			`reservation_id` BIGINT(20) UNSIGNED NOT NULL,
			`check_in` DATE NOT NULL,
			`check_out` DATE NOT NULL,
			`reservation_status` VARCHAR(255) NOT NULL,
			PRIMARY KEY  (`id`),
			KEY `reservation_id` (`reservation_id`)
			) {$this->charsetCollate};" 
		);
  	}
	   
 	public function down() {
		dropIfExists($this->tableName);
	}
}