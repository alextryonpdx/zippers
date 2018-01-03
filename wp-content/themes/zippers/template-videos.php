<?php /* Template Name: VIDEOS  */ get_header(); ?>

	<main role="main">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<?php if (have_rows('video_block')): while (have_rows('video_block')) : the_row(); ?>

				<div class="video-block">

					<h1><?php the_sub_field('title'); ?></h1>

					<div class="videos">

						<?php $vidCount = 0; ?>

						<?php if (have_rows('videos')): while (have_rows('videos')) : the_row(); ?>

							<div class="video">

								<div class="video-overlay">

									<div class="col-sm-2">
										
									</div>

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

							<?php $vidCount++; ?>

							<?php if( $vidCount == 3 ){ 

								echo '<div class="more-vids"><div class="videos">';

							}; ?>

						<?php endwhile; 

							if( $vidCount >= 3 ){ 

								$button = get_sub_field('button_text');

								echo '</div></div>';

								echo '<a class="video-block-link">' . $button . '</a>';

							};

						endif; ?>

					</div>

					<!-- <a class="video-block-link"><?php //the_sub_field('button_text'); ?></a> -->

				</div>

			<?php endwhile; endif; ?>

		<?php endwhile; endif; ?>

	</main>


<script>
// remove empty 'more vid' divs and buttons
$('.more-vids').each(function(){
	if( $(this).text().length <= 10 ) {
		$(this).siblings('.video-block-link').remove();
		$(this).remove();
	}
})
</script>
<?php get_footer(); ?>
