<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use SmoDav\Mpesa\Laravel\Facades\Registrar;
use SmoDav\Mpesa\Laravel\Facades\STK;
use Validator;
use App\Payments;
use App\Menu;
use Carbon\Carbon;
use App\Inventory;
class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){


    }
    public function index()
    {  
        $payments = Payments::orderBy('created_at','desc')->take(3)->get();
        $startDate = new Carbon('first day of  this month');
        $endDate  = new Carbon('first day of next month');
        $menu = Menu::all();
        $monthlyPayments = Payments::whereBetween('created_at', [$startDate,$endDate])->get();
        return view('payments',['payments'=>$payments,'menus'=>$menu,'monthpayments'=>$monthlyPayments]);
      
    }

    public function mpesa(Request $request){
        $response = STK::push($request->get('amount'), $request->get('number'), 'Food Payment', 'Test Payment');
        if($response){
            return redirect('/payments')->with('SUCCESS','Pushed!');
        }else{
            return redirect('/payments')->with('FAILED','Error');
        }
       // $validation = STK::validate($response->CheckoutRequestID);
        //echo print_r($validation);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function searchPayment(Request $request){
        $validator = Validator::make($request->all(),[
            "phonenumber"=>"required|max:13",
        ]);

        if($validator->fails()){
            return redirect('/payments')->withErrors($validator)->withInput();
        }else{
            $startDate = new Carbon('first day of  this month');
            $endDate  = new Carbon('first day of next month');
            $menu = Menu::all();
            $monthlyPayments = Payments::whereBetween('created_at', [$startDate,$endDate])->get();
            $payments = Payments::where('phonenumber','LIKE', $request->get('phonenumber'))->get();
            return view('payments',['payments'=>$payments,'menus'=>$menu,'monthpayments'=>$monthlyPayments]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "amount"=>"required",
        ]);

        if($validator->fails()){
            return redirect('/payments')->withErrors($validator)->withInput();
        }else{
            $receiptStr = "#".substr(str_shuffle('1234567890QWERTYUIOPasdfghjkl'),0,6);
            $amounts = explode(",",$request->get('amount'));
            foreach($amounts as $amount){
                if(!Payments::create(['receipt'=>$receiptStr,'amount'=>$amount])){
                    return redirect('/payments')->with('FALILED','Unable to add payment'); 
                }

                Inventory::where('costPerUnit', $amount)->where('inventoryAmount','>',0)
                ->decrement('inventoryAmount', 1);
            }
          
            return redirect('/payments')->with('SUCCESS','Payment added successfully');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
