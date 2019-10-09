<html>
<head>
        <title>INVENTORY</title>
        <link rel="stylesheet" type="text/css" href="css/TonisInventory.css">
        <link rel="stylesheet" type="text/css" href="css/materialize.css">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/w/dt/dt-1.10.18/datatables.min.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
    
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="">
                <img src="images/Toni'sLogo.jpg" width="70" height="50" class="d-inline-block align-top" alt="">
                Toni's Kitchen
        </a>
        <button class="navbar-toggler" type="button"data-toggle="collapse"data-target="#navbarNavAltMarkup"aria-controls="navbarNavAltMarkup"aria-expanded="false"aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse"id="navbarNavAltMarkup">
           <div class="navbar-nav">
                <a class="nav-item nav-link" href="#">Dashboard</a>
                <a class="nav-item nav-link active" href="{{url('/inventory')}}">Inventory <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="#">Payments</a>
                <a class="nav-item nav-link" href="{{url('/add')}}">Expenses</a>
                <a class="nav-item nav-link disabled" href="#">Food Sold</a>
              
           </div>
          </div>     
    </nav>

<div id="inventory">
 <h1>INVENTORY</h1>
</div>

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
                    <small class="text-muted"></small>
                  </div>
        </div>
    
        </div>
        
        <div class="col-auto mb-3">
        <div class="card">
                  <img src="images/crockery.jpg" class="card-img-top" alt="crockery">
                  <div class="card-body">
                    <h5 class="card-title" onclick="viewCrockery()">Crockery</h5>
                    <p class="card-text">Views crockery in stock</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted"></small>
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
                    <small class="text-muted"></small>
                  </div>
        </div>
        </div>
        <button type="button" class="btn btn-success" onclick="viewAll()">View All</button>
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
<table class="table-bordered" id="Inventory-Table">
 <thead>
      <tr>
  
      <th id="table-head-text" scope="col">Food TypeNo</th>
      <th id="table-head-text" scope="col">Drink Name</th>
      <th id="table-head-text" scope="col">Unit of Measurement</th>
      <th id="table-head-text" scope="col">Inventory Amount</th>
      <th id="table-head-text" scope="col">Cost per Unit</th>
      <th id="table-head-text" scope="col">Total Cost</th>
      <th id="table-head-text" scope="col">Vendor</th>
      <th id="table-head-text" scope="col">Quantity</th>
      </tr>
      
  </thead>
  <tbody id="inventory-table">
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
  </tr>
  @endforeach 
  </tbody>
 </table>
 
 <!-- <button type="button" class="btn btn-dark" onclick="insertDrinks()">Insert New</button> -->
 
 <form id="drinksform" method="POST" style="display: none">
 {{csrf_field()}}
 <div class="form-group">
    <input type="text" class="form-control"  placeholder="DrinkName">
  </div>

  <div class="form-group">
    <input type="text" class="form-control"  placeholder="Unit of Measurement">
  </div>

  <div class="form-group">
    <input type="text" class="form-control"  placeholder="Inventory Amount">
  </div>

  <div class="form-group">
    <input type="text" class="form-control"  placeholder="Cost per Unit">
  </div>

  <div class="form-group">
    <input type="text" class="form-control"  placeholder="Total Cost">
  </div>

  <div class="form-group">
    <input type="text" class="form-control"  placeholder="Vendor">
  </div>

  <div class="form-group">
    <input type="text" class="form-control"  placeholder="Quantity">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>

<div id="InventoryTable fooditems" style="display: none">
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
  <tbody id="inventory-table">
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
  </tr>
  @endforeach 
  </tbody>
 </table>
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
      <td>{{ $crockery->crockeryName }}</td>
      <td>{{ $crockery->Quantity }}</td>
  </tr>
  @endforeach 
  </tbody>
 </table>
</div>

<script type="text/javascript" src="{{url ('js/inventory.js') }}" defer></script>
<script type="text/javascript" src = "/js/inventory.js"></script>
<script type="text/javascript" src = "/js/tables.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/w/dt/dt-1.10.18/datatables.min.js"></script>

</body>



</html>