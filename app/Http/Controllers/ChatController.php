<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\User;
use \App\Message;
use App\Events\newMessage;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chat');
    }

    public function start($id)
    {
        return view('chat')->with('user_id', $id);
    }

    public function messages() {
        // $messages = Message::where('to', auth()->id())->orderBy('created_at', 'desc')->with('sender')->get()->unique('from');

        $messages = Message::where(function($q) {
            $q->where('from', auth()->id())->orderBy('created_at', 'desc')->take(1);
        })->orWhere(function($q) {
            $q->where('to', auth()->id())->orderBy('created_at', 'desc')->take(1);
        })->orderBy('created_at', 'desc')->get();

        return view('messages')->with('messages', $messages);
    }

    public function getConversation($id)
    {
        $message = Message::where(function($q) use($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function($q) use($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })->get();

        return response()->json($message);
    }


    public function contacts()
    {
        $users = User::where('id', '!=' , auth()->id())->get();
        return response($users, 200);
    }

    public function send(Request $request)
    {
        $message = Message::create([
            'from' => auth()->id(),
            'to' => $request->to,
            'text' => $request->text
        ]);

        broadcast(new newMessage($message));

        return response()->json($message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
