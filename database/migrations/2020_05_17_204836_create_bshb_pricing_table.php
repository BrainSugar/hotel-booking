<?php

use Brainsugar\WPBones\Database\Migrations\Migration;

class bshb_pricing extends Migration
{
        
        protected $tableName = "bshb_pricing";
        
        public function up()
        {
                // Create your table
                $this->create("CREATE TABLE {$this->tablename} (
                        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,                     
                        `room_type` bigint(20) UNSIGNED NOT NULL,
                        `price` decimal(15,2) NOT NULL,
                        `start_date` date  NOT NULL,
                        `end_date` date   NOT NULL,
                        PRIMARY KEY (`id`)
                        ) {$this->charsetCollate};");
        }
                
        public function down() {
                        dropIfExists($this->tableName);
        }
                
}