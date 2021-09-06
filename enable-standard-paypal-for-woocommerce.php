<?php
/**
 * Enable Standard PayPal for WooCommerce
 *
 * @since             1.0.0
 * @package           Enable_Standard_PayPal_for_WooCommerce
 *
 * @wordpress-plugin
 * Plugin Name:       Enable Standard PayPal for WooCommerce
 * Plugin URI:        http://vikcheema.com/enable-standard-paypal-for-woocommerce
 * Description:       This plugin provides the ability to enable the PayPal Standard Payment Method for WooCommerce which is disabled since WooCommerce version 5.5.0
 * Version:           1.0.0
 * Author:            Vik Cheema
 * Author URI:        http://vikcheema.com
 * Text Domain:       enable-standard-paypal-for-woocommerce
 * WC requires at least: 5.5.0
 * WC tested up to:   5.6.0
 */

 if ( ! defined( 'ABSPATH' ) ) {
 	exit;
 }

 /**
  * Let all the plugins load first
  **/
 add_action ('plugins_loaded', 'espw_check_plugins_loaded');

 function espw_check_plugins_loaded () {

     /**
      * Check if WooCommerce is active
      **/
     if ( class_exists( 'WooCommerce' ) ) {

    	/*
    	* Check WooCommerce version, 5.5.0 required at least
    	*/
    	if ( version_compare( WC_VERSION, '5.5.0', '>=' ) ) {

    		/**
    		* Add the filter to enable the hidden standard paypal for WooCommerce
    		*/
    		add_filter( 'woocommerce_should_load_paypal_standard', 'espw_load_paypal_stadard', 11, 2 );

    	}
     }
 }

 /**
 * return true to enable the gateway
 */
 function espw_load_paypal_stadard( $should_load, $instance ) {
    $should_load = true;
    return $should_load;
 }
