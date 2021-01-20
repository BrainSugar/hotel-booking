<?php

namespace Brainsugar\Providers;

use Brainsugar\Repositories\SessionRepository;
use Brainsugar\WPBones\Support\ServiceProvider;

class SessionServiceProvider extends ServiceProvider
{
    protected $session;

    public function __construct()
    {
        $this->session = new SessionRepository();
    }

    public function register()
    {
        add_action('wp_logout', [$this, '_unsetSessionKey'], 10, 0);
        add_action('wp_login', [$this, '_unsetSessionKey'], 10, 0);
    }

    public function _unsetSessionKey()
    {
        $this->session->remove('bshb_session_key');
    }
}
