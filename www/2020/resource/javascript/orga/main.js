$(function() {

	$("textarea.tinymce").tinymce(
		{
			theme : "modern",
			height : 400,
			width : 800,
			autoresize_min_height : 400,
			plugins : "advlist anchor autolink autoresize charmap code colorpicker contextmenu fullscreen hr image imagetools insertdatetime importcss link lists media nonbreaking noneditable pagebreak paste preview print responsivefilemanager searchreplace table template textcolor textpattern toc visualblocks visualchars wordcount",
			toolbar : [
					"bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | undo redo | link image media responsivefilemanager pagebreak | save ",
					"formatselect fontselect fontsizeselect forecolor backcolor | removeformat code" ],
			style_formats : [ {
				title : 'Image Left',
				selector : 'img',
				styles : {
					'float' : 'left',
					'margin' : '0 10px 10px 0'
				}
			}, {
				title : 'Image Right',
				selector : 'img',
				styles : {
					'float' : 'right',
					'margin' : '0 0 10px 10px'
				}
			} ],
			resize : "both",
			allow_conditional_comments : false,
			image_advtab : true,
			image_caption : true,
			image_title : true,
			fix_list_elements : true,
			browser_spellcheck : true,
			relative_urls : false,
			importcss_append : true,
			link_context_toolbar : true,
			link_assume_external_targets : true,
			nonbreaking_force_tab : true,
			pagebreak_separator : "<!-- pagebreak -->",
			pagebreak_split_block : true,
			plugin_preview_width : 980,
			plugin_preview_height : 800,
			table_grid : false,
			extended_valid_elements: "span,span[*],i[*],em[*],a,a[*],a[id],a[href]",
			verify_html: false
	});
});
