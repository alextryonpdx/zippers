<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="cart_totals <?php if ( WC()->customer->has_calculated_shipping() ) echo 'calculated_shipping'; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<h1><?php _e( 'Cart Totals', 'woocommerce' ); ?></h1>

	<table cellspacing="0" class="shop_table shop_table_responsive">

		<tr class="cart-subtotal">
			<th style="padding-left:0 !important; padding-top:15px !important"><?php _e( 'Subtotal', 'woocommerce' ); ?></th>
			<th style="padding-top: 15px !important;"><?php _e( 'Shipping', 'woocommerce' ); ?></th>
			<th style="padding-top: 15px !important;"><?php _e( 'Total', 'woocommerce' ); ?></th>
			<th style="padding-top: 15px !important;">&nbsp;</th>
		</tr>
		<tr>
			<td style="font-weight:bold; " id="subtotal-heading" data-title="<?php _e( 'Subtotal', 'woocommerce' ); ?>">
				<?php wc_cart_totals_subtotal_html(); ?>
			</td>
			<td  style="font-weight:bold; padding-top:15px !important" data-title="<?php _e( 'Shipping', 'woocommerce' ); ?>">
			
						<?php wc_cart_totals_shipping_html(); ?>
				<?php // woocommerce_shipping_calculator(); ?>
			</td>
			<td  style="padding-top:15px !important" data-title="<?php _e( 'Total', 'woocommerce' ); ?>">
				<?php wc_cart_totals_order_total_html(); ?>
			</td>
			<td style="padding-top:15px !important" >
				<!-- <div class="wc-proceed-to-checkout"> -->
					<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
				<!-- </div> -->
			</td>
		</tr>

	</table>

	<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>
	
	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
