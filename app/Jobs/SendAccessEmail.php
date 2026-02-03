<?php

namespace App\Jobs;

use App\Mail\AccessGrantedMail;
use App\Models\Access;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendAccessEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 30;
    public $backoff = [5, 15, 30]; // Retry after 5s, 15s, 30s

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Access $access
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Mail::to($this->access->email)
                ->send(new AccessGrantedMail($this->access));

            // Log successful email send
            activity_log('access_email_sent', $this->access->email, [
                'access_id' => $this->access->id,
            ], serviceId: $this->access->service_id);

            Log::info('Access email sent successfully', [
                'access_id' => $this->access->id,
                'email' => $this->access->email,
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to send access email', [
                'access_id' => $this->access->id,
                'email' => $this->access->email,
                'error' => $e->getMessage(),
            ]);

            // Re-throw to trigger job retry
            throw $e;
        }
    }
}
