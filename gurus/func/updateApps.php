<?php

require_once "../../partials/logVal.php";
require_once "../func/databaseConnections.php";
require_once "../func/functions.php";


if(isset($_GET['t'])) {

  $t = filter_var($_GET['t'], FILTER_SANITIZE_NUMBER_INT);
}


if(isset($t)) {
  if($t == 0){
    $updateCat = filter_var($_GET["q"], FILTER_SANITIZE_NUMBER_INT);
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
  } elseif($t == 1) {
    $val = filter_var($_POST["newApp"], FILTER_SANITIZE_STRING);
    $cat = filter_var($_POST["cat"], FILTER_SANITIZE_NUMBER_INT);
    $success = NULL;
    if($val != ""){
      if(pushAppAdd($cat, $val)) {
        $success = true;
      }
    }

    if(isset($success)) {
      echo "<br /><div class='alert alert-success'>
      <strong>Success!</strong> Application Added!
      </div>";
    } else {
      echo "<br /><div class='alert alert-danger'>
      <strong>Oops!</strong> Looks like something went wrong. Refresh and try again.</div>";
    }
  }
}


 ?>
