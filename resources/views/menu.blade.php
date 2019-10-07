@extends('master')
@section('main-content')
@extends('error')
<div class = "rtl-alignment inputs-container">
    <div class="expenses-history">
    <div id="history-header">
      <h6 id="recently-added">Menu</h6>
      @if(count($items)>0)
      @foreach($items as $item)
      <div class="card">
        <div class="rtl-alignment">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="materialboxed" height  = "270" width="400" src={{$item->url}}>
            </div>
            <div class="card-content">
              <div style= "display:flex;justify-content:end; margin: 4px;">
                  <i class="material-icons " style="cursor:pointer" >more_vert</i>  
                </div>
              <p style="font-weight:bold; margin-top:10px;">{{$item->name}}</p>
              <p style="margin-top:10px;">{{$item->description}}</p>
              <p style="margin-top:10px;"> KES {{$item->amount}}</p>
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
          <form id = "menu-form" class="col s12" action="{{url('/addmenu')}}" method="POST" enctype="multipart/form-data">
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
            <div  id = "file-upload" class="file-field input-field">
                <p>Click to add image</p>
                    <div>
                      <input name = "file" type="file">
                    </div>
                    <div class="file-path-wrapper">
                      <input id = "file-path-text" class="file-path validate" type="text">
                    </div>
                  </div>
          <a id = "add-to-menu"class="btn-floating btn-large black pulse"><i class="material-icons">done</i></a>
          </form>
        </div>  
    </div>
   <script>
   $('#add-to-menu').on('click',function(){
      $("#menu-form").submit()
    })</script>
@endsection