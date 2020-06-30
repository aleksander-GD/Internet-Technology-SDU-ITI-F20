<?php

require_once('Database.php');

$searchParameter = filter_input(INPUT_GET, 'searchParameter', FILTER_SANITIZE_STRING);

$database = new Database();
$searchResult = $database->getBooksPublishersAuthors();

$completedsearchResultData = array();

if ($searchParameter !== "" || !empty($searchParameter)) {
    $searchParameter = strtolower($searchParameter);
    $searchParameterLength = strlen($searchParameter);
    foreach ($searchResult as $data) {
        if (stristr($searchParameter, substr($data['author_name'], 0, $searchParameterLength))) {
            array_push($completedsearchResultData, $data);
        }
        if (stristr($searchParameter, substr($data['book_title'], 0, $searchParameterLength))) {
            array_push($completedsearchResultData, $data);
        }
        if (stristr($searchParameter, substr($data['publisher_name'], 0, $searchParameterLength))) {
            array_push($completedsearchResultData, $data);
        }
    }
} else {
    $completedsearchResultData = $searchResult;
}

/* $completedsearchResultData = $searchResult; */
if (!$completedsearchResultData) {
    echo 'Nothing found, no connection to the database';
    echo '<tr>';
    echo "<td scope='row'>" . "</td>";
    echo "<td scope='row'>" . "</td>";
    echo "<td scope='row'>" . "</td>";
    echo '</tr>';
} else {
    foreach ($completedsearchResultData as $data) {

        echo '<tr>';
        echo "<td scope='row'>" . $data['author_name'] . "</td>";
        echo "<td scope='row'>" . $data['book_title'] . "</td>";
        echo "<td scope='row'>" . $data['publisher_name'] . "</td>";
        echo '</tr>';
    }
}