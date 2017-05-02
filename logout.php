<?php
/**
 * Created by PhpStorm.
 * User: Mando0975
 * Date: 5/2/2017
 * Time: 8:47 AM
 */
session_start();
session_destroy();
echo 'Thank you for loggin out';
header('Location: login.php');

?>