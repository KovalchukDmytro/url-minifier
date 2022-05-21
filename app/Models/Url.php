<?php

namespace App\Models;

use App\Helpers\UrlFormatHelper;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Url
 * @package App\Models
 * @property int $id
 *
 * @property string $url
 * @property int $url_mask
 * @property int $views
 *
 * @property string $expired_at
 *
 * @property string $created_at
 * @property string $updated_at
 *
 */
class Url extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'url',
        'url_mask',
        'views',
        'expired_at',
    ];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return UrlFormatHelper::decodeURL($this->url);
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = UrlFormatHelper::encodeURL($url);
    }

    /**
     * @return int
     */
    public function getUrlMask(): int
    {
        return $this->url_mask;
    }

    /**
     * @return int
     */
    public function getViews(): int
    {
        return $this->views;
    }

    /**
     * @param int $views
     */
    public function setViews(int $views): void
    {
        $this->views = $views;
    }

    /**
     * @return string
     */
    public function getShortUrl(): string
    {
        return UrlFormatHelper::getShortUrlByUrlMask($this->getUrlMask());
    }

    /**
     * @return string
     */
    public function getExpiredAt(): string
    {
        return $this->expired_at;
    }

    /**
     * @param string $expired_at
     */
    public function setExpiredAt(string $expired_at): void
    {
        $this->expired_at = $expired_at;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * Увеличиваем инкремент просмотра
     */
    public function updateViewCounter(): void
    {
        $this->views++;
        $this->save();
    }
}
