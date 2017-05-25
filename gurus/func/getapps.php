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
if(isset($_GET['t'])){
  $t = intval($_GET['t']);
}
if(isset($t)){
  if($t == 0) {
    buildAppSelect($q);
  } elseif($t == 1) {
    buildAdminEditor($q);
  }
} else {
  buildAppSelect($q);
}


/**
 * buildAppSelect builds a select menu populated by applications from the database
 *
 * @param $cat -> the category of applications we are querying.
 * @param $i -> The value that needs to get added to the onclick attribute
 */
function buildAppSelect($cat) {
    // $query = "SELECT `AppID`, `Application`  FROM `applications` WHERE `CatId` = $cat";
    // see func/databaseConnections.php for documentation on queryDatabase
    $info = getAppSelect($cat);
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

function buildRatingEditor($cat) {
  // $query = "SELECT `AppID`, `Application`  FROM `applications` WHERE `CatId` = $cat";
  // see func/databaseConnections.php for documentation on queryDatabase
  // $info = queryDatabase($query);
  $info = buildAdminEditor($cat);
}

function buildAdminEditor($cat) {
  $info = getAppSelect($cat);
  $i=0;
  foreach($info as $row) {
    $tempId = $row["AppID"];
    $app = $row["Application"];
    echo "<div class='input-group'>";
    echo "<span class='input-group-addon' data-toggle='tooltip' title='Click to edit' onclick='enableCatEdit(\"$tempId\")'><i class='glyphicon glyphicon-edit'></i></span>";
    echo "<input type='text' class='form-control' value='$app' id='$tempId' disabled>";
    echo "</div>";
    $i++;
  }
  echo "<br /><button type='button' class='btn btn-primary' onclick=''>Upadate Apps</button>";
}
