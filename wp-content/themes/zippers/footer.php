		
		<?php  
			if( get_field('show_testimonials') == 'true' ){
				wc_get_template_part( 'testimonials' );
			} 
		?>


		</div>
		<!-- /wrapper -->

		<!-- footer -->
		<footer class="footer" role="contentinfo">

			<div class="footer-box">

				<!-- copyright -->
				<p class="copyright">&copy; ZRK Enterprises LLC -  All rights Reserved<?php // bloginfo('name'); ?></p>
				<!-- /copyright -->

				<div id="social-footer">
					<a target="_blank" href="https://www.facebook.com/zipperrescue">
						<img src="<?php echo get_template_directory_uri(); ?>/img/icons/facebook.png">
					</a>
					<a target="_blank" href="https://www.instagram.com/zipper_rescue/">
						<img src="<?php echo get_template_directory_uri(); ?>/img/icons/instagram.png">
					</a>
				</div>

		</div>

		</footer>
		<!-- /footer -->

		

		<?php wp_footer(); ?>


		<script>
		$(document).ready(function(){
			$('#menu-item-50').html('<img id="menu-x" src="<?php echo get_template_directory_uri(); ?>/img/icons/x.svg"/>');
			$('#menu-item-49').html('<img src="<?php echo get_template_directory_uri(); ?>/img/icons/cart.svg" alt="shopping cart"><span id="items">0</span>');
			mobileMenu();
			styleForms();
			faqGalleryCover();
			faqAnswerShowHide();
			faqSpacer();
			showMoreVideos();
			showVideoOverlay();
			hideVideoOverlay();
			showGalleryOverlay();
			// initFaqSlider();
			hideFaqSlider();
			checkboxes();
			radios();
			checkCart();
			kitRadios();
			shrinkNav();

			// disable submit buttons on contact forms
			if( $('.contact') || $('.contact-help') ) {
				formFilled()
			}
			// bind ~form validation~ to inputs
			$('.contact form input').on('keyup', function(){
			    formFilled();
			});
			$('.contact-help form input').on('keyup', function(){
			    formFilled();
			});
			
			w = $('.testimonial').width();
			h = $('.testimonial').height() + 50;
			console.log(w);
			console.log(h);
			$('#slider').slidesjs({
				navigation: false,
				pagination: false,
				width: w,
				height: h,
				play: {
				  active: false,
				  effect: "fade",
				  interval: 6000,
				  auto: true,
				  swap: false,
				  pauseOnHover: false,
				  restartDelay: 2500
				}
			})
		});
		</script>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
