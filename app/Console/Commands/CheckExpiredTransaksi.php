<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckExpiredTransaksi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-expired-transaksi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        \App\Models\Transaksi::where('status', 'pending')
            ->where('expired_at', '<', now())
            ->update(['status' => 'expired']);

        return 0;
    }
}
