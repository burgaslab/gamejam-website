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

	var clockEl = $("#countdown div");
	if (clockEl.size()) {
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
	}
	
		
	$(".grid tr.edit").on("click", "button.edit", function(e){
		e.preventDefault();
		var row = $(this).closest("tr");
		var params = {id: row.data("id")};
		var url = $(".grid").data("edit-url");
		$.post(url, params, function(res) {
			if (res) {
				row.html(res);
				row.addClass("update");
			}
		});
	});
	
	$(".grid tr.edit").on("click", "button.cancel", function(e){
		e.preventDefault();
		var row = $(this).closest("tr");
		var params = {id: row.data("id")};
		var url = $(".grid").data("cancel-url");
		$.post(url, params, function(res) {
			if (res) {
				row.html(res);
				row.removeClass("update");
			}
		});
	});
	
	
	$(".grid tr.edit").on("click", "button.save", function(e){
		e.preventDefault();
		var row = $(this).closest("tr"); 
		row.removeClass("update");
		var params = row.find("input,select,textarea").serializeObject();
		params.id = row.data("id");
		var url = $(".grid").data("save-url");
		$.post(url, params, function(res) {
			if (res.success) {
				row.html(res.data);
			} else {
				alert(validatorToString(res.data));
			}
		});
	});
	
	$(".grid tr.edit").on("click", "button.del", function(e){
		if (confirm("Confirm delete?")) {
			e.preventDefault();
			var row = $(this).closest("tr"); 
			var params = {
				id : row.data("id"),
			};
			var url = $(".grid").data("delete-url");
			$.post(url, params, function(res) {
				row.remove();
			});
		}
	});

	
	$(".grid tr.add").on("click", "button.save", function(e){
		e.preventDefault();
		var row = $(this).closest("tr"); 
		var params = row.find("input,select,textarea").serializeObject();
		var url = $(".grid").data("add-url");
		$.post(url, params, function(res) {
			if (res.success) {
				window.location = window.location;
			} else {
				alert(validatorToString(res.data));
			}
		});
	});
	
	var validatorToString = function(validator) {
		return Object.keys(validator).map(function (key) {return validator[key]}).join("\n");
	}
	

		
	$("table.sort").each(function() {
		var table = $(this);
		var headers = {};
		var th = table.find("thead tr >");
		th.each(function(index, el) {
			if (!$(el).hasClass("sort")) {
				headers[index] = {
					sorter : false
				};
			}
		});
		table.tablesorter({
			headers : headers,
			cssHeader : "tablesorter-header",
			textExtraction : function(node) {
				node = $(node);
				var res = node.data("sort");
				if (typeof res !== "undefined") {
					return res;
				}
				return node.text();
			},
		});
	});
});



$.fn.serializeObject = function() {
	var o = {};
	var a = this.serializeArray();
	$.each(a, function() {
		if (o[this.name] !== undefined) {
			if (!o[this.name].push) {
				o[this.name] = [ o[this.name] ];
			}
			o[this.name].push(this.value || '');
		} else {
			o[this.name] = this.value || '';
		}
	});
	return o;
};