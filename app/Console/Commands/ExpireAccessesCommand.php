<?php

namespace App\Console\Commands;

use App\Models\Access;
use App\Models\ActivityLog;
use Illuminate\Console\Command;

class ExpireAccessesCommand extends Command
{
    protected $signature = 'access:expire';

    protected $description = 'Deactivate expired accesses';

    public function handle(): int
    {
        $expiredCount = Access::where('expires_at', '<', now())
            ->where('is_active', true)
            ->count();

        if ($expiredCount === 0) {
            $this->info('No expired accesses found.');
            return Command::SUCCESS;
        }

        // Deactivate expired accesses
        $updated = Access::where('expires_at', '<', now())
            ->where('is_active', true)
            ->update(['is_active' => false]);

        // Log each expiration
        Access::where('expires_at', '<', now())
            ->where('is_active', false)
            ->whereDoesntHave('activityLogs', function ($query) {
                $query->where('event_type', 'access_expired');
            })
            ->each(function ($access) {
                ActivityLog::create([
                    'event_type' => 'access_expired',
                    'email' => $access->email,
                    'service_id' => $access->service_id,
                    'purchase_id' => $access->purchase_id,
                    'metadata' => [
                        'access_id' => $access->id,
                        'expired_at' => $access->expires_at->toDateTimeString(),
                    ],
                ]);
            });

        $this->info("Deactivated {$updated} expired access(es).");

        return Command::SUCCESS;
    }
}
