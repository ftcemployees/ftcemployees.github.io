<!DOCTYPE html>
<html lang="en">

<head>
    <title>FTC Employees | Home</title>
    <?php require_once "partials/head.html"; ?>
    <link rel="stylesheet" type="text/css" href="css/homepage.css" />
</head>

<body>
      <?php require_once "partials/nav.php"; ?>

        <div class="container-fluid">

          <a href="staticPages/flscrn_announce.html" >
          <div class="banner">
          </div>
          </a>
          <div class="row" id="dropdowns">
            <div class="col-lg-4">
              <button id="FTCLinksButton" class="btn btn-primary btn-block collapseBtn" data-toggle="collapse" data-target="#FTCLinks">FTC Team Daily Links</button>
              <div id="FTCLinks" class="collapse">
                <div class="flex-parent">
                  <div class="flex-child">
                    <a href="https://byui.brightspace.com/d2l/login?noredirect=true" target="_blank">
                        <span class="glyphicon glyphicon-education"></span>
                        <p>I-Learn</p>
                    </a>
                  </div>
                  <div class="flex-child">
                    <a href="https://eos.byui.edu:8445/desktop/container/?locale=en_US" target="_blank">
                        <span class="glyphicon glyphicon-phone-alt"></span>
                        <p>Cisco</p>
                    </a>
                  </div>
                  <div class="flex-child">
                    <a href="https://www.myworkday.com/byuhi/d/home.htmld" target="_blank">
                        <span class="glyphicon glyphicon-usd"></span>
                        <p>Workday</p>
                    </a>
                  </div>
                  <div class="flex-child">
                    <a href="https://outlook.office.com/owa/?realm=byui.edu&exsvurl=1&ll-cc=1033&modurl=0" target="_blank">
                        <span class="glyphicon glyphicon-envelope"></span>
                        <p>Outlook</p>
                    </a>
                  </div>
                  <div class="flex-child">
                    <a href="https://td.byui.edu/tdnext/login.aspx" target="_blank">
                        <span class="glyphicon glyphicon-stats"></span>
                        <p>Team Dynamix</p>
                    </a>
                  </div>
                  <div class="flex-child">
                    <a href="https://trello.com/b/EEOy2BuC/projects" target="_blank">
                        <span class="glyphicon glyphicon-dashboard"></span>
                        <p>Trello</p>
                    </a>
                  </div>
                  <div class="flex-child">
                    <a href="https://inet.byui.edu/sites/FTC/_layouts/15/start.aspx#/" target="_blank">
                        <span class="glyphicon glyphicon-cloud"></span>
                        <p>Sharepoint</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <button id="programLinksButton" class="btn btn-primary btn-block collapseBtn" data-toggle="collapse" data-target="#FTCPrograms">Program Links</button>
              <div class="collapse" id="FTCPrograms">
                <div class="flex-parent">
                  <div class="flex-child">
                    <a href="https://secure.byui.edu/cas/login?service=https%3A%2F%2Fbyui.az1.qualtrics.com%2FControlPanel%2F" target="_blank">
                        <span class="glyphicon glyphicon-question-sign"></span>
                        <p>Qualtrics</p>
                    </a>
                  </div>
                  <div class="flex-child">
                    <a href="https://content.byui.edu/home.do" target="_blank">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <p>Equella</p>
                    </a>
                  </div>
                  <div class="flex-child">
                    <a href="https://video.byui.edu/" target="_blank">
                        <span class="glyphicon glyphicon-film"></span>
                        <p>Kaltura</p>
                    </a>
                  </div>
                  <div class="flex-child">
                    <a href="https://byui.mapleta.com/byui/login/login.do" target="_blank">
                        <span class="glyphicon glyphicon-leaf"></span>
                        <p>Maple TA</p>
                    </a>
                  </div>
                  <div class="flex-child">
                    <a href="https://na9cps.adobeconnect.com/system/login?domain=byui.adobeconnect.com&next=%2Fadmin%3Fdomain%3Dbyui.adobeconnect.com&set-lang=en" target="_blank">
                        <span class="glyphicon glyphicon-user"></span>
                        <p>Adobe Connect</p>
                    </a>
                  </div>
                  <div class="flex-child">
                    <a href="https://accounts.logme.in/login.aspx?clusterid=02&returnurl=https%3A%2F%2Fwww.join.me%2Ffederated%2Floginsso.aspx%3Ffwdto%3D&headerframe=https%3A%2F%2Fwww.join.me%2Ffederated%2Fresources%2Fheaderframe.aspx&productframe=https%3A%2F%2Fwww.join.me%2Ffederated%2Fresources%2Fdefaultframe.aspx&lang=en-US&skin=joinme&regtype=X&trackingproducttype=1&trackinguniqueid=cef52e9a-91f7-461f-81b6-7d87809e044c" target="_blank">
                        <span class="glyphicon glyphicon-play-circle"></span>
                        <p>Join.me</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <button id="otherLinksButton" class="btn btn-primary btn-block collapseBtn" data-toggle="collapse" data-target="#OtherLinks">Other Links</button>
              <div class="collapse" id="OtherLinks">
                <div class="flex-parent">
                  <div class="flex-child">
                    <a href="http://byu-idaho.screenstepslive.com/s/16915/m/65029" target="_blank">
                        <span class="glyphicon glyphicon-flag"></span>
                        <p>FTC Guides</p>
                    </a>
                  </div>
                  <div class="flex-child">
                    <a href="https://content.byui.edu/home.do" target="_blank">
                        <span class="glyphicon glyphicon-off"></span>
                        <p>Weekly Brief</p>
                    </a>
                  </div>
                  <div class="flex-child">
                    <a href="https://drive.google.com/drive/my-drive" target="_blank">
                        <span class="glyphicon glyphicon-hdd"></span>
                        <p>FTC G-Drive</p>
                    </a>
                  </div>
                  <div class="flex-child">
                    <a href="https://byu-idaho.screenstepslive.com/login" target="_blank">
                        <span class="glyphicon glyphicon-file"></span>
                        <p>Screensteps</p>
                    </a>
                  </div>
                  <div class="flex-child">
                    <a href="https://web.byui.edu/directory/employees/" target="_blank">
                        <span class="glyphicon glyphicon-list-alt"></span>
                        <p>Employee Directory</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <script>

            $(document).ready(function () {
              $("#FTCLinksButton").click();
              $("#programLinksButton").click();
              $("#otherLinksButton").click();
            });
</script>

</body>

</html>
