<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class ManageController extends Controller
{

    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function dashboard(){
        return view('manage.index');
    }
    # 订单管理
    public function dd() {

    }
    #权限管理
    public function qx() {
        return redirect()->route('permissions.index');
    }
    #印材管理
    public function yc() {

    }
    #信件模板管理
    public function xj() {
        return view('manage.xj');
    }
    #明信片模板管理
    public function mxp() {

    }
    #字体管理
    public function zt() {
        return redirect()->route('ziti.index');
    }
    #用户管理
    public function yh() {

    }
    #云因管理
    public function yy (){

    }
    #价格管理
    public function jg() {

    }
    #代金券管理
    public function djq() {

    }
    #消息推送
    public function xx () {

    }
}
