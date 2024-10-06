<?php

require 'vendor/autoload.php';

use Longman\TelegramBot\Telegram;
use Longman\TelegramBot\Request;
use Longman\TelegramBot\Entities\InlineKeyboard;
use Longman\TelegramBot\Commands\UserCommand;

$telegram = new Telegram('8070278994:AAHxoppPzvglgkvmTvCxDrwaf-vr_Gw2Xkc', 'my_goodx_bot');

// Command to handle /start
class StartCommand extends UserCommand {
    protected $name = 'start';
    protected $description = 'Start command';
    protected $usage = '/start';
    protected $version = '1.0.0';

    public function execute() {
        $message = $this->getMessage();
        $chat_id = $message->getFrom()->getId();
        $username = $message->getFrom()->getFirstName();

        $keyboard = new InlineKeyboard([
            ['text' => '😎 Play Game 😎', 'url' => 'https://godswill-ifeanyi.github.io/PHP_Telegram_App/'],
            ['text' => '🔗 Join Channel 🔗', 'url' => 'https://t.me/armtechtonic'],
            ['text' => '🤑 Claim Reward 🤑', 'callback_data' => 'claim'],
        ]);

        $data = [
            'chat_id' => $chat_id,
            'text' => "Welcome to MyTeacher Bot, $username!",
            'reply_markup' => $keyboard,
        ];

        return Request::sendMessage($data);
    }
}


$telegram->handle();

?>
