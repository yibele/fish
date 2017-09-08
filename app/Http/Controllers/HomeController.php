<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $data = [
            'userId' => $user->id,
            'phone' =>  $user->phone,
            'code' => 'success',
        ];

        return response(json_encode($data),200);
    }

    public function dashboard() {
        $user = Auth::user();

        $letter = $user::find(1)->letters;

        print_r($letter);

        if($user->role =='admin') {
            //提交到管理员界面
            echo 'admin';
        } else {
            //获取用户信息
            $newLt = array();
            $letters = $user->letter;

//            foreach($letter as $k=>&$v){
//                if($k == 'status'){
//                    switch ($v){
//                        case 0:
//                    }
//                }
//            }
            return view('private.dashboard')->with('letters',$letters);
        }
    }
}
































