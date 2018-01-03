<?php /* Template Name: FAQ */ get_header(); ?>
	<main role="main" class="row">
		<div class="col-md-2 col-sm-1"></div>
		<!-- section -->
		<div class="col-md-8 col-sm-10">
			<h1><?php the_title(); ?></h1>
			<?php if (have_posts()): while (have_posts()) : the_post(); 
				$counter = 0;
			?>
				<?php if (have_rows('faq')): while (have_rows('faq')) : the_row(); ?>
					<?php 
						$question = get_sub_field('question');
					?>
					<div class="faq">
						<div class="question">
							<img src="/wp-content/themes/zippers/img/icons/arrow.svg"/><h4><?php echo $question; ?></h4>
						</div>
						<div class="answer">
							<?php while( have_rows('answer') ): the_row(); ?>
								<div class="answer-block">
									<?php if( get_sub_field('heading') ): ?>
										<h5><?php the_sub_field('heading'); ?></h5>
									<?php endif; ?>
									<?php if( get_sub_field('attach_video') == 1 ): ?>
										<!-- <a target="_blank" class="vid-link" href="<?php the_sub_field('video_link_url'); ?>">
											<?php the_sub_field('video_link_text'); ?>
										</a> -->
										<div class="video">
											<div class="video-overlay">
												<div class="col-sm-2"></div>
												<div class="col-sm-8">
													<img class="close-overlay" src='<?php echo get_template_directory_uri(); ?>/img/icons/close.svg'>
													<div class="video-holder">
														<img class="iframe-sizer" src='<?php echo get_template_directory_uri(); ?>/img/icons/16x9.png'>
														<iframe width="560" height="315" 
														data-src="<?php the_sub_field('video_link_url'); ?>?enablejsapi=1&version=3&playerapiid=ytplayer&showinfo=0&rel=0" 
														frameborder="0" allowfullscreen></iframe>
													</div>
												</div>
												<div class="col-sm-2"></div>
											</div>
											<a class="vid-link">
												<?php the_sub_field('video_link_text'); ?>
											</a>
										</div>
									<?php endif; ?>
									<?php if( get_sub_field('add_button') == 1 ): ?>
										<a target="_blank" class="button" href="<?php the_sub_field('button_link'); ?>">
											<?php the_sub_field('button_text'); ?>
										</a>
									<?php endif; ?>
									<?php if( get_sub_field('full_block') ): ?>
										<?php the_sub_field('full_block') ?>
									<?php endif; ?>
									<?php if( get_sub_field('left') ): ?>
										<div class="faq-left">
											<?php the_sub_field('left') ?>
										</div>
										<div class="faq-right">
											<?php $title = get_sub_field('gallery_title'); ?>
											<?php if( have_rows('images') ): ?>
												<?php 
												$imgs=0;
												while( have_rows('images') ): the_row();
													$imgs++;
												endwhile; 
												if( $imgs > 1 ):
												?>	
													<a class="show-faq-from-pic"><img class="faq-gallery-main"/></a>
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
																
																<h1><?php echo $title; ?></h1>

																<div class="faq-slider" id="slider<?php echo $counter; ?>">
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
												<?php else: ?>
													<a class="show-faq-from-pic"><img class="faq-gallery-main"/></a>
													<a class="show-faq-gallery">Expand image</a>
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
												<?php endif; ?>
											<?php endif; ?>
										</div>
									<?php endif; ?>
								</div>
							<?php $counter++; endwhile; ?>
							<hr class="faq-hr" />
						</div>
					</div>
				<?php endwhile; endif; ?>
			<?php endwhile; endif; ?>
		</div>
		<!-- /section -->
		<div class="col-md-2 col-sm-1"></div>

		
	</main>


<?php get_footer(); ?>
