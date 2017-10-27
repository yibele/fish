<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{

    public function __construct()
    {

    }

    public function uploadstamp (Request $request) {
        $files = $request->file('file');
        if(!empty($files)):
            $res = Storage::putFile('public',$files);
        endif;

        return response()->json(['success'=>true,'imgSrc'=>$res]);
    }
}
