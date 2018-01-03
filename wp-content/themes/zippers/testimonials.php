<div class="col-sm-12" id="testimonials">
	<h5>Customer Testimonial</h5>
	<div id="slider">
		<?php if(have_rows('testimonial', 5) ): while( have_rows('testimonial', 5) ): the_row(); ?>
			<div class="testimonial tight taller">
				<p><?php the_sub_field('quote'); ?></p>
				<p>- <?php the_sub_field('customer'); ?></p>
			</div>
		<?php endwhile; endif; ?>
	</div>
</div>