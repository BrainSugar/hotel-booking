<?php

namespace Brainsugar\Ajax;

use Brainsugar\Http\Controllers\Frontend\CartController;
use Brainsugar\WPBones\Foundation\WordPressAjaxServiceProvider as ServiceProvider;

class CartAjax extends ServiceProvider
{
    /**
     * List of the ajax actions executed by both logged and not logged users.
     * Here you will used a methods list.
     *
     * @var array
     */
    protected $trusted = [
                'addToCart',
                'removeFromCart',
                'applyCouponCode',
                'removeCouponCode',
        ];

    /**
     * List of the ajax actions executed only by logged in users.
     * Here you will used a methods list.
     *
     * @var array
     */
    protected $logged = [];

    /**
     * List of the ajax actions executed only by not logged in user, usually from frontend.
     * Here you will used a methods list.
     *
     * @var array
     */
    protected $notLogged = [];

    /**
     * Cart controller instance.
     *
     * @var object
     */
    protected $cart;

    public function __construct()
    {
        $this->cart = new CartController();
    }

    /**
     * Add to Cart.
     *
     * @return html cart template
     */
    public function addToCart()
    {
        $itemId = $_POST['itemId'];
        $itemType = $_POST['itemType'];
        $itemQuantity = $_POST['itemQuantity'];

        $response = $this->cart->addItemToCart($itemId, $itemQuantity, $itemType);
        wp_send_json($response);
    }

    /**
     * Remove from cart.
     *
     * @return html cart template
     */
    public function removeFromCart()
    {
        $itemId = $_POST['itemId'];
        $itemType = $_POST['itemType'];

        $response = $this->cart->removeItemFromCart($itemId, $itemType);
        wp_send_json($response);
    }

    /**
     * Apply coupon code.
     *
     * @return string coupon message
     */
    public function applyCouponCode()
    {
        $userCode = $_POST['couponCode'];

        $response = $this->cart->applyCoupon($userCode);
        wp_send_json($response);
    }

    /**
     * Remove coupon code.
     *
     * @return bool
     */
    public function removeCouponCode()
    {
        $response = $this->cart->removeCoupon();
        wp_send_json($response);
    }
}
