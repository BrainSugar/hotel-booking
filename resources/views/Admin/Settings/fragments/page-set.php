<!--Settings Seciton -->
<div class="settings-section">
        <h4 class="font-weight-light"><?php esc_html_e( 'Set pages', 'bshb' ) ?></h4>
        <p class="setting-desc mb-4"><?php esc_html_e( 'Set pages for different end points.', 'bshb' ) ?></p>
        <!-- General Info Row -->        
        <hr>
        <div class="row my-5">
                <div class="col-sm-4">
                        <h5 class="font-weight-light">Search</h5>
                        <p class="setting-desc mb-4"><?php esc_html_e( 'Your search form will be displayed on this page.', 'bshb' ) ?></p>
                </div>
                <!-- Hotel Country -->
                <div class="col-sm-5 offset-1">
                        <div class="input-group">
                                <select name="Page/search" id="search_page" class="form-control">
                                        <option><?php esc_html_e( 'Select page', 'bshb' ); ?></option>
                                        <?php foreach($pages as $page) { ?>
                                        <option value="<?php echo $page->ID; ?>" <?php if (Brainsugar()->options->get( 'Pages.search' ) == $page->ID) echo ' selected="selected"';?>><?php echo get_the_title($page); ?></option>
                                        <?php } ?>
                                </select>
                        </div>
                        <p class="option-desc"><?php esc_html_e( 'If none displayed create page from the pages menu.', 'bshb' ) ?></p>
                </div>
                <!-- Hotel Country End -->
        </div>
</div>