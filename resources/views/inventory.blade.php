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
</script>
@endsection