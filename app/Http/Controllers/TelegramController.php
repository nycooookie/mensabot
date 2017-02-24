<?php

namespace App\Http\Controllers;

use App\Cafeteria;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{

    public function webhook(Request $request)
    {
        if ($cafeteria = Cafeteria::where('name', $request->message['text'])->first()) {
                Telegram::sendMessage([
                    'chat_id' => $request->message['chat']['id'],
                    'text' => $cafeteria->menus->implode('description', "\n\n")
                ]);
        }
        
        return Telegram::commandsHandler(true);
    }

    public function register()
    {
        $url = secure_url('webhook');
        Telegram::setWebhook(['url' => $url]);
        return $url;
    }

}
