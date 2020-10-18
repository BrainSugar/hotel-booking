<?php
namespace Brainsugar\Admin\Columns;

if ( !interface_exists( 'RenderColumnsInterface' )) {
	interface RenderColumnsInterface {
		public function list_columns( $existing_columns );
		public function render_columns( $column );
	}
}
