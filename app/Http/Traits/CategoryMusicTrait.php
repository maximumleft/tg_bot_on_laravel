<?php

namespace App\Http\Traits;

use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

trait CategoryMusicTrait
{
    public function waitLoad(): void
    {
        $this->chat->message('Ждите файл')->send();
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
        $songPath = public_path('storage/content\songs\Мэйби Бэйби - DURAGA.mp3');
        $this->chat->audio($songPath)->send();
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
