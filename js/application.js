$(document).ready(function(){
	$('form').submit(function (e){
		var form = $('form');

		$.ajax({
			method: form.attr('method'),
			url: form.attr('action'),
			data: form.serialize(),
			async: false,
			success: function (data) {
				$('#accepted').modal('toggle');

				$('#member_nickname').text($('#name').val());
				$('#member_year').text($('#year').val() + " - " + $('#course').val());
			}			
		});
		e.preventDefault();
	});

	$('#accepted').on('hidden.bs.modal', function () {
		location.reload();
	})
});