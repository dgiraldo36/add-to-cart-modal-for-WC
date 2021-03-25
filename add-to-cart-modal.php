<?php
/**
 * Plugin Name: Add to cart Modal window for WooCommerce
 * Description: Display a modal window after adding an item to the cart.
 * Version: 1.0.0
 * Author: Diego Giraldo
 * Author URI: https://dgiraldo.co
 * Developer: Diego Giraldo
 * Developer URI: http://dgiraldo.co/
 * Text Domain: add-to-cart-modal
 * Domain Path: /languages
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    function atcm_message_html( $message, $products ) {
        return $message;
    }

    add_filter('wc_add_to_cart_message_html', 'atcm_message_html', 10, 2);
}