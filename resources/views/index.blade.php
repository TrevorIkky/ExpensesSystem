@extends('master')
@section('main-content')
@if ($user_details = Auth::user())
{{-- <h1>Welcome to the dashboard {{$user_details->name}}</h1> --}}
@else
<script> window.location = "{{url('login')}}"</script>
@endif

<div id="dashboard" data-tab-content="" class="active">
	<div class="pie-container">
			<div id="pie-chart">
					<div id="seg-one" class="segment animate"></div>
					<div id="seg-two" class="segment animate"></div>
					<div id="seg-three" class="segment animate"></div>
					<div id="seg-four" class="segment animate"></div>
					<div id="seg-five" class="segment animate"></div>
					<div id="seg-six" class="segment animate"></div>
				</div>
	</div>

</div>
@endsection