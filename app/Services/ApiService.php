<?php

namespace App\Services;
class ApiService{
    protected string $url;
    protected string $type;
    protected $data;
    protected $api_key = env('SMS_API_KEY');
    public function __construct(string $type, string $url, $data)
    {
        $this->type = $type;
        $this->url = $url;
        $this->data = $data;

        switch ($type) {
            case 'sms':
                // $this->sendSMS();
                break;

            default:
                # code...
                break;
        }
    }

    protected function sendSMS(SmsApi $smsApi)
    {

    }
}
