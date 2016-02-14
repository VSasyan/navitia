function initForm() {
	$('div.choice').each(function() {
		$(this).find('input').val($(this).find('span:eq(0)').addClass('selected').data('value'));
	});
	$('div.choice span').click(function() {
		$(this).parent().find('span').removeClass('selected');
		$(this).parent().find('input').val($(this).addClass('selected').data('value'));
	})
};

$(document).ready(initForm);