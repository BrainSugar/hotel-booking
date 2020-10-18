<?php
namespace Brainsugar\CustomPostTypes;

use Brainsugar\WPBones\Foundation\WordPressCustomPostTypeServiceProvider as ServiceProvider;
use Brainsugar\Admin\Columns\TaxColumns;
use Brainsugar\Admin\Metaboxes\TaxMetabox;

class TaxCustomPostType extends ServiceProvider
{
	public static $postType       	= 'bshb_tax';
	
	protected $id                 	= 'bshb_tax';
	protected $name               	= 'Tax';
	protected $plural             	= 'Taxes';
	protected $public             	= true;
	protected $publiclyQueryable  	= true;
	protected $mapMetaCap         	= true;
	protected $menuIcon           	= 'dashicons-chart-pie';
	protected $showInRest         	= 'true';
	protected $rewrite            	= [
		'slug'          => 'tax',   
		'with_front'    => true,
		'pages'         => true,
		'ep_mask'       => EP_PERMALINK,
		'description'   => "Create a new Tax",
	];
	
	public function boot() {
		$register_columns = new TaxColumns( static::$postType );
		$register_metabox = new TaxMetabox( static::$postType );        
	}
	
	public function supports() {
		return [
			'title',       
			'revisions',
		];
	}
}
