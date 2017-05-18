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
    require_once "../../partials/head.html";
    echo '<link href="gurus/css/updatePageStyle.css" rel="stylesheet" type="text/css">';
    echo '</head>';
  require_once "../../partials/nav.php";
  header('refresh: 3; url=../personalInfo.php');
  echo '<div class="container"><div class="alert alert-success" id="success"><strong>Success!</strong> Information updated! You will be redirected...
</div>
<img src="assets/success.gif"></div>';
} else {
    echo '<head>';
    require_once "../../partials/head.html";
    echo '<link href="gurus/css/updatePageStyle.css" rel="stylesheet" type="text/css">';
    echo '</head>';
    require_once "../../partials/nav.php";
    header('refresh: 5; url=../personalInfo.php');
    echo '<div class="container"><div class="alert alert-danger" id="failure" style="margin:auto"><strong>ERROR!</strong> Something went wrong! You will be redirected. Please try again...</div>
    <img src="assets/aaron.gif"></div>';
}

?>
