<?php
/**
 * Created by PhpStorm.
 * User: Mando0975
 * Date: 4/28/2017
 * Time: 10:43 AM
 */

    require_once "gurus/func/databaseConnections.php";
    require_once "gurus/func/functions.php";
?>
<!DOCTYPE html>
<html>
<head>
        <?php require_once "partials/head.html"; ?>
        <link href="gurus/css/employeeStyle.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="gurus/js/scripts.js"></script>
</head>
<body>
    <?php require_once "partials/nav.php";?>
    <div class="container">
        <div class="well">
            <h1>Employee Information</h1>
            <div class="row">
                <input type="text" id="search" class="form-control" onkeyup="search('search','empTable')" placeholder="Search for employee">
            </div>
            <div class="row table-responsive">
                <table class="table table-hover" id="empTable">
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
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>