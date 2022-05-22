<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Url;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

/**
 * Class UrlControllerTest
 * @package Tests\Feature\Http\Controllers
 */
class UrlControllerTest extends TestCase
{
    /**
     *
     */
    private const DATA = [
        'urls' => [
            'good' => 'https://feature_testing_url.com.ua',
            'bad' => 'feature_testing_url',
        ],
        'urlMask' => [
            'good' => 16531213501797,
            'bad' => 100,
        ],
        'encodedUrl' => 'aHR0cHM6Ly9mZWF0dXJlX3Rlc3RpbmdfdXJsLmNvbS51YQ==',
        'expiredAt' => [
            'good' => '2032-01-01',
            'bad' => '2000-01-01',
        ]
    ];

    /**
     *
     */
    protected function setUp(): void
    {
        parent::setUp();
        Session::start();

        Url::query()->create([
            'url' => self::DATA['encodedUrl'],
            'url_mask' => self::DATA['urlMask']['good'],
            'views' => 0,
            'expired_at' => self::DATA['expiredAt']['good'],
        ]);
    }

    /**
     *
     */
    protected function tearDown(): void
    {
        $this->removeTestDataFromDB();
        parent::tearDown();
    }

    /**
     *
     */
    private function removeTestDataFromDB(): void
    {
        Url::query()->where('url', self::DATA['encodedUrl'])->delete();
    }

    /**
     *
     */
    public function testIndex()
    {
        $response = $this->get('/statistics');

        $response->assertStatus(200);
        $response->assertViewIs('pages.statistics');
    }

    /**
     *
     */
    public function testCreateUrlWithEmptyForm()
    {
        $response = $this->call('POST', '/url/create', [
            '_token' => csrf_token(),
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['url', 'expired_at']);
    }

    /**
     *
     */
    public function testCreateUrlWithBadUrl()
    {
        $response = $this->call('POST', '/url/create', [
            '_token' => csrf_token(),
            'url' => self::DATA['urls']['bad'],
            'expired_at' => self::DATA['expiredAt']['good'],
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['url']);
    }

    /**
     *
     */
    public function testCreateUrlWithBadExpiredDate()
    {
        $response = $this->call('POST', '/url/create', [
            '_token' => csrf_token(),
            'url' => self::DATA['urls']['good'],
            'expired_at' => self::DATA['expiredAt']['bad'],
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['expired_at']);
    }

    /**
     *
     */
    public function testSuccessCreateUrl()
    {
        $response = $this->call('POST', '/url/create', [
            '_token' => csrf_token(),
            'url' => self::DATA['urls']['good'],
            'expired_at' => self::DATA['expiredAt']['good'],
        ]);

        $response->assertStatus(200);
        $response->assertViewIs('pages.statistics');
    }

    /**
     *
     */
    public function testToSuccess()
    {
        $expectedCountViewsBefore = [ 0 => 0 ];
        $expectedCountViewsAfter = [ 0 => 1 ];
        $countViewsBefore = Url::query()
            ->where('url_mask', self::DATA['urlMask']['good'])
            ->pluck('views')->toArray();

        $response = $this->call('GET', sprintf('/to/%s', self::DATA['urlMask']['good']));

        $countViewsAfter = Url::query()
            ->where('url_mask', self::DATA['urlMask']['good'])
            ->pluck('views')->toArray();

        $response->assertStatus(302);
        $response->assertRedirect(self::DATA['urls']['good']);
        $this->assertEquals($expectedCountViewsBefore, $countViewsBefore);
        $this->assertEquals($expectedCountViewsAfter, $countViewsAfter);
    }

    /**
     *
     */
    public function testToError()
    {
        $response = $this->call('GET', sprintf('/to/%s', self::DATA['urlMask']['bad']));

        $response->assertStatus(302);
        $response->assertRedirect('/404');
    }
}
