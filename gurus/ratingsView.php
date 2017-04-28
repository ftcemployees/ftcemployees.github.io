<?php
/**
 * Created by PhpStorm.
 * User: Bryan Muller
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
        <script type="text/javascript" src="js/ajaxScripts.js"></script>
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

                <?php
                /******
                 * Here begins the creation of the Guru's ratings table.
                 * Brief overview, we are going to build two drop-down select
                 * menus that are built using data from the database, the first is
                 * for the application categories, the second is for the application
                 */
                ?>
                <div class="row">
                    <div class="col-md-5"><?php
                        // see documentation in func/functions.php
                        buildCatSelect()

                        /**
                         * some comments on workflow here...
                         * buildCatSelect builds a select menu that looks like this
                         * <select id="catSelect" class="form-control" onchange="showApplication(this.value)">
                         * the onchange attribute calls show application, which will fill the div.id="appSelectDiv"
                         * with another select menu for applications. This one will look like this:
                         * <select id="appSelect" class="form-control" onchange="showRatings(this.value)">
                         * showRatings is similar to showApplications, but instead of building a select menu,
                         * it prints table rows within div.id="rateTable"
                         */

                        ?></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5" id="appSelectDiv"><!-- Filled by showApplication --></div>
                </div>
                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Application</th>
                                <th>Rating</th>
                                <th>Certified</th>
                            </tr>
                        </thead>
                        <tbody id="rateTable">
                            <!--Filled by showRatings-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
