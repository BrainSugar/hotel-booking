<?php

namespace Brainsugar\Repositories;

use Brainsugar\Model\Sessions;

class SessionRepository
{
    /**
     * Session model instance variable.
     *
     * @var object
     */
    protected $session;

    public function __construct()
    {
        $this->session = new Sessions();
        $this->_sessionStart();
    }

    /**
     * Start session.
     *
     * Start session if not already started and
     * set the session key
     *
     * @return void
     */
    private function _sessionStart()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
            $this->_setSessionKey();
        }
    }

    /**
     * Set session key.
     *
     * @return void
     */
    private function _setSessionKey()
    {
        if (is_user_logged_in()) {
            $this->set('bshb_session_key', \get_current_user());
        } else {
            $this->set('bshb_session_key', session_id());
        }
    }

    /**
     * Set session variable.
     *
     * @param string $value
     *
     * @return void
     */
    public function set(string $key, $value)
    {
        $_SESSION[$key] = $value;

        return true;
    }

    /**
     * Get session variable.
     *
     * @return void
     */
    public function get(string $key)
    {
        if ($this->has($key)) {
            return $_SESSION[$key];
        }

        return null;
    }

    /**
     * Unset session variable.
     *
     * @return bool
     */
    public function remove(string $key)
    {
        if ($this->has($key)) {
            unset($_SESSION[$key]);

            return true;
        }

        return false;
    }

    /**
     * Check if session variable exists.
     *
     * @return boolean
     */
    public function has(string $key)
    {
        return array_key_exists($key, $_SESSION);
    }

    /**
     * Save session to Model.
     *
     * save session to the model and set the session id.
     *
     * @return void
     */
    public function saveSession()
    {
        // transform search data
        $search = [
                        'check_in' => $this->get('bshb_check_in'),
                        'check_out' => $this->get('bshb_check_out'),
                        'adults' => $this->get('bshb_adults'),
                        'children' => $this->get('bshb_children'),
                ];
        // save serialized search data
        $this->session->session_key = $this->get('bshb_session_key');
        $this->session->session_value = \serialize($search);
        $this->session->save();

        // Get session Id from the data saved.
        $this->set('bshb_session_id', $this->session->id);
    }
}
