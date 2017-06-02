<?php
/**
 * Created by PhpStorm.
 * User: Mando0975
 * Date: 5/30/2017
 * Time: 1:46 PM
 */

if(!session_id()) {
  session_start();
}

if (!$_SESSION['admin']) {
  header("Location: /ftcweb/login.php");
  die();
}