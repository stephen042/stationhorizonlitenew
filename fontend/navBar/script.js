document.getElementById("ModalnavMobile").style.display = "none";
$(document).ready(function(){
	// menu click event
	$('.menuBtn').click(function() {
		$(this).toggleClass('act');
			if($(this).hasClass('act')) {
				$('.mainMenu').addClass('act');
				document.getElementById("ModalnavMobile").style.display = "block";
			}
			else {
				$('.mainMenu').removeClass('act');
				document.getElementById("ModalnavMobile").style.display = "none";
			}
	});
});