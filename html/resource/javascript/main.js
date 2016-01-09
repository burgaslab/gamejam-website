$(function() {
	$("#side-nav").append($("#header nav").clone());
	$("#header .mobile").click(function() {
		$("#page-wrap").toggleClass("sidebar");
	});
	
	$("ul.assets.gallery").mosaicflow({
		itemSelector: "> li",
		minItemWidth: 250
	});

	// swipebox
	$(".assets.gallery a").swipebox();
});
