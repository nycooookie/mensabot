<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{

    public function webhook(Request $request)
    {
        $chatId = $request->input('message.chat.id');

        return $update = Telegram::commandsHandler(true);
    }

    public function register()
    {
        $url = secure_url('webhook');
        Telegram::setWebhook(['url' => $url]);
        return $url;
    }

}
