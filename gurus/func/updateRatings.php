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
$updateCat = $_SESSION['updateCat'];
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


?>

<!DOCTYPE html>
<html>
<head>
  <?php require_once "../../partials/head.html";?>
  <link href="gurus/css/updatePageStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
  <?php require_once "../../partials/nav.php"; ?>
    <div class="container">
      <div class="jumbotron">
        <?php
          if(isset($success)) {
            header('refresh: 1; url=../editRatings.php');
            echo '<div class="alert alert-success"><strong>Success!</strong> Your ratings have been updated. You will be redirected back to the edit page.</div>
        <img src="assets/success.gif"></div>';
          } else {
            header('refresh: 3; url=../editRatings.php');
            echo '<div class="alert alert-danger"><strong>OOPS!</strong> Looks like something went wrong.... Check your data and try again.</div>
        <img src="assets/aaron.gif"></div>';
          }
        ?>
      </div>
    </div>
</body>
</html>
