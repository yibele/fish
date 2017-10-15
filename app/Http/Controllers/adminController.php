<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{

    private $role;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index () {
        $this->checkRole();
        echo $this->role;
        return view('admin.dashboard');

    }

    private function checkRole() {
        if(Auth::user()->role ='admin') {
            $this->role = 'admin';
        } else {
            $this->role = 'auth';
        }
    }
}
