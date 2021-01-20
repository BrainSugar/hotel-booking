<?php

namespace Brainsugar\Providers;

use Brainsugar\WPBones\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * API namespace.
     *
     * @var string
     */
    protected $namespace = 'bshb/v1';

    public function register()
    {
        add_action('rest_api_init', [$this, 'registerRoutes'], 10, 0);
    }

    /**
     * Register api endpoints.
     *
     * @return void
     */
    public function registerRoutes()
    {
        $endPoints = [];
        // Enable extension hooks
        $endPoints = apply_filters('bshb_register_endpoints', $endPoints);

        foreach ($endPoints as $key => $value) {
            register_rest_route($this->namespace, $value->endPoint, $value->methods);
        }

        return $endPoints;
    }
}
