<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = DB::table('menu')->get();
        return view('menu',['items'=>$menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uploadedImage = $request->file('file');
        $allowedExtensions = array("png","jpg","jpeg");
        if(in_array($uploadedImage->getClientOriginalExtension(),$allowedExtensions)){
           if($uploadedImage->move('uploads',$uploadedImage->getClientOriginalName())){
               $url = '/uploads/'.$uploadedImage->getClientOriginalName();
               $validator = Validator::make($request->all(),[
                   'food' => 'required',
                   'amount' => 'required|numeric',
               ]);
               if($validator->fails()){
                return back()->withErrors($validator);
               }else{
                if(Menu::create([
                    'name' => $request->get('food'),
                    'description' => $request->get('description'),
                    'amount' => $request->get('amount'),
                    'url' => $url
                   ])){
                    return redirect('/menu')->with("SUCCESS","Food item uploaded!");  
                   }else{
                    return redirect('/menu')->with("FAILED","Error! Unable to add menu item");  
                   }               
               }

           }else{
            return redirect('/menu')->with("FAILED","Error! Unable to add file to directory");  
           }
        }else{
            return redirect('/menu')->with("FAILED","Error! Unsupported extension type.");
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
        $item = Menu::find($id);
        if($item->delete())
        return redirect('/menu')->with('SUCCESS','Item Deleted!');
        else
        return redirect('/menu')->with('FAILED','Unable to delete item!');
    }
}
