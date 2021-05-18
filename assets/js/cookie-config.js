var options = {
	title: '&#x1F36A; Accept Cookies & Privacy Policy?',
	message: ' We use cookies as specified in our cookie policy. You can consent to the use of such technologies by closing this notice, or button outside of this notice or by continuing to browse otherwise.<br> Click the Accept Cookies button below to see the optional callback in action...',
	delay: 300,
	expires: 1,
	link: 'https://canadainfo.org/privacy-policy/',
	onAccept: function() {
		var myPreferences = $.fn.ihavecookies.cookie();
		console.log( 'Yay! The following preferences were saved...' );
		console.log( myPreferences );
	},
	uncheckBoxes: true,
	acceptBtnLabel: 'Accept Cookies',
	moreInfoLabel: 'More information',
	cookieTypesTitle: 'Select which cookies you want to accept',
	fixedCookieTypeLabel: 'Essential',
	fixedCookieTypeDesc: 'These are essential for the website to work correctly.'
};

$( document ).ready( function() {
	'use:strict';
	$( 'body' ).ihavecookies( options );

	if ( true === $.fn.ihavecookies.preference( 'marketing' ) ) {
		console.log( 'This should run because marketing is accepted.' );
	}

	$( '#ihavecookiesBtn' ).on( 'click', function() {
		$( 'body' ).ihavecookies( options, 'reinit' );
	});
});
