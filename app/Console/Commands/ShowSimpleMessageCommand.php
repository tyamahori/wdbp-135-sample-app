<?php

namespace App\Console\Commands;

use App\Models\SimpleMessage;
use Illuminate\Console\Command;

class ShowSimpleMessageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:show-simple-message-command {id?} {--show-created}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $query = SimpleMessage::query();
        if ($id = $this->argument('id')) {
            $this->info("ID: $id を取得します");
            $query->where('id', $id);
        } elseif ($this->confirm('全件取得してよろしいですか？') === false) {
            $this->warn('処理を中止しました');
            return;
        }

        $header = ['ID', '本文'];
        if ($this->option('show-created')) {
            $header[] = '作成日時';
        }
        $rows = [];

        $messages = $query->get();

        foreach ($messages as $message) {
            $row = [
                $message->id,
                $message->body,
            ];

            if ($this->option('show-created')) {
                $row[] = $message->created_at;
            }

            $rows[] = $row;
        }

        $this->table($header, $rows);
    }
}
