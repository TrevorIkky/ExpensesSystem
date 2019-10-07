@extends('master')
@section('main-content')
@if ($user_details = Auth::user())
{{-- <h1>Welcome to the dashboard {{$user_details->name}}</h1> --}}
@else
<script> window.location = "{{url('login')}}"</script>
@endif

<div id="dashboard" data-tab-content="" class="active">
	<div id="pie-chart">
		<div id="part1" class="circle animate"></div>
		<div id="part2" class="circle animate"></div>
		<div id="part3" class="circle animate"></div>
		<div id="part4" class="circle animate"></div>
		<div id="part5" class="circle animate"></div>
		<div id="part6" class="circle animate"></div>
	  </div>
</div>

</div>
@endsection