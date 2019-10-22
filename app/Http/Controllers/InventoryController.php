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
    public function index() {
       $drinks = DB::table('drinks')->get();
       $foods = DB::table('fooditems')->get();
       $users = DB::table('inventory')->get();
       $crockery=DB::table('crockery')->get();
        return view('inventory',['users'=>$users,'drinks'=>$drinks,"foods"=>$foods,"crockery"=>$crockery]);
     }


   

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
      return redirect()->back(); 
   }


   public function create(){
      return view('inventory');
   }

   public function edit(Request $request, $foodTypeNo){
      //$posts=DB::select('select * from drinks where FoodTypeNo=?',[$drink]);
      $DrinkName=$request->input('DrinkName');
      $unitOfMeasurement=$request->input('unitOfMeasurement');
      $inventoryAmount=$request->input('inventoryAmount');
      $costPerUnit=$request->input('costPerUnit');
      $totalCost=$request->input('totalCost');
      $vendor=$request->input('vendor');
      $quantity=$request->input('quantity');

      //$data=array('DrinkName'=>$DrinkName,"unitOfMeasurement"=>$unitOfMeasurement,"inventoryAmount"=>$inventoryAmount,"costPerUnit"=>$costPerUnit,"totalCost"=>$totalCost,"vendor"=>$vendor,"quantity"=>$quantity);
      DB::update('update drinks set DrinkName = ?, unitOfMeasurement = ?, inventoryAmount = ?, costPerUnit = ?, totalCost = ?, vendor = ?, quantity = ? where foodTypeNo = ?',[$DrinkName,$unitOfMeasurement,$inventoryAmount,$costPerUnit,$totalCost,$vendor,$quantity,$foodTypeNo]);
      echo "Record updated successfully.<br/>";
      echo '<a href = "/inventory">Click Here</a> to go back.';
      
      
   }  

   public function show($foodTypeNo)
    {
        //
        $drinks = DB::select('select * from drinks where foodTypeNo = ?',[$foodTypeNo]);
      return view('inventoryedit',['drinks'=>$drinks]);
       
    }
   
    public function i_index()
    {
        //
        $posts = Post::all();

        return view('posts.inventoryindex', compact('posts'));
    }
   public function update(Request $request,Post $post){
   
      $DrinkName=$request->get('DrinkName');
      $unitOfMeasurement=$request->get('unitOfMeasurement');
      $inventoryAmount=$request->get('inventoryAmount');
      $costPerUnit=$request->get('costPerUnit');
      $totalCost=$request->get('totalCost');
      $vendor=$request->get('vendor');
      $quantity=$request->get('quantity');

      $data=DB::update('update drinks set DrinkName=?, unitOfMeasurement=?, inventoryAmount=?, costPerUnit=?, totalCost=?, vendor=?, quantity=? where FoodTypeNo=?',[$DrinkName,$unitOfMeasurement,$inventoryAmount,$costPerUnit,$totalCost,$vendor,$quantity]);
      
      if($post){
        $red=redirect('post.inventoryindex')->with('success','Data has been updated');
      }else{
         $red=redirect('post.inventoryshow'.$post)->with('danger','Error');
      }
   
      DB::table('drinks')->update($data);
      return redirect()->back();

   } 
   
   public function destroy($foodTypeNo){
     DB::delete('delete from drinks where foodTypeNo=?',[$foodTypeNo]);
     echo "Record deleted successfully.<br/>";
     echo '<a href = "/inventory">Click Here</a> to go back.';
    
   }

}
