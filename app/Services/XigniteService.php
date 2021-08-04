<?php

namespace App\Services;

use GuzzleHttp\Client;

/**
 * Xignite service
 *
 * @filesource
 */
class XigniteService
{
    /**
     * @var client
     */
    protected $client;

    /**
     * Instantiate a new XigniteService instance.
     *
     * @param Client $client Client
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->endpointAllowedList = ['GetGlobalDelayedQuote', 'ListExchanges'];
    }

    /**
     * Get query string.
     *
     * @param array $queryStringAry Query string array
     *
     * @return array query string array
     */
    private function getQueryString(array $queryStringAry = []): array
    {
        return array_merge($queryStringAry, [
            '_token'  => config('xignite.token'),
        ]);
    }

    /**
     * Make Http Request
     *
     * @param string $baseUrl        Base URL
     * @param string $endpoint       Endpoint
     * @param array  $queryStringAry Query string array
     *
     * @return mixed
     */
    public function makeHttpRequest(string $baseUrl, string $endpoint, array $queryStringAry = [])
    {
        if (!in_array($endpoint, $this->endpointAllowedList)) {
            return false;
        }
        $response = $this->client->request('GET', $baseUrl . '.' . config('xignite.result_format') . '/' . $endpoint, [
            'query' => $this->getQueryString($queryStringAry),
            'curl' => [
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_MAXREDIRS      => 3,
                CURLOPT_POSTREDIR      => 3,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSLVERSION     => CURL_SSLVERSION_TLSv1_2,
            ],
        ]);
        return json_decode((string) $response->getBody(), true);
    }
}
