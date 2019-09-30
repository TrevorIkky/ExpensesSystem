
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

function viewAll(){
  var x=document.getElementById("InventoryTable");
  var y=document.getElementById("InventoryTable drinks");
  var z=document.getElementById("InventoryTable fooditems");
  
  if(x.style.display=="none"){
    x.style.display="block";
    }else{
    x.style.display="none";
    }
        
    if(y.style.display=="none"){
    y.style.display="block";
    }else{
    y.style.display="none";
    }
    
    // if(z.style.display=="none"){
    // z.style.display="block";
    // }else{
    // z.style.display="none";
    // }

    }

function viewDrinks(){
  var x=document.getElementById("InventoryTable drinks");
  var y=document.getElementById("InventoryTable");
  var z=document.getElementById("InventoryTable fooditems");

  if(x.style.display=="none"){
    x.style.display="block";
  }else{
    x.style.display="none";
  }
  
  //  if(y.style.display=="none"){
  //    y.style.display="block";
  //  }else{
  //    y.style.display="none";
  //  }
  
  // if(z.style.display=="none"){
  //   z.style.display="block";
  // }else{
  //   z.style.display="none";
  // }

}

function viewFood(){

}
