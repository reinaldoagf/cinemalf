<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
     public function index()
    {
        //
        return view('index');
    }
    public function contact()
    {
        //
        return view('contact');

    }
    public function review()
    {
        //
        return view('review');

    }
    public function admin()
    {
        //
        return view('admin/index');

    }

}
