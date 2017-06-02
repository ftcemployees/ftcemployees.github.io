<?php
/**
 * Created by PhpStorm.
 * User: Mando0975
 * Date: 6/1/2017
 * Time: 4:59 PM
 */
require_once "../../partials/logVal.php";
require_once "../func/functions.php";
require_once "adminVal.php";

if(filter_input(INPUT_GET, 'q', FILTER_SANITIZE_NUMBER_INT) == 1) {
  $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
  $newMail = filter_input(INPUT_POST, "newMail", FILTER_SANITIZE_STRING);
  $newTeam = filter_input(INPUT_POST, "newTeam", FILTER_SANITIZE_NUMBER_INT);
  $newAssign = filter_input(INPUT_POST, "newAssign", FILTER_SANITIZE_STRING);
  if(filter_input(INPUT_POST, "newActive", FILTER_SANITIZE_STRING) == 'false') {
    $newActive = 0;
  } else {
    $newActive = 1;
  }
  if(filter_input(INPUT_POST, "newAdmin", FILTER_SANITIZE_STRING) == 'false') {
    $newAdmin = 0;
  } else {
    $newAdmin = 1;
  }


  if(updateEmpAdmin($id, $newMail, $newTeam, $newAssign, $newActive, $newAdmin)) {
    echo "<div class='alert alert-success'><strong>Success!</strong> Employee Updated</div>";
    echo "<div class='col-md-4'></div><div class='col-md-4'><img src='assets/success.gif'></div><div class='col-md-4'></div>";
  } else {
    echo "<div class='alert alert-danger'><strong>Failure!</strong> Something went wrong... Try again!</div>";
    echo "<img src='assets/aaron.gif'>";
  }
} elseif(filter_input(INPUT_GET, 'q', FILTER_SANITIZE_NUMBER_INT) == 2) {
  $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
  $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $assign = filter_input(INPUT_POST, 'assign', FILTER_SANITIZE_STRING);
  $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
  $pwd = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);

  $pwd = password_hash($pwd, PASSWORD_DEFAULT);

  $id = addEmp($fname, $lname, $email, $assign, $user, $pwd);
  $success = NULL;
  if($id) {
    $apps = queryDatabase("SELECT `AppID` FROM `applications` WHERE 1");
    foreach($apps as $app) {
      addGuruApp($app["AppID"], $id);
    }
    $success = true;
  }

  if($success){
    echo "<div class='alert alert-success'><strong>Success!</strong> Employee Updated</div>";
    echo "<div class='col-md-4'></div><div class='col-md-4'><img src='assets/success.gif'></div><div class='col-md-4'></div>";
  } else {
    echo "<div class='alert alert-danger'><strong>Failure!</strong> Something went wrong... Try again!</div>";
    echo "<img src='assets/aaron.gif'></div>";
  }

}
