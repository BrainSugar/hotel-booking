<?php

use Brainsugar\WPBones\Database\Migrations\Migration;

class bshb_sessions extends Migration
{

        
  public function up()
  {
    	$this->create( "CREATE TABLE IF NOT EXISTS {$this->tablename} (
			id bigint(20) UNSIGNED AUTO_INCREMENT,
			session_key char(32) NOT NULL,
                        session_value  varchar(120) NOT NULL,
			reservation_id bigint(20) UNSIGNED NOT NULL,
                        session_expiry bigint(20) NOT NULL,
			PRIMARY KEY  (`id`)		
		) {$this->charsetCollate};" );
  }

}