<?php

namespace App\Services;

use App\Interfaces\SmsServiceInterface;
use GuzzleHttp\Client;

class SmsService implements SmsServiceInterface
{
    protected $apiUrl;
    protected $apiToken;

    public function __construct()
    {
        $this->apiUrl = config('smsapi.url');
        $this->apiToken = config('smsapi.client_secret_key');
    }

    public function sendSms($recipientNumber, $message)
    {
        $client = $this->createHttpClient();
        $headers = $this->createHeaders();
    
        $response = $client->post('/api/sms', [
            'headers' => $headers,
            'json' => [
                'recipient_number' => $recipientNumber,
                'message' => $message,
            ]
        ]);
    
        return $response->getStatusCode() === 200;
    }
    
    private function createHttpClient()
    {
        return new Client([
            'base_uri' => $this->apiUrl,
            'timeout' => 5.0,
        ]);
    }
    
    private function createHeaders()
    {
        return [
            'Authorization' => 'Bearer ' . $this->apiToken,
        ];
    }    
}
