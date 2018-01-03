<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 //do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<?php
	$meta = get_post_meta($post->ID);
	$img = wp_get_attachment_url( get_post_thumbnail_id() );
	$price = $meta['_price'][0];
	$imgs = $meta['_product_image_gallery'][0];
	// var_dump($imgs);
	$imgs = explode(',', $imgs);
	// var_dump($imgs);
?>

<div class="row grey-back single-product slider">
	<div class="col-sm-6">
		<img src="<?php echo $img; ?>">
		<h3>Color of the slider and the shape of pull tab may vary.</h3>
	</div>

	<div class="col-sm-6">
		<h5 class="slider-heading">Add slider to kit of choice (kits $11.99 each)</h5>
		<div id="add-kit-form">
			<span class="radio-wrap">
			 	<input type="radio" value="/?add-to-cart=34">
			 	Clothing Kit
			 </span>
			<span class="radio-wrap">
			 	<input type="radio" value="/?add-to-cart=94">
			 	Outdoor Kit
			 </span>
			 <span class="radio-wrap">
			 	<input type="radio" value="/?add-to-cart=90">
			 	Marine Kit
			 </span>
		</div>

		<h5 class="slider-heading">Custom Slider Addition</h5>
		<h3>$<?php echo $price; ?> (<?php echo $post->post_title; ?>)</h3>

		<h5 id="qty">Qty:</h5>
		<?php 
		global $product;
		if ( $product->is_in_stock() ) : ?>
			<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
			<form class="cart" method="post" enctype='multipart/form-data'>
			 	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
			 	<?php
			 		if ( ! $product->is_sold_individually() ) {
			 			woocommerce_quantity_input( array(
			 				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
			 				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product ),
			 				'input_value' => ( isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 )
			 			) );
			 		}
			 	?>
			 	<!-- <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" /> -->
			 	<!-- <button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button> -->
				<a onclick='addSliderToCart("<?php echo $product->add_to_cart_url($post->ID); ?>",this, cart="<?php the_permalink(16); ?>")' data-kit="/?add-to-cart=34" class="button" id="add-slider">ADD TO CART</a>
				<?php  do_action( 'woocommerce_after_add_to_cart_button' ); ?>
			</form>
			<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
		<?php endif; ?>
	</div>


	
<?php do_action( 'woocommerce_after_single_product' ); ?>
