<?php

namespace App\Http\Telegraph;

use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Stringable;

class Answer extends WebhookHandler
{

    public function start(): void
    {
        Telegraph::message('Кто ты, воин?')
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
        $this->chat->audio('C:\Projects_laravel\tg_bot_telegraph\content\songs\Мэйби Бэйби - DURAGA.mp3')->send();
    }
    public function fedos(): void
    {
        $this->chat->audio('C:\Projects_laravel\tg_bot_telegraph\content\songs\trinadcat_karat_-_davajj_rasskazhem_(musmore.com).mp3')->send();
    }
    public function sergey(): void
    {
        $this->chat->audio('C:\Projects_laravel\tg_bot_telegraph\content\songs\sqwoz-bab-300-mp3.mp3')->send();
    }
    public function maks(): void
    {
        $this->chat->audio('C:\Projects_laravel\tg_bot_telegraph\content\songs\sqwoz-bab-300-mp3.mp3')->send();
    }

    public function hello(): void
    {
        $this->chat->photo('C:\Projects_laravel\tg_bot_telegraph\images\hello.jpg')->send();
    }

    public function help(): void
    {
        $this->reply('Говорил же не поможет');
    }

    protected function handleChatMessage(Stringable $text): void
    {
        Log::info(json_encode($this->message->toArray(), JSON_UNESCAPED_UNICODE));
    }
}

