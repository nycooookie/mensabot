<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{

    public function index()
    {
        $url = secure_url('webhook');

        return Telegram::setWebhook(['url' => $url]);
    }

    public function webhook(Request $request)
    {
        $chatId = $request->input('message.message_id');

        $response = Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => 'Hello World'
        ]);
    }

    public function register()
    {
        $url = secure_url('webhook');
        Telegram::setWebhook(['url' => $url]);
        return $url;
    }

}
