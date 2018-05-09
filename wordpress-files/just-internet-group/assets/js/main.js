var $ = jQuery.noConflict();
var rearrangeFlag = true;

/*Parallax*/
!function(r){"use strict";"object"==typeof module&&"object"==typeof module.exports?module.exports=r(require("jquery")):r(jQuery)}(function($){"use strict";var r={bgVertical:function(r,t){return r.css({"background-position":"center "+-t+"px"})},bgHorizontal:function(r,t){return r.css({"background-position":-t+"px center"})},vertical:function(r,t,o){return"none"===o?o="":!0,r.css({"-webkit-transform":"translateY("+t+"px)"+o,"-moz-transform":"translateY("+t+"px)"+o,transform:"translateY("+t+"px)"+o,transition:"transform linear","will-change":"transform"})},horizontal:function(r,t,o){return"none"===o?o="":!0,r.css({"-webkit-transform":"translateX("+t+"px)"+o,"-moz-transform":"translateX("+t+"px)"+o,transform:"translateX("+t+"px)"+o,transition:"transform linear","will-change":"transform"})}};$.fn.paroller=function(t){var o=$(window).height(),n=$(document).height(),t=$.extend({factor:0,type:"background",direction:"vertical"},t);return this.each(function(){var a=!1,e=$(this),i=e.offset().top,c=e.outerHeight(),l=e.data("paroller-factor"),s=e.data("paroller-type"),u=e.data("paroller-direction"),f=l?l:t.factor,d=s?s:t.type,h=u?u:t.direction,p=Math.round(i*f),g=Math.round((i-o/2+c)*f),m=e.css("transform");"background"==d?"vertical"==h?r.bgVertical(e,p):"horizontal"==h&&r.bgHorizontal(e,p):"foreground"==d&&("vertical"==h?r.vertical(e,g,m):"horizontal"==h&&r.horizontal(e,g,m));var b=function(){a=!1};$(window).on("scroll",function(){if(!a){var t=$(this).scrollTop();n=$(document).height(),p=Math.round((i-t)*f),g=Math.round((i-o/2+c-t)*f),"background"==d?"vertical"==h?r.bgVertical(e,p):"horizontal"==h&&r.bgHorizontal(e,p):"foreground"==d&&n>=t&&("vertical"==h?r.vertical(e,g,m):"horizontal"==h&&r.horizontal(e,g,m)),window.requestAnimationFrame(b),a=!0}}).trigger("scroll")})}});
/*Parallax*/

/*Visible*/
!function(t){var i=t(window);t.fn.visible=function(t,e,o){if(!(this.length<1)){var r=this.length>1?this.eq(0):this,n=r.get(0),f=i.width(),h=i.height(),o=o?o:"both",l=e===!0?n.offsetWidth*n.offsetHeight:!0;if("function"==typeof n.getBoundingClientRect){var g=n.getBoundingClientRect(),u=g.top>=0&&g.top<h,s=g.bottom>0&&g.bottom<=h,c=g.left>=0&&g.left<f,a=g.right>0&&g.right<=f,v=t?u||s:u&&s,b=t?c||a:c&&a;if("both"===o)return l&&v&&b;if("vertical"===o)return l&&v;if("horizontal"===o)return l&&b}else{var d=i.scrollTop(),p=d+h,w=i.scrollLeft(),m=w+f,y=r.offset(),z=y.top,B=z+r.height(),C=y.left,R=C+r.width(),j=t===!0?B:z,q=t===!0?z:B,H=t===!0?R:C,L=t===!0?C:R;if("both"===o)return!!l&&p>=q&&j>=d&&m>=L&&H>=w;if("vertical"===o)return!!l&&p>=q&&j>=d;if("horizontal"===o)return!!l&&m>=L&&H>=w}}}}(jQuery);
/*Visible*/

/*Custom Menu*/
$.fn.customMenu = function () {
	var n = $(this);
	n.each(function (n, s) {
		$(s).find("> a").length > 0 && $(s).find("> a").siblings("ul").length > 0 && $(s).find("> a").append("<span class='arrow'></span>")
	}), n.find("span.arrow").click(function (n) {
		n.preventDefault();
		var s = $(this).closest("li").children(".sub-menu"),
			i = $(this).closest("li").siblings(),
			e = $(this).closest("li");
		s.length > 0 && (i.find(".sub-menu").stop().slideUp(), i.find(".sub-menu").each(function () {
			$(this).closest("li").find("> a span").removeClass("active")
		})), s.is(":visible") ? (s.slideUp(function () {}), e.find("> a span").removeClass("active")) : (s.find(".sub-menu").each(function () {
			$(this).stop().slideUp(function () {}), $(this).closest("li").find("> a span").removeClass("active")
		}), s.stop().slideDown(function () {}), e.find("> a span").addClass("active"))
	})
};
/*Custom Menu*/

var elem;

$(document).ready(function () {
	$("body").attr("ontouchstart", "");
	if ($(".light-bg.intro-sec").length) {
		$("body").addClass("start-light");
	}

	$(".primary-menu > li > a").addClass("firstLevel");
	$(".primary-menu li").customMenu();
	
	$(".arrow").click(function(e) {
		$(this).closest("a").blur();
	});

	$(".menu-icon").click(function () {
		$(this).toggleClass("active");
		$("body").toggleClass("menu-open");
		$(".arrow").removeClass("active");
		$(".sub-menu").hide();
	});

	$(".culture-list").closest(".inner-wrap").width($(".culture-list").width());
	//$(".dynamic-width--parent").closest(".common-sec-txt").width($(".dynamic-width--parent").width());

	$(".next-page").click(function () {
		var left = $(".page-active").next(".page-sec").position().left;
		var total = $('.site-wrapper').width();
		var perc = left / (total - $(window).width()) * 100;

		var height = $('html').height();
		var final = ((height - $(window).height()) / 100 * perc);

		if (window.innerWidth < 1367) {
			$('html, body').animate({
				scrollTop: final - 300 + 30
			}, 800);
		} else {
			$('html, body').animate({
				scrollTop: final - 380 + 30
			}, 800);
		}

		$(this).fadeOut();
	});
	
	$("[data-bg-type='bg-light']").each(function() {
		var isVisible = $(this).visible( true );
		console.log(isVisible)
		if(isVisible) {
		   console.log(651)
		}
	});
});

$(window).bind("load", function() {
	main_width();
	setTimeout(function () {
		main_width();
		initHorScroll();
		onScroll();
	}, 501);
	setTimeout(function () {
		$(".next-page").fadeIn();
	}, 1000);

	jQuery('.svg-convert').each(function () {
		var getImgWd = $(this).width();
		var getImgHt = $(this).height();
		var $img = jQuery(this);
		var imgID = $img.attr('id');
		var imgClass = $img.attr('class');
		var imgURL = $img.attr('src');
		jQuery.get(imgURL, function (data) {
			//console.log(jQuery(data).find('svg'))
			var $svg = jQuery(data).find('svg');
			if (typeof imgID !== 'undefined') {
				$svg = $svg.attr('id', imgID);
			}
			if (typeof imgClass !== 'undefined') {
				$svg = $svg.attr('class', imgClass + ' svg-img');
			}
			$svg = $svg.removeAttr('xmlns:a');
			/*$svg.attr("width", getImgWd);
			$svg.attr("height", getImgHt);*/
			$img.replaceWith($svg);
		}, 'xml');
	});
	parallax();
	elemRearrange();
	addToAnimateClass();
});

$(window).resize(function () {

	clearTimeout(window.resizedFinished);
	window.resizedFinished = setTimeout(function () {

		var currScroll = $(window).scrollTop();
		elem.destroy();
		main_width();
		initHorScroll();
		onScroll();
		$(window).scrollTop(currScroll);

	}, 501);
	if (window.innerWidth < 768) {
		elem.destroy();
		$("body, .site-wrapper").attr("style", "");
	}
	parallax();
	elemRearrange();
});
$(window).scroll(function () {
	onScroll();
	parallax();
	addToAnimateClass();
	/*$("[data-bg-type='bg-light']").each(function() {
		var isVisible = $(this).visible( true );
		console.log(isVisible)
		if(isVisible) {
			$("body").addClass("invert")
		} else {
			$("body").removeClass("invert")
		}
	});*/
	
	var count = $("[data-bg-type]").length;
	var isVisible;
	for (i = 1; i <= count; i++) {
		isVisible=isVisible+i; 
		console.log(isVisible)
		isVisible = $("[data-bg-type='bg-light-"+i+"']").visible( true );
		if(isVisible) {
			$("body").addClass("invert")
		} else {
			$("body").removeClass("invert")
		}
		
		/*$('#horizontalTab' + i).easyResponsiveTabs({
			type: 'default',
			width: 'auto',
			fit: true,
			css3animation: 'animated fadeInLeft',
			removeHashfrmUrl: true,
			closed: 'accordion',
			activate: function (event) {}
		});*/
	}
	
	/*var isVisible = $("[data-bg-type='bg-light']").visible( true );
	if(isVisible) {
		$("body").addClass("invert")
	} else {
		$("body").removeClass("invert")
	}*/
	/*$("[data-bg-type='bg-light']").each(function() {
		var isVisible = $(this).visible( true );
		console.log(isVisible)
		if(isVisible) {
			$("body").addClass("invert")
		} else {
			$("body").removeClass("invert")
		}
	});*/
	//bgType();
});

function main_width() {
	if (window.innerWidth > 767) {
		$(".culture-list").closest(".inner-wrap").width($(".culture-list").width());
		$(".dynamic-overlap").each(function () {
			var getWidth = $(this).find(".auto-width--parent").width();
			$(this).find(".inner-wrap").width(getWidth);
		});
		var width = 0;
		$('.page-sec').each(function () {
			width += $(this).outerWidth(true);
		});
		width = Math.ceil(width);
		$('.site-wrapper').css('width', width);
	}
}

function onScroll(event) {
	var scrollPosition = $(window).scrollTop()
	$('.page-sec').each(function () {
		var this_ = $(this);
		try {
			var leftOffset = this_.position().left;
			var total = $('.site-wrapper').width();
			var perc = leftOffset / (total - window.innerWidth) * 100;
			var height = $('html').height();
			var final1 = ((height - $(window).height()) / 100 * perc) - 380;
			if (Math.ceil(final1) <= scrollPosition && scrollPosition < Math.ceil(final1) + this_.width() * 2) {
				$('.page-sec').removeClass("page-active");
				this_.addClass("page-active");
			} else {
				this_.removeClass("page-active");
			}
		} catch (err) {}
	});
}

function initHorScroll() {
	elem = $.jInvertScroll(['.site-wrapper'], {
		width: 'auto',
		height: 'auto',
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
/*$(function () {
	$(".parallax").paroller({
		factor: '0.08',
		type: 'foreground',
		direction: 'horizontal'
	});
});*/


function parallax() {
    /*if ((".bg-img").length) {
        var parallax1 = document.querySelectorAll(".bg-img"),
                speed = 0.1;
        var windowXOffset = window.pageXOffset;
        [].slice.call(parallax1).forEach(function (el, i) {
            var abc = windowXOffset - jQuery(el).offset().left;
            var elBackgrounPos = -((abc * speed) / 2) + "px";
            el.style.backgroundPosition = elBackgrounPos;
        });
    }*/
}

$.fn.isOnScreen = function () {

	var win = $(window);

	var viewport = {
		top: win.scrollTop(),
		left: win.scrollLeft()
	};
	viewport.right = viewport.left + win.width();
	viewport.bottom = viewport.top + win.height();
	var bounds = this.offset();
	if (bounds != undefined) {
		bounds.right = bounds.left + this.outerWidth();
		bounds.bottom = bounds.top + this.outerHeight();

		return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
	}
};

function addToAnimateClass() {
	/*$("[data-bg-type='bg-light']").each(function () {
		if ($(this).isOnScreen()) {
			$("body").addClass("visible_div");
		} else {
			$("body").removeClass("visible_div");
		}
	});*/
}

function elemRearrange() {
	if (window.innerWidth < 768) {
		if (rearrangeFlag) {
			console.log(767);
			$(".fix-footer").appendTo(".intro-text");
			rearrangeFlag = false;
		}
	} else {
		if (!rearrangeFlag) {
			console.log(768);
			$(".fix-footer").insertAfter(".footer-main");
			rearrangeFlag = true;
		}
	}
}