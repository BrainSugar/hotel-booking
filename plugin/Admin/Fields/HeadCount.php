<?php
namespace Brainsugar\Admin\Fields;

use Brainsugar\Model;

class HeadCount { 
    public function __construct() {
		add_action( 'cmb2_render_headcount', array( __CLASS__, 'render' ) , 10, 5 );
    }
    
    public static function render( $field, $value, $object_id, $object_type, $field_type ) {
		self::render_html( $field, $value, $object_id, $object_type, $field_type ); 
    }

    public static function render_html( $field, $value, $object_id, $object_type, $field_type ){
		$value = wp_parse_args( $value, array(
            'max_adults'     => '2',
            'max_children'   => '1',
        )   );
        ?>
            <div class="row">
                <div class="col-6">
                    <div class="d-flex align-items-center">
                        <span class="minus cursor-pointer">
                            <i class='fad fa-minus'></i>
                        </span>
                        
                        <?php echo $field_type->input( array(
                            'name'      => $field_type->_name( '[max_adults]' ),
                            'value'     => $value['max_adults'],
                            'class'     => 'quantity-number',
                            'type'		=> 'text_number',
                        ) ); ?> 
                        
                        <span class="plus cursor-pointers">
                            <i class='fad fa-plus'></i>
                        </span>
                    </div>

                    <div>
                        <p class="option-desc">Maximum number of Adults allowed in this room type</p>
                    </div>
                </div>

                <div class="col-6">
                    <div class="d-flex align-items-center">
                        <span class="minus cursor-pointer">
                            <i class='fad fa-minus'></i>
                        </span>
                        
                        <?php echo $field_type->input( array(
                            'name'      => $field_type->_name( '[max_children]' ),
                            'value'     => $value['max_children'],
                            'class'     => 'quantity-number',
                            'type'		=> 'text_number',
                        ) ); ?> 
                        
                        <span class="plus cursor-pointers">
                            <i class='fad fa-plus'></i>
                        </span>
                    </div>

                    <div>
                        <p class="option-desc">Maximum number of Children allowed in this room type</p>
                    </div>
                </div>
            </div>

        <?php
        echo $field_type->_desc( true );
	}
}