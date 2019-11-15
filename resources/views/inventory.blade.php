<<<<<<< HEAD
@extends('master')
@section('main-content')
@extends('error')
<div class="inventory-container">
    <div class="inventory-toolbar">
        <p class="valign-wrapper" id="inventory-title">Inventory</p>
        <div class="valign-wrapper inventory-toolbar">
            <form id = "search-form" action= "{{url('/inventory/search')}}" method="GET" class="search-container">
              {{csrf_field()}}
                <input id = "query" name="query" style="width:200px; margin-top:3px; height:30px; border-bottom: none !important; outline: none !important; font-size: 15px;" class="search-text" type="text" placeholder="Search...">
            </form>

            <div class="add-product-rtl">
                <div class="valign-wrapper">
                    <i style="margin-right:10px;" class="material-icons ">add</i>
                </div>
                <div class="valign-wrapper">
                    <p style="background:transparent; color: black;  box-shadow: none !important;" data-target="modal1" class="btn modal-trigger">Add Product</p>
                </div>

            </div>
        </div>
    </div>

<form id = "inv-options-form" action= "{{url('/inventory/options')}}" method="GET">
              {{csrf_field()}}
                <div class="inventory-options">
        <select name = "options" id = "inv-options">
         <option>Choose an Option</option>
            <option value="1">In Stock</option>
            <option value="2">Out of Stock</option>
        </select>
        <label>Options</label>
    </div>
              
            </form>
  

    <div class="editable-table">
        <h6 class="make-bold">Name</h6>
        <h6 class="make-bold">Group</h6>
        <h6 class="make-bold">Price</h6>
        <h6 class="make-bold">Quantity</h6>
        <h6 class="make-bold">Vendor</h6>
    </div>

    <div class="horizontal-seperator"></div>

    @if (count($inventory)>0)
    @foreach ($inventory as $item)

    <div style = "margin-left:-17px;"class="editable-table accordion">
        <h6>{{$item->name}}</h6>
        <h6>{{$item->type}}</h6>
        <h6>{{$item->costPerUnit}}</h6>
        <h6>{{$item->inventoryAmount}}</h6>
        <h6>{{$item->vendor}}</h6>
    </div>
        
  


    <div class="panel">
    <p style=" color: darkcyan;">#{{$item->foodTypeNo}}</p>
        <form id= {{$item->foodTypeNo}} method="POST" enctype="multipart/form-data" action="{{url('/inventory/update',['id'=>$item->foodTypeNo])}}">
         {{csrf_field()}}
            <div class="padding10 expandable-table">
                <div>
                    <img id="inventory-image" width="95px" height="90px" src= {{$item->url}}>
            
                    <div style = "height:30px; margin-top: 0px; width:120px; margin-left:30px;" class="file-field input-field">
    <input name = "image" type="file">
    <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Upload a file">
    </div>
</div>
                </div>

                <div class="marginright10 input-field col s6">
                    <input placeholder="Item Name" name = "name" value =  {{$item->name}}  id="name" type="text" class="validate">
                    <label for="name">Item Name</label>
                </div>

                <div class="marginright10 input-field col s6">
                    <input placeholder = "Inventory Amount"  name ="inv-amt"id="inv-amt" value = {{$item->inventoryAmount}} type="text" class="validate">
                    <label for="inv-amt">Inventory Amount</label>
                </div>

                <div class="marginright10 input-field col s6">
                    <input placeholder = "Vendor" id="vendor" name="vendor" value = {{$item->vendor}} type="text" class="validate">
                    <label for="vendor">Vendor</label>
                </div>

                <div class="marginright10 input-field col s6">
                    <input placeholder = "Quantity" name="quantity" id="quantity" value = {{$item->quantity}} type="text" class="validate">
                    <label for="quantity">Quantity</label>
                </div>

                <div class="marginright10 input-field col s6">
                    <input id="costPerItem" name="costPerItem" placeholder = "Cost per Item" value={{$item->costPerUnit}} type="text" class="validate">
                    <label for="costPerItem">Cost per Item</label>
                </div>

                   <input name="imgUrl"  value = "{{$item->url}}" type="hidden" >

            </div>
        </form>
        <div style="display:flex; justify-content: center;">

         <div onclick="updateInvItem({{$item->foodTypeNo}})" style=" cursor: pointer; color: darkcyan;margin-top:-60px; margin-bottom:20px;" class="change-img">
            <div class="valign-wrapper">
                <i class="material-icons ">done</i>
            </div>
            <div class="valign-wrapper">
                <p>Apply Change</p>
            </div>
        </div>

         <form id="del-{{$item->foodTypeNo}}" action="{{url('/inventory/delete',['id'=>$item->foodTypeNo])}}" method="POST">
          {{ csrf_field() }}
         </form>



         <div onclick="deleteInvItem({{$item->foodTypeNo}})" style="margin-left:50px; cursor: pointer; color: red; margin-top:-60px; margin-bottom:20px;" class="change-img">
            <div class="valign-wrapper">
                <i class="material-icons ">delete</i>
            </div>
            <div class="valign-wrapper">
                <p>Delete Item</p>
            </div>
        </div>        
        </div>
       
    </div>

      <div class="horizontal-seperator"></div>

@endforeach        
    @else

    <div style="text-align:center; min-width: 100%">
    No data to display!
    </div>
        
    @endif

<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <form id="inventory-add-form" method="POST" action="{{url('/inventory/add')}}">
            {{csrf_field()}}
            <div class="row">
                <h5>Add an item to the inventory</h5>
                <div class="input-field col s6">
                    <input placeholder="Item Name" id="name" name="name" type="text" class="validate">
                    <label for="name">Item Name</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Unit of Measurement" name ="measurement" id="measurement" type="text" class="validate">
                    <label for="measurement">Unit of Measurement</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Quantity"  name ="qty" id="qty" type="text" class="validate">
                    <label for="qty">Quantity</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Cost per Unit" name ="cost" id="cost" type="text" class="validate">
                    <label for="cost">Cost Per Unit</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Vendor"  name ="vendor" type="text" class="validate">
                    <label for="vendor">Vendor</label>
                </div>
            </div>

            <div style="padding:10px;">
                <select name = "type">
                    <option value="Food Item">Food Item</option>
                    <option value="Crockery">Crockery</option>
                    <option value="Drinks">Drinks</option>
                </select>
                <label>Options</label>
            </div>
    </div>
    </form>
    <div class="modal-footer">
        <a id= "add-to-inventory" href="#!" class="modal-close waves-effect waves-green btn-flat">ADD</a>
=======
@extends('master') @extends('error') @section('main-content')

<div id="inventory">
    <h1>INVENTORY</h1>
</div>

@if(Session::has('message'))
<div class="message" id="session">
    <p>{{ Session::get('message') }}</p>
</div>
@endif

<body class="inventorybody">
    <section id="custom">
        <div class="container">
            <div class="row">

                <div class="col s12 m5 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="images/drinks.jpg" alt="drinks" onclick="viewDrinks()">
                            <a class="btn modal-trigger red btn-floating halfway-fab pulse activator" href="#modal1" ><i class="material-icons">add</i></a>
                            
                        </div>
                        <div class="card-content white-text">
                            <h5 class="card-title" onclick="viewDrinks()">Drinks</h5>
                            <p class="card-text">Views drinks in stock</p>
                        </div>
                        <div class="card-action" id="footer-text-drinks">
                            <div class="card-notification">
                                <p>Viewing Drinks</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s12 m5 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="images/crockery.jpg" alt="crockery" onclick="viewCrockery()">
                            <a class="btn modal-trigger red btn-floating halfway-fab pulse activator" href="#modal2"><i class="material-icons">add</i></a>
                        </div>
                        <div class="card-content white-text">
                            <h5 class="card-title" onclick="viewCrockery()">Crockery</h5>
                            <p class="card-text">Views crockery in stock</p>
                        </div>
                        <div class="card-action" id="footer-text-crockery" style="display: none">
                            <div class="card-notification">
                                <p>Viewing Crockery</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s12 m5 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="images/groceries.jpg" class="card-img-top" alt="FoodItems" onclick="viewFood()">
                            <a class="btn modal-trigger red btn-floating halfway-fab pulse activator" href="#modal3"><i class="material-icons">add</i></a>
                        </div>
                        <div class="card-content white-text">
                            <h5 class="card-title" onclick="viewFood()">Food Items</h5>
                            <p class="card-text">Views food items in stock</p>
                        </div>
                        <div class="card-action" id="footer-text-fooditems" style="display: none">
                            <div class="card-notification">
                                <p>Viewing food items</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="view button">
            <button type="button" class="btn" onclick="viewAll()">View All</button>
        </div>
    </section>

    <div class="inventorytable" id="InventoryTable" style="display: none">
        <div class="searchbar">
            <input  id="inventory-search" type="text" onkeyup="search()" placeholder="Search Item Type">
        </div>
        <table class="centered" id="Inventory-Table">

            <thead>
                <tr>
                    <th>Item No.</th>
                    <th>Item Type</th>              
                    <th>Inventory Amount</th>       
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody id="inventory-table">
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->inventoryType }}</th>
                    <td>{{ $user->itemType }}</td>       
                    <td>{{ $user->inventoryAmount }}</td>              
                    <td>{{ $user->quantity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="inventorydrinks" id="InventoryTable drinks">
        <div class="searchbar">
            <input id="inventory-search-drinks" type="text" onkeyup="searchDrinks()" placeholder="Search Drink Name">
        </div>
        <div class="printIcon">
        <a class=" blue btn-floating halfway-fab " href="" ><i class="material-icons">print</i></a>
        
        </div>
        
        <table class="highlight" id="Inventory-Table">
            <thead>
                <tr>

                    <th>Drink Number</th>
                    <th>Drink Name</th>
                    <th>Unit of Measurement</th>
                    <th>Inventory Amount</th>
                    <th>Cost per Unit</th>
                    <th>Total Cost</th>
                    <th>Vendor</th>
                    <th>Quantity</th>
                </tr>

            </thead>
            <tbody id="inventory-table-drinks">
                @foreach ($drinks as $drink)
                <tr>
                    <th scope="row">{{ $drink->DrinkNo }}</th>
                    <td>{{ $drink->DrinkName }}</td>
                    <td>{{ $drink->unitOfMeasurement }}</td>
                    <td>{{ $drink->inventoryAmount }}</td>
                    <td>{{ $drink->costPerUnit }}</td>
                    <td>{{ $drink->totalCost }}</td>
                    <td>{{ $drink->vendor }}</td>
                    <td>{{ $drink->quantity }}</td>
                    <td id="edit-column-drinks"><a href='edit/{{ $drink->DrinkNo }}'><i class="material-icons">edit</i></a></td>
                    <td id="delete-column-drinks"><a href='delete/{{ $drink->DrinkNo }}'><i class="material-icons">delete</i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div id="insertfield">
            <button type="button" class="btn" onclick="insertDrinks()" style="color:rgb(0, 0, 0)">Insert New</button>
        </div>

    </div>

    <div id="insertform-drinks" style="display: none">

        <form action="insert" id="drinksform" method="POST">
            {{csrf_field()}}
            <div class="row">
                <div class="insertfield">
                    <input type="text" class="insertfield" name="DrinkName" placeholder="Drink Name">

                </div>


                <div class="insertfield">
                    <input type="text" class="insertfield" name="unitOfMeasurement" placeholder="Unit of Measurement">

                </div>

                <div class="insertfield">
                    <input type="text" class="insertfield" name="inventoryAmount" placeholder="Inventory Amount">

                </div>

                <div class="insertfield">
                    <input type="text" class="insertfield" name="costPerUnit" placeholder="Cost per Unit">

                </div>

                <div class="insertfield">
                    <input type="text" class="insertfield" name="totalCost" placeholder="Total Cost">

                </div>

                <div class="insertfield">
                    <input type="text" class="insertfield" name="vendor" placeholder="Vendor">

                </div>

                <div class="insertfield">
                    <input type="text" class="insertfield" name="quantity" placeholder="Quantity">

                </div>
            </div>
            <button type="submit" class="button-submit">Submit</button>
        </form>
    </div>

    <div class="inventoryfood" id="InventoryTable fooditems" style="display: none">
        <div class="searchbar">
            <input  id="inventory-search-food" type="text" onkeyup="searchFood()" placeholder="Search Food Name">
        </div>
        <table class="table-bordered" id="Inventory-Table">
            <thead>
                <tr>

                    <th>Food TypeNo</th>
                    <th>Food Item Name</th>
                    <th>Unit of Measurement</th>
                    <th>Inventory Amount</th>
                    <th>Cost per Unit</th>
                    <th>Total Cost</th>
                    <th>Vendor</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody id="inventory-table-food">
                @foreach ($foods as $food)
                <tr>
                    <th scope="row">{{ $food->foodTypeNo }}</th>
                    <td>{{ $food->FoodItemName }}</td>
                    <td>{{ $food->unitOfMeasurement }}</td>
                    <td>{{ $food->inventoryAmount }}</td>
                    <td>{{ $food->costPerUnit }}</td>
                    <td>{{ $food->totalCost }}</td>
                    <td>{{ $food->vendor }}</td>
                    <td>{{ $food->quantity }}</td>
                    <td><a href="editFood/{{ $food->foodTypeNo }}"><i class="material-icons">edit</i></a></td>
                    <td><a href="deleteFood/{{ $food->foodTypeNo }}"><i class="material-icons">delete</i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="insertbutton"id="insertfield">
            <button type="button" class="btn" onclick="insertFood()" style="color:rgb(0, 0, 0)" ;>Insert New</button>
        </div>

    </div>

    <div id="insertform-fooditems" style="display: none">

        <form action="insertFood" id="fooditemsform" method="POST">
            {{csrf_field()}}

            <div class="insertfield">
                <input type="text" class="insertfield" name="FoodItemName" placeholder="Food Item Name">
            </div>

            <div class="insertfield">
                <input type="text" class="insertfield" name="unitOfMeasurement" placeholder="Unit Of Measurement">
            </div>

            <div class="insertfield">
                <input type="text" class="insertfield" name="inventoryAmount" placeholder="Inventory Amount">
            </div>

            <div class="insertfield">
                <input type="text" class="insertfield" name="costPerUnit" placeholder="Cost Per Unit">
            </div>

            <div class="insertfield">
                <input type="text" class="insertfield" name="totalCost" placeholder="Total Cost">
            </div>

            <div class="insertfield">
                <input type="text" class="insertfield" name="vendor" placeholder="Vendor">
            </div>

            <div class="insertfield">
                <input type="text" class="insertfield" name="quantity" placeholder="Quantity">
            </div>
            <button type="submit" class="button-submit">Submit</button>
        </form>
    </div>

    <div class="inventorycrockery" id="InventoryTable crockery" style="display: none">
        <div class="searchbar">
            <input  id="inventory-search-crockery" type="text" onkeyup="searchCrockery()" placeholder="Search Crockery Name">
        </div>
        <table class="table-bordered" id="Inventory-Table">
            <thead>
                <tr>

                    <th>Crockery ID</th>
                    <th>Crockery Name</th>
                    <th>Quantity</th>

                </tr>
            </thead>
            <tbody id="inventory-table">
                @foreach ($crockery as $crockery)
                <tr>
                    <th scope="row">{{ $crockery->crockeryid }}</th>
                    <td>{{ $crockery->crockeryname }}</td>
                    <td>{{ $crockery->quantity }}</td>
                    <td>
                        <a href="editCrockery/{{ $crockery->crockeryid }}"><i class="material-icons">edit</i></a>
                    </td>

                    <td><a href="destroyCrockery/{{ $crockery->crockeryid }}"><i class="material-icons">delete</i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div id="insertfield">
            <button type="button" class="btn" onclick="insertCrockery()" style="color:rgb(0, 0, 0)">Insert New</button>
        </div>
    </div>




    <div id="insertform-crockery" style="display: none">

        <form action="insertCrockery" id="crockeryform" method="POST">
            {{csrf_field()}}

            <div class="insertfield">
                <input type="text" class="insertfield" name="crockeryname" placeholder="Crockery Name">
            </div>

            <div class="insertfield">
                <input type="text" class="insertfield" name="quantity" placeholder="Quantity">
            </div>

            <button type="submit" class="button-submit">Submit</button>
        </form>
    </div>
    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Insert Drink</h4>
            <form action="insert" id="drinksform" method="POST">
                {{csrf_field()}}
                <div class="insertfield">
                    <input type="text" class="insertfield" name="DrinkName" placeholder="Drink Name">
                </div>

                <div class="insertfield">
                    <input type="text" class="insertfield" name="unitOfMeasurement" placeholder="Unit of Measurement">
                </div>

                <div class="insertfield">
                    <input type="text" class="insertfield" name="inventoryAmount" placeholder="Inventory Amount">
                </div>

                <div class="insertfield">
                    <input type="text" class="insertfield" name="costPerUnit" placeholder="Cost per Unit">
                </div>

                <div class="insertfield">
                    <input type="text" class="insertfield" name="totalCost" placeholder="Total Cost">
                </div>

                <div class="insertfield">
                    <input type="text" class="insertfield" name="vendor" placeholder="Vendor">
                </div>

                <div class="insertfield">
                    <input type="text" class="insertfield" name="quantity" placeholder="Quantity">
                </div>
                <button type="submit" class="button-submit">Submit</button>
            </form>

        </div>

    </div>

    <div id="modal2" class="modal">
        <div class="modal-content">
            <h4>Insert Crockery</h4>
            <form action="insertCrockery" id="crockeryform" method="POST">
                {{csrf_field()}}

                <div class="insertfield">
                    <input type="text" class="insertfield" name="crockeryname" placeholder="Crockery Name">
                </div>

                <div class="insertfield">
                    <input type="text" class="insertfield" name="quantity" placeholder="Quantity">
                </div>
                <button type="submit" class="button-submit">Submit</button>
            </form>

        </div>
>>>>>>> 8bf12c6cd3296751120a1dd9868d22b12dbb4c9c
    </div>
</div>
<script defer>
  $(document).ready(function(){
    $('select').formSelect();
     $('.modal').modal();
     $('#inv-options').change(function(){
         $('#inv-options-form').submit();
     })
  });

<<<<<<< HEAD

  $('#add-to-inventory').on('click',function(){
      $('#inventory-add-form').submit();
  })


 

  function updateInvItem(id){
  $('#'+id).submit();
  }

  
  function deleteInvItem(id){
  $('#del-'+id).submit();
  }

  $("#query").on('keyup', function (e) {
    if (e.keyCode == 13) {
        $('#search-form').submit();
    }
});



var acc = document.getElementsByClassName("editable-table accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
=======
    <div id="modal3" class="modal">
        <div class="modal-content">
            <h4>Insert Food</h4>
            <form action="insertFood" id="fooditemsform" method="POST">
                {{csrf_field()}}

                <div class="insertfield">
                    <input type="text" class="insertfield" name="FoodItemName" placeholder="Food Item Name">
                </div>

                <div class="insertfield">
                    <input type="text" class="insertfield" name="unitOfMeasurement" placeholder="Unit Of Measurement">
                </div>

                <div class="insertfield">
                    <input type="text" class="insertfield" name="inventoryAmount" placeholder="Inventory Amount">
                </div>

                <div class="insertfield">
                    <input type="text" class="insertfield" name="costPerUnit" placeholder="Cost Per Unit">
                </div>

                <div class="insertfield">
                    <input type="text" class="insertfield" name="totalCost" placeholder="Total Cost">
                </div>

                <div class="insertfield">
                    <input type="text" class="insertfield" name="vendor" placeholder="Vendor">
                </div>

                <div class="insertfield">
                    <input type="text" class="insertfield" name="quantity" placeholder="Quantity">
                </div>

                <button type="submit" class="button-submit">Submit</button>
            </form>

        </div>

    </div>
</body>
<script type="text/javascript" src="{{url ('js/inventory.js') }}" defer></script>
<script type="text/javascript" src="/js/inventory.js"></script>
<script type="text/javascript" src="/js/tables.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/w/dt/dt-1.10.18/datatables.min.js"></script>

<script>
    document.getElementById('edit_crockery').addEventListener('click', () => {
        document.getElementById('edit_crockery_form').submit();
    });
>>>>>>> 8bf12c6cd3296751120a1dd9868d22b12dbb4c9c
</script>
@endsection