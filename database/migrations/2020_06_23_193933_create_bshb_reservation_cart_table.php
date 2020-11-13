<?php

use Brainsugar\WPBones\Database\Migrations\Migration;

class bshb_reservation_cart extends Migration
{
  	public function up() {
		$this->create( "CREATE TABLE IF NOT EXISTS {$this->tablename} (
			id bigint(20) UNSIGNED AUTO_INCREMENT,
			reservation_id bigint(20) UNSIGNED NOT NULL,
			item_id bigint(20) UNSIGNED NOT NULL,
                        item_type VARCHAR(255) NOT NULL,
			item_quantity tinyint(3) UNSIGNED NOT NULL,
			item_total decimal(19,2) NOT NULL,
			PRIMARY KEY  (`id`),
			KEY reservation_id (`reservation_id`),
			KEY item_id (`item_id`)
		) {$this->charsetCollate};" );
	}
}