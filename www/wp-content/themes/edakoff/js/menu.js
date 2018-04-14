$(function() {
	var pull 		= $('#pull');
	menu 		= $('nav ul');
	logo		= $('.logo');
	logoFloat	= logo.css('float');
	menuHeight	= menu.height();

	$(pull).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
		logo.toggleClass('logo-none');
	});

	

	$(window).resize(function(){
		var w = $(window).width();
		if(w > 320 && menu.is(':hidden')) {
			menu.removeAttr('style');
		}
	});
});