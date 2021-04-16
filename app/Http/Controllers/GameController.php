<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class GameController extends Controller
{
    public function __construct()
    {
      // $this->middleware('auth');
    }

    public function index() 
    {
        return view('game.index');
    }

    public function data() {
        $characters = Character::all();
        return json_encode($characters);
    }
}
