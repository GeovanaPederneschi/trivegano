$(document).ready(function(){
	$('.hamburger').click(function(){
		$(this).toggleClass('open');
		var catalogo = $('.catalogo')
		catalogo.toggleClass('open');
		$('header').toggleClass('fixed');
	});
});


window.onload=function(){
	
	document.querySelector(".items")
	/* Adding an event listener to the `.items` class. The event listener is listening for a wheel event.
	When the wheel event is triggered, it will check if the scroll is going up or down. If it is going
	up, it will scroll up by 300px. If it is going down, it will scroll down by 300px. */
	.addEventListener("wheel", event => {
		/* Checking if the scroll is going up or down. If it is going up, it will scroll up by 300px. If it
		is going down, it will scroll down by 300px. */
		if(event.deltaY > 0) {
			//console.log(event.deltaY)
			event.target.scrollBy(300,0)
			
		} else {
			event.target.scrollBy(-300,0)
		}
	})
};

