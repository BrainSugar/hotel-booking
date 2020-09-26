<?php

namespace Brainsugar\CustomTaxonomyTypes;

use Brainsugar\WPBones\Foundation\WordPressCustomTaxonomyTypeServiceProvider as ServiceProvider;

class Facilities extends ServiceProvider
{
	protected $id         	= 'bshb_facility_taxonomy';
	protected $name       	= 'Facility';
	protected $plural     	= 'Facilities';
	protected $objectType 	= 'bshb_room_type';
	protected $showTagcloud = true;

	public function boot()
	{
		
	}
}