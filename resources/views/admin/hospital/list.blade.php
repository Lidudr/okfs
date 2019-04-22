@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
                <div class="card-body">
                    <span class="card-title">Hospitals</span>
                    <a href="/admin/hospital/add" class="float-right">New Hospital</a>
                <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Type</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hospitals as $hospital)
                    <tr>
                    <td>{{$hospital->name}}</td>
                    <td>{{$hospital->address}}</td>
                    <td>{{$hospital->type}}</td>
                    <td>
                        <a href="/admin/hospital/edit/{{$hospital->id}}"><i class="fa fa-edit"></i></a>
                        <a class="text-danger" href="/admin/hospital/delete/{{$hospital->id}}"><i class="fa fa-trash"></i></a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                </div>
        </div>
        </div>
    </div>
</div>
@endsection
