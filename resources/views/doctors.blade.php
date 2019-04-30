@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 card" style="padding: 0 !important; margin: 0;">
            <div class="card-body" style="padding: 0 !important; margin: 0;">
            <div class="list-group">
                @foreach($doctors as $doctor)
                <a href="/app/chat/{{ $doctor->id }}" class="list-group-item list-group-item-action">
                {{ $doctor->user->first_name . ' ' . $doctor->user->middle_name }}
                </a>
                @endforeach
            </div>
            </div>
        </div>
    </div>
</div>
@endsection