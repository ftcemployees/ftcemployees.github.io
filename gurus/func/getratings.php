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
    $query = "SELECT gururatings.`Full Name`, gururatings.`Rating`, gururatings.`Application`, gururatings.`Certified` FROM `gururatings` INNER JOIN employee_info ON gururatings.EmpId=employee_info.ID WHERE gururatings.AppId = $app AND employee_info.Active = 1 ORDER BY `Rating` DESC";
    // see func/databaseConnections.php for documentation on queryDatabase
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
  $query = "SELECT `Application`, `Rating`, `Certified`, `AppId` FROM `gururatings` WHERE `CatId` = $cat AND `EmpId` = $id ORDER By `Application`";
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
          <input type='number' value='$rating' class='form-control' name='$appId' id='$application' onkeyup='validRating(this.id, $i)'>
          <span style='color:red; visibility: hidden' id='$i'>Please enter a number between 1 and 10</span>
          </td>";
    if ($cert) {
      echo "<td class='cert' style='text-align: center;'><span class='glyphicon glyphicon-ok'></span></td>";
    } else {
      echo "<td class='cert' style='text-align: center;'><span class='glyphicon glyphicon-remove'></span></td>";
    }
    echo '</tr>';
    $i++;
  }
  echo '<button class="btn btn-primary" type="submit" id="sub" disabled>Update</button>';
}