<?php

namespace App\Http\Controllers;

use App\Colony;
use App\Http\Requests;
use App\Problem;
use App\Request as Petition;
use App\RequestPriority;
use App\Typology;
use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->check()) {
            $user=User::find(auth()->user()->id);
            $role_user=auth()->user()->roles()->lists('name')->toArray();    
            $typologies=Typology::all();
            $counters=array();
            foreach ($typologies as $typology) { 
                $counters[$typology->id]=Petition::countTypology($typology->id)->count();
            }
            $counters=json_encode($counters);
        if (in_array( 'Root' , $role_user)) {
           return view("admin.users.profile",compact('user'));
        } else {
                if (in_array( 'Administrador' , $role_user)) {
                    return view('pages.index',compact('typologies','counters'));
                } else {
                        if (in_array( 'usuario' , $role_user)) 
                            {return view("admin.users.profile",compact('user'));} 
                        else { abort(404); }   
                        }
                }
        } 
        else { return view('pages.welcome');}
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $colonies=Colony::lists('name','id');
            $problems=Problem::lists('name','id');
            return view('pages.public.requests.create', compact('colonies','problems'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
        dd('created petition public');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $request->all();
        dd('created petition public');
    }      

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirec()
    {
        
    }
}
