@extends('layouts.admin')

@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
                <div class="card-body">
                    <span class="card-title">Resources</span>
                    <a href="/app/resource/add" class="float-right">New Resource</a>
                <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">image</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resources as $resource)
                    <tr>
                    <td>{{$resource->title}}</td>
                    <td>{{$resource->description}}</td>
                    <td>{{$resource->image}}</td>
                    <td><a href="/app/resource/edit/{{$resource->id}}"><i class="fa fa-edit"></i></a>
                    <a class="text-danger" href="/app/resource/delete/{{$resource->id}}"><i class="fa fa-trash"></i></a></td>
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
