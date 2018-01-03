<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.png" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

		<!-- bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		
		<script src="//cdn.rawgit.com/noelboss/featherlight/1.5.0/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.slides.min.js"></script>


		

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fonts/fonts.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/custom.css">

	</head>
	<body <?php body_class(); ?>>
	<?php global $woocommerce; ?>

	<?php if( $pagename == 'zipper-wizard'): ?>
		<!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/reveal.css"> -->
		<!-- <script src="<?php echo get_template_directory_uri(); ?>/js/reveal.js"></script> -->
		<!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css"> -->
		<!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fonts/fonts.css"> -->
		<!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/custom.css"> -->
	<?php endif; ?>

		<!-- <div id="success">Successfully Added</div> -->

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear non-mobile" role="banner">
				<div class="header-box row">
					<!-- logo -->
					<div class="logo col-sm-2">
						<a href="<?php echo home_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/icons/zipper_rescue_logo.svg" alt="Logo" class="logo-img">
						</a>
					</div>
					<!-- /logo -->

					<!-- nav -->
					<div class="col-sm-8" id="nav">
						<nav class="nav" role="navigation">
							<?php html5blank_nav(); ?>
						</nav>
					</div>
					<!-- /nav -->

					<div class="col-sm-2" id="cart">
						<a href="<?php the_permalink(16); ?>">
							<img class="full-cart-icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/cart-orange.svg" alt="shopping cart">
							<img class="empty-cart-icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/cart.svg" alt="shopping cart">
							<span id="items"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></span>
						</a>
					</div>
				</div>
			</header>
			<!-- /header -->

			<div id="mobile-header" class="mobile-only">

				<a id="mobile-logo" href="<?php echo home_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/icons/zipper_rescue_logo.svg" alt="Logo">
				</a>

				<!-- <img id="burger" src="<?php echo get_template_directory_uri(); ?>/img/icons/burger.svg"/> -->
				<div id="burger">
				  <div id="burger1"></div>
				  <div id="burger2"></div>
				  <div id="burger3"></div>
				</div>
				<ul id="menu-mobile" class="menu">
					<!-- <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-50">
						<img id="menu-x" src="http://zippers.alextryonpdx.com/wp-content/themes/zippers/img/icons/x.svg">
					</li> -->
					<li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-5 current_page_item menu-item-39">
						<a href="<?php echo the_permalink(5); ?>">Home</a>
					</li>
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28">
							<a href="<?php echo the_permalink(13); ?>">How to Videos</a>
						</li>
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-27">
							<a href="<?php echo the_permalink(15); ?>">Products</a>
						</li>
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-42">
							<a href="<?php echo the_permalink(40); ?>">FAQ</a>
						</li>
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-30">
							<a href="<?php echo the_permalink(9); ?>">About Zipper Rescue</a>
						</li>
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-31">
							<a href="<?php echo the_permalink(7); ?>">Contact</a>
						</li>
					<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-49">
						<a href="<?php echo the_permalink(16); ?>">
							<img class="full-cart-icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/cart-orange.svg" alt="shopping cart">
							<img class="empty-cart-icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/cart.svg" alt="shopping cart">
							<span id="items-mobile"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span>
						</a>
					</li>

					<li id="zipper-wizard-mobile-link" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-29">
						<a href="<?php echo the_permalink(11); ?>">Zipper Wizard</a>
					</li>
				</ul>
			</div>
		