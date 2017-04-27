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
    echo '<div class="form-group"> 
            <select class="form-control">';
    foreach($info as $row) {
        $item = $row["Application"];
        $val = $row["AppId"];
        echo "<option value='$val'>$item</option>";
    }
    echo "</select></div>";
}