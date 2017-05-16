<?php
/**
 *
 *
 * Created by PhpStorm.
 * User: Bryan Muller
 * Date: 5/2/2017
 * Time: 1:47 PM
 *
 * This page can be included on any php page that you want to be restricted
 * to users who are logged in.
 *
 */

if(!session_id()) {
    session_start();
}

if (!$_SESSION['logon']) {
    header("Location: /ftcweb/login.php");
    die();
}