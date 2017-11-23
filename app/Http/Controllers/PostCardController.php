<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Postcard;

class PostCardController extends Controller
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
      $postcards = Postcard::all();
      return view('manage.postcards.index')->withPostcards($postcards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('manage.postcards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $postcard = new Postcard();
      if($request->get('is_editable') == 0) {
        $postcard->name = $request->name;
        $postcard->yincai_id = $request->yincai_id;
        $postcard->is_editable = $request->is_editable;
        $postcard->stamp_style = $request->stamp_style;
        $postcard->erweima_style = $request->erweima_style;
        $postcard->content_style = $request->content_style;
        $postcard->isCol = $request->isCol;
      }else if ($request->get('is_editable') == 1) {

      }
      if($postcard->save()) {
        return $postcard->id;
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
      $postcard = Postcard::findOrFail($id);
      return view('manage.postcards.show')->withPostcard($postcard);
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
        //
    }
}
