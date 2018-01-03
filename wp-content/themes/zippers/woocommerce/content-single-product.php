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
	// $product = $post->ID;
	$meta = get_post_meta($post->ID);
	$img = wp_get_attachment_url( get_post_thumbnail_id() );
	$price = $meta['_price'][0];
	$imgs = $meta['_product_image_gallery'][0];
	// var_dump($imgs);
	$imgs = explode(',', $imgs);
	// var_dump($imgs);

	global $product;
	$shipping_class_id = $product->get_shipping_class_id();
	$shipping_class= $product->get_shipping_class();
	// $fee = 0;

	// if ($shipping_class_id) {
	//    $flat_rates = get_option("woocommerce_flat_rates");
	//    $fee = $flat_rates[$shipping_class]['cost'];
	// }

	// $flat_rate_settings = get_option("woocommerce_flat_rate_settings");
	// echo 'Shipping cost: ' . ($flat_rate_settings['cost_per_order'] + $fee);
?>
<style>
#product-gallery {
    width: 100%;
    overflow: hidden;
}
.gallery-thumb{
	width: 100px;
	margin: 0 10px;
	height: auto;
	float: left;
}

</style>
<div class="row grey-back single-product">

	<div class="col-sm-6">
			
		<h1><?php echo $post->post_title; ?></h1>
		<?php if($shipping_class == 'two'){ ?>
			<h4>$<?php echo $price; ?> + $2 Domestic Shipping</h4>
		<?php } else { ?>
			<h4>$<?php echo $price; ?> + Free Domestic Shipping</h4>
		<?php } ?>
		
		<div class="mobile-only">
			<?php if( $imgs ): ?>	
			<img src="<?php echo wp_get_attachment_url($imgs[0]); ?>">
			<?php if( count($imgs) > 1 ):?>
				<a class="show-faq-gallery">See More Examples</a>
				<div class="faq-gallery">
					<div class="gallery-container">
						<div class="col-sm-2 closer">
						</div>
						<div class="col-sm-8 gallery-content">
							<a class="close-gallery"><img src="/wp-content/themes/zippers/img/icons/close.svg"></a>
							
							<div class="all-nav">
								<div class="counters">
									<span id="slide-number">1</span> of <span id="slide-total">3</span>
								</div>
								<div class="navs"></div>
							</div>
							
							<h1><?php echo $post->post_title; ?></h1>

							<div class="faq-slider" id="slider">
								<?php $total = 0; ?>
								<?php foreach( $imgs as $i ): ?>
									<?php $total++; ?>
									<div class="slide" id="slide-<?php echo $total; ?>">
										<img class="gallery-img" src="<?php echo wp_get_attachment_url($i); ?>">
									</div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="col-sm-2"></div>
					</div>
				</div>
		<?php endif;
		endif; ?>
		</div>

		<div class="description">
			<?php the_content(); ?>
		</div>
		<?php if( have_rows('includes') ): ?>
		<h3 id="includes-header">Includes</h3>
			<ul id="includes">
			<?php while( have_rows('includes') ): the_row();?>
				<li><span><?php the_sub_field('item'); ?></span></li>
			<?php endwhile; ?>
			</ul>
		<?php endif; ?>
		
		<?php // var_dump($meta); ?>
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
				<a onclick='addToCart("<?php echo $product->add_to_cart_url($post->ID); ?>", this, cart="<?php the_permalink(16); ?>")' class="button">ADD TO CART</a>
				<?php
				//  	echo apply_filters( 'woocommerce_loop_add_to_cart_link',
				// 	sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s"class="button">ADD TO CART</a>',
				// 		esc_url( $product->add_to_cart_url($post->ID) ),
				// 		esc_attr( $product->id ),
				// 		esc_attr( $product->get_sku() ),
				// 		esc_attr( isset( $quantity ) ? $quantity : 1 ),
				// 		$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
				// 		esc_attr( $product->product_type ),
				// 		esc_html( $product->add_to_cart_text() )
				// 	),
				// $post );?>
				<?php  do_action( 'woocommerce_after_add_to_cart_button' ); ?>
			</form>
			<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
		<?php endif; ?>

	</div>

	<div class="col-sm-6 non-mobile" id="product-pics">
		<?php if( $imgs ): ?>	
			<img src="<?php echo wp_get_attachment_url($imgs[0]); ?>">
			<?php if( count($imgs) > 1 ):?>
				<a class="show-faq-gallery">See More Examples</a>
				<div class="faq-gallery">
					<div class="gallery-container">
						<div class="col-sm-2 closer">
						</div>
						<div class="col-sm-8 gallery-content">
							<a class="close-gallery"><img src="/wp-content/themes/zippers/img/icons/close.svg"></a>
							
							<div class="all-nav">
								<div class="counters">
									<span id="slide-number">1</span> of <span id="slide-total">3</span>
								</div>
								<div class="navs"></div>
							</div>
							
							<h1><?php echo $post->post_title; ?></h1>

							<div class="faq-slider" id="slider">
								<?php $total = 0; ?>
								<?php foreach( $imgs as $i ): ?>
									<?php $total++; ?>
									<div class="slide" id="slide-<?php echo $total; ?>">
										<img class="gallery-img" src="<?php echo wp_get_attachment_url($i); ?>">
									</div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="col-sm-2"></div>
					</div>
				</div>
		<?php endif;
		endif; ?>
	</div>
<div class="col-md-8"></div>
</div>

<script>
$.featherlight.defaults['closeIcon']='<img src="/wp-content/themes/zippers/img/icons/close.svg">';
</script>

<?php do_action( 'woocommerce_after_single_product' ); ?>
