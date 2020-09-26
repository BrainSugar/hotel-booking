<?php
namespace Brainsugar\Admin\Fields;

use Brainsugar\Model;

class Los { 
    public function __construct() {
		add_action( 'cmb2_render_los', array( __CLASS__, 'render' ) , 10, 5 );
    }
    
    public static function render( $field, $value, $object_id, $object_type, $field_type ) {
		self::render_html( $field, $value, $object_id, $object_type, $field_type ); 
    }

    public static function render_html( $field, $value, $object_id, $object_type, $field_type ){
		$value = wp_parse_args( $value, array(
            'min_los'   => '1',
            'max_los'   => '0',
        )   );
        ?>
            <div class="row">
                <div class="col-6">
                    <div class="d-flex align-items-center">
                        <span class="minus cursor-pointer">
                            <i class='fad fa-minus'></i>
                        </span>
                        
                        <?php echo $field_type->input( array(
                            'name'      => $field_type->_name( '[min_los]' ),
                            'value'     => $value['min_los'],
                            'class'     => 'quantity-number',
                            'type'		=> 'text_number',
                        ) ); ?> 
                        
                        <span class="plus cursor-pointers">
                            <i class='fad fa-plus'></i>
                        </span>
                    </div>

                    <div>
                        <p class="option-desc">Minimum Length of Stay (In Days). Minimum cannot be lower than 1</p>
                    </div>
                </div>
            
                <div class="col-6">
                    <div class="d-flex align-items-center">
                        <span class="minus cursor-pointer">
                            <i class='fad fa-minus'></i>
                        </span>
                        
                        <?php echo $field_type->input( array(
                            'name'      => $field_type->_name( '[max_los]' ),
                            'value'     => $value['max_los'],
                            'class'     => 'quantity-number',
                            'type'		=> 'text_number',
                        ) ); ?> 
                        
                        <span class="plus cursor-pointers">
                            <i class='fad fa-plus'></i>
                        </span>
                    </div>

                    <div>
                        <p class="option-desc">Maximum Length of Stay (In Days). 0 = removes this condition</p>
                    </div>
                </div>
            </div>
        <?php
        echo $field_type->_desc( true );
	}
}