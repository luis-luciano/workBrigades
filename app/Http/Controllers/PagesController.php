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

    	$r=Petition::countTypology(1)->count();


    	

    	dd($r);


    	$typologies=Typology::all();
    	$requests=Petition::all();
        return view('pages.index',compact('typologies','requests'));
    }

}
