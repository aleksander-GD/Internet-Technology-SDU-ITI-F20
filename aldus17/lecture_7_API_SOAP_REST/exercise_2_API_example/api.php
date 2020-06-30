<?php

/* README
    * This exercise will only work if you enable SSL in php.ini
    * You do this by removing the semicolon in the following line:
    *   ;extension=openssl
    *
    * Remember to stop the PHP server and start it again before the extension gets enabled
    *
    * I also inserted a dummy IP-adress that will replace your own if your own is a localhost.
    * That way, the script will still work if you put it on a PHP server with a domain attached and a "real" IP adress
    */

$ipAddress = $_SERVER['REMOTE_ADDR'];

if (strlen($_SERVER['REMOTE_ADDR']) < 6) {
    $ipAddress = "192.71.153.20";
}

echo strlen($ipAddress);

header('Accept: application/json');

$ipApiUrl = "https://ipapi.co/192.71.156.21/json?key=lRYJ6smYS0yvnOOieAtVAFuyuQxYCFKUo1Hu5AvEjCpL5K3sPe";
$locationJson = file_get_contents($ipApiUrl);
$locationObject = json_decode($locationJson);

// e.g. "sv-SE,se,sma,fi-SE"
$languageCode = explode("-", explode(",", $locationObject->languages)[0])[0];
$helloURL = "https://fourtonfish.com/hellosalut/?lang=" . $languageCode;
$helloJson = file_get_contents($helloURL);
$helloObject = json_decode($helloJson);

$dogJson = file_get_contents("https://random.dog/woof.json");
$dogObject = json_decode($dogJson);

// weather specific for city
$weatherJson = file_get_contents("https://www.metaweather.com/api/location/search/?query=" . $locationObject->city);
$weatherObject = json_decode($weatherJson);
// Location 
$weatherJson2 = file_get_contents("https://www.metaweather.com/api/location/" . $weatherObject[0]->woeid);
$weatherObject = json_decode($weatherJson2)->consolidated_weather[0];

// Does not work apparently, should work, but does not. Postman request works fine, but this below gives error forbidden 403
/* $simpsonsJson = file_get_contents("https://thesimpsonsquoteapi.glitch.me/quotes"); */
$simpsonsJson = @file_get_contents("https://thesimpsonsquoteapi.glitch.me/quotes");
if (strpos($http_response_header[0], "200")) {
    $simpsons = json_decode($simpsonsJson)[0];
} else {
    $breakingJson = file_get_contents("https://breaking-bad-quotes.herokuapp.com/v1/quotes");
    $breakingBad = json_decode($breakingJson)[0];
}

?>
<html>

<head>
    <title>API FUN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
</head>

<body>
    <?php
    if (isset($_GET['name'])) : ?>
        <div class="content">
            <div class="left">
                <img src="<?= $dogObject->url ?>" alt="dog" class="dog" />
            </div>
            <div class="right">
                <?= $helloObject->hello ?>, <?= $_GET['name'] ?>
                <br /><br />
                Your IP adress is: <?= substr($_SERVER['REMOTE_ADDR'], 0, 7) ?>***.***
                <br /><br />

                Looks like you are in <img class="flag" alt="country flag" src="http://www.countryflags.org/flags/<?= $languageCode ?>-t.gif" style="height: 10px;" /> <?= $locationObject->city ?>, <?= $locationObject->region ?>, <?= $locationObject->country ?>
                <br />
                Longitude/Latitude: <?= $locationObject->longitude ?>, <?= $locationObject->latitude ?>
                <br /><br />

                <img src="https://www.metaweather.com/static/img/weather/png/64/<?= $weatherObject->weather_state_abbr ?>.png" alt="weather" style="height: 14px;" />
                <?= explode(".", $weatherObject->the_temp)[0] ?>&deg;C

            </div>

        </div>
        <br />
        <center><?= $simpsonsJson === false ? $breakingBad->author : $simpsons->character ?> says <b>"<?= $simpsonsJson === false ? $breakingBad->quote : $simpsons->quote ?>"</b>
            <br /><br />
            <script type="text/javascript" language="javascript" src="https://www.boxofficemojo.com/data/js/wknd5.php"></script>
        </center>


        <style>
            #map {
                width: 700px;
                height: 400px;
            }
        </style>
        <div id="map"></div>
        <script>
            var map = L.map('map').setView([<?= $locationObject->latitude ?>, <?= $locationObject->longitude ?>], 12);

            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([<?= $locationObject->latitude ?>, <?= $locationObject->longitude ?>]).addTo(map)
                .bindPopup('You are <span style="color: #f00;">here</span>')
                .openPopup();
        </script>


    <?php else : ?>
        I didn't GET your NAME
        <form action="api.php?name=">
            <label for="fname">Enter your name:</label>
            <input type="text" id="name" name="name"><br>
            <input type="submit" value="Submit">
        </form>
    <?php endif; ?>


</body>

</html>