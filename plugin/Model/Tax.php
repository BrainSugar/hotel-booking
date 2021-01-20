<?php

namespace Brainsugar\Model;

class Tax
{

    /**
     * Get all published taxes.
     *
     * @return object
     */
    public function getTaxes(string $fields = null)
    {
        $response = get_posts(
                        [
                                'post_type' => 'bshb_tax',
                                'fields' => $fields,
                                'status' => 'published',
                                ]
                        );

        return $response;
    }
}
