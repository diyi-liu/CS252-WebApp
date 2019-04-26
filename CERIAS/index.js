$(function () {
   $('.event-name').each(function () {
       let element = $(this);
       let name = $(this).text();
       $.get('../php/GetRating.php', {
           name: name
       }, function (data) {
           element.parent().parent().children(".rating").text(data);
       });
   });
});