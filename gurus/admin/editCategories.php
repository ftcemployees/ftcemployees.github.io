<?php
/**
 * Created by PhpStorm.
 * User: Mando0975
 * Date: 5/24/2017
 * Time: 8:58 AM
 */

require_once "../../partials/logVal.php";
require_once "../func/databaseConnections.php";
require_once "../func/functions.php";

?>

<!DOCTYPE html>
<html>
  <head>
    <?php require_once "../../partials/head.html"; ?>
    <script type="text/javascript" src="gurus/js/scripts.js"></script>
  </head>
  <body>
    <?php require_once "../../partials/nav.php"; ?>
  <div class="container">
    <section id="add">
      <div class="row">
        <div class="col-sm-6">
          <h3>Edit Categories</h3>
        </div>
        <div class="col-sm-6">
          <h3>Add Guru Application Category</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 form-group">
          <?php
          $cats = getCategories();
          $i=0;
          foreach($cats as $row) {
            $cat = $row["Category"];
            $tempId = "eCat" . $i;
//            echo $tempId;
            echo '<div class="input-group">';
            echo "<span class='input-group-addon' onclick='enableCatEdit(\"$tempId\")'><i class='glyphicon glyphicon-edit'></i></span>";
            echo "<input type='text' class='form-control' value='$cat' id='$tempId' disabled>";
            echo "</div>";
            $i++;
          }
          ?>
          <br>
          <button class="btn btn-primary" onclick="">Update Categories</button>
        </div>
        <div class="col-sm-6 form-group form-inline">
          <input type="text" name="newCat" id="newCat" class="form-control">
          <button type="button" id="newCatBtn" class="btn btn-primary" onclick="">Add Category</button>

        </div>
      </div>
    </section>
    <hr>
    <section id="edit">
      <div class="row">
        <div class="col-sm-6">
          <h3>Edit Applications</h3>

        </div>
        <div class="col-sm-6">
          <h3>Add Guru Application</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 form-group form-inline">
          <input type="text" name="newApp" id="newApp" class="form-control">
          <button type="button" id="newAppBtn" class="btn btn-primary" onclick="">Add App</button>
        </div>
      </div>
    </section>
  </div>
  </body>
</html>
