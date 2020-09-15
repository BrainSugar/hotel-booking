<?php
namespace Brainsugar\CustomPostTypes;

use Brainsugar\WPBones\Foundation\WordPressCustomPostTypeServiceProvider as ServiceProvider;
use Brainsugar\Admin\Columns\ServiceColumns;
use Brainsugar\Admin\Metaboxes\ServiceMetabox;

class ServiceCustomPostType extends ServiceProvider
{
	/**
	* Post Type
	*
	* @var string
	*/
	public static $postType       	= 'bshb_service';
	
	protected $id                 	= 'bshb_service';
	protected $name               	= 'Service';
	protected $plural             	= 'Services';
	protected $public             	= true;
	protected $publiclyQueryable  	= true;
	protected $mapMetaCap         	= true;
	protected $menuIcon           	= 'dashicons-universal-access-alt';
	protected $showInRest         	= 'true';
	protected $rewrite            	= [
		'slug'          => 'service',   
		'with_front'    => true,
		'pages'         => true,
		'ep_mask'       => EP_PERMALINK,
		'description'   => "Create a new Service",
	];
	
	public function boot() {
		$register_columns = new ServiceColumns;
		$register_metabox = new ServiceMetabox;
	}
	
	public function supports() {
		return [
			'title',       
			'revisions',
			'thumbnail',
		];
	}
	
	public static function getPostType() {
		return self::$postType;
	}
}