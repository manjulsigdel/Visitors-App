<?php

namespace App\Utils\Log;

use App\Exceptions\InsightLog\InsightOpsKeyNotSetException;
use GuzzleHttp\Client;

class InsightOps
{
    const INSIGHT_URL = 'https://au.rest.logs.insight.rapid7.com/management/logs';

    /**
     * @var
     */
    protected $data;
    /**
     * @var Client
     */
    protected $client;
    /**
     * @var
     */
    protected $headers;

    /**
     * InsightOps constructor.
     */
    public function __construct()
    {
        $this->client = new Client;
    }

    /**
     * @param string $to
     * @param array  $data
     *
     * @return $this
     * @throws InsightOpsKeyNotSetException
     */
    public function prepare(string $message)
    {
        $this->data = [
            'log' => [
                'name'         => $message,
                'structures'   => [],
                "user_data"    => [
                    "le_agent_filename" => "",
                    "le_agent_follow"   => "false",
                ],
                "source_type"  => "token",
                "token_seed"   => null,
                "logsets_info" => [
                    [
                        "id" => env('LOGSET_ID'),

                    ],
                ],
            ],
        ];

        if ( empty(env('INSIGHTOPS_APP_KEY')) ) {
            throw new InsightOpsKeyNotSetException();
        }

        $this->headers = ['x-api-key' => env('INSIGHTOPS_APP_KEY'), "Content-Type" => "application/json"];

        return $this;
    }

    /**
     * Send post request.
     *
     */
    public function send()
    {
        $response = $this->client->request(
            'POST',
            self::INSIGHT_URL,
            [
                'headers' => $this->headers,
                'json'    => $this->data,
            ]
        );

        logger()->info(
            'Insight Ops Logging log',
            [
                $this->data,
                $response->getBody()->getContents(),
            ]
        );
    }
}
