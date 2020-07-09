<?php

use Brainsugar\WPBones\Database\Migrations\Migration;

class bshb_reservations extends Migration
{
        protected $tableName = "bshb_reservations";
	public function up()
	{
		$this->create( "CREATE TABLE IF NOT EXISTS {$this->tablename} (
			id bigint(20) UNSIGNED AUTO_INCREMENT,
			reservation_id bigint(20) NOT NULL,
			check_in date NOT NULL,
			check_out date NOT NULL,
			reservation_status varchar(255),
			PRIMARY KEY  (`id`)
			) {$this->charsetCollate};" );
		}
	}