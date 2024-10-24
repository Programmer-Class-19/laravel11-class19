<?php

namespace App\Services;

use GuzzleHttp\Client;

class JadwalShalatService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Get JadwalShalat by city from external API.
     *
     * @param string $city
     * @return array
     */
    public function getJadwalShalatByCity($city = 'Jakarta')
    {
        $response = $this->client->get("https://api.aladhan.com/v1/timingsByCity", [
            'query' => [
                'city' => $city,
                'country' => 'Indonesia',
                'method' => 2,
            ]
        ]);

        // Mengembalikan hasil response dari API dalam format array
        return json_decode($response->getBody()->getContents(), true)['data']['timings'];
    }
}
