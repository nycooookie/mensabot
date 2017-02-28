<?php

namespace App\Http\Commands;

use App\User;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "start";

    /**
     * @var string Command Description
     */
    protected $description = "Start Command to get you started";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {

        $message = $this->getUpdate()->getMessage();
        $id = $message->getFrom()->getId();
        $user = User::findOrFail($id);

        $this->replyWithMessage(['text' => 'Hi ' . $user->name . '! Welcome to our bot, Here are our available commands:']);

        $this->replyWithChatAction(['action' => Actions::TYPING]);

        $commands = $this->getTelegram()->getCommands();

        $response = '';
        foreach ($commands as $name => $command) {
            $response .= sprintf('/%s - %s' . PHP_EOL, $name, $command->getDescription());
        }

        $this->replyWithMessage(['text' => $response]);
    }
}