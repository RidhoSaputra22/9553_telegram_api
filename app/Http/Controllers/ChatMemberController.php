<?php

namespace App\Http\Controllers;

use App\Models\ChatMember;
use App\Http\Requests\StoreChatMemberRequest;
use App\Http\Requests\UpdateChatMemberRequest;

class ChatMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChatMemberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ChatMember $chatMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChatMember $chatMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChatMemberRequest $request, ChatMember $chatMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChatMember $chatMember)
    {
        //
    }
}
