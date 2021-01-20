<?php
/**
* Search Filters.
*
* This template can be overridden by copying it to {YOURTHEME}/bshb-template/search/
*
* @see http://docs.brainsugar.studio/hotel-booking/
*
* @author Brainsugar Studio
*
* @version 1.0
*/
if (!defined('ABSPATH')) {
    exit;  //Exit if accessed directly.
}
?>

<!-- Search Filters -->
<div class="row">
        <div class="col-sm-12">
                <div class="search-filters">
                <!-- List view js button -->
                        <button id="filter-list" class="filter" title="<?php esc_attr_e('List view', 'bshb-td'); ?>">
                                <i class="fad fa-list-ul"></i>
                        </button>
                <!-- Grid view js button -->
                        <button id="filter-grid" class="filter" title="<?php esc_attr_e('Grid view', 'bshb-td'); ?>">
                                <i class="fad  fa-th-large "></i>
                        </button>
                <!-- Price sorting js button -->
                        <div class="price-sort">
                                <button class="filter" title="<?php esc_attr_e('Price sort', 'bshb-td'); ?>" id="price-sort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fad fa-filter"></i>
                                        <span class="dropdown-menu" aria-labelledby="price-sort">
                                                <span id="sort-desc" class="dropdown-item" title="<?php esc_attr_e('Sort by highest price.', 'bshb-td'); ?>"><?php esc_html_e('Highest Price First', 'bshb-td'); ?></span>
                                                <span id="sort-asc" class="dropdown-item" title="<?php esc_attr_e('Sort by lowest price.', 'bshb-td'); ?>"><?php esc_html_e('Lowest Price First', 'bshb-td'); ?></span>
                                        </span>
                                </button>
                        </div>
                <!-- end Price sorting -->
                <!-- Price filtering js button -->
                        <div class="price-filter">
                                <button class="filter" title="<?php esc_attr_e('Price filters', 'bshb-td'); ?>" id="price-filter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fad fa-funnel-dollar"></i>
                                        <span class="dropdown-menu" aria-labelledby="price-filter">
                                                <span id="price-total" class="dropdown-item" title="<?php esc_attr_e('Total price for stay dates', 'bshb-td'); ?>"><?php esc_html_e('Show Prices for duration of stay.', 'bshb-td'); ?></span>
                                                <span id="price-night" class="dropdown-item" title="<?php esc_attr_e('Prices per night', 'bshb-td'); ?>"><?php esc_html_e('Show price for 1 night.', 'bshb-td'); ?></span>
                                        </span>
                                </button>
                        </div>
                <!--end Price filtering js button -->
                </div>
        </div>
</div>
<!-- End Price Filters -->