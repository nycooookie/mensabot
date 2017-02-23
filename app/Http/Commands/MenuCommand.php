<?php

namespace App\Http\Commands;

use App\Menu;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

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

        $this->replyWithChatAction(['action' => Actions::TYPING]);

        $menus = Menu::all();


        foreach ($menus as $menu) {
            $this->replyWithMessage(['text' => $menu->description]);
        }

        return;
    }
}