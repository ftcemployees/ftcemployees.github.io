<?php
/**
 * Created by PhpStorm.
 * User: Bryan Muller
 * Date: 4/27/2017
 * Time: 12:36 PM
 */
require_once "../partials/logVal.php";
require_once "func/databaseConnections.php";
require_once "func/functions.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require_once "../partials/head.html"; ?>
        <link rel="stylesheet" href="gurus/css/ratingsStyle.css" type="text/css">
        <script type="text/javascript" src="gurus/js/ajaxScripts.js"></script>
    </head>
    <body>
        <?php require_once "../partials/nav.php" ?>
        <div class="container">
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
                        buildCatSelect("table")

                        /**
                         * some comments on workflow here...
                         * buildCatSelect builds a select menu that looks like this
                         * <select id="catSelect" class="form-control" onchange="showApplication(this.value)">
                         * the onchange attribute calls showApplication(), which will fill the div.id="appSelectDiv"
                         * with another select menu for applications. This one will look like this:
                         * <select id="appSelect" class="form-control" onchange="showRatings(this.value)">
                         * showRatings is similar to showApplications, but instead of building a select menu,
                         * it prints table rows within div.id="rateTable"
                         */

                        ?></div>

                    <div class="col-md-5" id="appSelectDiv"><!-- Filled by showApplication --></div>
                  <div class="col-md-2">
                    <a id="edit" role="button" class="btn btn-primary" href="gurus/editRatings.php">Edit my ratings</a>
                  </div>
                </div>
                <div class="row">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th class="col-md-3">Name</th>
                                <th class="col-md-3">Application</th>
                                <th class="col-md-3">Rating</th>
                                <th class="col-md-3" style="text-align: center">Certified</th>
                            </tr>
                        </thead>
                        <tbody id="rateTable">
                            <!--Filled by showRatings-->
                        </tbody>
                    </table>
                </div>
            </div>
    </body>
</html>