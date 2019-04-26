'use strict';

$(function () {
    $('#register-form').submit(function (submitEvent) {
        submitEvent.preventDefault();
        $.post('../php/Register.php', $(this).serialize(), function (data) {
            if (data === 'ok') {
                alert('Register success!')
                window.location.href = '../login/login.html';
            } else {
                alert('Username in use');
            }
        });
    });
});