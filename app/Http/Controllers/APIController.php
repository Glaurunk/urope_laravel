<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class APIController extends Controller
{
    public function data() {
        $characters = Character::all();
        return response()->json($characters);
    }
}
