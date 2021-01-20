<?php

namespace Brainsugar\Repositories;

use Brainsugar\Model\Coupon;
use Brainsugar\Model\ReservationCart;

class CartRepository
{
    /**
     * Instance of Reservation Cart.
     *
     * @var object
     */
    protected $cart;

    /**
     * Instance of SessionRepository.
     *
     * @var object
     */
    protected $session;

    /**
     * Instance of PricingRepository.
     *
     * @var object
     */
    protected $pricing;

    /**
     * Instance of coupon model.
     *
     * @var [type]
     */
    protected $coupon;

    /**
     * Current session ID.
     *
     * @var int
     */
    protected $sessionId;

    public function __construct()
    {
        $this->cart = new ReservationCart();
        $this->session = new SessionRepository();
        $this->pricing = new PricingRepository();
        $this->coupon = new Coupon();
        $this->sessionId = $this->session->get('bshb_session_id');
    }

    /**
     * Get Cart Model.
     *
     * Collection methods can be performed on this variable.
     *
     * @return void
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Add item to cart table.
     *
     * @return bool
     */
    public function addItem(int $itemId, int $itemQuantity, string $itemType)
    {
        $itemExists = $this->cart->where('session_id', $this->sessionId)->where('item_id', $itemId)->first();

        if ($itemExists == null) {
            $this->cart->session_id = $this->sessionId;
            $this->cart->item_id = $itemId;
            $this->cart->item_type = $itemType;
            $this->cart->item_quantity = $itemQuantity;
            $this->cart->item_total = $this->_getItemTotal($itemId, $itemQuantity, $itemType);

            $response = $this->cart->save();
        } else {
            $response = $this->_updateItem($itemId, $itemQuantity, $itemType);
        }

        return $response;
    }

    /**
     * Remove item from the cart table.
     *
     * @return bool
     */
    public function removeItem(int $itemId, string $itemType)
    {
        $item = $this->cart->where('session_id', $this->sessionId)->where('item_id', $itemId)->first();
        $storedQuantity = $item['item_quantity'];

        if ($storedQuantity == 1) {
            $response = $this->cart->where('session_id', $this->sessionId)->where('item_id', $itemId)->delete();
        } else {
            $itemQuantity = $storedQuantity - 1;
            $itemTotal = $this->_getItemTotal($itemId, $itemQuantity, $itemType);

            $response = $this->cart
                        ->where('session_id', $this->sessionId)
                        ->where('item_id', $itemId)
                        ->update(['item_quantity' => $itemQuantity, 'item_total' => $itemTotal]);
        }

        return $response;
    }

    /**
     * Update the quantity and total of item if already stored.
     *
     * @return bool
     */
    private function _updateItem(int $itemId, int $itemQuantity, string $itemType)
    {
        $quantity = $this->_getQuantity($itemId, $itemQuantity);
        $itemTotal = $this->_getItemTotal($itemId, $quantity, $itemType);

        $response = $this->cart
                ->where('session_id', $this->sessionId)
                ->where('item_id', $itemId)
                ->update(['item_quantity' => $quantity, 'item_total' => $itemTotal]);

        return $response;
    }

    /**
     * Get quantity of items.
     *
     * add the items to the stored items in the cart table
     *
     * @return int
     */
    private function _getQuantity(int $itemId, int $quantity)
    {
        $storedItems = $this->cart->select('item_quantity')
                ->where('session_id', $this->sessionId)
                ->where('item_id', $itemId)
                ->value('item_quantity');

        $newQuantity = $storedItems + $quantity;

        return $newQuantity;
    }

    /**
     * Get the price for items.
     *
     * get the total for room items or service items multiplied by quantity
     *
     * @return float
     */
    private function _getItemTotal(int $itemId, int $quantity, string $itemType)
    {
        $startDate = $this->session->get('bshb_check_in');
        $endDate = $this->session->get('bshb_check_out');

        if ($itemType == 'room_item') {
            $roomPrice = $this->pricing->getRoomPrice($itemId, $startDate, $endDate);
        }

        $response = $roomPrice['total'] * $quantity;

        return $response;
    }

    /**
     * Get the cart total for this session.
     *
     * @return array|false
     */
    public function getCartTotal()
    {
        $subTotal = $this->cart->where('session_id', $this->sessionId)->sum('item_total');

        if ($subTotal == 0) {
            return false;
        }

        $total = $this->_calculateCartTotal($subTotal);

        return [
                        'discount' => $total['discount'],
                        'tax' => $total['tax_data'],
                        'sub_total' => $subTotal,
                        'total' => $total['total'],
                ];
    }

    /**
     * Calculate the total.
     *
     * check if coupon applied , if applied calculate tax on the discounted amount
     * or else calculate taxes on the subtotal.
     *
     * @return void
     */
    private function _calculateCartTotal(float $subTotal)
    {
        $coupon = $this->session->get('bshb_coupon');

        if ($coupon) {
            $discountedTotal = $this->pricing->applyDiscount($subTotal, $coupon);
            $discount = $subTotal - $discountedTotal;
            $total = $this->pricing->applyTaxes($discountedTotal);
            $total['discount'] = $discount;

            return $total;
        }

        $total = $this->pricing->applyTaxes($subTotal);
        $total['discount'] = false;

        return $total;
    }

    /**
     * Set coupon.
     *
     * Check if coupon is valid , if valid get coupon message
     *
     * @return string|bool
     */
    public function setCoupon(string $couponCode)
    {
        $couponId = $this->coupon->checkCouponValidity($couponCode);

        if ($couponId) {
            $this->session->set('bshb_coupon', $couponId);

            return $this->coupon->getCouponMessage($couponId);
        }

        return false;
    }
}
