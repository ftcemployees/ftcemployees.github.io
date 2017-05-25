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
 *
 */

define("ROW_COUNT", 1);
define("RESULTS", 2);
define("SERVERNAME", "ftcemp");
define("USERNAME", "bryan");
define("PASSWORD", "bryan");
define("DBNAME", "guru_ratings");

function queryDatabase($query) {

    $servername = SERVERNAME;
    $username = USERNAME;
    $password =  PASSWORD;
    $dbname = DBNAME;
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
      echo "<script>console.log(Error: " . $e->getMessage() . "/);</script>";
    }
    $conn = null;
}


function getAppSelect($cat) {
  $servername = SERVERNAME;
  $username = USERNAME;
  $password =  PASSWORD;
  $dbname = DBNAME;
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query = "SELECT `AppID`, `Application`  FROM `applications` WHERE `CatId` = :cat";
      $stmt = $conn->prepare($query);
      $stmt->bindValue(":cat", $cat, PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetchAll();
      $conn = null;
      return $result;
  }
  catch(PDOException $e) {
    echo "<script>console.log(Error: " . $e->getMessage() . "/);</script>";
  }
  $conn = null;
}


/**
 * a function that allows you to easily update a table in the database
 * @param $query -> the update query you wish to execute
 * @return bool -> returns true if update successful, false if an error occurred.
 */
function updateDatabase($query) {
    $servername = SERVERNAME;
    $username = USERNAME;
    $password =  PASSWORD;
    $dbname = DBNAME;

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
      echo "<script>console.log(Error: " . $e->getMessage() . "/);</script>";
    }
    return 0;
    $conn = null;
}


/**
 * The function that logs in the user. It can have three return types based
 * on the queryType provided. quryTypes should be constants that are defined at the
 * beginning of this file.
 * @param $user -> the username we will be fetching
 * @param $queryType -> an int that defines the return type
 * @return array|int|null
 */
function loginUser($user, $queryType) {
    $servername = SERVERNAME;
    $username = USERNAME;
    $password =  PASSWORD;
    $dbname = DBNAME;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT `ID`, `Username`, `Password`, `First Name`, `Admin` FROM `employee_info` WHERE `Username` = :username";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':username', $user, PDO::PARAM_STR);
        $stmt->execute();
        $conn = null;
        if ($queryType == ROW_COUNT) {
            return $stmt->rowCount();
        } elseif ($queryType == RESULTS) {
            return $stmt->fetchAll();
        } else {
            return null;
        }
    }
    catch(PDOException $e) {
      echo "<script>console.log(Error: " . $e->getMessage() . "/);</script>";
    }
    $conn = null;
}


/**
 * @param $first
 * @param $last
 * @param $user
 * @param $phone
 * @param $email
 * @return int
 */
function updateEmpInfo($first, $last, $user, $phone, $email) {
    $servername = SERVERNAME;
    $username = USERNAME;
    $password =  PASSWORD;
    $dbname = DBNAME;

    $full = $first . " " . $last;
    $id = $_SESSION["id"];
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "UPDATE `employee_info` SET `First Name`=:first,`Last Name`=:last,`Phone Number`=:phone,`Email`=:email,`Full Name`=:full,`Username`=:username WHERE `ID` = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':first', $first, PDO::PARAM_STR);
        $stmt->bindValue(':last', $last, PDO::PARAM_STR);
        $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':full', $full, PDO::PARAM_STR);
        $stmt->bindValue(':username', $user, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $conn = null;
        return $stmt->rowCount();
    } catch(PDOException $e) {
      echo "<script>console.log(Error: " . $e->getMessage() . "/);</script>";
    }
}

function pushRatings($appId, $rating, $empId) {
  $servername = SERVERNAME;
  $username = USERNAME;
  $password =  PASSWORD;
  $dbname = DBNAME;
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "UPDATE `gururatings` SET `Rating`= :rating WHERE `AppId` = :appId AND `EmpId` = :empId";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':rating', $rating, PDO::PARAM_INT);
    $stmt->bindValue(':appId', $appId, PDO::PARAM_INT);
    $stmt->bindValue(':empId', $empId, PDO::PARAM_INT);
    $stmt->execute();
    $conn = null;
    $rows = $stmt->rowCount();
    return $stmt->rowCount();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}


function updatePassword($newPwd, $empId) {
  $servername = SERVERNAME;
  $username = USERNAME;
  $password =  PASSWORD;
  $dbname = DBNAME;
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "UPDATE `employee_info` SET `Password`= :newPwd WHERE `ID` = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':newPwd', $newPwd, PDO::PARAM_STR);
    $stmt->bindValue(':id', $empId);
    $stmt->execute();
    $conn = null;
    return $stmt->rowCount();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
