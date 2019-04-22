<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Hospital;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals = Hospital::all();
        return view('admin.hospital.list')->with('hospitals', $hospitals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hospital.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'type' => 'required',
        ]);

        Hospital::create([
            'name' => $request->name,
            'address' => $request->address,
            'type' => $request->type
        ]);
        return back()->with('success','You have successfully add new hospital.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hospital = Hospital::find($id);
        return view('admin.hospital.show')->with('hospital', $hospital);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hospital = Hospital::find($id);
        return view('admin.hospital.edit')->with('hospital', $hospital);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'type' => 'required',
        ]);

        Hospital::find($id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'type' => $request->type
        ]);
        return back()->with('success','You have successfully update the hospital hospital.');
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
