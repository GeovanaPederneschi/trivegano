$(document).ready(function(){
	$('.hamburger').click(function(){
		$(this).toggleClass('open');
		var catalogo = $('.catalogo')
		catalogo.toggleClass('open');
	});
});
