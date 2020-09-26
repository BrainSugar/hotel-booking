<?php
namespace Brainsugar\CustomPostTypes;

use Brainsugar\WPBones\Foundation\WordPressCustomPostTypeServiceProvider as ServiceProvider;
use Brainsugar\Admin\Columns\RoomTypeColumns;
use Brainsugar\Admin\Metaboxes\RoomTypeMetabox;

class RoomTypeCustomPostType extends ServiceProvider
{
	public static $postType 		= 'bshb_room_type';  
	
	protected $id     				= 'bshb_room_type';
	protected $name   				= 'Room Type';
	protected $plural				= 'Room Types';
	protected $public            	= true;
	protected $publiclyQueryable 	= true;
	protected $mapMetaCap        	= true;
	protected $menuIcon          	= 'dashicons-universal-access-alt';
	protected $showInRest 			= 'true';
	protected $rewrite           	= [
		'slug'       	=> 'room_type',   
		'with_front' 	=> true,
		'pages'      	=> true,
		'ep_mask'    	=> EP_PERMALINK,
		'description' 	=> "Create a new Room Type",
	];
	
	public function boot() {
		$register_columns = new RoomTypeColumns;
		$register_metabox = new RoomTypeMetabox;
	}
	
	public function supports() {
		return [
			'title',
			// 'editor',
			'thumbnail',
			'revisions',
		];
	}
	
	public static function getPostType() {
		return self::$postType;
	}
}