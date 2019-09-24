$(document).ready(function(){
    $("#inventory-search").on("keyup",function(){
    var value =$(this).val().toLowerCase();
    $("#inventory-table tr").filter(function(){
    $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
    });
    });
    function view(){
        var x=document.getElementById("InventoryTable");
        if(x.style.display=="none"){
            x.style.display="block";
        }else{
            x.style.display="none";
        }
    }
    function search() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("inventory-search");
        filter = input.value.toUpperCase();
        table = document.getElementById("Inventory-Table");
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

    });