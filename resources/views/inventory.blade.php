@extends('master')
@extends('error')
@section('main-content')


<div id="inventory">
 <h1>INVENTORY</h1>
</div>

@if(Session::has('message'))
       <p >{{ Session::get('message') }}</p>
@endif

<section id="custom">
<div id="card-container">
  <div id="cards">

   <div class="card-deck">
        
        <div class="col-auto mb-3">
        <div class="card " id="ctest" >
        
                  <img src="images/drinks.jpg" class="card-img-top" alt="drinks" >
                  <div class="card-body">
                    <h5 class="card-title" onclick="viewDrinks()">Drinks</h5>
                    <p class="card-text">Views drinks in stock</p>
                  </div>
                  <div class="card-footer">
                    <div id="footer-text">
                      <small class="text-muted"><p id="footer-text-drinks">Viewing Drinks</p></small>
                    </div>
                  </div>
        </div>
        </div>
        
        <!-- <div class="col-auto mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->



        
        
        <div class="col-auto mb-3">
        <div class="card">
                  <img src="images/crockery.jpg" class="card-img-top" alt="crockery">
                  <div class="card-body">
                    <h5 class="card-title" onclick="viewCrockery()">Crockery</h5>
                    <p class="card-text">Views crockery in stock</p>
                  </div>
                  <div class="card-footer">
                    <div id="footer-text">
                      <small class="text-muted" ><p id="footer-text-crockery" style="display: none">Viewing Crockery</p></small>
                    </div>
                  </div>
        </div>
        </div>

        <div class="col-auto mb-3">
        <div class="card">
                  <img src="images/groceries.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title" onclick="viewFood()">Food Items</h5>
                    <p class="card-text">Views food items in stock</p>
                  </div>
                  <div class="card-footer">
                  <div id="footer-text">
                      <small class="text-muted" ><p id="footer-text-fooditems" style="display: none">Viewing Food Items</p></small>
                    </div>
                  </div>
        </div>
        </div>
        <button type="button" class="btn" onclick="viewAll()">View All</button>
   </div>      
  </div>
</div>
</section>
 
<div id="InventoryTable" style="display: none">
<input class="form-control" id="inventory-search" type="text" onkeyup="search()" placeholder="Search Food Type">
<table class="table-bordered" id="Inventory-Table">
 
 <thead>
      <tr>
      <th id="table-head-text" scope="col">Item No.</th>
      <th id="table-head-text" scope="col">Food Type</th>
      <th id="table-head-text" scope="col">Unit of Measurement</th>
      <th id="table-head-text" scope="col">Inventory Amount</th>
      <th id="table-head-text" scope="col">Cost per Unit</th>
      <th id="table-head-text" scope="col">Total Cost</th>
      <th id="table-head-text" scope="col">Vendor</th>
      <th id="table-head-text" scope="col">Quantity</th>
      </tr>
  </thead>
  <tbody id="inventory-table">
  @foreach ($users as $user)
  <tr>
      <th scope="row">{{ $user->foodTypeID }}</th>
      <td>{{ $user->foodType }}</td>
      <td>{{ $user->unitOfMeasurement }}</td>
      <td>{{ $user->inventoryAmount }}</td>
      <td>{{ $user->costPerUnit }}</td>
      <td>{{ $user->totalCost }}</td>
      <td>{{ $user->vendor }}</td>
      <td>{{ $user->quantity }}</td>
  </tr>
  @endforeach
  </tbody>
 </table>
</div>

<div id="InventoryTable drinks">
<input class="form-control" id="inventory-search-drinks" type="text" onkeyup="searchDrinks()" placeholder="Search Drink Name">
<table class="table-bordered" id="Inventory-Table">
 <thead>
      <tr>
  
      <th id="table-head-text" scope="col">Food TypeNo</th>
      <th id="table-head-text" scope="col">Drink Name</th>
      <th id="table-head-text" scope="col">Unit of Measurement</th>
      <th id="table-head-text" scope="col">Inventory Amount</th>
      <th id="table-head-text" scope="col">Cost per Unit</th>
      <th id="table-head-text" scope="col">Total Cost</th>
      <th id="table-head-text" scope="col " >Vendor</th>
      <th id="table-head-text" scope="col">Quantity</th>
      </tr>
      
  </thead>
  <tbody id="inventory-table-drinks">
  @foreach ($drinks as $drink)
  <tr>
      <th scope="row">{{ $drink->foodTypeNo }}</th>
      <td>{{ $drink->DrinkName }}</td>
      <td>{{ $drink->unitOfMeasurement }}</td>
      <td>{{ $drink->inventoryAmount }}</td>
      <td>{{ $drink->costPerUnit }}</td>
      <td>{{ $drink->totalCost }}</td>
      <td>{{ $drink->vendor }}</td>
      <td>{{ $drink->quantity }}</td>
      <td id="edit-column-drinks" ><a href = 'edit/{{ $drink->foodTypeNo }}'>Edit</a></td>
      <td id="delete-column-drinks"><a href = 'delete/{{ $drink->foodTypeNo }}'>Delete</a></td>
  </tr>
  @endforeach 
  </tbody>
 </table>

 <div id="insertfield">
 <button type="button" class="btn" onclick="insertDrinks()">Insert New</button>
</div>

</div>


 

 <div id="insertform-drinks"  style="display: none">
 
 <form action="insert"id="drinksform" method="POST" >
 {{csrf_field()}}
 <div class="form-group col-sm-6" >
    <input type="text" class="form-control"  name="DrinkName" placeholder="Drink Name">
  </div>

  <div class="form-group col-sm-6">
    <input type="text" class="form-control"  name="unitOfMeasurement" placeholder="Unit of Measurement">
  </div>

  <div class="form-group col-sm-6">
    <input type="text" class="form-control"  name="inventoryAmount" placeholder="Inventory Amount">
  </div>

  <div class="form-group col-sm-6">
    <input type="text" class="form-control"  name="costPerUnit" placeholder="Cost per Unit">
  </div>

  <div class="form-group col-sm-6">
    <input type="text" class="form-control"  name="totalCost" placeholder="Total Cost">
  </div>

  <div class="form-group col-sm-6">
    <input type="text" class="form-control"  name="vendor" placeholder="Vendor">
  </div>

  <div class="form-group col-sm-6">
    <input type="text" class="form-control"  name="quantity"placeholder="Quantity">
  </div>
  <button type="submit" class="button-submit">Submit</button>
</form>
 </div>

<div id="InventoryTable fooditems" style="display: none">
<input class="form-control" id="inventory-search-food" type="text" onkeyup="searchFood()" placeholder="Search Food Name">

<table class="table-bordered" id="Inventory-Table">
 <thead>
      <tr>
  
      <th id="table-head-text" scope="col">Food TypeNo</th>
      <th id="table-head-text" scope="col">Food Item Name</th>
      <th id="table-head-text" scope="col">Unit of Measurement</th>
      <th id="table-head-text" scope="col">Inventory Amount</th>
      <th id="table-head-text" scope="col">Cost per Unit</th>
      <th id="table-head-text" scope="col">Total Cost</th>
      <th id="table-head-text" scope="col">Vendor</th>
      <th id="table-head-text" scope="col">Quantity</th>
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
      <td><a href = "editf/{{ $food->foodTypeNo }}">Edit</a></td>
      <td><a href = "deletef/{{ $food->foodTypeNo }}">Delete</a></td>
  </tr>
  @endforeach 
  </tbody>
 </table>

 <div id="insertfield">
 <button type="button" class="btn" onclick="insertFood()">Insert New</button>
</div>

</div>

<div id="insertform-fooditems"  style="display: none">
 
 <form action="insertfood"id="fooditemsform" method="POST" >
    {{csrf_field()}}   

      <div class="form-group col-sm-6">
        <input type="text" class="form-control"  name="FoodItemName" placeholder="Food Item Name">
      </div>

      <div class="form-group col-sm-6">
        <input type="text" class="form-control"  name="unitOfMeasurement" placeholder="Unit Of Measurement">
      </div>

      <div class="form-group col-sm-6">
        <input type="text" class="form-control"  name="inventoryAmount" placeholder="Inventory Amount">
      </div>

      <div class="form-group col-sm-6">
        <input type="text" class="form-control"  name="costPerUnit" placeholder="Cost Per Unit">
      </div>

      <div class="form-group col-sm-6">
        <input type="text" class="form-control"  name="totalCost" placeholder="Total Cost">
      </div>

      <div class="form-group col-sm-6">
        <input type="text" class="form-control"  name="vendor" placeholder="Vendor">
      </div>

      <div class="form-group col-sm-6">
        <input type="text" class="form-control"  name="quantity"placeholder="Quantity">
      </div>
      <button type="submit" class="button-submit">Submit</button>
</form>
 </div>

<div id="InventoryTable crockery" style="display: none">
<table class="table-bordered" id="Inventory-Table">
 <thead>
      <tr>
  
      <th id="table-head-text" scope="col">Crockery ID</th>
      <th id="table-head-text" scope="col">Crockery Name</th>
      <th id="table-head-text" scope="col">Quantity</th>
      
      </tr>
  </thead>
  <tbody id="inventory-table">
  @foreach ($crockery as $crockery)
  <tr>
      <th scope="row">{{ $crockery->crockeryid }}</th>
      <td>{{ $crockery->crockeryname }}</td>
      <td>{{ $crockery->quantity }}</td>
      <td><a class="waves-effect waves-light btn modal-trigger" href="#modal1">Edit</a></td>

      <td><a href = "/destroy/{{ $crockery->crockeryid }}">Delete</a></td>
  </tr> 
    </div>
  </div>
  
</div>

  @endforeach 
  </tbody>
 </table>

 <div id="insertfield">
    <button type="button" class="btn" onclick="insertCrockery()">Insert New</button>
 </div>

</div>


<div id="insertform-crockery"  style="display: none">
 
 <form action="insertcrockery"id="crockeryform" method="POST" >
    {{csrf_field()}}   

      <div class="form-group col-sm-6">
        <input type="text" class="form-control"  name="crockeryname" placeholder="Crockery Name">
      </div>

      <div class="form-group col-sm-6">
        <input type="text" class="form-control"  name="quantity" placeholder="Quantity">
      </div>

      <button type="submit" class="button-submit">Submit</button>
</form>
 </div>

  <!-- Modal Structure -->
  <div id="modal1" class="modal">

  <div class="modal-content">
    <h4>Modal Header</h4>
    <p>A bunch of text</p>

  <form method='post' action='/save'>
  {{csrf_field()}}
   <table>
     <tr>
       <td colspan='2'><h1>Edit record</h1></td>
     </tr>
     <tr>
       <td colspan="2">{{ csrf_field() }}</td>
     </tr>
     <tr>
       <td>CrockeryID</td>
       <td><input type='text' name='crockeryid' readonly value='{{ $crockery->crockeryid }}' ></td>
     </tr>
     <tr>
       <td>Crockery Name</td>
       <td><input type='text' name='crockeryname' value='{{ $crockery->crockeryname }}'></td>
     </tr> 
     <tr>
       <td>Quantity</td>
       <td><input type='number' name='quantity' value='{{ $crockery->quantity }}' ></td>
     </tr>
     <tr>
       <td>&nbsp;<input type='hidden' value='{{ $crockery->crockeryid }}' name='editid'></td>
       <td><input type='submit' name='submit' value='Submit'></td>
     </tr>
   </table>
  </form>

    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
    </div>

<script type="text/javascript" src="{{url ('js/inventory.js') }}" defer></script>
<script type="text/javascript" src = "/js/inventory.js"></script>
<script type="text/javascript" src = "/js/tables.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/w/dt/dt-1.10.18/datatables.min.js"></script>


<script>
  document.getElementById('edit_crockery').addEventListener('click',()=>{
    document.getElementById('edit_crockery_form').submit();
  });
  
</script>

@endsection