@extends('master')
@section('main-content')
@extends('error')

<div class="row">
 <div class="col-md-12">
     <br>
     <h1>Edit Records</h1>
     <br>     
   
    
     <form method="post" action="/editc/<?php echo $$crockery[0]->$crockeryid?>">
   
     <input type="hidden" name = "_token" value = "<?php echo csrf_token(); ?>"/>
     @foreach ($crockery as $crockery)
     <div class ="form-group">
       <input type="text" name="DrinkName" class="form-control" value="{{$crockery->crockeryname}}" />
     </div>

     <div class ="form-group">
       <input type="text" name="unitOfMeasurement" class="form-control" value="{{$crockery->quantity}}" />


     <div class ="form-group">
     <a href = "/inventory"><input type="submit"  class="btn" value="Update"/></a>
     </div>
      @endforeach
     </form>
     
 </div>


</div>




@endsection