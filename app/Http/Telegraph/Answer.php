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
        $songPath = public_path('storage/content\songs\Мэйби Бэйби - DURAGA.mp3');
        $this->chat->audio($songPath)->send();
    }

    public function fedos(): void
    {
        $songPath = public_path('storage/content\songs\trinadcat_karat_-_davajj_rasskazhem_(musmore.com).mp3');
        $this->chat->audio($songPath)->send();
    }

    public function sergey(): void
    {
        $songPath = public_path('storage/content\songs\Gspd - ПУЛЬС (feat. КУОК).mp3');
        $this->chat->audio($songPath)->send();
    }

    public function maks(): void
    {
        $songPath = public_path('storage/content\songs\sqwoz-bab-300-mp3.mp3');
        $this->chat->audio($songPath)
            ->html('<b>Текст</b>')->send();
    }

    public function hello(): void
    {
        $imagePath = public_path('storage/content\images\hello.jpg');
        $this->chat->photo($imagePath)->send();
    }

    public function help(): void
    {
        $this->chat->message('Говорил же не поможет')->send();
    }

    protected function handleChatMessage(Stringable $text): void
    {
        Log::info(json_encode($this->message->toArray(), JSON_UNESCAPED_UNICODE));
    }
}

