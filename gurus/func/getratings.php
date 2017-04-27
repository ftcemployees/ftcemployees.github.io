<?php
/**
 * Created by PhpStorm.
 * User: mando0975
 * Date: 4/27/2017
 * Time: 4:43 PM
 */

require_once "databaseConnections.php";

$q = intval($_GET['q']);
buildRatingsTable($q);

function buildRatingsTable($app) {
    $query = "SELECT * FROM `gururatings` WHERE `AppId` = $app";
    $info = queryDatabase($query);
    foreach($info as $row) {
        $name = $row["Full Name"];
        $rating = $row["Rating"];
        $application = $row["Application"];
    }
}