<?php
/**
 * Created by PhpStorm.
 * User: mando0975
 * Date: 4/27/2017
 * Time: 2:07 PM
 */
require_once "databaseConnections.php";

function buildCatSelect() {
    $info = queryDatabase("SELECT * FROM `catagories` WHERE 1");
    echo '<div class="form-group"> 
            <select id="catSelect" class="form-control" onchange="showApplication(this.value)">
            <option>Select A Category</option>';
    foreach($info as $row) {
        $item = $row["Category"];
        $val = $row["CatId"];
        echo "<option value='$val'>$item</option>";
    }
    echo "</select></div>";
}

