<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Hack;
use Carbon;

class HackController extends Controller
{
    public function edit_hack($id)
    {
    	$hack=Hack::find($id);
    	// dd($hack);
        return view("hack.edit")
        ->with("title","Edit Hack")
        ->with("hack",$hack)
        ;
    }
}
