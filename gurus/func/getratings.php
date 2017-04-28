<?php
/**
 * Created by PhpStorm.
 * User: Bryan Muller
 * Date: 4/27/2017
 * Time: 4:43 PM
 */

require_once "databaseConnections.php";

$q = intval($_GET['q']);
buildRatingsTable($q);

/**
 * This function grabs all the guru ratings for a certain application,
 * and prints each rating as a row. This application should be called to fill a
 * table body.
 * @param $app -> the id of the application ratings we are grabbing
 */
function buildRatingsTable($app) {
    $query = "SELECT `Full Name`, `Rating`, `Application`, `Certified` FROM `gururatings` WHERE `AppId` = $app ORDER BY `Rating` DESC";
    // see func/databaseConnections.php for documentation on queryDatabase
    $info = queryDatabase($query);
    foreach($info as $row) {
        $name = $row["Full Name"];
        $rating = $row["Rating"];
        $application = $row["Application"];
        $cert = $row["Certified"];
        echo '<tr>';
        echo "<td>$name</td>";
        echo "<td>$rating</td>";
        echo "<td>$application</td>";
        if ($cert) {
            echo "<td class='cert'><span class='glyphicon glyphicon-ok'></span></td>";
        } else {
            echo "<td class='cert'><span class='glyphicon glyphicon-remove'></span></td>";
        }
        echo '</tr>';
    }
}