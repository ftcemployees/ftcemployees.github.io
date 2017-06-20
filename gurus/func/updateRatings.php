<?php
/**
 * Created by PhpStorm.
 * User: Mando0975
 * Date: 5/18/2017
 * Time: 5:13 PM
 */
session_start();
require_once "../../partials/logVal.php";
require_once "functions.php";
$updateCat = filter_input(INPUT_POST, "updateCat");
$id = $_SESSION['id'];
$query = "SELECT * FROM `applications` WHERE `CatId` = $updateCat";
$appList = queryDatabase($query);
$valueList = array();

foreach($appList as $row) {
  $app = $row["AppID"];
  $val = htmlspecialchars($_POST[$app]);
  if(isset($val)) {
    $valueList += array($app => $val);
  }
}

foreach($valueList as $k => $v) {
  if(pushRatings($k, $v, $id)) {
    $success = true;
  }
}

if(isset($success)) {
//            header('refresh: 1; url=../editRatings.php');
    echo '<div class="alert alert-success"><strong>Success!</strong> Your ratings have been updated.</div>
            <div class="row">
            <div class="col-md-4 col-md-offset-4"><img src="assets/success.gif"></div>
            </div>';
} else {
//            header('refresh: 3; url=../editRatings.php');
    echo '<div class="alert alert-danger"><strong>OOPS!</strong> Looks like something went wrong.... Check your data and try again.</div>
            <div class="row"><div class="col-md-4 col-md-offset-4"><img src="assets/aaron.gif"></div></div>';
}

?>


