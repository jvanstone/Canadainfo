<?php

/***
 * 
 * Add Customized Wording to Paid Membership Pro
 * 
 * functions start with pmp to differantiate form pmpro
 * 
 */

function pmp_add_accountsetup() {
	?>
    <h2 class=""><?php _e('1) Create your account', 'paid-memberships-pro' );?></h2>
	<?php
 }
 add_action( 'pmpro_checkout_after_pricing_fields',  'pmp_add_accountsetup');

 function pmp_add_paymentsetup() {
	?>
    <h2 class=""><?php _e('2) Finish setup with PayPal', 'paid-memberships-pro' );?></h2>
    <em><?php _e('You will be redirected back to Canada Info after payment has been processed by PayPal.', 'paid-memberships-pro' );?></em>
	
	<?php
 }
 add_action( 'pmpro_checkout_before_submit_button', 'pmp_add_paymentsetup');

 /**
  * Change the text of the Checkout Page
  */ 
 function pmp_change_checkout( $translated_text ) {
	if ( $translated_text == 'Membership Level' ) {
		$translated_text = 'Canada Info Guide';
	} else if  ( $translated_text == 'You have selected the <strong>%s</strong> membership level.' ) {
        $translated_text = 'You are about to purchase <strong>%s</strong>.';
    } else if ( $translated_text == 'The price for membership is <strong>%s</strong> now' )  {
        $translated_text = 'You will be charged a one time fee of -- <strong>%s</strong> CAD';
    } 
	return $translated_text;
}
add_filter( 'gettext', 'pmp_change_checkout', 20 );

/****
 * Canada Info Level Shortcode
 * 
 * return true
 */

function pmp_get_latest() { 

    global $wpdb, $pmpro_msg, $pmpro_msgt, $current_user;

    $pmpro_levels = pmpro_getAllLevels(false, true);
    $pmpro_level_order = pmpro_getOption('level_order');

    if(!empty($pmpro_level_order))
    {
        $order = explode(',',$pmpro_level_order);

        //reorder array
        $reordered_levels = array();
        foreach($order as $level_id) {
            foreach($pmpro_levels as $key=>$level) {
                if($level_id == $level->id)
                    $reordered_levels[] = $pmpro_levels[$key];
            }
        }

        $pmpro_levels = $reordered_levels;
    }

        $pmpro_levels = apply_filters("pmpro_levels_array", $pmpro_levels);

        ob_start();

        
    ?>
    <div id="pmpro_levels_table" class="<?php echo pmpro_get_element_class( 'pmpro_table pmpro_checkout', 'pmpro_levels_table' ); ?>  col-sm-5">
        <ul class="issues">
        <?php	
        $count = 0;
        foreach($pmpro_levels as $level)
        {
        if(isset($current_user->membership_level->ID))
            $current_level = ($current_user->membership_level->ID == $level->id);
        else
            $current_level = false;
        ?>
        <?php 
        if($count++ % 2 == 0) { 
            $levelClass='odd';
        } else { 
            $levelClass='even';
        } 
        ?>
        <li class="<?=$levelClass;?><?php if($current_level == $level) { ?> <?php } ?>">

        <ul class="latest-issue">
            <li>
            <?php 
            
            //Show the Title Name 
            echo $current_level ? "{$level->name}" : $level->name; ?>

            </li>
            <?php if(empty($current_user->membership_level->ID)) { ?>
            
                        <li><a class="<?php echo pmpro_get_element_class( 'pmpro_btn pmpro_btn-select', 'pmpro_btn-select' ); ?> button-get" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php _e('Select', 'paid-memberships-pro' );?></a></li>
                    <?php } elseif ( !$current_level ) { ?>  
                                        
                        <li><a class="<?php echo pmpro_get_element_class( 'pmpro_btn pmpro_btn-select', 'pmpro_btn-select' ); ?> button-get" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php _e('Select', 'paid-memberships-pro' );?></a></li>
                    <?php } elseif($current_level) { ?>
                
                <?php
                    //if it's a one-time-payment level, offer a link to renew				
                    if( pmpro_isLevelExpiringSoon( $current_user->membership_level) && $current_user->membership_level->allow_signups ) {
                        ?>
                            <li><a class="<?php echo pmpro_get_element_class( 'pmpro_btn pmpro_btn-select', 'pmpro_btn-select' ); ?>" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php _e('Renew', 'paid-memberships-pro' );?></a></li>
                        <?php
                    } else {
                        ?>
                        
                            <li><a class="<?php echo pmpro_get_element_class( 'pmpro_btn disabled', 'pmpro_btn' ); ?>" href="<?php echo pmpro_url("account")?>"><?php _e('✓', 'paid-memberships-pro' );?></a></li>
                            <li><h3><a href="<?php echo get_site_url(); ?>/canada-info-guide-issue-1/">You have access, see it now!&nbsp;<i class="fas fa-arrow-circle-right"></i></a></h3></li>
                        </ul>
                        <?php
                    }
                ?>
                
        <?php } ?>
            </li> 
            </ul>
            </div>
        <?php } 

    return ob_get_clean();
}
add_shortcode ( 'pmp-levels', 'pmp_get_latest' );



remove_action ( 'pmpro_checkout_after_tos_fields', 'pmpromc_additional_lists_on_checkout' );

function pmp_mailchimp_add() {
    global $pmpro_review;

	$options = get_option( 'pmpromc_options' );

	// Get API and bail if we can't set it.
	$api = pmpromc_getAPI();
	if ( empty( $api ) ) {
		return;
	}

	// Are there additional lists?
	if ( ! empty( $options['additional_lists'] ) ) {
		$additional_lists = $options['additional_lists'];
	} else {
		return;
	}

	global $current_user;
	pmpromc_check_additional_audiences_for_user( $current_user->ID );

	// Okay get through API.
	$lists = $api->get_all_lists();

	// No lists?
	if ( empty( $lists ) ) {
		return;
	}

	$additional_lists_array = array();
	foreach ( $lists as $list ) {
		if ( ! empty( $additional_lists ) ) {
			foreach ( $additional_lists as $additional_list ) {
				if ( $list->id == $additional_list ) {
					$additional_lists_array[] = $list;
					break;
				}
			}
		}
	}

	// No lists? do nothing.
	if ( empty( $additional_lists_array ) ) {
		return;
	}

	$display_modifier = empty( $pmpro_review ) ? '' : 'style="display: none;"';
	?>

    <div id="pmpro_mailing_lists" class="pmpro_checkout top1em" width="100%" cellpadding="0" cellspacing="0" border="0">
		<h3>Join our mailing list.</h3>
	
		<div class="col-12 p-2 ml-5">
					<input type="checkbox" class="form-check-input" id="additional_lists_1" name="additional_lists[]" value="8b5021832a">
					<label class="form-check-label" for="additional_lists_1">Canada Information Guide</label><br>
		</div>

        <?php
				global $current_user;
				if ( isset( $_REQUEST['additional_lists'] ) ) {
					$additional_lists_selected = $_REQUEST['additional_lists'];
				} elseif ( isset( $_SESSION['additional_lists'] ) ) {
					$additional_lists_selected = $_SESSION['additional_lists'];
				} elseif ( ! empty( $current_user->ID ) ) {
					$additional_lists_selected = get_user_meta( $current_user->ID, 'pmpromc_additional_lists', true );
				} else {
					$additional_lists_selected = array();
				}
				$count = 0;
				foreach ( $additional_lists_array as $key => $additional_list ) {
					$count++;
					?>
					<input type="checkbox" id="additional_lists_<?php echo( $count ); ?>" name="additional_lists[]" value="<?php echo( $additional_list->id ); ?>" 
							<?php
							if ( is_array( $additional_lists_selected ) ) {
								checked( in_array( $additional_list->id, $additional_lists_selected ) );
							};
							?>
							/>
					<label for="additional_lists_<?php echo( $count ); ?>" class="pmpromc-checkbox-label"><?php echo( $additional_list->name ); ?></label><br/>
					<?php
				}
				?>
	</div>
 <?php
}

add_action( 'pmpro_checkout_after_tos_fields', 'pmp_mailchimp_add' );