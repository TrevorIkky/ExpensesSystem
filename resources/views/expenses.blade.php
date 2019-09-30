
<html>
<head>
        <title>EXPENSES</title>
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
                <a class="nav-item nav-link" href="#">Inventory </a>
                <a class="nav-item nav-link" href="#">Payments</a>
                <a class="nav-item nav-link active" href="#">Expenses<span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="#">Food Sold</a>
              
           </div>
          </div>     
    </nav>

<div id="inventory">
 <h1>EXPENSES</h1>
</div>

@extends('master')
@section('main-content')

@if($errors->any())
<div class="error-handling">
  <span id = "error-title">Please check on the following errors</span>
  <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
  </ul>
</div>
@endif

@if($success = Session::get("SUCCESS"))
<div id="success-handling" class="success-handling">
    <span id = "error-title">{{$success}}</span>
  </div>
<script>
$(document).ready(()=>{
  var successDiv = document.getElementById("success-handling")
  setTimeout(()=>{
    successDiv.style.display = "none"
  },5000)
})
</script>
@endif


@if($failed = Session::get("FAILED"))
<div id="failed-handling" class="failed-handling">
    <span id = "error-title">{{$failed}}</span>
  </div>
<script>

</script>
@endif
<div class = "rtl-alignment inputs-container">


<div class="expenses-history">
<div id="history-header">
  <h6 id="recently-added">Recently Added</h6>

  @if(count($expenses) > 0)
  @foreach ($expenses as $expense)
  <div id = "card-row">
      <div class="col s12 m6">
        <div id = "history-card" class="card">
          <div  class="card-content">
            <p>{{$expense->date_created}}</p>
            <p>{{$expense->notes}}</p>
          </div>
        </div>
      </div>
    </div> 
  @endforeach

  @else
  <div id = "card-row">
      <div class="col s12 m6">
        <div id = "history-card" class="card">
          <div  class="card-content">
            <p>Get Adding</p>
          </div>
        </div>
      </div>
    </div> 
  @endif

            
    
</div>
</div>



<div id = "input-row" class="row">
      <form id = "expenses-form" class="col s12" action="{{url('/addexp')}}" method="POST">
        {{csrf_field()}}
        <div class="row">
          <div class="input-field col s6">
            <textarea  name = "amount" id="input-textarea" class="materialize-textarea" data-length="10" placeholder="KES 0.00"></textarea>
            <label for="input-textarea">Expenses</label>
          </div>
          <div class="input-field col s6">
              <input name = "date" id="input-date-picker"type="text" class="datepicker" placeholder="Pick a date">
              <label for="input-date-picker">Date</label>
            </div>
         
        </div>

        <div class="row">
          <div class="input-field col s12">
            <textarea name = "notes" id="input-textarea" class="materialize-textarea" data-length="50" placeholder="Additional notes"></textarea>
            <label for="input-textarea">Notes</label>
          </div>
        </div>
      <div class="row">
          <div id = "expenses-select" class="input-field col s12">
              <select name="expense-type">
                <option value="0" disabled selected>Choose your option</option>
                <option value="Rent">Rent</option>
                <option value="Electricity">Electricity</option>
                <option value="Water">Water</option>
                <option value="Groceries">Groceries</option>
              </select>
              <label>Expense Type</label>
            </div>
      </div>
      <a id = "add-expenses"class="btn-floating btn-large black pulse"><i class="material-icons">done</i></a>
      </form>
    </div>

 
</div>


<script>
$(document).ready(function(){
    var mainContainer = document.getElementById("main-container")
    var headerText = document.getElementById("header-text")
    var bars = document.getElementsByClassName("bar")
    
    Array.from(bars).forEach(elem=>{
        elem.style.background = "black"
    })

    mainContainer.style.background = "white"
    headerText.style.color = "black"
    $("#input-textarea").characterCounter()
    $(".datepicker").datepicker()
    $('select').formSelect()

    $('#add-expenses').on('click',function(){
      $("#expenses-form").submit()
    })
})
</script>
@endsection

