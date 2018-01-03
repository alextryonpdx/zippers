
function mobileMenu(){
	// mobile menu clicks
	$('#burger').on('click', function(){ 
		if( ! $('#burger').hasClass('open') ){
			$('#menu-mobile').css('display','inline-flex')
			.hide()
			// $('body').css('position', 'fixed');
			// $('html').css('position', 'fixed');
			$('#burger').toggleClass('open');
			$('#menu-mobile').fadeIn(300, function(){
				$('#menu-mobile li').animate({opacity: 1}, 400);
			});
			
		} else {
			// $('body').css('position', 'relative');
			// $('html').css('position', 'relative');
			$('#burger').toggleClass('open');
			$('#menu-mobile').fadeOut();
			// $('body').css('overflow', 'auto');
			$('#menu-mobile li').css('opacity',0);
			
			}
		
	});
	// $('.open').on('click', function(){ 
		
	// 	// $('.wrapper').css('position', 'relative');
	// });
}

function styleForms(){
	// create span to style chackboxes, radio buttons, etc 
	$('input[type=checkbox]').after('<span class="checkbox"></span>');
	$('input[type=radio]').after('<a class="radio"></a>');
	$('.halfy').parent('.wpcf7-form-control-wrap').addClass('half-form');
	$('.half-form').unwrap();
	$('textarea').attr('rows', 5);
}

function faqGalleryCover(){
	$('.faq-gallery-main').each(function(){
		src = $(this).parents('.show-faq-from-pic').siblings('.faq-gallery').find('.slide .gallery-img').first().attr('src');
		$(this).attr('src', src);
	});
}

function faqAnswerShowHide(){
	$('.question').each(function(){
		$(this).on('click', function(){
			$(this).next('.answer').slideToggle();
			$(this).find('img').toggleClass('opened');
		})
	})
}


function showMoreVideos(){
	$('.video-block-link').each( function(){
		$(this).on('click', function(){
			$(this).animate(
						{ height:0,
						padding:0,
						margin:'0 auto',
						opacity:0 }, 400, function(){
							$(this).parents('.video-block').find('.more-vids').slideToggle();
					});
		})
	})
}

function hideVideoOverlay(){
	$('.close-overlay').each(function(){
		$(this).on('click', function(){
			$overlay = $(this).parents('.video-overlay').find('iframe');
			$('.video-overlay').fadeOut();
			$( $overlay )[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*'); 
			$('body').removeClass('noscroll');
		})
	})
}


function showVideoOverlay(){
	$('.video-thumbnail').each(function(){
		$(this).on('click', function(){
			$(this).parents('.vid-thumb').siblings('.video-overlay').fadeIn();
			$src = $(this).parents('.vid-thumb').siblings('.video-overlay').find('iframe').attr('data-src');
			// console.log($(this).parents('.vid-thumb').siblings('.video-overlay').find('iframe').attr('data-src'));
			$(this).parents('.vid-thumb').siblings('.video-overlay').find('iframe').attr({ src : $src});
			$('html, body').animate( { scrollTop: 0 }, 400 );
			$('body').addClass('noscroll');
		})
	})
	$('.video-title').each(function(){
		$(this).on('click', function(){
			$(this).siblings('.video-overlay').fadeIn();
			$src = $(this).siblings('.video-overlay').find('iframe').attr('data-src');
			// console.log($(this).siblings('.video-overlay').find('iframe').attr('data-src'));
			$(this).siblings('.video-overlay').find('iframe').attr({ src : $src});
			$('html, body').animate( { scrollTop: 0 }, 400 );
		})
	})
	$('.vid-link').each(function(){
		$(this).on('click', function(){
			$(this).siblings('.video-overlay').fadeIn();
			$src = $(this).siblings('.video-overlay').find('iframe').attr('data-src');
			// console.log($(this).siblings('.video-overlay').find('iframe').attr('data-src'));
			$(this).siblings('.video-overlay').find('iframe').attr({ src : $src});
			$('html, body').animate( { scrollTop: 0 }, 400 );
		})
	})
	$('.vid-thumb').each(function(){
		$(this).on('click', function(){
			$(this).siblings('.video-overlay').fadeIn();
			$src = $(this).siblings('.video-overlay').find('iframe').attr('data-src');
			// console.log($(this).parents('.vid-thumb').siblings('.video-overlay').find('iframe').attr('data-src'));
			$(this).siblings('.video-overlay').find('iframe').attr({ src : $src});
			$('html, body').animate( { scrollTop: 0 }, 400 );
		})
	})
}



function showGalleryOverlay(){
	$('.show-faq-gallery, .show-faq-from-pic').each(function(){
		$(this).on('click', function(){
			$(this).siblings('.faq-gallery').fadeIn();
			initSlider( $(this).siblings('.faq-gallery').find('.faq-slider') );
			$('body').addClass('noscroll');
			// $('html, body').animate( { scrollTop: 0 }, 400 );
		})
	})
	// $('.video-title').each(function(){
	// 	$(this).on('click', function(){
	// 		$(this).siblings('.video-overlay').fadeIn();
	// 		$('html, body').animate( { scrollTop: 0 }, 400 );
	// 	})
	// })
}

function hideFaqSlider() {
	$('.close-gallery').on('click', function(){
		$('.faq-gallery').fadeOut();
		$('body').removeClass('noscroll');
	})
}


function initSlider(slider){
	console.log(slider);
	totalBlock = $(slider).parent('.gallery-content').find('#slide-total');
	total = $(slider).find('.slide').length;
	totalBlock.html(total);
	indexBlock = $(slider).parent('.gallery-content').find('#slide-number');
	$width = $('.col-sm-8').width();
	if( $width <= 10 ){
		$width = $(window).width();
	}
	$height = $(window).height();
	console.log('height: ' + $height);
	console.log('width: ' + $width);
	$(slider).slidesjs({
		width: $width,
		height: $height,
		navigation: {
			active: true
		},
		pagination: {
			active: false
		},
		callback: {
			complete: function(number) {
				console.log(number);
				indexBlock.html(number);
			}
		}
	});
	$('.slidesjs-previous').html('<img src="/wp-content/themes/zippers/img/icons/prev.svg">');
	$('.slidesjs-next').html('<img src="/wp-content/themes/zippers/img/icons/next.svg">');
	prev = $(slider).find('.slidesjs-previous');
	next = $(slider).find('.slidesjs-next');
	$(slider).parent('.gallery-content').find('.navs').append(prev);
	$(slider).parent('.gallery-content').find('.navs').append(next);
}

function sizeDescriptions(){
	// equalize descriptions to align 'add to cart' buttons
	if( $(window).width() >= 768 ){
		var maxHeight = 0;
		$('.product .description').height('auto');
		$('.product .description').each(function(){
		   maxHeight = $(this).height() > maxHeight ? $(this).height() : maxHeight;
		});
		$('.product .description').css('height', maxHeight);
	} else {
		$('.product .description').height('auto');
	}
}


function checkboxes(){
	$('#ship-to-different-address').on('click', function(){
		$('#ship-to-different-address-checkbox').click();
	})
}
function radios(){
	$('.measurements .radio').each(function(){
		$(this).on('click', function(){
			$(this).prev('input').click();
			link = $(this).prev('input').val();
			$('.radio').removeClass('clicked');
			$(this).addClass('clicked');
			$('.continue').attr('href', link);
			$('.continue').removeClass('nogo');
			pic = $(this).prev('input').attr('data-pic');
			teeth = $(this).prev('input').attr('data-teeth');
			console.log(pic);
			console.log(teeth);
			slide = $(this).parents('.wrapper')[0];
			$(slide).find('.teeth').html(teeth);
			$('.image-guide img').removeClass('hidden_pic');
			$('.image-guide img').addClass('hidden_pic');
			$(pic).removeClass('hidden_pic');
		})
		// show image and change span
		$(this).hover(function(){
			pic = $(this).prev('input').attr('data-pic');
			teeth = $(this).prev('input').attr('data-teeth');
			console.log(pic);
			console.log(teeth);
			slide = $(this).parents('.wrapper')[0];
			$(slide).find('.teeth').html(teeth);
			$('.image-guide img').removeClass('hidden_pic');
			$('.image-guide img').addClass('hidden_pic');
			$(pic).removeClass('hidden_pic');
		})
	})
	$('.hidden_pic').last().removeClass('hidden_pic');
}

function checkCart(){
	if($('#items').html() > 0){
		$('.empty-cart-icon').hide();
	    $('.full-cart-icon').show();
	    $('#items').css('border-color','#EF5225').css('background-color','#EF5225').css('color','#FFFFFF');
	    $('#items-mobile').css('border-color','#EF5225').css('background-color','#EF5225').css('color','#FFFFFF');
	} else {
		$('.empty-cart-icon').show();
	    $('.full-cart-icon').hide();
	}
}

function formFilled(){
	if( $(window).width > 768 ){
		empty = false;
		$('.wpcf7-validates-as-required').each(function(){
			if($(this).val() == ''){
				empty = true;
			} 
		})
		if (empty) {
			$('.wpcf7-submit').addClass('disabled');
			$('.wpcf7-submit').prop("disabled",true);
		} else {
			$('.wpcf7-submit').removeClass('disabled');
			$('.wpcf7-submit').prop("disabled",false);
		}
	}
	
}



function faqSpacer(){
	$('.answer-block').each(function(){
		if( $(this).children().length <= 1 ){
			$(this).addClass('single');
		};

		if( $(this).find('p').length == 0 ){
			$(this).addClass('no-space');
		}
	})
}



function addToCart(url, elem, cart){
	
	if($('input').length >0){
		var input = document.getElementsByTagName("input")[0];
		qty = input.value;
		
	}else {
		qty = 1;
	}
	url = url + '&quantity=' + qty;
	console.log(url);
	$.ajax({
		  url: url,
		  context: document.body
	}).done(function() {
		  items = parseInt($('#items').html()) + parseInt(qty);
		  $( '#items').html(items);
		  $( '#items-mobile').html(items);
		  $('#cart img').animate({'width':'60px'},500, function() {
		  		$('#cart img').animate({'width':'26px'},500)
		  })
		  $(elem).html('ADDED TO CART');
		  $(elem).removeClass('button');
		  $(elem).addClass('used-button');
		  $(elem).unbind('click');
		  $(elem).on('click', function(){
		  	window.location = cart;
		  })
		  checkCart();
		  if( $(window).width() < 768 ) {
		  	location.reload();
		  }
		  sizeDescriptions();
	});
}

function addSliderToCart(url, elem, cart){
	kit = $("#add-slider").attr('data-kit');
	console.log(kit);
	$.ajax({
		  url: url,
		  context: document.body
	}).done(function() {
		$.ajax({
			  url: kit,
			  context: document.body
		}).done(function() {
			  items = parseInt($('#items').html()) + 2;
			  $( '#items').html(items);
			  $( '#items-mobile').html(items);
			  $('#cart img').animate({'width':'32px'},500, function() {
			  		$('#cart img').animate({'width':'26px'},500)
			  })
			  $(elem).html('ADDED TO CART');
			  $(elem).removeClass('button');
			  $(elem).addClass('used-button');
			  $(elem).unbind('click');
			  $(elem).on('click', function(){
			  	window.location = cart;
			  })
			  checkCart();
			  if( $(window).width() < 768 ) {
			  	location.reload();
			  }
		});
	})
}

function kitRadios(){
	$('#add-kit-form .radio').first().addClass('clicked');
	$('#add-kit-form .radio').each(function(){
		$(this).on('click', function(){
			hit = $(this).prev('input');
			console.log(hit);
			$(hit).click();
			link = $(hit).val();
			console.log(link);
			$('.radio').removeClass('clicked');
			$(this).addClass('clicked');
			$('#add-slider').attr('data-kit', link);
		})
	})
}







function shrinkNav(){
	$(window).scroll(function() {    
	    var scroll = $(window).scrollTop();
	    if (scroll >= 20 ) {
	        $('body').addClass('shrunk');
	    } else {
	    	$('body').removeClass('shrunk');
	    }
	});
}




// function checkoutFilled(){
// 		empty = false;
// 		$('.validate-required ').each(function(){
// 			if($(this).hasClass('woocommerce-invalid') ){
// 				empty = true;
// 			} 
// 		})
// 		if (empty) {
// 			$('#place_order').addClass('disabled');
// 			$('#place_order').prop("disabled",true);
// 		} else {
// 			$('#place_order').removeClass('disabled');
// 			$('#place_order').prop("disabled",false);
// 		}
// }