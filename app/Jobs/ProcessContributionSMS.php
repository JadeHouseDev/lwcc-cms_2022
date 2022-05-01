<?php

namespace App\Jobs;

use App\Services\SmsApi;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessContributionSMS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $phone_numbers;
    public $message;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($recipients, string $message)
    {
        // Log::info("\n\n Phone: $recipients[0] :::::: Message: $message");
        $this->phone_numbers = $recipients;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            // Log::info("\n\n Success In Process Contribution Job ");
            // Log::info("\n\n $this->phone_numbers  ");
            // Log::info("\n\n Started SMS  ");
            $send_sms = new SmsApi($this->message, $this->phone_numbers);
            $send_sms->sendSMS();
        } catch (\Throwable $th) {
            Log::info("\n\n Error In Process Contribution Job");
            $err = $th->getMessage();
            Log::info("Error Sending SMS. Due to $err ");
        }
    }
}
