<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index() {
      return view('common.lobby')->with('success', 'Hi!');
    }
}
