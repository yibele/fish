<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\XinZhis;
use App\Fonts;
use App\Colors;
use App\letters;
use App\pubLetterComment;
use Illuminate\Support\Facades\Cookie;

class PublicController extends Controller
{
    public function letter() {
    	$title = '编写信件 -- 慢递鱼，你的心意，我们慢递';
    	$xinzhis = $this->getXinzhis();
		$fonts = $this->getFonts();
		$FontColors = $this->getFontColors();
		return view('public.letter')->with('title',$title)->with('xinzhis',$this->getXinzhis())->withFonts($this->getFonts())->withFontColors($this->getFontColors());
	}

	public function pubLetter () {
        $letters = letters::all()->toArray();
        $newLetter = [];
        foreach($letters as &$letter) {
            if($letter['isPublic'] == 1) {
                $letter['lt_content'] = mb_strrchr(mb_substr($letter['lt_content'],0,150),'</div>',true)."</div>";
                $newLetter[] = $letter;
            }
        }
		return view('public.pubLetter')->withLetters($newLetter);
	}
	
	public static function getXinzhis() {
        $newXinzhis = array();
        $xinzhis = Xinzhis::all()->toArray();
        for($i=0;$i<ceil(count($xinzhis)/7);$i++) {
            for($j= $i*7;$j<($i+1)*7 && $j<count($xinzhis);$j++) {
                $newXinzhis[$i][] = $xinzhis[$j];
            }
        }
        return $newXinzhis;
	}

	public static function getFonts() {
		$newFonts = array();
		$fonts = Fonts::all()->toArray();
		for($i=0 ; $i< ceil(count($fonts)/12);$i++) {
            for($j= $i*12;$j < ($i+1)*12 && $j<count($fonts);$j++) {
                $newFonts[$i][] = $fonts[$j];
            }
        }
        return $newFonts;
	}

	public static function getFontColors() {
		return Colors::all()->toArray();
	}

	public function editLetter ($letterId) {
		echo $letterId;
	}

	public function pubShow($lid) {
        $letter = letters::find($lid);
        $letter->view = $letter->view+1;
        $letter->save();
        $comments = pubLetterComment::where('letters_lid','=',$lid)->paginate(5);
        return view('public.pubShow')->withLetterConfig($letter)->withComments($comments);
    }

    public function getComments ($letter_id) {
        $comments = pubLetterComment::find($letter_id);
        return response($comments,200);
    }

    public function addLike ($lid){
        $letters = letters::find($lid);
        $letters->like = $letters->like + 1;
        if($letters->save()) {
            Cookie::queue('like'.$lid, 'true', $minutes = 99999999, $path = null, $domain = null, $secure = false, $httpOnly = false);
            return response('true',200);
        } else {
            return response('false',404);
        }
    }
}
