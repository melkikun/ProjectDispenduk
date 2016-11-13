(function($, window, document, undefined) {
  
  'use strict';
  
  /* ======================================================================= */
  /* VARIABLES
  /* ======================================================================= */
  
    var vars = {
      // Prefix
      prefix: (function() {
        var styles  = window.getComputedStyle(document.documentElement, ''),
            pre     = (Array.prototype.slice.call(styles).join('').match(/-(moz|webkit|ms)-/) || (styles.OLink === '' && ['', 'o']))[1],
            dom     = ('WebKit|Moz|MS|O').match(new RegExp('(' + pre + ')', 'i'))[1];
        
        return {
          ns          : 'wb-',
          dom         : dom,
          lowercase   : pre,
          css         : '-' + pre + '-',
          js          : pre[0].toUpperCase() + pre.substr(1)
        };
      })()
    };
  
  /* ======================================================================= */
  /* HELPERS
  /* ======================================================================= */
    
    var helpers = {};
     
    /*
      Use this helper to scroll the document smoothly to a target position.
      
      Parameters:
        
        - scrollTarget [0]                  Scroll target, it can be an integer, a selector or a string that consists of an integer preceded by += or -=.
        - scrollDuration [800]              Scroll duration in milli-seconds.
        - scrollEasing ['easeInOutCubic']   Scroll easing function.
        - scrollOffset [false]              Number of pixels to offset from the target position, vertically.
        - scrollChangeHash [true]           Change the URL hash (location.hash) when done scrolling.
        - step [false]                      Callback function to invoke on scroll.

      Example: helpers.scrollTo({parameters});
    */
    
    helpers.scrollTo = function(options) {
      var target,
        o = $.extend({
          scrollTarget    : 0,
          scrollDuration    : 800,
          scrollEasing    : 'easeInOutCubic',
          scrollOffset    : false,
          scrollChangeHash  : true,
          scrollElement   : $('html, body'),
          step        : false,
        }, options);
      
      target = o.scrollTarget;
      
      /* handle incrementation/decrementation from current scroll position */
      if (typeof target === 'string' && (target.indexOf('+=', 0) === 0 || target.indexOf('-=', 0) === 0)) {
        var s = (target.slice(0, 1) == '-' ? -1 : 1),
          n = target.slice(2);
        
        if (n.toString().lastIndexOf('%') === n.length - 1) {
          n = parseInt(n, 10)*$(window).height()/100;
        }
        
        target = $(o.scrollElement).scrollTop() + s*Number(n);
      }
      
      /* target is an explicit number */
      if (!isNaN(target)) {
        target = Number(target);
      }
      /* target is a DOM element */
      else {
        target = $(target).length ? $(target).offset().top : 0;
      }
      
      /* scroll to page top */
      if (!target || target == '#' || $(target).length === 0) target = 0;
      
      /* handle offset */
      target += o.scrollOffset || 0;
      
      $(o.scrollElement).stop(true, false).animate({scrollTop: target} , {
        duration: o.scrollDuration,
        easing: o.scrollEasing,
        step: function() {
          if (o.step) o.step();
        },
        complete: function() {
          if (o.scrollChangeHash && typeof o.scrollTarget === 'string' && o.scrollTarget.indexOf('#', 0) === 0) {
            location.hash = o.scrollTarget;
          }
        }
      });
    }
  
  /* ======================================================================= */
  /* EVENT HANDLERS
  /* ======================================================================= */
  
    /* --------------------------------- */
    /* SCROLL EVENT HANDLER
    /* --------------------------------- */
    
      /*
        Assign a function to the 'scrollEventHandler' object to create a scroll event listener.
        
        Example: scrollEventHandler.fn.myListener = function(){ console.log(this.scrollTop); }
      */
      
      var scrollEventHandler = {
        fn: {},
        target: $(window),
        init: function() {
          var scrollTarget = scrollEventHandler.target.get(0) === document.body ? $(window) : scrollEventHandler.target;
          scrollEventHandler.onScroll();
          scrollTarget.on('scroll', scrollEventHandler.onScroll);
        },
        onScroll: function(e) {
          for (var fn in scrollEventHandler.fn) {
            scrollEventHandler.shoutAt(fn, e);
          }
        },
        shoutAt: function(fn, e) {
          if (scrollEventHandler.fn.hasOwnProperty(fn) && typeof scrollEventHandler.fn[fn] === 'function') {
            scrollEventHandler.fn[fn].call({
              scrollTop       : scrollEventHandler.target.scrollTop(),
              windowHeight    : $(window).height(),
              documentHeight  : $(document).height(),
              event           : e
            });
          }
        }
      };
    
    /* --------------------------------- */
    /* RESIZE EVENT HANDLER
    /* --------------------------------- */
    
      /*
        Assign a function to the 'resizeEventHandler' object to create a resize event listener.
        
        Example: resizeEventHandler.fn.myListener = function(){ console.log(this.windowHeight); }
      */
      
      var resizeEventHandler = {
        fn: {},
        target: $(window),
        timeout: null,
        init: function() {
          resizeEventHandler.onResize();
          resizeEventHandler.target.on('resize', resizeEventHandler.onResize);
        },
        onResize: function(e) {
          clearTimeout(resizeEventHandler.timeout);
          
          resizeEventHandler.timeout = setTimeout(function() {
            for (var fn in resizeEventHandler.fn) {
              resizeEventHandler.shoutAt(fn, e);
            }
          }, 50);
        },
        shoutAt: function(fn, e) {
          if (resizeEventHandler.fn.hasOwnProperty(fn) && typeof resizeEventHandler.fn[fn] === 'function') {
            resizeEventHandler.fn[fn].call({
              scrollTop       : resizeEventHandler.target.scrollTop(),
              targetWidth     : resizeEventHandler.target.width(),
              targetHeight    : resizeEventHandler.target.height(),
              windowWidth     : $(window).width(),
              windowHeight    : $(window).height(),
              documentWidth   : $(document).width(),
              documentHeight  : $(document).height(),
              event           : e
            });
          }
        }
      };
  
  /* ======================================================================= */
  /* MODULES
  /* ======================================================================= */
  
    /*
      Use whiteboard.modules.define method to create a new module.
      
      Example: whiteboard.modules.define('myModule', function(){ console.log('Hello world!'); });
    */
    
    var modules = {};
    
    window.whiteboard = {
      modules: {
        define: function(moduleName, fn) {
          modules[moduleName] = fn;
        },
        
        init: function(scope) {
          initModules(scope);
        }
      }
    };
    
    function initModules(scope) {
      for (var fn in modules) {
        initModule(fn, scope);
      }
    }
    
    function initModule(fn, scope) {
      if (modules.hasOwnProperty(fn) && typeof modules[fn] === 'function') {
        modules[fn].call(scope, {
          vars: vars,
          helpers: helpers,
          resizeEventHandler: resizeEventHandler,
          scrollEventHandler: scrollEventHandler,
          initModule: initModule
        });
      }
    }
    
  /* ======================================================================= */
  /* ON READY
  /* ======================================================================= */
  
    $(function() {
      initModules($('body'));
      resizeEventHandler.init();
      scrollEventHandler.init();
    });
  
}(jQuery, window, document));

/* ///////////////////////////////////////////////////////////////////////////////// */
/* ///////////////////////////////////////////////////////////////////////////////// */

  /* ======================================================================= */
  /* MODULES
  /* ======================================================================= */
  
  /* --------------------------------- */
  /* HEADER TOGGLE
  /* --------------------------------- */
  
    /*
      The toggle button will, by default, affect its parent header.
      If you want to place the toggle button outside the header, you
      need to assign an ID attribute to the header and referenece that
      ID using a data attribute on the toggle.
      
      Example:
      
        <div id="my-header" class="wb-header ...">...</div>
        <div data-wb-header="my-header" class="wb-header-toggle">
          <button>Toggle</button>
        </div>
    */
    
    whiteboard.modules.define('headerToggle', function(wb) {
      if (whiteboard.headerToggleInitialized) return;
      
      whiteboard.headerToggleInitialized = true;
      
      $('body')
      .on('click', function(e) {
        var id, header, toggle;
        
        header = $(e.target).closest('.' + wb.vars.prefix.ns + 'header');
        toggle = $(e.target).closest('.' + wb.vars.prefix.ns + 'header-toggle');
        
        var isActive = header.hasClass(wb.vars.prefix.ns + 'is-active');
        var overlayClicked = $(e.target).hasClass(wb.vars.prefix.ns + 'header');
        var allToggles = $('.' + wb.vars.prefix.ns + 'header-toggle');
        var allHeaders = $('.' + wb.vars.prefix.ns + 'header');
        
        if (!isActive) return;
        
        if (overlayClicked) {
          setHeaderState(allToggles, allHeaders, false);
        }
        
        if (overlayClicked) {
          return false;
        }
      })
      .on('click', '.' + wb.vars.prefix.ns + 'header-toggle', function(e) {
        var id = $(this).data(wb.vars.prefix.ns + 'header'),
            header = $(this).closest('.' + wb.vars.prefix.ns + 'header'),
            state = !$(this).hasClass(wb.vars.prefix.ns + 'is-active');
        
        if (!id && header.length) {
          setHeaderState($(this), header, state);
          return;
        }
        
        setHeaderStateByID(id, state);
      });
      
      function setHeaderStateByID(id, state) {
        var toggle, header;
        
        if (id == undefined) {
          toggle = $('.' + wb.vars.prefix.ns + 'header-toggle');
          header = $('.' + wb.vars.prefix.ns + 'header');
        } else {
          toggle = $('.' + wb.vars.prefix.ns + 'header-toggle[data-' + wb.vars.prefix.ns + 'header=' + id + ']');
          header = $('.' + wb.vars.prefix.ns + 'header#' + id);
        }
        
        setHeaderState(toggle, header, state);
      }
      
      function setHeaderState(toggle, header, state) {
        toggle[state ? 'addClass' : 'removeClass'](wb.vars.prefix.ns + 'is-active');
        header[state ? 'addClass' : 'removeClass'](wb.vars.prefix.ns + 'is-active');
        
        if (!state) {
          setTimeout(function() {
            header.find('.' + wb.vars.prefix.ns + 'is-active').removeClass(wb.vars.prefix.ns + 'is-active');
          }, 300);
        }
      }
    });

  /* --------------------------------- */
  /* SCROLL CLASSES
  /* --------------------------------- */

    /*
      Adds classes to the body element to indicate scroll level
    */

    whiteboard.modules.define('scrollClasses', function(wb) {
      var moduleScope = $(this);
      var scrollTimeout;
      
      wb.scrollEventHandler.fn.scrollClasses = function() {
        var scrollTop     = this.scrollTop,
            windowHeight  = this.windowHeight;
        
        $('body').removeClass(wb.vars.prefix.ns + 'is-scrolled ' + wb.vars.prefix.ns + 'is-scrolled-more');
        
        if (scrollTop > 0) {
          $('body').addClass(wb.vars.prefix.ns + 'is-scrolled');
        }
        
        if (scrollTop > 150) {
          $('body').addClass(wb.vars.prefix.ns + 'is-scrolled-more');
        }
        
        clearTimeout(scrollTimeout);
        
        $('body').addClass(wb.vars.prefix.ns + 'is-scrolling');
        
        scrollTimeout = setTimeout(function() {
          $('body').removeClass(wb.vars.prefix.ns + 'is-scrolling');
        }, 500);
      }
    });
  
  /* --------------------------------- */
  /* DROP-DOWN NAV
  /* --------------------------------- */

    /*
      This module handles drop-down menus for main nav.
    */

    whiteboard.modules.define('dropDownNav', function(wb) {
      var moduleScope = $(this);
      
      moduleScope.find('.' + wb.vars.prefix.ns + 'drop-down-nav').each(function() {
        var root = $(this).children('ul');
        
        /* indicate items that have sub-menus */
        root.find('li').has('> ul').addClass(wb.vars.prefix.ns + 'has-submenu');
        
        /* indicate items that have mega-menus */
        root.find('li').has('> .' + wb.vars.prefix.ns + 'mega-menu').addClass(wb.vars.prefix.ns + 'has-megamenu');
        
        /* handle submenus overflow */
        root.find('li').has('> ul').each(function() {
          var li = $(this),
              ul = li.children('ul');
          
          li.on('mouseenter', function() {
            li.addClass(wb.vars.prefix.ns + 'is-hover');
            
            /* handle horizontal overflow */
            if (ul.offset() && ul.offset().left + ul.outerWidth() > $(window).width()) {
              ul.addClass(wb.vars.prefix.ns + 'overflow-h');
            }
            
            /* handle vertical overflow */
            if (ul.offset() && ul.offset().top + ul.outerHeight() - $(window).scrollTop() > $(window).height()) {
              ul.addClass(wb.vars.prefix.ns + 'overflow-v');
            }
          });
          
          li.on('mouseleave', function() {
            li.removeClass(wb.vars.prefix.ns + 'is-hover');
            
            /* remove overflow classes */
            ul
            .removeClass(wb.vars.prefix.ns + 'overflow-h')
            .removeClass(wb.vars.prefix.ns + 'overflow-v');
          });
          
          li.children('a').click(function() {
            li.toggleClass(wb.vars.prefix.ns + 'is-clicked');
            return false;
          });
        });
      });
    });

  /* --------------------------------- */
  /* STICKY NAV
  /* --------------------------------- */

    /*
      Adds classes to the body element to indicate scroll level
    */

    whiteboard.modules.define('stickyNav', function(wb) {
      var moduleScope = $(this),
          headerPos = 0;
      
      wb.scrollEventHandler.fn.stickyNav = function() {
        var scrollTop     = this.scrollTop,
            windowHeight  = this.windowHeight,
            header = $('.' + wb.vars.prefix.ns + 'header-sticky');
        
        headerPos = Math.max(headerPos, Math.max(0, scrollTop - header.height()));
        headerPos = Math.min(scrollTop, headerPos);
        
        $('.' + wb.vars.prefix.ns + 'header-sticky').css('top', headerPos);
      }
    });

  /* --------------------------------- */
  /* MINI CART TOGGLE
  /* --------------------------------- */
  
    whiteboard.modules.define('miniCartToggle', function(wb) {
      var moduleScope = $(this);
      
      if (!window.miniCartInit) {
        $('body')
        .on('click', function(e) {
          if ($(e.target).closest('#' + wb.vars.prefix.ns + 'mini-cart').length === 0 &&
              $(e.target).closest('.' + wb.vars.prefix.ns + 'mini-cart-toggle').length === 0) {
            $('#' + wb.vars.prefix.ns + 'mini-cart').removeClass((wb.vars.prefix.ns + 'is-active'));
          }
        });
        
        window.miniCartInit = true;
      }
      
      moduleScope.find('.' + wb.vars.prefix.ns + 'mini-cart-toggle').each(function() {
        $(this).click(function() {
          $('#' + wb.vars.prefix.ns + 'mini-cart').toggleClass((wb.vars.prefix.ns + 'is-active'));
        });
      });
    });

/* ///////////////////////////////////////////////////////////////////////////////// */
/* ///////////////////////////////////////////////////////////////////////////////// */

  /* ======================================================================= */
  /* SMOOTH SCROLL
  /* ======================================================================= */
  
  /* --------------------------------- */
  /* MOUSE SCROLL
  /* --------------------------------- */
  
    /*! Copyright (c) 2011 Brandon Aaron (http://brandonaaron.net)
     * Licensed under the MIT License (LICENSE.txt).
     *
     * Thanks to: http://adomas.org/javascript-mouse-wheel/ for some pointers.
     * Thanks to: Mathias Bank(http://www.mathias-bank.de) for a scope bug fix.
     * Thanks to: Seamus Leahy for adding deltaX and deltaY
     *
     * Version: 3.0.6
     * 
     * Requires: 1.2.2+
     */
     
    (function($) {

        var types = ['DOMMouseScroll', 'mousewheel'];

        if ($.event.fixHooks) {
            for (var i = types.length; i;) {
                $.event.fixHooks[types[--i]] = $.event.mouseHooks;
            }
        }

        $.event.special.mousewheel = {
            setup: function() {
                if (this.addEventListener) {
                    for (var i = types.length; i;) {
                        this.addEventListener(types[--i], handler, false);
                    }
                } else {
                    this.onmousewheel = handler;
                }
            },

            teardown: function() {
                if (this.removeEventListener) {
                    for (var i = types.length; i;) {
                        this.removeEventListener(types[--i], handler, false);
                    }
                } else {
                    this.onmousewheel = null;
                }
            }
        };

        $.fn.extend({
            mousewheel: function(fn) {
                return fn ? this.bind("mousewheel", fn) : this.trigger("mousewheel");
            },

            unmousewheel: function(fn) {
                return this.unbind("mousewheel", fn);
            }
        });


        function handler(event) {
            var orgEvent = event || window.event,
                args = [].slice.call(arguments, 1),
                delta = 0,
                returnValue = true,
                deltaX = 0,
                deltaY = 0;
            event = $.event.fix(orgEvent);
            event.type = "mousewheel";

            // Old school scrollwheel delta
            if (orgEvent.wheelDelta) {
                delta = orgEvent.wheelDelta / 120;
            }
            if (orgEvent.detail) {
                delta = -orgEvent.detail / 3;
            }

            // New school multidimensional scroll (touchpads) deltas
            deltaY = delta;

            // Gecko
            if (orgEvent.axis !== undefined && orgEvent.axis === orgEvent.HORIZONTAL_AXIS) {
                deltaY = 0;
                deltaX = -1 * delta;
            }

            // Webkit
            if (orgEvent.wheelDeltaY !== undefined) {
                deltaY = orgEvent.wheelDeltaY / 120;
            }
            if (orgEvent.wheelDeltaX !== undefined) {
                deltaX = -1 * orgEvent.wheelDeltaX / 120;
            }

            // Add event and delta to the front of the arguments
            args.unshift(event, delta, deltaX, deltaY);

            return ($.event.dispatch || $.event.handle).apply(this, args);
        }
        
    })(jQuery);
  
  /* --------------------------------- */
  /* SMOOTH SCROLL
  /* --------------------------------- */
  
    /**
     * jquery.simplr.smoothscroll
     * version 1.0
     * copyright (c) 2012 https://github.com/simov/simplr-smoothscroll
     * licensed under MIT
     * requires jquery.mousewheel - https://github.com/brandonaaron/jquery-mousewheel/
     */;
    (function($) {
        'use strict';

        $.srSmoothscroll = function(options) {

            var self = $.extend({
                step: 100,
                speed: 200,
                ease: "swing"
            }, options || {});
            
            // private fields & init
            var win = $(window),
                doc = $(document),
                /* REMOVED */ // top = 0,
                /* ADDED */ top = win.scrollTop(),
                step = self.step,
                speed = self.speed,
                viewport = win.height(),
                body = (navigator.userAgent.indexOf('AppleWebKit') !== -1) ? $('body') : $('html'),
                wheel = false;

            // events
            $('body').mousewheel(function(event, delta) {

                wheel = true;

                if (delta < 0) // down
                top = (top + viewport) >= doc.height() ? top : top += step;

                else // up
                top = top <= 0 ? 0 : top -= step;

                body.stop().animate({
                    scrollTop: top
                }, speed, self.ease, function() {
                    wheel = false;
                });

                return false;
            });

            win.on('resize', function(e) {
                viewport = win.height();
            })
                .on('scroll', function(e) {
                if (!wheel) top = win.scrollTop();
            });

        };
    })(jQuery);
  
  /* --------------------------------- */
  /* INIT SMOOTH SCROLL
  /* --------------------------------- */
  
    var platform = navigator.platform.toLowerCase();
    
    if (platform.indexOf('win') == 0 || platform.indexOf('linux') == 0) {
      if ($.browser.webkit) {
        $.srSmoothscroll();
      }
    }