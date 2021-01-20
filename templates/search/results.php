<?php
/**
 * Search Results.
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
<!-- Search results -->
<div class="bshb-search-results">
        <div class="container-fluid">
                <div class="row">
                        <div class="col-sm-12">
                                <div class="search-filters" id="bshb-search-filters">
                                        <?php bshb_get_template_part('search/filters'); ?>
                                </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-8">
                                <div class = "search-content" id="bshb-search-content">
                                        <?php bshb_get_template_part('search/landing'); ?>
                                </div>
                        </div>
                        <div class="col-sm-4">
                                <div class="search-sidebar" id="bshb-search-sidebar">
                                        <?php bshb_get_template_part('search/sidebar'); ?>
                                </div>
                        </div>
                </div>
        </div>
</div>
<!-- end search results -->