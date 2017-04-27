<?php
/**
 * Created by PhpStorm.
 * User: mando0975
 * Date: 4/27/2017
 * Time: 12:36 PM
 */
require_once "func/databaseConnections.php";
require_once "func/functions.php"
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require_once "../partials/head.html"; ?>
        <link rel="stylesheet" href="css/ratingsStyle.css" type="text/css">
        <script type="text/javascript" src="js/scripts.js"></script>
    </head>
    <body>
        <?php require_once "../partials/nav.html"?>
        <div class="container">
            <div class="well">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6" id="header">
                        <h1>FTC Guru's Ratings</h1>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="padding"></div>
                <div class="row">
                    <div class="col-md-5"><?php buildCatSelect() ?></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5" id="txtHint"></div>
                </div>
                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Application</th>
                                <th>Rating</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
