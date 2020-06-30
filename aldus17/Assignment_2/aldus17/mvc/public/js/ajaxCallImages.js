$(document).ready(function() {
    var $this;
    var loadingText;

    getUserImages($(".search").html());
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        getUserImages('');
    }
});

$(document).ajaxSend(function(event, request, settings) {
    $('.bs-example').show();
});

$(document).ajaxComplete(function(event, request, settings) {
    $('.bs-example').hide();
});

function getUserImages(searchParameter) {
    $.ajax({
        url: "/aldus17/mvc/app/services/searchImages.php?searchParameter=" + searchParameter,
        type: "GET",
        async: true,
        searchParameter: searchParameter,
        success: function(data) {

            $(".imagefeed").html(data);
        },
        error: function(response) {

        }
    });

}