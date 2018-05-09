var $ = jQuery.noConflict();
var rearrangeFlag = true,
  s;
var box1 = ".menu-icon",
  drop1 = $('[data-bg-type="bg-light"]');
var box2 = ".fix-brands",
  drop2 = $('[data-bg-type="bg-light"]');
var box3 = ".interact-list",
  drop3 = $('[data-bg-type="bg-light"]');
var box4 = ".nav-list",
  drop4 = $('[data-bg-type="bg-light"]');
  var box5 = ".page-meta",
    drop5 = $('[data-bg-type="bg-light"]');
/*Overlap*/
(function ($) {
  $.fn.overlaps = function (obj) {
    var elems = {
      targets: [],
      hits: []
    };
    this.each(function () {
      if ($(obj).length) {
        var bounds = $(this).offset();
        bounds.right = bounds.left + $(this).outerWidth();
        bounds.bottom = bounds.top + $(this).outerHeight();
        var compare = $(obj).offset();
        compare.right = compare.left + $(obj).outerWidth();
        compare.bottom = compare.top + $(obj).outerHeight();
        if (!(
          compare.right < bounds.left ||
          compare.left > bounds.right ||
          compare.bottom < bounds.top ||
          compare.top > bounds.bottom
        )) {
          elems.targets.push(this);
          elems.hits.push(obj);
        }
      }
    });

    return elems;
  };
})(jQuery);
/*Overlap*/

/*Custom Menu*/
$.fn.customMenu = function () {
  var s = $(this);
  s.each(function (s, n) {
    $(n).find("> a").length > 0 && $(n).find("> a").siblings("ul").length > 0 && $(n).find("> a").append("<span class='arrow'></span>")
  }), s.find("span.arrow").click(function (s) {
    s.preventDefault();
    var n = $(this).closest("li").children(".sub-menu"),
      i = $(this).closest("li").siblings(),
      e = $(this).closest("li");
    n.length > 0 && (i.find(".sub-menu").stop().slideUp(), i.find(".sub-menu").each(function () {
      $(this).closest("li").find("> a span").removeClass("active")
    })), n.is(":visible") ? (n.slideUp(function () {}), e.find("> a span").removeClass("active")) : (n.find(".sub-menu").each(function () {
      $(this).stop().slideUp(function () {}), $(this).closest("li").find("> a span").removeClass("active")
    }), n.stop().slideDown(function () {}), e.find("> a span").addClass("active"))
  })
};
/*Custom Menu*/

var elem;

$(document).ready(function () {

  $("body").attr("ontouchstart", "");

  $(".has-content .inner-wrap > *").each(function () {
    if ($(this).css("display") == "table" || $(this).css("display") == "inline" || $(this).css("display") == "inline-block") {
      $(this).wrap("<div class='block-wrap'></div>")
    }
  });
  var collection = [];
  $('.block-wrap').each(function () {
    var nextBox = $(this).next().hasClass('block-wrap');
    collection.push($(this));
    if (!nextBox) {
      var container = $('<div class="inline-container"></div>');
      container.insertBefore(collection[0]);
      for (i = 0; i < collection.length; i++) {
        collection[i].appendTo(container);
      }
      collection = [];
    }
  })
  $(".block-wrap").children().unwrap();
  $(".dynamic-width").each(function () {
    $(this).addClass("count-width-wrap");
  });

  //Mobile Sticky Header
  stickyHeader();

  /*Initialize Menu Start*/
  $(".primary-menu li").each(function () {
    if ($(this).find(".sub-menu").length) {
      $(this).addClass("has-children");
    }
  });
  $(".primary-menu > li > a").addClass("firstLevel");
  $(".primary-menu li").customMenu();

  $(".arrow").click(function (e) {
    $(this).closest("a").blur();
  });

  $(".menu-icon").click(function () {
    $(this).toggleClass("active");
    $("body").toggleClass("menu-open");
    $(".arrow").removeClass("active");
    $(".sub-menu").hide();
  });
  /*Initialize Menu End*/

  /*Close menu on ESC*/
  $(document).keyup(function (e) {
    if (e.keyCode == 27 && $(".menu-icon").hasClass("active")) {
      $(".menu-icon").trigger("click");
    }
  });

  /*** Invert Color ***/
  var collides1 = drop1.overlaps(box1);
  $(box1)[collides1.hits.length ? "addClass" : "removeClass"]("over");
  drop1.removeClass("under");
  $(collides1.targets).addClass("under");

  var collides2 = drop2.overlaps(box2);
  $(box2)[collides2.hits.length ? "addClass" : "removeClass"]("over");
  drop2.removeClass("under");
  $(collides2.targets).addClass("under");

  var collides3 = drop3.overlaps(box3);
  $(box3)[collides3.hits.length ? "addClass" : "removeClass"]("over");
  drop3.removeClass("under");
  $(collides3.targets).addClass("under");
  
  var collides4 = drop4.overlaps(box4);
  $(box4)[collides4.hits.length ? "addClass" : "removeClass"]("over");
  drop4.removeClass("under");
  $(collides4.targets).addClass("under");
  
  var collides5 = drop5.overlaps(box5);
  $(box5)[collides5.hits.length ? "addClass" : "removeClass"]("over");
  drop5.removeClass("under");
  $(collides5.targets).addClass("under");
  /*** Invert Color ***/

  /* Scrol To Section */
  $('a[href*=\\#]:not([href=\\#])').click(function () {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
      if ($(this).closest(".nav-list").length) {
        $(".nav-list").find("a").not(this).closest("li").removeClass("active-num")
        $(this).closest("li").addClass("active-num");
      }

      var target_ = this.hash.substr(1);
      var left = $("." + target_).position().left;
      var total = $(".site-wrapper").width();
      var perc = left / (total - $(window).width()) * 100;

      var height = $("html").height();
      var final = (height - $(window).height()) / 100 * perc;

      if ($("." + target_).length) {
        if (window.innerWidth < 768) {
          $('html, body').animate({
            scrollTop: $("." + target_).offset().top - 50
          }, 1000);
          return false;
        } else {
          $('html, body').animate({
            scrollTop: final - 300 + 30
          }, 700);
          return false;
        }
      }
      $(this).blur();
    }
  });
  /* Scrol To Section */

  /* Team show info on click */
  $(".team-list--child a").click(function(e) {
    $(this).closest(".team-list--child").toggleClass("team-active");
    $(this).blur();
  });
  /* Team show info on click */

  if ($(".offirst").length) {
    $("body").addClass("no-first");
  }

});

$(window).bind("load", function () {
  $("body").addClass("loaded");
  // Calc total width of page and reinit JinvertScroll
  main_width();
  setTimeout(function () {
    main_width();
    $(".content-img--parent").addClass("animate");
    initHorScroll();
    onScroll();
    $(window).trigger("resize");
    if (window.location.hash) {
      var target_ = window.location.hash.substr(1);
      var left = $("." + target_).position().left;
      var total = $(".site-wrapper").width();
      var perc = left / (total - $(window).width()) * 100;

      var height = $("html").height();
      var final = (height - $(window).height()) / 100 * perc;

      if ($("." + target_).length) {
        if (window.innerWidth < 768) {
          $('html, body').animate({
            scrollTop: $("." + target_).offset().top - 50
          }, 1000);
          return false;
        } else {
          $('html, body').animate({
            scrollTop: final - 300 + 30
          }, 700);
          return false;
        }
      }
    }
  }, 501);

  // Convert SVG Images to SVG Code
  jQuery(".svg-convert").each(function () {
    var getImgWd = $(this).width();
    var getImgHt = $(this).height();
    var $img = jQuery(this);
    var imgID = $img.attr("id");
    var imgClass = $img.attr("class");
    var imgURL = $img.attr("src");
    jQuery.get(
      imgURL,
      function (data) {
        var $svg = jQuery(data).find("svg");
        if (typeof imgID !== "undefined") {
          $svg = $svg.attr("id", imgID);
        }
        if (typeof imgClass !== "undefined") {
          $svg = $svg.attr("class", imgClass + " svg-img");
        }
        $svg = $svg.removeAttr("xmlns:a");
        $img.replaceWith($svg);
      },
      "xml"
    );
  });

  elemRearrange();
  parallax();
  $(".interact-icon img").each(function() {
    var getActWidth = $(this).get(0).naturalWidth;
    $(this).width(getActWidth/2);
  });
});

$(window).resize(function () {
  // Calc total width of page and reinit JinvertScroll
  clearTimeout(window.resizedFinished);
  window.resizedFinished = setTimeout(function () {
    var currScroll = $(window).scrollTop();
    if (elem) {
      elem.destroy();
    }
    main_width();
    initHorScroll();
    onScroll();
    $(window).scrollTop(currScroll);

    $(this).one('scroll', function () {
      var currScroll = $(window).scrollTop();
      if (elem) {
        elem.destroy();
      }
      main_width();
      initHorScroll();
      onScroll();
      $(window).scrollTop(currScroll);
    });

  }, 701);
  // Disable horizontal scrolling on mobile
  if (window.innerWidth < 768) {
    if (elem) {
      elem.destroy();
    }
    $("body, .site-wrapper").attr("style", "");
  }
  elemRearrange();
  parallax();
  stickyHeader();
});
$(window).scroll(function () {
  onScroll();
  stickyHeader();
  parallax();

  /*** Invert Color ***/
  var collides1 = drop1.overlaps(box1);
  $(box1)[collides1.hits.length ? "addClass" : "removeClass"]("over");
  drop1.removeClass("under");
  $(collides1.targets).addClass("under");

  var collides2 = drop2.overlaps(box2);
  $(box2)[collides2.hits.length ? "addClass" : "removeClass"]("over");
  drop2.removeClass("under");
  $(collides2.targets).addClass("under");

  var collides3 = drop3.overlaps(box3);
  $(box3)[collides3.hits.length ? "addClass" : "removeClass"]("over");
  drop3.removeClass("under");
  $(collides3.targets).addClass("under");

  var collides4 = drop4.overlaps(box4);
  $(box4)[collides4.hits.length ? "addClass" : "removeClass"]("over");
  drop4.removeClass("under");
  $(collides4.targets).addClass("under");

  var collides5 = drop5.overlaps(box5);
  $(box5)[collides5.hits.length ? "addClass" : "removeClass"]("over");
  drop5.removeClass("under");
  $(collides5.targets).addClass("under");
  /*** Invert Color ***/
});

function main_width() {
  if (window.innerWidth > 767) {
    $(".has-content .inner-wrap > ul, .has-content .inner-wrap > ol").each(function () {
      $(this).css("width", "auto");
      var getWidth = ($(this).children(':last').offset().left + $(this).children(':last').outerWidth()) - $(this).offset().left;
      if ($(this).width() < getWidth) {
        $(this).css("width", getWidth);
      }
    });

    $(".has-content .inner-wrap, .auto-width--parent").each(function () {
      $(this).css("width", "auto");
      var getWidth1 = ($(this).children(':last').offset().left + $(this).children(':last').outerWidth()) - $(this).offset().left;
      if ($(this).width() < getWidth1) {
        $(this).css("width", getWidth1);
      }
    });
    var width = 0;
    $(".page-sec").each(function () {
      width += $(this).outerWidth(true);
    });
    width = Math.ceil(width);
    $(".site-wrapper").css("width", width + 1);
  }
}

function onScroll(event) {
  var scrollPosition = $(window).scrollTop()
  $('.nav-list li a').each(function() {
    var this_ = $(this);
    var currLink = this.hash.substr(1);
    try {
      var leftOffset = $("." + currLink).position().left - ($(window).width() / 2);
      var total = $('.site-wrapper').width();
      var perc = leftOffset / (total - window.innerWidth) * 100;
      var height = $('html').height();
      var final1 = ((height - $(window).height()) / 100 * perc);
      if (Math.ceil(final1) <= scrollPosition && scrollPosition < Math.ceil(final1) + $("." + currLink).width() * 2) {
        $('.nav-list li').removeClass("active-num");
        this_.closest("li").addClass("active-num");
      } else {
        this_.closest("li").removeClass("active-num");
      }
    } catch (err) {}
  });
}

function initHorScroll() {
  elem = $.jInvertScroll([".site-wrapper"], {
    width: "auto",
    height: "auto",
    onScroll: function (percent) {
      if (percent == 0) {
        $(".back-page").hide();
        $(".next-page").fadeIn();
      }
      if (percent == 1) {
        $(".next-page").hide();
        //$(".interact-list").fadeOut();
        $("body").addClass("scroll-end");
      }
      if (percent > 0 && percent < 1) {
        $(".next-page").hide();
        $("body").removeClass("scroll-end");
      }
    }
  });
  $("body").addClass("scrollHor");
}

function elemRearrange() {
  if (window.innerWidth < 768) {
    if (rearrangeFlag) {
      $(".fix-footer").appendTo(".intro-text");
      rearrangeFlag = false;
    }
  } else {
    if (!rearrangeFlag) {
      $(".fix-footer").insertAfter(".footer-main");
      rearrangeFlag = true;
    }
  }
}

function stickyHeader() {
  if ($(document).scrollTop() > $(".site-header").outerHeight() + 20) {
    $("body").addClass("sticky");
    setTimeout(function () {
      $("body").addClass("sticked");
    }, 600);
  } else {
    $("body").removeClass("sticked");
    $("body").removeClass("sticky");
  }
}

function parallax() {
  if ((".parallax").length) {
      var parallax1 = document.querySelectorAll(".parallax"),
              speed = 0.1;
      var windowXOffset = window.pageXOffset;
      [].slice.call(parallax1).forEach(function (el, i) {
          var abc = windowXOffset - jQuery(el).offset().left;
          var elBackgrounPos = -((abc * speed) / 2) + "px";
          el.style.backgroundPosition = elBackgrounPos;
      });
  }
}