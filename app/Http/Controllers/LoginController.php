<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use App\User; 
use Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('login');
    }

    public function execute_login(Request $request){
        $this->validate($request,[
            'email'   => 'required|email',
            'password' => 'required|min:1',
        ]);

        $user_credentials =  array(
            'email' => $request->get('email') ,
            'password'   => $request->get('password'));
        if (Auth::attempt($user_credentials)) {
            $currentUser = User::where('email',$request->get('email'))->first();
            if($currentUser->isUserAdmin()){
                return redirect('login/ok')->with('user','admin');
            }else{
                return redirect('/payments')->with('user','normal');
            }
        }else{
            return back()->with('Error','Authentication Failed');
        }
    }

    public function successful_login(){
        return view('index');
    }

    public function auth_logout(){
        Auth::logout();
        return view('/login');
    }


    public function register(Request $request){
        $this->validate($request,[
            'name'  => 'required|min:4',
            'email' => 'required|email' ,
            'password' => 'required|min:5'
        ]);

        User::create([
            'name'  => $request->get('name'),
            'email'  => $request->get('email'),
            'type'  => 0,
        	'password' => Hash::make($request->get('password')),
        	'remember_token' => str_random(10),

        ]);

        $user_credentials = array('email'=> $request->get('email'),'password'=>$request->get('password'));
        if(Auth::attempt($user_credentials)){
            $currentUser = User::where('email',$request->get('email'))->first();
            if($currentUser->isUserAdmin()){
                return redirect('login/ok')->with('user','admin');
            }else{
                return redirect('/payments')->with('user','normal');
            }   
        }else{
            return back()->with('Error','Login or registration failed please try again.');
        }

    


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
    }
}
