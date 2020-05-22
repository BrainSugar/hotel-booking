<!--
 |
 | In $plugin you'll find an instance of Plugin class.
 | If you'd like can pass variable to this view, for example:
 |
 | return PluginClassName()->view( 'dashboard.index', [ 'var' => 'value' ] );
 |
-->

<div class="brainsugar wrap">

  <h1>User Agent demo</h1>

  <p>You may use <code>composer install wpbones/useragent</code> to extend WP Bones with a Mobile Detect Library.</p>

  <h2>Function</h2>

  <p>You will be able to use <code>wpbones_user_agent()</code> function to get an istance of Mobile Detect.</p>
  <p>For exampe</p>

  <pre>
    if(wpbones_user_agent()->isMobile()) {
      echo "You're by Mobile";
    } else {
      echo "You're by Desktop";
    }
  </pre>

  <?php if(wpbones_user_agent()->isMobile()) : ?>
    <strong>You're by Mobile</strong>
  <?php else : ?>
    <strong>You're by Desktop</strong>
  <?php endif; ?>

  <h2>Sample</h2>

  <pre>
    // Basic detection.
    wpbones_user_agent()->isMobile();
    wpbones_user_agent()->isTablet();

    // Magic methods.
    wpbones_user_agent()->isIphone();
    wpbones_user_agent()->isSamsung();
    // [...]

    // Alternative to magic methods.
    wpbones_user_agent()->is('iphone');

    // Find the version of component.
    wpbones_user_agent()->version('Android');
  </pre>

  <p>You may also</p>

  <pre>
    // Any mobile device (phones or tablets).
    if ( wpbones_user_agent()->isMobile() ) {

    }

    // Any tablet device.
    if( wpbones_user_agent()->isTablet() ){

    }

    // Exclude tablets.
    if( wpbones_user_agent()->isMobile() && !wpbones_user_agent()->isTablet() ){

    }

    // Check for a specific platform with the help of the magic methods:
    if( wpbones_user_agent()->isiOS() ){

    }

    if( wpbones_user_agent()->isAndroidOS() ){

    }

    // Alternative method is() for checking specific properties.
    // WARNING: this method is in BETA, some keyword properties will change in the future.
    wpbones_user_agent()->is('Chrome')
    wpbones_user_agent()->is('iOS')
    wpbones_user_agent()->is('UCBrowser')
    wpbones_user_agent()->is('Opera')
    // [...]
  </pre>


</div>