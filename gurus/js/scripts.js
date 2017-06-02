/**
 * Created by Mando0975 on 4/28/2017.
 */

/**********************************************
 * for the employee view page
 */


/**
 * a function that filters a table based on a given input
 *
 * @param inp -> the item being searched for
 * @param tab -> the table being filtered
 */
function search(inp, tab) {
  var input, filter, table, tr, td, i;
  input = document.getElementById(inp);
  filter = input.value.toUpperCase();
  table = document.getElementById(tab);
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}


/********************************
 * For the personal info page
 */

/**
 * this function will make the fields on the personal info page editable
 *
 **/
function editInfo() {
  document.getElementById('edit').disabled = true;
  // document.getElementById('edit').style.display = "none";
  console.log("did edit");
  document.getElementById('update').disabled = false;
  // document.getElementById('update').style.display = "inherit";
   console.log("did update");
  document.getElementById('cancel').disabled = false;
  // document.getElementById('cancel').style.display = "inherit";
   console.log("did cancel");
  var inputs = document.getElementsByTagName('input');
  for (var i = 0; i < inputs.length; i++) {
    inputs[i].disabled = false;
     console.log("did input:" + i);
  }
}

function disableEdit() {
   document.getElementById('edit').disabled = false;
   // document.getElementById('edit').style.display = "inherit";
   document.getElementById('update').disabled = true;
   // document.getElementById('update').style.display = "none";
   document.getElementById('cancel').disabled = true;
   // document.getElementById('cancel').style.display = "none";
   var inputs = document.getElementsByTagName('input');
   for (var i = 0; i < inputs.length; i++) {
      inputs[i].disabled = true;
   }
   document.getElementById('infoForm').reset();
}

function enableCatEdit(id) {
   document.getElementById(id).disabled = false;
}