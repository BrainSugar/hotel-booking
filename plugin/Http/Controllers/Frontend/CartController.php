<?php

namespace Brainsugar\Http\Controllers\Frontend;

use Brainsugar\Http\Controllers\Controller;
use Brainsugar\Repositories\CartRepository;
use Brainsugar\Repositories\SessionRepository;

class CartController extends Controller
{
    /**
     * Insatance of cart repository.
     *
     * @var object
     */
    protected $cart;

    /**
     * Instance of session repository.
     *
     * @var object
     */
    protected $session;

    public function __construct()
    {
        $this->cart = new CartRepository();
        $this->session = new SessionRepository();
    }

    /**
     * Add item to cart.
     *
     * @return html cart template
     */
    public function addItemToCart(int $itemId, int $itemQuantity, string $itemType)
    {
        $insert = $this->cart->addItem($itemId, $itemQuantity, $itemType);

        if ($insert) {
            $response = $this->_getCartTemplate();
        }

        return $response;
    }

    /**
     * Remove item from cart.
     *
     * @return html cart template
     */
    public function removeItemFromCart(int $itemId, string $itemType)
    {
        $delete = $this->cart->removeItem($itemId, $itemType);

        if ($delete) {
            $response = $this->_getCartTemplate();
        }

        return $response;
    }

    /**
     * Apply coupon.
     *
     * @return string coupon message
     */
    public function applyCoupon(string $couponCode)
    {
        $response = $this->cart->setCoupon($couponCode);

        return $response;
    }

    /**
     * Remove coupon.
     *
     * @return bool
     */
    public function removeCoupon()
    {
        $response = $this->session->remove('bshb_coupon');

        return $response;
    }

    /**
     * Get cart template.
     *
     * @return html
     */
    private function _getCartTemplate()
    {
        ob_start();
        echo  bshb_get_template_part('cart');
        $response = ob_get_clean();

        return $response;
    }
}
