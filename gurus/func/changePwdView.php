<?php
/**
 * Created by PhpStorm.
 * User: Mando0975
 * Date: 5/23/2017
 * Time: 1:17 PM
 */

?>

<!DOCTYPE html>
<html>
<head>
  <?php
  require_once "../../partials/head.html";
  require_once "databaseConnections.php";
  require_once "functions.php";
  require_once "../../partials/logVal.php";
  ?>
</head>
<body>
<?php
  require_once "../../partials/nav.php";
?>

<div class="container">
  <form action="gurus/func/changePwd.php" method="post">
    <div class="row">
      <h3>Please enter your old password:</h3>
    </div>
    <div class="row">
      <input class="form-control" type="password" name="oldPwd" id="oldPwd" placeholder="Old Password"/>
    </div>
    <div class="row">
      <h3>Please enter and confirm your new password:</h3>
    </div>
    <div class="row">
      <input class="form-control" type="password" name="newPwd" id="newPwd" placeholder="New Password"/>
      <input class="form-control" type="password" name="confirmPwd" id="confirmPwd" placeholder="Confirm Password"/>
    </div>
    <div class="row">
      <button type="submit" name="subPwd" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>

</body>
</html>
