<?php

namespace Brainsugar\Http\Controllers\Admin;

use Brainsugar\Http\Controllers\Controller;
use Brainsugar\PureCSSTabs\PureCSSTabsProvider;
use Brainsugar\PureCSSSwitch\PureCSSSwitchProvider;
use Brainsugar\WPBones\Foundation\Log\Log;
use Carbon_Fields\Field;
use Carbon_Fields\Container;


class DashboardController extends Controller
{
        
/**
 * Define the metabox and field configurations.
 */
public function placeholder(){
        // get events
        // localize
        
                return Brainsugar()
            ->view('dashboard.dashboard')
            ->withAdminStyles('app')
            ->withAdminScripts('dashboard-calendar');
            
}
}