<?php

require_once "../../partials/logVal.php";
require_once "../func/databaseConnections.php";
require_once "../func/functions.php";

$updateCat = $_GET["q"];
$appList = getAppSelect($updateCat);

$valList = array();
foreach($appList as $row) {
  $val = filter_var($_POST[$row["AppID"]], FILTER_SANITIZE_STRING);
  $valList += array($row["AppID"] => $val);
}

$success = NULL;
foreach($valList as $k => $v) {
  if(pushAppUpdate($k, $v)) {
    $success = true;
  }
}

if(isset($success)) {
  echo "<br /><div class='alert alert-success'>
  <strong>Success!</strong> Applications updated!
  </div>";
} else {
  echo "<br /><div class='alert alert-danger'>
  <strong>Oops!</strong> Looks like something went wrong. Refresh and try again.</div>";
}

 ?>
