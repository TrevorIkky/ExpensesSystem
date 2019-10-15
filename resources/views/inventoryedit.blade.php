@extends('master')
@section('main-content')
@extends('error')

<div class="row">
 <div class="col-md-12">
     <br>
     <h1>Edit Records</h1>
     <br>     
   
    
     <form method="post" action="/edit/<?php echo $drinks[0]->foodTypeNo?>">
   
     <input type="hidden" name = "_token" value = "<?php echo csrf_token(); ?>"/>
     @foreach ($drinks as $drink)
     <div class ="form-group">
       <input type="text" name="DrinkName" class="form-control" value="{{$drink->DrinkName}}" />
     </div>

     <div class ="form-group">
       <input type="text" name="unitOfMeasurement" class="form-control" value="{{$drink->unitOfMeasurement}}" />
     </div>

     <div class ="form-group">
       <input type="text" name="inventoryAmount" class="form-control" value="{{$drink->inventoryAmount}}" />
     </div>

     <div class ="form-group">
       <input type="text" name="costPerUnit" class="form-control" value="{{$drink->costPerUnit}}" />
     </div>

     <div class ="form-group">
       <input type="text" name="totalCost" class="form-control" value="{{$drink->totalCost}}" />
     </div>

     <div class ="form-group">
       <input type="text" name="vendor" class="form-control" value="{{$drink->vendor}}" />
     </div>

     <div class ="form-group">
       <input type="text" name="quantity" class="form-control" value="{{$drink->quantity}}" />
     </div>

     <div class ="form-group">
     <a href = "/inventory"><input type="submit"  class="btn" value="Update"/></a>
     </div>
      @endforeach
     </form>
     
 </div>


</div>




@endsection