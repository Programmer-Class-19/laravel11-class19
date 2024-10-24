<?php
namespace App\Services;
use GuzzleHttp\Client;

class UserService {
    protected $client;

    public function __construct() {
        $this->client = new Client([
            'base_uri' = ''
        ])
    }


}
