<?php

namespace App\Http\Telegraph;

use App\Http\Traits\CategoryMusicTrait;
use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;
use DefStudio\Telegraph\Models\TelegraphChat;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Stringable;

class Answer extends WebhookHandler
{
    use CategoryMusicTrait;
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
        $chat->message("Привет, это музыкальный бот.")->send();
        $chat->message("Выбери категорию и получишь случайную песню)")->send();
        $this->categoryChoice();

    }

    public function music(): void
    {
       $this->categoryChoice();
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

