<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Payments;
use App\Expenses;
use Carbon\Carbon;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $payments = Payments::all();
        $expenses = Expenses::all();
        return  view('index',['payments'=>$payments,'expenses'=>$expenses]);
       
    }


    public function filter($month){
        $monthRange = explode(",",$month);
        if($monthRange[0] != $monthRange[1]){
            $startDate = new Carbon('first day of '.$monthRange[0].' 2019');
            $endDate  = new Carbon('first day of '.$monthRange[1]. ' 2019');
        }else{
            $startDate = new Carbon('first day of '.$monthRange[0].' 2019');
            $endDate  = new Carbon('last day of '.$monthRange[1]. ' 2019');
        }
       
        $payments = Payments::whereBetween('created_at', [$startDate,$endDate])->get();
        $expenses = Expenses::whereBetween('created_at', [$startDate,$endDate])->get();
        return  view('index',['payments'=>$payments,'expenses'=>$expenses]);
        
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
        //
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
