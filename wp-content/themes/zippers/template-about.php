<?php /* Template Name: ABOUT  */ get_header(); ?>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<main role="main" class="row">

		<div class="col-sm-2"></div>
		
		<!-- section -->
		<div class="col-sm-8">

			<h1><?php the_title(); ?></h1>

			<?php 
			if(have_rows('content_block')):
				while( have_rows('content_block') ): the_row(); ?>
					<div class="content-block">
						<?php if( get_sub_field('subheading') ){ ?>
							<h4 class="subheading"><?php the_sub_field('subheading'); ?></h4>
						<?php }; ?>
						<?php if( get_sub_field('body') ){ ?>
							<?php the_sub_field('body'); ?>
						<?php }; ?>
						<?php if(get_sub_field('add_video') == 'true' ) { ?>
							<div class="video">
								<div class="video-overlay">
									<div class="col-sm-2"></div>
									<div class="col-sm-8">
										<img class="close-overlay" src='<?php echo get_template_directory_uri(); ?>/img/icons/close.svg'>
										<h1><?php the_sub_field('video_description'); ?></h1>
										<div class="video-holder">
											<img class="iframe-sizer" src='<?php echo get_template_directory_uri(); ?>/img/icons/16x9.png'>
											<iframe width="560" height="315" 
											data-src="<?php the_sub_field('video_link'); ?>?enablejsapi=1&version=3&playerapiid=ytplayer&showinfo=0&rel=0" 
											frameborder="0" allowfullscreen></iframe>
										</div>
										<p><?php the_sub_field('video_description_full'); ?></p>
									</div>
									<div class="col-sm-2"></div>
								</div>
								<div class="vid-thumb">
									<img class="video-thumbnail" src="<?php the_sub_field('video_thumbnail'); ?>">
								</div>
								<p class="video-title"><?php the_sub_field('video_description'); ?></p>
							</div>
						<?php } ?>
					</div>
					<div class="ten-space"></div>
					<?php
				endwhile;
			endif;?>

			<!-- <h4>Our Mission</h4>
			
			<p><?php the_field('mission'); ?></p>

			<div class="ten-space"></div>

			<?php //if (have_rows('history')): while (have_rows('history')) : the_row(); ?>

				<h4>Zipper Rescue History</h4> -->

				<!-- <div class="vid-thumb">

					<img src="<?php the_sub_field('video_thumbnail'); ?>">

				</div> -->



				<!-- GOOD CODE, USE WHEN VIDEO IS READY -->
				<!-- <div class="video-overlay">
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
					<img class="video-thumbnail vid-thumb" src="<?php the_sub_field('video_thumbnail'); ?>">
				</div> -->

			<!-- 	<img src="<?php the_sub_field('video_thumbnail'); ?>">

				<div class="ten-space"></div>

				<p class="spaced"><?php the_sub_field('content'); ?></p>

			<?php // endwhile; endif; ?> -->

		</div>
		<!-- /section -->

		<div class="col-sm-2"></div>

	</main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>



