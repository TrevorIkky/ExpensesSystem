@extends('master')
@section('main-content')
@extends('error')
<div class = "rtl-alignment inputs-container">
    <div class="expenses-history">
    <div id="history-header">
      <h6 id="recently-added">Menu</h6>
    
{{-- 
      <div id = "card-row">
        <div class="col s12 m6">
          <div id = "history-card" class="card">
            <div  class="card-content">
              <p>{{$expense->date_created}}</p>
              <p>{{$expense->notes}}</p>
            </div>
          </div>
        </div>
      </div>  --}}

{{-- 
      <div id = "card-row">
        <div class="col s12 m6">
          <div id = "history-card" class="card">
            <div  class="card-content">
              <p>Get Adding</p>
            </div>
          </div>
        </div>
      </div>--}} 
    </div>
    </div>
    
    
    
    <div id = "input-row" class="row">
          <form id = "expenses-form" class="col s12" action="{{url('/addexp')}}" method="POST" class="dropzone">
            {{csrf_field()}}
            <div class="row">
              <div class="input-field col s6">
                <textarea  name = "food" id="food-textarea" class="materialize-textarea" data-length="30" placeholder="Chicken..."></textarea>
                <label for="food-textarea">Food Name</label>
              </div>
              <div class="input-field col s6">
                <textarea  name = "amount" id="amount-textarea" class="materialize-textarea" data-length="10" placeholder="KES 0.00"></textarea>
                <label for="amount-textarea">Amount</label>
                </div>
             
            </div>
    
            <div class="row">
              <div class="input-field col s12">
                <textarea name = "description" id="description-textarea" class="materialize-textarea" data-length="50" placeholder="Description(Optional)..."></textarea>
                <label for="description-textarea">Description</label>
              </div>
            </div>
        
          <a id = "add-to-menu"class="btn-floating btn-large black pulse"><i class="material-icons">done</i></a>
          </form>
        </div> 
        <form action = "{{url('upload-images')}}" enctype = "multipart/form-data" class = "dropzone" method = "POST"></form>  
    </div>
@endsection