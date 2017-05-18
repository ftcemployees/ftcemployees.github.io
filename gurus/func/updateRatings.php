<?php
/**
 * Created by PhpStorm.
 * User: Mando0975
 * Date: 5/18/2017
 * Time: 5:13 PM
 */
session_start();
require_once "../partials/logVal.php";
require_once "func/databaseConnections.php";
require_once "func/functions.php";
$updateCat = $_SESSION['updateCat'];
$id = $_SESSION['id'];
$query = "SELECT * FROM `applications` WHERE `CatId` = $updateCat";
$appList = queryDatabase($query);
$valueList = array();

foreach($appList as $row) {
  $app = $row["AppId"];
  $appName = $row["Application"];
  $val = filter_input(INPUT_POST, $appName, FILTER_SANITIZE_NUMBER_INT);
  $valueList += array($app => $val);
}

$queryList = array();

foreach($valueList as $q) {

}