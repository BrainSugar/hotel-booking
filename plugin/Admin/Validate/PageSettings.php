<?php

namespace Brainsugar\Admin\Validate;

class PageSettings extends Validate
{
    protected $searchPage;
    protected $checkOutPage;
    protected $reservationConfirmation;

    public function __construct($options)
    {
        $this->searchPage = $options['search'];
        $this->checkOutPage = $options['check_out'];
        $this->reservationConfirmation = $options['reservation_confirmation'];
    }

    public function validate()
    {
        $this->validatePageSettings();
    }

    public function validatePageSettings()
    {
        if (isset($this->searchPage)) {
            $searchPage = absint($this->searchPage);
        }
        if (isset($this->checkOutPage)) {
            $checkOutPage = absint($this->checkOutPage);
        }
        if (isset($this->reservationConfirmation)) {
            $reservationConfirmation = absint($this->reservationConfirmation);
        }

        Brainsugar()->options->update([
                        'Pages' => [
                                'search' => $searchPage,
                                'check_out' => $checkOutPage,
                                'reservation_confirmation' => $reservationConfirmation,
                        ],
                        ]);
    }
}
