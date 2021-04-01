<?php
/**
 * Plugin Name: Add to Cart Modal Window for WooCommerce
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

    // Definitions.
    define( 'ACMW_WC_VERSION', '1.0.0' );
    define( 'ACMW_WC_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
    define( 'ACMW_WC_URL', untrailingslashit( plugins_url( basename( plugin_dir_path( __FILE__ ) ), basename( __FILE__ ) ) ) );

    add_action( 'wp', 'init' );

    // Main filter.
    add_action( 'woocommerce_add_to_cart', 'acmw_hooks' );

    function init() {
        if ( function_exists( 'is_shop' ) && is_shop() ) {
            add_action( 'wp_enqueue_scripts', 'acmw_general_script' );

            add_action( 'woocommerce_after_main_content', 'acmw_echo_modal_boilerplate', 20 );
        }

        add_action( 'wp_enqueue_scripts', 'acmw_enqueue_styles' );
    }

    function acmw_hooks() {
        add_filter( 'wc_add_to_cart_message_html', 'acmw_message_html', 10, 2 );
        add_action( 'wp_enqueue_scripts', 'acmw_enqueue_product_script' );
    }

    /**
     *    Main function to generate modal window.
     *
     * @param mixed $message Default add to cart message.
     * @param int|array $products Product ID list or single product ID.
     *
     * @return mixed
     **/
    function acmw_message_html( $message, $products ) {
        $body = '';
        foreach ( $products as $product_id => $qty ) {
            $product = wc_get_product( $product_id );
            if ( ! $product ) {
                continue;
            }

            $body   .= acmw_product_template( $product, $qty);
            break;
        }

        if ( ! $body ) {
            return $message;
        }

        $product_name = $product->get_name();

        ob_start();
        include ACMW_WC_DIR . '/templates/add-to-cart-modal.tpl.php';
        $body = ob_get_clean();

        return $body;
    }

    function acmw_general_script() {
        wp_enqueue_script(
            'acmw-wc-added-to-cart-js',
            ACMW_WC_URL . '/assets/js/added_to_cart.js',
            array(),
            ACMW_WC_VERSION,
            true
        );

        acmw_enqueue_product_script();
    }

    function acmw_enqueue_product_script() {
        wp_enqueue_script(
            'acmw-wc-modal-js',
            ACMW_WC_URL . '/assets/js/script.js',
            array(),
            ACMW_WC_VERSION,
            true
        );
    }

    function acmw_enqueue_styles() {
        wp_enqueue_style(
            'acmw-wc-styles',
            ACMW_WC_URL . '/assets/css/main.css',
            array(),
            ACMW_WC_VERSION
        );
    }

    /**
     *    Main function to generate modal window.
     *
     * @param int $product_id Single product ID added to the cart.
     * @param int $qty Product quantity added to the cart.
     *
     * @return mixed
     **/
    function acmw_product_template( $product, $qty ) {
        if ( ! $qty ) {
            return '';
        }

        $product_name  = $product->get_name();
        $product_price = $product->get_price();
        $product_img   = $product->get_image();

        ob_start();
        include ACMW_WC_DIR . '/templates/product.tpl.php';
        return ob_get_clean();
    }

    function acmw_echo_modal_boilerplate( $product_name = '', $product_price = '', $product_img = '', $qty = 1, $hidden = true ) {
        ob_start();
        include ACMW_WC_DIR . '/templates/product.tpl.php';
        $body = ob_get_clean();

        ob_start();
        include ACMW_WC_DIR . '/templates/add-to-cart-modal.tpl.php';
        echo ob_get_clean();
    }
}