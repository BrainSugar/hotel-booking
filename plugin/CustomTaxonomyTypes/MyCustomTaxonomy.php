<?php

namespace Brainsugar\CustomTaxonomyTypes;

use Brainsugar\WPBones\Foundation\WordPressCustomTaxonomyTypeServiceProvider as ServiceProvider;

class MyCustomTaxonomy extends ServiceProvider
{

  protected $id         = 'wp_kirk_tax';
  protected $name       = 'Ship';
  protected $plural     = 'Ships';
  protected $objectType = 'wp_kirk_cpt';

}