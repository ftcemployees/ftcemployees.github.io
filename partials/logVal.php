<?php
/**
 * Created by PhpStorm.
 * User: Mando0975
 * Date: 5/2/2017
 * Time: 1:47 PM
 */

if(!session_id()) {
    session_start();
}

if (!$_SESSION['logon']) {
    header("Location: /ftcweb/login.php");
    die();
}