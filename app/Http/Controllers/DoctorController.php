<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use \App\Doctor;
use \App\Hospital;
use \App\User;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::with(['user', 'hospital'])->get();
        return view('admin.doctor.list')->with('doctors', $doctors);
    }

    public function getDoctorsByHospitalId($id) {
        $doctors = Doctor::with('user')->where('hospital_id', $id)->get();
        return response($doctors);
    }

    public function getDoctorsForPatients() {
        $user = User::with('patient')->find(auth()->id());
        // dd($user->patient->hospital_id);
        $doctors = Doctor::with('user')->where('hospital_id', $user->patient->hospital_id)->get();
        // dd($doctors);
        return view('doctors')->with('doctors', $doctors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hospitals = Hospital::all();
        return view('admin.doctor.add')->with('hospitals', $hospitals);
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
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'hospital_id' => ['required'],
            'role' => ['required']
        ]);
            // dd($request);
        $user = User::create([
            'first_name' => $request['first_name'],
            'middle_name' => $request['middle_name'],
            'last_name' => $request['last_name'],
            'phone' => $request['phone'],
            'role' => $request['role'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);

        Doctor::create([
            'user_id' => $user->id,
            'hospital_id' => $request['hospital_id']
        ]);

        return back()->with('success','You have successfully register new doctor.');
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
        $hospitals = Hospital::all();
        $doctor = Doctor::with(['user', 'hospital'])->find($id);

        $doctor->hospitals = $hospitals;

        return view('admin.doctor.edit')->with('doctor', $doctor);
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
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'hospital_id' => ['required']
        ]);

        $doctor = Doctor::with('user')->find($id);
        
        $doctor->update([
            'hospital_id' => $request['hospital_id']
        ]);

        User::find($doctor->user->id)->update([
            'first_name' => $request['first_name'],
            'middle_name' => $request['middle_name'],
            'last_name' => $request['last_name'],
            'phone' => $request['phone']
        ]);

        return back()->with('success','You have successfully updated.');
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
