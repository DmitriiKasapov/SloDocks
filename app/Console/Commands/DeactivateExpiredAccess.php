<?php

namespace App\Console\Commands;

use App\Models\Access;
use Illuminate\Console\Command;

class DeactivateExpiredAccess extends Command
{
    protected $signature = 'access:deactivate-expired';

    protected $description = 'Deactivate access records that have expired';

    public function handle(): int
    {
        $count = Access::where('is_active', true)
            ->where('expires_at', '<=', now())
            ->update(['is_active' => false]);

        $this->info("Deactivated {$count} expired access records.");

        return self::SUCCESS;
    }
}
