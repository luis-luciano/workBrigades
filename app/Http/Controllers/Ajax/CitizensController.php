<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Citizen;
use App\PersonalInformation;
use Illuminate\Http\Request;

use App\Http\Requests;

class CitizensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $citizen=PersonalInformation::create($request->all())->citizen()->create($request->all());

        return response()->json(['id' => $citizen->id,'name' => $citizen->full_name]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Citizen $citizen)
    {
        if (isset($request->include) && $request->include = 'personal_information') {
            $citizen->load('personalInformation');

            return [
                'name' => $citizen->name,
                'paternalSurname' => $citizen->paternal_surname,
                'maternalSurname' => $citizen->maternal_surname,
                'sex' => $citizen->sex,
                'email' => $citizen->email,
                'birthday' => $citizen->birthday,
                'represent' => $citizen->represent,
                'housePhone' => $citizen->house_phone,
                'mobilePhone' => $citizen->mobile_phone,
                'fax' => $citizen->fax,
                'street' => $citizen->street,
                'number' => $citizen->number,
                'interior' => $citizen->interior,
                'profession' => $citizen->profession,
                'colonyId' => $citizen->colony_id,
            ];
        } else {
            return $citizen;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citizen $citizen)
    {
        $citizen->update($request->all());

        $citizen->personalInformation->fill($request->all())->save();

        return response()->json(['name' => $citizen->full_name]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
