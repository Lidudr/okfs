@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body" style="padding: 10px 50px;">
                    @foreach($resources as $resource)
                    <div class="card" style="border: .5px solid rgb(241, 239, 239)">
                        <img class="card-img-top"
                            src="{{ asset('/images/' . $resource->image) }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $resource->title }}</h5>
                            <p class="card-text">{{ $resource->description }}</p>
                            <p class="float-right">
                                <span class="fa fa-clock-o text-primary"> </span> {{ \Carbon\Carbon::parse($resource->created_at)->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection