<?php /* Template Name: STRIPPED - WIDE  */ get_header(); ?>

	<main role="main" class="row">

		<div class="col-md-2"></div>
		
		<!-- section -->
		<div class="col-md-8">

			<h1><?php the_title(); ?></h1>

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php the_content(); ?>

				</article>
				<!-- /article -->

			<?php endwhile; endif; ?>

		</div>
		<!-- /section -->

		<div class="col-md-2"></div>

	</main>

<?php get_footer(); ?>
