<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class APICommunicationService
{
    public function get($endpoint)
    {
        $response = Http::get(config('api_communication.base_url') . $endpoint);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
