<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Inventory;

class CrockeryController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function insertcrockery(Request $request){
      
        
        $crockeryid=$request->input('crockeryid');
        $crockeryname=$request->input('crockeryname');
        $quantity=$request->input('quantity');
        
        
  
        $data=array('crockeryid'=>$crockeryid,'crockeryname'=>$crockeryname,"quantity"=>$quantity);
        
        DB::table('crockery')->insert($data);
        return redirect()->back(); 
     }
     
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
    public function show($crockeryid)
    {
        //
        $crockery = DB::select('select * from crockery where crockeryid = ?',[$crockeryid]);
      return view('inventoryedit',['crockery'=>$crockery]);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $foodTypeNo)
    {
        //
        $foodTypeNo=$request->input('foodTypeNo');
        $FoodItemName=$request->input('FoodItemName');
        $unitOfMeasurement=$request->input('unitOfMeasurement');
        $inventoryAmount=$request->input('inventoryAmount');
        $costPerUnit=$request->input('costPerUnit');
        $totalCost=$request->input('totalCost');
        $vendor=$request->input('vendor');
        $quantity=$request->input('quantity');

        DB::update('update fooditems set FoodItemName = ?, unitOfMeasurement = ?, inventoryAmount = ?, costPerUnit = ?, totalCost = ?, vendor = ?, quantity = ? where foodTypeNo = ?',[$FoodItemName,$unitOfMeasurement,$inventoryAmount,$costPerUnit,$totalCost,$vendor,$quantity,$foodTypeNo]);
      echo "Record updated successfully.<br/>";
      echo '<a href = "/inventory">Click Here</a> to go back.';
      
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
    public function destroy($crockeryid)
    {
        //
        DB::delete('delete from crockery where crockeryid=?',[$crockeryid]);
        echo "Record deleted successfully.<br/>";
        echo '<a href = "/inventory">Click Here</a> to go back.';
    }
}
