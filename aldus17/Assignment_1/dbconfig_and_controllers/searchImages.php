<?php

include_once('DBConnection.php');
include_once('UserController.php');
include_once('DBController.php');


$searchParameter = filter_input(INPUT_GET, 'searchParameter', FILTER_SANITIZE_STRING);

$usercontroller = new UserController();

$imageResults = $usercontroller->getAllUserImages();

$imageData = array();


if ($searchParameter !== "" || !empty($searchParameter)) {
    $searchParameter = strtolower($searchParameter);
    $searchParameterLength = strlen($searchParameter);
    foreach ($imageResults as $image) {
        if (stristr($searchParameter, substr($image['username'], 0, $searchParameterLength))) {
            array_push($imageData, $image);
        }
    }
} else {
    // get all image data if search did not find anything
    $imageData = $imageResults;
}

foreach ($imageData as $img) {

    echo '<div class="imagePost">';
    echo "<h1>" . $img['title'] . "</h1>";
    echo "<p>" . $img['description'] . "</p>";
    echo '<img src="' . $img['image'] . '"/>';
    echo "<p><i>" . "Posted by: " . $img['username'] . str_repeat('&nbsp;', 2) . " created on: " . $img['creationTime'] . "</i></p>";
    echo '</div>';
    echo "<hr>";
}
