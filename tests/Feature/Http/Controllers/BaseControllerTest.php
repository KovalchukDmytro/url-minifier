<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

/**
 * Class BaseControllerTest
 * @package Tests\Feature\Http\Controllers
 */
class BaseControllerTest extends TestCase
{

    /**
     *
     */
    public function testIndex()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('pages.welcome');
    }

    /**
     *
     */
    public function testRedirectUrlCreate()
    {
        $response = $this->get('/url/create');

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }
}
