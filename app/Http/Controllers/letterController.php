<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\letters;

class letterController extends Controller
{

    public function index(){

    }

    public function create(Request $request){
        $post = $request->post();

        #测试

        $letter =[
            'lt_back'=>$post['lt_back'],
            'lt_content'=>$post['lt_content'],
            'lt_fontSize'=>$post['lt_fontSize'],
            'lt_fontid'=>$post['lt_fontFamily'][0],
            'lt_accesskey'=>$post['lt_fontFamily'][1],
            'lt_color'=>$post['lt_color']
        ];

        if($res = $this->saveLetter($letter)) {
            echo $res;
        }
    }

    public function update() {

    }

    private function saveLetter($letter){

        $letters = new letters();

        foreach($letter as $k=>$v) {
            $letters->$k = $v;
        }

        $res = $letters->save();
        if($res) {
            return $letters->lid;
        }
    }
}


