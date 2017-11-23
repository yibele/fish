<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Yincai;
use Intervention\Image\ImageManagerStatic as Image;

class YincaiController extends Controller
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
    $yincais = Yincai::all();
    return view('manage.yincais.index')->withYincais($yincais);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('manage.yincais.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $yincai = new Yincai();

    $file1 = $request->file('file1');
    $file2 = $request->file('file2');
    $name = $request->get('name');
    $desc = $request->get('desc');
    $path1 = Storage::putFile('yincais', $file1);
    $tmb1_name = $request->get('name') . '1.jpg';
    $tmb1 = Image::make($file1)->resize(250, null, function ($e) {
      $e->aspectRatio();
    })->save(public_path('uploads/yincais/' . $tmb1_name));
    $yincai->file1 = UPLOAD_FILE.$path1;
    $yincai->name = $name;
    $yincai->desc = $desc;
    $yincai->tmb1 = UPLOAD_FILE.'yincais/'.$tmb1_name;
    // save our image;
    if (!empty($file2)):
      $tmb2_name = $request->get('name') . '2.jpg';
      $tmb2 = Image::make($file2)->resize(250, null, function ($e) {
        $e->aspectRatio();
      })->save('uploads/yincais/' . $tmb2_name);
      $yincai->tmb2 = UPLOAD_FILE.'yincais/'.$tmb2_name;
      $path2 = Storage::putFile('yincais', $file2);
      $yincai->file2 = UPLOAD_FILE.$path2;
    endif;

    if ($yincai->save()):
      return redirect()->route('yincais.show', $yincai->id);
    endif;
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $yincai = Yincai::findOrFail($id);
    return view('manage.yincais.show')->withYincai($yincai);

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $yincai = Yincai::findOrFail($id);
    return view('manage.yincais.edit')->withYincai($yincai);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $yincai = Yincai::findOrFail($id);
    Storage::delete($yincai->file1);
    Storage::delete($yincai->file2);
    Storage::delete($yincai->tmb1);
    Storage::delete($yincai->tmb2);

    $file1 = $request->file('file1');
    $file2 = $request->file('file2');
    $name = $request->get('name');
    $desc = $request->get('desc');
    $path1 = Storage::putFile('yincais', $file1);
    Storage::setVisibility($path1, 'public');
    $yincai->file1 = $path1;
    $yincai->name = $name;
    $yincai->desc = $desc;
    // save our image;
    if (!empty($file2)):
      $path2 = Storage::putFile($file2, 'public');
      $yincai->file2 = $path2;
    endif;

    if ($yincai->save()):
      return redirect()->route('yincais.show', $yincai->id);
    endif;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }

  public function getxinzhiyincai($id)
  {
    $yincai = Yincai::findOrFail($id);
    return $yincai->file1;
  }

  public function getpostcardyincai($id){
    $yincai = Yincai::findOrFail($id);
    return ['file1'=>$yincai->file1,'file2'=>$yincai->file2];
  }

}
