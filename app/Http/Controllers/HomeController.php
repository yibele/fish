<?php

namespace App\Http\Controllers;

use App\letters;
use App\contacts;
use App\pubLetterComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
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
            'phone' => $user->phone,
            //让前端世道是否已经登录
            'isLogin' => true,
        ];

        return response(json_encode($data), 200);
    }

    /**
     * 显示我的慢递页面 如果是管理员，移动到另外一个页面去
     * @return $this
     */
    public function dashboard()
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            return redirect()->action('adminController@index');
        } else {
            //获取用户信息
            $letters = $user->letter()->orderBy('created_at', "DESC")->paginate(3);
//            foreach($letter as $k=>&$v){
//                if($k == 'status'){
//                    switch ($v){
//                        case 0:
//                    }
//                }
//            }
            return view('private.dashboard')->with('letters', $letters);
        }
    }

    /**
     * 继续编辑页面，可以继续编辑信件
     * @param $lid
     * @return mixed
     */
    public function editLetter($lid)
    {

        $fonts = PublicController::getFonts();
        $fontColors = PublicController::getFontColors();
        $xinzhis = PublicController::getXinzhis();
        $letters = letters::find($lid);
        if ($letters->status != 0) {
            return view('public.error')->withMessages('该信件不在草稿状态呢，无法继续编辑');
        } else {
            return view('private.changeLetter')->withLetters($letters)->withFonts($fonts)->withXinzhis($xinzhis)->withFontColors($fontColors);
        }
    }

    /**
     * 继续编辑页面中继续保存信件.
     * @param Request $request
     * @return array|\Illuminate\Contracts\Routing\ResponseFactory|string|\Symfony\Component\HttpFoundation\Response
     */
    public function updateLetter(Request $request)
    {
        $update = $request->post();
        $letters = letters::find($update['lid']);


        $letters->lt_back = $update['lt_back'];
        $letters->lt_content = $update['lt_content'];
        $letters->lt_fontSize = $update['lt_fontSize'];
        $letters->lt_fontid = $update['lt_fontFamily'][0];
        $letters->lt_accesskey = $update['lt_fontFamily'][1];
        $letters->lt_color = $update['lt_color'];


        if ($letters->save()) {
            return response($letters->lid, 200);
        }
    }


    /**
     * @param $lid
     * @return mixed
     */
    public function createContact($lid)
    {
        $letter_id = $lid;
        return view('private.createContact')->withLid($lid);
    }

    /**
     * 保存联系人和将联系人与信件联系在一起
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function saveContact(Request $request)
    {
        //这一步我们要做两件事情，一个是讲联系人保存在contacts 数据库中
        //第二部， 我们要将联系人的 contacts_id 和 letter_id 一起添加到letter2send 数据库中。
        //将两者联系在一起，之后查询的时候，通过lid就可以查询到我们需要发送的信件和联系人以及时间
        $list = $request->post();
        $tmp = '';
        foreach ($list as $k => $v) {
            $tmp = $k;
        }
        $contacts = json_decode($tmp, true);
        //获取当前信件的letter_id
        //用作后面添加 letter2send 数据库的时候的关联
        $letter_id = $contacts[0]['letters_lid'];
        // 获取添加联系人的时间.
        $now = date('Y-m-d H:i:s');
        // 获取发送
        $sendTime = [];

        //从前段获得的contacts 去除 time , letter_id ;
        foreach ($contacts as &$contact) {
            unset($contact['letters_lid']);
            $sendTime[] = $contact['time'];
            unset($contact['time']);
            $contact['user_id'] = Auth::user()->id;
        }

        $con = new \App\Contacts;
        // 已经获取的contacts数组
        // 保存 contacts 数组到 数据库中
        //先定义一个contacts_id 数组 来获取插入的contacts_id
        $contacts_id = [];

        foreach ($contacts as $v) {
            $contacts_id[] = $con->create($v)->id;
        }

        $this->letter2send($contacts_id, $sendTime, $letter_id);

        return response($letter_id, 200);
        //     if($res = \App\contacts::insert($contacts)) {
        //         echo 'success';
        //     } else {
        //         echo 'fail';
        //     }

    }


    /**
     * @param $letter_id
     */
    public function viewLetter($letter_id)
    {
        if ($letterConfig = \App\letters::find($letter_id)) {
            $letterConfig = $letterConfig->toArray();
            if ($letterConfig['user_id'] == Auth::user()->id) {
                return view('private.viewLetter')->withLetterConfig($letterConfig);
            } else {
                return view('public.error')->withMessages('您无权访问该信件。');
            }
        } else {
            return view('public.error')->withMessages('访问的信件不存在，请检查');
        };
    }


    /**
     * @param $contacts_id
     * @param $sendTime
     * @param $letter_id
     */
    private function letter2send($contacts_id, $sendTime, $letter_id)
    {

        $letter2send = new \App\letter2send;

        for ($i = 0; $i < count($contacts_id); $i++) {
            $letter2send->letters_lid = $letter_id;
            $letter2send->contacts_id = $contacts_id[$i];
            $letter2send->time = $sendTime[$i];
            $letter2send->tag = 0;
            $letter2send->save();
        }
    }

    /**
     * 创建信件
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request)
    {
        $post = $request->post();

        $letter = [
            'lt_back' => $post['lt_back'],
            'lt_content' => $post['lt_content'],
            'lt_fontSize' => $post['lt_fontSize'],
            'lt_fontid' => $post['lt_fontFamily'][0],
            'lt_accesskey' => $post['lt_fontFamily'][1],
            'lt_color' => $post['lt_color'],
            'ltBackTum' =>$post['ltBackTum'],
            'user_id' => Auth::user()->id,
        ];

        if ($lid = $this->saveLetter($letter)) {
            return response($lid, 200);
        } else {
            return response('cant create letter', 500);
        }
    }

    private function saveLetter($letter)
    {
        $letters = new letters();

        foreach ($letter as $k => $v) {
            $letters->$k = $v;
        }

        $res = $letters->save();
        if ($res) {
            return $letters->lid;
        }
    }

    public function commentPublicLetter($lid, Request $request)
    {
        $re = $request->post();
        $comments = new pubLetterComment();
        $comments->letters_lid = $lid;
        $comments->user_name = Auth::user()->phone;
        $comments->content = $re['content'];
        $comments->save();
        return redirect('/publetter/' . $lid);
    }

    public function canclePublicLetter ($lid) {
        $letter = letters::find($lid);
        if($letter->user_id != Auth::user()->id) {
            return view('public.error')->withMessages('您无权这样做');
        } else {
            $letter->isPublic = 0;
            $letter->save();
            return redirect()->action(
                'HomeController@dashboard'
            );
        }
    }

    public function setPub ($lid) {
        $letter = letters::find($lid);
        if($letter->user_id !=Auth::user()->id) {
            return view('public.error')->withMessages("您无权这样做");
        } else {
            $letter->isPublic = 1;
            $letter->save();
            return redirect()->action(
                'HomeController@dashboard'
            );
        }
    }

    public function setLetterPublic($lid) {
        $letter = letters::find($lid);
        if($letter->user_id != Auth::user()->id) {
            return response('您无权访问此信件',404);
        } else {
            $letter->isPublic = 1;
            $letter->save();
            return response('设置公共信件成功',200);
        }
    }

    public function setLetterPrivate($lid) {
        $letter = letters::find($lid);
        if($letter->user_id != Auth::user()->id) {
            return response('您无权访问此信件',404);
        } else {
            $letter->isPublic = 0;
            $letter->save();
            return response('取消公开信',200);
        }
    }
}
































