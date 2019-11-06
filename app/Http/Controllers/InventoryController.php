<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Inventory;

class InventoryController extends Controller
{
   //
   public function index()
   {
      $drinks = DB::table('drinks')->get();
      $foods = DB::table('fooditems')->get();
      $users = DB::table('inventory')->get();
      $crockery = DB::table('crockery')->get();
      $crock = DB::table('crockery')->get();

      // print("<pre>".print_r($drinks,true)."</pre>");
       return view('inventory', ['users' => $users, 'drinks' => $drinks, "foods" => $foods, "crockery" => $crockery, "crock" => $crock]);
   }




   public function insert(Request $request)
   {


      $DrinkName = $request->input('DrinkName');
      $unitOfMeasurement = $request->input('unitOfMeasurement');
      $inventoryAmount = $request->input('inventoryAmount');
      $costPerUnit = $request->input('costPerUnit');
      $totalCost = $request->input('totalCost');
      $vendor = $request->input('vendor');
      $quantity = $request->input('quantity');



      $data = array('DrinkName' => $DrinkName,'inventoryType'=>1, "unitOfMeasurement" => $unitOfMeasurement, "inventoryAmount" => $inventoryAmount, "costPerUnit" => $costPerUnit, "totalCost" => $totalCost, "vendor" => $vendor, "quantity" => $quantity);
      
      $existing = DB::table('drinks')->where('DrinkName', '=', $DrinkName)->first();
      if (is_null($existing)) {
      
         DB::table('drinks')->insert($data);
         $request->session()->flash('message','Drink added successfully');
         
         return redirect()->back();
     } else {
        
         $request->session()->flash('message','Drink already exists!!');
         return redirect()->back();
     }
      
     
      
     
      // for($i=0;$i<count($drinks);$i++){

   //    if(($drinks[$i]->DrinkName)==$DrinkName){
         
   //       $request->session()->flash('message','Drink already exists!!');
   //       return redirect()->back();
   //    }else{
      
      
      

   //    DB::table('drinks')->insert($data);
   //    $request->session()->flash('message','Drink added successfully');
      
   //    return redirect()->back();
   //    }
   // }
      // }
      // else{
         
      //    $request->session()->flash('message','Drink already exists!!');
      //    return redirect()->back();
      // }
   


   }


   public function create()
   {
      return view('inventory');
   }

   public function edit(Request $request, $DrinkNo)
   {
      //$posts=DB::select('select * from drinks where FoodTypeNo=?',[$drink]);
      $DrinkName = $request->input('DrinkName');
      $unitOfMeasurement = $request->input('unitOfMeasurement');
      $inventoryAmount = $request->input('inventoryAmount');
      $costPerUnit = $request->input('costPerUnit');
      $totalCost = $request->input('totalCost');
      $vendor = $request->input('vendor');
      $quantity = $request->input('quantity');

      //$data=array('DrinkName'=>$DrinkName,"unitOfMeasurement"=>$unitOfMeasurement,"inventoryAmount"=>$inventoryAmount,"costPerUnit"=>$costPerUnit,"totalCost"=>$totalCost,"vendor"=>$vendor,"quantity"=>$quantity);
      DB::update('update drinks set DrinkName = ?, unitOfMeasurement = ?, inventoryAmount = ?, costPerUnit = ?, totalCost = ?, vendor = ?, quantity = ? where DrinkNo = ?', [$DrinkName, $unitOfMeasurement, $inventoryAmount, $costPerUnit, $totalCost, $vendor, $quantity, $DrinkNo]);
      $request->session()->flash('message','Drink Item updated successfully');
      return redirect()->action('InventoryController@index');
   }

   public function show($DrinkNo)
   {
      //
      $drinks = DB::select('select * from drinks where DrinkNo = ?', [$DrinkNo]);
      return view('inventoryedit', ['drinks' => $drinks]);
   }
   
  
   public function i_index()
   {
      //
      $posts = Post::all();

      return view('posts.inventoryindex', compact('posts'));
   }
   public function update(Request $request, Post $post)
   {

     
   } 


   public function destroy(Request $request,$DrinkNo)
   {
      DB::delete('delete from drinks where DrinkNo=?', [$DrinkNo]);

      $request->session()->flash('message','Drink Item deleted successfully');
       return redirect()->action('InventoryController@index');
   }
 
}
