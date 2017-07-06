/**
 * Created by Bryan Muller on 4/27/2017.
 */


/**
 * Both of these functions are based on the example here
 * https://www.w3schools.com/php/php_ajax_php.asp
 */

/**
 * showApplications is used to update the Application dropdown select
 * when a new category is selected in the category select menu.
 * It does this by making an ajax call to func/getapps.php
 * It will place the html returned by the php file in whichever
 * element has the id appSelect.
 * @param str -> the ID of the category that was selected
 */
function showApplication(str) {
   console.log("launching apps");
   if (str == "") {
      document.getElementById("appSelectDiv").innerHTML = "";
      return;
   } else {
      if (window.XMLHttpRequest) {
         // code for IE7+, Firefox, Chrome, Opera, Safari
         xmlhttp = new XMLHttpRequest();
      } else {
         // code for IE6, IE5
         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function () {
         if (this.readyState == 4 && this.status == 200) {
            document.getElementById("appSelectDiv").innerHTML = this.responseText;
         }
      };
      xmlhttp.open("GET", "gurus/func/getapps.php?q=" + str + "&t=0", true);
      xmlhttp.send();
   }
}


/**
 * This function uses Ajax to update the table of guru ratings when a new application
 * is selected. It is similar to showApplications()
 * @param str -> the id of the selected application
 */
function showRatings(str) {
   console.log("launching Ratings");
   if (str == "") {
      console.log("empty");
      document.getElementById("rateTable").innerHTML = "";
      return;
   } else {
      if (window.XMLHttpRequest) {
         // code for IE7+, Firefox, Chrome, Opera, Safari
         xmlhttp = new XMLHttpRequest();
      } else {
         // code for IE6, IE5
         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function () {
         if (this.readyState == 4 && this.status == 200) {
            document.getElementById("rateTable").innerHTML = this.responseText;
         }
      };
      xmlhttp.open("GET", "gurus/func/getratings.php?q=" + str + "&t=0", true);
      xmlhttp.send();
   }
}


function showEditor(str) {

   console.log("launching editor");
   console.log('test');
   if (str == "") {
      console.log('empty');
      document.getElementById("editTable").innerHTML = "";
   } else {
      if (window.XMLHttpRequest) {
         xmlhttp = new XMLHttpRequest();
      } else {
         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function () {
         if (this.readyState == 4 && this.status == 200) {
            document.getElementById("editTable").innerHTML = this.responseText;
            document.getElementById("sub").disabled = true;
         }
      };
      xmlhttp.open("GET", "gurus/func/getratings.php?q=" + str + "&t=1", true);
      xmlhttp.send();
   }

}

/**
*
**/
function showAdminEditor(str) {
   console.log("launching apps");
   if (str == "") {
      document.getElementById("appEdit").innerHTML = "";
      return;
   } else {
      if (window.XMLHttpRequest) {
         // code for IE7+, Firefox, Chrome, Opera, Safari
         xmlhttp = new XMLHttpRequest();
      } else {
         // code for IE6, IE5
         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function () {
         if (this.readyState == 4 && this.status == 200) {
            document.getElementById("appEdit").innerHTML = this.responseText;
         }
      };
      xmlhttp.open("GET", "gurus/func/getapps.php?q=" + str + "&t=1", true);
      xmlhttp.send();
   }
}

function updateApps(str) {
   console.log("launching apps");
   if (str == "") {
      console.log("empty");
      document.getElementById("updateAppMsg").innerHTML = "";
      return;
   } else {
      if (window.XMLHttpRequest) {
         // code for IE7+, Firefox, Chrome, Opera, Safari
         xmlhttp = new XMLHttpRequest();
      } else {
         // code for IE6, IE5
         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function () {
         if (this.readyState == 4 && this.status == 200) {
            document.getElementById("updateAppMsg").innerHTML = this.responseText;
            setTimeout(function(){
              window.location.reload(1);
            }, 3000);
         }
      };

      var params = buildParams('appEdit');

      console.log("opening");
      xmlhttp.open("POST", "gurus/func/updateApps.php?q=" + str + "&t=0", true);

      xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
      xmlhttp.send(params);
   }
}


function updateCategories() {
  console.log("updating Categories");
  if (window.XMLHttpRequest) {
     // code for IE7+, Firefox, Chrome, Opera, Safari
     xmlhttp = new XMLHttpRequest();
  } else {
     // code for IE6, IE5
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function () {
     if (this.readyState == 4 && this.status == 200) {
        document.getElementById("updateCatMsg").innerHTML = this.responseText;
        setTimeout(function(){
          window.location.reload(1);
        }, 3000);
     }
  };

  var params = buildParams('catEdit');

  console.log("opening");
  xmlhttp.open("POST", "gurus/func/updateCats.php?q=0", true);

  xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
  xmlhttp.send(params);
}


function addCategory() {
  console.log("adding Categories");
  if (window.XMLHttpRequest) {
     // code for IE7+, Firefox, Chrome, Opera, Safari
     xmlhttp = new XMLHttpRequest();
  } else {
     // code for IE6, IE5
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function () {
     if (this.readyState == 4 && this.status == 200) {
        document.getElementById("addCatResponse").innerHTML = this.responseText;
        setTimeout(function(){
          window.location.reload(1);
        }, 3000);
     }
  };

  var params = document.getElementById("newCat").name + "=" + document.getElementById("newCat").value;
  console.log(params);
  console.log("opening");
  xmlhttp.open("POST", "gurus/func/updateCats.php?q=1", true);

  xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
  xmlhttp.send(params);
}


function addApps(){
  console.log("adding apps");

     if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
     } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
     }
     xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
           document.getElementById("addAppMsg").innerHTML = this.responseText;
           setTimeout(function(){
              window.location.reload(1);
           }, 3000);
        }
     };

     var params = "newApp="+ document.getElementById("newApp").value + "&cat=" + document.getElementById("addAppCat").value;

     console.log("opening");
     xmlhttp.open("POST", "gurus/func/updateApps.php?t=1", true);

     xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
     xmlhttp.send(params);
}


function updateEmp(email, id){
   var newMail = document.getElementById(email).value;
   var newTeam = document.getElementById(email + "Team").value;
   var newAssign = document.getElementById(email + "Assign").value;
   var newAdmin = document.getElementById(email + "Admin").checked;
   var newActive = document.getElementById(email+ "Active").checked;

   // console.log("mail: ", newMail, "team: ", newTeam, "assign: ", newAssign, "Admin: " , newAdmin, "Active: ", newActive);

   if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
   } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
   }
   xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
         document.getElementById("message").innerHTML = this.responseText;

      }
   };

   var params = "newMail=" + newMail + "&newTeam=" + newTeam + "&newAssign=" + newAssign + "&newAdmin=" + newAdmin + "&newActive=" + newActive + "&id=" + id;
   params = params.trim().replace(/ /g, '%20');
   console.log(params);
   console.log("opening");
   xmlhttp.open("POST", "gurus/admin/adminEmpUpdate.php?q=1", true);

   xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
   xmlhttp.send(params);

}

function addEmp() {
   var fname = document.getElementById('fname').value;
   var lname = document.getElementById('lname').value;
   var email = document.getElementById('email').value;
   var assign = document.getElementById('assign').value;
   var user = document.getElementById('username').value;
   var pwd = document.getElementById('pwd').value;

   if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
   } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
   }
   xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
         document.getElementById("message").innerHTML = this.responseText;

      }
   };

   var params = "fname=" + fname + "&lname=" + lname + "&email=" + email + "&assign=" + assign + "&user=" + user + "&pwd=" + pwd;
   params = params.trim().replace(/ /g, '%20');
   console.log("opening");
   xmlhttp.open("POST", "gurus/admin/adminEmpUpdate.php?q=2", true);

   xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
   xmlhttp.send(params);
}


function updateRatings(){
   var updateCat = document.getElementById("catSelect").value;
   console.log(updateCat);
   if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
   } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
   }
   xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
         document.getElementById("message").innerHTML = this.responseText;

      }
   };

   var params = "updateCat=" + updateCat + "&";
   params += buildParams("ratings");
   params = params.trim().replace(/ /g, '%20');
   console.log("opening");
   console.log(params);
   xmlhttp.open("POST", "gurus/func/updateRatings.php", true);

   xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
   xmlhttp.send(params);

}


function buildParams(className) {
  var inputs = document.getElementsByClassName(className);
  var keys = new Array();
  var vals = new Array();
  for(var i = 0; i < inputs.length; i++) {
    keys.push(inputs[i].name);
    vals.push(inputs[i].value);
  }
  var params = keys[0] + "=" + vals[0];
  for(var i = 1; i < keys.length; i++) {
    params += "&" + keys[i] + "=" + vals[i];
  }
  return params;
}


function updateInfo() {
   var params = buildParams('inputs');
   console.log(params);
   $.post('gurus/func/updateEmpInfo.php', params, function(res, status) {
      $('#message').html(res);
   })
}
