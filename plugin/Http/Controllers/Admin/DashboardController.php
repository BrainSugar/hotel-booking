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
        
        public function index(){
                
                return Brainsugar()
                ->view('dashboard.dashboard')
                ->withAdminStyles('app')
                ->withAdminScripts('dashboard-calendar');
                
        }
}