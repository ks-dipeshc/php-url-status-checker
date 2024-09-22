<?php

namespace Kalkani\PhpUrlStatusChecker;

use Throwable;
use GuzzleHttp\Client;

class UrlStatusChecker
{
    protected $client;

    public function __construct()
    {
        // Initialize the Guzzle client
        $this->client = new Client([
            'allow_redirects' => false, // Disable auto redirects
            'http_errors' => false, // Disable throwing exceptions on 4xx/5xx
            'timeout' => 10 // Set a timeout for the request
        ]);
    }

    public function checkStatus(string $url): array
    {
        try {
            // Make the request to the given URL
            $response = $this->client->get($url);

            $statusCode = $response->getStatusCode();
            $location = null;

            // Check for redirection status codes (3xx)
            if ($statusCode >= 300 && $statusCode < 400) {
                $location = $response->getHeaderLine('Location');
            }

            return [
                'url' => $url,
                'status' => $statusCode,
                'location' => $location
            ];
        } catch (Throwable $e) {
            // Handle errors like timeouts or connection problems
            return [
                'url' => $url,
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }
}
