(function($) {
	$(function() {
		var ht = $(window).height() - ($('#headerContainer').height() + $('#menuContainer').height() + $('#footerContainer').height());
		if (ht > 30) $('#mainContainer').css('min-height', ht+'px');
	});
	$(window).load(function() {
    $('.flexslider').flexslider({
      animation: "slide"
    });
  });
})(jQuery);