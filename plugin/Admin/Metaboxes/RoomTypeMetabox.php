<?php
namespace Brainsugar\Admin\Metaboxes;

use Brainsugar\Admin\Collections\CollectionsRepository;
use Brainsugar\Model\Room;
use Brainsugar\Admin\Fields;

if ( !class_exists( 'ServiceMetabox' ) ) {
    class RoomTypeMetabox extends MetaboxManager implements RenderMetaboxInterface {
        function register_fields(){
            $headcount  = new Fields\Headcount;
            $los        = new Fields\LOS;
            $beds       = new Fields\Beds;
            $amenity    = new Fields\Amenity;

            $basic_details_metabox = new_cmb2_box( array(
                'id'            => "{$this->prefix}_basic_details_metabox",
                'title'         => __( 'Basic Details', 'bshb-td' ),
                'object_types'  => array( $this->post_type ),
                'classes'       => array( $this->prefix ),
                'cmb_styles'    => false,
            )   );

            $basic_details_metabox->add_field( array(
                'id'            => "{$this->prefix}_basic_details_heading",
                'type'          => 'text',
                'render_row_cb' => array( $this, "render_basic_details_heading" ),
            )   );

            $basic_details_metabox->add_field( array(
                'id'            => "_{$this->prefix}_stock_rooms",
                'name'          => __( 'Stock Rooms', 'bshb-td' ),
                'type'          => 'text',
                'attributes'    => array(
                    'type'          => 'number',
                    'min'           => '1',
                    'max'           => '999',
                    'class'         => 'form-control',
                    'placeholder'   => 'Stock Rooms',
                ),
                'col_size'      => '8',
                'icon'          => 'fas fa-rupee-sign',
                'tip'           => __( 'Optional Description for this Service', 'bshb-td' ),
                'show_names'    => false,
                'before'        => array( $this, "before_field" ),
                'after'         => array( $this, "after_field" ),
            )   );

            $basic_details_metabox->add_field( array(
                'id'            => "_{$this->prefix}_headcount",
                'name'          => __( 'Head Count', 'bshb-td' ),
                'type'          => 'headcount',
                'attributes'    => array(
                    'type'          => 'number',
                    'min'           => '0',
                    'max'           => '10',
                    'readonly'      => 'readonly',
                ),
                'col_size'      => '12',
                'show_names'    => false,
                'before'        => array( $this, "before_field" ),
                'after'         => array( $this, "after_field" ),
            )   );

            $basic_details_metabox->add_field( array(
                'id'            => "_{$this->prefix}_los",
                'name'          => __( 'Length of Stay', 'bshb-td' ),
                'type'          => 'los',
                'attributes'    => array(
                    'type'          => 'number',
                    'min'           => '1',
                    'max'           => '10',
                    'readonly'      => 'readonly',
                ),
                'col_size'      => '12',
                'show_names'    => false,
                'before'        => array( $this, "before_field" ),
                'after'         => array( $this, "after_field" ),
            )   );

            $basic_details_metabox->add_field( array(
                'id'            => "_{$this->prefix}_rack_rate",
                'name'          => __( 'Rack Rate', 'bshb-td' ),
                'type'          => 'text',
                'attributes'    => array(
                    'type'          => 'number',
                    'min'           => '1',
                    'max'           => '99999',
                    'class'         => 'form-control',
                    'placeholder'   => 'Rack Rate',
                ),
                'col_size'      => '8',
                'icon'          => 'fas fa-rupee-sign',
                'tip'           => __( 'Optional Description for this Service', 'bshb-td' ),
                'show_names'    => false,
                'before'        => array( $this, "before_field" ),
                'after'         => array( $this, "after_field" ),
            )   );

            $basic_details_metabox->add_field( array(
                'id'            => "_{$this->prefix}_room_area",
                'name'          => __( 'Room Area', 'bshb-td' ),
                'type'          => 'text',
                'attributes'    => array(
                    'type'          => 'number',
                    'min'           => '1',
                    'max'           => '99999',
                    'class'         => 'form-control',
                    'placeholder'   => 'Room Area',
                ),
                'col_size'      => '8',
                'icon'          => 'fas fa-rupee-sign',
                'tip'           => __( 'Optional Description for this Service', 'bshb-td' ),
                'show_names'    => false,
                'before'        => array( $this, "before_field" ),
                'after'         => array( $this, "after_field" ),
            )   );

            
            $additional_details_metabox = new_cmb2_box( array(
                'id'            => "{$this->prefix}_additional_details_metabox",
                'title'         => __( 'Additional Details (Optional)', 'bshb-td' ),
                'object_types'  => array( $this->post_type ),
                'classes'       => array( $this->prefix ),
                'cmb_styles'    => false,
            )   );

            $additional_details_metabox->add_field( array(
                'id'            => "{$this->prefix}_additional_details_heading",
                'type'          => 'text',
                'render_row_cb' => array( $this, "render_additional_details_heading" ),
            )   );

            $additional_details_metabox->add_field( array(
                'id'            => "_{$this->prefix}_room_type_description",
                'name'          => __( 'Description', 'bshb-td' ),
                'type'          => 'textarea_small',
                'attributes'    => array(
                    'class'         => 'form-control',
                    'placeholder'   => 'Description',
                    'rows'          => '3',
                ), 
                'col_size'      => '12',
                'icon'          => 'fas fa-rupee-sign',
                'tip'           => __( 'Optional Description for this Service', 'bshb-td' ),
                'show_names'    => false,
                'before'        => array( $this, "before_field" ),
                'after'         => array( $this, "after_field" ),
            )   );

            $additional_details_metabox->add_field( array(
                'id'            => "_{$this->prefix}_deposit_percentage",
                'name'          => __( 'Deposit Percentage', 'bshb-td' ),
                'type'          => 'text',
                'attributes'    => array(
                    'type'          => 'number',
                    'min'           => '0',
                    'max'           => '99',
                    'class'         => 'form-control',
                    'placeholder'   => 'Deposit Percentage',
                ),
                'col_size'      => '8',
                'icon'          => 'fas fa-rupee-sign',
                'tip'           => __( 'Optional Description for this Service', 'bshb-td' ),
                'show_names'    => false,
                'before'        => array( $this, "before_field" ),
                'after'         => array( $this, "after_field" ),
            )   );

            $additional_details_metabox->add_field( array(
                'id'            => "_{$this->prefix}_non_cancellable",
                'name'          => __( 'Non Cancellable', 'bshb-td' ),
                'type'          => 'checkbox',
                'attributes'    => array(
                    'desc'          => 'Non Cancellable',
                ),
                'col_size'      => '8',
                'tip'           => __( 'Optional Description for this Service', 'bshb-td' ),
                'show_names'    => false,
                'before'        => array( $this, "before_field" ),
                'after'         => array( $this, "after_field" ),
            )   );

            $additional_details_metabox->add_field( array(
                'id'            => "_{$this->prefix}_non_taxable",
                'name'          => __( 'Non Taxable', 'bshb-td' ),
                'type'          => 'checkbox',
                'attributes'    => array(
                    'desc'          => 'Non Taxable',
                ),
                'col_size'      => '8',
                'tip'           => __( 'Optional Description for this Service', 'bshb-td' ),
                'show_names'    => false,
                'before'        => array( $this, "before_field" ),
                'after'         => array( $this, "after_field" ),
            )   );

            $additional_details_metabox->add_field( array(
                'id'            => "_{$this->prefix}_beds",
                'type'          => 'beds',
                'repeatable'    => true,
                'options'       => array(
                    'add_row_text'              => __( 'Add Bed', 'cmb2' ),
                    'remove_row_button_title'   => __( 'Delete Bed', 'cmb2' ),
                ),
                'col_size'      => '12',
                'before'        => array( $this, "before_field" ),
                'after'         => array( $this, "after_field" ),
            )   );

            $additional_details_metabox->add_field( array(
                'id'            => "_{$this->prefix}_beds",
                'name'          => __( 'Require Deposit', 'bshb-td' ),
                'type'          => 'beds',
                'repeatable'    => true,
                'options'       => array(
                    'add_row_text'              => __( 'Add Bed', 'cmb2' ),
                    'remove_row_button_title'   => __( 'Remove Bed', 'cmb2' ),
                ),
                'col_size'      => '12',
                'tip'           => __( 'Optional Description for this Service', 'bshb-td' ),
                'show_names'    => false,
                'before'        => array( $this, "before_field" ),
                'after'         => array( $this, "after_field" ),
            )   );

            $additional_details_metabox->add_field( array(
                'id'            => "{$this->prefix}_policies",
                'name'          => __( 'Policies/Rules', 'bshb-td' ),
                'type'          => 'text',
                'repeatable'    => true,
                'options'       => array(
                    'add_row_text'              => __( 'Add Policy', 'cmb2' ),
                    'remove_row_button_title'   => __( 'Remove Policy', 'cmb2' ),
                ),
                'col_size'      => '12',
                'tip'           => __( 'Optional Description for this Service', 'bshb-td' ),
                'show_names'    => false,
                'before'        => array( $this, "before_field" ),
                'after'         => array( $this, "after_field" ),
            )   );


            $order_metabox = new_cmb2_box( array(
                'id'            => "{$this->prefix}_room_type_order_metabox",
                'title'         => __( 'Order of Appearance', 'bshb-td' ),
                'object_types'  => array( $this->post_type ),
                'classes'       => array( $this->prefix ),
                'cmb_styles'    => false,
                'context'       => 'side',
            )   );

            $order_metabox->add_field( array(
                'id'            => "{$this->prefix}_room_type_order",
                'name'          => __( 'Order of Appearance', 'bshb-td' ),
                'type'          => 'text',
                'attributes'    => array(
                    'type'          => 'number',
                    'min'           => '0',
                    'max'           => '20',
                    'class'         => 'form-control',
                    'value'         => '0',
                ),
                'icon'          => 'fas fa-rupee-sign',
                'tip'           => __( 'Optional Description for this Service', 'bshb-td' ),
                'show_names'    => false,
                'before'        => array( $this, "before_field" ),
                'after'         => array( $this, "after_field" ),
            )   );        


            $gallery_metabox = new_cmb2_box( array(
                'id'            => "{$this->prefix}_gallery_metabox",
                'title'         => __( 'Room Gallery', 'bshb-td' ),
                'object_types'  => array( $this->post_type ),
                'classes'       => array( $this->prefix ),
                'cmb_styles'    => false,
                'context'       => 'side',
            )   );

            $gallery_metabox->add_field( array(
                'id'            => "_{$this->prefix}_gallery",
                'name'          => __( 'Room Gallery', 'bshb-td' ),
                'type'          => 'file_list',
                'preview_size'  => array( 50, 50 ),
                'text'          => array(
                    'add_upload_files_text' => 'Upload Images',
                    'file_text'             => 'Image',
                ),
                // 'col_size'      => '12',
                'tip'           => __( 'Optional Description for this Service', 'bshb-td' ),
                'show_names'    => false,
                // 'before'        => array( $this, "before_field" ),
                // 'after'         => array( $this, "after_field" ),
            )   );
        }
        
        public function render_basic_details_heading() {
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

        public function render_additional_details_heading() {
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

        public function before_field( $field_args, $field ) {
            ?>
                <div class="col-<?= $field->args( 'col_size' ); ?>">
                    <?php if (! empty( $field->args( 'icon' ) ) ) : ?>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="<?= $field->args( 'icon' ); ?>"></i>
                                </span>
                            </div>
                    <?php endif; ?>
            <?php
        }

        public function after_field( $field_args, $field ) {
            ?>
                    <?php if (! empty( $field->args( 'icon' ) ) ) : ?>
                        </div>
                    <?php endif; ?>

                    <?php if (! empty( $field->args( 'tip' ) ) ) : ?>
                        <p class="option-desc"><?= $field->args( 'tip' ); ?></p>
                    <?php endif; ?>
                </div>
            <?php
        }
    }
}
