<?php
namespace Brainsugar\Admin\Fields;

use Brainsugar\Admin\Collections\CollectionsList;

class Beds { 
    public function __construct() {
        add_action( 'cmb2_render_beds',array( __CLASS__, 'render' ) , 10, 5 );
    }

    public static function render( $field, $value, $object_id, $object_type, $field_type ) {
		self::render_html( $field, $value, $object_id, $object_type, $field_type ); 
    }
    
    public static function render_html( $field, $value, $object_id, $object_type, $field_type ) {            
        $value = wp_parse_args( $value, array(
            'bed'       => '',
            'quantity'  => '',
        )   );
        ?>
    
        <div style="display:flex; flex-wrap: nowrap;">
            <div style="flex-direction: column;">
                <p>
                    <label for="<?php echo $field_type->_id( '_bed' ); ?>'">Bed</label>
                </p>

                <?php echo $field_type->select( array(
                    'name'      => $field_type->_name( '[bed]' ),
                    'id'        => $field_type->_id( '_bed' ),
                    'options'   => self::get_beds_as_options( $value['bed'] ),
                    'value'     => $value['bed'],
                    'class'     => 'cmb_text_small',
                ) ); ?> 
            </div>
            
            <div style="flex-direction: column; margin-left: 1rem;">
                <p>
                    <label for="<?php echo $field_type->_id( '_quantity' ); ?>'">Quantity</label>
                </p>

                <?php echo $field_type->input( array(
                    'name'      => $field_type->_name( '[quantity]' ),
                    'id'        => $field_type->_id( '_quantity' ),
                    'value'     => $value['quantity'],
                    'type'      => 'number',
                    'class'     => 'cmb_text_small',
                    'max'       => '5',
                    'min'       => '1',
                ) ); ?>
            </div>
        </div>
        
        <br class="clear">
        
        <?php
        echo $field_type->_desc( true );
    }
    
    public static function get_beds_as_options( $selected_option = '' ) {
        $the_array = CollectionsList::bshb_get_beds();
        $the_options =  '';

        foreach ( $the_array as $value ) {
            $the_options .= '<option value="'. $value .'"' . ( $selected_option == $value ? 'selected' : '' ) . '>'. $value .'</option>';
        }

        return $the_options;
    }

}