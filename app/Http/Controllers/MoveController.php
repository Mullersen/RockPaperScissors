<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoveController extends Controller
{
    function generateComputerResponse(){
        $moves = [
            "Rock",
            "Paper",
            "Scissors",
        ];
        $index = rand(0, sizeof($moves)-1);
        return response()->json(["computerMove"=>$moves[$index]]);
    }
}
