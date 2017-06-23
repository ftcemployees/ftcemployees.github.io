<?php
if (!session_id()) {
  session_start();
}
?>
<nav>
<div class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="#"><img alt="FTC logo" src="assets/FTC-Logo.svg"/></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="staticPages/ticketing.php">Ticketing</a></li>
        <li><a href="staticPages/issue-routing.php">Issue Routing</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Forms&nbsp;<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="staticPages/start-week-log.php">Start of Week Brief</a></li>
            <li><a href="staticPages/weekly-log.php">End of Week Brief</a></li>
            <li><a href="staticPages/kudos.php">Kudos</a></li>
            <li><a href="staticPages/tutorial-request.php">Tutotial Request</a></li>
          </ul>
        </li>
        <?php
        if (isset($_SESSION["username"])) {
          echo '<li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                 Employee Tools<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="gurus/employeeView.php">Employee List</a></li>
                                <li><a href="gurus/ratingsView.php">Gurus</a></li>
                            </ul>
                            </li>';
        }
        if (isset($_SESSION["admin"]) && $_SESSION["admin"]) {
          echo '<li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                 Admin Tools<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a href="gurus/admin/editEmps.php">Edit Employees</a></li>
                               <li><a href="gurus/admin/editGurus.php">Edit Gurus</a></li>
                            </ul>
                            </li>';
        }
        ?>

      </ul>
      <?php
      if (isset($_SESSION["username"])) {
        $user = $_SESSION["name"];
        echo "<ul class='nav navbar-nav navbar-right'>
                                <li><a href='gurus/personalInfo.php'>Welcome $user</a></li>
                                <li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span>Logout</a></li></ul>";
      } else {
        echo "<ul class='nav navbar-nav navbar-right'>
                            <li><a>Welcome Guest</a></li>
                            <li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span>Login</a></li></ul>";

      }
      ?>
    </div>
  </div>
</div>
</nav>
