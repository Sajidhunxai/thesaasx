/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {


/*
|--------------------------------------------------------------------------
| Core
|--------------------------------------------------------------------------
|
| The start point of the project. Include jQuery, Bootstrap and required
| plugins and define page object. This file is required.
|
*/
__webpack_require__(1);

/*
|--------------------------------------------------------------------------
| Vendors
|--------------------------------------------------------------------------
|
| Load some plugins and define initializer methods. If you don't need any
| of the following plugins, simply comment the line.
|
| The minified size of each module has stated for your reference. So you'd
| know how much KB you can save by removing a vendor.
|
*/
__webpack_require__(5);            // 14 kb
__webpack_require__(6);  // 03 kb
__webpack_require__(7);      // 05 kb
__webpack_require__(8);        // 13 kb
__webpack_require__(9);         // 15 kb
__webpack_require__(10);       // 23 kb
__webpack_require__(13);           // 07 kb
__webpack_require__(14);          // 43 kb
__webpack_require__(15);          // 43 kb
__webpack_require__(16);          // 11 kb


/*
|--------------------------------------------------------------------------
| Partials
|--------------------------------------------------------------------------
|
| Split the application code to several files. This file is required.
|
*/
__webpack_require__(17);


/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {


/*
|--------------------------------------------------------------------------
| Main
|--------------------------------------------------------------------------
|
| The start point of the project. Include jQuery, Bootstrap and required
| plugins and define page object. These files are mandatory.
|
*/
__webpack_require__(2);

__webpack_require__(3);
__webpack_require__(4);


/***/ }),
/* 2 */
/***/ (function(module, exports) {


/**
 * Load required plugins.
 */
//window.$ = window.jQuery = require('jquery');
//window.Popper = require('popper.js/dist/umd/popper');
//require('bootstrap');
//window.SmoothScroll = require('smoothscroll-for-websites');
//require('objectFitPolyfill');

window.$ = window.jQuery;

/**
 * Create window.page and init the application.
 */

+function($, window){

  var page = {
    vendors:    [],

    // Cache popular elements
    body:       $('body'),
    navbar:     $('.navbar'),
    header:     $('.header').length ? $('.header') : $('.main-content .section:first'),
    footer:     $('.footer'),
  }

  page.defaults = {
    googleApiKey:       null,
    googleAnalyticsKey: null,
    reCaptchaV3SiteKey: null,
    reCaptchaSiteKey:   null,
    reCaptchaLanguage:  null,
    disableAOSonMobile: true,
    smoothScroll:       false,
  }

  /**
   * Call all the required initializers.
   */
  page.init = function() {

    // Vendors
    //
    page.initVendors();

    // Partials
    //
    page.initBind();
    page.initDrawer();
    page.initFont();
    page.initForm();
    page.initMailer();
    page.initModal();
    page.initNavbar();
    page.initOffcanvas();
    page.initPopup();
    page.initScroll();
    page.initSection();
    page.initSidebar();
    page.initVideo();


    // Anchor for headings
    //
    $('[data-provide="anchor"]').each(function() {
      var heading = $(this);
      heading.append('<a class="anchor" href="#'+ heading.attr('id') +'"></a>');
    });

  }


  /**
   * Initialize all of the loaded vendors.
   */
  page.initVendors = function() {
    page.vendors.forEach(function(vendor) {
      var fn = window.page[ "init"+ vendor ];
      if(typeof fn === 'function') {
        fn();
      }
    });
  }

  /**
   * Register loaded vendor to be initialized after DOM load.
   * It's case sensitive, since it calls "initVendorName" method.
   */
  page.registerVendor = function($name) {
    page.vendors.push($name);
  }

  window.page = page;
}(jQuery, window);


/**
 * Once the DOM is loaded, start the magic.
 */
$(function () {
  //page.init();
});




/***/ }),
/* 3 */
/***/ (function(module, exports) {


/**
 * Configure the plugin.
 */

+function($){
  page.registerVendor('Jquery');

  page.initJquery = function() {

    /**
     * We will register the CSRF Token as a common header with jQuery so that
     * all outgoing HTTP requests automatically have it attached. This is just
     * a simple convenience so we don't have to attach every token manually.
     */

    var token = document.head.querySelector('meta[name="csrf-token"]');

    if (token) {
      $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': token.content }
      });
    }

  }

}(jQuery);




// Check if an element has a specific data attribute
//
jQuery.fn.hasDataAttr = function(name) {
  return $(this)[0].hasAttribute('data-'+ name);
};



// Get data attribute. If element doesn't have the attribute, return default value
//
jQuery.fn.dataAttr = function(name, def) {
  if ($(this)[0] == undefined) {
    return def;
  }
  return $(this)[0].getAttribute('data-'+ name) || def;
};



// Instance search
//
//$.expr[':'] -> $.expr.pseudos
jQuery.expr[':'].search = function(a, i, m) {
  return $(a).html().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
};


// Return outerHTML (inclusing the element) code
//
jQuery.fn.outerHTML = function() {
  var html = '';
  this.each(function(){
    html += $(this).prop("outerHTML");
  })
  return html;
};


// Return HTML code of all the selected elements
//
jQuery.fn.fullHTML = function() {
  var html = '';
  $(this).each(function(){
    html += $(this).outerHTML();
  });
  return html;
};

// Scroll to end
//
jQuery.fn.scrollToEnd = function() {
  $(this).scrollTop( $(this).prop("scrollHeight") );
  return this;
};



/***/ }),
/* 4 */
/***/ (function(module, exports) {


/**
 * Initialize some of the core Bootstrap components.
 */

+function($){
  page.registerVendor('Bootstrap');

  page.initBootstrap = function() {
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();


    // Custom control check
    //
    // Since BS4-beta-3, custom-controls needs id and for attributes.
    // We bypass this requirement.
    //
    $(document).on('click', '.custom-checkbox', function() {
      var input = $(this).children('.custom-control-input').not(':disabled');
      input.prop('checked', ! input.prop('checked')).trigger( "change" );
    });

    $(document).on('click', '.custom-radio', function() {
      var input = $(this).children('.custom-control-input').not(':disabled');
      input.prop('checked', true).trigger( "change" );
    });


  }

}(jQuery);



/***/ }),
/* 5 */
/***/ (function(module, exports) {


/**
 * Load required plugin.
 */
//window.AOS = require('aos');


/**
 * Configure the plugin.
 */

+function($){
  page.registerVendor('AOS');

  page.initAOS = function() {
    var options = {
      offset: 220,
      duration: 1500,
    }

    if ( page.defaults.disableAOSonMobile ) {
      options.disable = 'mobile';
    }

    AOS.init(options);
  }

}(jQuery);




/***/ }),
/* 6 */
/***/ (function(module, exports) {


/**
 *
 */

+function($){
  page.registerVendor('Constellation');

  page.initConstellation = function() {
    var distance = 120;

    if( $( window ).width() < 700) {
      distance = 25;
    }

    $('.constellation').each(function(){
      var canvas = $(this),
          color  = canvas.dataAttr( 'color', 'rgba(255, 255, 255, .8)' ),
          length = canvas.dataAttr( 'length', 150 ),
          radius = canvas.dataAttr( 'radius', 150 );

      if ( color == 'dark' ) {
        color = 'rgba(0, 0, 0, .6)';
      }

      canvas.constellation({
        distance: distance,
        length: length,
        radius: radius,
        star: {
          color: color,
          width: 1
        },
        line: {
          color: color,
          width: 0.2
        }
      });
    });

  }

}(jQuery);


/*!
 * Mantis.js / jQuery / Zepto.js plugin for Constellation
 * @version 1.2.2
 * @author Acauã Montiel <contato@acauamontiel.com.br>
 * @license http://acaua.mit-license.org/
 */
(function ($, window) {
  /**
   * Makes a nice constellation on canvas
   * @constructor Constellation
   */
  function Constellation (canvas, options) {
    var $canvas = $(canvas),
      context = canvas.getContext('2d'),
      defaults = {
        star: {
          color: 'rgba(255, 255, 255, .5)',
          width: 1
        },
        line: {
          color: 'rgba(255, 255, 255, .5)',
          width: 0.2
        },
        position: {
          x: 0, // This value will be overwritten at startup
          y: 0 // This value will be overwritten at startup
        },
        width: window.innerWidth,
        height: window.innerHeight,
        velocity: 0.1,
        length: 100,
        distance: 120,
        radius: 150,
        stars: []
      },
      config = $.extend(true, {}, defaults, options);

    function Star () {
      this.x = Math.random() * canvas.width;
      this.y = Math.random() * canvas.height;

      this.vx = (config.velocity - (Math.random() * 0.5));
      this.vy = (config.velocity - (Math.random() * 0.5));

      this.radius = Math.random() * config.star.width;
    }

    Star.prototype = {
      create: function(){
        context.beginPath();
        context.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
        context.fill();
      },

      animate: function(){
        var i;
        for (i = 0; i < config.length; i++) {

          var star = config.stars[i];

          if (star.y < 0 || star.y > canvas.height) {
            star.vx = star.vx;
            star.vy = - star.vy;
          } else if (star.x < 0 || star.x > canvas.width) {
            star.vx = - star.vx;
            star.vy = star.vy;
          }

          star.x += star.vx;
          star.y += star.vy;
        }
      },

      line: function(){
        var length = config.length,
          iStar,
          jStar,
          i,
          j;

        for (i = 0; i < length; i++) {
          for (j = 0; j < length; j++) {
            iStar = config.stars[i];
            jStar = config.stars[j];

            if (
              (iStar.x - jStar.x) < config.distance &&
              (iStar.y - jStar.y) < config.distance &&
              (iStar.x - jStar.x) > - config.distance &&
              (iStar.y - jStar.y) > - config.distance
            ) {
              if (
                (iStar.x - config.position.x) < config.radius &&
                (iStar.y - config.position.y) < config.radius &&
                (iStar.x - config.position.x) > - config.radius &&
                (iStar.y - config.position.y) > - config.radius
              ) {
                context.beginPath();
                context.moveTo(iStar.x, iStar.y);
                context.lineTo(jStar.x, jStar.y);
                context.stroke();
                context.closePath();
              }
            }
          }
        }
      }
    };

    this.createStars = function () {
      var length = config.length,
        star,
        i;

      context.clearRect(0, 0, canvas.width, canvas.height);

      for (i = 0; i < length; i++) {
        config.stars.push(new Star());
        star = config.stars[i];

        star.create();
      }

      star.line();
      star.animate();
    };

    this.setCanvas = function () {
      canvas.width = config.width;
      canvas.height = config.height;
    };

    this.setContext = function () {
      context.fillStyle = config.star.color;
      context.strokeStyle = config.line.color;
      context.lineWidth = config.line.width;
    };

    this.setInitialPosition = function () {
      if (!options || !options.hasOwnProperty('position')) {
        config.position = {
          x: canvas.width * 0.5,
          y: canvas.height * 0.5
        };
      }
    };

    this.loop = function (callback) {
      callback();

      window.requestAnimationFrame(function () {
        //stats.begin(); // Only for Stats
        this.loop(callback);
        //stats.end(); // Only for Stats
      }.bind(this));
    };

    this.bind = function () {
      $canvas.on('mousemove', function(e){
        config.position.x = e.pageX - $canvas.offset().left;
        config.position.y = e.pageY - $canvas.offset().top;
      });
    };

    this.init = function () {
      this.setCanvas();
      this.setContext();
      this.setInitialPosition();
      this.loop(this.createStars);
      this.bind();
    };
  }

  $.fn.constellation = function (options) {
    return this.each(function () {
      var c = new Constellation(this, options);
      c.init();
    });
  };
})($, window);


/***/ }),
/* 7 */
/***/ (function(module, exports) {


/**
 * Load required plugin.
 */
//require('jquery-countdown');


/**
 * Configure the plugin.
 */

+function($){
  page.registerVendor('Countdown');

  page.initCountdown = function() {

    $('[data-countdown]').each(function() {
      var tag     = $(this),
          format  = '',
          options = {
            textDay:    'Day',
            textHour:   'Hour',
            textMinute: 'Minute',
            textSecond: 'Second',
          };

      options = $.extend( options, page.getDataOptions(tag));


      format += '<div class="row gap-x-4">';
      format += '<div class="col"><h5>%D</h5><small>'+ options.textDay +'%!D</small></div>';
      format += '<div class="col"><h5>%H</h5><small>'+ options.textHour +'%!H</small></div>';
      format += '<div class="col"><h5>%M</h5><small>'+ options.textMinute +'%!M</small></div>';
      format += '<div class="col"><h5>%S</h5><small>'+ options.textSecond +'%!S</small></div>';
      format += '</div>';

      if ( tag.hasDataAttr('format') ) {
        format = tag.data('format');
      }

      tag.countdown( tag.data('countdown'), function(event) {
        $(this).html(event.strftime( format ));
      } )

    });

  }

}(jQuery);





/***/ }),
/* 8 */
/***/ (function(module, exports) {


/**
 * Load required plugins.
 */
//require('waypoints/lib/jquery.waypoints');
//window.CountUp = require('countup.js');


/**
 * Configure the plugin.
 */

+function($){
  page.registerVendor('Countup');

  page.initCountup = function( target ) {
    var selector = '[data-provide~="countup"]:not(.counted)';
    if ( target !== undefined ) {
      selector = target;
    }

    $( selector ).each(function() {
      var tag = $(this);
      var extraOptions = {};
      extraOptions = $.extend( extraOptions, page.getDataOptions(tag));

      var options = {
        startVal: tag.dataAttr('from', 0),
        endVal:   tag.dataAttr('to', 0),
        options:  extraOptions,
      };
      options = $.extend( options, page.getDataOptions(tag));

      tag.waypoint({
        handler: function($direction) {
          tag.countup(options).addClass('counted');
        },
        offset: '100%'
      });

    });

  }

}(jQuery);



$.fn.countup = function(params) {
  if (typeof CountUp !== 'function') {
    console.error('countUp.js is a required dependency of countUp-jquery.js.');
    return;
  }

  var defaults = {
    startVal: 0,
    decimals: 0,
    duration: 4,
  };

  if (typeof params === 'number') {
    defaults.endVal = params;
  }
  else if (typeof params === 'object') {
    $.extend(defaults, params);
  }
  else {
    console.error('countUp-jquery requires its argument to be either an object or number');
    return;
  }

  this.each(function(i, elem) {
    var countUp = new CountUp(elem, defaults.startVal, defaults.endVal, defaults.decimals, defaults.duration, defaults.options);

    countUp.start();
  });

  return this;
};


/***/ }),
/* 9 */
/***/ (function(module, exports) {


/**
 * Load required plugin.
 */
//window.Granim = require('granim');


/**
 * Configure the plugin.
 */

+function($){
  page.registerVendor('Granim');

  page.initGranim = function() {
    $('[data-granim]').each(function(){
      var tag       = $(this),
          granim    = tag.data('granim').split(','),
          gradients = [],
          opacity   = [1,1];

      var len = granim.length;
      if ( len > 0 ) {
        if ( granim[0].indexOf('-') > -1 ) {
          for (var i = 0; i < len; i++) {
            gradients[i] = granim[i].split('-');
          }

          for (var i = 0; i < gradients[0].length; i++) {
            opacity[i] = 1;
          }
        }
        else {
          for (var i = 0; i < len/2; i++) {
            gradients[i] = [granim[i*2], granim[i*2+1]];
          }
        }
      }

      var options = {
        element: tag[0],
        name: 'granim',
        direction: tag.dataAttr('direction', 'left-right'),
        isPausedWhenNotInView: true,
        opacity: opacity,
        states : {
          "default-state": {
            gradients: gradients,
            transitionSpeed: 5000,
            loop: true
          }
         }
      };

      if (tag.hasDataAttr('opacity')) {
        options.opacity = tag.data('opacity').split(',');
      }

      if (tag.hasDataAttr('image')) {
        options.image = {
          source: tag.dataAttr('image', ''),
          position: ['center', 'center'],
          stretchMode: ['stretch-if-bigger', 'stretch-if-bigger'],
          blendingMode: 'multiply',
        }
      }

      var granimInstance = new Granim(options);

    });
  }

}(jQuery);





/***/ }),
/* 10 */
/***/ (function(module, exports, __webpack_require__) {


/**
 * Load required plugin.
 */
__webpack_require__(11);
__webpack_require__(12);


/**
 * Configure the plugin.
 */

+function($){
  page.registerVendor('Jarallax');

  page.initJarallax = function() {

    // Parallax image
    //
    $('[data-parallax]').each(function() {
      var tag = $(this);
      var options = {
        imgSrc: tag.data('parallax'),
        speed: 0.3,
      };

      if ( tag.hasClass('header') ) {
        options.speed = 0.6;
      }

      options = $.extend( options, page.getDataOptions(tag));

      tag.jarallax( options );

    });


    // Video backgrounds
    //
    $('[data-video]').each(function() {
      var tag = $(this);
      var options = {
        videoSrc: tag.data('video'),
        speed: 1,
      };

      if ( options.videoSrc.indexOf('mp4:') > -1 ) {
        options.speed = 0.5;
      }

      options = $.extend( options, page.getDataOptions(tag));

      tag.jarallax( options );

    });

  }

}(jQuery);





/***/ }),
/* 11 */
/***/ (function(module, exports) {

/*!
 * Name    : Just Another Parallax [Jarallax]
 * Version : 1.10.7
 * Author  : nK <https://nkdev.info>
 * GitHub  : https://github.com/nk-o/jarallax
 */!function(o){var n={};function i(e){if(n[e])return n[e].exports;var t=n[e]={i:e,l:!1,exports:{}};return o[e].call(t.exports,t,t.exports,i),t.l=!0,t.exports}i.m=o,i.c=n,i.d=function(e,t,o){i.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},i.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},i.t=function(t,e){if(1&e&&(t=i(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var o=Object.create(null);if(i.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var n in t)i.d(o,n,function(e){return t[e]}.bind(null,n));return o},i.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return i.d(t,"a",t),t},i.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},i.p="",i(i.s=11)}([,,function(e,t,o){"use strict";e.exports=function(e){"complete"===document.readyState||"interactive"===document.readyState?e.call():document.attachEvent?document.attachEvent("onreadystatechange",function(){"interactive"===document.readyState&&e.call()}):document.addEventListener&&document.addEventListener("DOMContentLoaded",e)}},,function(o,e,t){"use strict";(function(e){var t;t="undefined"!=typeof window?window:void 0!==e?e:"undefined"!=typeof self?self:{},o.exports=t}).call(this,t(5))},function(e,t,o){"use strict";var n,i="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e};n=function(){return this}();try{n=n||Function("return this")()||(0,eval)("this")}catch(e){"object"===("undefined"==typeof window?"undefined":i(window))&&(n=window)}e.exports=n},,,,,,function(e,t,o){e.exports=o(12)},function(e,t,o){"use strict";var n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},i=l(o(2)),a=o(4),r=l(o(13));function l(e){return e&&e.__esModule?e:{default:e}}var s=a.window.jarallax;if(a.window.jarallax=r.default,a.window.jarallax.noConflict=function(){return a.window.jarallax=s,this},void 0!==a.jQuery){var c=function(){var e=arguments||[];Array.prototype.unshift.call(e,this);var t=r.default.apply(a.window,e);return"object"!==(void 0===t?"undefined":n(t))?t:this};c.constructor=r.default.constructor;var u=a.jQuery.fn.jarallax;a.jQuery.fn.jarallax=c,a.jQuery.fn.jarallax.noConflict=function(){return a.jQuery.fn.jarallax=u,this}}(0,i.default)(function(){(0,r.default)(document.querySelectorAll("[data-jarallax]"))})},function(e,j,S){"use strict";(function(e){Object.defineProperty(j,"__esModule",{value:!0});var d=function(e,t){if(Array.isArray(e))return e;if(Symbol.iterator in Object(e))return function(e,t){var o=[],n=!0,i=!1,a=void 0;try{for(var r,l=e[Symbol.iterator]();!(n=(r=l.next()).done)&&(o.push(r.value),!t||o.length!==t);n=!0);}catch(e){i=!0,a=e}finally{try{!n&&l.return&&l.return()}finally{if(i)throw a}}return o}(e,t);throw new TypeError("Invalid attempt to destructure non-iterable instance")},t=function(){function n(e,t){for(var o=0;o<t.length;o++){var n=t[o];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}return function(e,t,o){return t&&n(e.prototype,t),o&&n(e,o),e}}(),p="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},o=a(S(2)),n=a(S(14)),i=S(4);function a(e){return e&&e.__esModule?e:{default:e}}var s=-1<navigator.userAgent.indexOf("MSIE ")||-1<navigator.userAgent.indexOf("Trident/")||-1<navigator.userAgent.indexOf("Edge/"),r=function(){for(var e="transform WebkitTransform MozTransform".split(" "),t=document.createElement("div"),o=0;o<e.length;o++)if(t&&void 0!==t.style[e[o]])return e[o];return!1}(),b=void 0,v=void 0,l=void 0,c=!1,u=!1;function m(e){b=i.window.innerWidth||document.documentElement.clientWidth,v=i.window.innerHeight||document.documentElement.clientHeight,"object"!==(void 0===e?"undefined":p(e))||"load"!==e.type&&"dom-loaded"!==e.type||(c=!0)}m(),i.window.addEventListener("resize",m),i.window.addEventListener("orientationchange",m),i.window.addEventListener("load",m),(0,o.default)(function(){m({type:"dom-loaded"})});var f=[],y=!1;function g(){if(f.length){l=void 0!==i.window.pageYOffset?i.window.pageYOffset:(document.documentElement||document.body.parentNode||document.body).scrollTop;var t=c||!y||y.width!==b||y.height!==v,o=u||t||!y||y.y!==l;u=c=!1,(t||o)&&(f.forEach(function(e){t&&e.onResize(),o&&e.onScroll()}),y={width:b,height:v,y:l}),(0,n.default)(g)}}var h=!!e.ResizeObserver&&new e.ResizeObserver(function(e){e&&e.length&&(0,n.default)(function(){e.forEach(function(e){e.target&&e.target.jarallax&&(c||e.target.jarallax.onResize(),u=!0)})})}),x=0,w=function(){function u(e,t){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,u);var o=this;o.instanceID=x++,o.$item=e,o.defaults={type:"scroll",speed:.5,imgSrc:null,imgElement:".jarallax-img",imgSize:"cover",imgPosition:"50% 50%",imgRepeat:"no-repeat",keepImg:!1,elementInViewport:null,zIndex:-100,disableParallax:!1,disableVideo:!1,automaticResize:!0,videoSrc:null,videoStartTime:0,videoEndTime:0,videoVolume:0,videoLoop:!0,videoPlayOnlyVisible:!0,onScroll:null,onInit:null,onDestroy:null,onCoverImage:null};var n=o.$item.getAttribute("data-jarallax"),i=JSON.parse(n||"{}");n&&console.warn("Detected usage of deprecated data-jarallax JSON options, you should use pure data-attribute options. See info here - https://github.com/nk-o/jarallax/issues/53");var a=o.$item.dataset||{},r={};if(Object.keys(a).forEach(function(e){var t=e.substr(0,1).toLowerCase()+e.substr(1);t&&void 0!==o.defaults[t]&&(r[t]=a[e])}),o.options=o.extend({},o.defaults,i,r,t),o.pureOptions=o.extend({},o.options),Object.keys(o.options).forEach(function(e){"true"===o.options[e]?o.options[e]=!0:"false"===o.options[e]&&(o.options[e]=!1)}),o.options.speed=Math.min(2,Math.max(-1,parseFloat(o.options.speed))),(o.options.noAndroid||o.options.noIos)&&(console.warn("Detected usage of deprecated noAndroid or noIos options, you should use disableParallax option. See info here - https://github.com/nk-o/jarallax/#disable-on-mobile-devices"),o.options.disableParallax||(o.options.noIos&&o.options.noAndroid?o.options.disableParallax=/iPad|iPhone|iPod|Android/:o.options.noIos?o.options.disableParallax=/iPad|iPhone|iPod/:o.options.noAndroid&&(o.options.disableParallax=/Android/))),"string"==typeof o.options.disableParallax&&(o.options.disableParallax=new RegExp(o.options.disableParallax)),o.options.disableParallax instanceof RegExp){var l=o.options.disableParallax;o.options.disableParallax=function(){return l.test(navigator.userAgent)}}if("function"!=typeof o.options.disableParallax&&(o.options.disableParallax=function(){return!1}),"string"==typeof o.options.disableVideo&&(o.options.disableVideo=new RegExp(o.options.disableVideo)),o.options.disableVideo instanceof RegExp){var s=o.options.disableVideo;o.options.disableVideo=function(){return s.test(navigator.userAgent)}}"function"!=typeof o.options.disableVideo&&(o.options.disableVideo=function(){return!1});var c=o.options.elementInViewport;c&&"object"===(void 0===c?"undefined":p(c))&&void 0!==c.length&&(c=d(c,1)[0]);c instanceof Element||(c=null),o.options.elementInViewport=c,o.image={src:o.options.imgSrc||null,$container:null,useImgTag:!1,position:/iPad|iPhone|iPod|Android/.test(navigator.userAgent)?"absolute":"fixed"},o.initImg()&&o.canInitParallax()&&o.init()}return t(u,[{key:"css",value:function(t,o){return"string"==typeof o?i.window.getComputedStyle(t).getPropertyValue(o):(o.transform&&r&&(o[r]=o.transform),Object.keys(o).forEach(function(e){t.style[e]=o[e]}),t)}},{key:"extend",value:function(o){var n=arguments;return o=o||{},Object.keys(arguments).forEach(function(t){n[t]&&Object.keys(n[t]).forEach(function(e){o[e]=n[t][e]})}),o}},{key:"getWindowData",value:function(){return{width:b,height:v,y:l}}},{key:"initImg",value:function(){var e=this,t=e.options.imgElement;return t&&"string"==typeof t&&(t=e.$item.querySelector(t)),t instanceof Element||(t=null),t&&(e.options.keepImg?e.image.$item=t.cloneNode(!0):(e.image.$item=t,e.image.$itemParent=t.parentNode),e.image.useImgTag=!0),!!e.image.$item||(null===e.image.src&&(e.image.src=e.css(e.$item,"background-image").replace(/^url\(['"]?/g,"").replace(/['"]?\)$/g,"")),!(!e.image.src||"none"===e.image.src))}},{key:"canInitParallax",value:function(){return r&&!this.options.disableParallax()}},{key:"init",value:function(){var e=this,t={position:"absolute",top:0,left:0,width:"100%",height:"100%",overflow:"hidden",pointerEvents:"none"},o={};if(!e.options.keepImg){var n=e.$item.getAttribute("style");if(n&&e.$item.setAttribute("data-jarallax-original-styles",n),e.image.useImgTag){var i=e.image.$item.getAttribute("style");i&&e.image.$item.setAttribute("data-jarallax-original-styles",i)}}if("static"===e.css(e.$item,"position")&&e.css(e.$item,{position:"relative"}),"auto"===e.css(e.$item,"z-index")&&e.css(e.$item,{zIndex:0}),e.image.$container=document.createElement("div"),e.css(e.image.$container,t),e.css(e.image.$container,{"z-index":e.options.zIndex}),s&&e.css(e.image.$container,{opacity:.9999}),e.image.$container.setAttribute("id","jarallax-container-"+e.instanceID),e.$item.appendChild(e.image.$container),e.image.useImgTag?o=e.extend({"object-fit":e.options.imgSize,"object-position":e.options.imgPosition,"font-family":"object-fit: "+e.options.imgSize+"; object-position: "+e.options.imgPosition+";","max-width":"none"},t,o):(e.image.$item=document.createElement("div"),e.image.src&&(o=e.extend({"background-position":e.options.imgPosition,"background-size":e.options.imgSize,"background-repeat":e.options.imgRepeat,"background-image":'url("'+e.image.src+'")'},t,o))),"opacity"!==e.options.type&&"scale"!==e.options.type&&"scale-opacity"!==e.options.type&&1!==e.options.speed||(e.image.position="absolute"),"fixed"===e.image.position)for(var a=0,r=e.$item;null!==r&&r!==document&&0===a;){var l=e.css(r,"-webkit-transform")||e.css(r,"-moz-transform")||e.css(r,"transform");l&&"none"!==l&&(a=1,e.image.position="absolute"),r=r.parentNode}o.position=e.image.position,e.css(e.image.$item,o),e.image.$container.appendChild(e.image.$item),e.onResize(),e.onScroll(!0),e.options.automaticResize&&h&&h.observe(e.$item),e.options.onInit&&e.options.onInit.call(e),"none"!==e.css(e.$item,"background-image")&&e.css(e.$item,{"background-image":"none"}),e.addToParallaxList()}},{key:"addToParallaxList",value:function(){f.push(this),1===f.length&&g()}},{key:"removeFromParallaxList",value:function(){var o=this;f.forEach(function(e,t){e.instanceID===o.instanceID&&f.splice(t,1)})}},{key:"destroy",value:function(){var e=this;e.removeFromParallaxList();var t=e.$item.getAttribute("data-jarallax-original-styles");if(e.$item.removeAttribute("data-jarallax-original-styles"),t?e.$item.setAttribute("style",t):e.$item.removeAttribute("style"),e.image.useImgTag){var o=e.image.$item.getAttribute("data-jarallax-original-styles");e.image.$item.removeAttribute("data-jarallax-original-styles"),o?e.image.$item.setAttribute("style",t):e.image.$item.removeAttribute("style"),e.image.$itemParent&&e.image.$itemParent.appendChild(e.image.$item)}e.$clipStyles&&e.$clipStyles.parentNode.removeChild(e.$clipStyles),e.image.$container&&e.image.$container.parentNode.removeChild(e.image.$container),e.options.onDestroy&&e.options.onDestroy.call(e),delete e.$item.jarallax}},{key:"clipContainer",value:function(){if("fixed"===this.image.position){var e=this,t=e.image.$container.getBoundingClientRect(),o=t.width,n=t.height;if(!e.$clipStyles)e.$clipStyles=document.createElement("style"),e.$clipStyles.setAttribute("type","text/css"),e.$clipStyles.setAttribute("id","jarallax-clip-"+e.instanceID),(document.head||document.getElementsByTagName("head")[0]).appendChild(e.$clipStyles);var i="#jarallax-container-"+e.instanceID+" {\n           clip: rect(0 "+o+"px "+n+"px 0);\n           clip: rect(0, "+o+"px, "+n+"px, 0);\n        }";e.$clipStyles.styleSheet?e.$clipStyles.styleSheet.cssText=i:e.$clipStyles.innerHTML=i}}},{key:"coverImage",value:function(){var e=this,t=e.image.$container.getBoundingClientRect(),o=t.height,n=e.options.speed,i="scroll"===e.options.type||"scroll-opacity"===e.options.type,a=0,r=o,l=0;return i&&(n<0?(a=n*Math.max(o,v),v<o&&(a-=n*(o-v))):a=n*(o+v),1<n?r=Math.abs(a-v):n<0?r=a/n+Math.abs(a):r+=(v-o)*(1-n),a/=2),e.parallaxScrollDistance=a,l=i?(v-r)/2:(o-r)/2,e.css(e.image.$item,{height:r+"px",marginTop:l+"px",left:"fixed"===e.image.position?t.left+"px":"0",width:t.width+"px"}),e.options.onCoverImage&&e.options.onCoverImage.call(e),{image:{height:r,marginTop:l},container:t}}},{key:"isVisible",value:function(){return this.isElementInViewport||!1}},{key:"onScroll",value:function(e){var t=this,o=t.$item.getBoundingClientRect(),n=o.top,i=o.height,a={},r=o;if(t.options.elementInViewport&&(r=t.options.elementInViewport.getBoundingClientRect()),t.isElementInViewport=0<=r.bottom&&0<=r.right&&r.top<=v&&r.left<=b,e||t.isElementInViewport){var l=Math.max(0,n),s=Math.max(0,i+n),c=Math.max(0,-n),u=Math.max(0,n+i-v),d=Math.max(0,i-(n+i-v)),p=Math.max(0,-n+v-i),m=1-2*(v-n)/(v+i),f=1;if(i<v?f=1-(c||u)/i:s<=v?f=s/v:d<=v&&(f=d/v),"opacity"!==t.options.type&&"scale-opacity"!==t.options.type&&"scroll-opacity"!==t.options.type||(a.transform="translate3d(0,0,0)",a.opacity=f),"scale"===t.options.type||"scale-opacity"===t.options.type){var y=1;t.options.speed<0?y-=t.options.speed*f:y+=t.options.speed*(1-f),a.transform="scale("+y+") translate3d(0,0,0)"}if("scroll"===t.options.type||"scroll-opacity"===t.options.type){var g=t.parallaxScrollDistance*m;"absolute"===t.image.position&&(g-=n),a.transform="translate3d(0,"+g+"px,0)"}t.css(t.image.$item,a),t.options.onScroll&&t.options.onScroll.call(t,{section:o,beforeTop:l,beforeTopEnd:s,afterTop:c,beforeBottom:u,beforeBottomEnd:d,afterBottom:p,visiblePercent:f,fromViewportCenter:m})}}},{key:"onResize",value:function(){this.coverImage(),this.clipContainer()}}]),u}(),$=function(e){("object"===("undefined"==typeof HTMLElement?"undefined":p(HTMLElement))?e instanceof HTMLElement:e&&"object"===(void 0===e?"undefined":p(e))&&null!==e&&1===e.nodeType&&"string"==typeof e.nodeName)&&(e=[e]);for(var t=arguments[1],o=Array.prototype.slice.call(arguments,2),n=e.length,i=0,a=void 0;i<n;i++)if("object"===(void 0===t?"undefined":p(t))||void 0===t?e[i].jarallax||(e[i].jarallax=new w(e[i],t)):e[i].jarallax&&(a=e[i].jarallax[t].apply(e[i].jarallax,o)),void 0!==a)return a;return e};$.constructor=w,j.default=$}).call(this,S(5))},function(e,t,o){"use strict";var n=o(4),i=n.requestAnimationFrame||n.webkitRequestAnimationFrame||n.mozRequestAnimationFrame||function(e){var t=+new Date,o=Math.max(0,16-(t-a)),n=setTimeout(e,o);return a=t,n},a=+new Date;var r=n.cancelAnimationFrame||n.webkitCancelAnimationFrame||n.mozCancelAnimationFrame||clearTimeout;Function.prototype.bind&&(i=i.bind(n),r=r.bind(n)),(e.exports=i).cancel=r}]);
//# sourceMappingURL=jarallax.min.js.map


/***/ }),
/* 12 */
/***/ (function(module, exports) {

/*!
 * Name    : Video Background Extension for Jarallax
 * Version : 1.0.1
 * Author  : nK <https://nkdev.info>
 * GitHub  : https://github.com/nk-o/jarallax
 */!function(o){var i={};function n(e){if(i[e])return i[e].exports;var t=i[e]={i:e,l:!1,exports:{}};return o[e].call(t.exports,t,t.exports,n),t.l=!0,t.exports}n.m=o,n.c=i,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var i in t)n.d(o,i,function(e){return t[e]}.bind(null,i));return o},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=6)}([,,function(e,t,o){"use strict";e.exports=function(e){"complete"===document.readyState||"interactive"===document.readyState?e.call():document.attachEvent?document.attachEvent("onreadystatechange",function(){"interactive"===document.readyState&&e.call()}):document.addEventListener&&document.addEventListener("DOMContentLoaded",e)}},,function(o,e,t){"use strict";(function(e){var t;t="undefined"!=typeof window?window:void 0!==e?e:"undefined"!=typeof self?self:{},o.exports=t}).call(this,t(5))},function(e,t,o){"use strict";var i,n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e};i=function(){return this}();try{i=i||Function("return this")()||(0,eval)("this")}catch(e){"object"===("undefined"==typeof window?"undefined":n(window))&&(i=window)}e.exports=i},function(e,t,o){e.exports=o(7)},function(e,t,o){"use strict";var i=l(o(8)),n=l(o(4)),a=l(o(2)),r=l(o(10));function l(e){return e&&e.__esModule?e:{default:e}}n.default.VideoWorker=n.default.VideoWorker||i.default,(0,r.default)(),(0,a.default)(function(){"undefined"!=typeof jarallax&&jarallax(document.querySelectorAll("[data-jarallax-video]"))})},function(e,t,o){"use strict";e.exports=o(9)},function(e,t,o){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},a=function(){function i(e,t){for(var o=0;o<t.length;o++){var i=t[o];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(e,t,o){return t&&i(e.prototype,t),o&&i(e,o),e}}();function i(){this._done=[],this._fail=[]}i.prototype={execute:function(e,t){var o=e.length;for(t=Array.prototype.slice.call(t);o--;)e[o].apply(null,t)},resolve:function(){this.execute(this._done,arguments)},reject:function(){this.execute(this._fail,arguments)},done:function(e){this._done.push(e)},fail:function(e){this._fail.push(e)}};var r=0,l=0,u=0,p=0,d=0,s=new i,y=new i,c=function(){function i(e,t){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,i);var o=this;o.url=e,o.options_default={autoplay:!1,loop:!1,mute:!1,volume:100,showContols:!0,startTime:0,endTime:0},o.options=o.extend({},o.options_default,t),o.videoID=o.parseURL(e),o.videoID&&(o.ID=r++,o.loadAPI(),o.init())}return a(i,[{key:"extend",value:function(o){var i=arguments;return o=o||{},Object.keys(arguments).forEach(function(t){i[t]&&Object.keys(i[t]).forEach(function(e){o[e]=i[t][e]})}),o}},{key:"parseURL",value:function(e){var t,o,i,n,a,r=!(!(t=e.match(/.*(?:youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/))||11!==t[1].length)&&t[1],l=!(!(o=e.match(/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/))||!o[3])&&o[3],u=(i=e.split(/,(?=mp4\:|webm\:|ogv\:|ogg\:)/),n={},a=0,i.forEach(function(e){var t=e.match(/^(mp4|webm|ogv|ogg)\:(.*)/);t&&t[1]&&t[2]&&(n["ogv"===t[1]?"ogg":t[1]]=t[2],a=1)}),!!a&&n);return r?(this.type="youtube",r):l?(this.type="vimeo",l):!!u&&(this.type="local",u)}},{key:"isValid",value:function(){return!!this.videoID}},{key:"on",value:function(e,t){this.userEventsList=this.userEventsList||[],(this.userEventsList[e]||(this.userEventsList[e]=[])).push(t)}},{key:"off",value:function(o,i){var n=this;this.userEventsList&&this.userEventsList[o]&&(i?this.userEventsList[o].forEach(function(e,t){e===i&&(n.userEventsList[o][t]=!1)}):delete this.userEventsList[o])}},{key:"fire",value:function(e){var t=this,o=[].slice.call(arguments,1);this.userEventsList&&void 0!==this.userEventsList[e]&&this.userEventsList[e].forEach(function(e){e&&e.apply(t,o)})}},{key:"play",value:function(e){var t=this;t.player&&("youtube"===t.type&&t.player.playVideo&&(void 0!==e&&t.player.seekTo(e||0),YT.PlayerState.PLAYING!==t.player.getPlayerState()&&t.player.playVideo()),"vimeo"===t.type&&(void 0!==e&&t.player.setCurrentTime(e),t.player.getPaused().then(function(e){e&&t.player.play()})),"local"===t.type&&(void 0!==e&&(t.player.currentTime=e),t.player.paused&&t.player.play()))}},{key:"pause",value:function(){var t=this;t.player&&("youtube"===t.type&&t.player.pauseVideo&&YT.PlayerState.PLAYING===t.player.getPlayerState()&&t.player.pauseVideo(),"vimeo"===t.type&&t.player.getPaused().then(function(e){e||t.player.pause()}),"local"===t.type&&(t.player.paused||t.player.pause()))}},{key:"mute",value:function(){var e=this;e.player&&("youtube"===e.type&&e.player.mute&&e.player.mute(),"vimeo"===e.type&&e.player.setVolume&&e.player.setVolume(0),"local"===e.type&&(e.$video.muted=!0))}},{key:"unmute",value:function(){var e=this;e.player&&("youtube"===e.type&&e.player.mute&&e.player.unMute(),"vimeo"===e.type&&e.player.setVolume&&e.player.setVolume(e.options.volume),"local"===e.type&&(e.$video.muted=!1))}},{key:"setVolume",value:function(){var e=0<arguments.length&&void 0!==arguments[0]&&arguments[0],t=this;t.player&&e&&("youtube"===t.type&&t.player.setVolume&&t.player.setVolume(e),"vimeo"===t.type&&t.player.setVolume&&t.player.setVolume(e),"local"===t.type&&(t.$video.volume=e/100))}},{key:"getVolume",value:function(t){var e=this;e.player?("youtube"===e.type&&e.player.getVolume&&t(e.player.getVolume()),"vimeo"===e.type&&e.player.getVolume&&e.player.getVolume().then(function(e){t(e)}),"local"===e.type&&t(100*e.$video.volume)):t(!1)}},{key:"getMuted",value:function(t){var e=this;e.player?("youtube"===e.type&&e.player.isMuted&&t(e.player.isMuted()),"vimeo"===e.type&&e.player.getVolume&&e.player.getVolume().then(function(e){t(!!e)}),"local"===e.type&&t(e.$video.muted)):t(null)}},{key:"getImageURL",value:function(t){var o=this;if(o.videoImage)t(o.videoImage);else{if("youtube"===o.type){var e=["maxresdefault","sddefault","hqdefault","0"],i=0,n=new Image;n.onload=function(){120!==(this.naturalWidth||this.width)||i===e.length-1?(o.videoImage="https://img.youtube.com/vi/"+o.videoID+"/"+e[i]+".jpg",t(o.videoImage)):(i++,this.src="https://img.youtube.com/vi/"+o.videoID+"/"+e[i]+".jpg")},n.src="https://img.youtube.com/vi/"+o.videoID+"/"+e[i]+".jpg"}if("vimeo"===o.type){var a=new XMLHttpRequest;a.open("GET","https://vimeo.com/api/v2/video/"+o.videoID+".json",!0),a.onreadystatechange=function(){if(4===this.readyState&&200<=this.status&&this.status<400){var e=JSON.parse(this.responseText);o.videoImage=e[0].thumbnail_large,t(o.videoImage)}},a.send(),a=null}}}},{key:"getIframe",value:function(e){this.getVideo(e)}},{key:"getVideo",value:function(u){var p=this;p.$video?u(p.$video):p.onAPIready(function(){var e=void 0;if(p.$video||((e=document.createElement("div")).style.display="none"),"youtube"===p.type){p.playerOptions={},p.playerOptions.videoId=p.videoID,p.playerOptions.playerVars={autohide:1,rel:0,autoplay:0,playsinline:1},p.options.showContols||(p.playerOptions.playerVars.iv_load_policy=3,p.playerOptions.playerVars.modestbranding=1,p.playerOptions.playerVars.controls=0,p.playerOptions.playerVars.showinfo=0,p.playerOptions.playerVars.disablekb=1);var t=void 0,o=void 0;p.playerOptions.events={onReady:function(t){if(p.options.mute?t.target.mute():p.options.volume&&t.target.setVolume(p.options.volume),p.options.autoplay&&p.play(p.options.startTime),p.fire("ready",t),p.options.loop&&!p.options.endTime){p.options.endTime=p.player.getDuration()-.1}setInterval(function(){p.getVolume(function(e){p.options.volume!==e&&(p.options.volume=e,p.fire("volumechange",t))})},150)},onStateChange:function(e){p.options.loop&&e.data===YT.PlayerState.ENDED&&p.play(p.options.startTime),t||e.data!==YT.PlayerState.PLAYING||(t=1,p.fire("started",e)),e.data===YT.PlayerState.PLAYING&&p.fire("play",e),e.data===YT.PlayerState.PAUSED&&p.fire("pause",e),e.data===YT.PlayerState.ENDED&&p.fire("ended",e),e.data===YT.PlayerState.PLAYING?o=setInterval(function(){p.fire("timeupdate",e),p.options.endTime&&p.player.getCurrentTime()>=p.options.endTime&&(p.options.loop?p.play(p.options.startTime):p.pause())},150):clearInterval(o)}};var i=!p.$video;if(i){var n=document.createElement("div");n.setAttribute("id",p.playerID),e.appendChild(n),document.body.appendChild(e)}p.player=p.player||new window.YT.Player(p.playerID,p.playerOptions),i&&(p.$video=document.getElementById(p.playerID),p.videoWidth=parseInt(p.$video.getAttribute("width"),10)||1280,p.videoHeight=parseInt(p.$video.getAttribute("height"),10)||720)}if("vimeo"===p.type){if(p.playerOptions={id:p.videoID,autopause:0,transparent:0,autoplay:p.options.autoplay?1:0,loop:p.options.loop?1:0,muted:p.options.mute?1:0},p.options.volume&&(p.playerOptions.volume=p.options.volume),p.options.showContols||(p.playerOptions.badge=0,p.playerOptions.byline=0,p.playerOptions.portrait=0,p.playerOptions.title=0),!p.$video){var a="";Object.keys(p.playerOptions).forEach(function(e){""!==a&&(a+="&"),a+=e+"="+encodeURIComponent(p.playerOptions[e])}),p.$video=document.createElement("iframe"),p.$video.setAttribute("id",p.playerID),p.$video.setAttribute("src","https://player.vimeo.com/video/"+p.videoID+"?"+a),p.$video.setAttribute("frameborder","0"),p.$video.setAttribute("mozallowfullscreen",""),p.$video.setAttribute("allowfullscreen",""),e.appendChild(p.$video),document.body.appendChild(e)}p.player=p.player||new Vimeo.Player(p.$video,p.playerOptions),p.options.startTime&&p.options.autoplay&&p.player.setCurrentTime(p.options.startTime),p.player.getVideoWidth().then(function(e){p.videoWidth=e||1280}),p.player.getVideoHeight().then(function(e){p.videoHeight=e||720});var r=void 0;p.player.on("timeupdate",function(e){r||(p.fire("started",e),r=1),p.fire("timeupdate",e),p.options.endTime&&p.options.endTime&&e.seconds>=p.options.endTime&&(p.options.loop?p.play(p.options.startTime):p.pause())}),p.player.on("play",function(e){p.fire("play",e),p.options.startTime&&0===e.seconds&&p.play(p.options.startTime)}),p.player.on("pause",function(e){p.fire("pause",e)}),p.player.on("ended",function(e){p.fire("ended",e)}),p.player.on("loaded",function(e){p.fire("ready",e)}),p.player.on("volumechange",function(e){p.fire("volumechange",e)})}if("local"===p.type){p.$video||(p.$video=document.createElement("video"),p.options.showContols&&(p.$video.controls=!0),p.options.mute?p.$video.muted=!0:p.$video.volume&&(p.$video.volume=p.options.volume/100),p.options.loop&&(p.$video.loop=!0),p.$video.setAttribute("playsinline",""),p.$video.setAttribute("webkit-playsinline",""),p.$video.setAttribute("id",p.playerID),e.appendChild(p.$video),document.body.appendChild(e),Object.keys(p.videoID).forEach(function(e){var t,o,i,n;t=p.$video,o=p.videoID[e],i="video/"+e,(n=document.createElement("source")).src=o,n.type=i,t.appendChild(n)})),p.player=p.player||p.$video;var l=void 0;p.player.addEventListener("playing",function(e){l||p.fire("started",e),l=1}),p.player.addEventListener("timeupdate",function(e){p.fire("timeupdate",e),p.options.endTime&&p.options.endTime&&this.currentTime>=p.options.endTime&&(p.options.loop?p.play(p.options.startTime):p.pause())}),p.player.addEventListener("play",function(e){p.fire("play",e)}),p.player.addEventListener("pause",function(e){p.fire("pause",e)}),p.player.addEventListener("ended",function(e){p.fire("ended",e)}),p.player.addEventListener("loadedmetadata",function(){p.videoWidth=this.videoWidth||1280,p.videoHeight=this.videoHeight||720,p.fire("ready"),p.options.autoplay&&p.play(p.options.startTime)}),p.player.addEventListener("volumechange",function(e){p.getVolume(function(e){p.options.volume=e}),p.fire("volumechange",e)})}u(p.$video)})}},{key:"init",value:function(){this.playerID="VideoWorker-"+this.ID}},{key:"loadAPI",value:function(){if(!l||!u){var e="";if("youtube"!==this.type||l||(l=1,e="https://www.youtube.com/iframe_api"),"vimeo"!==this.type||u||(u=1,e="https://player.vimeo.com/api/player.js"),e){var t=document.createElement("script"),o=document.getElementsByTagName("head")[0];t.src=e,o.appendChild(t),t=o=null}}}},{key:"onAPIready",value:function(e){if("youtube"===this.type&&("undefined"!=typeof YT&&0!==YT.loaded||p?"object"===("undefined"==typeof YT?"undefined":n(YT))&&1===YT.loaded?e():s.done(function(){e()}):(p=1,window.onYouTubeIframeAPIReady=function(){window.onYouTubeIframeAPIReady=null,s.resolve("done"),e()})),"vimeo"===this.type)if("undefined"!=typeof Vimeo||d)"undefined"!=typeof Vimeo?e():y.done(function(){e()});else{d=1;var t=setInterval(function(){"undefined"!=typeof Vimeo&&(clearInterval(t),y.resolve("done"),e())},20)}"local"===this.type&&e()}}]),i}();t.default=c},function(e,t,o){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(){var e=0<arguments.length&&void 0!==arguments[0]?arguments[0]:u.default.jarallax;if(void 0===e)return;var t=e.constructor,i=t.prototype.init;t.prototype.init=function(){var o=this;i.apply(o),o.video&&!o.options.disableVideo()&&o.video.getVideo(function(e){var t=e.parentNode;o.css(e,{position:o.image.position,top:"0px",left:"0px",right:"0px",bottom:"0px",width:"100%",height:"100%",maxWidth:"none",maxHeight:"none",margin:0,zIndex:-1}),o.$video=e,o.image.$container.appendChild(e),t.parentNode.removeChild(t)})};var l=t.prototype.coverImage;t.prototype.coverImage=function(){var e=this,t=l.apply(e),o=!!e.image.$item&&e.image.$item.nodeName;if(t&&e.video&&o&&("IFRAME"===o||"VIDEO"===o)){var i=t.image.height,n=i*e.image.width/e.image.height,a=(t.container.width-n)/2,r=t.image.marginTop;t.container.width>n&&(n=t.container.width,i=n*e.image.height/e.image.width,a=0,r+=(t.image.height-i)/2),"IFRAME"===o&&(i+=400,r-=200),e.css(e.$video,{width:n+"px",marginLeft:a+"px",height:i+"px",marginTop:r+"px"})}return t};var o=t.prototype.initImg;t.prototype.initImg=function(){var e=this,t=o.apply(e);return e.options.videoSrc||(e.options.videoSrc=e.$item.getAttribute("data-jarallax-video")||null),e.options.videoSrc?(e.defaultInitImgResult=t,!0):t};var n=t.prototype.canInitParallax;t.prototype.canInitParallax=function(){var o=this,e=n.apply(o);if(!o.options.videoSrc)return e;var t=new r.default(o.options.videoSrc,{autoplay:!0,loop:o.options.videoLoop,showContols:!1,startTime:o.options.videoStartTime||0,endTime:o.options.videoEndTime||0,mute:o.options.videoVolume?0:1,volume:o.options.videoVolume||0});if(t.isValid())if(e){if(t.on("ready",function(){if(o.options.videoPlayOnlyVisible){var e=o.onScroll;o.onScroll=function(){e.apply(o),(o.options.videoLoop||!o.options.videoLoop&&!o.videoEnded)&&(o.isVisible()?t.play():t.pause())}}else t.play()}),t.on("started",function(){o.image.$default_item=o.image.$item,o.image.$item=o.$video,o.image.width=o.video.videoWidth||1280,o.image.height=o.video.videoHeight||720,o.coverImage(),o.clipContainer(),o.onScroll(),o.image.$default_item&&(o.image.$default_item.style.display="none")}),t.on("ended",function(){o.videoEnded=!0,o.options.videoLoop||o.image.$default_item&&(o.image.$item=o.image.$default_item,o.image.$item.style.display="block",o.coverImage(),o.clipContainer(),o.onScroll())}),o.video=t,!o.defaultInitImgResult)return"local"!==t.type?(t.getImageURL(function(e){o.image.src=e,o.init()}),!1):(o.image.src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7",!0)}else o.defaultInitImgResult||t.getImageURL(function(e){var t=o.$item.getAttribute("style");t&&o.$item.setAttribute("data-jarallax-original-styles",t),o.css(o.$item,{"background-image":'url("'+e+'")',"background-position":"center","background-size":"cover"})});return e};var a=t.prototype.destroy;t.prototype.destroy=function(){var e=this;e.image.$default_item&&(e.image.$item=e.image.$default_item,delete e.image.$default_item),a.apply(e)}};var r=i(o(8)),u=i(o(4));function i(e){return e&&e.__esModule?e:{default:e}}}]);
//# sourceMappingURL=jarallax-video.min.js.map


/***/ }),
/* 13 */
/***/ (function(module, exports) {


/**
 * Load required plugin.
 */
//window.Lity = require('lity');

/**
 * Configure the plugin.
 */

+function($){
  page.registerVendor('Lity');

  page.initLity = function() {

    $(document).on('click', '[data-provide~="lightbox"]', lity);

  }

}(jQuery);





/***/ }),
/* 14 */
/***/ (function(module, exports) {


/**
 * Load required plugin.
 */
//require('slick-carousel');


/**
 * Configure the plugin.
 */

+function($){
  page.registerVendor('Slick');

  page.initSlick = function( target ) {
    var selector = '[data-provide~="slider"]';
    if ( target !== undefined ) {
      selector = target;
    }

    $( selector ).each(function() {
      var tag = $(this),
          options = {
            speed: 1000,
            arrows: false,
            centerPadding: '0',
          };

      options = $.extend( options, page.getDataOptions(tag));

      if (options.slidesToShow !== undefined || options.centerMode !== undefined) {
        var scrollOn768 = 1;
        if (options.slidesToScroll !== undefined) {
          if (options.slidesToScroll > 1) {
            scrollOn768 = 2;
          }
        }

        options.responsive = [{
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: scrollOn768,
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerPadding: '0px',
          }
        }];
      }

      tag.slick(options);
    });

  }

}(jQuery);





/***/ }),
/* 15 */
/***/ (function(module, exports) {


/**
 * Load required plugins.
 */
//window.imagesLoaded = require('imagesloaded/imagesloaded.pkgd');
//window.Shuffle = require('shufflejs/dist/shuffle.min.js');


/**
 * Configure the plugin.
 */

+function($){
  page.registerVendor('Shuffle');

  page.initShuffle = function() {
    if ( undefined === window['Shuffle'] || 0 === $('[data-provide="shuffle"]').length ) {
      return;
    }

    var Shuffle = window.Shuffle;

    $('[data-provide="shuffle"]').each(function(){

      var list    = $(this).find('[data-shuffle="list"]');
      var filter  = $(this).find('[data-shuffle="filter"]');
      var search  = $(this).find('[data-shuffle="search"]');
      var options = {
        itemSelector: '[data-shuffle="item"]',
        sizer:        '[data-shuffle="sizer"]',
        delimeter:    ',',
        speed:        500,
      };

      var shuffleInstance = new Shuffle(list, options);

      if ( filter.length ) {

        $(filter).find('[data-shuffle="button"]').each( function() {
          $(this).on('click', function() {
            var btn = $(this);
            var isActive = btn.hasClass('active');
            var btnGroup = btn.data('group');

            $(this).closest('[data-shuffle="filter"]').find('[data-shuffle="button"].active').removeClass('active');

            var filterGroup;
            if (isActive) {
              btn.removeClass('active');
              filterGroup = Shuffle.ALL_ITEMS;
            } else {
              btn.addClass('active');
              filterGroup = btnGroup;
            }

            shuffleInstance.filter(filterGroup);
          });
        });

      } //End if


      if ( search.length ) {
        search.on('keyup', function() {
          var searchText = $(this).val().toLowerCase();
          shuffleInstance.filter(function(element, shuffle) {
            var itemText = element.textContent.toLowerCase().trim();
            return itemText.indexOf(searchText) !== -1;
          });
        });
      }


      $( this ).imagesLoaded( function() {
        shuffleInstance.layout()
      });


    });


  }

}(jQuery);





/***/ }),
/* 16 */
/***/ (function(module, exports) {


/**
 * Load required plugin.
 */
//window.Typed = require('typed.js');


/**
 * Configure the plugin.
 */

+function($){
  page.registerVendor('Typed');

  $('.thesaasx-typing-text-format').each(function(){
    var strings = $(this).text();
    $(this).attr('data-typing', strings);
    $(this).text('');
  });

  page.initTyped = function() {
    $('[data-typing]').each(function(){
      var strings = $(this).data('typing').split(',');
      var options = {
        strings: strings,
        typeSpeed: 50,
        backSpeed: 30,
        backDelay: 800,
        loop: true
      };

      options = $.extend( options, page.getDataOptions($(this)) );
      var typed = new Typed( $(this)[0], options );
    });
  }

}(jQuery);





/***/ }),
/* 17 */
/***/ (function(module, exports, __webpack_require__) {


/*
|--------------------------------------------------------------------------
| Partials
|--------------------------------------------------------------------------
|
| Split the application code to several files. Almost all of the following
| files are required for the application to work properly.
|
*/
__webpack_require__(18);
__webpack_require__(19);
__webpack_require__(20);
__webpack_require__(21);
__webpack_require__(22);
__webpack_require__(23);
__webpack_require__(24);
__webpack_require__(25);
__webpack_require__(26);
__webpack_require__(27);
__webpack_require__(28);
__webpack_require__(29);
__webpack_require__(30);
__webpack_require__(31);
__webpack_require__(32);
__webpack_require__(33);
__webpack_require__(34);


/***/ }),
/* 18 */
/***/ (function(module, exports) {


/**
 * Config the application behaviour.
 */

+function($){

  page.config = function(options) {

    // Return config value
    if ( typeof options === 'string' ) {
      return page.defaults[options];
    }

    // Save configs
    $.extend(true, page.defaults, options);

    // Make necessary changes
    //
    if ( ! page.defaults.smoothScroll ) {
      SmoothScroll.destroy();
    }

    // Google map
    //
    if ( $('[data-provide~="map"]').length && window["google.maps.Map"] === undefined ) {
      $.getScript("https://maps.googleapis.com/maps/api/js?key="+ page.defaults.googleApiKey +"&callback=page.initMap");
    }

    // Google Analytics
    //
    if ( page.defaults.googleAnalyticsId ) {
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', page.defaults.googleAnalyticsId, 'auto');
      ga('send', 'pageview');
    }


    // Google reCAPTCHA v2
    //
    if ( $('[data-provide~="recaptcha"]').length && window["grecaptcha"] === undefined ) {
      var url = "https://www.google.com/recaptcha/api.js?onload=recaptchaLoadCallback";
      if ( page.defaults.reCaptchaLanguage != '' ) {
        url += '&hl=' + page.defaults.reCaptchaLanguage;
      }
      $.getScript(url);
    }


    // Google reCAPTCHA v3
    //
    if ( page.defaults.reCaptchaV3SiteKey != '' ) {
      $.getScript('https://www.google.com/recaptcha/api.js?onload=recaptcha3LoadCallback&render='+ page.defaults.reCaptchaV3SiteKey);
    }

    // DOM is loaded, let's init the page.
    //
    page.init();

  }

}(jQuery);


/***/ }),
/* 19 */
/***/ (function(module, exports) {


/**
 * Bind input changes to data attributes
 */

+function($){

  page.initBind = function() {

    // Set the inner text
    //
    $('[data-bind-radio]').each(function(){
      var e     = $(this),
          radio = e.data('bind-radio'),
          value = $('input[name="'+ radio +'"]:checked').val();
      e.text( e.dataAttr(value, e.text()) );

      $('input[name="'+ radio +'"]').on('change', function() {
        var value = $('input[name="'+ radio +'"]:checked').val();
        $('[data-bind-radio="'+ radio +'"]').each(function(){
          var e = $(this);
          e.text( e.dataAttr(value, e.text()) );
        });
      });
    });


    // Set href attribute
    //
    $('[data-bind-href]').each(function(){
      var e     = $(this),
          radio = e.data('bind-href'),
          value = $('input[name="'+ radio +'"]:checked').val();

      e.attr( 'href', e.dataAttr(value) );

      $('input[name="'+ radio +'"]').on('change', function() {
        var value = $('input[name="'+ radio +'"]:checked').val();
        $('[data-bind-href="'+ radio +'"]').each(function(){
          var e = $(this);
          e.attr( 'href', e.dataAttr(value) );
        });
      });
    });

  }

}(jQuery);



/***/ }),
/* 20 */
/***/ (function(module, exports) {


/**
 *
 */

+function($){

  page.initDrawer = function() {

    $(document).on( 'click', '.drawer-toggler, .drawer-close, .backdrop-drawer', function() {
      $('body').toggleClass( 'drawer-open' );
    });

  }

}(jQuery);



/***/ }),
/* 21 */
/***/ (function(module, exports) {


/**
 *
 */

+function($){

  page.initFont = function() {

    var fonts = [];

    $('[data-font]').each(function(){
      var tag  = $(this),
          font = tag.data('font')
          part = font.split(':');

      fonts.push(font);
      tag.css({'font-family': part[0], 'font-weight': part[1]});
    });

    if (fonts.length > 0) {
      $("head").append("<link href='https://fonts.googleapis.com/css?family=" + fonts.join('|') + "' rel='stylesheet'>");
    }

  }

}(jQuery);



/***/ }),
/* 22 */
/***/ (function(module, exports) {


/**
 * All the form related methods.
 */

+function($){

  page.initForm = function() {


    /**
     * Add/remove .focus to .input-group
     */
    $(document).on('focusin', '.input-group', function() {
      $(this).addClass('focus');
    });

    $(document).on('focusout', '.input-group', function() {
      $(this).removeClass('focus');
    });


    // Switch
    //
    $(document).on('click', '.switch', function() {
      var input = $(this).children('.switch-input').not(':disabled');
      input.prop('checked', ! input.prop('checked')).trigger("change");
    });


    // Upload
    //
    $(document).on('click', '.file-browser', function() {
      var browser = $(this);
      var file = browser.closest('.file-group').find('[type="file"]');
      if ( browser.hasClass('form-control') ) {
        setTimeout(function(){
          file.trigger('click');
        },300);
      }
      else {
        file.trigger('click');
      }
    });

    // Event to change file name after file selection
    $(document).on('change', '.file-group [type="file"]', function(){
      var input = $(this);
      var filename = input.val().split('\\').pop();
      input.closest('.file-group').find('.file-value').val(filename).text(filename).focus();
    });


  }

}(jQuery);


/***/ }),
/* 23 */
/***/ (function(module, exports) {


/**
 * Send a form details to the sendmail.php file.
 */

+function($){

  page.initMailer = function() {

    var validEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    $('[data-form="mailer"]').each(function(){

      var form      = $(this),
          email     = form.find('[name="email"]'),
          message   = form.find('[name="message"]'),
          onSuccess = form.dataAttr('on-success', null),
          onError   = form.dataAttr('on-error', null);

      form.on('submit', function(){

        form.children('.alert-danger').remove();

        if ( email.length ) {
          if ( email.val().length < 1 || ! validEmail.test( email.val() ) ) {
            email.addClass('is-invalid');
            return false;
          }
        }


        if ( message.length ) {
          if ( message.val().length < 1 ) {
            message.addClass('is-invalid');
            return false;
          }
        }

        $.ajax({
          type: "POST",
          url: form.attr('action'),
          data: form.serializeArray(),
        })
        .done( function( data ) {
          var response = $.parseJSON( data );
          if ( 'success' == response.status ) {
            form.find('.alert-success').fadeIn(1000);
            form.find(':input').val('');
            if ( onSuccess !== null ) {
              window[onSuccess]();
            }
          }
          else {
            form.prepend('<div class="alert alert-danger">'+ response.message +'</div>');
            console.log( response.reason );
            if ( onError !== null ) {
              window[onError](response.reason);
            }
          }
        });

        return false;
      });

      email.on('focus', function() {
        $(this).removeClass('is-invalid');
      });

      message.on('focus', function() {
        $(this).removeClass('is-invalid');
      });

    });

  }

}(jQuery);



/***/ }),
/* 24 */
/***/ (function(module, exports) {


/**
 * Display google map.
 */

+function($){

  page.initMap = function( target ) {

    var selector = '[data-provide~="map"]';
    if ( target !== undefined ) {
      selector = target;
    }

    $( selector ).each(function() {
      var tag = $(this),
          setting = {
            lat: '',
            lng: '',
            zoom: 13,
            marker: false,
            markerLat: '',
            markerLng: '',
            markerIcon: '',
            markers: '',
            style: '',
            removeControls: false,
          };

      setting = $.extend(setting, page.getDataOptions(tag));

      var map = new google.maps.Map( tag[0], {
        center: {
          lat: Number(setting.lat),
          lng: Number(setting.lng)
        },
        zoom: Number(setting.zoom),
        disableDefaultUI: setting.removeControls,
      });

      // Multiple locations
      //
      if (setting.markers != '') {

        var locations = JSON.parse("[" + setting.markers.replace(/'/g, '"') + "]"),
            infowindow = new google.maps.InfoWindow(),
            marker, i;

        for (i = 0; i < locations.length; i++) {
          var markerIcon = setting.markerIcon;

          if ( locations[i].length > 3 && locations[i][3] != '' ) {
            markerIcon = locations[i][3];
          }

          marker = new google.maps.Marker({
            position: {
              lat: Number(locations[i][0]),
              lng: Number(locations[i][1])
            },
            map: map,
            animation: google.maps.Animation.DROP,
            icon: markerIcon
          });

          if ( locations[i].length > 2 && locations[i][2] != '' ) {
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
              return function() {
                infowindow.setContent(locations[i][2]);
                infowindow.open(map, marker);
              }
            })(marker, i));
          }

        }

      }

      // Single location
      //
      else if ( setting.marker == true ) {

        var marker = new google.maps.Marker({
          position: {
            lat: Number(setting.lat),
            lng: Number(setting.lng)
          },
          map: map,
          animation: google.maps.Animation.DROP,
          icon: setting.markerIcon
        });

        if (tag.is('[data-info]')) {
          var infowindow = new google.maps.InfoWindow({
            content: tag.dataAttr('info', '')
          });

          marker.addListener('click', function() {
            infowindow.open(map, marker);
          });
        }

      }


      switch (setting.style) {
        case 'light':
          map.set('styles', [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]);
          break;

        case 'dark':
          map.set('styles', [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}])
          break;

        default:
          if ( Array.isArray(setting.style) ) {
            map.set('styles', setting.style);
          }
      }

    });

  }

}(jQuery);



/***/ }),
/* 25 */
/***/ (function(module, exports) {


/**
 * All the modal related methods.
 */

+function($){

  page.initModal = function() {
    var body = page.body;

    /**
     * Autoshow
     */
    $('.modal[data-autoshow]').each(function(){
      var modal = $(this),
          delay = parseInt( modal.dataAttr('autoshow') );
      setTimeout( function() { modal.modal('show') }, delay);
    });


     /**
      * Exit
      */
    $('.modal[data-exitshow]').each(function(){
      var modal  = $(this),
          delay  = parseInt( modal.dataAttr('delay', 0) ),
          target = modal.dataAttr('exitshow');

      if ( $(target).length ) {
        $(document).one('mouseleave', target, function() {
          setTimeout( function() { modal.modal('show') }, delay);
        });
      }

    });

  }

}(jQuery);


/***/ }),
/* 26 */
/***/ (function(module, exports) {


/**
 * All the navbar related methods.
 */

+function($){

  page.initNavbar = function() {

    /**
     * Toggle navbar
     */
    $(document).on('click', '.navbar-toggler', function() {
      page.navbarToggle();
    });


    /**
     * Tapping on the backdrop will close the navbar
     */
    $(document).on('click', '.backdrop-navbar', function() {
      page.navbarClose();
    });


    /**
     * Toggle menu open on small screen devices
     */
    $(document).on('click', '.navbar-open .nav-navbar > .nav-item > .nav-link', function() {
      $(this).closest('.nav-item').siblings('.nav-item').find('> .nav:visible').slideUp(333, 'linear');
      $(this).next('.nav').slideToggle(333, 'linear');
    });

  }


  page.navbarToggle = function() {
    var body   = page.body,
        navbar = page.navbar;

    body.toggleClass('navbar-open');
    if (body.hasClass('navbar-open')) {
      navbar.prepend('<div class="backdrop backdrop-navbar"></div>');
    }
  }

  page.navbarClose = function() {
    page.body.removeClass('navbar-open');
    $('.backdrop-navbar').remove();
  }

}(jQuery);


/***/ }),
/* 27 */
/***/ (function(module, exports) {


/**
 * All the popup related methods.
 */

+function($){

  page.initOffcanvas = function() {

    /**
     * Toggle
     */
    $(document).on('click', '[data-toggle="offcanvas"]', function() {
      var target     = $(this).data('target'),
          offcanvas  = $(target);

      if ( target !== undefined && offcanvas.length ) {
        if (offcanvas.hasClass('show')) {
          $('.backdrop-offcanvas').remove();
          offcanvas.removeClass('show');
        }
        else {
          offcanvas.before('<div class="backdrop backdrop-offcanvas"></div>');
          offcanvas.addClass('show');
          setTimeout(function() { offcanvas.find('input:text:visible:first').focus(); }, 300);
        }
      }
    });


    /**
     * Dismiss
     */
    $(document).on('click', '.offcanvas [data-dismiss], .backdrop-offcanvas', function() {
      $('.offcanvas.show').removeClass('show');
      $('.backdrop-offcanvas').remove();
    });


    /**
     * Esc key
     */
    $(document).on('keyup', function(e) {
      if ($('.offcanvas.show').length && e.keyCode == 27) { // esc keycode
        $('.offcanvas.show').removeClass('show');
        $('.backdrop-offcanvas').remove();
      }
    });
  }

}(jQuery);


/***/ }),
/* 28 */
/***/ (function(module, exports) {


/**
 * All the popup related methods.
 */

+function($){

  page.initPopup = function() {
    var body = page.body;


    /**
     * Toggle
     */
    $(document).on('click', '[data-toggle="popup"]', function() {
      var target = $(this).data('target'),
          popup  = $(target);

      if ( target !== undefined && popup.length ) {
        if (popup.hasClass('show')) {
          popup.removeClass('show');
        }
        else {
          popupShow(popup);
        }
      }
    });


    /**
     * Dismiss
     */
    $(document).on('click', '.popup [data-dismiss]', function() {
      $(this).closest('.popup').removeClass('show');
    });


    /**
     * Autoshow
     */
    $('.popup[data-autoshow]').each(function(){
      var popup = $(this),
          delay = parseInt( popup.dataAttr('autoshow') );
      setTimeout( function() { popupShow(popup) }, delay);
    });


    /**
     * Exit
     */
    $('.popup[data-exitshow]').each(function(){
      var popup  = $(this),
          delay  = parseInt( popup.dataAttr('delay', 0) ),
          target = popup.dataAttr('exitshow');

      if ( $(target).length ) {
        $(document).one('mouseleave', target, function() {
          setTimeout( function() { popupShow(popup) }, delay);
        });
      }

    });


    /**
     * Show
     */
    var popupShow = function(popup) {

      var autohide = parseInt( popup.dataAttr('autohide', 0) ),
          once_key = popup.dataAttr('once', '');

      // Check if it was a once popup
      if (once_key != '') {
        if (localStorage.getItem(once_key) == 'displayed') {
          return;
        }

        var once_btn = popup.find('[data-once-button="true"]');
        if (once_btn.length) {
          once_btn.on('click', function() {
            localStorage.setItem(once_key, 'displayed');
          });
        }
        else {
          localStorage.setItem(once_key, 'displayed');
        }
      }

      popup.addClass('show');
      setTimeout(function() { popup.find('input:text:visible:first').focus(); }, 300);

      if (autohide > 0) {
        setTimeout( function() { popup.removeClass('show') }, autohide);
      }
    }
  }

}(jQuery);


/***/ }),
/* 29 */
/***/ (function(module, exports) {


/**
 *
 */

+function($){

  page.initRecaptcha = function() {
    $('[data-provide~="recaptcha"]').each(function() {

      var options = {
        sitekey: page.defaults.reCaptchaSiteKey
      }

      options = $.extend(options, page.getDataOptions($(this)));

      if (options.enable) {
        options.callback = function() {
          $(options.enable).removeAttr('disabled');
        }

        options['expired-callback'] = function() {
          $(options.enable).attr('disabled', 'true');
        }
      }

      grecaptcha.render( $(this)[0], options);
    });
  }

  page.initRecaptcha3 = function() {
    grecaptcha.ready(function () {
      grecaptcha.execute(page.defaults.reCaptchaV3SiteKey, { action: 'contact' }).then(function (token) {
        $('[data-form="mailer"]').each(function(){
          $(this).prepend('<input type="hidden" name="g-recaptcha-v3-token" value="' + token + '">');
        });
      });
    });
  }



  window.recaptchaLoadCallback = function() {
    page.initRecaptcha();
  }

  window.recaptcha3LoadCallback = function() {
    page.initRecaptcha3();
  }


}(jQuery);



/***/ }),
/* 30 */
/***/ (function(module, exports) {


/**
 * All methods related to the page scroll and link click.
 */

+function($){

  var body = page.body,
      footer = page.footer,
      hasHeader = page.header.length,
      navbarHeight = page.navbar.outerHeight(),
      headerHeight = page.header.innerHeight(),
      scrollOffsetTop = 0,
      prevOffsetTop = 0;

  page.initScroll = function() {


    if ( $('[data-navbar="fixed"], [data-navbar="sticky"], [data-navbar="smart"]').length ) {
      scrollOffsetTop = navbarHeight;
    }

    $(document).on( 'click', "a[href='#']", function() {
      return false;
    });


    // Back to top
    //
    $(document).on('click', '.scroll-top', function() {
      smoothlyScrollTo(0);
      return false;
    });


    // Smooth scroll for anchors
    //
    $(document).on( 'click', "a[href^='#']", function() {
      if ( $(this).attr('href').length < 2 ) {
        return;
      }

      if ( $(this)[0].hasAttribute('data-toggle') ) {
        return;
      }

      var target = $( $(this).attr('href') );
      if ( target.length ) {
        var targetTop = target.offset().top,
            windowTop = $(window).scrollTop();

        // We don't need offsetTop for scroll down with smart navbar
        //
        if ( targetTop > windowTop && $('.navbar[data-navbar="smart"]').length ) {
          smoothlyScrollTo( targetTop );
        }
        else {
          smoothlyScrollTo( targetTop - scrollOffsetTop );
        }

        if (body.hasClass('navbar-open')) {
          page.navbarClose();
        }
        return false;
      }
    });


    // Smoothscroll to anchor in page load
    //
    var hash = location.hash.replace('#','');
    if ( hash != '' ) {
      var el = $("#"+hash);
      if (el.length > 0) {
        smoothlyScrollTo( el.offset().top - scrollOffsetTop );
      }
    }


    // Actions which are related to the page scroll position
    windowScrollActions();

    $(window).on('scroll', function() {
      windowScrollActions()
    });



    // In page navigation
    //
    if ( $('.nav-page').length ) {

      var tooltip_pos = 'left',
          tooltip_offset = '0, 12';

      if ( $('.nav-page.nav-page-left').length ) {
        tooltip_pos = 'right';
        tooltip_offset = '0, 12';
      }

      var spy_offset = parseInt( $('.nav-page').dataAttr('spy-offset', 200) );

      // Enable tooltip
      $('.nav-page .nav-link').tooltip({
        container: 'body',
        placement: tooltip_pos,
        offset: tooltip_offset,
        trigger: 'hover'
      });


      // Enable Scroll Spy
      $('body').scrollspy({
        target: '.nav-page',
        offset: spy_offset
      });

    }


    // Sticky sidebar width
    //
    $('.sidebar-sticky').each(function() {
      var tag = $(this),
          width = tag.closest('div').width();
      tag.css('width', width);

      if (body.width() / width < 1.8) {
        tag.addClass('is-mobile-wide');
      }
    });

  }


  var windowScrollActions = function() {
    var window_top = $(window).scrollTop();

    // .body-scrolled
    //
    if (window_top > 1) {
      body.addClass('body-scrolled');
    }
    else {
      body.removeClass('body-scrolled');
    }

    // .navbar-scrolled
    //

    if (window_top > navbarHeight) {
      body.addClass('navbar-scrolled');
    }
    else {
      body.removeClass('navbar-scrolled');
    }


    // .header-scrolled
    //
    if (window_top > headerHeight - navbarHeight - 1) {
      body.addClass('header-scrolled');
    }
    else {
      body.removeClass('header-scrolled');
    }

    // Sticky elements
    //
    $('[data-sticky="true"]').each(function() {
      var tag = $(this),
          top = tag.offset().top;

      if ( ! tag.hasDataAttr('original-top') ) {
        tag.attr('data-original-top', top);
      }

      var stick_start = tag.dataAttr('original-top'),
          stick_end   = footer.offset().top - tag.outerHeight();

      if (window_top > stick_start) {// && window_top <= stick_end) {
        tag.addClass('stick');
      }
      else {
        tag.removeClass('stick');
      }
    });

    // Smart navbar
    //
    $('[data-navbar="smart"]').each(function() {
      var tag = $(this);

      //toggleFixClass(tag);
      if (window_top < prevOffsetTop) {
        toggleStickClass(tag);
      }
      else {
        tag.removeClass('stick');
      }
    });

    // Sticky navbar
    //
    $('[data-navbar="sticky"]').each(function() {
      var tag = $(this);
      toggleStickClass(tag);
    });

    // Fixed navbar
    //
    $('[data-navbar="fixed"]').each(function() {
      var tag = $(this);
      if (body.hasClass('body-scrolled')) {
        tag.addClass('stick');
      }
      else {
        tag.removeClass('stick');
      }
    });

    // Sticky sidebar
    //
    $('.sidebar-sticky').each(function() {
      var tag = $(this);
      toggleStickClass(tag);
    });

    // Fadeout effect
    //
    $('.header.fadeout').css('opacity', (1-window_top-200 / window.innerHeight) );


    prevOffsetTop = window_top;
  }


  var smoothlyScrollTo = function(pos) {
    $('html, body').animate({scrollTop: pos}, 600);
  }


  var toggleFixClass = function(tag) {
    if (body.hasClass('navbar-scrolled')) {
      tag.addClass('fix');
    }
    else {
      tag.removeClass('fix');
    }
  }

  var toggleStickClass = function(tag) {
    var requiredClass = 'navbar-scrolled';
    if ( hasHeader ) {
      requiredClass = 'header-scrolled';
    }

    if (body.hasClass(requiredClass)) {
      tag.addClass('stick');
    }
    else {
      tag.removeClass('stick');
    }
  }

}(jQuery);


/***/ }),
/* 31 */
/***/ (function(module, exports) {


/**
 *
 */

+function($){

  page.initSection = function() {

  }

}(jQuery);



/***/ }),
/* 32 */
/***/ (function(module, exports) {


/**
 *
 */

+function($){

  page.initSidebar = function() {
    var body = page.body;

    $(document).on( 'click', '.sidebar-toggler, .sidebar-close, .backdrop-sidebar', function() {
      body.toggleClass( 'sidebar-open' );
      if ( body.hasClass('sidebar-open') ) {
        body.prepend('<div class="backdrop backdrop-sidebar"></div>')
      }
      else {
        $('.backdrop-sidebar').remove();
      }
    });

    // Sidebar nav
    //
    var navItemShow = $('.nav-sidebar .nav-item.show');
    navItemShow.find('> .nav-link .nav-angle').addClass('rotate');
    navItemShow.find('> .nav').css('display', 'block');
    navItemShow.removeClass('show');

    var navSidebarIsAccordion = false;
    if ( 'true' == $('.nav-sidebar').dataAttr('accordion', 'false') ) {
      navSidebarIsAccordion = true;
    }

    $(document).on( 'click', '.nav-sidebar > .nav-item > .nav-link', function() {
      var link = $(this);
      link.next('.nav').slideToggle();
      if ( navSidebarIsAccordion ) {
        link.closest('.nav-item').siblings('.nav-item').children('.nav:visible').slideUp().prev('.nav-link').children('.nav-angle').removeClass('rotate');
      }
      link.children('.nav-angle').toggleClass('rotate');
    });


    // Perfect scrollbar
    //
    $('.sidebar-body').each(function(e) {
      var ps = new PerfectScrollbar($(this)[0], {
        wheelSpeed: 0.4,
        minScrollbarLength: 20
      });
    })

  }

}(jQuery);



/***/ }),
/* 33 */
/***/ (function(module, exports) {


/**
 * All the video related methods.
 */

+function($){

  page.initVideo = function() {

    // Video-wrapper
    //
    $(document).on('click', '.video-wrapper .btn', function(){
      var wrapper = $(this).closest('.video-wrapper');
      wrapper.addClass('reveal');

      if ( wrapper.find('video').length )
        wrapper.find('video').get(0).play();

      if ( wrapper.find('iframe').length ) {
        var iframe = wrapper.find('iframe');
        var src = iframe.attr('src');

        if ( src.indexOf('?') > 0 )
          iframe.get(0).src += "&autoplay=1";
        else
          iframe.get(0).src += "?autoplay=1";
      }
    });


    // Object-fit polyfill
    //
    objectFitPolyfill( $('.bg-video') );

  }

}(jQuery);


/***/ }),
/* 34 */
/***/ (function(module, exports) {


/**
 * Utility functions to be used in the whole application.
 */

+function($){

  // Convert data-attributes options to Javascript object
  //
  page.getDataOptions = function(el, castList) {
    var options = {};

    $.each( $(el).data(), function(key, value){

      key = page.dataToOption(key);

      // Escape data-provide
      if ( key == 'provide' ) {
        return;
      }

      if ( castList != undefined ) {
        var type = castList[key];
        switch (type) {
          case 'bool':
            value = Boolean(value);
            break;

          case 'num':
            value = Number(value);
            break;

          case 'array':
            value = value.split(',');
            break;

          default:

        }
      }

      options[key] = value;
    });

    return options;
  }


  // Get target of an action from element.
  //
  // It can be 'data-target' or 'href' attribute.
  // We support 'next' and 'prev' values to target next or previous element. In this case, we return jQuery element.
  //
  page.getTarget = function(e) {
    var target;
    if ( e.hasDataAttr('target') ) {
      target = e.data('target');
    }
    else {
      target = e.attr('href');
    }

    if ( target == 'next' ) {
      target = $(e).next();
    }
    else if ( target == 'prev' ) {
      target = $(e).prev();
    }

    if ( target == undefined ) {
      return false;
    }

    return target;
  };





  // Get URL of an action from element.
  //
  // It can be 'data-url' or 'href' attribute.
  //
  page.getURL = function(e) {
    var url;
    if ( e.hasDataAttr('url') ) {
      url = e.data('url');
    }
    else {
      url = e.attr('href');
    }

    return url;
  };



  // Convert fooBarBaz to foo-bar-baz
  //
  page.optionToData = function(name) {
    return name.replace(/([A-Z])/g, "-$1").toLowerCase();
  }


  // Convert foo-bar-baz to fooBarBaz
  //
  page.dataToOption = function(name) {
    return name.replace(/-([a-z])/g, function(x){return x[1].toUpperCase();});
  }



}(jQuery);



/***/ })
/******/ ]);
//# sourceMappingURL=page.js.map