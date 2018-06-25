jQuery(document).ready(function($) {

	// If post is saved, output shortcode box
	function GetURLParameter(sParam) {
		var sPageURL = window.location.search.substring(1);
		var sURLVariables = sPageURL.split('&');
		for (var i = 0; i < sURLVariables.length; i++) {
			var sParameterName = sURLVariables[i].split('=');
				if (sParameterName[0] == sParam) {
					return sParameterName[1];
				}
		}
	}

	var action = GetURLParameter('action');
	var post   = GetURLParameter('post');

	if (GetURLParameter('action') == 'edit' && post != '')
		var input_val = '[callout post_id="' + post + '"]';
	else
		var input_val = 'Will be available upon saving';

	$('input#_cmb2_shortcode').val(input_val);
});
