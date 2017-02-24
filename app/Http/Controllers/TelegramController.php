<?php

namespace App\Http\Controllers;

use App\Cafeteria;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{

    public function webhook(Request $request)
    {
        $text = $request->message['text'];
        $cafeteria = Cafeteria::where('name', $text)->first();
        if ($cafeteria) {

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
