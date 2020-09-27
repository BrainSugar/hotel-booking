<?php
namespace Brainsugar\Admin\Metaboxes;

use Brainsugar\CustomPostTypes\TaxCustomPostType;

class TaxMetabox extends ManageMetaboxes {
    protected $postType;
    protected $prefix;
    
    public function __construct() {
        $postType = TaxCustomPostType::getPostType();

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
        $tax_metabox = new_cmb2_box( array(
            'id'                => "{$this->prefix}_tax_metabox",
            'title'             => __( 'Tax Details', 'bshb-td' ),
            'object_types'      => array( $this->postType ),
            'classes'           => array( $this->prefix ),
            'cmb_styles'        => false,
        )   );
        
        $tax_metabox->add_field( array(
            'id'                => "{$this->prefix}_heading",
            'type'              => 'text',
            'render_row_cb'     => array( $this, "{$this->prefix}_render_heading" ),
        )   );

        $tax_metabox->add_field( array(
            'id'                => "_{$this->prefix}_tax_percentage",
            'name'              => __( 'Tax Percentage', 'bshb-td' ),
            'type'              => 'text',
            'attributes'        => array(
                'type'              => 'number',
                'min'               => '1',
                'max'               => '99',
                'class'             => 'form-control',
                'placeholder'       => 'Input a number 1-99',
                'required'          => 'required',
                'pattern'           => '\d*',
            ),
            'show_names'        => false,
            'before'            => function(){
                echo
                '<div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-percentage"></i>
                            </span>
                        </div>';
            },
            'after'             => function(){
                echo
                    '</div>
                    <p class="option-desc">The percentage of the Amount as Tax. A value of 20 means 20%</p>
                </div>';
            },
        )   );

        $tax_metabox->add_field( array(
            'id'                => "_{$this->prefix}_tax_order",
            'name'              => __( 'Order', 'bshb-td' ),
            'type'              => 'text',
            'attributes'        => array(
                'class'             => 'form-control',
                'placeholder'       => 'Input a number 0-9',
                'type'              => 'number',
                'min'               => '0',
                'max'               => '9',
            ),
            'show_names'        => false,
            'before'            => function(){
                echo
                '<div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-sort-numeric-down"></i>
                            </span>
                        </div>';
            },
            'after'             => function(){
                echo
                    '</div>
                <p class="option-desc">Optional order of appearance (lower comes first)</p>
                </div>';
            },
        )   );

        $tax_metabox->add_field( array(
            'id'                => "_{$this->prefix}_tax_description",
            'name'              => __( 'Tax Description', 'bshb-td' ),
            'type'              => 'textarea_small',
            'attributes'        => array(
                'class'             => 'form-control',
                'placeholder'       => 'Description',
                'rows'              => 2,
            ),
            'show_names'        => false,
            'before'            => function(){
                echo 
                '<div class="col-8">';
            },
            'after'             => function(){
                echo
                '<p class="option-desc">Optional Description for this Tax</p></div>';
            },
        )   );
    }

    public function bshb_render_heading() {
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
