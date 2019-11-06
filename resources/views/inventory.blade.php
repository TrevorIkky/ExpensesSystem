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
    </div>

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
</script>

@endsection