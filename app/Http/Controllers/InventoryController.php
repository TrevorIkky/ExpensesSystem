<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    //
    public function index() {
       $drinks = DB::table('drinks')->get();
       $foods = DB::table('fooditems')->get();
       $users = DB::table('inventory')->get();
       $crockery=DB::table('crockery')->get();
        return view('inventory',['users'=>$users,'drinks'=>$drinks,"foods"=>$foods,"crockery"=>$crockery]);
     }

   // public public function insertform()
   // {
   //    return view('/inventory');
   // }

   public function insert(Request $request){
      $DrinkName=$request->input('DrinkName');
      $unitOfMeasurement=$request->input('unitOfMeasurement');
      $inventoryAmount=$request->input('inventoryAmount');
      $costPerUnit=$request->input('costPerUnit');
      $totalCost=$request->input('totalCost');
      $vendor=$request->input('vendor');
      $quantity=$request->input('quantity');

      $data=array('DrinkName'=>$DrinkName,"unitOfMeasurement"=>$unitOfMeasurement,"inventoryAmount"=>$inventoryAmount,"costPerUnit"=>$costPerUnit,"totalCost"=>$totalCost,"vendor"=>$vendor,"quantity"=>$quantity);
      
      DB::table('drinks')->insert($data);
   }

}
