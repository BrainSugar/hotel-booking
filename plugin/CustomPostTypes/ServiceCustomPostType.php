<?php
namespace Brainsugar\CustomPostTypes;

use Brainsugar\WPBones\Foundation\WordPressCustomPostTypeServiceProvider as ServiceProvider;
use Brainsugar\Admin\Columns\ServiceColumns;
use Brainsugar\Admin\Metaboxes\ServiceMetabox;

class ServiceCustomPostType extends ServiceProvider
{
	public static $postType       	= 'bshb_service';
	
	protected $id                 	= 'bshb_service';
	protected $name               	= 'Service';
	protected $plural             	= 'Services';
	protected $public             	= true;
	protected $publiclyQueryable  	= true;
	protected $mapMetaCap         	= true;
	protected $menuIcon           	= 'dashicons-text-page';
	protected $showInRest         	= 'true';
	protected $rewrite            	= [
		'slug'          => 'service',   
		'with_front'    => true,
		'pages'         => true,
		'ep_mask'       => EP_PERMALINK,
		'description'   => "Create a new Service",
	];
	
	public function boot() {
		$register_columns = new ServiceColumns( static::$postType );
		$register_metabox = new ServiceMetabox( static::$postType );
	}
	
	public function supports() {
		return [
			'title',
			'revisions',
			'thumbnail',
		];
	}
}
