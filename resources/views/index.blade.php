@extends('master')
@section('main-content')
@if ($user_details = Auth::user())
{{-- <h1>Welcome to the dashboard {{$user_details->name}}</h1> --}}
@else
<script> window.location = "{{url('login')}}"</script>
@endif


<div class="months-tabs">
    <ul>
        <li><a href = "{{url('/filter', ['month'=>'January,February'])}}">Jan</a></li>
        <li><a href = "{{url('/filter', ['month'=>'February,March'])}}">Feb</a></li>
        <li><a href = "{{url('/filter', ['month'=>'March,April'])}}">March</a></li>
        <li><a href = "{{url('/filter', ['month'=>'April,May'])}}">April</a></li>
        <li><a href = "{{url('/filter', ['month'=>'May,June'])}}">May</a></li>
        <li><a href = "{{url('/filter', ['month'=>'June,July'])}}">Jun</a></li>
        <li><a href = "{{url('/filter', ['month'=>'July,August'])}}">Jul</a></li>
        <li><a href = "{{url('/filter', ['month'=>'August,September'])}}">Aug</a></li>
        <li><a href = "{{url('/filter', ['month'=>'September,October'])}}">Sept</a></li>
        <li><a href = "{{url('/filter', ['month'=>'October,November'])}}">Oct</a></li>
        <li><a href = "{{url('/filter', ['month'=>'November,December'])}}">Nov</a></li>
        <li><a href = "{{url('/filter', ['month'=>'December,December'])}}">Dec</a></li>
      
    </ul>
</div>

@if(isset($expenses) && isset($expenses))
@if(count($expenses) > 0 && count($payments) >0)
<div id="dashboard" data-tab-content="" class="active">
    <div id="chart-container" style=" margin-top:40px; height: 420px; width: 100%;"></div>
</div>


<script>
window.onload = function() {

var expenses = {!! json_encode($expenses ) !!}
var payments = {!! json_encode($payments ) !!}
var water = 0;
var electricity= 0
var rent = 0;
var groceries = 0;
var paymentTotal = 0;
var other = 0;
payments.forEach(element=>{
    paymentTotal +=element.amount;
})
expenses.forEach(element=>{
    switch(element.expenseType){
        case "Water":
        water += element.amount;
        break;
        case "Electricity":
          electricity += element.amount;
          break;
        case "Rent":
        rent += element.amount;
        break;
        case "Groceries":
          groceries += element.amount;
          break;
        case "other":
         other += element.amount;
         break;
        default:

    }
})

var total = water+electricity+rent+groceries+other+paymentTotal;

console.log(water);
var chart = new CanvasJS.Chart("chart-container", {
	animationEnabled: true,
	title: {
		
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0.00\"%\"",
		dataPoints: [
            {y: (paymentTotal/total * 100), label: "Profits"},
			{y: (water/total * 100), label: "Water"},
			{y: (rent/total * 100), label: "Electricity"},
			{y: (electricity/total * 100), label: "Rent"},
            {y: (groceries/total * 100), label: "Groceries"},
            {y: (other/total * 100), label: "Other"}
		]
	}]
});
chart.render();

}
</script>
@else
<div style = " margin-top: 40px; width:100%; height:100%; text-align:center;">No data to draw chart!</div>
@endif
@else
<div style = " margin-top: 40px; width:100%; height:100%; text-align:center;">No data to draw chart!</div>
@endif







@endsection