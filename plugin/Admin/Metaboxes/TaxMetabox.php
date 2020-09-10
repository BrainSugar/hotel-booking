<?php
namespace Brainsugar\Admin\Metaboxes;

use Brainsugar\CustomPostTypes\TaxCustomPostType;

class TaxMetabox extends ManageMetaboxes {
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
        $postType = TaxCustomPostType::getPostType();

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
        $tax_metabox = new_cmb2_box( array(
            'id'                => $this->prefix . 'tax_settings_metabox',
            'title'             => __( 'Tax Settings', 'cmb2' ),
            'object_types'      => array( $this->postType ),
        )   );
                
        $tax_metabox->add_field( array(		
            'id'                => $this->prefix . 'tax_percentage',
            'name'              => 'Tax Percentage',
                    'type'          => 'text',
        'attributes' => array(
                'type' => 'number',
        ),
        )   );
    }

    public function bshb_hide_publishing_actions() {
        global $post;
        
        if( $post->post_type == TaxCustomPostType::getPostType() ){
            echo 
            '<style type="text/css">
                #misc-publishing-actions,
                #minor-publishing-actions {
                    display:none;
                }
            </style>';
        }
    }
}