<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Inventory;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $drinks = DB::table('drinks')->get();
        $foods = DB::table('fooditems')->get();
        $users = DB::table('inventory')->get();
        $crockery=DB::table('crockery')->get();
         return view('inventory',['users'=>$users,'drinks'=>$drinks,"foods"=>$foods,"crockery"=>$crockery]);
      
    }


    public function insertFood(Request $request){
      
        
        $foodTypeNo=$request->input('foodTypeNo');
        $FoodItemName=$request->input('FoodItemName');
        $unitOfMeasurement=$request->input('unitOfMeasurement');
        $inventoryAmount=$request->input('inventoryAmount');
        $costPerUnit=$request->input('costPerUnit');
        $totalCost=$request->input('totalCost');
        $vendor=$request->input('vendor');
        $quantity=$request->input('quantity');
  
        
  
        $data=array('foodTypeNo'=>$foodTypeNo,'inventoryType'=>2,'FoodItemName'=>$FoodItemName,"unitOfMeasurement"=>$unitOfMeasurement,"inventoryAmount"=>$inventoryAmount,"costPerUnit"=>$costPerUnit,"totalCost"=>$totalCost,"vendor"=>$vendor,"quantity"=>$quantity);
        
        $existing = DB::table('fooditems')->where('FoodItemName', '=', $FoodItemName)->first();
      if (is_null($existing)) {
         
         DB::table('fooditems')->insert($data);
         $request->session()->flash('message','Food Item added successfully');
         
         return redirect()->back();
         } else {
         
         $request->session()->flash('message','Food Item already exists!!');
         return redirect()->back();
     } 
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
    public function showFood($foodTypeNo)
    {
        //
        $foods = DB::select('select * from fooditems where foodTypeNo = ?', [$foodTypeNo]);
        return view('inventoryeditf', ['foods' => $foods]);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editFood(Request $request, $foodTypeNo)
    {
        //
        $FoodItemName = $request->input('FoodItemName');
        $unitOfMeasurement = $request->input('unitOfMeasurement');
        $inventoryAmount = $request->input('inventoryAmount');
        $costPerUnit = $request->input('costPerUnit');
        $totalCost = $request->input('totalCost');
        $vendor = $request->input('vendor');
        $quantity = $request->input('quantity');
  
        //$data=array('DrinkName'=>$DrinkName,"unitOfMeasurement"=>$unitOfMeasurement,"inventoryAmount"=>$inventoryAmount,"costPerUnit"=>$costPerUnit,"totalCost"=>$totalCost,"vendor"=>$vendor,"quantity"=>$quantity);
        DB::update('update fooditems set FoodItemName = ?, unitOfMeasurement = ?, inventoryAmount = ?, costPerUnit = ?, totalCost = ?, vendor = ?, quantity = ? where foodTypeNo = ?', [$FoodItemName, $unitOfMeasurement, $inventoryAmount, $costPerUnit, $totalCost, $vendor, $quantity, $foodTypeNo]);
        $request->session()->flash('message','Food Item updated successfully');
        return redirect()->action('InventoryController@index');
     
      
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
    public function destroyFood(Request $request,$foodTypeNo)
    {
       DB::delete('delete from fooditems where foodTypeNo=?', [$foodTypeNo]);
       $request->session()->flash('message','Food Item deleted successfully');
       return redirect()->action('InventoryController@index');
         
    }
}
