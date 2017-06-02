<?php

require_once "../../partials/logVal.php";
require_once "../func/databaseConnections.php";
require_once "../func/functions.php";

$q = $_GET['q'];

if(isset($q)) {

  if($q == 0){
    $catList = getCategories();

    $valList = array();
    foreach($catList as $row) {
      $val = filter_var($_POST[$row["CatId"]], FILTER_SANITIZE_STRING);
      $valList += array($row["CatId"] => $val);
    }

    $success = NULL;
    foreach($valList as $k => $v) {
      if(pushCatUpdate($k, $v)) {
        $success = true;
      }
    }

    if(isset($success)) {
      echo "<br /><div class='alert alert-success'>
      <strong>Success!</strong> Categories updated!
      </div>";
    } else {
      echo "<br /><div class='alert alert-danger'>
      <strong>Oops!</strong> Looks like something went wrong. Refresh and try again.</div>";
    }
  } elseif ($q == 1) {
    $val = filter_var($_POST["newCat"], FILTER_SANITIZE_STRING);

    $success = NULL;
    if($val != "") {
      if(pushCatAdd($val)) {
        $success = true;
      }
    }

    if(isset($success)) {
      echo "<br /><div class='alert alert-success'>
      <strong>Success!</strong> Category Added!
      </div>";
    } else {
      echo "<br /><div class='alert alert-danger'>
      <strong>Oops!</strong> Looks like something went wrong. Refresh and try again.</div>";
    }
  }

}



 ?>
