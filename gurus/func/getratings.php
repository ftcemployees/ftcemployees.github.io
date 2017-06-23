<?php
/**
 * Created by PhpStorm.
 * User: Bryan Muller
 * Date: 4/27/2017
 * Time: 4:43 PM
 */

require_once "databaseConnections.php";
$q = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_NUMBER_INT);
$t = filter_input(INPUT_GET, 't', FILTER_SANITIZE_NUMBER_INT);

if ($t) {
  buildRatingsEditor($q);
} else {
  buildRatingsTable($q);
}


/**
 * This function grabs all the guru ratings for a certain application,
 * and prints each rating as a row. This application should be called to fill a
 * table body.
 * @param $app -> the id of the application ratings we are grabbing
 */
function buildRatingsTable($app) {
    $query = "SELECT employee_info.`Full Name`, gururatings.Rating, applications.Application, gururatings.Certified FROM gururatings INNER JOIN employee_info ON gururatings.EmpId=employee_info.ID INNER JOIN applications ON gururatings.AppId = applications.AppID WHERE gururatings.AppId = $app AND employee_info.Active = 1 ORDER BY gururatings.Rating DESC";    // see func/databaseConnections.php for documentation on queryDatabase
    $info = queryDatabase($query);
    if(!isset($info)){
      return;
    }
    foreach($info as $row) {
        $name = $row["Full Name"];
        $rating = $row["Rating"];
        $application = $row["Application"];
        $cert = $row["Certified"];
        echo '<tr>';
        echo "<td>$name</td>";
        echo "<td>$application</td>";
        echo "<td>$rating</td>";

        if ($cert) {
            echo "<td class='cert'><span class='glyphicon glyphicon-ok'></span></td>";
        } else {
            echo "<td class='cert'><span class='glyphicon glyphicon-remove'></span></td>";
        }
        echo '</tr>';
    }
}

function buildRatingsEditor($cat)
{
  session_start();
  $i = 0;
  $id = $_SESSION['id'];
  $_SESSION['updateCat'] = $cat;
  $query = "SELECT applications.`Application`, gururatings.`Rating`, gururatings.`Certified`, gururatings.`AppId` FROM `gururatings` INNER JOIN applications ON gururatings.AppId = applications.AppID WHERE `CatId` = $cat AND `EmpId` = $id ORDER By `Application`";
  $info = queryDatabase($query);
  if(!isset($info)){
    return;
  }
  foreach ($info as $row) {
    $rating = $row["Rating"];
    $application = $row["Application"];
    $appId = $row["AppId"];
    $cert = $row["Certified"];
    $_POST['cat'] = $cat;
    echo '<tr>';
    echo "<td><strong>$application</strong></td>";
    echo "<td>$rating</td>";
    echo "<td>
          <input type='number' value='$rating' class='form-control ratings' name='$appId' id='$application' onkeyup='validRating(this.id, $i)'>
          <span style='color:red; visibility: hidden' id='$i'>Please enter a number between 1 and 10</span>
          </td>";
    if ($cert == 0) {
      echo "<td class='cert'><select name='cert$appId' id='cert' class='form-control ratings'><option value='0' selected>Not Certified</option><option value='1'>Certified</option></select></td>";
    } else {
      echo "<td class='cert'><select name='cert$appId' id='cert'><option value='0' class='form-control ratings'>Not Certified</option><option value='1' selected>Certified</option></select></td>";
    }
    echo '</tr>';
    $i++;
  }

}
