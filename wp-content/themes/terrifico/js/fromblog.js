var owl=jQuery.noConflict();
owl(document).ready(function() {
	owl("#owl-wrap").owlCarousel({
    	autoPlay: 6000,
        items : 2,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],
		pagination: true,
		paginationNumbers: true
	
	});
});