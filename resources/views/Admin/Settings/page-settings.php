<div class="settings-container">
        <h2 class="font-weight-light"><?php esc_html_e( 'Page Settings', 'bshb' ) ?></h2>
        <?php echo Brainsugar()->view( 'Admin.Settings.fragments.page-set' )->with('pages', $pages);?>
</div>