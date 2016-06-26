// menu
$(function(){
	$("#toggle a").click(function(){
    if($(".toggle-icon").hasClass('close')){
    	$(".toggle-icon").removeClass('close');
    	$(".toggle-text").removeClass('close');
    	$(".header-nav, .toggle-overlay").fadeOut();
    }else{
    	$(".toggle-icon").addClass('close');
    	$(".toggle-text").addClass('close');
    	$(".header-nav, .toggle-overlay").fadeIn();
		}
	});
});

//menu pc
$(window).on('load resize', function(){
    var w = $(window).width();

    var x = 768;
    if (w <= x) {
	    $(".toggle-overlay").click(function(){
    		$(".toggle-icon").addClass('close');
    		$(".header-nav, .toggle-overlay").fadeOut();
				$(".toggle-icon").removeClass('close');
			});
    }
});

//nav
$(function() {
	$('.header-nav__item__link').each(function(){
		$(this).removeClass("active");
		function GetFileName(file_url) {
			file_url = file_url.substring(file_url.lastIndexOf("/") + 1, file_url.length)
			return file_url;
		}
		var file_name = GetFileName(location.href);
		if($(this).attr("href") == file_name || $(this).attr("href") == "./" + file_name) {
			$(this).addClass("active");
		}
	});
});

$(function() {
	// switch img
	var $setElem = $('.switch'),
	pcName = '_pc',
	spName = '_sp',
	replaceWidth = 768;

	$setElem.each(function(){
		var $this = $(this);
		function imgSize(){
			var windowWidth = parseInt($(window).width());
			if(windowWidth >= replaceWidth) {
				$this.attr('src',$this.attr('src').replace(spName,pcName)).css({visibility:'visible'});
			} else if(windowWidth < replaceWidth) {
				$this.attr('src',$this.attr('src').replace(pcName,spName)).css({visibility:'visible'});
			}
		}
		$(window).resize(function(){imgSize();});
		imgSize();
	});
});
/* -----------------------------------------
 jquery.smoothscroll.js
*/
(function(jQuery) {
	jQuery.fn.smoothScroll = function() {
		return this.each(function() {
			jQuery(this).click(function() {
				if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') &&
					location.hostname == this.hostname) {
					var $target = jQuery(this.hash);
					$target = $target.length && $target || $('[name="' + this.hash.slice(1) +'"]');
					if ($target.length) {
						var targetOffset = $target.offset().top;
						jQuery('html,body').animate({ scrollTop: targetOffset }, 500, 'swing');
						return false;
					}
				}
			});
		});
	};
})(jQuery);

jQuery(function(){
	jQuery('a[href^="#"]').smoothScroll();
});
