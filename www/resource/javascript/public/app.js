$(function() {
	$("#side-nav").append($("#header nav").clone());
	$("#header .mobile").click(function() {
		$("#page-wrap").toggleClass("sidebar");
	});
	
	$("ul.assets.gallery1").mosaicflow({
		itemSelector: "> li",
		minItemWidth: 400
	});

	// swipebox
	$(".assets.gallery a").swipebox();
	
	$("a.swipebox-iframe").click(function(e) {
		e.preventDefault();
		$.swipebox([
     		{ href: $(this).data("iframe"), title: $(this).text() }
     	]);
	});
	
	
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
