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

    public function register()
    {
        return Telegram::getMe();
    }

}
