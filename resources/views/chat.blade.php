@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 card" style="padding: 0 !important; margin: 0;">
            <div class="card-body" style="padding: 0 !important; margin: 0;">
                <chat-app :user_id="{{ $user_id }}"/></chat-app>
            </div>
        </div>
    </div>
</div>
@endsection
