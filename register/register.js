'use strict';

$(function () {
    $('#register-form').submit(function (submitEvent) {
        submitEvent.preventDefault();
        $.post('../php/Register.php', $(this).serialize(), function (data) {
            if (data === 'ok') {
                window.location.href = '../login/login.html';
            } else {
                alert(data);
            }
        });
    });
});