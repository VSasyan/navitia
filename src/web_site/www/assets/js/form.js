function initForm() {
	$('div.choice').each(function() {
		$(this).data('value', $(this).find('span:eq(0)').addClass('selected').data('value'));
	});
	$('div.choice span').click(function() {
		$(this).parent().data('value', $(this).data('value')).find('span').removeClass('selected');
		$(this).addClass('selected');
	})
};

$(document).ready(initForm);