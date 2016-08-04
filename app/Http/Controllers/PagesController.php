<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Typology;
use App\Request as Petition;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {

        $r=Petition::countTypology(3)->count();
        $typologies=Typology::all();
        $counters=array();
        foreach ($typologies as $typology) {
            $counters[$typology->id]=Petition::countTypology($typology->id)->count();
        }
        $requests=Petition::all();
        $counters=json_encode($counters);
        return view('pages.index',compact('typologies','requests','counters'));
    }
}
