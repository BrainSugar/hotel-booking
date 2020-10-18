<?php
namespace Brainsugar\Admin\Metaboxes;

if ( !interface_exists( 'RenderMetaboxInterface' )) {
	interface RenderMetaboxInterface {
		public function register_fields();
		public function hide_publishing_actions();
	}
}
