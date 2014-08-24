<?php
/**
 * Plugin Name:        Cookie Pop
 * Plugin URI:         https://code.tutsplus.com/tutorials/implementing-the-eu-cookie-law-into-your-wordpress-site--cms-21750
 * Description:        A simple cookie law implementation for WordPress.
 * Version:            1.0
 * Author:             Tutsplus
 * Author URI:         http://code.tutsplus.com
 * License:            GPL-3.0+
 * License URI:        http://www.gnu.org/licenses/gpl-3.0.html
 * Domain Path:        /languages
 * Text Domain:        cookie-pop
 * GitHub Plugin URI:  webmandesign/cookie-pop
 *
 * For automatic updates install GitHub Updater plugin @link https://github.com/afragen/github-updater
 */



//Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;



if ( ! function_exists( 'wm_cookie_pop_scripts_and_styles' ) ) {
	function wm_cookie_pop_scripts_and_styles() {

		/**
		 * Register
		 */

			//Scripts
				wp_enqueue_script(
					'jquery-cookie',
					plugins_url( '/js/jquery.cookie.js', __FILE__ ),
					array( 'jquery' ),
					'1.4.1',
					true
				);

				wp_register_script(
					'cookie-pop-script',
					plugins_url( '/js/cookie-pop.js', __FILE__ ),
					array( 'jquery', 'jquery-cookie' ),
					'1.0',
					true
				);

		/**
		 * Enqueue
		 */

			//Scripts
				wp_localize_script(
					'cookie-pop-script',
					'cookiepop_vars', apply_filters( 'wmhook_cookie_pop_vars', array(
						'message' => __( 'By using our website, you agree to the use of our cookies.', 'cookie-pop' ),
						'button'  => __( 'OK', 'cookie-pop' ),
						'more'    => __( 'Read More...', 'cookie-pop' ),
						'moreURL' => '#',
					) )
				);

				wp_enqueue_script( 'cookie-pop-script' );

			//Styles
				wp_enqueue_style(
					'cookie-pop-style',
					plugins_url( '/css/cookie-pop.css', __FILE__ ),
					array(),
					'1.0.0'
				);

	}
} // /wm_cookie_pop_scripts_and_styles

add_action( 'wp_enqueue_scripts', 'wm_cookie_pop_scripts_and_styles' );

?>