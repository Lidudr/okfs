@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 card" style="padding: 0 !important; margin: 0;">
            <div class="card-body" style="padding: 0 !important; margin: 0;">
            <div class="list-group">
                @foreach($patients as $patient)
                <a href="/app/chat/{{ $patient->id }}" class="list-group-item list-group-item-action">
                {{ $patient->user->first_name . ' ' . $patient->user->middle_name }}
                </a>
                @endforeach
            </div>
            </div>
        </div>
    </div>
</div>
@endsection