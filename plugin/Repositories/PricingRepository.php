<?php

namespace Brainsugar\Repositories;

use Brainsugar\Model\Coupon;
use Brainsugar\Model\Pricing;
use Brainsugar\Model\Tax;
use Carbon\Carbon;

class PricingRepository
{
    /**
     * Instance of pricing model.
     *
     * @var object
     */
    protected $roomPrices;
    /**
     * Instance of coupon model.
     *
     * @var object
     */
    protected $coupons;

    /**
     * Instance of tax model.
     *
     * @var object
     */
    protected $tax;

    protected $services;

    public function __construct()
    {
        $this->tax = new Tax();
        $this->coupons = new Coupon();
        $this->roomPrices = new Pricing();
    }

    /**
     * Get the pricing table of rooms.
     *
     * Eloquent queries can be run on this function.
     */
    public function getRoomPrices()
    {
        return $this->roomPrices;
    }

    /**
     * Get room price for given dates.
     *
     * Calculates rack rate or custom pricing for each given dates ,
     * for the specified room. returns price per night , nights and total.
     *
     * @return array
     */
    public function getRoomPrice(int $roomType, string $checkIn, string $checkOut)
    {
        $total = 0;
        $prices = [];
        $rackRate = get_post_meta($roomType, 'bshb_rack_rate', true);

        $startDate = Carbon::parse($checkIn);
        $endDate = Carbon::parse($checkOut);

        // loop for each date
        while ($startDate->lessThan($endDate)) {
            // get custom price if applied
            $price = $this->roomPrices
                ->where('room_type', $roomType)
                ->whereRaw('? between start_date and end_date', $startDate->toDateString())
                ->value('price');

            // if no custom price set then push rack rate
            if ($price != null) {
                $prices[$startDate->toDateString()] = $price;
            } else {
                $prices[$startDate->toDateString()] = $rackRate;
            }
            $startDate->addDay(1);
        }

        // number of nights
        $nights = count($prices);

        // sum of prices for each day
        foreach ($prices as $key => $value) {
            $total = $total + $value;
        }
        $pricePerNight = $total / $nights;

        $response = [
                'total' => $total,
                'nights' => $nights,
                'pricePerNight' => $pricePerNight,
        ];

        return $response;
    }

    /**
     * Add price range.
     *
     * set custom price for the given dates for a specific room type
     *
     * @return bool
     */
    public function addRoomPriceRange(int $roomType, float $price, string $startDate, string $endDate)
    {
        // Check if there are overlapping price ranges before inserting into DB
        $this->_checkOverlap($roomType, $startDate, $endDate);

        // If the Given price range doesn't lie between any previous range then insert into DB.
        $this->roomPrices->fill([
                        'room_type' => $roomType,
                        'price' => $price,
                        'start_date' => $startDate,
                        'end_date' => $endDate,
                ]);
        $response = $this->roomPrices->save();

        return $response;
    }

    /**
     * Delete price range.
     *
     * Deletes the custom price set for any dates in the date range.
     *
     * @return bool
     */
    public function deleteRoomPriceRange(int $roomType, string $startDate, string $endDate)
    {
        $response = $this->_checkOverlap($roomType, $startDate, $endDate);

        return $response;
    }

    /**
     * Check overlapping ranges.
     *
     * check for overlapping ranges in a specified price range ,
     * if given range has overlaps another range or many other ranges then destroys them ,
     * clearing the specified date range and dividing the overlapping ranges
     * with new end or start dates if required
     *
     * @return bool
     */
    private function _checkOverlap(int $roomType, string $startDate, string $endDate)
    {
        // Check if the given range overlaps with the other ranges.
        // Get all the ranges with the same room type.
        $allRanges = $this->roomPrices->where('room_type', $roomType)->get();

        foreach ($allRanges as $range) {
            $checkStart = Carbon::parse($startDate)->between($range->start_date, $range->end_date);
            $checkEnd = Carbon::parse($endDate)->between($range->start_date, $range->end_date);

            // If the start date lies between any of the previous price ranges.
            if ($checkStart == true) {
                $leftRangeStart = Carbon::parse($range->start_date);
                $leftRangeEnd = Carbon::parse($startDate)->subDay();

                if ($leftRangeStart <= $leftRangeEnd) {
                    $this->roomPrices->create([
                                                        'room_type' => $roomType,
                                                        'price' => $range->price,
                                                        'start_date' => $leftRangeStart,
                                                        'end_date' => $leftRangeEnd,
                                                ]);
                }
            }

            //  If the end date lies between any of the previous price ranges.
            if ($checkEnd == true) {
                $rightRangeStart = Carbon::parse($endDate)->addDay();
                $rightRangeEnd = Carbon::parse($range->end_date);

                if ($rightRangeStart <= $rightRangeEnd) {
                    $this->roomPrices->create([
                                                'room_type' => $roomType,
                                                'price' => $range->price,
                                                'start_date' => $rightRangeStart,
                                                'end_date' => $rightRangeEnd,
                                        ]);
                }
            }
            // If either of the dates lies between the current looping range then delete the range.
            if ($checkStart == true || $checkEnd == true) {
                $this->roomPrices->destroy($range->id);
            }
            // If there are any other price ranges between the current price range then delete them.
            if ($range->start_date >= $startDate && $range->end_date <= $endDate) {
                $this->roomPrices->destroy($range->id);
            }
        }

        return true;
    }

    /**
     * Apply Discount.
     *
     * apply discount of the specified couponId with the price specified
     *
     * @return float
     */
    public function applyDiscount(float $price, int $coupon)
    {
        $discountType = $this->coupons->getCouponType($coupon);
        $discount = $this->coupons->getCouponDiscount($coupon);

        if ($discountType == 'percentage') {
            $discount = $price * $discount / 100;
        }

        $discountedPrice = $price - $discount;

        return $discountedPrice;
    }

    /**
     * Apply taxes.
     *
     * Apply enabled taxes on the specifed price
     *
     * @return array
     */
    public function applyTaxes(float $price)
    {
        $taxes = $this->tax->getTaxes();
        $response = false;

        if (!empty($taxes)) {
            $taxData = [];
            $taxAmounts = [];

            foreach ($taxes as $tax) {
                $taxRate = get_post_meta($tax->ID, '_bshb_tax_percentage', true);
                $taxAmount = $price * $taxRate / 100;

                array_push($taxAmounts, $taxAmount);
                array_push($taxData, [
                        'tax' => $taxAmount,
                        'tax_rate' => $taxRate.'%',
                        'tax_name' => $tax->post_title,
                ]);
            }

            $totalTaxAmount = array_sum($taxAmounts);
            $totalAfterTaxesApplied = $totalTaxAmount + $price;

            $response = [
                        'tax_data' => $taxData,
                        'total' => $totalAfterTaxesApplied,
                ];
        }

        return $response;
    }
}
