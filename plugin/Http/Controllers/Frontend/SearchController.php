<?php 

namespace Brainsugar\Http\Controllers\Frontend;

use Brainsugar\Http\Controllers\Controller;
use Brainsugar\Providers\TemplateServiceProvider;
// use Brainsugar\Model\Pricing;
// use Brainsugar\Core\CoreFunctions;

class SearchController extends Controller
{
        public function showSearchResults() {
                $templateService = new TemplateServiceProvider();
                return $templateService->loadTemplate('bshb_room');
               
        }
}