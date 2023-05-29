<?php

namespace App\Console\Commands;

use App\Models\SimpleMessage;
use Illuminate\Console\Command;

class ShowSimpleMessageCommand extends Command
{
//    protected $signature = 'app:show-simple-message-command';

//    protected $signature = 'app:show-simple-message-command {id}';

    protected $signature = 'app:show-simple-message-command {id?} {--show-created}';

    protected $description = 'Show Simple Message.';

    public function handle(): void
    {
        $query = SimpleMessage::query();

//        if ($id = $this->argument('id')) {
//            $query->where('id', $id);
//        } elseif ($this->confirm('全件取得してよろしいですか？') === false) {
//            return;
//        }

        if ($id = $this->argument('id')) {
            $this->info("ID: $id を取得します");
            $query->where('id', $id);
        } elseif ($this->confirm('全件取得してよろしいですか？') === false) {
            $this->warn('処理を中止しました');
            return;
        }

        $messages = $query->get();

        $header = ['ID', '本文'];
        if ($this->option('show-created')) {
            $header[] = '作成日時';
        }
        $rows = [];

        foreach ($messages as $message) {
            $row = [
                $message->id,
                $message->body,
            ];

            if ($this->option('show-created')) {
                $row[] = $message->created_at;
            }

            $rows[] = $row;

            echo sprintf("ID: %s", $message->id), PHP_EOL;
            echo sprintf("Body: %s", $message->body), PHP_EOL;

            if ($this->option('show-created')) {
                echo sprintf("CreatedAt: %s", $message->created_at), PHP_EOL;
            }
        }

        $this->table($header, $rows);
    }
}
