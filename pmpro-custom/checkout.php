<?php
/***
 * 
 * Add Customized Wording to Paid Membership Pro
 * 
 * functions start with pmp to differantiate from pmpro
 * 
 */



/**
 *  Add Steps to the Checkout page to make it clear to get the latest issue. 
 * 
 */
function pmp_add_accountsetup() {
	?>
    <h2 class=""><?php _e('1) Create/Verify your account', 'paid-memberships-pro' );?></h2>
	<?php
 }
 add_action( 'pmpro_checkout_after_pricing_fields',  'pmp_add_accountsetup');

/*  function pmp_add_paymentsetup() {
	?>
    <!-- <h2 class=""><?php _e('2) Finish setup with PayPal', 'paid-memberships-pro' );?></h2> -->
    <em><?php _e('We look forward to having you as a member', 'paid-memberships-pro' );?></em>
	
	<?php
 }
 add_action( 'pmpro_checkout_before_submit_button', 'pmp_add_paymentsetup'); 
 */
 /**
  * Change the text of the Checkout Page
  */ 
 function pmp_change_checkout( $translated_text ) {
	if ( $translated_text == 'Membership Level' ) {
		$translated_text = 'Canadainfo Membership';
	} else if  ( $translated_text == 'You have selected the <strong>%s</strong> membership level.' ) {
        $translated_text = 'You are signing up for a <strong>%s</strong>.';
    } else if ( $translated_text == 'The price for membership is <strong>%s</strong> now' )  {
        $translated_text = 'The membership is FREE. We are a dontation run website. <a href="https://www.canadainfo.org/donations/" target="_blank">Learn more</a>';
    } else if ( $translated_text == 'State' ) {
		$translated_text = 'Province/State';
    }
	return $translated_text;
}
add_filter( 'gettext', 'pmp_change_checkout', 20 );

/**
 * Set country default to Canada
 * 
 */
function pmp_change_country_default($country){

    // Replace "US" with "CA"
    $country = str_replace ( "US" , "CA" , $country );
  
    return $country;
      
  }
  add_filter( 'pmpro_default_country', 'pmp_change_country_default', 10, 3 );


/**
 * 
 * Show Credit Card Options
 */
function pmp_show_cc_types($type) {
    
    ( $type == false ) ? $type = true : $type = true  ;

    return $type;
 ;
}

add_filter('pmpro_include_cardtype_field', 'pmp_show_cc_types', 10, 3 );
