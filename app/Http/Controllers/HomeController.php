<?php

namespace App\Http\Controllers;

use App\letters;
use Illuminate\Http\Request; use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

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
            //让前端世道是否已经登录
            'isLogin' => true,
        ];

        return response(json_encode($data),200);
    }

    public function dashboard() {
        $user = Auth::user();
        if($user->role =='admin') {
            //提交到管理员界面
            echo 'admin';
        } else {
            //获取用户信息
            $letters = $user->letter()->orderBy('lt_date')->paginate(3);
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

    public function editLetter($lid) {

        $fonts = PublicController::getFonts();
        $fontColors = PublicController::getFontColors();
        $xinzhis = PublicController::getXinzhis();
        $letters = letters::find($lid);
        return view('private.changeLetter')->withLetters($letters)->withFonts($fonts)->withXinzhis($xinzhis)->withFontColors($fontColors);
    }

    public function updateLetter (Request $request) {
        $update = $request->post();

        return $update;

        $letters = letters::find($update['lid']);


        $letters->lt_back=$update['lt_back'];
        $letters->lt_content=$update['lt_content'];
        $letters->lt_fontSize=$update['lt_fontSize'];
        $letters->lt_fontid=$update['lt_fontFamily'][0];
        $letters->lt_accesskey=$update['lt_fontFamily'][1];
        $letters->lt_color=$update['lt_color'];


        if($letters->save()) {
            return response($letters->lid,200);
        }
    }

    /** 设置或者更新联系人页面 */
    public function updateContact() {
        return view('private.updateContact');
    }

}
































