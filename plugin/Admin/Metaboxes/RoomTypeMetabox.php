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
            'before'            => array( $this, "{$this->prefix}_before_stock_rooms_field" ),
            'after'             => array( $this, "{$this->prefix}_after_stock_rooms_field" ),
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
            'before'            => array( $this, "{$this->prefix}_before_headcount_field" ),
            'after'             => array( $this, "{$this->prefix}_after_headcount_field" ),
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
            'before'            => array( $this, "{$this->prefix}_before_los_field" ),
            'after'             => array( $this, "{$this->prefix}_after_los_field" ),
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
                'placeholder'       => 'Input a number 1-99999',
            ),
            'show_names'        => false,
            'before'            => array( $this, "{$this->prefix}_before_rack_rate_field" ),
            'after'             => array( $this, "{$this->prefix}_after_rack_rate_field" ),
        )   );

        $basic_details_metabox->add_field( array(
            'id'                => "_{$this->prefix}_room_area",
            'name'              => __( 'Room Area', 'bshb-td' ),
            'type'              => 'text',
            'attributes'        => array(
                'type'              => 'number',
                'min'               => '1',
                'max'               => '999999',
                'class'             => 'form-control',
                'placeholder'       => 'Area in m2',
            ),
            'show_names'        => false,
            'before'            => array( $this, "{$this->prefix}_before_room_area_field" ),
            'after'             => array( $this, "{$this->prefix}_after_room_area_field" ),
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
            'before'            => array( $this, "{$this->prefix}_before_deposit_field" ),
            'after'             => array( $this, "{$this->prefix}_after_deposit_field" ),
        )   );

        $additional_details_metabox->add_field( array(
            'id'                => "_{$this->prefix}_non_cancellable",
            'name'              => __( 'Non Cancellable', 'bshb-td' ),
            'type'              => 'checkbox',
            'attributes'        => array(
                'desc'              => 'Non Cancellable',
            ),
            'show_names'        => false,
            'before'            => array( $this, "{$this->prefix}_before_non_cancellable_field" ),
            'after'             => array( $this, "{$this->prefix}_after_non_cancellable_field" ),
        )   );

        $additional_details_metabox->add_field( array(
            'id'                => "_{$this->prefix}_non_taxable",
            'name'              => __( 'Non Taxable', 'bshb-td' ),
            'type'              => 'checkbox',
            'attributes'        => array(
                'desc'              => 'Non Taxable',
            ),
            'show_names'        => false,
            'before'            => array( $this, "{$this->prefix}_before_non_taxable_field" ),
            'after'             => array( $this, "{$this->prefix}_after_non_taxable_field" ),
        )   );

        // $additional_details_metabox->add_field( array(
        //     'id'                => "_{$this->prefix}_facility",
        //     'name'              => __( 'Facility', 'bshb-td' ),
        //     'type'              => 'taxonomy_multicheck',
        //     'taxonomy'          => 'bshb_facility_taxonomy',
        //     'show_names'        => false,
        //     'before'            => array( $this, "{$this->prefix}_before_facility_field" ),
        //     'after'             => array( $this, "{$this->prefix}_after_facility_field" ),
        // )   );

        // $additional_details_metabox->add_field( array(
		// 	'id'          	    => "_{$this->prefix}_beds",
		// 	'type'        	    => 'text',
		// 	'repeatable'  	    => true,
		// 	'options'           => array(
        //         'add_row_text'              => __( 'Add Bed', 'cmb2' ),
        //         'remove_row_button_title'   => __( 'Delete Bed', 'cmb2' ),
        //     ),
        // )   );

        $additional_details_metabox->add_field( array(
			'id'          	    => "_{$this->prefix}_beds2",
            'type'        	    => 'beds',
            'repeatable'  	    => true,
			'options'           => array(
                'add_row_text'              => __( 'Add Bed', 'cmb2' ),
                'remove_row_button_title'   => __( 'Delete Bed', 'cmb2' ),
            ),
            'before'            => array( $this, "{$this->prefix}_before_beds_field" ),
            'after'             => array( $this, "{$this->prefix}_after_beds_field" ),
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



    public function bshb_before_room_area_field() {
        ?>
            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-ruler-combined"></i>
                        </span>
                    </div>
        <?php
    }

    public function bshb_after_room_area_field() {
        ?>
                    </div> <!-- input-group -->
                <div>
                    <p class="option-desc">Area of the Room</p>
                </div>
            </div> <!-- col -->
        <?php 
    }


    public function bshb_before_rack_rate_field() {
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

    public function bshb_after_rack_rate_field() {
        ?>
                    </div> <!-- input-group -->
                <div>
                    <p class="option-desc">Base Rate of the Room</p>
                </div>
            </div> <!-- col -->
        <?php 
    }


    public function bshb_before_stock_rooms_field() {
        ?>
            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-ruler-combined"></i>
                        </span>
                    </div>
        <?php
    }

    public function bshb_after_stock_rooms_field() {
        ?>
                    </div> <!-- input-group -->
                <div>
                    <p class="option-desc">How many rooms of this type are available?</p>
                </div>
            </div> <!-- col -->
        <?php 
    }



    
    public function bshb_before_headcount_field() {
        ?>
            <div class="col-12">
        <?php
    }

    public function bshb_after_headcount_field() {
        ?>
            </div>
        <?php
    }

    public function bshb_before_los_field() {
        ?>
            <div class="col-12">
        <?php
    }

    public function bshb_after_los_field() {
        ?>
            </div>
        <?php
    }

    public function bshb_before_deposit_field() {
        ?>
            <div class="col-12">
        <?php
    }

    public function bshb_after_deposit_field() {
        ?>
            </div>
        <?php 
    }



    
    public function bshb_before_non_cancellable_field() {
        ?>
            <div class="col-8">
        <?php
    }

    public function bshb_after_non_cancellable_field() {
        ?>
            <p class="option-desc">When enabled, reservations that include this room will be non cancellable and non refundable</p>
            </div> <!--col-->
        <?php 
    }


    public function bshb_before_non_taxable_field() {
        ?>
            <div class="col-8">
        <?php
    }

    public function bshb_after_non_taxable_field() {
        ?>
            <p class="option-desc">When enabled, tax rules will not be applied for this room type</p>
            </div> <!--col-->
        <?php 
    }


    public function bshb_before_beds_field() {
        ?>
            <div class="col-12">
        <?php
    }

    public function bshb_after_beds_field() {
        ?>
            <p class="option-desc">Specify what type of bed(s) are available in this room type</p>
            </div> <!--col-->
        <?php 
    }


    

    

    public function bshb_before_deposit_amount_field() {
        ?>
            <div class="col-8">
        <?php
    }

    public function bshb_after_deposit_amount_field() {
        ?>
            <p class="option-desc">Percentage of the Amount required as an advance deposit</p>
            </div> <!--col-->
        <?php 
    }

    

    public function bshb_get_room_variation_type() {
        return CollectionsList::bshb_get_room_variation_type() ;
    }

    function bshb_hide_publishing_actions(){
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
    
    public function bshb_show_if_deposit_required( $field ) {
        $require_deposit = get_post_meta( $field->object_id(), "_{$this->prefix}_deposit_amount", 1 );
        return 'on' === $require_deposit;
    }
}