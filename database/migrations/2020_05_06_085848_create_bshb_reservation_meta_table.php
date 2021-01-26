<?php

use Brainsugar\WPBones\Database\Migrations\Migration;

class bshb_reservation_meta extends Migration
{
    protected $tableName = 'bshb_reservation_meta';
        
	public function up(){
		$this->create( "CREATE TABLE IF NOT EXISTS {$this->tablename} (
			`id` BIGINT(20) UNSIGNED AUTO_INCREMENT,
			`reservation_id` BIGINT(20) UNSIGNED NOT NULL,
			`meta_key` VARCHAR(255) NOT NULL,
			`meta_value` LONGTEXT,
			PRIMARY KEY  (`id`),
			KEY `reservation_id` (`reservation_id`)
			) {$this->charsetCollate};" 
		);
	}

	public function down() {
		dropIfExists($this->tableName);
	}
}