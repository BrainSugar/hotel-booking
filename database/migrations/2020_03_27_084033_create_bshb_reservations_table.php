<?php

use Brainsugar\WPBones\Database\Migrations\Migration;

class bshb_reservations extends Migration
{
        protected $tableName = 'bshb_reservations';

	public function up() {
		$this->create( "CREATE TABLE IF NOT EXISTS {$this->tableName} (
			id bigint(20) UNSIGNED AUTO_INCREMENT,
			reservation_id bigint(20) UNSIGNED NOT NULL,
			check_in date NOT NULL,
			check_out date NOT NULL,
			reservation_status varchar(255),
			PRIMARY KEY  (`id`),
			KEY reservation_id (`reservation_id`)
		) {$this->charsetCollate};" );
	}
}