<?php

namespace Brainsugar\Widgets;

use Brainsugar\WPBones\Support\Widget;

class MyWidget extends Widget
{

  /**
   * Base ID for the widget, lower case, if left empty a portion of the widget's class name will be used. Has to be
   * unique.
   *
   * @var string
   */
  public $id_base = 'wpkirk-demo-widget';

  /**
   * Name for the widget displayed on the configuration page.
   *
   * @var string
   */
  public $name = 'Brainsugar Widget';

  /**
   * Optional. Passed to wp_register_sidebar_widget()
   *
   * - description: shown on the configuration page
   * - classname
   *
   * @var array
   */
  public $widget_options = [
    'description' => 'Brainsugar Demo Widget Description'
  ];

  /**
   * Optional. Passed to wp_register_widget_control()
   *
   * - width: required if more than 250px
   * - height: currently not used but may be needed in the future
   *
   * @var array
   */
  public $control_options = [
    'width'  => 400,
    'height' => 350,
  ];

  public function update( $new_instance, $old_instance )
  {
    $old_instance[ 'title' ] = ( $new_instance[ 'title' ] );

    return $old_instance;
  }

  /**
   * Retrun a key pairs array with the default value for widget.
   *
   * @return array
   */
  public function defaults()
  {
    return [
      'title' => 'My Title',
    ];
  }

  public function viewForm( $instance )
  {
    $instance = array_merge( $this->defaults(), $instance );

    return Brainsugar()->view( 'widgets.form' )
                   ->with( [ 'instance' => $instance, 'widget' => $this ] );
  }

  public function viewWidget( $args, $instance )
  {
    return Brainsugar()->view( 'widgets.index' )
                   ->with( [ 'args' => $args, 'instance' => $instance ] )
                   ->withStyles( 'brainsugar-widget' );
  }


}