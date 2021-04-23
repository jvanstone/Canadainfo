<?php
/***
 * 
 * Add Customized Wording to Paid Membership Pro
 * 
 * functions start with pmp to differantiate from pmpro
 * 
 */
require_once ('levels.php');
require_once ('checkout.php');
require_once ('account-details.php');
require_once ('mailchimp.php');



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


