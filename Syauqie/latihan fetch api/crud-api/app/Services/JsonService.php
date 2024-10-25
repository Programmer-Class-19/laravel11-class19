<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class JsonService
{
    protected $client;
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getJsonAll()
    {
        try {
            // Request ke API
            $response = $this->client->get('https://jsonplaceholder.typicode.com/posts');

            // Cek status response
            if ($response->getStatusCode() !== 200) {
                return []; // Jika status bukan 200, kembalikan array kosong
            }

            // Decode body respons menjadi array
            $data = json_decode($response->getBody()->getContents(), true);

            // Pastikan $data adalah array sebelum mengembalikannya
            return is_array($data) ? $data : [];
        } catch (RequestException $e) {
            // Tangani error saat request gagal
            return ['error' => 'Request failed: ' . $e->getMessage()];
        }
    }
}
