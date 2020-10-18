<?php
namespace Brainsugar\Admin\Metaboxes;

use Brainsugar\Admin\Collections\CollectionsRepository;

if ( !class_exists( 'ServiceMetabox' ) ) {
    class ServiceMetabox extends MetaboxManager implements RenderMetaboxInterface {
        public function register_fields() {
            $service_metabox = new_cmb2_box( array(
                'id'            => "_{$this->prefix}_service_metabox",
                'title'         => __( 'Service Details', 'bshb-td' ),
                'object_types'  => array( $this->post_type ),
                'classes'       => array( $this->prefix ),
                'cmb_styles'    => false,
            )   );

            $service_metabox->add_field( array(
                'id'            => "_{$this->prefix}_heading",
                'type'          => 'text',
                'render_row_cb' => array( $this, "render_heading" ),
            )   );

            $service_metabox->add_field( array(
                'id'            => "_{$this->prefix}_service_operation",
                'name'          => __( 'Operation', 'bshb-td' ),
                'type'          => 'select',
                'options_cb'    => function(){ return CollectionsRepository::get_service_operations(); },
                'attributes'    => array(
                    'class'         => 'form-control',
                    'required'      => 'required',
                ),
                'col_size'      => '8',
                'icon'          => 'fas fa-rupee-sign',
                'tip'           => __( 'How does this Service affect the Total Amount payable', 'bshb-td' ),
                'show_names'    => false,
                'before'        => array( $this, "before_field" ),
                'after'         => array( $this, "after_field" ),
            )   );

            $service_metabox->add_field( array(
                'id'            => "_{$this->prefix}_service_amount",
                'name'          => __( 'Amount', 'bshb-td' ),
                'type'          => 'text',
                'attributes'    => array(
                    'type'          => 'number',
                    'min'           => '1',
                    'max'           => '999999',
                    'class'         => 'form-control',
                    'placeholder'   => 'Amount',
                    'required'      => 'required',
                ),
                'col_size'      => '8',
                'icon'          => 'fas fa-rupee-sign',
                'tip'           => __( 'How much does this Service cost?', 'bshb-td' ),
                'show_names'    => false,
                'before'        => array( $this, "before_field" ),
                'after'         => array( $this, "after_field" ),
            )   );

            $service_metabox->add_field( array(
                'id'            => "_{$this->prefix}_service_availability",
                'name'          => __( 'Service Availability', 'bshb-td' ),
                'type'          => 'select',
                'attributes'    => array(
                    'class'         => 'form-control',
                ),
                'col_size'      => '8',
                'options_cb'    => function(){ return CollectionsRepository::get_service_availability(); },
                'icon'          => 'fas fa-rupee-sign',
                'tip'           => __( 'Is the Service available right now?', 'bshb-td' ),
                'show_names'    => false,
                'before'        => array( $this, "before_field" ),
                'after'         => array( $this, "after_field" ),
            )   );

            $service_metabox->add_field( array(
                'id'            => "_{$this->prefix}_service_description",
                'name'          => __( 'Service Description', 'bshb-td' ),
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
        }
        
        public function render_heading() {
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
