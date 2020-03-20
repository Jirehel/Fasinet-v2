(function($) {
	"use strict";
	
	$(document).ready(function() {

		$('.number').counterUp({
            delay: 10,
            time: 1000
        });

		/*  [ Menu Moblie ]
        - - - - - - - - - - - - - - - - - - - - */
		var toggles = document.querySelectorAll('.c-hamburger');
		for (var i = toggles.length - 1; i >= 0; i--) {
			var toggle = toggles[i];
			toggleHandler(toggle);
		};
		function toggleHandler(toggle) {
		    toggle.addEventListener('click', function(e) {
		    	e.preventDefault();
		    	(this.classList.contains('is-active') === true) ? this.classList.remove('is-active') : this.classList.add('is-active');
		    });
		}

		/*  [ Main Menu ]
        - - - - - - - - - - - - - - - - - - - - */
        $('.c-hamburger').on('click', function() {
            $(this).parent().parent().find('.main-menu').toggleClass('open');
            $('.menu-bg').fadeIn();
        });
        $('.menu-bg').on('click', function(){
        	$(this).fadeOut();
        	$(this).parent().find('.main-menu').removeClass('open');
        	$('.c-hamburger').removeClass('is-active');
        });
        $('.main-menu ul li a .arrow').on('click', function(e) {
        	e.preventDefault();
			$(this).closest('li').toggleClass('open');
        	$(this).closest('li').find('.dropdown-menu').slideToggle();
        });
     
		/*  [ Faq ]
        - - - - - - - - - - - - - - - - - - - - */
        $('.faq-reply').hide();
        $('.faq-item li a').on('click', function(e){
        	e.preventDefault();
            $('.faq-item li a').not(this).next().slideUp().parent().removeClass('open');
            $(this).next().slideToggle().parent().toggleClass('open');
        });
		
		/*  [ Product Detail ]
        - - - - - - - - - - - - - - - - - - - - */
		$('#owl-shop').owlCarousel({
	        navigation: true,
	        navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
	        loop:true,
			autoplay:false,
			autoplayTimeout:3000,
   			autoplayHoverPause:true,
	        singleItem: true,
	        afterInit: makePages,
	        afterUpdate: makePages
	    });
	    function makePages() {
	        $.each(this.owl.userItems, function(i) {
	            $('.owl-controls .owl-page').eq(i)
	                .css({
	                    'background': 'url(' + $(this).find('img').attr('src') + ')',
	                    'background-size': 'cover',
	                })
	        });
	    };

		/*  [ Back Top button ]
        - - - - - - - - - - - - - - - - - - - - */
		$('.go-up').hide();
		$(window).on('scroll', function () {
			if ($(this).scrollTop() > 400) {
				$('.go-up').fadeIn();
			} else {
				$('.go-up').fadeOut();
			}
			
			return false;
		});
		$('.go-up a').on('click', function (e) {
			e.preventDefault();
			$('html, body').animate({
				scrollTop: 0
			}, 600);
			
			return false;
		});
		
		$('.back-top').on('click', function (e) {
	        e.preventDefault();
	        $('html,body').animate({
	            scrollTop: 0
	        }, 700);
	    });

	    /*  [ Course Tab ]
        - - - - - - - - - - - - - - - - - - - - */
	 	$('.curriculum-content').hide();
	    $('.curriculum-top a').on('click', function(e){
        	e.preventDefault();
            $('.curriculum-top a').not(this).parent().parent().parent().removeClass('active');
            $('.curriculum-top a').not(this).parent().parent().parent().find('.curriculum-content').slideUp();
            $(this).parent().parent().parent().find('.curriculum-content').slideToggle();
            $(this).parent().parent().parent().toggleClass('active');
        });

		/*  [ Slider ]
        - - - - - - - - - - - - - - - - - - - - */
	    $('.slider-main').owlCarousel({
		    loop:true,
			autoplay:true,
			autoplayTimeout:4000,
   			autoplayHoverPause:true,
   			items: 1,
   			nav: false,
   			dots: false,
		});
		$('.main-slider').owlCarousel({
		    loop:true,
			autoplay:false,
			autoplayTimeout:7000,
   			autoplayHoverPause:true,
   			items: 1,
   			nav: false,
   			dots: true,
		});
		$('.portfolio-slider').owlCarousel({
		    loop:true,
			autoplay:false,
			autoplayTimeout:7000,
   			autoplayHoverPause:true,
   			items: 3,
   			margin: 30,
   			nav: false,
   			dots: true,
   			responsive:{
		        0:{
		            items:1
		        },
		        576:{
		            items:2
		        },
		        992:{
		            items:3
		        }
		    }
		});
		
		/*  [ Event Grid/List ]
        - - - - - - - - - - - - - - - - - - - - */
		$('.page-event .nav-tabs.hide').hide();
		$('.page-event .icon-filter ul li').on('click', function(e){
			$('.page-event .nav-tabs').hide();
			$('.page-event .nav-tabs.' + $(this).attr('data-tab')).show();
        });
		
		setTimeout(function() {
			// Megamenu 1
			$('.slider-wrap').owlCarousel({
				navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
				loop:true,
				autoplay:false,
				autoplayTimeout:7000,
				autoplayHoverPause:true,
				items: 3,
				margin: 30,
				nav: true,
				dots: false,
				center: true,
				URLhashListener:true,
				startPosition: 'URLHash',
				responsive:{
					0:{
						items:1,
						margin: 0,
						center: false,
					},
					992:{
						items:3
					}
				}
			});
			$('.slider-wrap').find('.owl-nav').removeClass('disabled');
			$('.slider-wrap').on('changed.owl.carousel', function(event) {
				$(this).find('.owl-nav').removeClass('disabled');
			});
		
			// Megamenu 2
			$('.menu-course-slider').owlCarousel({
				navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
				loop:true,
				autoplay:false,
				autoplayTimeout:7000,
				autoplayHoverPause:true,
				items: 1,
				nav: true,
				dots: false,
			});
		}, 100);
		
		$('.welcome-slider').owlCarousel({
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
		    loop:true,
			autoplay:false,
			autoplayTimeout:7000,
   			autoplayHoverPause:true,
   			items: 1,
   			nav: true,
   			dots: false,
		});

		$('.team-slider').owlCarousel({
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
		    loop:true,
			autoplay:false,
			autoplayTimeout:7000,
   			autoplayHoverPause:true,
   			items: 5,
   			nav: true,
   			dots: false,
   			responsive:{
		        0:{
		            items:1
		        },
		        360:{
		            items:2
		        },
		        576:{
		            items:3
		        },
		        767:{
		            items:4
		        },
		        992:{
		            items:5
		        }
		    }
		});
		$('.team-slider').find('.owl-nav').removeClass('disabled');
		$('.team-slider').on('changed.owl.carousel', function(event) {
			$(this).find('.owl-nav').removeClass('disabled');
		});
		
		$('.home6 .upcoming-content').owlCarousel({
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
		    loop:true,
			autoplay:false,
			autoplayTimeout:7000,
   			autoplayHoverPause:true,
   			items: 3,
   			nav: true,
   			dots: false,
   			margin: 30,
   			responsive:{
		        0:{
		            items:1
		        },
		        576:{
		            items:2
		        },
		        992:{
		            items:3
		        }
		    }
		});
		$('.upcoming-content').find('.owl-nav').removeClass('disabled');
		$('.upcoming-content').on('changed.owl.carousel', function(event) {
			$(this).find('.owl-nav').removeClass('disabled');
		});
		
		/*  [ Slider Parner ]
        - - - - - - - - - - - - - - - - - - - - */
	    $('.partner-slider').owlCarousel({
		    loop:true,
			autoplay:false,
			autoplayTimeout:7000,
   			autoplayHoverPause:true,
   			items: 5,
   			nav: false,
   			dots: false,
   			responsive:{
		        0:{
		            items:1
		        },
		        360:{
		            items:2
		        },
		        576:{
		            items:3
		        },
		        992:{
		            items:5
		        }
		    }
		});

		$('.popular-slider').owlCarousel({
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			nav: true,
		    loop:true,
			autoplay:false,
			autoplayTimeout:7000,
   			autoplayHoverPause:true,
   			dots: true,
   			items: 3,
   			margin: 60,
   			responsive:{
		        0:{
		            items:1
		        },
		        576:{
		            items:2,
		            margin: 30,
		        },
		        992:{
		            items:3
		        }
		    }
		});

		$('.home5 .faculaties-slider').owlCarousel({
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			nav: true,
		    loop:true,
			autoplay:false,
			autoplayTimeout:7000,
   			autoplayHoverPause:true,
   			dots: false,
   			items: 3,
   			margin: 60,
   			responsive:{
		        0:{
		            items:1
		        },
		        576:{
		            items:2,
		            margin:30,
		        },
		        992:{
		            items:3
		        }
		    }
		});
		$('.home6 .faculaties-slider').owlCarousel({
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			nav: true,
		    loop:true,
			autoplay:false,
			autoplayTimeout:7000,
   			autoplayHoverPause:true,
   			dots: false,
   			items: 3,
   			margin: 60,
   			responsive:{
		        0:{
		            items:1
		        },
		        576:{
		            items:2,
		            margin:30,
		        },
		        992:{
		            items:3
		        }
		    }
		});
		$('.event-detail .faculaties-slider').owlCarousel({
			nav: false,
		    loop:true,
			autoplay:false,
			autoplayTimeout:7000,
   			autoplayHoverPause:true,
   			dots: true,
   			items: 3,
   			margin: 30,
   			responsive:{
		        0:{
		            items:1
		        },
		        576:{
		            items:2,
		        },
		        992:{
		            items:3
		        }
		    }
		});

		$('.faculaties-slider').owlCarousel({
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			nav: true,
		    loop:true,
			autoplay:false,
			autoplayTimeout:7000,
   			autoplayHoverPause:true,
   			dots: false,
   			items: 5,
   			margin: 60,
   			responsive:{
		        0:{
		            items:1,
		            margin: 30,
		        },
		        576:{
		            items:2,
		            margin: 30,
		        },
		        767:{
		            items:3,
		            margin: 30,
		        },
		        992:{
		            items:4,
		            margin: 30,
		        },
		        1435:{
		            items:5
		        }
		    }
		});
		$('.faculaties-slider').find('.owl-nav').removeClass('disabled');
		$('.faculaties-slider').on('changed.owl.carousel', function(event) {
			$(this).find('.owl-nav').removeClass('disabled');
		});
		$('.faculity-slider').owlCarousel({
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			nav: true,
		    loop:true,
			autoplay:false,
   			autoplayHoverPause:true,
   			dots: false,
   			items: 1,
		});
		
		var owl = $('.popular-c-slider').owlCarousel({
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			loop : true,
			nav : true,
			items: 3,
   			margin: 60,
   			autoplay:false,
   			responsive:{
		        0:{
		            items:1
		        },
		        576:{
		            items:2,
		            margin: 30,
		        },
		        992:{
		            items:3
		        }
		    }
		})
		var owlAnimateFilter = function(even) {
			$(this)
			.addClass('__loading')
			.delay(70 * $(this).parent().index())
			.queue(function() {
				$(this).dequeue().removeClass('__loading')
			})
		}

		$('.btn-filter-wrap').on('click', '.btn-filter', function(e) {
			var filter_data = $(this).data('filter');

			/* return if current */
			if($(this).hasClass('btn-active')) return;

			/* active current */
			$(this).addClass('btn-active').siblings().removeClass('btn-active');

			/* Filter */
			owl.owlFilter(filter_data, function(_owl) { 
				$(_owl).find('.popular-item').each(owlAnimateFilter); 
			});
		});
		$('.popular-slider').find('.owl-nav').removeClass('disabled');
		$('.popular-slider').on('changed.owl.carousel', function(event) {
			$(this).find('.owl-nav').removeClass('disabled');
		});
		$('.popular-slider').find('.owl-dots').removeClass('disabled');
		$('.popular-slider').on('changed.owl.carousel', function(event) {
			$(this).find('.owl-dots').removeClass('disabled');
		});

		$('.events-slider').owlCarousel({
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			nav: true,
		    loop:true,
			autoplay:true,
			autoplayTimeout:7000,
   			autoplayHoverPause:true,
   			dots: true,
   			items: 2,
   			margin: 60,
   			responsive:{
		        0:{
		            items:1
		        },
		        900:{
		        	items: 2,
		            margin: 30,
		        },
		        1400:{
		            margin: 60,
		        }
		    }
		});
		
		$('.blog-left .blog-slider').owlCarousel({
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			nav: true,
		    loop:true,
			autoplay:false,
			autoplayTimeout:7000,
   			autoplayHoverPause:true,
   			dots: true,
   			items: 1,
   			margin: 60
		});
		$('.blog-slider').owlCarousel({
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			nav: true,
		    loop:true,
			autoplay:false,
			autoplayTimeout:7000,
   			autoplayHoverPause:true,
   			dots: true,
   			items: 2,
   			margin: 60,
   			responsive:{
		        0:{
		            items:1
		        },
		        1000:{
		        	items: 2,
		            margin: 30,
		        },
		        1400:{
		            margin: 60,
		        }
		    }
		});
		$('.blog-slider').find('.owl-nav').removeClass('disabled');
		$('.blog-slider').on('changed.owl.carousel', function(event) {
			$(this).find('.owl-nav').removeClass('disabled');
		});
		$('.blog-slider').find('.owl-dots').removeClass('disabled');
		$('.blog-slider').on('changed.owl.carousel', function(event) {
			$(this).find('.owl-dots').removeClass('disabled');
		});
		
		$('.people-slider').owlCarousel({
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			nav: true,
		    loop:true,
			autoplay:false,
			autoplayTimeout:7000,
   			autoplayHoverPause:true,
   			dots: true,
   			items: 1,
		});
		$('.people-controls li:nth-child(1)').addClass('active');
		$('.people-slider').on('changed.owl.carousel', function(event) {
            if ($('.people-slider .owl-dots .owl-dot:nth-child(1)').hasClass('active')) {
                $('.people-controls li').removeClass('active');
                $('.ps-title-box li').removeClass('active');
                $('.people-controls li:nth-child(1)').addClass('active');
                $('.ps-title-box li:nth-child(1)').addClass('active');
            }
            if ($('.people-slider .owl-dots .owl-dot:nth-child(2)').hasClass('active')) {
                $('.people-controls li').removeClass('active');
                $('.ps-title-box li').removeClass('active');
                $('.people-controls li:nth-child(2)').addClass('active');
                $('.ps-title-box li:nth-child(2)').addClass('active');
            }
            if ($('.people-slider .owl-dots .owl-dot:nth-child(3)').hasClass('active')) {
                $('.people-controls li').removeClass('active');
                $('.ps-title-box li').removeClass('active');
                $('.people-controls li:nth-child(3)').addClass('active');
                $('.ps-title-box li:nth-child(3)').addClass('active');
            }
            if ($('.people-slider .owl-dots .owl-dot:nth-child(4)').hasClass('active')) {
                $('.people-controls li').removeClass('active');
                $('.ps-title-box li').removeClass('active');
                $('.people-controls li:nth-child(4)').addClass('active');
                $('.ps-title-box li:nth-child(4)').addClass('active');
            }
            if ($('.people-slider .owl-dots .owl-dot:nth-child(5)').hasClass('active')) {
                $('.people-controls li').removeClass('active');
                $('.ps-title-box li').removeClass('active');
                $('.people-controls li:nth-child(5)').addClass('active');
                $('.ps-title-box li:nth-child(5)').addClass('active');
            }
        });
		
        $('.entry-tab li a').on('click', function (e){
        	e.preventDefault();
			var tab_id = $(this).parent().attr('data-tab');

			$('.entry-tab li').removeClass('active');
			$('.entry-tab-content .tab').removeClass('active');

			$(this).parent().addClass('active');
			$('#' + tab_id).addClass('active');
		});
		$('.tab-option li a').on('click', function (e){
        	e.preventDefault();
			var tab_id = $(this).parent().attr('data-tab');

			$('.tab-option li').removeClass('active');
			$('.tab-content .tab').removeClass('active');

			$(this).parent().addClass('active');
			$('#' + tab_id).addClass('active');
		});

        $('.search-icon').on('click', function (e){
			e.preventDefault();
			$(this).parent().find('.search-bg').fadeIn();
			$(this).parent().find('.search-popup').fadeIn();
        });
		$('.search-bg').on('click', function (){
			$(this).fadeOut();
			$(this).parent().find('.search-popup').fadeOut();
        });
		
		$('.video .btn-play').on('click', function (e){
			e.preventDefault();
			$(this).parent().find('.video-popup-bg').fadeIn();
			$(this).parent().find('.video-popup').fadeIn();
        });
        $('.rc-play-one').on('click', function (e){
			e.preventDefault();
			$(this).closest('.rc-right').find('.video-one .video-popup-bg').fadeIn();
			$(this).closest('.rc-right').find('.video-one .video-popup').fadeIn();
        });
        $('.rc-play-two').on('click', function (e){
			e.preventDefault();
			$(this).closest('.rc-right').find('.video-two .video-popup-bg').fadeIn();
			$(this).closest('.rc-right').find('.video-two .video-popup').fadeIn();
        });
        $('.rc-play-three').on('click', function (e){
			e.preventDefault();
			$(this).closest('.rc-right').find('.video-three .video-popup-bg').fadeIn();
			$(this).closest('.rc-right').find('.video-three .video-popup').fadeIn();
        });
        $('.video-popup-bg').on('click', function (){
			$(this).fadeOut();
			$(this).parent().find('.video-popup').fadeOut();
        });
		
		/*  [ jQuery Countdown ]
        - - - - - - - - - - - - - - - - - - - - */
        var endDate = 'November 15, 2018';
        $('.rc-time').countdown({
            date: endDate,
            render: function(data) {
                $(this.el).html(
                    '<p>' + this.leadingZeros(data.days, 2) + '<span>Days</span></p>'
                    + '<span class="dot">:</span>'
                    + '<p>' + this.leadingZeros(data.hours, 2) + '<span>Hours</span></p>'
                    + '<span class="dot">:</span>'
                    + '<p>' + this.leadingZeros(data.min, 2) + '<span>Mins</span></p>'
                    + '<span class="dot">:</span>'
                    + '<p>' + this.leadingZeros(data.sec, 2) + '<span>Secs</span></p>'
                );
            }
        });
		
        var endDate1 = 'November 15, 2018';
        $('.time-countdown').countdown({
            date: endDate1,
            render: function(data) {
                $(this.el).html(
                    '<p>' + this.leadingZeros(data.days, 2) + '<span>:</span></p>'
                    + '<p>' + this.leadingZeros(data.hours, 2) + '<span>:</span></p>'
                    + '<p>' + this.leadingZeros(data.min, 2) + '<span>:</span></p>'
                    + '<p>' + this.leadingZeros(data.sec, 2) + '</p>'
                );
            }
        });

        $(window).scroll(function () {
		    if ($(window).scrollTop() > 0) {
		    	$('.site-header').addClass('header-bg');
		    } else {
		    	$('.site-header').removeClass('header-bg');
		    }
		});
		
		$('<div class="quantity-nav"><div class="quantity-button quantity-up"><i class="fa fa-angle-up" aria-hidden="true"></i></div><div class="quantity-button quantity-down"><i class="fa fa-angle-down" aria-hidden="true"></i></div></div>').insertAfter('.quantity input');
		
		$('.quantity').each(function() {
			var spinner = jQuery(this),
		    input = spinner.find('input[type="number"]'),
		    btnUp = spinner.find('.quantity-up'),
		    btnDown = spinner.find('.quantity-down'),
		    min = input.attr('min'),
		    max = input.attr('max');

			btnUp.on('click', function (){
				var oldValue = parseFloat(input.val());
				if (oldValue >= max) {
					var newVal = oldValue;
				} else {
					var newVal = oldValue + 1;
				}
				spinner.find('input').val(newVal);
				spinner.find('input').trigger('change');
			});

			btnDown.on('click', function (){
				var oldValue = parseFloat(input.val());
				if (oldValue <= min) {
					var newVal = oldValue;
				} else {
					var newVal = oldValue - 1;
				}
				spinner.find('input').val(newVal);
				spinner.find('input').trigger('change');
			});
		});
	});
})(jQuery);