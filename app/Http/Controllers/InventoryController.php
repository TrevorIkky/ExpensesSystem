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
        return view('inventory',['users'=>$users,'drinks'=>$drinks,"foods"=>$foods]);
     }

}
