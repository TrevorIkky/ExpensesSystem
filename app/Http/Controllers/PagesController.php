<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title="TONI'S KITCHEN MENU";
        return view('Pages.index', compact('title'));
    }

    public function foodAdmin()
    {
        return view('Pages.foodAdmin');
    }

    public function cart()
    {
        return view('Pages.cart');
    }
    public function Total()
    {
        return view('Pages.Total');
    }

    public function order()
    {
        return view('Pages.order');
    }
}
