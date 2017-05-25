<?php

require_once "../../partials/logVal.php";
require_once "../func/databaseConnections.php";
require_once "../func/functions.php";

$updateCat = $_GET["q"];
$appList = getAppSelect($updateCat);
// foreach($appList as $row) {
//   echo $row['AppID'];
// }
// $valueList = array();
//
// foreach($appList as $row) {
//   $app = $row['AppID'];
//
//   $val = filter_input(INPUT_POST, $app, FILTER_SANITIZE_STRING);
//   if(isset($val)) {
//     $valueList += array($app => $val);
//   }
// }
//
// $i = 0;
// foreach($valueList as $row) {
//   echo $row[$i];
// }

// foreach($appList as $k => $v) {
//   if(pushAppUpdate($k, $v)) {
//     $success = true;
//     echo "success!!!";
//   }
//   else {
//     echo "failure";
//   }
// }

 ?>
