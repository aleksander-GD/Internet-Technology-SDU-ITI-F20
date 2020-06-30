$(document).ready(function() {
    var $this;
    var loadingText;
    getUserlist();
    $('#getUserlistbtn').on('click', function() {
        getUserlist();
    });
});

$(document).ajaxSend(function(event, request, settings) {
    $('.bs-example').show();
});

$(document).ajaxComplete(function(event, request, settings) {
    $('.bs-example').hide();
});

function getUserlist() {
    $.ajax({

        url: "/aldus17/mvc/public/api/users",
        type: "GET",
        async: true,
        success: function(data) {
            var jsonData = $.parseJSON(data);

            var html = "";

            for (a = 0; a < jsonData.length; a++) {
                var userID = jsonData[a]['user_id'];
                var username = jsonData[a]['username'];

                html += "<tr>";
                html += "<td>" + userID + "</td>";
                html += "<td>" + username + "</td>";
                html += "</tr>";
            }
            $("#userlistdata").html(html);
            /*  $(function() {
                 $.each(jsonData, function(i, item) {
                     $('<tr>').append(
                         $('<td>').text(item.user_id),
                         $('<td>').text(item.username)).appendTo('#userlistdata');
                 });
             }); */
        },
        error: function(response) {

        }
    });

}