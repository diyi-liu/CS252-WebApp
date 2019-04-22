'use strict';

$(function () {
    $('#register-form').submit(function (submitEvent) {
        submitEvent.preventDefault();
        $.post('/php/Register.php', $(this).serialize(), function (data) {
            if (data === 'ok') {
                window.location.href = '/index.html';
            } else {
                alert(data);
            }
        });
    });
});