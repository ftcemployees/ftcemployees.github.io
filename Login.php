<?php
/**
 * Created by PhpStorm.
 * User: Mando0975
 * Date: 5/2/2017
 * Time: 8:28 AM
 */

?>

<!DOCTYPE html>
<html>
<head>
    <?php
        require_once "partials/head.html";
        require_once "gurus/func/databaseConnections.php";
        require_once "gurus/func/functions.php";
    ?>

    <link href="gurus/css/login.css" type="text/css" rel="stylesheet">
</head>
<body>
    <?php require_once "partials/nav.php"; ?>
    <div class="container">
        <form class="form-signin" method="POST">
            <h2 class="form-signin-heading">Please Login</h2>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">@</span>
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </form>
    </div>
</body>
</html>



<?php
//Start the Session
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password =  filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    // $hashed = password_hash($password, PASSWORD_DEFAULT);

//3.1.2 Checking the values are existing in the database or not
//    $query = "SELECT `Username`, `Password`, `First Name` FROM `employee_info` WHERE `Username` = '$username'";

    $result = loginUser($username, RESULTS);
    $count = loginUser($username, ROW_COUNT);

//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
    if ($count == 1 && password_verify($password, $result[0]["Password"])){
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $result[0]["First Name"];
        $_SESSION['logon'] = true;
        $_SESSION['id'] = $result[0]["ID"];
        $_SESSION['admin'] = $result[0]['Admin'];
    }else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
        echo '<h4 style="text-align: center;">Invalid username or password, please try again</h4>';
        $fmsg = "Invalid Login Credentials.";
    }
}
//3.1.4 if the user is redirected to the homepage
if (isset($_SESSION['username'])){
    header("Location: index.php");
    die();
}else {
//3.2 do nothing
}
?>
