@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
                <div class="card-body">
                    <span class="card-title">Doctors</span>
                    <a href="/admin/doctor/add" class="float-right">New Doctor</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Full name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Hospital</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($doctors as $doctor)
                            <tr>
                            <td>{{$doctor->user->first_name . ' ' . $doctor->user->middle_name . ' ' . $doctor->user->last_name}}</td>
                            <td>{{$doctor->user->email}}</td>
                            <td>{{$doctor->hospital->name}}</td>
                            <td><a href="/admin/doctor/edit/{{$doctor->id}}"><i class="fa fa-edit"></i></a>
                            <a class="text-danger" href="/admin/doctor/delete/{{$doctor->id}}"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
