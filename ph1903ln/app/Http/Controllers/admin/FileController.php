<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\controller;

class FileController extends Controller
{
    public function index()
    {
       return view('admin/file');
    }

}
