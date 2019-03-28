<?php

namespace App\src\ApiReader;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ReadOfferApi
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getOffers($code)
    {
        try {
            $response = $this->client->request('GET', ReadOfferApi::getOfferUrl($code), [
                'auth' => [
                    env('BASIC_AUTH_USER', 'candidate1'),
                    env('BASIC_AUTH_PASSWORD', 'iptelJobOffer789!')
                ]
            ])->getBody()->getContents();
        } catch (GuzzleException $e) {
            $response = response()->json(['error' => $e->getMessage()]);
        }

        return $response;
    }

    // TODO: caching env variables
    public static function getOfferUrl($code)
    {
        return env('OFFER_ENDPOINT') . '/' . $code;
    }

}