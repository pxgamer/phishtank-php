<?php

namespace pxgamer\PhishTank;

/**
 * Class Hook
 * @package pxgamer\PhishTank
 *
 * @property string BASE_URL
 * @property string $api_key
 */
class Hook
{
    const BASE_URL = 'https://phishtank.com';

    /**
     * @param bool|string $url
     * @param bool|string $api_key
     * @return array
     */
    public static function checkUrl($url = false, $api_key = false)
    {
        $data = [
            'format' => 'json',
        ];

        if ($api_key) {
            $data['app_key'] = $api_key;
        }

        if (is_string($url)) {
            $data['url'] = urlencode($url);
            return self::post('/checkurl/', $data);
        } else {
            return ['meta' => ['status' => 'fail']];
        }
    }

    /**
     * @param string $endpoint
     * @param array $content
     * @return array
     */
    private static function post($endpoint, $content)
    {
        $cu = curl_init();
        curl_setopt_array(
            $cu,
            [
                CURLOPT_URL => self::BASE_URL . $endpoint,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $content,
            ]
        );

        return self::toArray(curl_exec($cu));
    }

    /**
     * @param $string
     * @return array
     */
    private static function toArray($string)
    {
        if (is_string($string)) {
            return json_decode($string, true);
        } else {
            return [];
        }
    }
}
