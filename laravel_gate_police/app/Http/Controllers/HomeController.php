<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function admin(){
        
        if (! Gate::allows('is-admin')) {
            abort(403);
        }
        return view('home.admin');
    }
}
