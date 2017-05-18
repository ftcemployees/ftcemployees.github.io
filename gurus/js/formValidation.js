/**
 * Created by Mando0975 on 5/18/2017.
 */


function validRating(id, elemId) {
   var pattern = /^\d$|10$/;
   console.log(id);
   var input = document.getElementById(id);
   if (input.value.match(pattern)) {
      document.getElementById(elemId).style.visibility = "hidden";
      document.getElementById("sub").disabled = false;
      return true;
   } else {
      document.getElementById(elemId).style.visibility = "visible";
      document.getElementById("sub").disabled = true;
      return false;
   }
}