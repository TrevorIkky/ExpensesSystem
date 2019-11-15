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
}
