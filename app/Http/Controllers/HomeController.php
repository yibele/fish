<?php

namespace App\Http\Controllers;

use App\letters;
use App\contacts;
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

    public function dashboard() { $user = Auth::user();
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
    public function createContact($lid) {
        $letter_id = $lid;
        return view('private.createContact')->withLid($lid);
    }

    public function saveContact(Request $request) {
        //这一步我们要做两件事情，一个是讲联系人保存在contacts 数据库中
        //第二部， 我们要将联系人的 contacts_id 和 letter_id 一起添加到letter2send 数据库中。
        //将两者联系在一起，之后查询的时候，通过lid就可以查询到我们需要发送的信件和联系人以及时间
        $list = $request->post();
        $tmp = '';
        foreach($list as $k=>$v) {
            $tmp = $k;
        }
        $contacts = json_decode($tmp,true);
        //获取当前信件的letter_id
        //用作后面添加 letter2send 数据库的时候的关联
        $letter_id = $contacts[0]['letter_id'];
        // 获取添加联系人的时间.
        $now = date('Y-m-d H:i:s');
        // 获取发送
        $sendTime = [];

        //从前段获得的contacts 去除 time , letter_id ;
        foreach($contacts as &$contact) {
            unset($contact['letter_id']);
            $sendTime[] = $contact['time'];
            unset($contact['time']);
            $contact['user_id'] = Auth::user()->id;
            $contact['created_at'] = $now;
            $contact['updated_at'] = $now;
        }

        //已经获取的contacts数组
        //保存 contacts 数组到 数据库中

            // if($res = \App\contacts::insert($contacts)) {
            //     echo 'success';
            // } else {
            //     echo 'fail';
            // }
    }

}
































