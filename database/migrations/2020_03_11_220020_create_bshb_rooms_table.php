<?php

use Brainsugar\WPBones\Database\Migrations\Migration;

class bshb_rooms extends Migration
{
        
        protected $tableName = "bshb_rooms";
        
        public function up()
        {                      $this->create( "CREATE TABLE IF NOT EXISTS {$this->tablename} (
			`id` bigint(20) UNSIGNED AUTO_INCREMENT,
			`room_name` VARCHAR(255) NOT NULL,
			`room_type` bigint(20) UNSIGNED NOT NULL,
			`order` bigint(20) UNSIGNED NOT NULL,
                        `deleted_at` DATE,
			PRIMARY KEY  (`id`),
                        KEY room_type (`room_type`)
                ) {$this->charsetCollate};" );
               
        }
        public function down() {
                        dropIfExists($this->tableName);
        }
                
}

        
        