@extends('master')
@section('main-content')
@extends('error')

<div class="row">
 <div class="col-md-12">
     <br>
     <h1>Edit Records</h1>
     <br>     
   
    
     <form method="post" action="/editFood/<?php echo $foods[0]->foodTypeNo?>">
   
     <input type="hidden" name = "_token" value = "<?php echo csrf_token(); ?>"/>
     @foreach ($foods as $food)
     <div class ="form-group">
       <input type="text" name="FoodItemName" class="form-control" value="{{$food->FoodItemName}}" />
     </div>

     <div class ="form-group">
       <input type="text" name="unitOfMeasurement" class="form-control" value="{{$food->unitOfMeasurement}}" />
     </div>

     <div class ="form-group">
       <input type="text" name="inventoryAmount" class="form-control" value="{{$food->inventoryAmount}}" />
     </div>

     <div class ="form-group">
       <input type="text" name="costPerUnit" class="form-control" value="{{$food->costPerUnit}}" />
     </div>

     <div class ="form-group">
       <input type="text" name="totalCost" class="form-control" value="{{$food->totalCost}}" />
     </div>

     <div class ="form-group">
       <input type="text" name="vendor" class="form-control" value="{{$food->vendor}}" />
     </div>

     <div class ="form-group">
       <input type="text" name="quantity" class="form-control" value="{{$food->quantity}}" />
     </div>

     <div class ="form-group">
     <a href = "/inventory"><input type="submit"  class="btn" value="Update"/></a>
     </div>
      @endforeach
     </form>
     
 </div>


</div>




@endsection