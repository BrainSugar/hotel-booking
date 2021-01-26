<?php

use Brainsugar\WPBones\Database\Migrations\Migration;

class bshb_pricing extends Migration
{
	protected $tableName = "bshb_pricing";
	
	public function up() {
		$this->create( "CREATE TABLE {$this->tablename} (
			`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,                     
			`room_type` BIGINT(20) UNSIGNED NOT NULL,
			`price` DECIMAL(15,2) NOT NULL,
			`start_date` DATE NOT NULL,
			`end_date` DATE NOT NULL,
			PRIMARY KEY (`id`)
			) {$this->charsetCollate};"
		);
	}
		
	public function down() {
		dropIfExists($this->tableName);
	}
}