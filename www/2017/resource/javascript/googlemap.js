$(function() {
	var MAP_STYLE = [ ];
	
	var mapEl = $("#googlemap");
	if (!mapEl.length) {
		return;
	}
	
	var model = mapEl.data("objects");
	
	var opts = {
		zoom : 13,
		center : new google.maps.LatLng(42.535, 25.362),
		mapTypeId : google.maps.MapTypeId.ROADMAP,
		styles: MAP_STYLE
	};
	
	var map = new google.maps.Map(mapEl[0], opts);

	var infoWindow = new google.maps.InfoWindow();
	
	model.forEach(function(e) {
		var icon = new google.maps.MarkerImage(mapEl.data("root") + "resource/image/public/googlemap.png",
			new google.maps.Size(73, 66),
			new google.maps.Point(0,0),
			new google.maps.Point(22, 66)
		);
		
		
		var marker = new google.maps.Marker({
			position : new google.maps.LatLng(e.lat, e.lng),
			map : map,
			icon: icon
		});
		
		google.maps.event.addListener(marker, "click", function (ev) {
			infoWindow.setContent("<h3>" + e.title + "</h3>" + e.text);
			infoWindow.open(map, marker);
		})
	});
	
	map.setCenter(new google.maps.LatLng(model[0].lat, model[0].lng));
	
	google.maps.event.addDomListener(window, "resize", function() {
	    var center = map.getCenter();
	    google.maps.event.trigger(map, "resize");
	    map.setCenter(center); 
	});
});
