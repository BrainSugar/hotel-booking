<?php

use Brainsugar\Core\CoreFunctions;
use Brainsugar\Core\World;
use Brainsugar\Model\Coupon;
use Brainsugar\Model\ReservationCart;
use Brainsugar\Model\Service;
use Brainsugar\Repositories\CartRepository;
use Brainsugar\Repositories\PaymentRepository;
use Brainsugar\Repositories\PricingRepository;
use Brainsugar\Repositories\SessionRepository;
use Carbon\Carbon;

$session = new SessionRepository();
// The functions for the Frontend Templates.

/**
 * Get Template Part.
 *
 * An extension of default wp get template part function
 *
 * @param [type] $slug
 * @param [type] $name
 *
 * @return void
 */
function bshb_get_template_part($slug, $name = null, $data = [])
{
    do_action("bshb_get_template_part_{$slug}", $slug, $name);

    $templates = [];
    if (isset($name)) {
        $templates[] = "{$slug}-{$name}.php";
    }

    $templates[] = "{$slug}.php";

    bshb_get_template_path($templates, true, false, $data);
}

/**
 * Get template path.
 *
 * Called by get template part function
 * Checks the theme folder for a template.
 * if found loads the template or loads the default plugin template
 *
 * @param [type] $template_names
 * @param bool   $load
 * @param bool   $require_once
 * @param object $data
 *
 * @return void
 */
function bshb_get_template_path($template_names, $load = false, $require_once = true, $data)
{
    $located = '';
    foreach ((array) $template_names as $template_name) {
        if (!$template_name) {
            continue;
        }

        if (file_exists(locate_template(['bshb-templates/'.$template_name]))) {
            $located = locate_template(['bshb-templates/'.$template_name]);
            break;
        }

        if (file_exists(BSHB_BASE_PATH.'templates/'.$template_name)) {
            $located = BSHB_BASE_PATH.'templates/'.$template_name;
            break;
        }
    }
    if ($data) {
        set_query_var('data', $data);
    }

    if ($load && '' != $located) {
        load_template($located, $require_once);
    }

    return $located;
}

/**
 * Loads the Single Content.
 *
 * @return void
 */
function bshb_get_single_content()
{
    bshb_get_template_part('template-parts/single/content');
}

/**
 * Loads the single Title.
 *
 * @return void
 */
function bshb_get_single_title()
{
    bshb_get_template_part('template-parts/single/title');
}

/**
 * Echo the starting Divs.
 *
 * @return void
 */
function bshb_container_start()
{
    bshb_get_template_part('template-parts/global/wrapper-start');
}
add_action('bshb_container_start', 'bshb_container_start', 10, 5);

/**
 * Echo the output Divs.
 *
 * @return void
 */
function bshb_container_end()
{
    bshb_get_template_part('template-parts/global/wrapper-end');
}
add_action('bshb_container_end', 'bshb_container_end', 10, 5);

/**
 * Get the styles for the template elements specified in the settings.
 *
 * @return void
 */
// function bshb_get_style($element)
// {
//     $style = '';
//     switch ($element) {
//                 case  'search-button':
//                         $style = 'color: #000000; background:#fff;';
//                 break;
//         }

//     return $style;
// }

function bshb_get_room_price($post_id, $checkIn, $checkOut, $filter = 'total')
{
    $pricing = new PricingRepository();
    $price = $pricing->getRoomPrice($post_id, $checkIn, $checkOut);

    if ($filter == 'total') {
        $response = [
                        'total' => CoreFunctions::formatCurrency($price['total']),
                        'nights' => ' / '.$price['nights'].' Nights',
                ];
    } elseif ($filter == 'perNight') {
        $response = [
                        'total' => CoreFunctions::formatCurrency($price['pricePerNight']),
                        'nights' => ' / Night ',
                ];
    }

    return $response;
}

function bshb_format_currency($price)
{
    $formattedPrice = CoreFunctions::formatCurrency($price);

    return $formattedPrice;
}

/**
 * Calculate the number of nights from session variables.
 *
 * @return int
 */
function bshb_get_stay_nights()
{
    $session = new SessionRepository();
    $checkIn = Carbon::parse($session->get('bshb_check_in'));
    $checkOut = Carbon::parse($session->get('bshb_check_out'));
    $nights = Carbon::parse($checkOut)->diffInDays($checkIn);

    return $nights;
}

/**
 * Get search page ID stored in the wp_options table.
 *
 * @return url
 */
function bshb_get_search_page()
{
    $searchPageId = Brainsugar()->options->get('Pages.search');
    $searchPageUrl = get_permalink($searchPageId);

    return esc_url($searchPageUrl);
}
/**
 * Get checkout page ID stored in the wp_options table.
 *
 * @return void
 */
function bshb_get_checkout_page()
{
    $checkoutPageId = Brainsugar()->options->get('Pages.check_out');
    $checkoutPageUrl = get_permalink($checkoutPageId);

    return esc_url($checkoutPageUrl);
}

/**
 * Check if the given page is assigned as checkout page.
 *
 * @return void
 */
function bshb_is_checkout_page()
{
    global $wp_query;
    $post_id = $wp_query->get_queried_object_id();
    // Pages set by the user.
    $checkoutPageId = Brainsugar()->options->get('Pages.check_out');

    if ($post_id == $checkoutPageId) {
        $response = true;
    } else {
        $response = false;
    }

    return $response;
}

function bshb_get_services()
{
    $services = get_posts([
                        'post_type' => 'bshb_service',
                        'status' => 'published',
                ]);

    return $services;
}

function bshb_get_service_price($post_id)
{
    $service = new Service();
    $price = $service->getServicePrice($post_id);

    return bshb_format_currency($price);
}

function bshb_get_service_stock($post_id)
{
    $service = new Service();
    $stock = $service->getServiceStock($post_id);

    return $stock;
}

// function bshb_get_order_summary()
// {
//     $reservation = $_SESSION['bshb_session_cart'];
//     $cart = new ReservationCart();
//     $cartItems = $cart->getCartItems($reservation);

//     return $cartItems;
// }

function bshb_get_cart_items()
{
    $cart = new CartRepository();
    $session = new SessionRepository();
    $response = $cart->getCart()->where('session_id', $session->get('bshb_session_id'))->get();

    return $response;
}

function bshb_get_cart_total()
{
    $cart = new CartRepository();
    $response = $cart->getCartTotal();

    return $response;
}

function bshb_get_coupon_code()
{
    $coupon = new Coupon();
    $appliedCoupon = $coupon->getSessionCoupon();

    if ($appliedCoupon == false) {
        return null;
    } else {
        $couponCode = $coupon->getCouponCode($appliedCoupon);
        $couponMessage = $coupon->getCouponMessage($appliedCoupon);
        $response = ['coupon_code' => $couponCode,
                                'coupon_message' => $couponMessage, ];

        return $response;
    }
}

function bshb_get_coupon_message()
{
//     $coupon = new Coupon();
//     $couponMessage = $coupon->getCouponMessage();

    return 'where im at';
}

function bshb_get_countries()
{
    $world = new World();
    $countries = $world->getCountries();

    return $countries;
}

function bshb_get_payment_gateways()
{
    $payment = new PaymentRepository();
    $gateways = $payment->getGateways();
//     $response = [];
//     foreach($gateways as $key => $value){


//     }

    return $gateways;
}
