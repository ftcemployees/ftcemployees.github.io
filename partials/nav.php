<?php
    if(!session_id()) {
        session_start();
    }
?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#"><img alt="FTC logo" src="assets/FTC-Logo.svg"/></a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="staticPages/ticketing.php">Ticketing</a></li>
            <li><a href="staticPages/issue-routing.php">Issue Routing</a></li>
            <li><a href="staticPages/weekly-log.php">Weekly Brief</a></li>
            <?php
            if(isset($_SESSION["username"])) {
                echo '<li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                 Employee<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="gurus/employeeView.php">Employees</a></li>
                                <li><a href="gurus/ratingsView.php">Gurus</a></li>
                            </ul>
                            </li>';
            }
            ?>
        </ul>
            <?php
                if(isset($_SESSION["username"])) {
                            $user = $_SESSION["name"];
                            echo "<ul class='nav navbar-nav navbar-right'>
                                <li><a>Welcome $user</a></li>
                                <li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span>Logout</a></li></ul>";
                } else {
                    echo "<ul class='nav navbar-nav navbar-right'>
                            <li><a>Welcome Guest</a></li>
                            <li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span>Login</a></li></ul>";

                }
            ?>
    </div>
</nav>
