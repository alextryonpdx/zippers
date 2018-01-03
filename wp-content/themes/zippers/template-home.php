<?php /* Template Name: HOME  */ get_header(); ?>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<div class="hero non-mobile" style="background-image:url('<?php the_field('hero_image'); ?>');">
		<div class="headings">
			<h1><?php the_field('hero_heading'); ?></h1>
			<h2 class="non-mobile"><?php the_field('hero_subheading'); ?></h2>
			<a class="non-mobile button" href="<?php the_permalink(11); ?>">Is Your Zipper Repairable?</a>
			<!-- <a class="non-mobile" href="<?php the_permalink(11); ?>">Can Your Mazda Miata Zipper be Fixed?</a> -->
		</div>
		<a href="<?php the_permalink(429); ?>" class="bottom-bar non-mobile">
			<span class="full-width">
				<p>Already bought a kit but didn’t find the parts you need?</p>
				<span class="button-sm" >We Can Help!</span>
			</span>
		</a>
	</div>

	<div class="hero mobile-only" style="background-image:url('<?php the_field('mobile_hero_image'); ?>');">

		<!-- <h1><?php the_field('hero_heading'); ?></h1> -->
<!-- 		<img class="mobile-only" src="<?php the_field('mobile_hero_image'); ?>">
 -->	</div>
	<main role="main" class="row">

		

		<div class="col-sm-12 mobile-only" id="mobile-home">
			<h1 class="mobile-only"><?php the_field('hero_heading'); ?></h1>
			<h2 class="mobile-only"><?php the_field('hero_subheading'); ?></h2><br>
			<a class="mobile-only button" href="<?php the_permalink(11); ?>">Is Your Zipper Repairable?</a><br><br>
			<a class="mobile-only orange-link" href="<?php the_permalink(429); ?>">Bought a kit but didn’t find the right part?</a><br><br>
			<!-- <a class="mobile-only orange-link" href="<?php the_permalink(11); ?>">Can Your Mazda Miata Zipper be Fixed?</a> -->
		</div>
		
	
			<!-- section -->
		<div class="col-sm-4" style="margin-top: 6px;">
			<h5 style="margin-bottom: 20px;"><?php the_field('home_subheading'); ?></h5>
			<?php the_field('home_body')?>
		</div>
		<!-- /section -->

		<!-- section -->
		<div class="col-sm-4" id="home-videos">
			<?php if(have_rows('videos') ): while( have_rows('videos') ): the_row(); ?>
				<!-- <div class="home-video">
					<h4><?php the_sub_field('video_title'); ?></h4>
					<div class="vid-thumb">
						<img src="<?php the_sub_field('video_thumbnail'); ?>">
					</div>
				</div> -->
				<div class="home-video">
				<!-- 	<div class="video-overlay">
						<div class="col-sm-2">
							<img class="close-overlay" src='<?php echo get_template_directory_uri(); ?>/img/icons/close.svg'>
						</div>
						<div class="col-sm-8">
							<div class="video-holder">
								<img class="iframe-sizer" src='<?php echo get_template_directory_uri(); ?>/img/icons/16x9.png'>
								<iframe width="560" height="315" 
								data-src="<?php the_sub_field('video_link'); ?>?enablejsapi=1&version=3&playerapiid=ytplayer&showinfo=0&rel=0" 
								frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
						<div class="col-sm-2"></div>
					</div> -->
					<div class="video-overlay">
						<div class="col-sm-2">
						</div>
						<div class="col-sm-8">
							<img class="close-overlay" src='<?php echo get_template_directory_uri(); ?>/img/icons/close.svg'>
							<div class="video-holder">
								<img class="iframe-sizer" src='<?php echo get_template_directory_uri(); ?>/img/icons/16x9.png'>
								<iframe width="560" height="315" 
								data-src="<?php the_sub_field('video_link'); ?>?enablejsapi=1&version=3&playerapiid=ytplayer&showinfo=0&rel=0" 
								frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
						<div class="col-sm-2"></div>
					</div>
					<div class="vid-thumb">
						<h4><?php the_sub_field('video_title'); ?></h4>
						<img class="video-thumbnail vid-thumb" src="<?php the_sub_field('video_thumbnail'); ?>">
					</div>
				</div>
			<?php endwhile; endif; ?>
		</div>
		<!-- /section -->

			<!-- section -->
		<div class="col-sm-4" id="testimonials">
			<h5>Customer Testimonial</h5>
			<div id="slider">
				<?php if(have_rows('testimonial') ): while( have_rows('testimonial') ): the_row(); ?>
					<div class="testimonial tight taller">
						<p><?php the_sub_field('quote'); ?></p>
						<p>- <?php the_sub_field('customer'); ?></p>
					</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
		<!-- /section -->


	</main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
