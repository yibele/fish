<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;
class adminController extends Controller
{
    private $role;
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashboard () {
        return view('manage.index');
    }
//    public function index () {
//        $this->checkRole();
//        echo $this->role;
//        return view('admin.dashboard');
//
//    }
//
//    private function checkRole() {
//        if(Auth::user()->role ='admin') {
//            $this->role = 'admin';
//        } else {
//            $this->role = 'auth';
//        }
//    }

    public function index()
    {
        $user = Admin::all();
        return view('manage.users.index')->withUsers($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email'=> 'required|email|unique:users'
        ]);
        $user = new Admin();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if($user->save()) {

        } else {
            Session::flash('danger','无法创建管理员，请重新尝试');
            return redirect()->route('users.create');
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

        $user = Admin::findOrFail($id);
        return view("manage.users.show")->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::where('id',$id)->with('roles')->first();
        return view('manage.users.edit')->withUser($user)->withRoles($roles);
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
        $this->validate($request,[
            'name' => 'required|max:255',
        ]);

        $user = Admin::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        if($user->save()) {
            if ($request->roles) {
                $user->syncRoles(explode(',', $request->roles));
            }
            return redirect()->route('users.show',$user->id);
        } else {
            Session::flash('danger','更新失败，请稍后重新');
            return redirect()->route("users.index");
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
