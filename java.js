/* jshint strict: false */

//content margin top  
var contentMarginTopValue = 20;
// info panel height 
var infoHeight;
var navbarHeightMobile;
var navbarHeightDesktop;
var navbarHeightMediumLarge;

//Initial font-size of the html element 
function getRemFontSize() {
	var html = document.getElementsByTagName('html')[0];
	return parseInt(window.getComputedStyle(html).fontSize);
}

// check Medium view 
function isMobileWidth() {
	return $('#mobile-indicator').is(':visible');
}

function isMediumLargeWidth() {
	return $('#ml-indicator').is(':visible');
}

// set content margin top
function setContentMarginTop() {
	var contentMarginTop;
	if (isMobileWidth()) {
		navbarHeightMobile = document.getElementsByClassName("navbar-brand")[0].clientHeight;
		contentMarginTop = navbarHeightMobile + contentMarginTopValue + 'px';
	} else {

		if (isMediumLargeWidth()) {

			infoHeight = document.getElementById('navbarInfo').clientHeight;
			contentMarginTop = infoHeight + navbarHeightMediumLarge + contentMarginTopValue + 'px';


		} else {


			//			alert("DDD");

			infoHeight = document.getElementById('navbarInfo').clientHeight;
			contentMarginTop = infoHeight + navbarHeightDesktop + contentMarginTopValue + 'px';

		}


	}
	$('#page-main').css('top', contentMarginTop);
}
$(document).ready(function () {


	//	 alert($('.navbar-social-media .list-group-item img').css("top"));




	//set value from desktop view of 'navbar-nav .nav-item .nav-link'
	//2*margin-top + 2*padding-top + line-height
	//    navbarHeightDesktop = 7 * getRemFontSize();
	navbarHeightDesktop = 180;
	navbarHeightMediumLarge = 230;
	setContentMarginTop();
	$(window).resize(function () {
		setContentMarginTop();
	});
});

// add class 'in' to collapse menu from side
$(document).ready(function () {
	var sideslider = $('[data-toggle=collapse-side]');
	var sel = sideslider.attr('data-target');
	sideslider.click(function () {
		$(sel).toggleClass('in');
	});
});

// add trigger to navbar toggler icon
$(document).ready(function () {
	$('#navbar-toggler-icons').click(function () {
		$(this).toggleClass('open');
	});
});

// close navbar when click outside element
$(document).ready(function () {
	'use strict';
	$(document).mouseup(function (e) {
		if (isMobileWidth()) {
			var container = $("#navbarTop");
			var container1 = $("#navbar-toggler-icons");
			var container2 = $("#navbarContainer");
			var container3 = $(".navbar-toggler-info");
			var opened = $("#navbar-toggler-icons").hasClass("open");
			if (!container.is(e.target) && container.has(e.target).length === 0 && !container1.is(e.target) && container1.has(e.target).length === 0 && ((!container2.is(e.target) && container2.has(e.target).length === 0) || container3.has(e.target).length !== 0)) {
				if (opened) {
					$("a.navbar-toggler").click();
					$("#navbar-toggler-icons").removeClass("open");
				}
			}
		}
	});
});

// add animation class 'in' to collapse info 
$(document).ready(function () {
	var sideslider = $('[data-toggle=collapse-info]');
	var sel = sideslider.attr('data-target');
	sideslider.click(function () {
		$(sel).toggleClass('in');
	});
});

// add trigger to navabr toggler info 
$(document).ready(function () {
	$('#navbar-toggler-info-icons').click(function () {
		$(this).toggleClass('open');
	});
});

// close navbar info when click outside element
$(document).ready(function () {
	'use strict';
	$(document).mouseup(function (e) {
		if (isMobileWidth()) {
			var container = $("#navbarInfo");
			var container1 = $("#navbar-toggler-info-icons");
			var container2 = $("#navbarContainer");
			var container3 = $(".navbar-toggler");
			var opened = $("#navbar-toggler-info-icons").hasClass("open");
			if (!container.is(e.target) && container.has(e.target).length === 0 && !container1.is(e.target) && container1.has(e.target).length === 0 && ((!container2.is(e.target) && container2.has(e.target).length === 0) || container3.has(e.target).length !== 0)) {
				if (opened) {
					$("a.navbar-toggler-info").click();
					$("#navbar-toggler-info-icons").removeClass("open");
				}
			}
		}
	});
});

//change plus minus icon on dropdown
$(document).ready(function () {
	function toggleIcon(e) {
		$(e.target).parent().find(".icon-dropdown").toggleClass('fa-plus fa-minus');
	}
	$('.navbar-nav').on('hide.bs.collapse', toggleIcon);
	$('.navbar-nav').on('show.bs.collapse', toggleIcon);
});

// resize navbar when scrolling
$(document).ready(function () {
	var scrollTopValue;
	$(window).scroll(function () {
		if (isMobileWidth()) {
			scrollTopValue = 0;
		} else {
			if (isMediumLargeWidth()) {
				scrollTopValue = document.getElementById("navbarInfo").clientHeight + document.getElementById("navbarBrand").clientHeight + 16;
			} else {
				scrollTopValue = document.getElementById("navbarInfo").clientHeight;
			}
		}
		$('#navbarBrandMenu').removeClass('notransition');
		$('#navbarBrandMenu2').removeClass('notransition');
		if ($(window).scrollTop() > scrollTopValue) {
			$('.navbar-container').addClass('navbar-container-shadow-anim');
			$('#navbarBrandMenu').addClass('navbar-brand-fixed-scroll');
			$('#navbarBrandMenu2').addClass('navbar-brand-fixed-scroll2');
			$('.navbar-nav .dropdown-menu').addClass('dropdown-menu-fixed-scroll');
			$('.navbar-nav .download-btn').addClass('download-btn-fixed-scroll');
			$('.nav-link').addClass('nav-link-fixed-scroll');
			if (!isMobileWidth()) {
				$('.navbar-container').removeClass('navbar-container-shadow');
			} else {
				//				$('#navbarBrandMenu2').css('display', 'none');
			}
			$('.navbar-container').addClass('navbar-container-fixed-scroll');
			if (isMediumLargeWidth()) {
				$('#navbarBrand').addClass('navbarBrand-fix');
			}
		} else {
			$('.navbar-container').removeClass('navbar-container-fixed-scroll');
			if (isMediumLargeWidth()) {
				$('#navbarBrand').removeClass('navbarBrand-fix');
			}
			$('.navbar-container').removeClass('navbar-container-fixed-scroll');
			$('#navbarBrandMenu').removeClass('navbar-brand-fixed-scroll');
			$('#navbarBrandMenu2').removeClass('navbar-brand-fixed-scroll2');
			$('.navbar-nav .dropdown-menu').removeClass('dropdown-menu-fixed-scroll');
			$('.navbar-nav .download-btn').removeClass('download-btn-fixed-scroll');

			$('.nav-link').removeClass('nav-link-fixed-scroll');
		}
	});
});

// disbale aniamtion when resize
$(document).ready(function () {
	if (isMobileWidth()) {
		$('.navbar-container').addClass('navbar-container-shadow');
	}
	$(window).resize(function () {
		clearTimeout(window.resizedFinished);
		$('.navbar-container').removeClass('navbar-container-shadow-anim');
		$('.navbar-brand').addClass('notransition');
		if (isMobileWidth()) {
			$('.navbar-container').addClass('navbar-container-shadow');
			$(".nav-item").each(function () {
				if ($(this).find(".submenu").hasClass("show")) {
					$(this).find(".nav-link").addClass('active');
				}
			});
		} else {
			$(".nav-link").removeClass('active');
			infoHeight = document.getElementById('navbarInfo').clientHeight;
			if ($(window).scrollTop() > infoHeight) {} else {
				$('.navbar-container').removeClass('navbar-container-shadow');
			}
		}
		$('.navbar-nav .nav-item .nav-link').addClass('notransition');
		$('.navbar-nav .dropdown .submenu').addClass('notransition');
		$('.navbar-nav .dropdown .submenu .dropdown-item').addClass('notransition');
		$('.info-collapse').addClass('notransition');
		$('.side-collapse').addClass('notransition');
		if (isMediumLargeWidth()) {
			var scrollTopValue = document.getElementById("navbarInfo").clientHeight + document.getElementById("navbarBrand").clientHeight;
			if ($(window).scrollTop() >= scrollTopValue) {
				$('#navbarBrand').addClass('navbarBrand-fix');
			} else {
				$('#navbarBrand').removeClass('navbarBrand-fix');
			}
		}
		window.resizedFinished = setTimeout(function () {
			$('.navbar-nav .nav-item .nav-link').removeClass('notransition');
			$('.navbar-nav .dropdown .submenu').removeClass('notransition');
			$('.navbar-nav .dropdown .submenu .dropdown-item').removeClass('notransition');
			$('.info-collapse').removeClass('notransition');
			$('.side-collapse').removeClass('notransition');
		}, 100);
	});
});

// change navbar dropdown-collapse
function changeMenu() {
	var idValue;
	if (isMobileWidth()) {
		$(".navbar-nav .nav-item").each(function () {
			idValue = "#" + $(this).find(".submenu").attr("id");
			$(this).find(".submenu").removeClass("dropdown-menu").addClass("collapse");
			$(this).find(".nav-link").removeClass("dropdown-toggle");
			if (idValue !== "#undefined") {
				$(this).find(".nav-link").attr('data-target', idValue);
				$(this).find(".nav-link").attr('data-toggle', 'collapse');
			}
		});
	} else {
		$(".navbar-nav .nav-item").each(function () {
			idValue = "#" + $(this).find(".submenu").attr("id");
			if ($(this).find(".nav-link").attr("data-target")) {
				$(this).find(".submenu").removeClass("collapse").addClass("dropdown-menu");
				$(this).find(".nav-link").addClass("dropdown-toggle");
				if (idValue !== "#undefined") {
					$(this).find(".nav-link").attr('data-target', '#temp');
					//disable hide dropdown menu after click
					$(this).find(".nav-link").removeAttr('data-toggle');
				}
			}
		});
	}
}

// show dropdown on hover
$(document).ready(function () {
	// set link active  - accordion
	$(".navbar-nav").on("show.bs.collapse hide.bs.collapse", function (e) {
		if (e.type === 'show') {
			$(e.target).parent().find(".nav-link").addClass('active');
		} else {
			$(e.target).parent().find(".nav-link").removeClass('active');
		}
	});
	changeMenu();
	$(window).resize(function () {
		changeMenu();
	});
	//show dropdown menu on hover
	$('.navbar .dropdown').hover(function () {
		if (!$('.navbar-toggler').is(':visible')) {
			$(this).toggleClass('show', true);
			$(this).css("z-index", "90");
		}
	}, function () {
		if (!$('.navbar-toggler').is(':visible')) {
			$(this).toggleClass('show', false);
			$(this).css("z-index", "89");
		}
	});
});


// carousel basic
$(document).ready(function () {
	function initCarouselBasic() {
		$('.carousel-basic').each(function () {
			var controls = $(this).data("controls");
			var indicators = $(this).data("indicators");
			if (controls === "on-sides" || controls === undefined) {
				controls = "";
				$(this).find('.carousel-counter').css('display', 'none');
			} else if (controls === "hide") {
				$(this).find('.carousel-controls').css('display', 'none');
			} else {
				$(this).find('.carousel-control-prev').addClass(controls);
				$(this).find('.carousel-control-next').addClass(controls);
				$(this).find('.carousel-controls').addClass(controls);
			}
			if (indicators === "bottom-center" || controls === undefined) {
				indicators = "";
			} else if (indicators === "hide") {
				$(this).find('.carousel-indicators-container').css('display', 'none');
			} else {
				$(this).find('.carousel-indicators').addClass(indicators);
				$(this).find('.carousel-indicators-container').addClass(indicators);
			}
		});
	}
	initCarouselBasic();
});
$(document).ready(function () {
	$('.carousel-basic.class').carousel({
		interval: false
	});
	$('.carousel-basic.class').on("slide.bs.carousel", function (event) {
		$('body').find('.carousel-indicators2 li').eq(event.from).removeClass('active');
		$('body').find('.carousel-indicators2 li').eq(event.to).addClass('active');
	});
});

// video 
$(document).ready(function () {
	$('.video-thumbs li').each(function () {
		$(this).click(function () {
			var videoIFrame = '<iframe width=\"100%\" height=\"100%\" src="' + $(this).find('img').attr('data-video') + '?rel=0&autoplay=1" frameborder=\"0\" allowfullscreen></iframe>';
			$('body').find('.video-player').html(videoIFrame);
		});
	});
});

// ranking
$(document).ready(function () {
	$(".ranking .nav-tabs .dropdown-menu a").click(function (e) {
		e.preventDefault();
		var cssLink = "<span>" + $(this).text() + "</span><i class=\"fas fa-chevron-down\"></i>";
		var id = "#" + $(this).attr("data-value");
		$(".ranking .nav-tabs li>a").html(cssLink);
		for (var i = 0; i < $(".ranking .nav-tabs .dropdown-menu a").length; i++) {
			$(".ranking .values div").css("display", "none");
		}
		$(".ranking .values").find(id).css("display", "block");
	});
});

// table row clickable
$(document).ready(function () {
	$(".clickable-row").click(function () {
		window.location = $(this).data("href");
	});
});

// news
$(document).ready(function () {
	var newsHeading = $('body').find('.news-heading h5 .title').text();
	$("ul.news li a").click(function (e) {
		e.preventDefault();
		var index = $(this).parent().index() + 1;
		var news = ".news-" + index;
		var cssHeading = $(this).find('.title').text();
		$('body').find('.news-heading h5 .title').html(cssHeading);
		$('body').find('.news-back').css("display", "flex");
		$('body').find('.news-list').css("display", "none");
		$('body').find('.news-container ' + news).addClass("d-block");
	});
	$('body').find(".news-heading a").click(function (e) {
		e.preventDefault();
		$('body').find('.news-heading h5 .title').html(newsHeading);
		$('body').find('.news-back').css("display", "none");
		$('body').find('.news-list').css("display", "block");
		for (var i = 0; i < $('body').find("ul.news li").length; i++) {
			$('body').find('.news-container .news-' + (i + 1)).removeClass("d-block").addClass("d-none");
		}
	});
});



$(document).ready(function () {

$(function () {
  $('[data-toggle="tooltip"]').tooltip(
  
  {html: true}
  );
	
});
	
	});

$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });