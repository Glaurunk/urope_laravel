<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DMPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isdm']);
    }

    public function index() {
        return view('dm.dm_home');
    }
}
