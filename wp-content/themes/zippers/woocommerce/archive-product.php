<?php /* Template Name: PRODUCTS */ get_header(); ?>

	<main role="main" class="row">
		
		<div class="col-md-12 archive-intro">
			<span class="full-width">
				<h1 style="padding-left:0; margin-top: 20px;margin-bottom: 10px;">Zipper Repair Kits</h1>
				<p style="margin-bottom:30px">Choose from our variety of easy-to-use Zipper Rescue Kits, each Zipper Rescue Kit comes with a variety of quality replacement parts as well as an illustrated instruction manual.</p>
				<a href="<?php the_permalink(11); ?>" class="button">Find out which kit is right for you</a>
			</span>
		</div>


		<div class="col-md-12 grey-back">

			<?php
			$posts = query_posts(array('post_type' => 'product','product_cat' => 'kit',));
			if( $posts ) :
				foreach( $posts as $post ) : 
				setup_postdata( $post ); 
				$meta = get_post_meta($post->ID);
				$img = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				$price = $meta['_price'][0];
				// $category =  get_terms( $post->ID, 'product_cat');
				global $product;
				$shipping_class_id = $product->get_shipping_class_id();
				$shipping_class= $product->get_shipping_class();
			?>	
			
				<div class="product">
					<a href="<?php the_permalink(); ?>">
						<h4><?php echo $post->post_title;?></h4>
						<?php if($shipping_class == 'two'){ ?>
							<h4>$<?php echo $price; ?> + $2 Domestic Shipping</h4>
						<?php } else { ?>
							<h4>$<?php echo $price; ?> + Free Domestic Shipping</h4>
						<?php } ?>
						<img src="<?php echo $img; ?>" alt="<?php echo $post->post_excerpt; ?>">
					</a>
					
					<div class="description">
						<?php the_excerpt(); ?>
					</div>
					
					<a onclick='addToCart("<?php echo $product->add_to_cart_url($post->ID); ?>", this, cart="<?php the_permalink(16); ?>")' class="button">ADD TO CART</a>
				</div>
			<?php
				endforeach;
			endif;
			?>
		</div>
	</main>

	
<script>
sizeDescriptions();
</script>
<?php get_footer(); ?>



