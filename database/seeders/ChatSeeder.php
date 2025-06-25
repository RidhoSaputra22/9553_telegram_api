<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\ChatMember;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $chats = [
            [
                "name" => 'Informasi MBKM UNDIPA',
                "subtitle" => '',
                "time" => '',
                "avatarUrl" => config('app.url') . '/file/photo/',

            ],
            [
                "name" => 'TI - 2022',
                "subtitle" => '',
                "time" => '',
                "avatarUrl" => config('app.url') . '/file/photo/',

            ],
            [
                "name" => 'Teknik Informatika 2022',
                "subtitle" => '',
                "time" => '',
                "avatarUrl" => config('app.url') . '/file/photo/'
            ],
            [
                "name" => 'KKN Mandiri Ganjil 24',
                "subtitle" => '',
                "time" => '',
                "avatarUrl" => config('app.url') . '/file/photo/'
            ],
            [
                "name" => 'SEKOLAH KEDINASAN 2025',
                "subtitle" => '',
                "time" => '',
                "avatarUrl" => config('app.url') . '/file/photo/'
            ],
            [
                "name" => 'Diskusi Soal CPNS',
                "subtitle" => '',
                "time" => '',
                "avatarUrl" => config('app.url') . '/file/photo/'
            ],
            [
                "name" => 'INFO CPNS 2024',
                "subtitle" => '',
                "time" => '',
                "avatarUrl" => config('app.url') . '/file/photo/'
            ],
            [
                "name" => 'CPNS KEMENKUMHAM 2025',
                "subtitle" => '',
                "time" => '',
                "avatarUrl" => config('app.url') . '/file/photo/'
            ],
            [
                "name" => 'CPNS Basarnas',
                "subtitle" => "",
                "time" => '',
                "avatarUrl" => config('app.url') . '/file/photo/'
            ],
            [
                "name" => 'INFO CPNS BUMN',
                "subtitle" => '',
                "time" => '',
                "avatarUrl" => config('app.url') . '/file/photo/'
            ],
            [
                "name" => 'Rekurtment Bersama BUMN',
                "subtitle" => '~ ',
                "time" => '',
                "avatarUrl" => config('app.url') . '/file/photo/'
            ],
            [
                "name" => 'Telegram',
                "subtitle" => '',
                "time" => '',
                "avatarUrl" => config('app.url') . '/file/photo/'
            ],

        ];
        foreach ($chats as $index => $chat) {
            $c = Chat::create([
                'name' => $chat['name'],
                'subtitle' => $chat['subtitle'],
                'time' => $chat['time'],
                'avatarUrl' => $chat['avatarUrl'] . $index + 1 . '.jpg',
                'is_group' => 1
            ]);
            foreach ($chat['message'] ?? [] as $message) {
                Message::create([
                    'content' => $message['content'],
                    'user_id' => $message['user_id'],
                    'chat_id' => $c->id
                ]);
            }
        };

        ChatMember::factory(5)->create();
    }
}