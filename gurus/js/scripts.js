/**
 * Created by mando0975 on 4/27/2017.
 */
function showApplication(str) {
    console.log("launching apps");
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","func/getapps.php?q="+str,true);
        xmlhttp.send();
    }
}


function showRatings(str) {
    console.log("launching Ratings");
    if (str == "") {
        console.log("empty");
        document.getElementById("table").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","func/getratings.php?q="+str,true);
        xmlhttp.send();
    }
}