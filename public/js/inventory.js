
function searchAll() {
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

function searchDrinks() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("inventory-search-drinks");
  filter = input.value.toUpperCase();
  table = document.getElementById("inventory-table-drinks");
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

function searchFood() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("inventory-search-food");
  filter = input.value.toUpperCase();
  table = document.getElementById("inventory-table-food");
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
$(".flipper").click(function() {
  var target = $( event.target );
  if ( target.is("a") ) {
    //follow that link
    return true;
  } else {
    $(this).toggleClass("flip");
  }
  return false;
});

function viewAll(){
  var w=document.getElementById("InventoryTable crockery");
  var x=document.getElementById("InventoryTable");
  var y=document.getElementById("InventoryTable drinks");
  var z=document.getElementById("InventoryTable fooditems");
  
  if(x.style.display=="none"){
    x.style.display="block";
    }else{
    x.style.display="none";
    }
       
    if(w.style.display=="block"){
      w.style.display="none";
      }else{
      w.style.display="none";
      }

    if(y.style.display=="block"){
     y.style.display="none";
     }else{
     y.style.display="none";
     }
    
      if(z.style.display=="block"){
      z.style.display="none";
      }else{
      z.style.display="none";
      }

    }

function viewDrinks(){
  var fd=document.getElementById("footer-text-drinks");
  var ff=document.getElementById("footer-text-fooditems");
  var fc=document.getElementById("footer-text-crockery");
  var w=document.getElementById("InventoryTable crockery");
  var x=document.getElementById("InventoryTable drinks");
  var y=document.getElementById("InventoryTable");
  var z=document.getElementById("InventoryTable fooditems");

  if(x.style.display=="none"){
    x.style.display="block";
  }else{
    x.style.display="none";
  }
 
  if(fc.style.display=="block"){
    fc.style.display="none";
    }else{
    fc.style.display="none";
    }

  if(ff.style.display=="block"){
      ff.style.display="none";
    }else{
      ff.style.display="none";
    }
  if(w.style.display=="block"){
    w.style.display="none";
    }else{
    w.style.display="none";
    }
  if(y.style.display=="block"){
    y.style.display="none";
    }else{
     y.style.display="none";
   }
  
  if(z.style.display=="block"){
     z.style.display="none";
    }else{
     z.style.display="none";
  0 }

}

function viewFood(){
  var fd=document.getElementById("footer-text-drinks");
  var ff=document.getElementById("footer-text-fooditems");
  var fc=document.getElementById("footer-text-crockery");
  var w=document.getElementById("InventoryTable crockery");
  var x=document.getElementById("InventoryTable fooditems");
  var y=document.getElementById("InventoryTable");
  var z=document.getElementById("InventoryTable drinks");
  

  if(x.style.display=="none"){
    x.style.display="block";
  }else{
    x.style.display="none";
  }
  
  if(fc.style.display=="block"){
    fc.style.display="none";
    }else{
    fc.style.display="none";
    }

  if(w.style.display=="block"){
    w.style.display="none";
    }else{
    w.style.display="none";
    }
  
    if(y.style.display=="block"){
      y.style.display="none";
    }else{
      z
      y.style.display="none";
    } 
    
   if(z.style.display=="block"){
     z.style.display="none";
   }else{
     z.style.display="none";
   }
}

function viewCrockery(){

  var ff=document.getElementById("footer-text-fooditems");
  var fc=document.getElementById("footer-text-crockery");
  var fd=document.getElementById("footer-text-drinks");
  var w=document.getElementById("InventoryTable");
  var x=document.getElementById("InventoryTable crockery");
  var y=document.getElementById("InventoryTable drinks");
  var z=document.getElementById("InventoryTable fooditems");

  if(x.style.display=='none'){
    x.style.display="block";
  }else{
    x.style.display="none";
  }

  if(ff.style.display=='block'){
    ff.style.display="none";
  }else{
    ff.style.display="none";
  }

  if(fc.style.display=='none'){
    fc.style.display="block";
  }else{
    fc.style.display="none";
  }

  if(fd.style.display=='block'){
    fd.style.display="none";
  }else{
    fd.style.display="none";
  }

  if(w.style.display=='block'){
    w.style.display="none";
  }else{
    w.style.display="none";
  }

  if(y.style.display=='block'){
    y.style.display="none";
  }else{
    y.style.display="none";
  }

  if(z.style.display=='block'){
    z.style.display="none";
  }else{
    z.style.display="none";
  }
}

function insertDrinks(){
  var x=document.getElementById("insertform-drinks");
  if(x.style.display=='none'){
    x.style.display="block";
  }else{
    x.style.display="none";
  }
}

function insertFood(){
  var x=document.getElementById("insertform-fooditems");
  if(x.style.display=='none'){
    x.style.display="block";
  }else{
    x.style.display="none";
  }
}

function insertCrockery(){
  var x=document.getElementById("insertform-crockery");
  if(x.style.display=='none'){
    x.style.display="block";
  }else{
    x.style.display="none";
  }
}

// function editDrinks(){
//   var x=document.getElementById("insertform-drinks");
//   var y=document.getElementById("edit-column-drinks");
//   var z=document.getElementById("delete-column-drinks");
//   if(x.style.display=='block'){
//     x.style.display="none";
//   }else{
//     x.style.display="none";
//   }

//   if(y.style.display=='none'){
//     y.style.display="block";
//   }else{
//     y.style.display="none";
//   }

  
//   if(z.style.display=='block'){
//     z.style.display="none";
//   }else{
//     z.style.display="none";
//   }
// }

// function deleteDrinks(){
//   var x=document.getElementById("delete-column-drinks");
//   var y=document.getElementById("insertform-drinks");
//   var z=document.getElementById("edit-column-drinks");

//   if(x.style.display=='none'){
//     x.style.display="block";
//   }else{
//     x.style.display="none";
//   }

//   if(y.style.display=='block'){
//     y.style.display="none";
//   }else{
//     y.style.display="none";
//   }

//   if(z.style.display=='block'){
//     z.style.display="block";
//   }else{
//     z.style.display="none";
//   }
// }

