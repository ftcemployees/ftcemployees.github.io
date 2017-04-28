<?php
/**
 * Created by PhpStorm.
 * User: mando0975
 * Date: 4/27/2017
 * Time: 2:21 PM
 */

require_once "databaseConnections.php";

//grab the category that was selected
$q = intval($_GET['q']);
buildAppSelect($q);


/**
 * buildAppSelect builds a select menu populated by applications from the database
 *
 * @param $cat -> the category of applications we are querying.
 */
function buildAppSelect($cat) {
    $query = "SELECT `AppID`, `Application`  FROM `applications` WHERE `CatId` = $cat";
    // see func/databaseConnections.php for documentation on queryDatabase
    $info = queryDatabase($query);
    echo '<div class="form-group">';
    echo "<label for='appSelect'>Select Application</label>";
    echo '<select id="appSelect" class="form-control" onchange="showRatings(this.value)"><option>Select Application</option>';
    foreach($info as $row) {
        $item = $row["Application"];
        $val = $row["AppID"];
        echo "<option value='$val'>$item</option>";
    }
    echo "</select></div>";
}