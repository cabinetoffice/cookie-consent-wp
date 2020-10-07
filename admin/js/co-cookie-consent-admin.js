jQuery(document).ready(function($) {
	$('#create-post').click(function(e) {
		tinyMCE.triggerSave();
		e.preventDefault();
		var ajax_form_data = $("#cookie_notice").val();
		var user_nonce = $("input[name=add_user_meta_nonce]").val();
	   $.ajax({
		type: 'POST',
		url: '/wp-admin/admin-ajax.php',
		data: {
			action: 'create-post',
			post_content: ajax_form_data,
			user_nonce: user_nonce,
		},
		beforeSend: function ()
		{
			console.log('sending');
			$("#create-post").html("Saving");
			$('#create-post').prop('disabled', true);
			$('#setting-error-settings_updated').detach();
		},
		success: function(data)
		{
			console.log('yay');
			$("#create-post").html("Save Changes");
			$('#create-post').prop('disabled', false);
			var success_mess ='<div id="setting-error-settings_updated" class="notice notice-success settings-error is-dismissible"><p><strong>Saved.</strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';
			$(success_mess).insertAfter("#page_title");
		},
		error: function()
		{
			console.log('nay');

		}
	})
	});

  $('.notice-dismiss').click(function() {
	$('#setting-error-settings_updated').detach();
  });
});
