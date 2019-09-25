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
        $users = DB::table('inventory')->get();

        return view('inventory',['users'=>$users]);
     }

}
