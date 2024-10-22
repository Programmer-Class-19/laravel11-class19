<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class UserService {
    protected $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function getAllUser()
    {
        try {
            $response = $this->client->get("http://15redesignui.test/api/v1/user");
            $data = json_decode($response->getBody()->getContents(), true);
            Log::info('API response:', $data);
            return $data;
        } catch (\Exception $e) {
            Log::error('Error fetching all surat:', ['message' => $e->getMessage()]);
            return null;
        }
    }
}
