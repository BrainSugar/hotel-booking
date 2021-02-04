<?php

use Brainsugar\WPBones\Database\Migrations\Migration;

class bshb_rooms extends Migration
{
	protected $tableName = "bshb_rooms";
	
	public function up() {
		$this->create( "CREATE TABLE IF NOT EXISTS  {$this->tablename} (
			`id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			`room_name` varchar(191) NOT NULL,
			`room_type` bigint(20) UNSIGNED NOT NULL,
			`room_order` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
			PRIMARY KEY  (`id`),                        
			KEY `room_type` (`room_type`)
			) {$this->charsetCollate};"
		);
	}
		
	public function down() {
		dropIfExists($this->tableName);
	}
}