<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\letters;

class letterController extends Controller
{
    public function show($id) {
        $letter = letters::find($id);
        return $letter;
    }
    public function delete() {
        
    }
}


