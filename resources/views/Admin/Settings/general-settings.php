<div class="settings-container">
        <h2 class="font-weight-light"><?php esc_html_e('General Settings', 'bshb'); ?></h2>
        <?php echo Brainsugar()->view('Admin.Settings.fragments.general-hotel')->with('countries', $countries); ?>
        <?php echo Brainsugar()->view('Admin.Settings.fragments.general-currency')->with('currencies', $currencies)->with('currencyDisplay', $currencyDisplay); ?>
</div><!-- Settings container End -->


