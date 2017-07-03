<?php
require_once "functions.php";
require_once "../../partials/logVal.php";

$fname = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_STRING);
$lname = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_STRING);
$name = $fname . " " . $lname;
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$id  = $_SESSION["id"];
$query = "UPDATE `employee_info` SET `First Name`='$fname',`Last Name`='$lname',`Phone Number`='$phone',`Email`='$email',`Full Name`='$name',`Username`='$username' WHERE `ID` = $id";

$count = updateEmpInfo($fname, $lname, $username, $phone, $email);

if($count) {
    echo '<head>';
  echo '
  <div class="row">
    <div class="col-sm-12">
      <div class="alert alert-success" id="success"><strong>Success!</strong> Information updated!</div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <img src="assets/success.gif">
    </div>
  </div>';
} else {
    echo '
  <div class="row">
    <div class="col-sm-12">
      <div class="alert alert-danger" id="failure" style="margin:auto"><strong>ERROR!</strong> Something went wrong! Please refresh and try again</div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <img src="assets/aaron.gif"></div>
  </div>
';
}

?>

