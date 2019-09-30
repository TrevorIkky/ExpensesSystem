@extends('Layouts.app')

@section('content')
<br><center><a href="posts" class="btn btn-warning">Back to Menu</a></center><br><br>

<center><h3></h3></center>
<table id="datatable" class="table table-light">
    <thead>
        <tr>
            <th scope='col'>FOOD ID</th>
            <th scope='col'>FOOD NAME</th>
            <th scope='col'>PRICE</th>
            <th scope='col'>OPTIONS</th>
        </tr>
    </thead>
    
    <td>{{$post->id}}</td>
	<td>{{$post->foodName}}</td>
	<td>{{$post->foodPrice}}</td>
    <td><a href="{{$post->id}}/edit" name="delete" class="btn btn-warning">Edit</a></center></td>

     <td> {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right'])!!}
      {{Form::hidden('_method','DELETE')}}
      {{Form::submit('Delete',['class'=>'btn btn-warning'])}}
      {!!Form::close()!!}
    </td>
    </tr>
</tbody>
</table>


      
      
	@endsection