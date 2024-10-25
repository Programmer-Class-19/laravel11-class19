<?php

namespace App\Http\Controllers;

use App\Services\JsonService;
use Illuminate\Http\Request;

class JsonController extends Controller
{
    protected $jsonService;

    public function __construct(JsonService $jsonService) {
        $this->jsonService = $jsonService;
    }

    public function index() {
        $jsonAll = $this->jsonService->getJsonAll();

        // Jika data kosong, kembalikan 204 No Content
        if (empty($jsonAll)) {
            return response()->json(['message' => 'No data found'], 204);
        }

        // Kembalikan data dengan status 200 OK
        return response()->json($jsonAll, 200);
    }
}
