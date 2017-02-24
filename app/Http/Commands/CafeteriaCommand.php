<?php

namespace App\Http\Commands;

use App\Cafeteria;
use App\Menu;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class CafeteriaCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "cafeteria";

    /**
     * @var string Command Description
     */
    protected $description = "Get a list of all cafeterias!";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $this->replyWithChatAction([
            'action' => Actions::TYPING
        ]);

        $cafeterias = Cafeteria::all();

        $this->replyWithMessage([
            'text' => $cafeterias->implode('name', PHP_EOL)
        ]);

        return;
    }
}