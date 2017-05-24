<?php
/**
 * Created by PhpStorm.
 * User: Mando0975
 * Date: 5/23/2017
 * Time: 1:45 PM
 */
require_once "../../partials/head.html";
require_once "databaseConnections.php";
require_once "functions.php";
require_once "../../partials/logVal.php";

?>

<!DOCTYPE html>
<html>
<head>
  <?php require_once "../../partials/head.html"; ?>
</head>
<body>
  <?php require_once "../../partials/nav.php"; ?>
</body>
</html>

<?php

$id = $_SESSION["id"];
$dataInfo = queryDatabase("SELECT `Password` FROM `employee_info` WHERE `ID` = $id");
$dataPwd = $dataInfo[0]["Password"];

echo '<div class=container>';
if (isset($id) && isset($dataPwd) && isset($_POST["newPwd"]) && isset($_POST["oldPwd"]) && isset($_POST["confirmPwd"]) && $_POST["newPwd"] == $_POST["confirmPwd"]){
  $newPwd = filter_input(INPUT_POST, "newPwd", FILTER_SANITIZE_STRING);
  $oldPwd = filter_input(INPUT_POST, "oldPwd", FILTER_SANITIZE_STRING);
  $confirmPwd = filter_input(INPUT_POST, "confirmPwd", FILTER_SANITIZE_STRING);
  $newPwd = password_hash($newPwd, PASSWORD_DEFAULT);
  if(password_verify($oldPwd, $dataPwd)) {
    if(updatePassword($newPwd, $id)) {
      header('refresh: 1; url=../../index.php');
      echo "<div class='alert alert-success'><strong>Success!</strong> Your password has been updated. You will be redirected back to the edit page.</div>
        <img src='assets/success.gif'></div>";
    } else {
      header('refresh: 3; url=changePwdView.php');
      echo '<div class="alert alert-danger"><strong>OOPS!</strong> Looks like something went wrong.... Check your data and try again.</div>
        <img src="assets/aaron.gif"></div>';
    }
  } else {
    header('refresh: 3; url=changePwdView.php');
    echo '<div class="alert alert-danger"><strong>OOPS!</strong> Looks like your old password was incorrect, or your passwords do not match. Please try again.</div>
        <img src="assets/aaron.gif"></div>';
  }
} else {
  header('refresh: 3; url=changePwdView.php');
  echo '<div class="alert alert-danger"><strong>OOPS!</strong> Looks like your passwords do not match. Please try again.</div>
        <img src="assets/aaron.gif"></div>';
}
echo '</div>';
?>