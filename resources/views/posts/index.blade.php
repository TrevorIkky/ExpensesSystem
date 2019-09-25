@extends('Layouts.app')

@section('content')
<h1>TONI'S MENU</h1>
@if(count($posts)>0)
@foreach($posts as $post)
<div class="main-content">
  <div class="main-content-inner">
<div class="row">
<div class="col-sm-6">
<div class="card border-dark mb-3"style="width: 18rem; ">
        
        <div class="card-body">
            
          <h5 class="card-title">{{$post->foodName}}</h5>
          <p class="card-text">{{$post->foodPrice}}</p>
         
          <a href="posts/{{$post->id}}" class="btn btn-warning">View Item</a>
        </div>
    </div>
</div>
</div>
</div>
</div>
    @endforeach
    {{$posts->links()}}
    @else
    <script>alert("Food Items Are unavailable");</script>
    <script type="text/javascript">'
    echo 'window.location.href="../posts=Success";'
    echo '</script>

    @endif
             
@endsection