<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

/**
 * Get Conversion Rates | With validation Cache
 */
if (!function_exists('getConversionRates')) {
    function getConversionRates()
    {

        $key = 'conversion_rates';
        $ttl = 86400; // 1 day

        if (config('app.cache')) {
            return Cache::remember($key, $ttl, function () {
                return fetchConversionRates();
            });
        }

        return fetchConversionRates();
    }
}

/**
 * Get Conversion Rates
 */
if (!function_exists('fetchConversionRates')) {
    function fetchConversionRates()
    {
        $response = Http::withHeaders(['app_token' => env('IMAGINA_RATES_TOKEN')])
            ->get(config('isite.urlConversionRate'));

        if ($response->successful()) {
            return $response->json();
        }

        \Log::error('ERROR| getConversionRates | Status: ' . $response->status());
        return [];
    }
}
