<?php
namespace App\Services;

use GuzzleHttp\Client;

class PrayerTimeService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getCityId($cityName)
    {
        $response = $this->client->get("https://api.myquran.com/v2/sholat/kota/cari/{$cityName}");
        $data = json_decode($response->getBody()->getContents(), true);

        if ($data['status'] && !empty($data['data'])) {
            return $data['data'][0]['id'];
        }

        return null;
    }

    public function getPrayerTimes($cityId, $date)
    {
        $response = $this->client->get("https://api.myquran.com/v2/sholat/jadwal/{$cityId}/{$date}");
        return json_decode($response->getBody()->getContents(), true);
    }
}

