<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fonts;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ZitiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fonts = Fonts::all();
        return view('manage.zitis.index')->withFonts($fonts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.zitis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $ziti = new Fonts();

      $imgSrc = $request->file('imgSrc');
      $fname = $request->fname;
      $accesskey = $request->accesskey;
      $lineHeight = $request->lineHeight;
      $imgSrc = Storage::putFile('fonts',$imgSrc); //保存图片
      $imgSrc= '/uploads/'.$imgSrc;
      $ziti->fname = $fname;
      $ziti->accesskey = $accesskey;
      $ziti->lineHeight  = $lineHeight;
      $ziti->imgSrc = $imgSrc;
      if($ziti->save()) {
        Session::flash("success",'字体创建成功');
        return redirect()->route('ziti.index',$ziti->fid);
      } else {
        Session::flash('fail','字体创建失败，服务器问题');
      }
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
      $font = Fonts::findOrFail($id);
      if($font->delete()) {
        Session::flash('success','删除字体成功');
        return redirect()->route('ziti.index');
      } else {
        Session::flash('fail','删除字体失败');
        return redirect()->route('ziti.index');
      }

    }
}
