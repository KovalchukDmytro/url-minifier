<?php

namespace App\Console\Commands;

use App\Models\Url;
use Illuminate\Console\Command;

/**
 * Очистка URLs, строк которых истек месяц назад
 *
 * Class ClearExpiredUrls
 * @package App\Console\Commands
 */
class ClearExpiredUrls extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear_expired_urls';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear Expired Urls';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $result = Url::query()
            ->whereDate('expired_at', '<' , date('Y-m-d', strtotime('-1 month' )))
            ->delete();

        echo sprintf('Deleted %s urls' . PHP_EOL, $result);

        return 0;
    }
}
