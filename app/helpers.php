<?php

use App\Models\ActivityLog;

if (!function_exists('activity_log')) {
    /**
     * Log an activity event to the database.
     */
    function activity_log(string $eventType, ?string $email = null, array $metadata = []): void
    {
        ActivityLog::create([
            'event_type' => $eventType,
            'email' => $email,
            'metadata' => $metadata,
        ]);
    }
}
