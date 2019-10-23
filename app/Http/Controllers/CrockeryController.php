<?php
namespace App\Http\Controllers;

use App\Crockery;
use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Inventory;
use Symfony\Component\HttpFoundation\Session\Session;

class CrockeryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($crockeryid=0)
    {
        //
        $drinks = DB::table('drinks')->get();
        $foods = DB::table('fooditems')->get();
        $users = DB::table('inventory')->get();
       // $crockery=DB::table('crockery')->get();

        $crockery['data']=Crockery::getData($crockeryid);
        $crockery['edit']=$crockeryid;

        if($crockeryid>0){
            $crockery['editData']=Crockery::getData($crockeryid);
        }
         return view('inventory')->with("crockery",$crockery);
      
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
      return view('inventoryeditc',['crockery'=>$crockery]);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $request, $crockeryid)
    {
        
        $crockeryname=$request->input('crockeryname');
        $quantity=$request->input('quantity');
        

        DB::update('update crockery set crockeryname = ?, quantity = ? where crockeryid = ?',[$crockeryname,$quantity,$crockeryid]);
      echo "Record updated successfully.<br/>";
      echo '<a href = "/inventory">Click Here</a> to go back.';
      
    }
    
    public function save(Request $request){
     if($request->input('submit')!=null){

        if($request->input('crockeryname')!=null){
            $crockeryname=$request->input('crockeryname');
            $quantity=$request->input('quantity');
            $crockeryid = $request->input('editid');
            if($crockeryname!=''&& $quantity!=''){
                $data=array("crockeryname"=>$crockeryname,"quantity"=>$quantity);
                Crockery::updateData($crockeryid,$data);
                $request->session()->flash('message','Item updated successfully!!!');
            }
        }else{
            $crockeryname=$request->input('crockeryname');
            $quantity=$request->input('quantity');
            
            if($crockeryname!=''&&$quantity!=''){
                $data=array('crockeryname'=>$crockeryname,'quantity'=>$quantity);

                $value=Crockery::insertData($data);
                if($value){
                    $request->session()->flash('message','Item inserted Successfully!!');
                }else{
                    $request->session()->flash('message','Item already exists !!');    
                }
            }
        }
     }
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
    public function destroy($crockeryid=0,Request $request)
    {
        //
        // DB::delete('delete from crockery where crockeryid=?',[$crockeryid]);
        // echo "Record deleted successfully.<br/>";
        // echo '<a href = "/inventory">Click Here</a> to go back.';
        if($crockeryid!=0){
            Crockery::deleteData($crockeryid);
            $request->session()->flash('message','Item deleted successfully');
        }
        return redirect()->action('InventoryController@index');
    }
}
