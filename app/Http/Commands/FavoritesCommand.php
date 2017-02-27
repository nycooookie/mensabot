<?php

namespace App\Http\Commands;

use App\Cafeteria;
use App\Menu;
use App\Repositories\MenuBot;
use App\User;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Objects\Update;

class FavoritesCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "favorites";

    /**
     * @var string Command Description
     */
    protected $description = "Get the menus of your favorite cafeterias!";

    public function handle($arguments)
    {
        $this->replyWithChatAction([
            'action' => Actions::TYPING
        ]);

        $userId = $this->update->getMessage()['from']['id'];
        $user = User::find($userId);

        // $menus = MenuBot::getFavoriteMenus($user);


        $this->replyWithMessage([
            'text' => 'asdf'
        ]);

        return;
    }
}