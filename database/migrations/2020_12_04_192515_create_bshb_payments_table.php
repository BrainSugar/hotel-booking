<?php

use Brainsugar\WPBones\Database\Migrations\Migration;

class bshb_payments extends Migration
{
 protected $tableName = 'bshb_payments';
  public function up()
  {
		$this->create( "CREATE TABLE IF NOT EXISTS {$this->tablename} (
			id bigint(20) UNSIGNED AUTO_INCREMENT,
			reservation_id bigint(20) UNSIGNED NOT NULL,			
			reservation_total bigint(20) UNSIGNED NOT NULL,
                        payment_type varchar(255),
                        payment_method varchar(255),
                        payment_status varchar(255),
                        transaction_id varchar(255),
			PRIMARY KEY  (`id`),
			KEY reservation_id (`reservation_id`)
		) {$this->charsetCollate};" );

  }

}