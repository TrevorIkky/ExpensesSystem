function search() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("inventory-search");
  filter = input.value.toUpperCase();
  table = document.getElementById("inventory-table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function view(){
        var x=document.getElementById("InventoryTable");
        if(x.style.display=="none"){
            x.style.display="block";
        }else{
            x.style.display="none";
        }
    }

