<?php

namespace App\Http\Telegraph;

use DefStudio\Telegraph\Handlers\WebhookHandler;

class Answer extends WebhookHandler
{

    public function start()
    {
        $this->chat->html(__('Welcome!'))->send();
    }

    public function hello()
    {
        $this->chat->html(__('Текст'))->send();
    }
}

