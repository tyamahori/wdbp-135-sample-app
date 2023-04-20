<?php

namespace App\Console\Commands;

use App\Models\SimpleMessage;
use Illuminate\Console\Command;

class ShowSimpleMessageCommand extends Command
{
    protected $signature = 'app:show-simple-message-command';
    protected $description = 'Show Simple Message.';

    public function handle(): void
    {
        $query = SimpleMessage::query();

        $messages = $query->get();

        foreach ($messages as $message) {
            echo sprintf("ID: %s", $message->id), PHP_EOL;
            echo sprintf("Body: %s", $message->body), PHP_EOL;
        }
    }
}
