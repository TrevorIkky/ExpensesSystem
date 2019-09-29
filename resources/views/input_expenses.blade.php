@extends('master')
@section('main-content')

<div>

<div id = "input-row" class="row">
    <div class = "rtl-alignment input-sub-icons">
        <div><i class = "material-icons"></i></div>
        <div class = "rtl-alignment">
        <div id = "add-decorator"><i class = "material-icons">add</i></div>
        </div>
    </div>
      <form class="col s12">
        <div class="row">
          <div class="input-field col s12">
            <textarea id="input-textarea" class="materialize-textarea" data-length="10" placeholder="KES 0.00"></textarea>
            <label for="input-textarea">Expenses</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <textarea id="input-textarea" class="materialize-textarea" data-length="50" placeholder="Additional notes"></textarea>
            <label for="input-textarea">Notes</label>
          </div>
        </div>
        <div class="rtl-alignment options">
            <div class = "circle-elevated option1"><p>Rent</p></div>
            <div class = "circle-elevated option1"><p>Water</p></div>
            <div class = "circle-elevated option1"><p>Electricity</p></div>
            <div class = "circle-elevated option1"><p>Containers</p></div>
            <div class = "circle-elevated option1"><p>Groceries</p></div>
            <div class = "circle-elevated option1"><p>Soda</p></div>
            <div class = "circle-elevated option1"><p>Transport</p></div>
            <div class = "circle-elevated option1"><p>Other</p></div>
        </div>
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
    $("#input-textarea").characterCounter();
})
</script>
@endsection