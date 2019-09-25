@extends('Layouts.app')

@section('content')
<h1>EDIT MENU</h1>
{!! Form::open(['action'=>['PostsController@update',$post->id],'method'=>  'POST']) !!}
<div class="form-group">
    {{Form::label('foodName','Food Name')}}
    {{Form::text('foodName',$post->foodName,['class'=>'form-control','placeholder'=>'Food Name'])}}

</div>
<div class="form-group">
    {{Form::label('foodPrice','Food Price')}}
    {{Form::text('foodPrice',$post->foodPrice,['class'=>'form-control','placeholder'=>'Food Price'])}}

</div>
{{Form::hidden('_method','PUT')}}
<center>{{Form::submit('Upload',['class'=>'btn btn-warning'])}}</center>
{!! Form::close() !!}

@endsection