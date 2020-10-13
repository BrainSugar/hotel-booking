<?php
namespace Brainsugar\Admin\Metaboxes;

use Brainsugar\CustomPostTypes\CouponCustomPostType;
use Brainsugar\Admin\Collections\CollectionsList;

class CouponMetabox extends ManageMetaboxes {
    /**
    * The post type id.
    *
    * @var [string]
    */
    protected $postType;

    /**
    * The prefix
    *
    * @var [string]
    */
    protected $prefix = '';
    
    public function __construct() {
        $postType = CouponCustomPostType::getPostType();

        $this->postType = $postType;
        $this->prefix = 'bshb_';
		$this->bshb_register_actions_and_filters();
    }
    
    public function bshb_register_actions_and_filters() {
        add_action( 'cmb2_init', array( $this, 'bshb_register_fields' ) );

        // add_action( 'admin_head-post.php', array( $this, 'bshb_hide_publishing_actions') );
        // add_action( 'admin_head-post-new.php', array( $this, 'bshb_hide_publishing_actions') );
    }

    public function bshb_register_fields() {
        $coupon_metabox = new_cmb2_box( array(
            'id'                => $this->prefix . 'coupon_settings_metabox',
            'title'             => __( 'Coupon Settings', 'cmb2' ),
            'object_types'      => array( $this->postType ),
        )   );
                
        $coupon_metabox->add_field( array(		
                'id'                => $this->prefix . 'coupon_code',
                'name'              => 'Coupon Code',
                'type'          => 'text',
        )   );
        $coupon_metabox->add_field( array(		
                'id'                => $this->prefix . 'coupon_type',
                'name'              => 'Discount Type',
                'type'          => 'select',
                'show_option_none'  => false,
                'options_cb'        => array( $this, 'get_coupon_operation' ) ,
        )   );
        $coupon_metabox->add_field( array(		
                'id'                => $this->prefix . 'coupon_discount',
                'name'              => 'Discount',
                'type'          => 'text',
                'attributes' => array(
                        'type' => 'number',
                ),
        )   );
    }

    public function get_coupon_operation() {
             return CollectionsList::get_coupon_operation() ;
    }

//     public function bshb_hide_publishing_actions() {
//         global $post;
        
//         if( $post->post_type == CouponCustomPostType::getPostType() ){
//             echo 
//             '<style type="text/css">
//                 #misc-publishing-actions,
//                 #minor-publishing-actions {
//                     display:none;
//                 }
//             </style>';
//         }
//     }
}