<?php

namespace Brainsugar\Providers;

use Brainsugar\WPBones\Support\ServiceProvider;


class CoreServiceProvider extends ServiceProvider
{

  public function register()
  {
    // TODO
  }

  public function formatCurrency($value) {
          Brainsugar()->options->get( 'General.hotel_currency' );

  }



}