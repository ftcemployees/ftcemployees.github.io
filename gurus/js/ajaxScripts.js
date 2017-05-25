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
           console.log(this.responseText);
            document.getElementById("updateAppMsg").innerHTML = this.responseText;
         }
      };
      console.log("opening");
      xmlhttp.open("POST", "gurus/func/updateApps.php?q=" + str, true);
      xmlhttp.send();
   }
}
