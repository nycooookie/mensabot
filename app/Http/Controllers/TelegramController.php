<?php

namespace App\Http\Controllers;

use App\Cafeteria;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{

    public function index()
    {
        return view('pages.home');
    }

    public function webhook(Request $request)
    {
        User::updateOrCreate([
            'id' => $request->message['from']['id'],
            'name' => $request->message['from']['first_name'],
            'username' => '...'
        ]);

        $update = Telegram::commandsHandler(true);
        

        //if ($update->hasType('message')) {

        $cafeteria = Cafeteria::where('name', $request->message['text'])->first();

        if ($cafeteria) {
            $text = 'Menu vom ' . Carbon::today()->formatLocalized('%d.%m') . ":\n\n";
            $menus = $cafeteria->menus()->where('date', Carbon::today())->get();

            Telegram::sendMessage([
                'chat_id' => $request->message['chat']['id'],
                'text' => $text . $menus->implode('description', "\n\n")
            ]);
        }

        //}

        return;
    }

    public function register()
    {
        $url = secure_url('webhook');
        // $url = "https://requestb.in/12bkrla1";
        Telegram::setWebhook(['url' => $url]);
        return "Ok";
    }

}
