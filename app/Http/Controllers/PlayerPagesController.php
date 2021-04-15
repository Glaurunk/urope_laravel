<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Character;

class PlayerPagesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the players dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $userId = Auth::user()->id;
        $characters = Character::where('user_id', $userId)->get();
        return view('player.characters.index', compact('characters'));

    }
}
