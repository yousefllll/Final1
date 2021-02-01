/******************
 * Vinova Themes  Framework for Prestashop 1.7.x
 * @package    Nova - PrestaShop 1.7 Theme For Fashion Templates
 * @version    1.0
 * @author    http://vinovathemes.com/
 * @copyright  Copyright (C) October 2013 vinovathemes.com <@emai:vinovathemes@gmail.com>
 * <info@vinovathemes.com>.All rights reserved.
 * @license   GNU General Public License version 1
 * *****************/
(function($) {
    $.cookie = function(key, value, options) {
        if (arguments.length > 1 && (!/Object/.test(Object.prototype.toString.call(value)) || value === null || value === undefined)) {
            options = $.extend({}, options);
            if (value === null || value === undefined) {
                options.expires = -1
            }

            if (typeof options.expires === 'number') {
                var days = options.expires,
                    t = options.expires = new Date();
                t.setDate(t.getDate() + days)
            }
            value = String(value);
            return (document.cookie = [encodeURIComponent(key), '=', options.raw ? value : encodeURIComponent(value), options.expires ? '; expires=' + options.expires.toUTCString() : '', options.path ? '; path=' + options.path : '', options.domain ? '; domain=' + options.domain : '', options.secure ? '; secure' : ''].join(''))
        }
        options = value || {};
        var decode = options.raw ? function(s) {
            return s
        } : decodeURIComponent;
        var pairs = document.cookie.split('; ');
        for (var i = 0, pair; pair = pairs[i] && pairs[i].split('='); i++) {
            if (decode(pair[0]) === key) return decode(pair[1] || '')
        }
        return null
    }

})(jQuery);

//Var global Vinovathemes
if ((typeof novtheme) === 'undefined') { novtheme = {}; }
var novtheme_current_width = $(window).innerWidth();
var novtheme_min_width = 768;
var novtheme_min_width_ipad = 992;
var novtheme_responsive_mobile = novtheme_current_width < novtheme_min_width;
var novtheme_responsive_ipad = novtheme_current_width < novtheme_min_width_ipad;

function FullWidthRow() {
    var $elements = $('[data-nov-full-width="true"]');
    if($('body').hasClass('lang-rtl'))
        var rtl = true;
    else
        var rtl = false;
    $.each($elements, function(key, item) {
        var $el = $(this);
        var $el_full = $el.next(".nov_row-full-width");
        if ($el_full.length || ($el_full = $el.parent().next(".nov_row-full-width")), $el_full.length) {
            var el_margin_left = parseInt($el.css("margin-left"), 10),
                el_margin_right = parseInt($el.css("margin-right"), 10),
                offset = 0 - $el_full.offset().left - el_margin_left,
                width = $(window).width();
            if (rtl == true) {
                if ($el.css({
                        "position": "relative",
                        "right": offset + 15 + "px",
                        "box-sizing": "border-box",
                        "-webkit-box-flex": "0",
                        "-webkit-flex": "0 0 " + width + "px",
                        "-ms-flex": "0 0 " + width + "px",
                        "flex": "0 0 " + width + "px",
                        "max-width": width
                    }), !$el.data("nov-stretch-content")) {
                    var padding = -1 * offset;
                    0 > padding && (padding = 0);
                    var paddingRight = width - padding - $el_full.width() + el_margin_left + el_margin_right;
                    0 > paddingRight && (paddingRight = 0), $el.css({
                        "padding-right": padding + "px",
                        "padding-left": paddingRight + "px"
                    })
                }
            } else {
                if ($el.css({
                        "position": "relative",
                        "left": offset + 15 + "px",
                        "box-sizing": "border-box",
                        "-webkit-box-flex": "0",
                        "-webkit-flex": "0 0 " + width + "px",
                        "-ms-flex": "0 0 " + width + "px",
                        "flex": "0 0 " + width + "px",
                        "max-width": width
                    }), !$el.data("nov-stretch-content")) {
                    var padding = -1 * offset;
                    0 > padding && (padding = 0);
                    var paddingRight = width - padding - $el_full.width() + el_margin_left + el_margin_right;
                    0 > paddingRight && (paddingRight = 0), $el.css({
                        "padding-left": padding + "px",
                        "padding-right": paddingRight + "px"
                    })
                }
            }
        }
    })
}

function Nov_Instagram(){
    $(".boxInstagram").each(function (i) {
        if($('body').hasClass('lang-rtl'))
            rtl = true;
        else
            rtl = false;
        var Inslimit = $(this).data("limit"),
            InsaccessToken = $(this).data("accesstoken"),
            InsuserId = $(this).data("userid"),
            autoplay = $(this).data("autoplay"),
            autoplaytimeout = $(this).data("autoplaytimeout"),
            loop = $(this).data("loop"),
            dots = $(this).data("dots"),
            nav = $(this).data("nav"),
            margin = $(this).data("margin"),
            items = $(this).data("items"),
            items_mobile = $(this).data("items_mobile");
        var feed = new Instafeed({
            get: 'user',
            userId: InsuserId,
            accessToken: InsaccessToken,
            limit: Inslimit,
            sortBy: 'least-recent',
            resolution: 'standard_resolution',
            template: '<a href="{{link}}"><img class="img-fluid" src="{{image}}" alt="image-instagram"/></a>',
            before: function() {},
            after: function() {
                $('.boxInstagram').owlCarousel({
                    navText: [ '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ],
                    loop: loop,
                    margin: margin,
                    autoplay: autoplay,
                    dots: dots,
                    nav:nav,
                    items: items,
                    responsive: {
                        0 : {
                            items: items_mobile
                        },
                        768 : {
                            items: items
                        },
                        992 : {
                            items: items
                        },
                        1200 : {
                            items: items
                        }
                    }
                });
                $('.boxInstagram').addClass('owl-carousel');
            },
            success: function() {},
            error: function() {}
        });
        feed.run();

    });

    $(".boxInstagram-grid").each(function (i) {
        var Inslimit = $(this).data("limit"),
            InsaccessToken = $(this).data("accesstoken"),
            InsuserId = $(this).data("userid"),
            items = $(this).data("items"),
            items_mobile = $(this).data("items_mobile");
        var feed = new Instafeed({
            get: 'user',
            userId: InsuserId,
            accessToken: InsaccessToken,
            limit: Inslimit,
            sortBy: 'least-recent',
            resolution: 'standard_resolution',
            template: '<div class="col-sm-4 mb-10"><a href="{{link}}"><img class="img-fluid" src="{{image}}" alt="image-instagram"/></a></div>',
            before: function() {},
            after: function() {},
            success: function() {},
            error: function() {}
        });
        feed.run();
    });
}

//Owl-carousel 2
function Nov_Owlcarousel(){
    $(".owl-carousel").each(function (index) {
    	if($('body').hasClass('lang-rtl'))
    	    rtl = true;
    	else
    	    rtl = false;
    	var autoplay = $(this).data('autoplay');
    	var autoplayTimeout = $(this).data('autoplayTimeout');
    	var items = $(this).data('items') ? $(this).data('items') : 1;
        var margin = $(this).data('margin');
        var nav = $(this).data('nav');
        var dots = $(this).data('dots');
        var loop = $(this).data('loop');
        var items_large = $(this).data('items_large') ? $(this).data('items_large') : 1;
        var items_tablet = $(this).data('items_tablet') ? $(this).data('items_tablet') : 2;
        var items_mobile = $(this).data('items_mobile') ? $(this).data('items_mobile') : 1;
        var center = $(this).data('center') ? $(this).data('center') : false;
        var start = $(this).data('start') ? $(this).data('start') : 0;
    	$(this).owlCarousel({
            navText: [ '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ],
            lazyLoad         : true,
            lazyContent      : true,
            loop             : loop,
    		autoplay         : autoplay,
    		autoplayTimeout  : autoplayTimeout,
    		items            : items,
            margin           : margin,
    		rtl              : rtl,
            dots             : dots,
            nav              : nav,
            responsive       : {
                0 : {
                    items: 1,
                    center: center,
                    margin: 0
                },
                545: {
                    items: items_mobile,
                    center: center,
                    margin: margin
                },
                768 : {
                    items: items_tablet,
                    margin: margin
                },
                992 : {
                    items: items_large,
                    margin: margin
                },
                1200 : {
                    items: items,
                    center: center,
                    startPosition: start,
                    margin: margin
                },
            }
    	});
        checkClasses(this);
        $(this).on('translated.owl.carousel', function(event) {
            checkClasses(this);
        });
    });

}

function checkClasses(class_parent){
    if($('body').hasClass('lang-rtl'))
        rtl = true;
    else
        rtl = false;
    var total = $('.owl-stage .owl-item.active',class_parent).length;
    $('.owl-stage .owl-item',class_parent).removeClass('firstActiveItem lastActiveItem');

    $('.owl-stage .owl-item.active',class_parent).each(function(index){
        if (index === 0 && rtl=== false) {
            // this is the first one
            $(this).addClass('firstActiveItem');
        }else if (index === 0 && rtl=== true){
            $(this).addClass('lastActiveItem');
        }
        if (index === total - 1 && total>1 && rtl=== false) {
            // this is the last one
            $(this).addClass('lastActiveItem');
        }else if (index === total - 1 && total>1 && rtl=== true){
            $(this).addClass('firstActiveItem');
        }
    });
}

//Thumnail Slick Product Deal
function Thumnailslider_Deal(){
    $('.productlist_deal .thumbnail').each(function (index) {
        var asNavFor_nav = $('.thumnailslider-for', this).data('asnavfornav');
        if($('body').hasClass('lang-rtl'))
            var rtl = true;
        else
            var rtl = false;
        $('.thumnailslider-for', this).slick({
          rtl: rtl,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          dots: false,
          fade: false,
          loop: false,
          arrows: false,
          asNavFor: asNavFor_nav
        });
        var autoplay = $('.thumnailslider-nav', this).data('autoplay');
        var autoplayTimeout = $('.thumnailslider-nav', this).data('autoplayTimeout');
        var items = $('.thumnailslider-nav', this).data('items');
        var items_mobile = $('.thumnailslider-nav', this).data('items_mobile');
        var margin = $('.thumnailslider-nav', this).data('margin');
        var nav = $('.thumnailslider-nav', this).data('nav');
        var dots = $('.thumnailslider-nav', this).data('dots');
        var loop = $('.thumnailslider-nav', this).data('loop');
        var vertical = $('.thumnailslider-nav', this).data('vertical');
        var position = $('.thumnailslider-nav', this).find('.selected').data('position-image');
        var asNavFor_for = $('.thumnailslider-nav', this).data('asnavforfor');
        $('.thumnailslider-nav', this).slick({
            slidesToShow: items,
            slidesToScroll: 1,
            asNavFor: asNavFor_for,
            centerMode: false,
            loop: false,
            focusOnSelect: true,
            vertical: true,
            dots: false,
            arrows: false,
            responsive: [
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: items_mobile,
                    vertical: false,

                  }
                }
            ]
        });

    })
}

//Owl with Slick
function Thumnail_Product() {
    $('.js-qv-mask .slick-images').each(function (index) {
        if($('body').hasClass('lang-rtl'))
            rtl = true;
        else
            rtl = false;
        var autoplay = $(this).data('autoplay');
        var autoplayTimeout = $(this).data('autoplayTimeout');
        var items = $(this).data('items');
        var items_mobile = $(this).data('items_mobile');
        var margin = $(this).data('margin');
        var dots = $(this).data('dots');
        var loop = $(this).data('loop');
        var vertical = $(this).data('vertical');
        var position = $(this).find('.selected').data('position-image');
        $(this).slick({
            rtl: rtl,
            vertical: vertical,
            slidesToShow: items,
            slidesToScroll: 1,
            arrows: true,
            dots: dots,
            responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    dots: dots,
                    vertical: false,
                    arrows: true,
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    vertical: false,
                    arrows: true,
                    dots: false,
                    slidesToShow: items_mobile,
                    slidesToScroll: 1,
                  }
                }
            ]
        });
    })
}

//Image With Slick
function Slick_Image_Slider(){
    $('.slick-images-slider').each(function (index) {
        var autoplay = $(this).data('autoplay');
        var autoplayTimeout = $(this).data('autoplayTimeout');
        var items = $(this).data('items');
        var items_mobile = $(this).data('items_mobile');
        var margin = $(this).data('margin');
        var nav = $(this).data('nav');
        var dots = $(this).data('dots');
        var loop = $(this).data('loop');
        var vertical = $(this).data('vertical');
        var position = $(this).find('.selected').data('position-image');
        $(this).slick({
            vertical: vertical,
            slidesToShow: items,
            slidesToScroll: 1,
            dots: dots,
            initialSlide: 1,
            responsive: [
                {
                  breakpoint: 1441,
                  settings: {
                    dots: dots,
                  }
                },
                {
                  breakpoint: 1024,
                  settings: {
                    dots: dots,
                  }
                },
                {
                  breakpoint: 767,
                  settings: {
                    dots: dots,
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                  }
                }
            ]
        });
    })
}

function _event_single_image(){
    var $element = $(".main-productdetail");
    var _data = $element.data();
    if(_data.product_layout_thumb == "zoom"){
        _zoomSingleImage(_data);
    }

    if(_data.product_layout_thumb == "scroll"){
        $('.img-thumbnail a').swipebox();
    }

    if(_data.product_layout_thumb == "list_thumb" || _data.product_layout_thumb == "list2_thumb"){
        _sticky_kit();
        /*$('.img-thumbnail a').swipebox();
        $('.variations_form').on('wc_variation_form show_variation reset_image', function() {
            $(window).scrollTop( 300 );
        });*/
    }
}

//When hover Cat in desktop
$('#_desktop_cart').hover(function() {
    $('.cart_block').addClass('hover-active');
}, function() {
    $('.cart_block').removeClass('hover-active');
});

function _sticky_kit(){
    $('#box-info').stick_in_parent({
        parent: '.main-productdetail',
        offset_top: 30
    });
}

novtheme.swapChildren = function(obj1, obj2) {
    var temp = obj2.children().detach();
    obj2.empty().append(obj1.children().detach());
    obj1.append(temp);
}

novtheme.toggleMobileStyles = function()
{
    if (novtheme_responsive_mobile) {
        $("*[id^='_desktop_']").each(function(idx, el) {
            var target = $('#' + el.id.replace('_desktop_', '_mobile_'));
            if (target.length) {
                novtheme.swapChildren($(el), target);
            }
        });
    } else {
        $("*[id^='_mobile_']").each(function(idx, el) {
            var target = $('#' + el.id.replace('_mobile_', '_desktop_'));
            if (target.length) {
                novtheme.swapChildren($(el), target);
            }
        });
    }
}

novtheme.toggleSticky = function(action) {
    if (action == true) {
        $("*[class^='contentsticky_']").each(function(idx, el) {
            var target = $('.' + el.classList['0'].replace('contentsticky_', 'contentstickynew_'));
            if (target.length) {
                novtheme.swapChildren($(el), target);
            }
        });
    } else {
        $("*[class^='contentstickynew_']").each(function(idx, el) {
            var target = $('.' + el.classList['0'].replace('contentstickynew_', 'contentsticky_'));
            if (target.length) {
                novtheme.swapChildren($(el), target);
            }
        });
    }
}

novtheme.NovatoggleMobileStylesCart = function()
{
    if (novtheme_responsive_mobile) {
        $('#_mobile_cart').each(function(idx, el) {
            var target = $('#_mobile_cart_bottom');
            if (target) {
                target.append($('#_mobile_cart').html());
                $('.header-cart a').removeClass('d-flex');
            }
        });
    } else {
        $('#_mobile_cart_bottom').each(function(idx, el) {
            var target = $('#_mobile_cart');
            if (target) {
                $('#_mobile_cart_bottom').children().detach();
                $('.header-cart a').addClass('d-flex');
            }
        });
    }
}

function switchVerticalIpad() {
    if (novtheme_responsive_ipad) {
        $("#_desktop_verticalmenu").each(function(idx, el) {
            var target = $('#_mobile_cart_bottom');
            if (target) {
                target.append($('#_mobile_cart').html());
                $('.header-cart a').removeClass('d-flex');
            }
        });
    } else {
        $("#_mobile_cart_bottom").each(function(idx, el) {
            var target = $('#_mobile_cart');
            if (target) {
                $("#_mobile_cart_bottom").children().detach();
                $('.header-cart a').addClass('d-flex');
            }
        });
    }
}

//Toggle menu left
function resetCanvas(){
    $('body').removeClass('open_nov_mobile_menu');
    $('body').removeClass('open_nov_vertical_menu');
    $('body').removeClass('canvasmenu-left');
    $('.canvas-menu').removeClass('canvas-active');
    $('.nov-menu .toggle-nav').removeClass('act');
    $('#mobile_top_menu_wrapper').removeClass('active');
    return false;
};
var l = $('.canvas-menu'),
    c = $('.nov-menu .toggle-nav'),
    u = $('.canvas-overlay'),
    b = $('body');

c.click(function() {
    l.hasClass('canvas-active') ? ( l.removeClass('canvas-active'), u.removeClass('act'), c.removeClass('act'), b.removeClass('canvasmenu-left') ) : ( l.addClass('canvas-active'), u.addClass('act'), c.addClass('act'), b.addClass('canvasmenu-left') );
});
u.on("click", function() {
    resetCanvas();//return false;
});

//Megamenu
if($("body").attr("id")=="index") {
	this_hompage = 1;
} else {
	this_hompage = 0;
}

var this_url = window.location;
this_url = String(this_url);
this_url = this_url.replace("https://","").replace("http://","").replace("www.","").replace( /#\w*/, "" );

var this_link = "{/literal}{$current_link}{literal}";
this_link = this_link.replace("https://","").replace("http://","").replace("www.","").replace( /#\w*/, "" );

//Canvas Mainmenu
$('#_mobile_mainmenu').click(function() {
    $('body').hasClass('open_nov_mobile_menu') ? ( $('body').removeClass('open_nov_mobile_menu') ) : ( $('body').addClass('open_nov_mobile_menu') );
    $('#mobile_top_menu_wrapper').hasClass('active') ? ( $('#mobile_top_menu_wrapper').removeClass('active') ) : ( $('#mobile_top_menu_wrapper').addClass('active') )
});
$(".nov-megamenu > ul > li > a").each(function() {
    url_menu = $(this).attr("href").replace("https://","").replace("http://","").replace("www.","").replace( /#\w*/, "" );
	if( (this_url == url_menu) || (this_url.replace(this_link,"") == url_menu) || this_hompage){
		$(this).parent().addClass("active");
        return false;
	}
});
$(".category-sub-menu > li > a").each(function() {
    url_menu = $(this).attr("href").replace("https://","").replace("http://","").replace("www.","").replace( /#\w*/, "" );
    if( (this_url == url_menu) || (this_url.replace(this_link,"") == url_menu) || this_hompage){
        $(this).parent().addClass("active");
        return false;
    }
});

function Novshowmap(){
    $('.btn-viewmap').on("click", function(e) {
        $('.has-description').hasClass('active') ? ( $('.has-description').removeClass('active') ) : ( $('.has-description').addClass('active') );
        e.stopPropagation();
    });
    $(document).on('click', function(event) {
        if ($(event.target).is('#nov-map div') == false)   {
            $('.has-description').removeClass("active");
        }
    });
}

function NovToggleMenu(){
    $('.menu-icon').on("click", function(e) {
        $('#_desktop_top_menu').slideToggle('slow');
        $('#_desktop_top_menu').hasClass('active') ? ( $('#_desktop_top_menu').removeClass('active') ) : ( $('#_desktop_top_menu').addClass('active') );
        $('.header-menu').hasClass('active') ? ( $('.header-menu').removeClass('active') ) : ( $('.header-menu').addClass('active') );
        e.stopPropagation();
    });
}

function NovTogglePage() {
    $('.nov-toggle-page').on('click', function(e){
        var target = $(this).data('target');
        $('body').hasClass('show-boxpage') ? ( $('body').removeClass('show-boxpage') ) : ( $('body').addClass('show-boxpage') );
        $(target).hasClass('active') ? ( $(target).removeClass('active') ) : ( $(target).addClass('active') );
        e.stopPropagation();
    });
    $('.box-header .close-box').on('click', function(e) {
        $('body').removeClass('show-boxpage');
        $(this).parents('.mobile-boxpage').removeClass('active');
        $('#mobile-pageaccount').find('.box-content').removeClass('active');
        e.stopPropagation();
    });
    $('.links-currency, .links-language').on('click', function(e) {
        var target_link = $(this).data('target'),
            title_box = $(this).data('titlebox');

        $('#mobile-pageaccount').find('.box-content').removeClass('active');
        $('.title-box','#mobile-pageaccount').html(title_box);
        $('.back-box','#mobile-pageaccount').addClass('active');
        $(target_link).hasClass('active') ? ( $(target_link).removeClass('active') ) : ( $(target_link).addClass('active') );
        e.stopPropagation();
    });
    $('.back-box','#mobile-pageaccount').on('click', function(e) {
        var titlebox_parent = $('#mobile-pageaccount').data('titlebox-parent');
        $('#mobile-pageaccount').find('.box-content').removeClass('active');
        $('.title-box','#mobile-pageaccount').html(titlebox_parent);
        $(this).removeClass('active');
    })
}

function NovHeightBoxContent() {
    var height = $( window ).outerHeight(),
        boxheight = $('.box-header').outerHeight(),
        menubottom = $('#stickymenu_bottom_mobile').outerHeight();
    $('.box-content','.mobile-boxpage').each(function(){
        $(this).outerHeight(height - boxheight - menubottom);
    });
}

//Vertical menu
function NovVerticalToggle() {
    $('.verticalmenu-main .toggle-nav').on('click', function(e) {
        if($('.verticalmenu-content').hasClass('show') ){
          ($('.verticalmenu-content').removeClass('show'));
        } else {
            $('.verticalmenu-content').hasClass('active') ? ( $('.verticalmenu-content').removeClass('active'), $(this).removeClass('act') ) : ( $('.verticalmenu-content').addClass('active'), $(this).addClass('act') );
        }

        e.stopPropagation();
    });
    $(document).on('click', function(vl) {
        if ($(vl.target).is('.verticalmenu-content')== true) {
            $('.verticalmenu-content').removeClass('active');
            $('.verticalmenu-main .toggle-nav').removeClass('act');
        }
    });
    if($(window).width() < 992) {
        $('.verticalmenu-content').each(function(){
            if($('.verticalmenu-content').hasClass('show') ){
              ($('.verticalmenu-content').removeClass('show'));
            }
        });
    }
}

//Vertical menu on mobile
function NovVerticalToggleMobile() {
    $(document).on('click', function(vl) {
        if ($(vl.target).is('.verticalmenu-content')==  true) {
            $('.verticalmenu-content').removeClass('active');
            $('.verticalmenu .toggle-nav').removeClass('act');
        }
    });
}

function SetPositionTopSubmenu() {
    if($(window).width() > 1199) {
        var i = 0;
        $('.menu > .item','#verticalmenu').each(function(){
            i = i + 1;
            if($(this).hasClass('group')) {
                if (i != 2){
                    var position = -(72*(i-1) - 1);
                }else{
                  var position = -(73*(i-1));
                }

                $(this).find('.dropdown-menu').css('top',position);
            }
        });
    }else if( $(window).width() > 991 || $(window).width() < 1200){
        var i = 0;
        $('.menu > .item','#verticalmenu').each(function(){
            i = i + 1;
            if($(this).hasClass('group')) {
                    var position = -(65*(i-1) - 1);
                $(this).find('.dropdown-menu').css('top',position);
            }
        });
    }
}

function NovHeightVertical() {
    if($(window).width() > 980) {
        var h = $('#nivoSlider').innerHeight();
        $('#_desktop_verticalmenu','.displayhomenovone').innerHeight(h);
    }
}

//_mobile_infos
function NovMobileToggle() {
    if($(document).width() < 1600){
        $('#_mobile_infos .nav-info').on('click', function(e) {
            $('#_mobile_infos').hasClass('active') ? ( $('#_mobile_infos').removeClass('active'), $(this).removeClass('act') ) : ( $('#_mobile_infos').addClass('active'), $(this).addClass('act') );
            e.stopPropagation();
        });
        $(document).on('click', function(vl) {
            if ($(vl.target).is('#_mobile_infos')==false) {
                $('#_mobile_infos').removeClass('active');
            }
        });
    }
}

function NovAdvanceSearch(){
    $('.advencesearch_header .toggle-search').on("click", function(e) {
        $(this).parent().find("#_desktop_search_content").addClass("active-search");
        e.stopPropagation();
    });
    $(document).on('click', function(event) {
        if ( $(event.target).is('#_desktop_search_content input') == false){
            $('#_desktop_search_content').removeClass("active-search");
        }
    });
}

function NovSearchToggle() {
    $('#search_widget .toggle-search').on("click", function(e) {
        $(this).parent("#search_widget").addClass("active-search");
        $('.header-menu-search').addClass("active-content-search");
        e.stopPropagation();
    });
    $(document).on('click', function(event) {
        if ( $(event.target).is('#_desktop_search input') == false ) {
            $('#search_widget').removeClass("active-search");
            $('.header-menu-search').removeClass("active-content-search");
        }
    });
    $('#_mobile_search .nav-search').on("click", function(f) {
        $(this).parent("#_mobile_search").addClass("active-search");
        f.stopPropagation();
    });
    $(document).on('click', function(event) {
        if ( $(event.target).is('#searchbox input') == false ) {
            $('#_mobile_search').removeClass("active-search");
        }
    });
}

function NovToggleSearch() {
    $('.js-btn-search').on('click', function(e){
        var target = $(this).data('target');
        $('body').hasClass('show-boxpage') ? ( $('body').removeClass('show-boxpage') ) : ( $('body').addClass('show-boxpage') );
        $('#nov-searchBox').hasClass('active') ? ( $('#nov-searchBox').removeClass('active')  ) : ( $('#nov-searchBox').addClass('active'), $('#nov-searchBox').find('input[type="text"]').focus() );
        e.stopPropagation();
    });
    $('.nov-seachBoxClose').on('click', function(e) {
        $('body').removeClass('show-boxpage');
        $('#nov-searchBox').removeClass('active');
        e.stopPropagation();
    });
}

function NovToggleAction() {
    $(document).on('click', '.nov-toggle-btn', function(e) {
        var toggle = $(this).data('toggle');
        $(this).toggleClass('act');
        $(this).parent().toggleClass('active');
        $('.canvas-overlay').addClass('act');
        e.stopPropagation();
    });
    $(document).on('click', function(f) {
        if ($(f.target).is('.nov_sideward') == false) {
            $('.nov-toggle').removeClass('active');
            $('.nov-toggle .nov-toggle-btn').removeClass('act');
            $('.canvas-overlay').removeClass('act');
        }
        if ($(f.target).is('.nov-toggle .nov-toggle-btn') == true) {
            $('.nov-toggle').removeClass('active');
            $('.nov-toggle .nov-toggle-btn').removeClass('act');
            $('.canvas-overlay').removeClass('act');
        }
    });
}

function NovFilter (){
    $('.toggle-filter').on('click', function() {
        $('.content-header-filter').hasClass('active') ? ( $('.content-header-filter').removeClass('active')  ) : ( $('.content-header-filter').addClass('active'));
    });
}


if ($(document).width() < 768) {
    megamenu_rep();
}
$(window).resize(function() {
    if($(window).width() < 768) {
       megamenu_rep();
    }
});

function megamenu_rep() {
    $('#megamenu .menu li').each(function() {
        if($(this).hasClass('has-sub') || $(this).hasClass('group')) {
            if ($(this).children("a").length > 0 || $(this).children('.menu-title').length > 0) {
                if($(this).children('.nov-menu-toggle').length == 0) {
                    $(this).children('.dropdown-menu').css('display', 'none');
                }
            }
            else {
                $(this).children('.dropdown-menu').css('display', 'block');
            }
        }
    });
}

function ScrollFacet() {
    $('.facet').each(function (i) {
        if( $(this).find('li').length > 5 ) {
            $(this).addClass('facet-hasscroll');
        }
    })
}

//FlipBack Menu
function FlipBackMenu() {
    var width_window = $(window).width();
    $('#megamenu .level1 > li').each(function(){
        var total_width_sub = $('#megamenu .level1 > li > .dropdown-menu').outerWidth();
        var position = $(this).offset().left;
        var check = width_window - position;
        if (total_width_sub > check) {
            $(this).addClass('flipback');
        }
    });
}

//Item Map
function GoogleMapItem() {
    $('.btn-showmap').click(function() {
        var store_latitude = $('#nov-map').data('store_latitude'),
            store_longitude = $('#nov-map').data('longitude'),
            zoom = $('#nov-map').data('zoom'),
            height = $('#nov-map').data('height');
        if($('.toggle-map').hasClass('closed')){
            $('.toggle-map').removeClass('closed');
            $('#nov-map').height(height);
        } else {
            $('.toggle-map').addClass('closed');
            $('#nov-map').height(0);
        }
    });
}

//Sticky Menu
function StickyHeader(flag_sticky) {
    if($('#header').hasClass('sticky-menu')) {
        if (flag_sticky == true) {
            var time;
            var height = $('#header').height();
            var flag = true;
            $(window).scroll(function(){
                if (time) clearTimeout(time);
                time = setTimeout(function(){
                    if ($(window).scrollTop() >= height) {
                        if (flag == true) {
                            $('#header').css('height',height);
                            $('#header-sticky').addClass('sticky-menu-active');
                            novtheme.toggleSticky(true);
                            flag = false;
                        }
                    } else {
                        if(flag == false) {
                            $('#header').css('height',height);
                            $('#header-sticky').removeClass('sticky-menu-active');
                            novtheme.toggleSticky(false);
                            flag = true;
                        }
                    }
                }, 100);
            });
        }
    }
}

//Vertical-Canvas
function NovVertical_Canvas(){
    if($(window).width() < 992){
        $('.verticalmenu-main .toggle-nav').click(function() {
            $('body').hasClass('open_nov_vertical_menu') ? ( $('body').removeClass('open_nov_vertical_menu') ) : ( $('body').addClass('open_nov_vertical_menu') );
        });
        $(document).on('click', function(vl) {
            if ($(vl.target).is('.verticalmenu-content')== false) {
                $('.verticalmenu-main .toggle-nav').removeClass('act');
                $('.verticalmenu-content').removeClass('active');
            }
        });
    }
}
//MoreverticalMenu
function _moreverticalMenu(){
    if($('.verticalmenu-content').hasClass('has-showmore') && $(window).width() > 991) {
        var textshowmore = $('.verticalmenu-main').data('textshowmore'),
            textless = $('.verticalmenu-main').data('textless'),
            count_showmore = $('.nov-verticalmenu').data('count_showmore'),
            desktop_item = $('.verticalmenu-main').data('desktop_item');
            var windowsize = $(window).width();
        $('ul.menu').each(function(){
            var LiN = $(this).find('>li').length;
            if( LiN > count_showmore){
                if(windowsize > 1199 ){
                    var hide_count = count_showmore-1;
                } else {
                    var hide_count = desktop_item;
                }
                $('>li', this).eq(hide_count).nextAll('li.item').hide().addClass('toggleable');
                if ($(this).find('.more').length < 1) {
                    $(this).append('<li class="more extra">'+ textshowmore +'</li>');
                }
            }
        });
        $('ul.menu').on('click','.more', function(){
          if( $(this).hasClass('less') ){
            $(this).text(textshowmore).removeClass('less');
            $('li.toggleable', '#verticalmenu').slideUp();
          } else {
            $(this).text(textless).addClass('less');
            $('li.toggleable', '#verticalmenu').slideDown();
          }
        });
    } else {
        $('.verticalmenu-content li.more').remove();
        $('.verticalmenu-content li.toggleable').each(function(){
            $(this).css('display','block').removeClass('toggleable');
        })
    }
}

//Go to top
function goToTop() {
    var timer;
    $(window).scroll(function() {
        if ( timer ) clearTimeout(timer)
        timer = setTimeout(function(){
            if ($(window).scrollTop() >= 200) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
            }
        }, 300);

    });
    $("#back-top").click(function(){
        $("body,html").animate({scrollTop:0 },"normal");
        return!1
    });
}

//Popup newsletter
function PopupNewletter() {
    var date = new Date();
    var minutes = 60;
    date.setTime(date.getTime() + (minutes * 60 * 1000));

    if ($.cookie('popupNewLetterStatus') != 'closed' && $('body').outerWidth() > 768) {
        $("#popup-subscribe").modal({
            show: !0
        });
    }
    $.cookie("popupNewLetterStatus", "closed", {
        'expires': date,
        'path': '/'
    })
    $('input.no-view').change(function() {
        if ($('input.no-view').prop("checked") == 1) {
            $.cookie("popupNewLetterStatus", "closed", {
                'expires': date,
                'path': '/'
            })
        } else {
            $.cookie("popupNewLetterStatus", "", {
                'expires': date,
                'path': '/'
            })
        }
    })
}
function PopupNewletter_msg() {
    $('#msg_newsletter').modal({
        show: !0
    })
}

novtheme.GoogleMapEventSroll = function() {
    //Google map lock
    $(".map-locker").click(function() {
        $(this).css('display','none');
    });
    $("#nov-map-contact").on( "mouseleave", function() {
        $(".map-locker").css('display','block');
    });
}

novtheme.DisplayTypeCategory = function() {
    $('.change-type .grid-type').click(function(e) {
        e.preventDefault();
        $('#categories-product .products').removeClass('list').addClass('grid');
        $('.change-type').find('.grid-type').addClass('active');
        $('.change-type').find('.list-type').removeClass('active');
        $('#categories-product .products .product-miniature').each(function(index, element) {
            html_group_action = '';
            $(element).removeClass('row');
            $('.thumbnail-container', element).append(html_group_action).removeClass('col-md-4 col-sm-4');
            $('.thumbnail-container', element).removeClass('col-md-4 col-sm-4');
            $('.thumbnail-container .product-info', element).removeClass('hidden-sm-up');
            $('.product-description', element).removeClass('col-md-8 col-sm-8');
            $('.product-description .product-buttons', element).addClass('justify-content-center');
        });
        $.cookie('nov_grid_list', 'grid', {
            expires: 1,
            path: '/'
        })
    });

    $('.change-type .list-type').click(function(e) {
        e.preventDefault();
        $('#categories-product .products').removeClass('grid').addClass('list');
        $('.change-type').find('.grid-type').removeClass('active');
        $('.change-type').find('.list-type').addClass('active');
        $('#categories-product .products .product-miniature').each(function(index, element) {
            html_product_desc = '';
            $(element).addClass('row');
            $('.product-description .product-buttons', element).before(html_product_desc);
            $('.thumbnail-container', element).addClass('col-md-4 col-sm-4');
            $('.thumbnail-container .product-info', element).addClass('hidden-sm-up');
            $('.product-description', element).addClass('col-md-8 col-sm-8');
            $('.product-description .product-groups', element).removeClass('d-flex');
            $('.product-description .product-buttons', element).removeClass('justify-content-center');
        });
        $.cookie('nov_grid_list', 'list', {
            expires: 1,
            path: '/'
        })
    })
}

novtheme.CountDown = function() {
    $('.countdownfree').each(function(e){
        var time_count = $(this).data('date');
        $(this).countdown(time_count, function(event) {
          var $this = $(this).html(event.strftime(''
            + '<div class="item-time"><span class="name-time">Days</span><span class="data-time">%D</span></div>'
            + '<div class="item-time"><span class="name-time">Hours</span><span class="data-time">%H</span></div>'
            + '<div class="item-time"><span class="name-time">Mins</span><span class="data-time">%M</span></div>'
            + '<div class="item-time"><span class="name-time">Secs</span><span class="data-time">%S</span></div>'
            ));
        });
    });
}

novtheme.SliderShow = function() {
    if($("#nov-slider").length) {
        var effect = $('#nov-slider').data('effect');
        var slices = $('#nov-slider').data('slices');
        var animSpeed = $('#nov-slider').data('animspeed');
        var pauseTime = $('#nov-slider').data('pausetime');
        var startSlide = $('#nov-slider').data('startslide');
        var directionNav = $('#nov-slider').data('directionnav');
        var controlNav = $('#nov-slider').data('controlnav');
        var controlNavThumbs = $('#nov-slider').data('controlnavthumbs');
        var pauseOnHover = $('#nov-slider').data('pauseonhover');
        var manualAdvance = $('#nov-slider').data('manualadvance');
        var randomStart = $('#nov-slider').data('randomstart');
        $(window).load(function() {
            $('.nivoSlider','#nov-slider').nivoSlider({
                effect: effect, // Specify sets like: 'fold,fade,sliceDown'
                slices: slices, // For slice animations
                boxCols: 12, // For box animations
                boxRows: 6, // For box animations
                animSpeed: animSpeed, // Slide transition speed
                pauseTime:  pauseTime, // How long each slide will show
                startSlide:  startSlide, // Set starting Slide (0 index)
                directionNav: directionNav, // Next & Prev navigation
                controlNav: controlNav, // 1,2,3... navigation
                controlNavThumbs: controlNavThumbs, // Use thumbnails for Control Nav
                pauseOnHover: pauseOnHover, // Stop animation while hovering
                manualAdvance: manualAdvance, // Force manual transitions
                prevText: '<i class="fa fa-angle-left" aria-hidden="true"></i>', // Prev directionNav text
                nextText: '<i class="fa fa-angle-right" aria-hidden="true"></i>', // Next directionNav text
                randomStart: randomStart, // Start on a random slide
                beforeChange: function(){

                }, // Triggers before a slide transition
                afterChange: function(){

                }, // Triggers after a slide transition
                slideshowEnd: function(){

                }, // Triggers after all slides have been shown
                lastSlide: function(){

                }, // Triggers when last slide is shown
                afterLoad: function(){
                    $(".nov_preload").hide();
                } // Triggers when slider has loaded
            });
        });
    }
}

$(window).on('load', function() {
    var timer = window.setTimeout(PopupNewletter_msg,500);
    if ($("#popup-subscribe").length) {
        $(window).load(function(){
            var timer = window.setTimeout(PopupNewletter,5000);
        });
    }
})

var flag_sticky = false;
$(window).on('resize', function() {
    var _cw = novtheme_current_width;
    var _mw = novtheme_min_width;
    var _w = window.innerWidth;
    var _toggle = (_cw >= _mw && _w < _mw) || (_cw < _mw && _w >= _mw);
    novtheme_current_width = _w;
    novtheme_responsive_mobile = novtheme_current_width < novtheme_min_width;
    if (novtheme_current_width <= 768) {
        if (flag_sticky == true) {
            novtheme.toggleSticky(false);
            $('#header-sticky').removeClass('sticky-menu-active');
        }
    } else {
        //novtheme.toggleSticky(true);
    }
    if (_toggle) {
        novtheme.toggleMobileStyles();
        novtheme.NovatoggleMobileStylesCart();
    }
    FullWidthRow();
    NovVertical_Canvas();
    _moreverticalMenu();
    SetPositionTopSubmenu();
    NovMobileToggle();
    NovTogglePage();
    Novshowmap();
    NovHeightBoxContent();
    NovSearchToggle();
    NovToggleSearch();
    FlipBackMenu();
    if($('.main-productdetail').length){
        _event_single_image();
    }
});

$(document).ready(function() {
    if (novtheme_responsive_mobile) {
        novtheme.toggleMobileStyles();
        novtheme.NovatoggleMobileStylesCart();
    }
    //enable tooltip everywhere
    $('[data-toggle="tooltip"]').tooltip();
    FullWidthRow();
    Nov_Owlcarousel();
    novtheme.CountDown();
    novtheme.SliderShow();
    novtheme.DisplayTypeCategory();
    novtheme.GoogleMapEventSroll();
    NovAdvanceSearch();
    Slick_Image_Slider();
    Thumnailslider_Deal();
    NovFilter();
    Nov_Instagram();
    NovSearchToggle();
    SetPositionTopSubmenu();
    NovVerticalToggle();
    NovToggleAction();
    NovToggleMenu();
    NovTogglePage();
    NovVerticalToggleMobile();
    NovVertical_Canvas();
    _moreverticalMenu();
    ScrollFacet();
    GoogleMapItem();
    Thumnail_Product();
    goToTop();
    if (novtheme_current_width > 768) {
        StickyHeader(true);
        flag_sticky = true;
    }
    $('.category-sub-menu li').each(function (index) {
        if ($(this).hasClass('active')) {
            $('.collapse',$(this)).first().collapse("show");
            $(this).parent().collapse("show");
            $(this).parent().parent().collapse("show");
        }
    })

    $("#nov-verticalmenu li").first().children('.dropdown-menu').slideDown(300);
    $("#nov-verticalmenu li").first().children('.block_content').slideDown(300);
    $("#nov-verticalmenu li").first().addClass('menu-active');

    $(".show-sub").click( function() {
        var $this = $(this);
        if ($this.parent().hasClass('menu-active')) {
            $this.parent().removeClass('menu-active');
            $this.parent().find('.dropdown-menu').first().slideUp(300);
        } else {
            $this.parent().parent().find('li').removeClass('menu-active');
            $this.parent().parent().find('li .dropdown-menu, li .block_content').slideUp(300);
            $this.parent().addClass('menu-active');
            $this.parent().find('.dropdown-menu').first().slideDown(300);
        }
        return false;
    });

    $('.opener').click( function(){
        if($(this).parent('li').hasClass('menu-active')){
            $(this).parent('li').children('.dropdown-menu').slideUp(300);
            $(this).parent('li').removeClass('menu-active');
        }
        else {
            $(this).parent('li').children('.dropdown-menu').slideDown(300);
            $(this).parent('li').addClass('menu-active');
        }
    });
});
