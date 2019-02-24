<?php

namespace App\Http\Commands;

use App\Cafeteria;
use App\Menu;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\Log;


class MenuCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "menu";

    /**
     * @var string Command Description
     */
    protected $description = "Get your daily menus!";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        /*$this->replyWithChatAction(['action' => Actions::TYPING]);
        $menus = Menu::all()->take(5);
        $this->replyWithMessage(['text' => $menus->implode('description', "\n\n")]);*/

        Log::info('handles request');

        $keyboard[] = [];
        foreach (Cafeteria::all() as $cafeteria)
            array_push($keyboard, [$cafeteria->name]);

        $reply_markup = Telegram::replyKeyboardMarkup([
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
        ]);

        $response = $this->replyWithMessage([
            'text' => 'Please select a cafeteria:',
            'reply_markup' => $reply_markup
        ]);

        return;
    }
}
