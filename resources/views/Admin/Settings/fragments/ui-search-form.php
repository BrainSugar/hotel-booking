<!--Settings Seciton -->
<div class="settings-section">
        <h4 class="font-weight-light"><?php esc_html_e( 'Search Form', 'bshb' ) ?></h4>
        <p class="setting-desc mb-4"><?php esc_html_e( 'Change the styling of your search form displayed in the frontend.', 'bshb' ) ?></p>
        <!-- General Info Row -->        
        <div class="row my-5">
        <?php bshb_get_template_part('search/search-form/button');?>
        </div>
</div>