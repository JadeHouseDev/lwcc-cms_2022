<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SmsApi{
    protected $data = [];
    private $api_key = "qR3upRhX8kxIOjOwUJBf4A34MZSw17drYgWn8ekgySYnc";
    private $url;
    private $recipient;
    protected $message;
    public $baseService;
    public function __construct(string $message = "", $recipient)
    {
        $this->url = env('MNOTIFY_URL')  . "$this->api_key";
        $this->message = $message;
        $this->recipient = $recipient;

        $this->data = [
            'recipient' => array($this->recipient),
            'message' => $message,
            'sender' => env('SENDER_ID'),
            'is_schedule' => false,
            'schedule_date' => "",
        ];

        $this->baseService = new BaseService;
    }


    public function sendSMS()
    {
        $send_sms = Http::post($this->url, $this->data);
        $response = $send_sms->json();

        print_r($response);

        if ($response['code'] == "2000") {
            Log::info("\n SMS Sent Successfully");
        } else {
            Log::info("\n SMS Sending Error");
        }

        $this->baseService->update_sms_status_of_last_contribution($this->recipient);
        $this->baseService->update_sms_count_in_db($response);


    }
}
