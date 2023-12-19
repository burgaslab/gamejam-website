(function($) {
	$.fn.formValidator = function(customOpts) {
		var opts = {
			summary: function() {},
			defaultMessage: "Invalid value!",
			validateClass: "validate",
			validateSkipClass: "no-validate",
			errorClass: "error",
			inputs: "input,textarea,select"
		};
		
		jQuery.extend(opts, customOpts);
		
		var that = this;
		
		that.validators = {
			email: function(values) {
				var filter = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i;
				return filter.test(values[0]);
			},
			phone: function(values) {
				var filter = /^[0-9 +-\/]{6,}$/;
				return filter.test(values[0]);
			},
			slug: function(values) {
				var filter = /^[0-9a-zа-я-]{3,}$/;
				return !values[0] || filter.test(values[0]);
			},
			password: function(values) {
				var filter = /^.{6,}$/;
				return filter.test(values[0]);
			},
			required: function(values) {
				var filter = /.+/;
				return values.length && values[0] !== null && filter.test(values[0]);
			},
			same: function(values) {
				for (var i = 1; i < values.length; i++) {
					if(values[i] !== values[0]) {
						return false;
					}
				}
				return true;
			},
			equalto: function(values, extra) {
				var extra = $(extra).val();
				for (var i = 0; i < values.length; i++) {
					if(values[i] !== extra) {
						return false;
					}
				}
				return true;
			},
			name: function(values) {
				var filter = /^[а-яa-z ]{3,40}$/i;
				return filter.test(values[0]);
			},
			image: function(values) {
				var filter = /(\.jpg|\.jpeg)$/i;
				return !values[0] || filter.test(values[0]);
			},
			int: function(values, bounds) {
				return values[0] >= bounds[0] && values[0] <= bounds[1];
			}
		}
		
		that.validateAll = function(fields) {
			var res = [];
			fields.each(function() {
				var field = that.validateField($(this));
				if (!field) {
					var msg = $(this).data("error") || opts.defaultMessage;
					res.push(msg);
				}
			});
			
			return res;
		}
		
		that.validateField = function(el) {
			var res = true;
			var input = el;
			if (!el.is(opts.inputs)) {
				input = input.find(opts.inputs).not("." + opts.validateSkipClass);
			}
			for (var key in that.validators) {
				if (el.hasClass(key)) {
					var values = [];
					input.each(function() {
						if (input.data("current-value")) {
							values.push("current-value");
						}
						if ($(this).is("[type='radio'], [type='checkbox']")) {
							var el = $(this).filter(":checked");
							if (el.size()) {
								values.push(el.val());
							}
						} else {
							values.push($(this).val());
						}
					});
					var extra = el.data("validate");
					res = res && that.validators[key](values, extra);
				}
			}
			var customValidator = el.data("custom");
			if (customValidator) {
				res = res && window[customValidator](el);
			}
			if (res) {
				el.removeClass(opts.errorClass);
			} else {
				el.addClass(opts.errorClass);
			}
			return res;
		}
		
		this.filter("form").each(function() {
			var form = $(this);
			
			var fields = form.find("." + opts.validateClass);
			
			form.on("submit", function(e){
				try {
					var errors = that.validateAll(fields);
					
					if (errors.length) {
						opts.summary(errors);
					}
				} finally {
					if (typeof errors === "undefined") {
						return false;
					}
					if (errors.length) {
						return false;
					}
					form.data("valid", 1);
					return true;
				}
				
			});
			
			fields.each(function() {
				var t = $(this);
				var input = t;
				if (!t.is(opts.inputs)) {
					input = input.find(opts.inputs).not("." + opts.validateSkipClass);
				}
				input.bind("blur keyup change", function() {
					that.validateField(t);
				});
			});
		});
		
		return this;
	};
}(jQuery));
