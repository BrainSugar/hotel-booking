<?php
namespace Brainsugar\Admin\Fields;

use Brainsugar\Model;

class Deposits { 
    public function __construct() {
		add_action( 'cmb2_render_deposits', array( __CLASS__, 'render' ) , 10, 5 );
    }
    
    public static function render( $field, $value, $object_id, $object_type, $field_type ) {
		self::render_html( $field, $value, $object_id, $object_type, $field_type ); 
    }

    public static function render_html( $field, $value, $object_id, $object_type, $field_type ){
		$value = wp_parse_args( $value, array(
            'require_deposit'  => 'false',
            'deposit_amount'   => '0',
        )   );
        ?>
            <div class="row">
                <div class="col-6">
                    <div class="require_deposit_field">
                        <?php echo $field_type->input( array(
                            'name'      => $field_type->_name( '[require_deposit]' ),
                            'value'     => $value['require_deposit'],
                            'class'     => '',
                            'type'		=> 'checkbox',
                            'desc'      => 'Require Deposit?'
                        ) ); ?>

                        <div>
                            <p class="option-desc">If checked, a Deposit amount will be required on Booking</p>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="deposit_amount_field">
                        <?php echo $field_type->input( array(
                            'name'      => $field_type->_name( '[deposit_amount]' ),
                            'value'     => $value['deposit_amount'],
                            'class'     => 'form-control',
                            'type'		=> 'text_number',
                        ) ); ?> 

                        <div>
                            <p class="option-desc">Deposit Amount in percentage. A value of 20 means 20%</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        echo $field_type->_desc( true );
	}
}