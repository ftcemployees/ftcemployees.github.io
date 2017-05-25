<?php
/**
 * Created by PhpStorm.
 * User: Bryan Muller
 * Date: 4/27/2017
 * Time: 2:07 PM
 */
require_once "databaseConnections.php";


/****
 * This function builds a select input from an array of categories returned
 * from the gururatings->categories table.
 * This select menu has an id of catSelect, and calls the showApplication() function
 * when the item is changed.
 * see documentation for showApplication() in js/ajaxScripts.js
 */
function buildCatSelect($i) {
  // for docmuentation on queryDatabase() see databaseConnections.php
  $info = queryDatabase("SELECT * FROM `catagories` WHERE 1");
  echo '<div class="form-group">
            <label for="catSelect">Select Category</label>';
  if($i == "view") {
    echo '<select id="catSelect" class="form-control" onchange="showApplication(this.value)">';
  } elseif ($i =="edit") {
    echo '<select id="catSelect" class="form-control" onchange="showEditor(this.value)">';
  } elseif ($i == "adminEdit") {
    echo '<select id="catSelect" class="form-control" onchange="showAdminEditor(this.value)">';
  } elseif($i == "adminAdd") {
    echo '<select id="catSelect" class="form-control">';
  } else {
    echo '<select id="catSelect" class="form-control" onchange="showApplication(this.value)">';
  }
  echo '<option>Select A Category</option>';
  foreach ($info as $row) {
    $item = $row["Category"];
    $val = $row["CatId"];
    echo "<option value='$val'>$item</option>";
  }
  echo "</select></div>";
}


/**
 * A simple function that returns all the catagories
 * as an array
 * @return array
 */
function getCategories() {
  return queryDatabase("SELECT * FROM `catagories` WHERE 1");
}

/**
 * a simple function that returns all the applications
 * as an array
 * @return array
 */
function getApplications() {
  return queryDatabase("SELECT * FROM `applications` WHERE 1");
}


/**
 * a simple function that returns all the employees
 * as an array
 * @return array
 */
function getEmployees() {
  return queryDatabase("SELECT * FROM `employee_info` WHERE `Active` = 1");
}
