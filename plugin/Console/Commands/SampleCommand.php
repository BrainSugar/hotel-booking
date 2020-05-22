<?php

namespace Brainsugar\Console\Commands;

use Brainsugar\WPBones\Console\Command;

class SampleCommand extends Command
{

  protected $signature = 'wpkirk:sample {--name= : Display your name}';

  protected $description = 'Example of bones command';

  public function handle()
  {
    if( $this->options( 'name' ) ) {
      $this->line( 'Hello, ' . $this->options( 'name' ) );
    } else {
      $this->line( 'Hello, World!' );
    }
  }
}