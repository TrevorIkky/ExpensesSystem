<html>
<head>
        <title>INVENTORY</title>
        <link rel="stylesheet" type="text/css" href="css/TonisInventory.css">
        <link rel="stylesheet" type="text/css" href="css/materialize.css">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
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
                <a class="nav-item nav-link active" href="#">Inventory <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="#">Payments</a>
                <a class="nav-item nav-link" href="#">Expenses</a>
                <a class="nav-item nav-link disabled" href="#">Food Sold</a>
              
           </div>
          </div>     
    </nav>

<div id="inventory">
 <h1>INVENTORY</h1>
</div>

<div id="card-container">
  <div id="cards">

   <div class="card-deck">
        
        <div class="col-auto mb-3">
        <div class="card " >
                  <img src="images/drinks.jpg" class="card-img-top" alt="drinks" >
                  <div class="card-body">
                    <h5 class="card-title">Drinks</h5>
                    <p class="card-text">Views drinks in stock</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted"></small>
                  </div>
        </div>
        </div>

        <div class="col-auto mb-3">
        <div class="card">
                  <img src="images/crockery.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Crockery</h5>
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
                    <h5 class="card-title">Food Items</h5>
                    <p class="card-text">Views food items in stock</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted"></small>
                  </div>
        </div>
        </div>
        <button type="button" class="btn btn-success">View All</button>
   </div>      
  </div>
</div>

<div id="InventoryTable">
 <table class="table table-hover">
    
 <thead>
      <tr>
       <th scope="col">Item No.</th>
       <th scope="col">Vendor</th>
       <th scope="col">Type</th>
       <th scope="col">Quantity</th>
      </tr>
    </thead>
  
  <tbody>
 

   </tbody>
</table>
</div>
</body>



</html>