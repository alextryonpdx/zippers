<?php /* Template Name: CONTACT */ get_header(); ?>

	<main role="main" class="row">

		<div class="col-md-2 col-sm-1"></div>
		
		<!-- section -->
		<div class="col-md-8 col-sm-10">

			<h1><?php the_field('heading'); ?></h1>

			<p><?php the_field('content'); ?></p>

			<div class="clear">
				<div class="contact-block spaced">
					<h5>By Mail</h5>
					<p><?php the_field('address'); ?></p>
				</div>

				<div class="contact-block spaced">
					<h5>By Phone</h5>
					<p><?php the_field('phone'); ?></p>
				</div>
			</div>

				<h5>What can we help you with?</h5>
				<h5 class="non-mobile" style="font-weight:400">
					<a class="orange-link" href="<?php the_permalink(11); ?>">Zipper identification help</a>
				</h5>
				<h5 class="non-mobile" style="font-weight:400">
					<a class="orange-link" href="<?php the_permalink(611); ?>">Wholesale inquiry</a>
				</h5>
			

			<?php echo do_shortcode('[contact-form-7 id="19" title="Contact Form"]'); ?>	

		</div>
		<!-- /section -->

		<div class="col-md-2 col-sm-1"></div>

	</main>

<?php get_footer(); ?>
