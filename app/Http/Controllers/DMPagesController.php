<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DMPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isdm']);
    }

    public function index() {
        $users = User::where('role','player')->get();
        return view('dm.dm_home', compact('users'));
    }
}
