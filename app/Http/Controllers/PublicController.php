<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\XinZhis;
use App\Fonts;
use App\Colors;

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
		return view('public.puletter');
	}
	
	private function getXinzhis() {
        $newXinzhis = array();
        $xinzhis = Xinzhis::all()->toArray();
        for($i=0;$i<ceil(count($xinzhis)/7);$i++) {
            for($j= $i*7;$j<($i+1)*7 && $j<count($xinzhis);$j++) {
                $newXinzhis[$i][] = $xinzhis[$j];
            }
        }
        return $newXinzhis;
	}

	private function getFonts() {
		$newFonts = array();
		$fonts = Fonts::all()->toArray();
		for($i=0 ; $i< ceil(count($fonts)/12);$i++) {
            for($j= $i*12;$j < ($i+1)*12 && $j<count($fonts);$j++) {
                $newFonts[$i][] = $fonts[$j];
            }
        }
        return $newFonts;
	}

	private function getFontColors() {
		return Colors::all()->toArray();
	}
}
