<?php
/**
 * Search Form.
 *
 * This template can be overridden by copying it to {YOURTHEME}/bshb-template/
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
<!-- Search form -->
<form id="bshb-search-form" class="bshb-search-form" method="post" enctype="multipart/form-data">
        <div class="container-fluid">
                <div class="row">
                        <div class="col-sm-6">
                                <?php bshb_get_template_part('search-form/dates'); ?>
                        </div>
                        <div class="col-sm-3">
                                <?php bshb_get_template_part('search-form/guests'); ?>
                        </div>
                        <div class="col-sm-3 d-flex">
                                <?php bshb_get_template_part('search-form/button'); ?>
                        </div>
                </div>
        </div>
</form>
<!-- end search form -->
