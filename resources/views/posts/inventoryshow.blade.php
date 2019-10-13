@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    View Post


                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>

            
  </div>
  <div class="card-body">
     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Title:</strong>

                {{ $post->title }}

            </div>

        </div>
       

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Body:</strong>

                {{ $post->body }}

            </div>

        </div>

    </div>
    
  </div>
</div>
@endsection