<?php
namespace Brainsugar\Admin\Metaboxes;

use Brainsugar\CustomPostTypes\RoomTypeCustomPostType;
use Brainsugar\Admin\Collections\CollectionsList;
use Brainsugar\Model\Room;
use Brainsugar\Admin\Fields;

class RoomTypeMetabox extends ManageMetaboxes {
    protected $postType;
    protected $prefix;
    
    public function __construct() {         
        $postType = RoomTypeCustomPostType::getPostType();

        $this->postType = $postType;
        $this->prefix   = 'bshb';
        $headcount      = new Fields\Headcount;
        $los            = new Fields\LOS;
        $deposits       = new Fields\Deposits;
        $beds           = new Fields\Beds;

        $this->bshb_register_hooks();
    }
    
    function bshb_register_hooks() {
        add_action( 'cmb2_init', array( $this, "{$this->prefix}_register_fields" ) );
        add_action( 'admin_head-post.php', array( $this, "{$this->prefix}_hide_publishing_actions" ) );
        add_action( 'admin_head-post-new.php', array( $this, "{$this->prefix}_hide_publishing_actions" ) );
    }
    
    function bshb_register_fields(){
        $basic_details_metabox = new_cmb2_box( array(
            'id'                => "{$this->prefix}_room_type_basic_details",
            'title'             => __( 'Basic Details', 'bshb-td' ),
            'object_types'      => array( $this->postType ),
            'classes'           => array( $this->prefix ),
            'cmb_styles'        => false,
        )   );

        $basic_details_metabox->add_field( array(
            'id'                => "{$this->prefix}_basic_details_heading",
            'type'              => 'text',
            'render_row_cb'     => array( $this, "{$this->prefix}_render_basic_details_heading" ),
        )   );

        $basic_details_metabox->add_field( array(
            'id'                => "_{$this->prefix}_stock_rooms",
            'name'              => __( 'Stock Rooms', 'bshb-td' ),
            'type'              => 'text',
            'attributes'        => array(
                'type'              => 'number',
                'min'               => '1',
                'max'               => '999',
                'class'             => 'form-control',
                'placeholder'       => 'Input a number 1-999',
            ),
            'show_names'        => false,
            'before'            => function(){
                echo
                '<div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-ruler-combined"></i>
                            </span>
                        </div>';
            },
            'after'             => function(){
                echo
                    '</div>
                    <p class="option-desc">How many rooms of this type are available?</p>
                </div>';
            },
        )   );

        $basic_details_metabox->add_field( array(
            'id'                => "_{$this->prefix}_headcount",
            'name'              => __( 'Head Count', 'bshb-td' ),
            'type'              => 'headcount',
            'attributes'        => array(
                'type'              => 'number',
                'min'               => '0',
                'max'               => '10',
                'readonly'          => 'readonly',
            ),
            'show_names'        => false,
            'before'            => function(){
                echo
                '<div class="col-12">';
            },
            'after'             => function(){
                echo
                '</div>';
            },
        )   );

        $basic_details_metabox->add_field( array(
            'id'                => "_{$this->prefix}_los",
            'name'              => __( 'Length of Stay', 'bshb-td' ),
            'type'              => 'los',
            'attributes'        => array(
                'type'              => 'number',
                'min'               => '1',
                'max'               => '10',
                'readonly'          => 'readonly',
            ),
            'show_names'        => false,
            'before'            => function(){
                echo
                '<div class="col-12">';
            },
            'after'             => function(){
                echo
                '</div>';
            },
        )   );

        $basic_details_metabox->add_field( array(
            'id'                => "_{$this->prefix}_rack_rate",
            'name'              => __( 'Rack Rate', 'bshb-td' ),
            'type'              => 'text',
            'attributes'        => array(
                'type'              => 'number',
                'min'               => '1',
                'max'               => '99999',
                'class'             => 'form-control',
                'placeholder'       => 'Base rate between 1-99999',
            ),
            'show_names'        => false,
            'before'            => function(){
                echo
                '<div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-rupee-sign"></i>
                            </span>
                        </div>';
            },
            'after'             => function(){
                echo
                    '</div>
                    <p class="option-desc">Base Rate of the Room</p>
                </div>';
            },
        )   );

        $basic_details_metabox->add_field( array(
            'id'                => "_{$this->prefix}_room_area",
            'name'              => __( 'Room Area', 'bshb-td' ),
            'type'              => 'text',
            'attributes'        => array(
                'type'              => 'number',
                'min'               => '1',
                'max'               => '99999',
                'class'             => 'form-control',
                'placeholder'       => 'Area between 1-99999',
            ),
            'show_names'        => false,
            'before'            => function(){
                echo
                '<div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-ruler-combined"></i>
                            </span>
                        </div>';
            },
            'after'             => function(){
                echo
                    '</div>
                    <p class="option-desc">Area of the Room</p>
                </div>';
            },
        )   );



        
        $additional_details_metabox = new_cmb2_box( array(
            'id'                => "{$this->prefix}_room_type_additional_details",
            'title'             => __( 'Additional Details (Optional)', 'bshb-td' ),
            'object_types'      => array( $this->postType ),
            'classes'           => array( $this->prefix ),
            'cmb_styles'        => false,
        )   );

        $additional_details_metabox->add_field( array(
            'id'                => "{$this->prefix}_additional_details_heading",
            'type'              => 'text',
            'render_row_cb'     => array( $this, "{$this->prefix}_render_additional_details_heading" ),
        )   );

        $additional_details_metabox->add_field( array(
            'id'                => "_{$this->prefix}_require_deposit",
            'name'              => __( 'Require Deposit', 'bshb-td' ),
            'type'              => 'deposits',
            'show_names'        => false,
            'before'            => function(){
                echo
                '<div class="col-12">';
            },
            'after'             => function(){
                echo
                '</div>';
            },
        )   );

        $additional_details_metabox->add_field( array(
            'id'                => "_{$this->prefix}_require_deposit",
            'name'              => __( 'Require Deposit', 'bshb-td' ),
            'type'              => 'deposits',
            'show_names'        => false,
            'before'            => function(){
                echo
                '<div class="col-12">';
            },
            'after'             => function(){
                echo
                '</div>';
            },
        )   );

        $additional_details_metabox->add_field( array(
            'id'                => "_{$this->prefix}_non_cancellable",
            'name'              => __( 'Non Cancellable', 'bshb-td' ),
            'type'              => 'checkbox',
            'attributes'        => array(
                'desc'              => 'Non Cancellable',
            ),
            'show_names'        => false,
            'before'            => function(){
                echo
                '<div class="col-8">';
            },
            'after'             => function(){
                echo
                '<p class="option-desc">When enabled, reservations that include this room will be non cancellable and non refundable</p>
                </div>';
            },
        )   );

        $additional_details_metabox->add_field( array(
            'id'                => "_{$this->prefix}_non_taxable",
            'name'              => __( 'Non Taxable', 'bshb-td' ),
            'type'              => 'checkbox',
            'attributes'        => array(
                'desc'              => 'Non Taxable',
            ),
            'show_names'        => false,
            'before'            => function(){
                echo
                '<div class="col-8">';
            },
            'after'             => function(){
                echo
                '<p class="option-desc">When enabled, tax rules will not be applied for this room type</p>
                </div>';
            },
        )   );

        $additional_details_metabox->add_field( array(
			'id'          	    => "_{$this->prefix}_beds",
            'type'        	    => 'beds',
            'repeatable'  	    => true,
			'options'           => array(
                'add_row_text'              => __( 'Add Bed', 'cmb2' ),
                'remove_row_button_title'   => __( 'Delete Bed', 'cmb2' ),
            ),
            'before'            => function(){
                echo
                '<div class="col-12">';
            },
            'after'             => function(){
                echo
                '<p class="option-desc">Specify what type of bed(s) are available in this room type</p>
                </div>';
            },
        )   );



        $order_metabox = new_cmb2_box( array(
            'id'                => "{$this->prefix}_room_type_order",
            'title'             => __( 'Order of Appearance', 'bshb-td' ),
            'object_types'      => array( $this->postType ),
            'classes'           => array( $this->prefix ),
            'cmb_styles'        => false,
            'context'           => 'side',
        )   );

        $order_metabox->add_field( array(
            'id'                => "{$this->prefix}_room_type_order",
            'name'              => __( 'Order of Appearance', 'bshb-td' ),
            'type'              => 'text',
            'attributes'        => array(
                'type'              => 'number',
                'min'               => '0',
                'max'               => '20',
                'class'             => 'form-control',
                'value'         => '0',
            ),
            'show_names'        => false,
            'before'            => function(){
                echo
                '<div class="col-12 p-0">';
            },
            'after'             => function(){
                echo
                '<p class="option-desc">Specify a particular order for this room type (Optional)</p>
                </div>';
            },
        )   );

        

        $policy_metabox = new_cmb2_box( array(
            'id'                => "{$this->prefix}_room_type_policies",
            'title'             => __( 'Policies/Rules', 'bshb-td' ),
            'object_types'      => array( $this->postType ),
            'classes'           => array( $this->prefix ),
            'cmb_styles'        => false,
            'context'           => 'side',
        )   );

        $policy_metabox->add_field( array(
            'id'                => "{$this->prefix}_room_type_policy",
            'name'              => __( 'Policies/Rules', 'bshb-td' ),
            'type'              => 'text',
            'show_names'        => false,
            'repeatable'  	    => true,
			'options'           => array(
                'add_row_text'              => __( 'Add Policy', 'cmb2' ),
                'remove_row_button_title'   => __( 'Delete Policy', 'cmb2' ),
            ),
            'before'            => function(){
                echo
                '<div class="col-12 p-0">';
            },
            'after'             => function(){
                echo
                '<p class="option-desc">Specify a particular order for this room type (Optional)</p>
                </div>';
            },
        )   );
    }
    

    public function bshb_render_basic_details_heading() {
        ?>
            <div class="col-12 my-4">
                <div class="heading_field">
                    <h4 class="metabox-main-heading font-weight-light">
                        <?php esc_html_e( 'Basic Details', 'bshb-td' ) ?>
                    </h4>

                    <p class="metabox-sub-heading setting-desc">
                        <?php esc_html_e( 'Mandatory information about the Room Type', 'bshb-td' ) ?>
                    </p>
                </div>
            </div>
        <?php 
    }

    public function bshb_render_additional_details_heading() {
        ?>
            <div class="col-12 my-4">
                <div class="heading_field">
                    <h4 class="metabox-main-heading font-weight-light">
                        <?php esc_html_e( 'Additional Details', 'bshb-td' ) ?>
                    </h4>

                    <p class="metabox-sub-heading setting-desc">
                        <?php esc_html_e( 'Optional information about the Room Type', 'bshb-td' ) ?>
                    </p>
                </div>
            </div>
        <?php 
    }

    public function bshb_hide_publishing_actions(){
        global $post;
        
        if( $post->post_type == RoomTypeCustomPostType::getPostType() ){
            echo '<style type="text/css">
                    #misc-publishing-actions,
                    #minor-publishing-actions{
                        display:none;
                    }
                </style>';
        }
    }
}
