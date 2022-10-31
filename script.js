$(document).ready(function(){
	$('.hamburger').click(function(){
		$(this).toggleClass('open');
		var catalogo = $('.catalogo')
		catalogo.toggleClass('open');
	});
});

document.querySelector(".items")
.addEventListener("wheel", event => {
	if(event.deltaY > 0) {
		event.target.scrollBy(300, 0)
	} else {
		event.target.scrollBy(-300, 0)
	}
})