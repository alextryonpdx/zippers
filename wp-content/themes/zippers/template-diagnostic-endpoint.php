<?php /* Template Name: Diagnostic Endpoint */ get_header(); ?>

<?php 
// this retrieves prev URL. 
// use to differentiate normal slider product page from those reaced via diagnostic tool (add grey headline and contact link at bottom)
// echo wp_get_referer(); 
?>






	<main role="main" class="row">

		<?php if( get_field('grey_heading') ): ?>
			<div class="grey-heading">
				<h1 class="prompt"><?php the_field('grey_heading'); ?></h1>
			</div>
		<?php endif; ?>
		<?php 
		$count = 1;
		if( have_rows('guide') ): ?>
			<div class="col-md-12 endpoint-guide">
				<h1 class="prompt"><?php the_field('instruction'); ?></h1>
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
			</div>
			<hr>
		<?php endif; ?>

		<div class="col-md-12 endpoint-product">
			
			<?php $products = get_field('product_link'); 
			foreach( $products as $post):
		        setup_postdata($post);
				echo wc_get_template_part( 'content-single-product' ); 
			endforeach; 
			wp_reset_postdata();?>

		</div>

	</main>

<?php get_footer(); ?>

