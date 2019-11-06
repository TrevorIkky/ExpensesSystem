@extends('master')
@section('main-content')
@extends('error')


 <div class="inventoryedit"style="text-align:center;">
     <br>
     <h1>Edit Drink Item</h1>
     <br>     
   
    
     <form method="post" action="/edit/<?php echo $drinks[0]->DrinkNo?>">
   
     <input type="hidden" name = "_token" value = "<?php echo csrf_token(); ?>"/>
     @foreach ($drinks as $drink)
     <div class="insertfield" >
       <input style="width:20%;padding-left:20%;" type="text" name="DrinkName" class="insertfield" value="{{$drink->DrinkName}}" />
     </div>

     <div class="insertfield">
       <input style="width:20%;padding-left:20%;" type="text" name="unitOfMeasurement" class="insertfield" value="{{$drink->unitOfMeasurement}}" />
     </div>

     <div class="insertfield">
       <input style="width:20%;padding-left:20%;" type="text" name="inventoryAmount" class="insertfield" value="{{$drink->inventoryAmount}}" />
     </div>

     <div class="insertfield">
       <input style="width:20%;padding-left:20%;" type="text" name="costPerUnit" class="insertfield" value="{{$drink->costPerUnit}}" />
     </div>

     <div class="insertfield">
       <input style="width:20%;padding-left:20%;" type="text" name="totalCost" class="insertfield" value="{{$drink->totalCost}}" />
     </div>

     <div class="insertfield">
       <input style="width:20%;padding-left:10%;" type="text" name="vendor" class="insertfield" value="{{$drink->vendor}}" />
     </div>

     <div class="insertfield">
       <input style="width:20%;padding-left:20%;"type="text" name="quantity" class="insertfield" value="{{$drink->quantity}}" />
     </div>

     <div class ="form-group">
     <a href = "/inventory"><input type="submit"  class="btn" value="Update"/></a>
     </div>
      @endforeach
     </form>
     
 </div>







@endsection