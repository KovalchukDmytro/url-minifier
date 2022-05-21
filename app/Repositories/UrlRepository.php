<?php

namespace App\Repositories;

use App\Models\Url;

/**
 * Class UrlRepository
 */
class UrlRepository
{
    /**
     * @param int $urlMask
     * @param bool $isActual
     * @return Url|null
     */
    public static function getByUrlMask(int $urlMask, bool $isActual = true): ?Url
    {
        $query = Url::query()->where('url_mask', $urlMask);

        if ($isActual) {
            $query = $query->whereDate('expired_at', '>=', date('Y-m-d'));
        }

        return $query->first();
    }

    /**
     * @param string $encodedURL
     * @param string $expiredAt
     * @return Url
     */
    public static function createUrlMask(string $encodedURL, string $expiredAt): Url
    {
        return Url::query()->create([
            'url' => $encodedURL,
            'expired_at' => $expiredAt,
            'views' => 0,
            'url_mask' => (int)(microtime(true) * 10000),
        ]);
    }
}
