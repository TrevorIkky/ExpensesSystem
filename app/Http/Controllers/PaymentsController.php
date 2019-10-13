<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use SmoDav\Mpesa\Laravel\Facades\Registrar;
use SmoDav\Mpesa\Laravel\Facades\STK;
use Validator;
use App\Payments;

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
        $payments = Payments::orderBy('created_at','desc')->take(2)->get();
        return view('payments',['payments'=>$payments]);
      
    }

    private function mpesa(){
        $response = STK::push(1, 254720805200, 'Some Reference', 'Test Payment');
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
