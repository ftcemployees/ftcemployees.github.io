<?php
/**
 * Created by PhpStorm.
 * User: mando0975
 * Date: 4/27/2017
 * Time: 2:21 PM
 */

require_once "databaseConnections.php";

$q = intval($_GET['q']);
buildAppSelect($q);

function buildAppSelect($cat) {
    $query = "SELECT * FROM `applications` WHERE `CatId` = $cat";
    $info = queryDatabase($query);
    echo '<select id="appSelect" class="form-control" onchange="showRatings(this.value)"><option>Select Application</option>';
    foreach($info as $row) {
        $item = $row["Application"];
        $val = $row["AppID"];
        echo "<option value='$val'>$item</option>";
    }
    echo "</select></div>";
}