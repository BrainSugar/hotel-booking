<?php

namespace Brainsugar\Providers;

use Brainsugar\WPBones\Support\ServiceProvider;


class CoreService extends ServiceProvider
{

  public function register()
  {
    // TODO
  }

  public static function formatCurrency($value) {
        $symbol = Brainsugar()->options->get( 'General.currency.symbol' );        

  }



}