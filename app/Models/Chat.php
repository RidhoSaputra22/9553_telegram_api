<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    /** @use HasFactory<\Database\Factories\ChatFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'subtitle',
        'time',
        'avatarUrl',
        'is_group'

    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function chatMembers()
    {
        return $this->hasMany(ChatMember::class);
    }
}