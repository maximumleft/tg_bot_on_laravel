<?php

namespace App\Http\Telegraph;

use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Models\TelegraphChat;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Stringable;

class Answer extends WebhookHandler
{
    public function getChatId(): TelegraphChat
    {
        $chatId = $this->message->chat()->id();
        $chat = new TelegraphChat();
        $chat->chat_id = $chatId;
        return $chat;
    }

    public function start(): void
    {
        $chat = $this->getChatId();
        $chat->message('Кто ты, воин?')
            ->Keyboard(
                Keyboard::make()->buttons([
                    Button::make('Руслан')->action('ruslan'),
                    Button::make('Федос')->action('fedos'),
                    Button::make('Сергей')->action('sergey'),
                    Button::make('Максончик')->action('maks'),
                ])
            )->send();
    }

    public function ruslan(): void
    {
        //$chat = $this->getChatId();
        $this->chat->audio('C:\Projects_laravel\tg_bot_telegraph\content\songs\Мэйби Бэйби - DURAGA.mp3')->send();
    }

    public function fedos(): void
    {
        //$chat = $this->getChatId();
        $this->chat->audio('C:\Projects_laravel\tg_bot_telegraph\content\songs\trinadcat_karat_-_davajj_rasskazhem_(musmore.com).mp3')->send();
    }

    public function sergey(): void
    {
       // $chat = $this->getChatId();
        $this->chat->audio('C:\Projects_laravel\tg_bot_telegraph\content\songs\Gspd - ПУЛЬС (feat. КУОК).mp3')->send();
    }

    public function maks(): void
    {
        //$chat = $this->getChatId();
        $this->chat->audio('C:\Projects_laravel\tg_bot_telegraph\content\songs\sqwoz-bab-300-mp3.mp3')
            ->html('<b>ватафак бич, я молодой легенда</b>')->send();
    }

    public function hello(): void
    {
        //$chatId = $this->message->chat()->id();
        //$chat = new TelegraphChat();
        //$chat->chat_id = $chatId;
       // $chat = $this->getChatId();
        // $chat = Telegraph::find($chatId);
        //$chat->message('hello')->send();
       // $this->chat->photo('C:\Projects_laravel\tg_bot_telegraph\images\hello.jpg')->send();
        $this->chat->photo('C:\Projects_laravel\tg_bot_telegraph\content\images\hello.jpg')->send();
        //$chat->message('C:\Projects_laravel\tg_bot_telegraph\images\hello.jpg'? 'true' : "false")->send();
    }

    public function help(): void
    {
        $chat = $this->getChatId();
        $chat->message('Говорил же не поможет')->send();
    }

    protected function handleChatMessage(Stringable $text): void
    {
        Log::info(json_encode($this->message->toArray(), JSON_UNESCAPED_UNICODE));
    }
}

