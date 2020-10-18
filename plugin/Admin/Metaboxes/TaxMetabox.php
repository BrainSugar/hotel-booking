<?php
namespace Brainsugar\Admin\Metaboxes;

if ( !class_exists( 'TaxMetabox' ) ) {
    class TaxMetabox extends MetaboxManager implements RenderMetaboxInterface {
        public function register_fields() {
            $tax_metabox = new_cmb2_box( array(
                'id'            => "{$this->prefix}_tax_metabox",
                'title'         => __( 'Tax Details', 'bshb-td' ),
                'object_types'  => array( $this->post_type ),
                'classes'       => array( $this->prefix ),
                'cmb_styles'    => false,
            )   );
            
            $tax_metabox->add_field( array(
                'id'            => "{$this->prefix}_heading",
                'type'          => 'text',
                'render_row_cb' => array( $this, "render_heading" ),
            )   );

            $tax_metabox->add_field( array(
                'id'            => "_{$this->prefix}_tax_percentage",
                'name'          => __( 'Tax Percentage', 'bshb-td' ),
                'type'          => 'text',
                'attributes'    => array(
                    'type'          => 'number',
                    'min'           => '1',
                    'max'           => '99',
                    'class'         => 'form-control',
                    'placeholder'   => 'Tax Percentage',
                    'required'      => 'required',
                ),
                'col_size'      => '8',
                'icon'          => 'fas fa-rupee-sign',
                'tip'           => __( 'Percentage of the Amount as Tax', 'bshb-td' ),
                'show_names'    => false,
                'before'        => array( $this, "before_field" ),
                'after'         => array( $this, "after_field" ),
            )   );

            $tax_metabox->add_field( array(
                'id'            => "_{$this->prefix}_tax_order",
                'name'          => __( 'Order', 'bshb-td' ),
                'type'          => 'text',
                'attributes'    => array(
                    'class'         => 'form-control',
                    'placeholder'   => 'Tax Order',
                    'type'          => 'number',
                    'min'           => '0',
                    'max'           => '9',
                ),
                'col_size'      => '8',
                'icon'          => 'fas fa-rupee-sign',
                'tip'           => __( 'Lower value will appear higher when displaying Tax', 'bshb-td' ),
                'show_names'    => false,
                'before'        => array( $this, "before_field" ),
                'after'         => array( $this, "after_field" ),
            )   );

            $tax_metabox->add_field( array(
                'id'            => "_{$this->prefix}_tax_description",
                'name'          => __( 'Tax Description', 'bshb-td' ),
                'type'          => 'textarea_small',
                'attributes'    => array(
                    'class'         => 'form-control',
                    'placeholder'   => 'Description',
                    'rows'          => '3',
                ),
                'col_size'      => '12',
                'icon'          => 'fas fa-rupee-sign',
                'tip'           => __( 'Optional Description for this Tax', 'bshb-td' ),
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
                            <?php esc_html_e( 'Tax Details', 'bshb-td' ) ?>
                        </h4>

                        <p class="metabox-sub-heading setting-desc">
                            <?php esc_html_e( 'Taxation Rules for the Hotel', 'bshb-td' ) ?>
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
