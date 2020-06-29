$(document).ready(function() {
    var intervalID = null;

    function run() {
        intervalID = setInterval(changeText, 5000);
    }
    $(".button").click(run);

    $(".stopbtn").click(function() {
        clearInterval(intervalID);
        $('#message').html('Stopped');
    });
});

function changeText() {
    $.ajax({
        url: "randNumGen.php",
        type: "GET",
        async: true,
        success: function(data) {
            $("#message").html(data);
        },
        error: function(response) {

        }
    });
}