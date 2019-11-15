<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Inventory;
use Log;

class InventoryController extends Controller
{
<<<<<<< HEAD
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $inventory = Inventory::orderBy('created_at','desc')->take(40)->get();
        return view('inventory',['inventory'=>$inventory]);
    }
=======
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
>>>>>>> 8bf12c6cd3296751120a1dd9868d22b12dbb4c9c

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

<<<<<<< HEAD
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
        $validator = Validator::make($request->all(),[
            "name"=>"required",
            "measurement"=>"required",
            "qty"=>"required",
            "cost"=>"required|numeric",
            "vendor"=>"required",
          
        ]);

        if($validator->fails()){
            return redirect('/inventory')->withErrors($validator)->withInput();
        }else{
        
            if(Inventory::create([
                "name"=>$request->get("name"),
                "unitOfMeasurement"=>$request->get("measurement"),
                "inventoryAmount"=>$request->get("qty"),
                "costPerUnit"=>$request->get("cost"),
                "vendor"=>$request->get("vendor"),
                "quantity"=>$request->get("qty"),
                "type"=>$request->get("type"),
                "totalCost"=> ($request->get("cost") *  $request->get("qty"))
            
            ])){
                return back()->with("SUCCESS","Added");
            }else{
                return back()->with("FAILED","Error, Unable to add!"); 
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //

        $inventory = Inventory::where('name', $request->input('query'))
               ->orderBy('name', 'desc')
               ->take(10)
               ->get();

      return view('inventory',['inventory'=>$inventory]);

    }

    public function options(Request $request)
    {
        //
        $sign = ">";
        $getOption = $request->input('options');
        if($getOption != '1'){
            $sign = "=";
        }

        $inventory = Inventory::where('inventoryAmount', $sign, 0)
               ->get();

      return view('inventory',['inventory'=>$inventory]);

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
        $url = "noimg";

        if($request->file('image')){
            $uploadedImage = $request->file('image');
            $allowedExtensions = array("png","jpg","jpeg");
            if(in_array(strtolower($uploadedImage->getClientOriginalExtension()),$allowedExtensions)){
               if($uploadedImage->move('uploads',$uploadedImage->getClientOriginalName())){
               $url =  '/uploads/'.$uploadedImage->getClientOriginalName();
                }
            }
        }else{
            $url = $request->get('imgUrl');
        }



        $validator = Validator::make($request->all(),[
            "name"=>"required",
            "quantity"=>"required",
            "inv-amt"=>"required|numeric",
            "costPerItem"=>"required|numeric",
            "vendor"=>"required",
          
        ]);

        if($validator->fails()){
            return redirect('/inventory')->withErrors($validator)->withInput();
        }else{
            $updateData = [ "name"=>$request->get("name"),
            "inventoryAmount"=>$request->get("inv-amt"),
            "costPerUnit"=>$request->get("costPerItem"),
            "vendor"=>$request->get("vendor"),
            "quantity"=>$request->get("quantity"),
            "url"=>$url,
        ];
            if(Inventory::where('foodTypeNo', $id)
            ->update($updateData)){
                return back()->with("SUCCESS","Updated");
            }else{
                return back()->with("FAILED","Error, Unable to update!"); 
            }
        }      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if(Inventory::where('foodTypeNo', $id)->delete()){
            return back()->with("SUCCESS","Deleted");
        }else{
            return back()->with("FAILED","Error, Unable to delete!"); 
        }
    }
=======

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
 
>>>>>>> 8bf12c6cd3296751120a1dd9868d22b12dbb4c9c
}
