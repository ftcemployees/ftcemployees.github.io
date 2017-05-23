<?php
/**
 * Created by PhpStorm.
 * User: Mando0975
 * Date: 4/28/2017
 * Time: 10:43 AM
 */
    require_once "../partials/logVal.php";
    require_once "func/databaseConnections.php";
    require_once "func/functions.php";

?>
<!DOCTYPE html>
<html>
<head>
        <?php require_once "../partials/head.html"; ?>
        <link href="gurus/css/employeeStyle.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="gurus/js/scripts.js"></script>
</head>
<body>
    <?php require_once "../partials/nav.php";?>
    <div class="container">
            <h1>Employee Information</h1>
            <div class="row">
<!--                searches the table by using a javascript function-->
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
                  <input type="text" id="search" class="form-control" onkeyup="search('search','empTable')" placeholder="Search for employee">
                </div>

            </div>
            <div class="row table-responsive">
                <table class="table table-responsive" id="empTable">
                    <thead>
                        <tr class="header">
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Assignment</th>
                        </tr>
                    </thead>
                    <tbody id="empTabBod">
                        <?php
                            // grap a list of all the employees from the database
                            // and populate the table
                            $emps = getEmployees();
                            foreach($emps as $row) {
                                $name = $row["Full Name"];
                                $phone = $row["Phone Number"];
                                $email = $row["Email"];
                                $assign = $row["Assignment"];

                                echo "<tr>";
                                echo "<td class='item1'>$name</td>";
                                echo "<td>$phone</td>";
                                echo "<td>$email</td>";
                                echo "<td>$assign</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
    </div>
</body>
</html>