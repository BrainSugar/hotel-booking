<?php
namespace Brainsugar\Admin\Metaboxes;

use Brainsugar\CustomPostTypes\ServiceCustomPostType;
use Brainsugar\Admin\Collections\CollectionsList;

class ServiceMetabox extends ManageMetaboxes {
    protected $postType;
    protected $prefix;
    
    public function __construct() {
        $postType = ServiceCustomPostType::getPostType();

        $this->postType = $postType;
        $this->prefix = 'bshb';

		$this->bshb_register_hooks();
    }
    
    private function bshb_register_hooks() {
        add_action( 'cmb2_init', array( $this, "{$this->prefix}_register_fields" ) );
        add_action( 'admin_head-post.php', array( $this, "{$this->prefix}_hide_publishing_actions" ) );
        add_action( 'admin_head-post-new.php', array( $this, "{$this->prefix}_hide_publishing_actions" ) );
    }

    public function bshb_register_fields() {
        $service_metabox = new_cmb2_box( array(
            'id'                => "_{$this->prefix}_service_metabox",
            'title'             => __( 'Service Details', 'bshb-td' ),
            'object_types'      => array( $this->postType ),
            'classes'           => array( $this->prefix ),
            'cmb_styles'        => false,
        )   );

        $service_metabox->add_field( array(
            'id'                => "_{$this->prefix}_heading",
            'render_row_cb'     => array( $this, "{$this->prefix}_render_heading" ),
        )   );

        $service_metabox->add_field( array(
            'id'                => "_{$this->prefix}_service_operation",
            'name'              => __( 'Operation', 'bshb-td' ),
            'type'              => 'select',
            'options_cb'        => array( $this, "{$this->prefix}_get_service_operations" ) ,
            'show_option_none'  => false,
            'attributes'        => array(
                'class'             => 'form-control',
                'required'          => 'required',
            ),
            // 'column'            => array(
            //     'position'          => 2,
            //     'name'              => 'Operation',
            // ),
            'show_names'        => false,
            'before'            => array( $this, "{$this->prefix}_before_service_operation_field" ),
            'after'             => array( $this, "{$this->prefix}_after_service_operation_field" ),
        )   );

        $service_metabox->add_field( array(
            'id'                => "_{$this->prefix}_service_amount",
            'name'              => __( 'Amount', 'bshb-td' ),
            'type'              => 'text',
            'attributes'        => array(
                'type'              => 'number',
                'min'               => '1',
                'max'               => '999999',
                'class'             => 'form-control',
                'placeholder'       => 'Amount',
                'required'          => 'required',
            ),
            // 'column'            => array(
            //     'position'          => 3,
            //     'name'              => 'Amount',
            // ),
            'show_names'        => false,
            'before'            => array( $this, "{$this->prefix}_before_service_amount_field" ),
            'after'             => array( $this, "{$this->prefix}_after_service_amount_field" ),
        )   );

        $service_metabox->add_field( array(
            'id'                => "_{$this->prefix}_service_description",
            'name'              => __( 'Service Description', 'bshb-td' ),
            'type'              => 'textarea_small',
            'attributes'        => array(
                'class'             => 'form-control',
                'placeholder'       => 'Description',
                'rows'              => 2,
            ),
            'show_names'        => false,
            'before'            => array( $this, "{$this->prefix}_before_service_description_field" ),
            'after'             => array( $this, "{$this->prefix}_after_service_description_field" ),
        )   );
    }
    
    public function bshb_render_heading() {
        ?>
            <div class="col-12 my-4">
                <div class="heading_field">
                    <h4 class="metabox-main-heading font-weight-light">
                        <?php esc_html_e( 'Service Details', 'bshb-td' ) ?>
                    </h4>

                    <p class="metabox-sub-heading setting-desc">
                        <?php esc_html_e( 'Additional Services provided for Guests', 'bshb-td' ) ?>
                    </p>
                </div>
            </div>
        <?php 
    }

    public function bshb_before_service_operation_field() {
        ?>
            <div class="col-8">
        <?php 
    }

    public function bshb_after_service_operation_field() {
        ?>
            <p class="option-desc">Choose how this Service affects the total amount of a Reservation</p>
            </div> <!--col -->
        <?php 
    }

    public function bshb_before_service_amount_field() {
        ?>
            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-rupee-sign"></i>
                        </span>
                    </div>
        <?php
    }

    public function bshb_after_service_amount_field() {
        ?>
                    </div> <!-- input-group -->
                <div>
                    <p class="option-desc">How much does this Service cost</p>
                </div>
            </div> <!-- col -->
        <?php 
    }

    public function bshb_before_service_description_field() {
        ?>
            <div class="col-8">
        <?php
    }

    public function bshb_after_service_description_field() {
        ?>
            <div>
                    <p class="option-desc">Optional Description for this Service Type</p>
                </div>
            </div> <!-- col -->
        <?php 
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
}