<?php

use Brainsugar\WPBones\Database\Migrations\Migration;

class bshb_sessions extends Migration
{
  	public function up() {
    	$this->create( "CREATE TABLE IF NOT EXISTS {$this->tablename} (
			`id` BIGINT(20) UNSIGNED AUTO_INCREMENT,
			`session_key` CHAR(32) NOT NULL,
            `session_value` VARCHAR(120) NOT NULL,
			`reservation_id` BIGINT(20) UNSIGNED NOT NULL,
            `session_expiry` BIGINT(20) NOT NULL,
			PRIMARY KEY  (`id`)		
			) {$this->charsetCollate};" 
		);
	}
	   
	public function down() {
		dropIfExists($this->tableName);
	}
}