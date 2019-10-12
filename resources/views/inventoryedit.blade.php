@extends('Layouts.app')
@section('content')

<div class="row">
 <div class="col-md-12">
     <br>
     <h1>Edit Records</h1>
     <br>     
     @if($message=Session::get('danger'))
     <div class="alert alert-danger">
         <strong>{{$message}}</strong>
     </div>
     @endif
     @foreach($drinks as drink)
     <form method="post" action="{{action('InventoryController@update')}}">
     @csrf
     @method('PUT')
     <input type="hidden" name="_method" value="PATCH"/>

     <div class ="form-group">
       <input type="text" name="DrinkName" class="form-control" value="{{$item->}}" placeholder="Drink Name"/>
     </div>

     <div class ="form-group">
       <input type="text" name="unitOfMeasurement" class="form-control" value="{{$item->unitOfMeasurement}}" placeholder="Unit of Measurement"/>
     </div>

     <div class ="form-group">
       <input type="text" name="inventoryAmount" class="form-control" value="{{$item->inventoryAmount}}" placeholder="Inventory Amount"/>
     </div>

     <div class ="form-group">
       <input type="text" name="costPerUnit" class="form-control" value="{{$item->costPerUnit}}" placeholder="Cost per Unit"/>
     </div>

     <div class ="form-group">
       <input type="text" name="totalCost" class="form-control" value="{{$item->totalCost}}" placeholder="Total Cost"/>
     </div>

     <div class ="form-group">
       <input type="text" name="vendor" class="form-control" value="{{$item->vendor}}" placeholder="Vendor"/>
     </div>

     <div class ="form-group">
       <input type="text" name="quantity" class="form-control" value="{{$item->quantity}}" placeholder="Quantity"/>
     </div>

     <div class ="form-group">
       <input type="submit"  class="btn" value="Update"/>
     </div>

     </form>
     @endforeach
 </div>


</div>




@endsection