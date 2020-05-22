<?php

namespace Brainsugar\Console;

use Brainsugar\WPBones\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
  protected $commands = [
    'Brainsugar\Console\Commands\SampleCommand',
  ];
}