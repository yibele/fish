<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cantpostcard;
use App\Xinzhi;
use App\Fonts;
use App\Colors;
use App\letters;
use App\pubLetterComment;
use Illuminate\Support\Facades\Cookie;

class PublicController extends Controller
{
    public function letter()
    {
        $title = '编写信件 -- 慢递鱼，你的心意，我们慢递';
        $xinzhis = $this->getXinzhis();
        $fonts = $this->getFonts();
        $FontColors = $this->getFontColors();
        return view('public.letter')->with('title', $title)->with('xinzhis', $this->getXinzhis())->withFonts($this->getFonts())->withFontColors($this->getFontColors());
    }

    public function pubLetter()
    {
        $letters = letters::where('isPublic', '=', '1')->get();
        return view('public.pubLetter')->withLetters($letters);
    }

    public static function getXinzhis()
    {
        $newXinzhis = array();
//    $xinzhis = Xinzhi::all()->toArray();
//    for ($i = 0; $i < ceil(count($xinzhis) / 7); $i++) {
//      for ($j = $i * 7; $j < ($i + 1) * 7 && $j < count($xinzhis); $j++) {
//        $newXinzhis[$i][] = $xinzhis[$j];
//      }
//    }
        $xinzhis = Xinzhi::all();
        return $xinzhis;
    }

    public static function getFonts()
    {
        $newFonts = array();
        $fonts = Fonts::all()->toArray();
        for ($i = 0; $i < ceil(count($fonts) / 12); $i++) {
            for ($j = $i * 12; $j < ($i + 1) * 12 && $j < count($fonts); $j++) {
                $newFonts[$i][] = $fonts[$j];
            }
        }
        return $newFonts;
    }

    public static function getFontColors()
    {
        return Colors::all()->toArray();
    }

    public function editLetter($letterId)
    {
        echo $letterId;
    }

    public function pubShow($lid)
    {
        $letter = letters::find($lid);
        $letter->view = $letter->view + 1;
        $letter->save();
        $publetter = letters::where('isPublic', '=', 1)->orderBy('created_at', "DSCE")->get();
        $publid = array();
        foreach ($publetter as $pub) {
            $publid[] = $pub->lid;
        }
        $comments = pubLetterComment::where('letters_lid', '=', $lid)->orderBy('created_at', 'DESC')->paginate(5);
        return view('public.pubShow')->withLetterConfig($letter)->withComments($comments)->withPublid($publid);
    }

    public function getComments($letter_id)
    {
        $comments = pubLetterComment::find($letter_id)->orderBy('created_at', 'DESC');
        return response($comments, 200);
    }

    public function addLike($lid)
    {
        $letters = letters::find($lid);
        $letters->like = $letters->like + 1;
        if ($letters->save()) {
            Cookie::queue('like' . $lid, 'true', $minutes = 99999999, $path = null, $domain = null, $secure = false, $httpOnly = false);
            return response('true', 200);
        } else {
            return response('false', 404);
        }
    }

    public function postcard()
    {
        $title = "创建自己的明信片";
        return view('public.postCard')->with('title', $title)->withFonts($this->getFonts())->withFontColors($this->getFontColors())->withCantPostCards($this->getCantPostCards());
    }

    public function getCantPostCards()
    {
        $newpost = array();
        $cantpost = cantpostcard::all()->toArray();
        for ($i = 0; $i < ceil(count($cantpost) / 5); $i++) {
            for ($j = $i * 5; $j < ($i + 1) * 5 && $j < count($cantpost); $j++) {
                $newpost[$i][] = $cantpost[$j];
            }
        }
        return $newpost;
    }

    public function getCantPostCard($id)
    {
        $cantpost = cantpostcard::find($id)->toArray();
        if ($cantpost) {
            return response($cantpost, 200);
        } else {
            return response('没有找到相关的信用卡', 504);
        }
    }
}
