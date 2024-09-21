
/*jQuery(window).load(function(){
	jQuery('#dvLoading').slideUp(1000);
});*/


jQuery(document).ready(function($){
	
	
	
	// Home Slider ==============
	$(".banner_slider").owlCarousel({
		navigation : false, 
		pagination: true,
		singleItem:true,
		autoPlay: 5000,
		addClassActive: true,
		transitionStyle : "fade",
  	});
	
	$('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
	
	// Clients Logo Carousel ==============
	$(".clnt_slide").owlCarousel({
		navigation : false, 
		pagination: false,
		autoPlay: 3000,
      	items : 5,
      	itemsDesktop : [1199,4],
      	itemsDesktopSmall : [979,3]
  	});
	
	// Clients Feedback Carousel ==============
	$(".c_fd_slide").owlCarousel({
		navigation : false, 
		pagination: true,
		autoPlay: 5000,
      	items : 3,
      	itemsDesktop : [1199,3],
      	itemsDesktopSmall : [979,2]
  	});
	
	
	
	
	// Parallax Background ==============
	/*$('section[data-type="parallax_section"]').each(function(){
	var $bgobj = $(this); 
	$(window).scroll(function() {
		$window = $(window);
		var yPos = -($window.scrollTop() / $bgobj.data('speed'));
		var coords = '50% '+ yPos + 'px';
		$bgobj.css({ backgroundPosition: coords });
	});
	});*/
	
	
	
	
	
	
	
	
	
	
	/*$(".bktotop").click(function() {
    	$("html, body").animate({scrollTop: 0}, 1000);
 	});*/
	
	

	
	
	/*var HBHeight = $(".hdr_btm").outerHeight();
	var HHeight = $("header.header").outerHeight();
	
  	$("#home_banner").owlCarousel({
		navigation : false, 
		pagination: false,
		singleItem:true,
		autoPlay: 5000,
		addClassActive: true,
		stopOnHover : true,
		paginationSpeed : 2000,
  	});
	  
	$(".most_popu_slide").owlCarousel({
		autoPlay: 4000,
		items : 4,
		stopOnHover : true,
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [979,3],
		pagination: false,
		navigation : true,
		navigationText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
	});
	  
	$('[data-toggle="tooltip"]').tooltip(); 
	
		
	$(".bktotop").click(function() {
    	$("html, body").animate({scrollTop: 0}, 1000);
 	});*/
	
	
});


/*wow = new WOW({
	animateClass: 'animated',
	offset		:  100,
});
wow.init();*/



