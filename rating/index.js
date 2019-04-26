$(function() {

    function findGetParameter(parameterName) {
        var result = null,
            tmp = [];
        location.search
            .substr(1)
            .split("&")
            .forEach(function (item) {
                tmp = item.split("=");
                if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
            });
        return result;
    }

    let param = findGetParameter('name');
    $('#title').text(param);

    $('#rating-btn').click(function() {
        $.post('../php/Rating.php', {
            rating: $('#user-rating')[0].value
        }, function(data) {
            console.log(data)
            if(data === 'add') {
                alert('Rating added successfully!');
                window.location.href = '../index.html';
            } else if(data === 'update'){
                alert('Rating updated successfully!');
                window.location.href = '../index.html';
            } else{
                alert('Update rating failed');
            }
        });
    });
});