<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\resource;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = resource::all();
        return view('admin.resource.list')->with('resources',$resources);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.resource.add');
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
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'image' => 'required',
        ]);


        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        resource::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName
        ]);
        return back()->with('success','You have successfully add new resource.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resource = resource::find($id);
        return view('admin.resource.edit')->with('resource', $resource);
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
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'image' => 'required',
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        resource::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName
        ]);
        return back()->with('success','You have successfully update the resource.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        resource::find($id)->delete();
        return back()->with('success','You have successfully deleted the resource.');
    }
}
