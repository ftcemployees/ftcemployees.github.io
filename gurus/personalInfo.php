<!DOCTYPE html>
<html>
<head>
  <?php
  require_once "../partials/head.html";
  require_once "func/databaseConnections.php";
  require_once "func/functions.php";
  require_once "../partials/logVal.php";
  ?>

  <link href="gurus/css/editInfoStyle.css" type="text/css" rel="stylesheet">
  <script src="gurus/js/scripts.js" type="text/javascript"></script>
  <script src="gurus/js/ajaxScripts.js" type="text/javascript"></script>
</head>
<body>
<?php
require_once "../partials/nav.php";
$id = $_SESSION["id"];
$dataInfo = queryDatabase("SELECT `First Name`, `Last Name`,`Phone Number`, `Email`, `Assignment`, `Username` FROM `employee_info` WHERE `ID` = $id");
$userInfo = $dataInfo[0];
?>

<div class="container">
    <h2>Your Information</h2>
    <form class="form-inline" method="post" id="infoForm" action="gurus/func/updateEmpInfo.php">
      <div class="row">

        <div class="form-group col-sm-6">
          <label for="fname">First Name: </label>
          <input disabled type="text" class="form-control inputs" id="fname"
                 value="<?php echo $userInfo["First Name"]; ?>" name="fname">
        </div>
        <div class="form-group col-sm-6">
          <label for="phone">Phone: </label>
          <input disabled type="text" class="form-control inputs" id="phone"
                 value="<?php echo $userInfo["Phone Number"]; ?>" name="phone">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-6">
          <label for="lname">Last Name: </label>
          <input disabled type="text" class="form-control  inputs" id="lname"
                 value="<?php echo $userInfo["Last Name"]; ?>" name="lname">
        </div>
        <div class="form-group col-sm-6">
          <label for="email">Email: </label>
          <input disabled type="email" class="form-control inputs" id="email"
                 value="<?php echo $userInfo["Email"]; ?>" name="email">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-6">
          <label for="username">Username: </label>
          <input disabled type="text" class="form-control inputs" id="username"
                 value="<?php echo $userInfo["Username"]; ?>" name="username">
        </div>
        <div class="form-group col-sm-6">
          <label for="assign">Assignment: </label>
          <p class="inputs" id="assign"><?php echo $userInfo["Assignment"]; ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
            <button class="btn btn-primary" id="edit" onclick="editInfo()">Edit Your Info</button>
            <button disabled class="btn btn-primary" type="button" id="updateEmp" onclick="updateInfo()" data-toggle='modal' data-target='#myModal' style="display:none;">Update Your Info</button>
            <button disabled class="btn btn-info" type="reset" id="cancel"  onclick="disableEdit()" style="display:none;">Cancel</button>
            <a role="button" class="btn btn-warning" id="pwd" href="gurus/func/changePwdView.php">Change Password</a>
        </div>
      </div>
    </form>
</div>
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Message</h4>
      </div>
      <div class="modal-body">
        <div class="row" id="message"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="setTimeout(function(){
            window.location.reload(1);
         }, 0000);">Close
        </button>
      </div>
    </div>
  </div>
</div>

</body>
