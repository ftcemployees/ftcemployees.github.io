<?php
/**
 * Created by PhpStorm.
 * User: Mando0975
 * Date: 5/30/2017
 * Time: 1:49 PM
 */


require_once "../../partials/logVal.php";
require_once "adminVal.php";
require_once "../func/databaseConnections.php";
require_once "../func/functions.php";

?>

<!DOCTYPE html>
<html>
<head>
  <?php require_once "../../partials/head.html"; ?>
  <script type="text/javascript" src="gurus/js/scripts.js"></script>
  <script type="text/javascript" src="gurus/js/ajaxScripts.js"></script>
  <link rel="stylesheet" type="text/css" href="gurus/css/editEmpAdmin.css" />
</head>
<body>
<?php require_once "../../partials/nav.php"; ?>
<div class="container">
  <h1>Manage Employees</h1>

  <div class="row">
    <!--                searches the table by using a javascript function-->
    <div class="input-group form-inline">
      <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
      <input type="text" id="search" class="form-control" onkeyup="search('search','empTable')"
             placeholder="Search for employee">
      <a role="button" class="btn btn-primary input-group-addon" data-toggle='modal' data-target='#addEmp'>Add New
        Employee</a>
    </div>

  </div>

  <div class="row table-responsive">
    <table class="table table-responsive" id="empTable">
      <thead>
      <tr class="header">
        <th>Name</th>
        <th>Email</th>
        <th>Team</th>
        <th>Assignment</th>
        <th>Active</th>
        <th>Admin</th>
        <th>Update</th>
      </tr>
      </thead>
      <tbody id="empTabBod">
      <?php
      // grap a list of all the employees from the database
      // and populate the table
      $emps = queryDatabase("SELECT * FROM `employee_info` WHERE 1");
      $teams = queryDatabase("SELECT * FROM `teams` WHERE 1");
      foreach ($emps as $row) {
        $name = $row["Full Name"];
        $empId = $row["ID"];
        $email = $row["Email"];
        $assign = $row["Assignment"];
        $team = $row["Team"];
        $active = $row["Active"];
        $admin = $row["Admin"];

        echo "<tr>";
        echo "<td>$name</td>";
//        echo "<form method='post' action='adminEmpUpdate.php'>";
        echo "<td><input class='form-control' type='email' name='$email' id='$email' value='$email'></td>";
        echo "<td><select class='form-control' id='$email" . "Team'>";
        foreach ($teams as $t) {
          $id = $t["TeamId"];
          $tm = $t["Team"];
          if ($team == $id) {
            echo "<option value='$id' selected>$tm</option>";
          } else {
            echo "<option value='$id'>$tm</option>";
          }
        }
        echo "</select></td>";
        echo "<td><input class='form-control' type='text' id='$email" . "Assign' value='$assign'></td>";
        if ($active) {
          echo "<td><input class='form-control checkbox' type='checkbox' checked id='$email" . "Active'></td>";
        } else {
          echo "<td><input type='checkbox' class='form-control checkbox' id='$email" . "Active'></td>";
        }
        if ($admin) {
          echo "<td><input class='form-control checkbox' type='checkbox' checked id='$email" . "Admin'></td>";
        } else {
          echo "<td><input type='checkbox' class='form-control checkbox' id='$email" . "Admin'></td>";
        }
        echo "<td><button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#myModal' onclick='updateEmp(\"$email\", \"$empId\")'>Save</button></td>";
//        echo "</form>";
        echo "</tr>";
      }
      ?>
      </tbody>
    </table>

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

    <div class="modal fade" id="addEmp" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add New Employee</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="input-group">
                  <label for="fname">First Name: </label>
                  <input class="form-control" required type="text" id="fname" name="fname">
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-group">
                  <label for="lname">Last Name: </label>
                  <input type="text" id="lname" required name="lname" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="input-group">
                  <label for="email">Email: </label>
                  <input type="email" id="email" required name="email" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-group">
                  <label for="assign">Assignment: </label>
                  <input type="text" id="assign" name="assign" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="input-group">
                  <label for="username">Username: </label>
                  <input type="text" id="username" name="username" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-group">
                  <label for="pwd">Password: </label>
                  <input type="text" id="pwd" name="pwd" class="form-control">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" onclick="addEmp()" data-dismiss="modal" data-toggle="modal" data-target="#myModal">Add Employee</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>
</html>
