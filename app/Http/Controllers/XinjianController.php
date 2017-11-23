<?php

namespace App\Http\Controllers;
use App\Yincai;
use Illuminate\Http\Request;
use App\Xinzhi;
class XinjianController extends Controller
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
        $xinzhis = Xinzhi::all();
        return view('manage.xinzhis.index')->withXinzhis($xinzhis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.xinzhis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $xinzhi = new Xinzhi();
       
        $xinzhi->name = $request->name;
        $xinzhi->yincai_id = $request->yincai;
        $xinzhi->width = $request->width;
        $xinzhi->height = $request->height;
        $xinzhi->paddingTop = $request->padding_top;
        $xinzhi->paddingLeft = $request->padding_left;
        $xinzhi->isCol = $request->isCol;
        $xinzhi->txm_width = $request->txm_width;
        $xinzhi->txm_height = $request->txm_height;
        $xinzhi->txm_padding_top = $request->txm_padding_top;
        $xinzhi->txm_padding_left = $request->txm_padding_left;

        $src = Yincai::findOrFail($request->yincai);
        $src = $src->file1;
        $xinzhi->src = $src;

        if($xinzhi->save()) {
            return redirect()->route('xinjian.index');
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
        $xinzhi = Xinzhi::findOrFail($id);
        return view('manage.xinzhis.show')->withXinzhi($xinzhi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $xinzhi = Xinzhi::findOrFail($id);
        return view('manage.xinzhis.edit')->withXinzhi($xinzhi);
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
        $xinzhi = Xinzhi::findOrFail($id);
        $xinzhi->name = $request->name;
        $xinzhi->yincai_id = $request->yincai;
        $xinzhi->width = $request->width;
        $xinzhi->height = $request->height;
        $xinzhi->paddingTop = $request->padding_top;
        $xinzhi->paddingLeft = $request->padding_left;
        $xinzhi->isCol = $request->isCol;
        $xinzhi->txm_width = $request->txm_width;
        $xinzhi->txm_height = $request->txm_height;
        $xinzhi->txm_padding_top = $request->txm_padding_top;
        $xinzhi->txm_padding_left = $request->txm_padding_left;
        $src = Yincai::findOrFail($request->yincai);
        $src = $src->file1;
        $xinzhi->src = $src;

        if($xinzhi->save()) {
            return redirect()->route('xinjian.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
