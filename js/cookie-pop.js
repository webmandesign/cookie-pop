/**
 * Cookie Pop scripts
 *
 * @package  Cookie Pop
 *
 * @since    1.0
 */

( function ( $ ) {

	'use strict';

	if ( 'set' !== $.cookie( 'cookiepop' ) ) {

		$( 'body' ).prepend( '<div id="cookiepop" class="cookiepop">' + cookiepop_vars.message + '<button id="accept-cookie">' + cookiepop_vars.button + '</button> <a href="' + cookiepop_vars.moreURL + '">' + cookiepop_vars.more + '</a></div>' );

		$( '#accept-cookie' ).click( function () {
			$.cookie( 'cookiepop', 'set' );
			$( '#cookiepop' ).remove();
		} );

	}

}( jQuery ) );