$(function(){
	$(document).on('click', '.social-link-click', function(){
		var sociallink_id = $(this).data('sociallink');
		$.post('http://192.168.64.2/projekty/socialshub-local/ajax/click.php', {sociallink_id:sociallink_id});
	})
});

$(function(){
	$(document).on('click', '.custom-link-click', function(){
		var customlink_id = $(this).data('customlink');
		$.post('http://192.168.64.2/projekty/socialshub-local/ajax/click.php', {customlink_id:customlink_id});
	})
});