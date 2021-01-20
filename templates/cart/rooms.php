<?php
/**
 * Cart rooms.
 *
 * This template can be overridden by copying it to {YOURTHEME}/bshb-template/cart/
 *
 * @see http://docs.brainsugar.studio/hotel-booking/
 *
 * @author Brainsugar Studio
 *
 * @version 1.0
 */
 if (!defined('ABSPATH')) {
     exit;  //Exit if accessed directly.
 }

//Items currently in cart.
$cart_items = bshb_get_cart_items();

// If there are items in cart
 if ($cart_items) {
     //if checkout page
     if (bshb_is_checkout_page()) {
         //display summary of room items
         bshb_get_template_part('cart/content/rooms', 'summary', $cart_items);
     } else {
         //display room items
         bshb_get_template_part('cart/content/rooms', 'cart', $cart_items);
     }
 }
