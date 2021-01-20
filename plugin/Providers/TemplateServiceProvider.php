<?php

namespace Brainsugar\Providers;

use Brainsugar\WPBones\Support\ServiceProvider;

class TemplateServiceProvider extends ServiceProvider
{
    public function register()
    {
        add_action('template_include', [$this, 'loadTemplate'], 10, 5);

        //   Register all the template functions for the frontend
        include plugin_dir_path(__DIR__).'Core/TemplateFunctions.php';
    }

    /**
     * Loads the Template.
     *
     * Check which is the current page and call the template.
     *
     * @param [type] $template
     *
     * @return void
     */
    public function loadTemplate(string $template)
    {
        // Pages set by the user.
        $searchPage = Brainsugar()->options->get('Pages.search');
        $checkOutPage = Brainsugar()->options->get('Pages.check_out');
        $reservationConfirmation = Brainsugar()->options->get('Pages.reservation_confirmation');

        // If is page then return page templates or return default.
        if (is_page()) {
            // Get page id for all the frontend pages.
            $pageId = get_the_ID();

            switch ($pageId) {
                                // Load the template for search page.
                                case $searchPage:
                                         return $this->_getTemplate('search-page');
                               
                                // Load the template for checkout page.
                                case $checkOutPage:
                                        return $this->_getTemplate('checkout-page');
                               
                                 // Load the template for Reservation confirmation.
                                case $reservationConfirmation:
                                        do_action('bshb_reservation_end_point');

                                        return $this->_getTemplate('reservation-confirmation');
                                
                                // Return the default page template.
                                default:
                                return $template;
                        }
        }

        // If is single display templates for Cpt's.
        if (is_single()) {
            // Get post type for cpt pages
            $postId = get_post_type();

            if ($postId == 'bshb_room') {
                return $this->_getTemplate('single-room-type');
            } else {
                return $template;
            }
        }
        // If none of the above pages return the template.
        return $template;
    }

    /**
     * getTemplate.
     *
     * Checks the Theme folder for the template , if not found loads the plugin template.
     *
     * @param [type] $template
     *
     * @return void
     */
    private function _getTemplate(string $template)
    {
        // Get the template slug
        $template_slug = rtrim($template, '.php');
        $template = $template_slug.'.php';

        // Check if a custom template exists in the theme folder, if not, load the plugin template file
        if ($theme_file == locate_template(['bshb-template/'.$template])) {
            $file = $theme_file;
        } else {
            $file = BSHB_BASE_PATH.'templates/'.$template;
        }

        return $file;
    }
}
