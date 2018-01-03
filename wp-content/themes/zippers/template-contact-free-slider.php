<?php /* Template Name: CONTACT - Free Slider */ get_header(); ?>

	<main role="main" class="row">

		<div class="col-md-2 col-sm-1"></div>
		
		<!-- section -->
		<div class="col-md-8 col-sm-10">

			<h1><?php the_field('heading'); ?></h1>

			<p><?php the_field('content'); ?></p>

			<?php echo do_shortcode('[contact-form-7 id="428" title="Free Slider Form"]'); ?>	

		</div>
		<!-- /section -->

		<div class="col-md-2 col-sm-1"></div>

	</main>

<?php get_footer(); ?>
