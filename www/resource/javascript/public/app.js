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
	
	$("form.validate").formValidator();

	FlipClock.Lang.Bulgarian = {
		"years"   : "Години",
		"months"  : "Месеци",
		"days"    : "Дни",
		"hours"   : "Часа",
		"minutes" : "Минути",
		"seconds" : "Секунди"
	};
	FlipClock.Lang["bg"] = FlipClock.Lang.Bulgarian;
	
	var clockEl = $("#countdown div"); 
	var clock = clockEl.FlipClock({
	    clockFace: "DailyCounter",
	    countdown: true,
	    language: "bg"
	});
	clock.setTime(clockEl.data("time"));
	clock.start();
});
