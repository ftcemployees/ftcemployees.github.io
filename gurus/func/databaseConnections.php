<?php
/**
 * Created by PhpStorm.
 * User: mando0975
 * Date: 4/27/2017
 * Time: 1:48 PM
 */

/**
 * both of these functions are based on examples given here
 * https://www.w3schools.com/php/php_mysql_select.asp
 */

/**
 * queryDatabase is a generic function to query and return data from
 * the guru_ratings database.
 * @param $query -> pass in the SQL query you wish to execute
 * @return array -> returns an array of the database responses
 */
function queryDatabase($query) {
    $servername = "ftcemp";
    $username = "bryan";
    $password = "bryan";
    $dbname = "guru_ratings";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $conn = null;
        return $result;
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}


/**
 * a function that allows you to easily update a table in the database
 * @param $query -> the update query you wish to execute
 * @return bool -> returns true if update successful, false if an error occurred.
 */
function updateDatabase($query) {
    $servername = "ftcemp";
    $username = "bryan";
    $password = "bryan";
    $dbname = "guru_ratings";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "$query";

        // Prepare statement
        $stmt = $conn->prepare($sql);

        // execute the query
        $stmt->execute();

        // echo a message to say the UPDATE succeeded
        echo '<script>';
        $rcount= $stmt->rowCount();
        echo "console.log($rcount);";
        echo "console.log('rows updated');";
        echo '</script>';
        $conn = null;
        return $stmt->rowCount();
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
    return 0;
    $conn = null;
}
