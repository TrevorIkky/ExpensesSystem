@extends('master')
@extends('error')
@section('main-content')

<div class="rtl-alignment inputs-container">
    <div class="expenses-history">
        <div id="payments-history-header">
            <h6  style = "margin-top:-5px;"id="recently-added">Foods Sold</h6>
            @if (count($monthpayments)>0 && count($menus)>0)
              <div id="foods-sold-chart" style="height: 400px; width: 100%; padding-right:30px; margin-left:-10px;"></div>
            @else   
            <div style="width:100%; text-align:center; margin-top:40px;">Can not display chart. No data available</div> 
            @endif
          
        </div>
    </div>

    <div style="height:100% margin:40px; background:silver;width:1px;" class="seperator"></div>

    <div id="input-row" class="row">

    <form  id="search-payments" method = "POST" action = "{{url('payments/searchpayment')}}">
      {{csrf_field()}}
      <div class="row">
            <div style="width:86%; margin-right:10px;" class="input-field inline">
                <input name="phonenumber" id="number" type="number" class="validate" data-length="10">
                <label for="number">Phone Number</label>
                <span class="helper-text" data-error="wrong" data-success="right">Enter a phone-number to search for payments</span>
            </div>
            <a style="margin-left:15px;" class="dropdown-trigger" href="#" data-target='dropdown1'><i class="material-icons " style="cursor:pointer" >more_vert</i>  </a>
        </div>
    </form>

        <ul id='dropdown1' class='dropdown-content'>
            <li><a class="modal-trigger" href="#modal1">Add payment</a></li>
        </ul>

        <form id="add-payments-form" method = "POST" action = "{{url('payments/addpayment')}}">
            {{csrf_field()}}
            <div id="modal1" class="modal">
                <div class="modal-content">
                    <div class="row">
                    <h4 style = "margin: 10px;">Add Cash Payment</h4>                     
                        <div class="input-field col s12">
                            <textarea name="amount" id="amount-textarea" class="materialize-textarea" data-length="10" placeholder="KES 0.00"></textarea>
                            <label for="amount-textarea">Amount</label>
                        </div>
                    </div>
                  
                    <div class="end-rtl">
                        <div id="add-cash" class="update-menu menu-decor">
                            ADD
                        </div>
                        <div style="margin-left:10px; margin-right:20px; margin-top:10px;" class="modal-close">
                            CLOSE
                        </div>
                    </div>
                </div>
            </div>
        </form>


  @if(count($payments) > 0)
  <p style="margin-top:-10px; margin-bottom:10px;">Recent Payments</p>
  @foreach ($payments as $payment)
  <div style = " margin-top:10px;" id = "card-row">
        <div style = "width:100%; border-radius:10px; " id = "payments-history-card" class="card">
          <div  class="card-content">
          <p style="font-size:0.8rem">{{Carbon\Carbon::parse($payment->created_at)->toFormattedDateString()}}</p>  
           <div class = "rtl-alignment">
           <p>{{$payment->receipt}}</p>  
           @if(!isset($payment->phonenumber))
           <div style = "background:linear-gradient(96deg, #11998e, #38ef7d); padding-left:10px; padding-right:10px; padding-top:4px; padding-bottom:4px; color:white; border-radius:5px;">CASH</div>
           @else
            <div  style = "background:linear-gradient(96deg, #f7ff00, #db36a4); padding-left:10px; padding-right:10px; padding-top:4px; padding-bottom:4px; color:white; border-radius:5px;">MPESA</div>
            @endif
           </div>
            <p>{{$payment->amount}} KES</p>  
          </div>
        </div>
    </div> 
  @endforeach

  @else
   <div id = "card-row">  
        <div style = "width:100%; border-radius:10px;" id = "payments-history-card" class="card">
          <div  class="card-content">
            <p>You have no payments</p>
          </div>
        </div>    
    </div> 
</div>

  @endif


 
<script>
window.onload = function() {
    

$("#number").on('keyup', function (e) {
    if (e.keyCode === 13) {
      $("#search-payments").submit();
    }
});


	var payments = {!!json_encode($monthpayments)!!}
	var menus = {!!json_encode($menus)!!}

    if(!payments || !menus){
    

    }else{
        var items = []

	payments.forEach(el => {
		var it = items.find(element => element.base == el.amount)
		if (it) {
			it.total += el.amount
		} else {
			var menuitem = menus.find(item => item.amount == el.amount)
			var name;
			if (menuitem)
				name = menuitem.name
			else
				name = "Other"
			items.push({
				label: name,
				base: el.amount,
				total: el.amount
			})
		}
	})


	var chartData = [];

	items.forEach(item => {
		chartData.push({
			y: item.total,
			name: item.label
		})
	})


	$('#add-cash').on('click', function() {
		$("#add-payments-form").submit();
	})
	var chart = new CanvasJS.Chart("foods-sold-chart", {
		animationEnabled: true,
		title: {

		},

		data: [{
			type: "doughnut",
			innerRadius: 500,
			toolTipContent: "<b>{name}</b>: ${y} (#percent%)",
			indexLabel: "{name} - #percent%",
			dataPoints: chartData
		}]
	});
	chart.render();

	function explodePie(e) {
		if (typeof(e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
			e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
		} else {
			e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
		}
		e.chart.render();
	}
    }


	

}
</script>

 


@endsection