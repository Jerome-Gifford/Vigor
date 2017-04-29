$(function (){

	var $messages = $('#messages');
	var $contents = $('#messageInput');

	$.ajax({

		type: 'GET',
		url: '/messenger',
		success: function(messages) {
			$.each(messages, function(i, message) {
				$messages.append('<li>message:'+ message.contents +'</li>');
			});
		}
	});

	$('#messageSend').on('click', function() {

		var message = {
			contents: $contents.val(),
		};

		$.ajax({
			type: 'POST',
			url: '/messenger',
			data: contents,
			success: function(newMessage) {
				$messages.append('<li>message:'+ message.contents +'</li>');
			},
			error: function() {
				alert('couldnt send message for some odd reason.');
			}
		});

	});

});