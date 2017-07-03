<?php
/**
 * Created by PhpStorm.
 * User: Mando0975
 * Date: 5/18/2017
 * Time: 1:25 PM
 */
require_once "../partials/logVal.php";
require_once "func/databaseConnections.php";
require_once "func/functions.php";



?>
<!DOCTYPE html>
<html>
  <head>
    <?php require_once "../partials/head.html"; ?>
    <link rel="stylesheet" type="text/css" href="gurus/css/editRatingsStyle.css">
    <script type="text/javascript" src="gurus/js/ajaxScripts.js"></script>
    <script type="text/javascript" src="gurus/js/formValidation.js"></script>
  </head>
  <body>
    <?php require_once "../partials/nav.php"; ?>
    <div class="container">
      <div class="well">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6" id="header">
            <h1>Edit Ratings For <?php echo $_SESSION["name"]; ?></h1>
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
            buildCatSelect("edit")

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
          <div class="col-md-7"></div>
        </div>
        <div class="row">
          <form action="gurus/func/updateRatings.php" method="post">
          <table class="table table-responsive">
            <thead>
            <tr>
              <th class="col-md-3">Application</th>
              <th class="col-md-3">Previous Rating</th>
              <th class="col-md-3">New Rating</th>
              <th style="text-align: center" class="col-md-3">Certification Status</th>
            </tr>
            </thead>
            <tbody id="editTable">
            <!--Filled by showEditor-->
            </tbody>
          </table>
            <button class="btn btn-primary" type="button" id="sub" disabled data-toggle='modal' data-target='#myModal' onclick="updateRatings()">Update</button>
          </form>
      </div>

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
</html>