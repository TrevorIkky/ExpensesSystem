
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
  var w=document.getElementById("InventoryTable crockery");
  var x=document.getElementById("InventoryTable drinks");
  var y=document.getElementById("InventoryTable");
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
  0 }

}

function viewFood(){
  var w=document.getElementById("InventoryTable crockery");
  var x=document.getElementById("InventoryTable fooditems");
  var y=document.getElementById("InventoryTable");
  var z=document.getElementById("InventoryTable drinks");
  

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
  var w=document.getElementById("InventoryTable");
  var x=document.getElementById("InventoryTable crockery");
  var y=document.getElementById("InventoryTable drinks");
  var z=document.getElementById("InventoryTable fooditems");

  if(x.style.display=='none'){
    x.style.display="block";
  }else{
    x.style.display="none";
  }

  if(y.style.display=='block'){
    y.style.display="none";
  }else{
    y.style.display="none";
  }

  if(w.style.display=='block'){
    w.style.display="none";
  }else{
    w.style.display="none";
  }
}

function insertDrinks(){
  var x=document.getElementById("drinksform");
  if(x.style.display=='none'){
    x.style.display="block";
  }else{
    x.style.display="none";
  }
}