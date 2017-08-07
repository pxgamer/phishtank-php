<?php

namespace pxgamer\PhishTank;

/**
 * Class Hook
 * @package pxgamer\PhishTank
 */
class Hook
{
    const API_CHECK_URL = 'https://phishtank.com/checkurl/';

    /**
     * @var bool|string
     */
    private $url;
    /**
     * @var array
     */
    private $requestData = ['format' => 'json'];
    /**
     * @var bool|null|string
     */
    private $app_key;
    /**
     * @var Meta|null
     */
    private $meta;
    /**
     * @var null|Results
     */
    private $results;

    /**
     * @param bool|string $url
     * @param bool|string $api_key
     */
    public function __construct($url, $api_key = null)
    {
        $this->url = $url;
        $this->requestData['url'] = $this->url;

        if ($api_key) {
            $this->app_key = $api_key;
            $this->requestData['app_key'] = $this->app_key;
        }

        $this->getResults();
    }

    /**
     * @return Hook
     */
    public function getResults()
    {
        $cu = curl_init();
        curl_setopt_array(
            $cu,
            [
                CURLOPT_URL => self::API_CHECK_URL,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $this->requestData,
            ]
        );

        $this->populate(curl_exec($cu));

        return $this;
    }

    /**
     * Populate the meta and results attributes
     * @param $jsonResponse
     * @return $this
     */
    private function populate($jsonResponse)
    {
        $decodedResponse = $this->jsonToArray($jsonResponse);

        $this->meta = new Meta();
        $this->meta->populate($decodedResponse['meta']);

        $this->results = new Results();
        $this->results->populate($decodedResponse['results']);

        return $this;
    }

    /**
     * Get the Meta object
     * @return null|Meta
     */
    public function meta()
    {
        return $this->meta;
    }

    /**
     * Get the Results object
     * @return null|Results
     */
    public function results()
    {
        return $this->results;
    }

    /**
     * @param string $jsonString
     * @return array
     */
    private function jsonToArray($jsonString)
    {
        if (is_string($jsonString)) {
            return json_decode($jsonString, true);
        } else {
            return [];
        }
    }
}
