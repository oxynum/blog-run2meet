/* global screenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

( function( $ ) {
  var $body, $window, $sidebar, adminbarOffset, top = false,
      bottom = false, windowWidth, windowHeight, lastWindowPos = 0,
      topOffset = 0, bodyHeight, sidebarHeight, resizeTimer,
      secondary, button;

  // Add dropdown toggle that display child menu items.
  $( '.main-navigation .menu-item-has-children > a' ).after( '<button class="dropdown-toggle" aria-expanded="false">' + screenReaderText.expand + '</button>' );

  // Toggle buttons and submenu items with active children menu items.
  $( '.main-navigation .current-menu-ancestor > button' ).addClass( 'toggle-on' );
  $( '.main-navigation .current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

  $( '.dropdown-toggle' ).click( function( e ) {
    var _this = $( this );
    e.preventDefault();
    _this.toggleClass( 'toggle-on' );
    _this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );
    _this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
    _this.html( _this.html() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand );
  } );

  secondary = $( '#secondary' );
  button = $( '.site-branding' ).find( '.secondary-toggle' );

  // Enable menu toggle for small screens.
  ( function() {
    var menu, widgets, social;
    if ( ! secondary || ! button ) {
      return;
    }

    // Hide button if there are no widgets and the menus are missing or empty.
    menu    = secondary.find( '.nav-menu' );
    widgets = secondary.find( '#widget-area' );
    social  = secondary.find( '#social-navigation' );
    if ( ! widgets.length && ! social.length && ( ! menu || ! menu.children().length ) ) {
      button.hide();
      return;
    }

    button.on( 'click.twentyfifteen', function() {
      secondary.toggleClass( 'toggled-on' );
      secondary.trigger( 'resize' );
      $( this ).toggleClass( 'toggled-on' );
      if ( $( this, secondary ).hasClass( 'toggled-on' ) ) {
        $( this ).attr( 'aria-expanded', 'true' );
        secondary.attr( 'aria-expanded', 'true' );
      } else {
        $( this ).attr( 'aria-expanded', 'false' );
        secondary.attr( 'aria-expanded', 'false' );
      }
    } );
  } )();

  /**
	 * @summary Add or remove ARIA attributes.
	 * Uses jQuery's width() function to determine the size of the window and add
	 * the default ARIA attributes for the menu toggle if it's visible.
	 * @since Twenty Fifteen 1.1
	 */
  function onResizeARIA() {
    if ( 955 > $window.width() ) {
      button.attr( 'aria-expanded', 'false' );
      secondary.attr( 'aria-expanded', 'false' );
      button.attr( 'aria-controls', 'secondary' );
    } else {
      button.removeAttr( 'aria-expanded' );
      secondary.removeAttr( 'aria-expanded' );
      button.removeAttr( 'aria-controls' );
    }
  }

  // Sidebar scrolling.
  function resize() {
    windowWidth = $window.width();

    if ( 955 > windowWidth ) {
      top = bottom = false;
      $sidebar.removeAttr( 'style' );
    }
  }

  function scroll() {
    var windowPos = $window.scrollTop();

    if ( 955 > windowWidth ) {
      return;
    }

    sidebarHeight = $sidebar.height();
    windowHeight  = $window.height();
    bodyHeight    = $body.height();

    if ( sidebarHeight + adminbarOffset > windowHeight ) {
      if ( windowPos > lastWindowPos ) {
        if ( top ) {
          top = false;
          topOffset = ( $sidebar.offset().top > 0 ) ? $sidebar.offset().top - adminbarOffset : 0;
          $sidebar.attr( 'style', 'top: ' + topOffset + 'px;' );
        } else if ( ! bottom && windowPos + windowHeight > sidebarHeight + $sidebar.offset().top && sidebarHeight + adminbarOffset < bodyHeight ) {
          bottom = true;
          $sidebar.attr( 'style', 'position: fixed; bottom: 0;' );
        }
      } else if ( windowPos < lastWindowPos ) {
        if ( bottom ) {
          bottom = false;
          topOffset = ( $sidebar.offset().top > 0 ) ? $sidebar.offset().top - adminbarOffset : 0;
          $sidebar.attr( 'style', 'top: ' + topOffset + 'px;' );
        } else if ( ! top && windowPos + adminbarOffset < $sidebar.offset().top ) {
          top = true;
          $sidebar.attr( 'style', 'position: fixed;' );
        }
      } else {
        top = bottom = false;
        topOffset = ( $sidebar.offset().top > 0 ) ? $sidebar.offset().top - adminbarOffset : 0;
        $sidebar.attr( 'style', 'top: ' + topOffset + 'px;' );
      }
    } else if ( ! top ) {
      top = true;
      $sidebar.attr( 'style', 'position: fixed;' );
    }

    lastWindowPos = windowPos;
  }

  function resizeAndScroll() {
    resize();
    scroll();
  }

  $( document ).ready( function() {
    $body          = $( document.body );
    $window        = $( window );
    $sidebar       = $( '#sidebar' ).first();
    adminbarOffset = $body.is( '.admin-bar' ) ? $( '#wpadminbar' ).height() : 0;

    $window
      .on( 'scroll.twentyfifteen', scroll )
      .on( 'load.twentyfifteen', onResizeARIA )
      .on( 'resize.twentyfifteen', function() {
      clearTimeout( resizeTimer );
      resizeTimer = setTimeout( resizeAndScroll, 500 );
      onResizeARIA();
    } );
    $sidebar.on( 'click.twentyfifteen keydown.twentyfifteen', 'button', resizeAndScroll );

    resizeAndScroll();

    for ( var i = 1; i < 6; i++ ) {
      setTimeout( resizeAndScroll, 100 * i );
    }
  } );

  // Custom JS
  // Animation Slider
  $('.sticky_module').slick({
    dots: false,
    autoplay: true,
    pauseOnHover: false,
    cssEase: 'ease-in-out',
    autoplaySpeed: 3500,
    speed: 1000
  });

  $('.slider-text').slick({
    asNavFor: '.sticky_module',
    dots: true,
    autoplay: true,
    pauseOnHover: false,
    cssEase: 'ease-in-out',
    autoplaySpeed: 3500,
    speed: 850
  });

  // Masonry init config with jQuery
  $('.grid-r2m').masonry({
    itemSelector: '.col-r2m',
    columnWidth: 210, 
    stamp: '.stamp',
  });

  var $container = $('.grid-r2m');

  $container.infinitescroll({
    navSelector  : '.navigation',    // selector for the paged navigation
    nextSelector : '.navigation a.next',  // selector for the NEXT link (to page 2)
    itemSelector : '.col-r2m',     // selector for all items you'll retrieve
    loading: {
        finishedMsg: 'C\'est tout',
        img: 'http://i.imgur.com/6RMhx.gif'
      }
      },
  // trigger Masonry as a callback
  function( newElements ) {
    var $newElems = $( newElements ).css({ opacity: 0 });
      // show elems now they're ready
    $newElems.animate({ opacity: 1 });
    $container.masonry( 'appended', $newElems, true  );
  });



} )( jQuery );
