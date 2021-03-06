/**
 * Theme functions file
 *
 * Contains handlers for navigation, accessibility, header sizing
 * footer widgets and Featured Content slider
 *
 */
( function( $ ) {
    var body    = $( 'body' ),
        _window = $( window );

    // Enable menu toggle for small screens.
    ( function() {
        var nav = $( '#primary-navigation' ), button, menu;
        if ( ! nav ) {
            return;
        }

        button = nav.find( '.menu-toggle' );
        if ( ! button ) {
            return;
        }

        // Hide button if menu is missing or empty.
        menu = nav.find( '.nav-menu' );
        if ( ! menu || ! menu.children().length ) {
            button.hide();
            return;
        }

        $( '.menu-toggle' ).on( 'click.twentyfourteen', function() {
            nav.toggleClass( 'toggled-on' );
        } );
    } )();

    /*
     * Makes "skip to content" link work correctly in IE9 and Chrome for better
     * accessibility.
     *
     * @link https://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
     */
    _window.on( 'hashchange.twentyfourteen', function() {
        var hash = location.hash.substring( 1 ), element;

        if ( ! hash ) {
            return;
        }

        element = document.getElementById( hash );

        if ( element ) {
            if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
                element.tabIndex = -1;
            }

            element.focus();

            // Repositions the window on jump-to-anchor to account for header height.
            window.scrollBy( 0, -80 );
        }
    } );

    $( function() {
        // Search toggle.
        $( '.search-toggle' ).on( 'click.twentyfourteen', function( event ) {
            var that    = $( this ),
                wrapper = $( '.search-box-wrapper' );

            that.toggleClass( 'active' );
            wrapper.toggleClass( 'hide' );

            if ( that.is( '.active' ) || $( '.search-toggle .screen-reader-text' )[0] === event.target ) {
                wrapper.find( '.search-field' ).focus();
            }
        } );

        /*
         * Fixed header for large screen.
         * If the header becomes more than 48px tall, unfix the header.
         *
         * The callback on the scroll event is only added if there is a header
         * image and we are not on mobile.
         */
        if ( _window.width() > 781 ) {
            var mastheadHeight = $( '#masthead' ).height(),
                toolbarOffset, mastheadOffset;

            if ( mastheadHeight > 48 ) {
                body.removeClass( 'masthead-fixed' );
            }

            if ( body.is( '.header-image' ) ) {
                toolbarOffset  = body.is( '.admin-bar' ) ? $( '#wpadminbar' ).height() : 0;
                mastheadOffset = $( '#masthead' ).offset().top - toolbarOffset;

                _window.on( 'scroll.twentyfourteen', function() {
                    if ( _window.scrollTop() > mastheadOffset && mastheadHeight < 49 ) {
                        body.addClass( 'masthead-fixed' );
                    } else {
                        body.removeClass( 'masthead-fixed' );
                    }
                } );
            }
        }

        // Focus styles for menus.
        $( '.primary-navigation, .secondary-navigation' ).find( 'a' ).on( 'focus.twentyfourteen blur.twentyfourteen', function() {
            $( this ).parents().toggleClass( 'focus' );
        } );
    } );

		/*	STICKY NAV start */
    var stickyNavTop = jQuery('#primary-navigation').offset().top;

    var stickyNav = function(){
        var scrollTop = jQuery(window).scrollTop();

        if (scrollTop > stickyNavTop) {
            jQuery('#primary-navigation').addClass('sticky');
        } else {
            jQuery('#primary-navigation').removeClass('sticky');
        }
    };

    stickyNav();

    jQuery(window).scroll(function() {
        stickyNav();
    });
	/*	STICKY NAV end */

	/*	COUNTDOWN start */
    var timerEl = jQuery("#timer-tostart");
	timerEl.countdown(timerEl.data('target-time'), function(event) {
		var $this = jQuery(this).html(event.strftime(''
		+ '<span>%D</span> Tage '
		+ '<span>%H</span> Std '
		+ '<span>%M</span> Min '
		+ '<span>%S</span> Sek '));
	});
	/*	COUNTDOWN end */

	//prevent floc of strokehole
	var themeUrl,
        themeUrlDefault = 'https://www.zimmerbergmuehle.de/a2/wp-content/themes/zbmfourteen';
	try {
		var strokeHoleImage	= $('#prelaod-strokehole').css('background-image'),
			themeUrlEx		= /url\(["']{0,1}(.*)\/images\/strokehole\.png["']{0,1}\)/i,
            regexResult = themeUrlEx.exec(strokeHoleImage);


		themeUrl	= regexResult ? regexResult[1] : themeUrlDefault;
	} catch (e) {
		console.log(e);
		themeUrl	= themeUrlDefault;
	}

	if (themeUrl) {
		$('<img/>')
			.load(function() { $('#content').addClass('strokehole-ready') })
			.attr('src', themeUrl+'/images/strokehole.png')
		;
	}
		$('<img/>')
			.load(function() {
				var htmlSlidePre = '<div class="item"><img src="'+themeUrl+'/images/slide_',
					htmlSlidePos = '_full.jpg" alt="" /></div>';
				for (i = 2; i < 4; i++) {
					$('#header-carousel .carousel-inner').append(htmlSlidePre+i+htmlSlidePos);
				}
			})
			.attr('src', themeUrl+'/images/slide_1_full.jpg')
		;


	//lagersong
	if ($('#lagersong')) {
		$('#lagersong .btn-play').click(function() {
			$('#lagersong-audio').get(0).play();
		});
		$('#lagersong .btn-pause').click(function() {
			$('#lagersong-audio').get(0).pause();
		});
		$('#lagersong .btn-stop').click(function() {
			$('#lagersong-audio').get(0).currentTime = 0;
			$('#lagersong-audio').get(0).pause();
		});
	}

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
} )( jQuery );
