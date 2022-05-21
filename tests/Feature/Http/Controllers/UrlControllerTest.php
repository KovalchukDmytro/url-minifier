<?php

namespace Tests\Feature\Http\Controllers;

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
        Session::start();
        $response = $this->call('POST', '/url/create', array(
            '_token' => csrf_token(),
        ));
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['url', 'expired_at']);
    }
}
