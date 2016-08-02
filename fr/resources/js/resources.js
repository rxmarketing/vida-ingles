$(document).ready(function() {
	$('a[href^="#"]').on('click', function(e) {
		e.preventDefault();
		var target = this.hash;
		var $target = $(target);
		$('html, body').animate({
			'scrollTop':$target.offset().top
		}, 1000, "swing");
	});
	//	$(window).scroll(function(){
	//		if($(this).scrollTop() !=0) {
	//			$('#top').fadeIn();
	//			} else {
	//			$('#top').fadeOut();
	//		}
	//	});
	//	$('#top').click(function() {
	//		$('body, html').animate({
	//			scrollTop:0
	//		}, 500);
	//	});
	//	
	//	$("#main-nav").on("activate.bs.scrollspy", function() {
	//		var selectedMenu = $(".nav li.active > a").text();
	//		$("#selectedMenu").html("You're in <b>"+ selectedMenu + "</b> section.");
	//	});
});