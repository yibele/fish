<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postCardController extends Controller
{
    public function index() {
        return view('public.postCard');
    }
}
