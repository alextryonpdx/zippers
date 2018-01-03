<?php /* Template Name: DIAGNOSTIC */ get_header(); ?>

<?php 
// this retrieves prev URL. 
// use to differentiate normal slider product page from those reaced via diagnostic tool (add grey headline and contact link at bottom)
// echo wp_get_referer(); 
?>
<main role="main" class="row">
<div id="diagnostic-wrapper">
	<?php 
	$layout = get_field('layout_type'); 
	// echo $layout;
	?>

	<?php if( $layout == 'Options' ): ?>
		<!-- options START -->
		<div class="col-md-12">
			<h1 class="prompt"><?php the_field('prompt'); ?></h1>
			<?php if(get_field('example')) { ?>
				<a class="show-faq-from-pic"><img src="<?php the_field('example'); ?>"></a>
			<?php } ?>
			<?php if( have_rows('option') ): ?>
				<div class="options">
					<?php while( have_rows('option') ): the_row();?>
						<?php $imgs = get_sub_field('images');
							  if( $imgs ){ $main = $imgs[0]; }; ?>
						<div class="option">
							<?php 
								$id = get_sub_field('button_link');
								$link = get_permalink($id[0]);
								if( count($imgs) > 1 ){ ?>
									<a class="more-examples show-faq-gallery">
										<img data-src="/wp-content/themes/zippers/img/wizard/camera.svg">See More Examples
									</a>
									<div class="faq-gallery">
										<div class="gallery-container">
											<div class="col-sm-2 closer"></div>
											<div class="col-sm-8 gallery-content">
												<a class="close-gallery"><img src="/wp-content/themes/zippers/img/icons/close.svg"></a>
												
												<div class="all-nav">
													<div class="counters">
														<span id="slide-number">1</span> of <span id="slide-total">3</span>
													</div>
													<div class="navs"></div>
												</div>


												<div class="faq-slider" id="slider-">
													<?php $total = 0; ?>
													<?php while( have_rows('images') ): the_row(); ?>
														<?php $total++; ?>
														<div class="slide" id="slide-<?php echo $total; ?>">
															<p><?php the_sub_field('caption'); ?></p>
															<img class="gallery-img" src="<?php the_sub_field('image'); ?>">
														</div>
													<?php endwhile; ?>
												</div>
											</div>
											<div class="col-sm-2"></div>
										</div>
									</div>
							<?php	} elseif( count($imgs) == 1 ) {?>
									<a class="more-examples show-faq-gallery">
										<img data-src="/wp-content/themes/zippers/img/wizard/camera.svg">Expand Image
									</a>
									<div class="faq-gallery">
										<div class="gallery-container">
											<div class="col-sm-2 closer">
											</div>
											<div class="col-sm-8 gallery-content">
												<a class="close-gallery"><img src="/wp-content/themes/zippers/img/icons/close.svg"></a>
												<h1><?php echo $title; ?></h1>
												<div >
													<?php $total = 0; ?>
													<?php while( have_rows('images') ): the_row(); ?>
														<?php $total++; ?>
														<div class="slide" id="slide<?php echo $counter; ?>-<?php echo $total; ?>">
															<p><?php the_sub_field('caption'); ?></p>
															<img class="gallery-img" src="<?php the_sub_field('image'); ?>">
														</div>
													<?php endwhile; ?>
												</div>
											</div>
											<div class="col-sm-2"></div>
										</div>
									</div>
									<?php }?>
							<a class="show-faq-from-pic">
								<?php if( $imgs) { ?><img src="<?php echo $main['image']; ?>"> <?php } ?>
							</a>
							<a href="<?php echo $link ?>">
								<h4><?php the_sub_field('button_text') ?></h4>
							</a>
							<p><?php the_sub_field('clarifying_text') ?>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
		<!-- options END -->
	<?php endif; ?>


	<?php if( $layout == 'Measurement' ): ?>
		<!-- measurement START -->
		<div class="col-md-12">
			<h1 class="prompt"><?php the_field('prompt'); ?></h1>
			<?php if( have_rows('measurement') ): ?>
				<div class="guide">
					<div class="image-guide">
						<?php while( have_rows('measurement') ): the_row();?>
							<img class="hidden_pic" id="coil-<?php the_sub_field('teeth_slug') ?>" src="<?php the_sub_field('image') ?>">
							<?php $teeth = get_sub_field('teeth'); ?>
						<?php endwhile; ?>
						<h4>Example shown has <span class="teeth"><?php echo $teeth; ?></span> teeth</h4>
					</div>
					<div class="tips">
						<?php if( get_field('tips') ): ?>
							<h5>Tips</h5>
							<?php the_field('tips'); ?>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
			<? reset_rows(); ?>
			<?php if( have_rows('measurement') ): ?>
				<form class="measurements" action="">
					<?php while( have_rows('measurement') ): the_row(); ?>
						<?php 
							$id = get_sub_field( 'link' );
							$link = get_permalink( $id[0] )
						 ?>
					    <span class="radio-wrap"><input type="radio" name="EXAMPLE" value="<?php echo $link; ?>" data-pic="#coil-<?php the_sub_field('teeth_slug') ?>" data-teeth="<?php the_sub_field('teeth') ?>"><?php the_sub_field('teeth') ?></span>
					<?php endwhile; ?>
				</form>
			<?php endif; ?>
			<!-- grey until radio is checked, then active. 
			click will take id based value and navigate to that slide -->
			<a href="" class="button continue nogo">Continue</a>
			<p>If you’re having trouble measuring your slider <a href="<?php the_permalink(114); ?>" class="contact-help">contact us</a> for support</p>
		</div>
		<!-- measurement END -->
	<?php endif; ?>


	<?php if( $layout == 'Endpoint Success' ): ?>
		<script>
			$('#diagnostic-wrapper').addClass('unset');
		</script>
		<!-- endpoint - success START -->
		<?php if( get_field('grey_heading') ): ?>
			<div class="grey-heading">
				<h1 class="prompt"><?php the_field('grey_heading'); ?></h1>
			</div>
		<?php endif; ?>
		<div class="col-md-12 endpoint-guide">
			<?php if( get_field('instruction') ){ ?>
				<h1 class="prompt"><?php the_field('instruction'); ?></h1>
			<?php } ?>
			<?php $count = 1;
			if( have_rows('guide') ): ?>
				<div class="options">
					<?php
					while( have_rows('guide') ): the_row();?>
						<div class="instructions">
							<img src="<?php the_sub_field('image'); ?>">
							<h4>
								<span><?php echo $count; ?></span>
								<?php the_sub_field('text'); ?>
							</h4>
						</div>
					<?php 
					$count ++;
					endwhile;
					?>
				</div>
			<?php endif; ?>
		</div>
		<hr>

		<div class="col-md-12 endpoint-product">
			
			<?php $products = get_field('product_link'); 
			if( $products ) :
				foreach( $products as $post):
			        setup_postdata($post);
					echo wc_get_template_part( 'content-single-product' ); 
				endforeach; 
			endif;
			wp_reset_postdata();?>

		</div>
		<!-- endpoint - success END -->
	<?php endif; ?>
	<?php if( $layout == 'Endpoint No Fix' ): ?>
		<h1 class="prompt"><?php the_field('no_fix_message'); ?></h1>
		<!-- <p>If you’re having trouble measuring your slider <a href="<?php the_permalink(114); ?>" class="contact-help">contact us</a> for support</p> -->
	<?php endif; ?>


	<?php if( $layout == 'Endpoint Slider' ): ?>
		<script>
			$('#diagnostic-wrapper').addClass('unset');
		</script>
		<!-- endpoint - SLIDER START -->
		<?php if( get_field('slider_heading') ): ?>
			<div class="grey-heading">
				<h1><?php the_field('slider_heading'); ?></h1>
				<h2><?php the_field('slider_subheading'); ?></h2>
			</div>
		<?php endif; ?>
		
		<!-- <p>If you’ve already purchased a kit but did not find the slider you need, fill out the form <a href="<?php the_permalink(429); ?>" class="contact-help">here</a> for help</p> -->

		<div class="col-md-12 endpoint-product">
			
			<?php $products = get_field('slider'); 
			if( $products ) :
				foreach( $products as $post):
			        setup_postdata($post);
					echo wc_get_template_part( 'content-slider' ); 
				endforeach; 
			endif;
			wp_reset_postdata();?>

		</div>
		<!-- <p>If you’re having trouble measuring your slider <a href="<?php the_permalink(114); ?>" class="contact-help">contact us</a> for support</p> -->
		<!-- endpoint - SLIDER END -->
	<?php endif; ?>

</div>
</main>

<?php get_footer(); ?>

