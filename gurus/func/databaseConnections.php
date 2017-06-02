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
        $query = "UPDATE `employee_info` SET `First Name`=:first,`Last Name`=:last,`Phone Number`=:phone,`Email`=:email,`Full Name`=:full,`Username`=:username, `Last_Modified` = CURRENT_TIMESTAMP WHERE `ID` = :id";
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
    $query = "UPDATE `gururatings` SET `Rating`= :rating, `Last_Modified` = CURRENT_TIMESTAMP WHERE `AppId` = :appId AND `EmpId` = :empId";
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


function pushAppUpdate($id, $name) {
  $servername = SERVERNAME;
  $username = USERNAME;
  $password =  PASSWORD;
  $dbname = DBNAME;
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "UPDATE `applications` SET `Application`= :app, `Last_Modified` = CURRENT_TIMESTAMP WHERE `AppID` = :appId";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':app', $name, PDO::PARAM_STR);
    $stmt->bindValue(':appId', $id, PDO::PARAM_INT);
    $stmt->execute();
    $conn = null;
    $rows = $stmt->rowCount();
    return $stmt->rowCount();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}


function pushCatUpdate($id, $name) {
  $servername = SERVERNAME;
  $username = USERNAME;
  $password =  PASSWORD;
  $dbname = DBNAME;
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "UPDATE `categories` SET `Category`= :cat, `Last_Modified` = CURRENT_TIMESTAMP WHERE `CatId` = :catId";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':cat', $name, PDO::PARAM_STR);
    $stmt->bindValue(':catId', $id, PDO::PARAM_INT);
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
    $query = "UPDATE `employee_info` SET `Password`= :newPwd, `Last_Modified` = CURRENT_TIMESTAMP WHERE `ID` = :id";
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


function pushCatAdd($val) {
  $servername = SERVERNAME;
  $username = USERNAME;
  $password =  PASSWORD;
  $dbname = DBNAME;
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "INSERT INTO `categories`(`Category`) VALUES (:val)";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':val', $val, PDO::PARAM_STR);
    $stmt->execute();
    $conn = null;
    return $stmt->rowCount();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}


function pushAppAdd($cat, $val) {
  $servername = SERVERNAME;
  $username = USERNAME;
  $password =  PASSWORD;
  $dbname = DBNAME;
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "INSERT INTO `applications`(`Application`, `CatId`) VALUES (:val, :cat);";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':val', $val, PDO::PARAM_STR);
    $stmt->bindValue(':cat', $cat, PDO::PARAM_INT);
    $stmt->execute();
    return $conn->lastInsertId();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}


function addGuruApp($appId, $empId) {
  $servername = SERVERNAME;
  $username = USERNAME;
  $password = PASSWORD;
  $dbname = DBNAME;

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "INSERT INTO `gururatings` (`EmpId`, `AppId`) VALUES (:emp, :app)";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':emp', $empId, PDO::PARAM_INT);
    $stmt->bindValue(':app', $appId, PDO::PARAM_INT);
    $stmt->execute();
    $conn = null;
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

}

function updateEmpAdmin($id, $newMail, $newTeam, $newAssign, $newActive, $newAdmin) {
  $servername = SERVERNAME;
  $username = USERNAME;
  $password = PASSWORD;
  $dbname = DBNAME;

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    $query = "UPDATE `employee_info` SET `Email`= :newEmail, `Team` = :newTeam, `Assignment` = :newAssign, `Active` = :newActive, `Admin` = :newAdmin, `Last_Modified` = CURRENT_TIMESTAMP WHERE `ID` = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->bindValue(':newEmail', $newMail, PDO::PARAM_STR);
    $stmt->bindValue(':newTeam', $newTeam, PDO::PARAM_INT);
    $stmt->bindValue(':newAssign', $newAssign, PDO::PARAM_STR);
    $stmt->bindValue(':newActive', $newActive, PDO::PARAM_INT);
    $stmt->bindValue(':newAdmin', $newAdmin, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
  } catch (PDOException $e) {
    echo "error: " . $e->getMessage();
  }
}


function addEmp($fname, $lname, $email, $assign, $user, $pwd) {
  $servername = SERVERNAME;
  $username = USERNAME;
  $password = PASSWORD;
  $dbname = DBNAME;
  $fullname = $fname . " " . $lname;

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    $query = "INSERT INTO `employee_info` (`First Name`, `Last Name`, `Email`, `Assignment`, `Full Name`, `Username`, `Password`) VALUES (:fname, :lname, :email, :assign, :fullName, :username, :pwd)";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':fname', $fname, PDO::PARAM_STR);
    $stmt->bindValue(':lname', $lname, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':assign', $assign, PDO::PARAM_STR);
    $stmt->bindValue(':fullName', $fullname, PDO::PARAM_STR);
    $stmt->bindValue(':username', $user, PDO::PARAM_STR);
    $stmt->bindValue(':pwd', $pwd, PDO::PARAM_STR);
    $stmt->execute();
    return $conn->lastInsertId();
  } catch (PDOException $e) {

  }
}
