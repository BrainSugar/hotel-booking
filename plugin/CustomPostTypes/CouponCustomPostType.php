<?php

namespace Brainsugar\CustomPostTypes;

use Brainsugar\WPBones\Foundation\WordPressCustomPostTypeServiceProvider as ServiceProvider;
// use Brainsugar\Admin\Columns\CouponColumns;
use Brainsugar\Admin\Metaboxes\CouponMetabox;

class CouponCustomPostType extends ServiceProvider
{

  public static $postType       	= 'bshb_coupon';
  protected $id     = 'bshb_coupon';
  protected $name   = 'Coupon';
  protected $plural = 'Coupons';
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

  /**
   * You may override this method in order to register your own actions and filters.
   *
   */
  public function boot()
  {
    		// $register_columns = new CouponColumns;
		$register_metabox = new CouponMetabox;        
  }

  /**
   * Override this method to save/update your custom data.
   * This method is called by hook action save_post_{post_type}`
   *
   * @param int|string $post_id Post ID
   * @param object     $post    Optional. Post object
   *
   */
  public function update( $post_id, $post )
  {
    // You can override this method to save your own data
  }
  	public function supports() {
		return [
			'title',       
			'revisions',
		];
	}


  	public static function getPostType() {
		return self::$postType;
	}

}