<?php

namespace App\Http\Traits;

use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Models\TelegraphChat;

trait CategoryMusicTrait
{
    public function getChatId(): TelegraphChat
    {
        $chatId = $this->message->chat()->id();
        $chat = new TelegraphChat();
        $chat->chat_id = $chatId;
        return $chat;
    }
    public function waitLoad(): void
    {
        $this->chat->message('Выбираем песню...')->send();
    }

    public function categoryChoice(): void
    {
        $chat = $this->getChatId();
        $chat->message('Категории')
            ->Keyboard(
                Keyboard::make()->buttons([
                    Button::make('Хард-рок')->action('hardRock'),
                    Button::make('Панк-рок')->action('punkRock'),
                    Button::make('Тильт')->action('tilt'),
                    Button::make('Сопли')->action('snot'),
                    Button::make('Чилл бро')->action('chillBro'),
                    Button::make('Мейби Бейби')->action('maybeBaby'),
                    Button::make('Веселая музычка')->action('funnySongs'),
                    Button::make('Мотивация')->action('motivation'),
                    Button::make('Для души')->action('forSoul'),
                    Button::make('Красивая')->action('beautiful'),
                ])
            )->send();
    }

    public function hardRock(): void
    {
        $this->waitLoad();
        $i = rand(0,9);
        switch ($i){
            case 0:
                $this->chat->audio('storage/content\songs\hardRock\bad-company-dirty-boy.mp3')->send();
                break;
            case 1:
                $this->chat->audio('storage/content\songs\hardRock\badge-in-the-eye-of-the-storm.mp3')->send();
                break;
            case 2:
                $this->chat->audio('storage/content\songs\hardRock\chamber-of-kings-cannibal.mp3')->send();
                break;
            case 3:
                $this->chat->audio('storage/content\songs\hardRock\electric-boys-tumblin039-dominoes.mp3')->send();
                break;
            case 4:
                $this->chat->audio('storage/content\songs\hardRock\foreigner-juke-box-hero.mp3')->send();
                break;
            case 5:
                $this->chat->audio('storage/content\songs\hardRock\no-2morrow-waves.mp3')->send();
                break;
            case 6:
                $this->chat->audio('storage/content\songs\hardRock\skid-row-youth-gone-wild.mp3')->send();
                break;
            case 7:
                $this->chat->audio('storage/content\songs\hardRock\tania-kikidi-rock-amp-roll-paradise.mp3')->send();
                break;
            case 8:
                $this->chat->audio('storage/content\songs\hardRock\twisted-sister-the-kids-are-back.mp3')->send();
                break;
            case 9:
                $this->chat->audio('storage/content\songs\hardRock\winger-in-for-the-kill.mp3')->send();
                break;
        }
    }

    public function punkRock(): void
    {
        $this->waitLoad();
        $songPath = public_path('storage/content\songs\trinadcat_karat_-_davajj_rasskazhem_(musmore.com).mp3');
        $this->chat->audio($songPath)->send();
    }

    public function tilt(): void
    {
        $this->waitLoad();
        $songPath = public_path('storage/content\songs\Gspd - ПУЛЬС (feat. КУОК).mp3');
        $this->chat->audio($songPath)->send();
    }

    public function snot(): void
    {
        $this->waitLoad();
        $songPath = public_path('storage/content\songs\sqwoz-bab-300-mp3.mp3');
        $this->chat->audio($songPath)
            ->html('<b>Текст</b>')->send();
    }

    public function chillBro(): void
    {
        $this->waitLoad();
        $songPath = public_path('storage/content\songs\Мэйби Бэйби - DURAGA.mp3');
        $this->chat->audio($songPath)->send();
    }

    public function maybeBaby(): void
    {
        $this->waitLoad();
        $songPath = public_path('storage/content\songs\Мэйби Бэйби - DURAGA.mp3');
        $this->chat->audio($songPath)->send();
    }

    public function funnySongs(): void
    {
        $this->waitLoad();
        $songPath = public_path('storage/content\songs\Мэйби Бэйби - DURAGA.mp3');
        $this->chat->audio($songPath)->send();
    }

    public function motivation(): void
    {
        $this->waitLoad();
        $songPath = public_path('storage/content\songs\Мэйби Бэйби - DURAGA.mp3');
        $this->chat->audio($songPath)->send();
    }

    public function forSoul(): void
    {
        $this->waitLoad();
        $songPath = public_path('storage/content\songs\Мэйби Бэйби - DURAGA.mp3');
        $this->chat->audio($songPath)->send();
    }

    public function beautiful(): void
    {
        $this->waitLoad();
        $songPath = public_path('storage/content\songs\Мэйби Бэйби - DURAGA.mp3');
        $this->chat->audio($songPath)->send();
    }
}
