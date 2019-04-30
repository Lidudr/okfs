@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
                <div class="card-body">
                    <span class="card-title">Disease</span>
                    <a href="/app/disease/add" class="float-right">New Disease</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($diseases as $disease)
                            <tr>
                            <td>{{$disease->name}}</td>
                            <td>{{$disease->description}}</td>
                            <td><a href="/app/disease/edit/{{$disease->id}}"><i class="fa fa-edit"></i></a>
                            <a class="text-danger" href="/app/disease/delete/{{$disease->id}}"><i class="fa fa-trash"></i></a></td>
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
