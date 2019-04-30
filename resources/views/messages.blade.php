@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 card" style="padding: 0 !important; margin: 0;">
            <div class="card-body" style="padding: 0 !important; margin: 0;">
            <div class="list-group">
                @foreach($messages as $message)
                @if($message->from === Auth::user()->id)
                <a href="/app/chat/{{ $message->to }}" class="list-group-item list-group-item-action">
                <p class="name">{{ $message->recipient->first_name . ' ' . $message->recipient->middle_name }}</p>
                    {{ $message->text }}
                <small class="pull-right">{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</small>
                </a>
                @else
                <a href="/app/chat/{{ $message->from }}" class="list-group-item list-group-item-action">
                <p class="name">{{ $message->sender->first_name . ' ' . $message->sender->middle_name }}</p>
                    {{ $message->text }}
                <small class="pull-right">{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</small>
                </a>
                @endif
                @endforeach
            </div>
            </div>
        </div>
    </div>
</div>
@endsection