<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use Auth;
use App\Events\DiceRoll;
use App\Events\MoveCreature;

class GameController extends Controller
{
    public function __construct()
    {

    }

    public function index() 
    {
        return view('game.index');
    }

    public function rollDice($numberOfDice=1, $diceType=20, $modifiers=0)
    {
        $player = Auth::user()->name ?? 'Guest';
        $roll = random_int(1,$diceType);
        event(new DiceRoll($player,$roll));
    }

    public function moveCreature($creatureType, $creatureId, $targetId, $sourceId) 
    {
        event(new MoveCreature($creatureType, $creatureId, $targetId, $sourceId));
    }
}
