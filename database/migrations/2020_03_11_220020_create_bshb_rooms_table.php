<?php

use Brainsugar\WPBones\Database\Migrations\Migration;

class bshb_rooms extends Migration
{
	public function up() {
		$this->create( "CREATE TABLE IF NOT EXISTS {$this->tablename} (
			`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			`room_name` VARCHAR(191) NOT NULL,
			`room_type` BIGINT(20) UNSIGNED NOT NULL,
			`room_order` BIGINT(20) UNSIGNED NOT NULL DEFAULT 0,
			PRIMARY KEY  (`id`),                        
			KEY `room_type` (`room_type`)
			) {$this->charsetCollate};"
		);
	}
		
	public function down() {
		dropIfExists($this->tableName);
	}
}