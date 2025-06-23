<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Models\ChatMember;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($userId)
    {

        $chatMembers = ChatMember::with(['chat', 'chat.messages'])->where('user_id', $userId)->get();
        $chat = [];

        foreach ($chatMembers as $chatMember) {
            $chat[] = $chatMember->chat;
        }



        return response()->json($chat);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $valodator = Validator::make($request->all(), [
            'name' => 'required',
            'user_id' => 'required',
            'phone' => 'required',
        ]);

        if ($valodator->fails()) {
            return response()->json($valodator->errors(), 422);
        }

        $receiver = User::where('hp', $request->phone)->first();

        if (!$receiver) {
            return response()->json([
                'message' => 'User not found',
                'status' => 404
            ]);
        }

        $chat = Chat::create([
            'name' => $request->name,
            'subtitle' => '',
            'time' => '',
            'photo' => '',
        ]);

        ChatMember::create([
            'user_id' => $request->user_id,
            'chat_id' => $chat->id,
        ]);

        ChatMember::create([
            'user_id' => $receiver->id,
            'chat_id' => $chat->id,
        ]);

        return response()->json([
            'message' => 'Chat created successfully',
            'chat' => $chat,
            'status' => 200,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $valodator = Validator::make($request->all(), [
            'user_id' => 'required',
            'chat_id' => 'required',
            'content' => 'required',
            'time' => 'required',
            'photo' => 'nullable',
        ]);

        if ($valodator->fails()) {
            return response()->json($valodator->errors(), 422);
        }

        $chat = Message::create([
            'user_id' => $request->user_id,
            'chat_id' => $request->chat_id,
            'content' => $request->content,
            'time' => $request->time,
            'photo' => $request->photo,
        ]);

        return response()->json([
            'message' => 'Message created successfully',
            'chat' => $chat,
            'status' => 200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChatRequest $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        //
    }
}