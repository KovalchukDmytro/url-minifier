<?php

namespace App\Helpers;

/**
 * Class UrlFormatHelper
 * @package App\Helpers
 */
class UrlFormatHelper
{
    /**
     * @param string $url
     * @return string
     */
    public static function encodeURL(string $url): string
    {
        return base64_encode(trim($url, '/'));
    }

    /**
     * @param string $urlAsBase64
     * @return string
     */
    public static function decodeURL(string $urlAsBase64): string
    {
        return base64_decode($urlAsBase64);
    }

    /**
     * @param string $urlMask
     * @return string
     */
    public static function getShortUrlByUrlMask(string $urlMask): string
    {
        $domain = request()->getHost();

        if ($domain === 'localhost'){
            $domain = sprintf('http://%s:%s', $domain, request()->getPort());
        } else {
            $domain = sprintf('https://%s', $domain);
        }

        return sprintf('%s/to/%s', $domain, $urlMask);
    }
}
