'use strict';

$(function () {
	$('#login_form').submit(function (submitEvent) {
		submitEvent.preventDefault();
		$.post('../php/Login.php', $(this).serialize(), function(data) {
			if(data === 'pass') {
				alert('You have logged in');
				window.location.href = '../index.html';
			} else {
				alert('Invalid username/password');
			}
		});
	});
});