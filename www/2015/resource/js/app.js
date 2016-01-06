$(function() {
	$(':radio, :checkbox').radiocheck();
	$('[data-toggle="switch"]').bootstrapSwitch();;
	$('input.skills').tagsinput();
	$("form.reg").formValidator({errorClass:"has-error"});
});