<?php
namespace Brainsugar\Admin\Metaboxes;

use Brainsugar\CustomPostTypes\ServiceCustomPostType;
use Brainsugar\Admin\Collections\CollectionsList;

class ServiceMetabox extends ManageMetaboxes {
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
        $postType = ServiceCustomPostType::getPostType();

        $this->postType = $postType;
        $this->prefix = '_bshb_';
		$this->bshb_register_actions_and_filters();
    }
    
    public function bshb_register_actions_and_filters() {
        add_action( 'cmb2_init', array( $this, 'bshb_register_fields' ) );
        add_action( 'admin_head-post.php', array( $this, 'bshb_hide_publishing_actions') );
        add_action( 'admin_head-post-new.php', array( $this, 'bshb_hide_publishing_actions') );
    }

    public function bshb_register_fields() {
        $service_metabox = new_cmb2_box( array(
            'id'                => $this->prefix . 'service_settings_metabox',
            'title'             => __( 'Service', 'cmb2' ),
            'object_types'      => array( $this->postType ), // Post type
        )   );
                
        $service_metabox->add_field( array(
            'id'                => $this->prefix . 'service_operation',
            'name'              => __( 'Operation', 'cmb2' ),
            'type'              => 'select',
            'show_option_none'  => false,
            'options_cb'        => array( $this, 'bshb_get_service_operations' ) ,
        )   );

        $service_metabox->add_field( array(
            'id'                => $this->prefix . 'service_amount',
            'name'              => __( 'Amount', 'cmb2' ),
            'type'              => 'text',
        )   );

        $service_metabox->add_field( array(
            'id'                => $this->prefix . 'description',
            'name'              => __( 'Description', 'cmb2' ),
            'type'              => 'textarea',
        )   );
    }

    public function bshb_hide_publishing_actions() {
        global $post;
        
        if( $post->post_type == ServiceCustomPostType::getPostType() ) {
            echo 
            '<style type="text/css">
                #misc-publishing-actions,
                #minor-publishing-actions {
                    display:none;
                }
            </style>';
        }
    }

    public function bshb_get_service_operations() {
        return CollectionsList::bshb_get_service_operations() ;
    }

    public function bshb_get_service_stock_availability() {
        return CollectionsList::bshb_get_service_stock_availability() ;
    }
}