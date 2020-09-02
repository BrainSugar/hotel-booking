<?php
namespace Brainsugar\CustomPostTypes;

use Brainsugar\WPBones\Foundation\WordPressCustomPostTypeServiceProvider as ServiceProvider;
// use Brainsugar\Admin\Columns\ReservationColumns;
// use Brainsugar\Admin\Metaboxes\ReservationMetabox;

class ReservationCustomPostType extends ServiceProvider
{
	/**
	* Post Type
	*
	* @var string
	*/
	public static $postType 		= 'bshb_reservation';
	
	protected $id                 	= 'bshb_reservation';
	protected $name               	= 'Reservation';
	protected $plural             	= 'Reservations';
	protected $public             	= true;
	protected $publiclyQueryable  	= true;
	protected $mapMetaCap         	= true;
	protected $menuIcon           	= 'dashicons-universal-access-alt';
	protected $showInRest         	= 'true';
	protected $rewrite            	= [
		'slug'       	=> 'reservation',   
		'with_front' 	=> true,
		'pages'      	=> true,
		'ep_mask'    	=> EP_PERMALINK,
		'description' 	=> "Create a new Reservation",
	];
	
	public function boot()
	{
		// $register_columns = new ReservationColumns;
		// $register_metabox = new ReservationMetabox;
	}
	
	public function supports()
	{
		return [ 
			'revisions',
		];
	}
	
	public static function getPostType(){
		return self::$postType;
	}
}