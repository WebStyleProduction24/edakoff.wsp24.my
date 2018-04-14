$(function() {
	var pull 		= $('#pull');
	menu 		= $('nav ul');
	logo		= $('.logo');
	phone		= $('.phone');
	menuHeight	= menu.height();
	logoHeight	= logo.height();
	phoneHeight	= phone.height();

	$(pull).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
		logo.css('float', 'none');/**/
	});

	$(window).resize(function(){
		var w = $(window).width();
		if(w > 320 && menu.is(':hidden')) {
			menu.removeAttr('style');
		}
	});
});