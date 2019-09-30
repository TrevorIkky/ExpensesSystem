@extends('Layouts.app')

@section('content')
<h1>UPLOAD FOOD ITEMS</h1>
{!! Form::open(['action'=>'PostsController@store','method'=>  'POST', 'enctype'=>'multipart/form-data']) !!}
<div class="form-group">
    {{Form::label('foodName','Food Name')}}
    {{Form::text('foodName','',['class'=>'form-control','placeholder'=>'Food Name'])}}

</div>
<div class="form-group">
    {{Form::label('foodPrice','Food Price')}}
    {{Form::text('foodPrice','',['class'=>'form-control','placeholder'=>'Food Price'])}}

</div>

<center>{{Form::submit('Upload',['class'=>'btn btn-warning'])}}</center>
{!! Form::close() !!}

@endsection